d<?php
	class Action extends CI_Controller {
		public function pdf(){
			$this->load->library("table");
			$template = array(
							'table_open'  => '<table class="table table table-striped table-bordered">',

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
			$this->table->set_template($template);
			$name = $this->uri->segment(3);
			
			$data['display'] = $this->models_data($name);
			$this->load->view('includes/page_start2.php');
			$this->load->view('dashboard/'.$name.'/download',$data);
			$this->load->view('includes/page_end2.php');
		}
		public function print_priview(){
			echo $this->uri->segment(3);
		}
		
		
		public function view(){
			$this->load->view('tools/index');
			$this->load->library("table");
		$data['template'] = array(
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
			$name = $this->uri->segment(3);
			$data['display'] = $this->models_data($name);
			$this->load->view('includes/page_start2.php');
			$this->load->view('dashboard/'.$name.'/index',$data);
			$this->load->view('includes/page_end3.php');
		}
		public function excel(){
			$name = $this->uri->segment(3);
			$data['display'] = $this->models_data($name);
			$this->load->view('dashboard/'.$name.'/excel',$data);
		}
		
		public function delete_item(){
			$name = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			if(isset($_COOKIE['facebook_google_key_value'])) {
				$idname =  $_COOKIE['facebook_google_key_value'];
				$where[$idname] = $id;
				$this->models_data_delete($name,$where);
			} else {
				//echo $_COOKIE['facebook_google_key_value'];
			}
			redirect('system/view/'.$name);
		}
		
		public function cvs(){
			echo $this->uri->segment(3);
		}
		
		function models_data($data){
			if($data == 'users'){
				$this->load->model('user_model');
				return $this->user_model->get_all();
			}else if($data == 'assets'){
				$this->load->model('asset_model');
				return $this->asset_model->get_all();
			}else if($data == 'equipment'){
				$this->load->model('equipment_model');
				return $this->equipment_model->get_all();
			}else if($data == 'organization'){
				$this->load->model('organization_model');
				return $this->organization_model->select_organization();
			}else{
				return "unknown model";
			}
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