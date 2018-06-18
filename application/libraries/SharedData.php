<?php
	class SharedData{
		
		public function __construct(){
			///Load Instance of Called controller
			$this->CI=& get_instance();
			$this->CI->load->database('default');
			
		}
		
		function hello(){
			echo "Hi, there am using class";
		}
		
		function models_data($data,$usertype){
			if($data == 'users'){
				return $this->CI->user_model->select($usertype);
			}else if($data == 'assets'){
				return $this->CI->asset_model->get_all();
			}else if($data == 'equipments'){
				return $this->CI->equipment_model->select($usertype);
			}else if($data == 'organization'){
				return $this->CI->organization_model->select_organization();
			}else if($data == 'tasks'){
				return $this->CI->task_model->get_all();
			}else if($data == 'workers'){
				return $this->CI->worker_model->select($usertype);
			}else{
				return "unknown model";
			}
		}
		
		function model_loader($table,$data){
			if($table == 'users'){
				$this->CI->user_model->insert($data);
			}else if($table == 'assets'){
				$this->CI->asset_model->insert($data);
			}
			else if($table == 'equipment'){
				$this->CI->equipment_model->insert($data);
			}else{
				return "unknown model";
			}
		}

		function asset_suggestions() {
			$data = $this->input->post("myData");
			$assets = $this->CI->asset_model->get_many_by(array("name LIKE" => $data));

			ChromePhp::log($assets);
			echo json_encode($assets);
		}

		function add_asset() {
			foreach ($_POST as $key => $value) {
				ChromePhp::log($key . "=" . $value);
			}
			foreach ($_GET as $key => $value) {
				ChromePhp::log($key . "=" . $value);
			}
			ChromePhp::log($this->input->get("name"));
			$this->asset_model->insert(array("name" => $this->input->post("name"), "model_number" => $this->input->post("model")));
			ChromePhp::log("Asset Added Successfully");
		}
		
		function add_item_to_db(){
			$data = array();
			foreach ($_POST as $key => $value) {
				$data[$key] = $value;
				ChromePhp::log($key . "=" . $value);
			}
			foreach ($_GET as $key => $value) {
				ChromePhp::log($key . "=" . $value);
			}
			$table_name = $data['id'];
			unset($data['id']);
			ChromePhp::log($table_name);
			$this->model_loader($table_name,$data);
			echo $table_name . " Added Successfully";
			//ChromePhp::log($table_name . " Added Successfully");
		}
		
		function models_data_delete($data, $where){
			if($data == 'users'){
				$this->load->model('user_model');
				return $this->user_model->delete_by($where);
			}else if($data == 'assets'){
				$this->load->model('asset_model');
				return $this->asset_model->delete_by($where);
			}else if($data == 'equipment'){
				$this->load->model('equipment_model');
				return $this->equipment_model->delete_by($where);
			}else if($data == 'organization'){
				$this->load->model('organization_model');
				return $this->organization_model->delete_by($where);
			}else{
				return "unknown model";
			}
		}
	}
?>