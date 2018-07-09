<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/05/2018
 * Time: 11:28
 */
include "ChromePhp.php";
class Requests extends CI_Controller {
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

    public function assign_request_to_task(){
		$user_id =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "requests";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['request_id'] = $user_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'edit';
        $this->load->view('includes/system', $this->data);
    }

    public function view(){
        $user_id =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "requests";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['request_id'] = $user_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'view';
        $this->load->view('includes/system', $this->data);
    }

    public function change_request_status(){

    }

    public function create_task(){
        $end_date = date('Y-m-d',strtotime($this->input->post('start_date'). ' + ' . $this->input->post('duration_number'). ' ' . $this->input->post('duration_name')));
        
        $status = 'pending';
        $data = array(
            'requests_id' => $this->input->post('request_id'),
            'workers_id' => $this->input->post('workers'),
            'date_start' => $this->input->post('start_date'),
            'date_end'  => $end_date,
            'notes' => $this->input->post('description'),
            'status' => $status
        );

        $request = $this->input->post('request_id');
        $this->task_model->add_task($request,$data);

        $id = "/system/view/requests";
        $sms = "Task created successfull";
        $this->back_to_previous_page($id,$sms);
    }

    public function back_to_previous_page($id,$sms){
		$this->sessionlib->sess_set($this->sessionlib->flashdata,array('error_sms' => $sms));
		redirect(site_url().$id);
	}
}