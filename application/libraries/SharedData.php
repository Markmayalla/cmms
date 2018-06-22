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
		
		function models_data($data){
			if($data['table'] == 'users'){
				$this->CI->load->model('user_model');
				return $this->CI->user_model->get_all();
			}else if($data['table'] == 'assets'){
				$this->CI->load->model('asset_model');
				$this->CI->load->model('organization_model');
				
				$asset = $this->CI->asset_model->select($data['user_info']);
				$data = array(
				  'assets' => $asset,
				  'organizations' => $this->CI->organization_model->get_all()
				);
				return $data;
			}else if($data['table'] == 'equipments'){
				$this->CI->load->model('equipment_model');
				return $this->CI->equipment_model->get_all();
			}else if($data['table'] == 'organizations'){
				$this->CI->load->model('organization_model');
				return $this->CI->organization_model->select_all_organizations_rec();
			}else if($data['table'] == 'requests'){
				return $this->CI->request_model->select_request($data['user_info']);
			}else if($data['table'] == 'spares'){
				return $this->CI->spare_part_model->get_all();
			}
			else{
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
			}else if($table == 'spare_parts'){
				$this->CI->spare_part_model->insert($data);
			}else if($table == 'tasks'){
				$this->CI->spare_part_model->insert($data);
			}
			else{
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