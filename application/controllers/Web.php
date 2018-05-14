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

	public function register_organization(){
		
		//$data = "%7B%22comp_name%22%3A%22Neymon%20Investment%22%2C%22phones%22%3A%5B%7B%22title%22%3A%22mob%22%2C%22number%22%3A%220685639653%22%7D%2C%7B%22title%22%3A%22tel%22%2C%22number%22%3A%22222678282%22%7D%5D%2C%22emails%22%3A%5B%7B%22email%22%3A%22hemmy6894@gmail.com%22%7D%5D%2C%22address%22%3A%5B%7B%22box%22%3A%221775%22%2C%22street%22%3A%22Posta%22%2C%22district%22%3A%22Kinondoni%22%2C%22region%22%3A%22Dar%20es%20salaam%22%2C%22country%22%3A%22Tanzania%22%7D%2C%7B%22box%22%3A%221775%22%2C%22street%22%3A%22Posta%22%2C%22district%22%3A%22Kinondoni%22%2C%22region%22%3A%22Dar%20es%20salaam%22%2C%22country%22%3A%22Tanzania%22%7D%5D%7D";
		$user_data = urldecode($this->input->post('myData'));
		$array = json_decode($user_data);
		$this->load->model('Tables','insert');
		$this->insert->register_organization($array);
	}
	
	public function register_user(){	
		//$data = "";
		$user_data = urldecode($this->input->post('myData'));
		$array = json_decode($user_data);
		$this->load->model('Tables','insert');
		$this->insert->register_user($array);
	}
	
	public function login_user(){
		$user_data = urldecode($this->input->post('myData'));
		$array = json_decode($user_data);
		$this->load->model('Tables','insert');
		$this->insert->login_user($array);
	}
	
	public function dashboard(){
		echo "Here is dashboard";
	}
}