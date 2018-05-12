<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/12/17
 * Time: 7:46 PM
 */

include 'ChromePhp.php';

class Web extends CI_Controller {

    public function index() {
        $data['main_content'] = "index";
        $this->load->view("includes/web", $data);
    }

	public function register_user(){
		 $user_data = urldecode($this->input->post('myData'));
		 
		 $arrayUser = array();
		 $array = json_decode($user_data);
		 
		
		 $phone = $array->phones;
		 $email = $array->emails;
		 $address = $array->address;
		 
		$i = 0;
		foreach($phone as $key => $value){
			$arrayUser['title'][$i] = $value->title;
			$arrayUser['number'][$i] = $value->number;
			$i++;
		}
		$j = 0;
		foreach($email as  $value){
			$arrayUser['email'][$j] = $value->email;
			$j++;
		}
		
		$k = 0;
		foreach($address as  $value){
			$arrayUser['box'][$k] = $value->box;
			$arrayUser['street'][$k] = $value->street;
			$arrayUser['district'][$k] = $value->district;
			$arrayUser['region'][$k] = $value->region;
			$arrayUser['country'][$k] = $value->country;
			$k++;
		}
		
		$arrayUser['comp_name'] = $array->comp_name;
		print_r($arrayUser);
	}
}