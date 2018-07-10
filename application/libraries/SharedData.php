<?php
	class SharedData{
		
		public function __construct(){
			///Load Instance of Called controller
			$this->CI=& get_instance();
			$this->CI->load->database('default');
			$this->template = array(
					'thead_open'            => '<thead>',
					'thead_close'           => '</thead>',

					'heading_row_start'     => '<tr>',
					'heading_row_end'       => '</tr>',
					'heading_cell_start'    => '<th>',
					'heading_cell_end'      => '</th>',

					'tbody_open'            => '<tbody>',
					'tbody_close'           => '</tbody>',

					'row_start'             => '<tr>',
					'row_end'               => '</tr>',
					'cell_start'            => '<td>',
					'cell_end'              => '</td>',

					'row_alt_start'         => '<tr>',
					'row_alt_end'           => '</tr>',
					'cell_alt_start'        => '<td>',
					'cell_alt_end'          => '</td>',

					'table_close'           => '</table>'
			);
		}
		
		function hello(){
			echo "Hi, there am using class";
		}
		
		function models_data($data){
			if($data['table'] == 'users' || $data['table'] == 'workers'){
				$this->CI->load->model('user_model');
				if(isset($data['user_id'])){
					return $this->CI->user_model->select_user_by_id($data['table'],$data['user_id']);
				}else{
					return $this->CI->user_model->select_user($data['table']);
				}
			}else if($data['table'] == 'assets'){
				$whereee = array('state' => 'show');
				$this->CI->load->model('asset_model');
				$this->CI->load->model('organization_model');
				
				if(isset($data['asset_id'])){
					$asset = $this->CI->asset_model->select_by_id($data['user_info'],$data['asset_id']);
					$data = array(
						'assets' => $asset
					);
				}else if(isset($data['assets_down'])){
					$datar['assets'] = $this->CI->asset_model->get_many_by($whereee);
					return $datar;
				}else if(isset($data['type_of_user'])){
					$d = $data['type_of_user'];
					if($d == 'admin'){
						$datar['assets'] = $this->CI->asset_model->get_many_by($whereee);
					}else{
						$asset = $this->CI->asset_model->select($data['user_info']);
						$datar = array(
						'assets' => $asset,
						'organizations' => $this->CI->organization_model->get_all()
						);
					}
					
					return $datar;
				}else{
					$asset = $this->CI->asset_model->select($data['user_info']);
					$data = array(
					'assets' => $asset,
					'organizations' => $this->CI->organization_model->get_all()
					);
				}
				return $data;
			}else if($data['table'] == 'equipments'){
				$this->CI->load->model('equipment_model');
				return $this->CI->equipment_model->get_many_by(array('state' => 'show'));
			}else if($data['table'] == 'organizations'){
				$this->CI->load->model('organization_model');
				if(isset($data['org_id'])){
					return $this->CI->organization_model->select_all_organizations_rec($data['org_id']);
				}else{
					return $this->CI->organization_model->select_all_organizations_rec(null);
				}
				
			}else if($data['table'] == 'requests'){
				if(isset($data['request_id'])){
					return $this->CI->request_model->select_request_by_id($data['table'],$data['request_id']);
				}else{
					return $this->CI->request_model->select_request($data['user_info']);
				}
				
			}else if($data['table'] == 'spares'){
				return $this->CI->spare_part_model->get_many_by(array('state' => 'show'));
			}else if($data['table'] == 'tasks' || $data['table'] == 'tasc'){
				if($data['table'] == 'tasc'){
					$acc = $data['user_info']['accountId'];
					$wor = $this->CI->worker_model->get_by(array('accounts_id' => $acc))->id;
					return $this->CI->task_model->select_tasks("tasc",$wor);
				}else if(isset($data['task_id'])){
					return $this->CI->task_model->select_tasks("data",array('id' => $data['task_id']));
				}else{
					return $this->CI->task_model->select_tasks(null,$data['user_info']);
				}
				
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
			}else if($table == 'spare_parts'){
				$this->CI->spare_part_model->insert($data);
			}else if($table == 'tasks'){
				$this->CI->spare_part_model->insert($data);
			}else if($table == 'tasks_has_equipments') {
				$this->CI->load->model('tasks_has_equipment_model');
                $this->CI->tasks_has_equipment_model->insert($data);
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