<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:44
 */

class organization_model extends MY_Model {

    public function register($org_arr) {
        $tag = "@@@ organization_model: ";
        ChromePhp::log($org_arr);

        //Loading Impontant Models
        $this->load->model("organization_model");
        $this->load->model("phone_model");
        $this->load->model("email_model");
        $this->load->model("address_model");
        $this->load->model("organizations_has_phone_model");
        $this->load->model("organizations_has_email_model");
        $this->load->model("organizations_has_address_model");
        $this->load->model("organizations_has_user_model");
        $this->load->model("account_model");

        $user_account = $this->account_model->login($org_arr->account->username, $org_arr->account->password);

        $organization = array();
        $organization["name"] = $org_arr->comp_name;
        $org_id = $this->organization_model->insert($organization);

        foreach ($org_arr->phones as $key => $jsonObj) {

            $phone_id = $this->phone_model->insert($jsonObj);
            $this->organizations_has_phone_model->insert(array("organizations_id" => $org_id, "phones_Id" => $phone_id));
        }

        foreach ($org_arr->emails as $key => $jsonObj) {

            $email_id = $this->email_model->insert($jsonObj);
            $this->organizations_has_email_model->insert(array("organizations_id" => $org_id, "emails_Id" => $email_id));
        }

        foreach ($org_arr->address as $key => $jsonObj) {

            $address_id = $this->address_model->insert($jsonObj);
            $this->organizations_has_address_model->insert(array("organizations_id" => $org_id, "addresses_id" => $address_id));
        }

        $this->organizations_has_user_model->insert(array(
           "organizations_id" => $org_id,
           "users_id" => $user_account->user_id
        ));

    }

	public function select_organization(){
		$this->db->select("*");
		$this->db->join('organizations_has_addresses', 'organizations_has_addresses.organizations_id = organizations.id','inner');
		$this->db->join('addresses', 'organizations_has_addresses.addresses_id = addresses.id','inner');
		$this->db->join('organizations_has_phones', 'organizations_has_phones.organizations_id = organizations.id','inner');
		$this->db->join('phones', 'organizations_has_phones.phones_id = phones.id','inner');
		$this->db->join('organizations_has_emails', 'organizations_has_emails.organizations_id = organizations.id','inner');
		$this->db->join('emails', 'organizations_has_emails.emails_id = emails.id','inner');
		$this->db->from('organizations');
		return $this->db->get()->result();
	}
}