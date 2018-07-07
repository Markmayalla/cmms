<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/05/2018
 * Time: 11:28
 */
include "ChromePhp.php";
class Users extends CI_Controller {
	private $sess;
	private $data;
	private $profile_pic_properties = ""; 
	public function __construct(){
		parent::__construct();
		$this->sess = $this->sessionlib;
		
		$this->profile_pic_properties;
		$this->sess->startFunction($this->profile_pic_properties,true);
		$this->data = $this->sess->data_user_data;
		$this->data['counted'] = $this->countervalue->result;
		//print_r($this->data);
    }
    
    public function edit(){
        $user_id =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "users";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['user_id'] = $user_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'edit_user';
        $this->load->view('includes/system', $this->data);
	}
	
	public function update_profile(){
		$where['id'] = $this->input->post('users_id');
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['middle_name'] = $this->input->post('middle_name');
		$data['gender'] = $this->input->post('gender');

		$this->user_model->update_by($where, $data);
		$id = '/'.$this->input->post('send_to').'/edit/'.$where['id'];
		$this->back_to_previous_page($id,"personal data updated");
	}

	public function update_organization(){
		$where['id'] = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$this->organization_model->update_by($where, $data);
		$id = '/'.$this->input->post('send_to').'/edit/'.$where['id'];
		$this->back_to_previous_page($id,"organization data updated");
	}

	public function phone_data_to_edit(){
		$array = array();
		$number = $this->input->post('number');
		for($i = 0; $i < $number; $i++){
			$id = "id".$i;
			$title = "title".$i;
			$finder = "number".$i;
			$array[$i] = array('id' => $this->input->post($id), 'title' => $this->input->post($title), 'number' => $this->input->post($finder));
		}

		for($i = 0; $i < count($array); $i++){
			$id = $array[$i]['id'];
			unset($array[$i]['id']);
			$id_a = array('id' => $id);
			$data = $array[$i];
			$this->phone_model->update_by($id_a,$data);
		}
		$id = '/'.$this->input->post('send_to').'/edit/'.$this->input->post('users_id');
		$this->back_to_previous_page($id,"Phone data updated");
	}

	public function email_data_to_edit(){
		$array = array();
		$number = $this->input->post('number');
		for($i = 0; $i < $number; $i++){
			$id = "id".$i;
			$finder = "email".$i;
			$array[$i] = array('id' => $this->input->post($id),  'email' => $this->input->post($finder));
		}

		for($i = 0; $i < count($array); $i++){
			$id = $array[$i]['id'];
			unset($array[$i]['id']);
			$id_a = array('id' => $id);
			$data = $array[$i];
			//print_r($data);
			$this->email_model->update_by($id_a,$data);
		}
		$id = '/'.$this->input->post('send_to').'/edit/'.$this->input->post('users_id');
		$this->back_to_previous_page($id,"Emails data updated");
	}

	public function address_data_to_edit(){
		$array = array();
		$number = $this->input->post('number');
		for($i = 0; $i < $number; $i++){
			$id = "id".$i;
			$street = "street".$i;
			$district = "district".$i;
			$region = "region".$i;
			$box = "box".$i;
			$country = "country".$i;
			$array[$i] = array(
				'id' => $this->input->post($id), 
				'box' => $this->input->post($box),
				'street' => $this->input->post($street),
				'district' => $this->input->post($district),
				'region' => $this->input->post($region),
				'country' => $this->input->post($country)
			);
		}

		for($i = 0; $i < count($array); $i++){
			$id = $array[$i]['id'];
			unset($array[$i]['id']);
			$id_a = array('id' => $id);
			$data = $array[$i];
			//print_r($data);
			$this->address_model->update_by($id_a,$data);
		}
		$id = '/'.$this->input->post('send_to').'/edit/'.$this->input->post('users_id');
		$this->back_to_previous_page($id,"Address data updated");
	}

	public function back_to_previous_page($id,$sms){
		$this->sessionlib->sess_set($this->sessionlib->flashdata,array('error_sms' => $sms));
		redirect(site_url().$id);
	}
}