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

    public function select_user($type){
        $type = $type == "users" ? "user_account" : "worker_account";
        $select = "SELECT * FROM users as u INNER JOIN accounts as a ON u.id = a.user_id AND a.type =  '$type' AND u.state ='show'";
        return $this->db->query($select)->result();
    }

    public function select_user_by_id($type,$id){
        $data['users'] = $this->user_model->get_many_by('id',$id);
        $phone_ids = $this->users_has_phone_model->get_many_by('users_id',$id);
        $emails_ids = $this->users_has_email_model->get_many_by('users_id',$id);
        $address_ids = $this->users_has_address_model->get_many_by('users_id',$id);

        $i = 0;
        foreach($phone_ids as $id){
            $data['phones'][$i] = $this->phone_model->get($id->phones_id);
            $i++;
        }

        $i = 0;
        foreach($emails_ids as $id){
            $data['emails'][$i] = $this->email_model->get($id->emails_id);
            $i++;
        }

        $i = 0;
        foreach($address_ids as $id){
            $data['addresses'][$i] = $this->address_model->get($id->addresses_id);
            $i++;
        }

        return $data;
    }
}