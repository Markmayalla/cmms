<?php
	#### Created by Programing
	class Tables extends CI_Model{
		////Start Login user
		public function login_user($array){
			$whare[''] = "";
			echo "Web/dashboard";
		}
		////End login user
		////Start registering user_error
		
		public function register_user($array){
				$arrayUser['phones'] = array();
				$arrayUser['address'] = array();
				$arrayUser['emails'] = array();
				
				$array_id = array();
				$phone = $array->phones;
				$email = $array->emails;
				$address = $array->address;
				 
				$i = 0;
				foreach($phone as $key => $value){
					$arrayUser['phones'][$i]['title'] = $value->title;
					$arrayUser['phones'][$i]['number'] = $value->number;
					$i++;
				}
				$j = 0;
				foreach($email as  $value){
					$arrayUser['emails'][$j]['email'] = $value->email;
					$j++;
				}
				
				$k = 0;
				foreach($address as  $value){
					$arrayUser['address'][$k]['box'] = $value->box;
					$arrayUser['address'][$k]['street'] = $value->street;
					$arrayUser['address'][$k]['district'] = $value->district;
					$arrayUser['address'][$k]['region'] = $value->region;
					$arrayUser['address'][$k]['country'] = $value->country;
					$k++;
				}
				
				
				$arrayUser['user']['first_name'] = $array->first_name;
				$arrayUser['user']['last_name'] = $array->last_name;
				$arrayUser['user']['middle_name'] = $array->middle_name;
				$arrayUser['user']['gender'] = $array->gender;
				$arrayUser['account']['password'] = $array->password_new;
				$arrayUser['account']['type'] = $array->accont_type;
				
				
				
				if($this->db->insert('users',$arrayUser['user'])){
				  $people_id = $this->db->insert_id();
				  $arrayUser['account']['user_id'] = $people_id;
				  
				  $array_id['phones'] = array();
				  $array_id['address'] = array();
				  $array_id['emails'] = array();
				  
				  $this->db->insert('accounts',$arrayUser['account']);
				  for($i = 0; $i < count($arrayUser['phones']); $i++){
					  $this->db->insert('phones',$arrayUser['phones'][$i]);
					  $array_id['phones'][$i]['people_id'] = $people_id;
					  $array_id['phones'][$i]['phones_id'] = $this->db->insert_id();
				  }
				  
				  for($i = 0; $i < count($arrayUser['address']); $i++){
					  $this->db->insert('addresses',$arrayUser['address'][$i]);
					  $array_id['address'][$i]['people_id'] = $people_id;
					  $array_id['address'][$i]['addresses_id'] = $this->db->insert_id();
				  }
				  for($i = 0; $i < count($arrayUser['emails']); $i++){
					  $this->db->insert('emails',$arrayUser['emails'][$i]);
					  $array_id['emails'][$i]['people_id'] = $people_id;
					  $array_id['emails'][$i]['emails_id'] = $this->db->insert_id();
				  }
				  
				  if(count($array_id)){
					foreach($array_id['phones'] as $phone)
						$this->db->insert('users_has_phones',$phone); 
					foreach($array_id['address'] as $address)
						$this->db->insert('users_has_addresses',$address); 
					foreach($array_id['emails'] as $emails)
						$this->db->insert('users_has_emails',$emails);
					echo 'inserted';					 
				  }
				}else{
					echo "fail to insert user";
				}
		}
		
		///End registering user
		
		//Start registering Organization
		public function register_organization($array){
				$arrayUser['phones'] = array();
				$arrayUser['address'] = array();
				$arrayUser['emails'] = array();
				
				$array_id = array();
				$phone = $array->phones;
				$email = $array->emails;
				$address = $array->address;
				 
				$i = 0;
				foreach($phone as $key => $value){
					$arrayUser['phones'][$i]['title'] = $value->title;
					$arrayUser['phones'][$i]['number'] = $value->number;
					$i++;
				}
				$j = 0;
				foreach($email as  $value){
					$arrayUser['emails'][$j]['email'] = $value->email;
					$j++;
				}
				
				$k = 0;
				foreach($address as  $value){
					$arrayUser['address'][$k]['box'] = $value->box;
					$arrayUser['address'][$k]['street'] = $value->street;
					$arrayUser['address'][$k]['district'] = $value->district;
					$arrayUser['address'][$k]['region'] = $value->region;
					$arrayUser['address'][$k]['country'] = $value->country;
					$k++;
				}
				
				$arrayUser['organization']['name'] = $array->comp_name;
				$arrayUser['account']['password'] = $array->password_new;
				$arrayUser['account']['type'] = $array->account_type;
				
				if($this->db->insert('organizations',$arrayUser['organization'])){
				  $organization_id	= $this->db->insert_id();
				 
				  $arrayUser['account']['user_id'] = $organization_id;
				  
				  $array_id['phones'] = array();
				  $array_id['address'] = array();
				  $array_id['emails'] = array();
				  
				  $this->db->insert('accounts',$arrayUser['account']);
				  
				  for($i = 0; $i < count($arrayUser['phones']); $i++){
					  $this->db->insert('phones',$arrayUser['phones'][$i]);
					  $array_id['phones'][$i]['organizations_id'] = $organization_id;
					  $array_id['phones'][$i]['phones_id'] = $this->db->insert_id();
				  }
				  
				  for($i = 0; $i < count($arrayUser['address']); $i++){
					  $this->db->insert('addresses',$arrayUser['address'][$i]);
					  $array_id['address'][$i]['organizations_id'] = $organization_id;
					  $array_id['address'][$i]['addresses_id'] = $this->db->insert_id();
				  }
				  for($i = 0; $i < count($arrayUser['emails']); $i++){
					  $this->db->insert('emails',$arrayUser['emails'][$i]);
					  $array_id['emails'][$i]['organizations_id'] = $organization_id;
					  $array_id['emails'][$i]['emails_id'] = $this->db->insert_id();
				  }
				  
				  if(count($array_id)){
					foreach($array_id['phones'] as $phone)
						$this->db->insert('organizations_has_phones',$phone); 
					foreach($array_id['address'] as $address)
						$this->db->insert('organizations_has_addresses',$address); 
					foreach($array_id['emails'] as $emails)
						$this->db->insert('organizations_has_emails',$emails);
					echo 'inserted';					 
				  }
				}else{
					echo "fail to insert company";
				}
		}
		
	}
?>