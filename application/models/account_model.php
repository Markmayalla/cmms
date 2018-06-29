<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:48
 */

class account_model extends MY_Model {

    public function update_account($where,$id,$insert_worker){
        $acc['accounts_id'] = $id['user_id'];
        if($insert_worker){
            $this->worker_model->insert($acc);
        }else{
            $this->worker_model->update_worker($acc);
        }
        $this->db->where($id);
        return $this->db->update('accounts',$where);
    }
    public function register($reg_arr) {
        ChromePhp::log("account_model->register triggered");
        ChromePhp::log("Data Received");
        ChromePhp::log($reg_arr);
        $this->load->model('user_model');
        $this->load->model('phone_model');
        $this->load->model('email_model');
        $this->load->model('address_model');
        $this->load->model('users_has_email_model');
        $this->load->model('users_has_phone_model');
        $this->load->model('users_has_address_model');


        $user = array();

        $user['first_name'] = $reg_arr->first_name;
        $user['middle_name'] = $reg_arr->middle_name;
        $user['last_name'] = $reg_arr->last_name;
        $user['gender'] = $reg_arr->gender;

        ChromePhp::log("FLAG REACHED");

        $user_id = $this->user_model->insert($user);

        foreach ($reg_arr->phones as $key => $jsonObj) {

            $phone_id = $this->phone_model->insert($jsonObj);
            $this->users_has_phone_model->insert(array("users_id" => $user_id, "phones_Id" => $phone_id));
        }

        foreach ($reg_arr->emails as $key => $jsonObj) {

            $email_id = $this->email_model->insert($jsonObj);
            $this->users_has_email_model->insert(array("users_id" => $user_id, "emails_Id" => $email_id));
        }

        foreach ($reg_arr->addresses as $key => $jsonObj) {

            $address_id = $this->address_model->insert($jsonObj);
            $this->users_has_address_model->insert(array("users_id" => $user_id, "addresses_id" => $address_id));
        }

        $account_details = array(
          "password" => $reg_arr->password_new,
          "user_id" => $user_id,
		  "type" => "user_account"
        );

        $account_id = $this->account_model->insert($account_details);

        ChromePhp::log("Master Query Success: Account_id = " . $account_id);
    }

    public function login($username, $password) {
        ChromePhp::log("@@@ Function Login in account model is triggered");
        $this->load->model('email_model');
        $this->load->model('phone_model');
        $this->load->model('account_model');
        $this->load->model('users_has_phone_model');
        $this->load->model('users_has_email_model');

        $email = $this->email_model->get_by(array('email'=>$username));
        $phone = $this->phone_model->get_by(array('number'=>$username));

        if (count((array)$email) > 0 || count((array)$phone) > 0) {

            if (count((array)$email) > 0) {
                $row = $this->users_has_email_model->get_by(array('emails_id'=>$email->id));
                $user_id = $row->users_id;
            } else {
                $row = $this->users_has_phone_model->get_by(array('phones_id'=>$phone->id));
                $user_id = $row->users_id;
            }

            $account = $this->account_model->get_by(array('user_id'=>$user_id));

            if ($account->password == $password) {
                //Login Successfull
                return $account;
            } else {
                //Password Error
                return false;
            }

        } else {
            //Username does not exists error
            return false;
        }

    }

}
