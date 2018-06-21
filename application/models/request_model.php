<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:44
 */

class request_model extends MY_Model {

    public function add_request($req_type, $acc_id, $org_id, $asset_id, $description, $status) {
        $this->load->model("request_model");
        $this->load->model("request_type_model");

        $data = array(
            'request_types_id' => $req_type,
            'accounts_id' => $acc_id,
            'organizations_has_assets_organizations_id' => $org_id,
            'organizations_has_assets_assets_id' => $asset_id,
            'description' => $description,
            'status' => 'pending'
        );

        $this->request_model->insert($data);
    }

    public function update_reqest_status($id, $req_type, $acc_id, $org_id, $asset_id, $description, $status) {
        $this->load->model('request_model');

        $req = $this->request_model->get($id);

        $data = array(
            'request_types_id' => !is_null($req_type) ? $req_type : $req->request_types_id,
            'accounts_id' => !is_null($acc_id) ? $acc_id : $req->accounts_id,
            'organizations_has_assets_organizations_id' => !is_null($org_id) ? $org_id : $req->organizations_has_assets_organizations_id,
            'organizations_has_assets_assets_id' =>!is_null($asset_id) ? $asset_id : $req->organizations_has_assets_assets_id,
            'description' => !is_null($description) ? $description : $req->description,
            'status' => !is_null($status) ? $status : $req->status
        );

        $this->request_model->update($id, $data);
    }

    public function delete_request($id) {
        $this->load->model('request_model');
        $this->request_model->delete($id);
    }

    public function get_all_requests() {
        $this->load->model('request_model');

        return $this->request_model->get_all();
    }
	
	public function select_request(){
		$data = array();
		$request = $this->get_all_requests();
		$i = 0;
		foreach($request as $key){
			$account = $this->account_model->get($key->accounts_id)->user_id;
			$orgname = $this->organization_model->get($key->organizations_has_assets_organizations_id);
			$asset = $this->asset_model->get($key->organizations_has_assets_assets_id);
			$username = $this->user_model->get($account);
			
			$data[$i]['username'] = $username;
			$data[$i]['organization'] = $orgname;
			$data[$i]['asset'] = $asset;
			$data[$i]['request'] = $key;
			$i++;
		}
		
		return (object)$data;
	}
}