<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:44
 */

class asset_model extends MY_Model {

	public function select(){

	}

	public function assign_asset($postedData) {
	    $this->load->model("organizations_has_asset_model");
        $data = array();
	    foreach ($postedData as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

	    return $this->organizations_has_asset_model->insert($data);

    }

    public function select_organizations_assets($organization_id) {
	    $this->load->model("asset_model");
	    $this->load->model("organizations_has_assets");

	    $assets_ids = $this->organizations_has_assets->get_many_by(array("organizations_id" => $organization_id));

	    $assets_records = array();

	    foreach ($assets_ids as $key => $value) {
	        $assets_records[$key] = $this->asset_model->get($value->assets_id);
        }

        $assets = $assets_ids;
	    $assets_details = $$assets_records;

        $organization_assets = array($assets, $assets_details);

        return $organization_assets;
    }

    public function select_asset_organizations($asset_id) {
	    $this->load->model("organization_model");
	    $this->load->model("organizations_has_asset_model");

	    $organizations_id = $this->organizations_has_asset_model->get_many_by(array('assets_id' => $asset_id));

	    $organizations = array();

	    foreach ($organizations_id as $key => $value) {
	        $organizations[$key] = $value;
        }

        return $organizations;
    }

    public function delete_asset($asset_id) {
	    $this->load->model("organizations_has_asset_model");
	    $this->load->model("asset_model");

	    $this->organizations_has_asset_model->delete_by(array('assets_id' => $asset_id));
	    $this->asset_model->delete($asset_id);
    }

    public function delete_organization_asset($asset_id, $organization_id) {
	    $this->load->model("organization_has_asset_model");
	    $this->organization_has_asset_model->delete_by(array('assets_id' => $asset_id, 'organization_id' => $organization_id));
    }
}