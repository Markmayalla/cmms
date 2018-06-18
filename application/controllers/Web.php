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
		$this->load->model('organization_model');
		$this->organization_model->register($array);
	}
	
	public function register_user(){	
		//$data = "";
        ChromePhp::log("Ajax myData: " . $this->input->post('myData'));
		$user_data = urldecode($this->input->post('myData'));
		ChromePhp::log("User Data: " . $user_data);
		$user_data_array = json_decode($user_data);
		ChromePhp::log($user_data_array);

		$this->load->model('account_model');
		ChromePhp::log("Triggering Account Model Function called: register()");
		$this->account_model->register($user_data_array);

	}

	public function phone_exists() {
        $this->load->model('phone_model');
        $row = $this->phone_model->get_by(array('number'=>$this->input->post('phone')));
        if (count($row) > 0) {
           echo  http_response_code(404);
        } else {
           echo http_response_code(200);
        }
    }

    public function email_exists() {
        $this->load->model('email_model');
        $row = $this->email_model->get_by(array('email'=>$this->input->post('email')));
        if (count($row) > 0) {
            echo http_response_code(404);
        } else {
            echo http_response_code(200);
        }
    }

    public function username_exists() {
       $this->load->model("user_model");
        $tag = "###web/username_exists: ";
       //Checkign if i could work with password
       //This is called using data parsley remote function
        ChromePhp::log($tag . "Password :::: " . $this->input->post("password"));
        ChromePhp::log($tag . "Username :::: " . $this->input->post("username"));
       if ($this->user_model->username_exists($this->input->post("username"))) {
           echo http_response_code(200);
       } else {
           echo http_response_code(404);
       }
    }

    public function check_password() {

        $tag = "###web/check_password: ";

        ChromePhp::log($tag . "Checking Password");
        ChromePhp::log($tag . "PASSWORD RECEIVED: " . $this->input->post("password"));
        ChromePhp::log($tag . "USERNAME RECEIVED: " .  $this->input->post("username"));

        $this->load->model("account_model");
        $this->load->model("email_model");
        $this->load->model("phone_model");
        $this->load->model("users_has_phone_model");
        $this->load->model("users_has_email_model");

        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $email = $this->email_model->get_by(array("email"=>$username));
        $phone = $this->phone_model->get_by(array("number"=>$username));

        if (count($email) > 0 || count($phone) > 0) {
            ChromePhp::log($tag . "Account Exists...");
            if (count($email) > 0) {
                ChromePhp::log($tag . "Email was used as account username");
                $row = $this->users_has_email_model->get_by(array("emails_id"=>$email->id));
                $user_id = $row->users_id;
            } else {
                ChromePhp::log($tag . "Phone was used as account username");
                $row = $this->users_has_phone_model->get_by(array("phones_id"=>$phone->id));
                $user_id = $row->users_id;
            }
            ChromePhp::log($tag . "USER_ID: " . $user_id);
            $account = $this->account_model->get_by(array("user_id"=>$user_id));
            ChromePhp::log($account);

            if ($account->password == $password) {
                // Password Correct
                ChromePhp::log($tag . "Password Correct");
                echo http_response_code(200);
            } else {
                ChromePhp::log($tag . "Password Incorrect");
                echo http_response_code(404);
            }
        } else {
            //User does not exists
            ChromePhp::log($tag . "User does not exist");
        }
    }
	
	public function login_user(){
		//$user_data = urldecode($this->input->post('myData'));
		//$array = json_decode($user_data);

        $tag = "###web/login_user: ";

		$username = $this->input->post('username');
		$password = $this->input->post('password_user');
		
		//Loading All Impontant Models
		$this->load->model("account_model");

		ChromePhp::log($tag . "Username = " . $username);
		ChromePhp::log($tag . "Password = " . $password);

		$account = $this->account_model->login($username, $password);
		if ($account == false) {
            //ChromePhp::log($tag . "Login Failed");
			echo "web";
        } else {
		    //Set Session Params Here
            //Redirect Users Here
            //ChromePhp::log($tag . "From Login User: Login Success");
			//echo $account->id;
            $this->set_user_session($account);
			echo "system";
		}
	}
	
	private function set_user_session($account){
		$user_row = $this->user_model->get_by(array('id' => $account->user_id));
		$array_user = array(
								$this->sess->user_role => $account->type,
								$this->sess->account_type => $type,
								$this->sess->account_id => $account->id,
								$this->sess->first_name => $user_row->first_name,
								$this->sess->last_name => $user_row->last_name
							);
		$this->sess->sess_set($this->sess->userdata,$array_user);
	}
	
	public function dashboard(){
		echo "Here is dashboard";
	}
}