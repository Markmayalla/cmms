<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/05/2018
 * Time: 11:28
 */
include "ChromePhp.php";
class Organizations extends CI_Controller {
	private $sess;
	private $data;
	private $profile_pic_properties = ""; 
	public function __construct(){
		parent::__construct();
		$this->sess = $this->sessionlib;
		
		$this->profile_pic_properties;
		$this->sess->startFunction($this->profile_pic_properties,true);
		$this->data = $this->sess->data_user_data;
		$this->data['counted'] = $this->countervalue->result;
		//print_r($this->data);
    }

    public function edit(){
        $org =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "organizations";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['org_id'] = $org;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'edit';
        $this->load->view('includes/system', $this->data);
	}
	
	public function delete(){
		$id = $this->uri->segment(3);
        $id_a = array('id' => $id);
        $this->organization_model->update_by($id_a,array('state' => 'hide'));
        $id = '/system/view/organizations';
        $this->back_to_previous_page($id,"Organization Deleted");
	}

	public function back_to_previous_page($id,$sms){
		$this->sessionlib->sess_set($this->sessionlib->flashdata,array('error_sms' => $sms));
		redirect(site_url().$id);
	}
}