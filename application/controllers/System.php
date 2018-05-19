<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/05/2018
 * Time: 11:28
 */

class System extends CI_Controller {

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {

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
		
		$name = "assets";
        $data['main_content'] = 'dash_two';
        $data['data']['display'] = $this->models_data($name);
		$data['name'] = $name;
        $this->load->view('includes/system', $data);
    }
	
	public function view(){
		$name = $this->uri->segment(3);
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
		
		$data['data']['display'] = $this->models_data($name);
		$data['name'] = $name;
        $data['main_content'] = 'dash_two';
        $this->load->view('includes/system',$data);
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