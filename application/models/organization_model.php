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

    public function select_all_organizations_rec() {
        $this->load->model("organization_model");
        $this->load->model("email_model");
        $this->load->model("phone_model");
        $this->load->model("address_model");
        $this->load->model("organizations_has_email_model");
        $this->load->model("organizations_has_phone_model");
        $this->load->model("organizations_has_address_model");

        $organizations = $this->organization_model->get_all();
        $emails = array();
        $phones = array();
        $addresses = array();

        foreach($organizations as $key => $value) {
            $org_has_emails = $this->organizations_has_email_model->get_many_by(array("organizations_id" => $value->id));
            $org_has_phones = $this->organizations_has_phone_model->get_many_by(array("organizations_id" => $value->id));
            $org_has_addresses = $this->organizations_has_address_model->get_many_by(array("organizations_id" => $value->id));

            foreach ($org_has_emails as $index => $row) {
                $emails[$key][$index] = $this->email_model->get($row->emails_id);
            }

            foreach ($org_has_phones as $index => $row) {
                $phones[$key][$index] = $this->phone_model->get($row->phones_id);
            }

            foreach ($org_has_addresses as $index => $row) {
                $addresses[$key][$index] = $this->address_model->get($row->addresses_id);
            }


        }

        //Note, Organizations is the main Object
        //Emails array, phones array and addresses array depend on organizations array
        //Organization array key/index is the main reference to emails, phones and addresses
        //Example: emails[organization_array_key] equals emails of the organization

        $organizations_arr = array(
            'organizations' => $organizations,
            'emails' => $emails ,
            'phones' => $phones,
            'addresses' => $addresses
        );

        return $organizations_arr;

    }

    //For the Example Bellow, Consider the structure of @organizations_arr from Above
    //This is a Master Method used to Populate Organization Particulars such as Emails, addresses etc.
    //@key (int)= Main Object Key: example key of @organization_arr
    //@array (array)= The array to populate the values from: example $organization_arr['addresses']
    //@attributes (array) = Are the attributes contained in the array that you want to display: example $organization_arr['addresses'] attributes are country, region etc
    //@open_tag, @close_tag, @spliter (string) = Formatting parameters to format the way things are displayed
        //@open_tag                                 eg. <p>
        //attr_1 @spliter attr_2 @spliter attr_3    eg. Tanzania, Dar es salaam NOTE: @spliter = "," in this example
        //@close_tag                                eg. </p>
    public function populate($key, $array, $attributes, $open_tag, $close_tag, $spliter, $default) {

        if (array_key_exists($key, $array)) {

            $data = "";

            foreach ($array[$key] as $index => $value) {
                $data .= $open_tag;
                $counter = 1;
                foreach ($attributes as $attribute) {
                    if ($counter != count($attributes)) {
                        $data .= $value->{$attribute} . $spliter;
                    } else {
                        $data .= $value->{$attribute};
                    }
                    $counter++;
                }
                $data .= $close_tag;
            }

            return $data;

        } else {
            return $default;
        }
    }

    public function delete_rec($id) {
        $this->load->model('organization_model');
        $this->load->model('organizations_has_email_model');
        $this->load->model('organizations_has_phone_model');
        $this->load->model('organizations_has_address_model');
        $this->load->model('organizations_has_user_model');
        $this->load->model('email_model');
        $this->load->model('phone_model');
        $this->load->model('address_model');

        $this->cleaner("organizations_has_address_model", "address_model", "addresses_id", $id);
        $this->cleaner("organizations_has_phone_model", "phone_model", "phones_Id", $id);
        $this->cleaner("organizations_has_email_model", "email_model", "emails_id", $id);

        $this->organizations_has_user_model->delete_by(array('organizations_id' => $id));
        $this->organization_model->delete($id);

    }

    private function cleaner($relationship_model, $model, $cleaning_id, $id) {
        $pointer = $this->{$relationship_model}->get_many_by(array('organizations_id' => $id));

        $this->{$relationship_model}->delete_by(array('organizations_id' => $id));

        if (count($pointer) > 0) {
            foreach ($pointer as $value) {
                $this->{$model}->delete($value->{$cleaning_id});
            }
        }

    }

    /**
     * @param $id @type int
     * @param $organization @type array
     * @param $phones @type array
     * @param $emails @type array
     * @param $addresses @type array
     */
    public function update_organization($id, $organization, $phones, $emails, $addresses) {
        $this->load->model('organization_model');
    }



}
