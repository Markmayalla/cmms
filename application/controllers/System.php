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
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/system', $data);
    }
}