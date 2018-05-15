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

		//$this->load->model('Tables','insert');
		//$this->insert->register_user($array);


	}
	
	public function login_user(){
		$user_data = urldecode($this->input->post('myData'));
		$array = json_decode($user_data);

		//Loading All Impontant Models
		$this->load->model('account_model');
		$this->load->model('phone_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('users_has_email_model');
		$this->load->model('users_has_phone_model');

		//Assumming we don't know the user logs in by email or phone
        //We query the database to see if email or phone exists
		$email = $this->email_model->get_by(array('email' => $this->input->post('username')));
		$phone = $this->phone_model->get_by(array('phone' => $this->input->post('username')));

		//If email or phone exists in the database
		if ($email.count() > 0 || $phone.count() > 0) {

		    //Aim is to get the user_id so as we can Query the Account Table for validating the password

		    //If Email Exists
		    if ($email.count() > 0) {
		        $id = $email['id'];
		        $users_has_emails = $this->users_has_email_model->get_by(array('emails_id' => $id));
		        $user_id = $users_has_emails['people_id'];
            } else { //Phone Exists
		        $id = $phone['id'];
                $users_has_phones = $this->users_has_phone_model->get_by(array('phones_id' => $id));
                $user_id = $users_has_phones['people_id'];
            }


            //Using user id to get account
            $account = $this->account_model->get_by(array('user_id' => $user_id));

		    if ($account['password'] == $this->input->post('password_user')) {
		        //Password Correct

            } else {
		        //Incorrect Password
            }

        } else {
		    //Error: The username does not exist

        }
	}
	
	public function dashboard(){
		echo "Here is dashboard";
	}
}