<?php
	### Coded by : Hemedi M. Manyinja
	### Time : 20:00 - 01:03 02 - 03 June 2018
	### Location : Kwambili, Mbagala DSM, TZ
	### Updates status : on update
	### Description : SessionLib is the codeigniter custome library for user session management
	### Usage : Copy and paste it on library folder /application/library/SessionLib.php;
	###			You can load it on autoload.php
	###			/application/config/autoload.php on $autoload['libraries'] = array('sessionlib');
	###			or by normal way $this->load->library('sessionlib');
	###			more info about function usage visit http://www.hemmycode.php/codeigniter/sessionlib/tutorial
	
	
	
		##### Reading , unset and set example session_cache_expire
		##### After loading on you controller
		##### $this->sessionlib->sess_set($this->sessionlib->userdata,array($this->sessionlib->first_name => 'Hemedi'));     ///writing session with first name
		##### $this->sessionlib->sess_set($this->sessionlib->userdata,array($this->sessionlib->last_name => 'Manyinja'));     ///writing session with last name
		##### $this->sessionlib->sess_set($this->sessionlib->userdata,array($this->sessionlib->user_profile_pic => '/images/ketogenic.jpg'));     ///writing session with profile name
		##### $this->sessionlib->sess_unset($this->sessionlib->userdata,$this->sessionlib->last_name);						///unset session with first name
		##### $this->sessionlib->sess_get($this->sessionlib->userdata,$this->sessionlib->first_name);							///reading session with first name
		##### $this->sessionlib->sess_get($this->sessionlib->userdata,$this->sessionlib->last_name);							///reading session with first name
		##### echo $this->sessionlib->getUserProfile(" style = 'height:150px;width:150px;border-radius:45px;' ");							///reading session with first name
	class SessionLib{
		
		private $ip_address = "";
		private $session_id_user = "";
		private $user_agent = "";
		
		public $admin_role_page = "admin";
		public $owner_role_page = "owner";
		public $user_role_page = "user";
		public $worker_role_page = "worker";
		
		public $user_page_role = "";
		public $data_user_data = "";
		
		private $default_controller = "web";
		
		public $user_role = "user_system_role";
		public $first_name = "user_system_fname";
		public $last_name = "user_system_lname";
		public $account_id = "user_system_account_id";
		public $account_type = "user_system_account_type";
		public $user_profile_pic = "user_profile_pic";
		
		public $array_user_data = array();
										
		public $array_user_data_delete = array();
		public $time_tamp_expire = 300;
		
		public $tempdata = "tempdata";
		public $flashdata = "flashdata";
		public $userdata = "userdata";
		
		
		
		public function __construct(){
			//session_start();  for normal use
			$this->CI=& get_instance();
			$this->ip_address = $_SERVER['REMOTE_ADDR'];
			$this->session_id_user = session_id();
			$this->array_user_data = array($this->user_role,
										$this->first_name,
										$this->account_id,
										$this->account_type);
			$this->array_user_data_delete = $this->array_user_data;
			array_push($this->array_user_data_delete,$this->last_name,$this->user_profile_pic);
			$this->user_page_role = array(
											$this->admin_role_page => "admin_account",
											$this->worker_role_page => "worker_account",
											$this->user_role_page => "user_account",
											$this->owner_role_page => "owner_account"
										);
			//$this->check_is_has_data();
		}
			
		public function startFunction($profile_pic_properties,$action){
			$this->data_user_data = array(
								'fullName' => $this->getFullName(),
								'firstName' => $this->getFirstName(),
								'lastName' => $this->getLastName(),
								'accountId' => $this->getAccountId(),
								'accountType' => $this->getAccountType(),
								'accountRole' => $this->getUserRole(),
								'profilePicture' => $this->getUserProfile($profile_pic_properties),
								'role' => $this->user_page_role,
								'action_show_option' => $action
							);
		}
		
		private function check_is_has_data(){
			if($this->default_controller !== $this->CI->uri->segment(1))
				for($i = 0; $i < count($this->array_user_data); $i++){
					$function_call = $this->hasData($this->array_user_data[$i]);
					if($function_call){
						$this->unsetData($this->array_user_data_delete);
						$this->redirect_on_session_destroy();
					}
				}
		}
		
		public function getFullName(){
			return $this->getData($this->first_name) . " " . $this->getData($this->last_name);
		}
		
		public function getFirstName(){
			return $this->getData($this->first_name);
		}
		
		public function getLastName(){
			return $this->getData($this->last_name);
		}
		
		public function getAccountId(){
			return $this->getData($this->account_id);
		}
		
		public function getAccountType(){
			return $this->getData($this->account_type);
		}
		
		public function getUserRole(){
			return $this->getData($this->user_role);
		}
		
		public function getUserProfile($profile_pic_properties){
			/*
				$profile_pic_properties
				is the variable used to pass profile pic properties 
			
				eg:
					i. add style 
						$profile_pic_properties = " style='height:150;width:120;border-radius:30px'";
					ii. add class
						$profile_pic_properties = " class='img img-rounded'";
					iii. add id
						$profile_pic_properties = " id='profile_pic'";
					iv. add on DOM EVENT
					v.  Add  both of them together
						$profile_pic_properties = " class='img img-rounded' id='profile_pic' style='height:150;width:120;border-radius:30px' ";
			*/
			return "<img src='" . base_url().$this->getData($this->user_profile_pic) . "' ". $profile_pic_properties ."/>";
		}
		
		private function getData($data){
			return $this->CI->session->userdata($data);
		}
		
		public function hasData($data){
			return empty($this->getData($data));
		}
		
		private function setData($data){
			$this->CI->session->set_userdata($data);
		}
		
		public function unsetData($data){
			$this->CI->session->unset_userdata($data);
		}
		
		private function getFlashData($data){
			return $this->CI->session->flashdata($data);
		}
		
		private function setFlashData($data){
			$this->CI->session->set_flashdata($data);
		}
		
		private function getTempData($data){
			return $this->CI->session->tempdata($data);
		}
		
		private function setTempData($data){
			$this->CI->session->set_tempdata($data,NULL,$this->time_tamp_expire);
		}
		
		private function unsetTempData($data){
			$this->CI->session->unset_tempdata($data);
		}
		
		
		public function sess_get($data_header,$data_body){
			if($data_header == $this->tempdata){
				return $this->getTempData($data_body);
			}else if($data_header == $this->userdata){
				return $this->getData($data_body);
			}else if($data_header == $this->flashdata){
				return $this->getFlashData($data_body);
			}
		}
		
		public function sess_set($data_header,$data_body){
			if($data_header == $this->tempdata){
				$this->setTempData($data_body);
			}else if($data_header == $this->userdata){
				$this->setData($data_body);
			}else if($data_header == $this->flashdata){
				$this->setFlashData($data_body);
			}
		}
		
		public function sess_unset($data_header,$data_body){
			if($data_header == $this->tempdata){
				$this->unsetTempData($data_body);
			}else if($data_header == $this->userdata){
				$this->unsetData($data_body);
			}
		}
		
		public function redirect_on_session_destroy(){
			clearstatcache();
			clearstatcache();
			clearstatcache();
			redirect(site_url()."/".$this->default_controller);
		}
	}
?>