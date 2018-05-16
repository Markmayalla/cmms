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
		$data['assets']['display'] = $this->asset_model->get_all();
		$data['organizations']['display'] = $this->organization_model->get_all();
		$data['tasks']['display'] = $this->task_model->get_all();
		$data['requests']['display'] = $this->request_model->get_all();
		
		$this->load->library("table");
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/system', $data);
    }
}