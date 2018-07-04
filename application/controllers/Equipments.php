<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/05/2018
 * Time: 11:28
 */
include "ChromePhp.php";
class Equipments extends CI_Controller {
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
        $user_id =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "equipments";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['user_id'] = $user_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'edit';
        $this->load->view('includes/system', $this->data);
    }

    public function edit_item(){
            $array = $this->input->post();
            $id = $array['id'];
            $add = $array['add'];
			unset($array['id']);
            unset($array['add']);
            $array['quantity'] = $array['quantity'] + $add;
            $id_a = array('equipment_id' => $id);
			$data =$array;
			print_r($data);
            $this->equipment_model->update_by($id_a,$data);
            $id = '/equipments/edit/'.$id;
            $this->back_to_previous_page($id,"Equipment Updated");
    }

    public function delete(){
        $id = $this->uri->segment(3);
        $id_a = array('equipment_id' => $id);
        $this->equipment_model->delete_by($id_a);
        $id = '/system/view/equipments';
        $this->back_to_previous_page($id,"Equipment Deleted");
    }
    public function back_to_previous_page($id,$sms){
		$this->sessionlib->sess_set($this->sessionlib->flashdata,array('error_sms' => $sms));
		redirect(site_url().$id);
	}
}