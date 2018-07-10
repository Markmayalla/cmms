<?php
include "ChromePhp.php";
class Tasks extends CI_Controller {
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
        $name = "tasks";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['task_id'] = $user_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'edit';
        $this->load->view('includes/system', $this->data);
	}

	public function edit_item(){
		$id = $this->input->post('task_id');
		$workers_id = $this->input->post('workers');
		$date_start = $this->input->post('date_start');
		$date_end = $this->input->post('date_end');
		$notes = $this->input->post('description');

		 if($this->task_model->update_task_status($id, $workers_id, $date_start, $date_end, $notes)){
			$id = '/tasks/edit/'.$id;
			$sms = "Task Updated Success";
			$this->back_to_previous_page($id,$sms);
		 }
	}

	public function delete(){

	}

	public function assign_equipment(){
		$user_id =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "tasks";
        $this->data['main_content'] = 'system/dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$for_loading_data['task_id'] = $user_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'assaign_equipment';
        $this->load->view('includes/system', $this->data);
	}

	public function create_equipment(){

	}

	public function assign_spare(){
        $user_id =  $this->uri->segment(3);
        $this->load->library("table");
        $this->data['template'] = $this->shareddata->template;
        $name = "tasks";
        $this->data['main_content'] = 'system/dash_two';
        $for_loading_data['table'] = $name;
        $for_loading_data['user_info'] = $this->data;
        $for_loading_data['task_id'] = $user_id;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
        $this->data['name'] = $name;
        $this->data['page'] = 'assaign_spare';
        $this->load->view('includes/system', $this->data);
	}

    public function assign_spares() {
        $task_id = $this->input->post('taskId');
        $spares = $this->input->post('spares');
        $spareJSONarray = json_decode($spares);


        print_r('TasksID' . $task_id);

        $this->load->model('order_model');
        $this->load->model('orders_has_spare_part_model');
        $data = array('tasks_id' => $task_id);
        $order_Id = $this->order_model->insert($data);
        foreach ($spareJSONarray as $jsonObject) {
            print_r($order_Id . " " . $jsonObject->name . " " . $jsonObject->price . " " . $jsonObject->spare_id . "\n");
            $data2 = array('orders_id' => (int) $order_Id,
                            'orders_tasks_id' => (int) $data['tasks_id'],
                            'spare_parts_id' => (int) $jsonObject->spare_id,
                            'quantity' => (int) $jsonObject->quantity);
            $this->orders_has_spare_part_model->insert($data2);
        }

    }

    public function add_purchase_order() {
        $task_id = $this->input->post('taskId');
        $spare_name = $this->input->post('spare_name');
        $quantity = $this->input->post('quantity');



        echo "PRINT_PAYLOAD ";
        print_r($_POST);

        $this->load->model('purchase_order_model');;

        $data = array('tasks_id' => $task_id, 'spare_name' => $spare_name, 'quantity' => $quantity);

       $id = $this->purchase_order_model->insert($data);
        print_r('Success: ' + $id);

    }

	public function create_spare(){
		
	}

	public function back_to_previous_page($id,$sms){
		$this->sessionlib->sess_set($this->sessionlib->flashdata,array('error_sms' => $sms));
		redirect(site_url().$id);
	}
}
?>