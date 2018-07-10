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
        $id = $this->uri->segment(3);
        $id_a = array('id' => $id);
        $this->request_model->update_by($id_a,array('status' => 'suspended'));
        $id = '/system/view/requests';
        $this->back_to_previous_page($id,"Request Suspended");
    }

    

    public function create_task(){
        $end_date = date('Y-m-d',strtotime($this->input->post('start_date'). ' + ' . $this->input->post('duration_number'). ' ' . $this->input->post('duration_name')));
        
        $status = 'shaduled';
        $data = array(
            'requests_id' => $this->input->post('request_id'),
            'workers_id' => $this->input->post('workers'),
            'date_start' => $this->input->post('start_date'),
            'date_end'  => $end_date,
            'notes' => $this->input->post('description'),
            'status' => $status
        );

        $request = $this->input->post('request_id');
        $bool = $this->task_model->add_task($request,$data);

        if($bool){
            $id = "/system/view/requests";
            $sms = "Task created successfull";
        }else{
            $id = "/requests/assign_request_to_task/".$this->input->post('request_id');
            $sms = "Error. Worker is either busy on the day selected";
        }
        $this->back_to_previous_page($id,$sms);
    }

    public function asset_request(){
        $s = $this->input->post('serial_no_request');
        $sql = "SELECT * FROM requests as R INNER JOIN organizations_has_assets as O on R.organizations_has_assets_organizations_id = O.organizations_id AND R.organizations_has_assets_assets_id = O.assets_id AND O.serial_no = '$s' AND `status` != 'completed'";
        $query = $this->db->query($sql);
        //print_r($query->num_rows);
        if($query->num_rows){
            $id = "/system/view/requests";
            $sms = "Asset is already made request can't repeat process";
        }else{
            $this->request_task($s,$this->input->post('description'));
            $id = "/system/view/requests";
            $sms = "Asset is already made request success";
        }
        //echo $sms;
        $this->back_to_previous_page($id,$sms);
    }

    function request_task($serial_no,$desc) {
		$this->load->model('organizations_has_asset_model');
        $check = $this->organizations_has_asset_model->get_by('serial_no',$serial_no);
		
		$description = $desc;
		$orgid = $check->organizations_id;
		$asset = $check->assets_id;
		$account = $this->sess->data_user_data['accountId'];
		
		$insert = array(
				'accounts_id' => $account,
				'organizations_has_assets_organizations_id' => $orgid,
				'organizations_has_assets_assets_id' => $asset,
				'description' => $description,
				'status' => 'pending'
		);
		
		$this->load->model('request_model');
		$this->request_model->insert($insert);
    }

    public function back_to_previous_page($id,$sms){
		$this->sessionlib->sess_set($this->sessionlib->flashdata,array('error_sms' => $sms));
		redirect(site_url().$id);
	}
}