<?php

include "ChromePhp.php";
class Assets extends CI_Controller {
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
        $asset_id =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "assets";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['asset_id'] = $asset_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'edit';
        $this->load->view('includes/system', $this->data);
    }

    public function add(){
        $this->asset_model->insert($this->input->post());
        $id = "/system/view/assets";
        $sms = "Asset Added Success";
        $this->back_to_previous_page($id,$sms);
    }

    public function delete(){
        echo $this->uri->segment(3);
    }

    public function edit_item(){
        $full = $this->input->post();
        $id['id'] = $full['id'];
        unset($full['id']);
        $this->asset_model->update_by($id,$full);
        $id = '/assets/edit/'.$id['id'];
        $this->back_to_previous_page($id,"Assests Updated");
    }

    public function back_to_previous_page($id,$sms){
		$this->sessionlib->sess_set($this->sessionlib->flashdata,array('error_sms' => $sms));
		redirect(site_url().$id);
	}
}
?>