<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:44
 */

class user_model extends MY_Model {

    public function username_exists($username) {
        $this->load->model("email_model");
        $this->load->model("phone_model");

        $email = $this->email_model->get_by(array('email'=>$username));
        $phone = $this->phone_model->get_by(array('number'=>$username));

        if (count((array)$email) > 0 || count((array)$phone) > 0) {
            return true;

        } else {
            return false;
        }


    }

}