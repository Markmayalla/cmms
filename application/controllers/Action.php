<?php
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
		public function excel(){
			$name = $this->uri->segment(3);
			$data['display'] = $this->models_data($name);
			$this->load->view('includes/page_start2.php');
			$this->load->view('dashboard/'.$name.'/excel',$data);
			$this->load->view('includes/page_end2.php');
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
				return $this->asset_model->select();
			}else{
				return "unknown model";
			}
		}
	}
?>