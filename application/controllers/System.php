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
		$this->load->model('user_model');
		$this->load->model('task_model');
		$this->load->model('organization_model');
		$this->load->model('asset_model');
		$this->load->model('request_model');
		
		
		$data['users']['display'] = $this->user_model->get_all();
		$data['assets']['display'] = $this->asset_model->select();
		$data['organizations']['display'] = $this->organization_model->get_all();
		$data['tasks']['display'] = $this->task_model->get_all();
		$data['requests']['display'] = $this->request_model->get_all();
		
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
		
		
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/system', $data);
    }
}