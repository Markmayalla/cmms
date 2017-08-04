<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/19/17
 * Time: 2:06 PM
 */

class System extends CI_Controller {

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/system.php', $data);
    }

    public function documents() {
        $data['main_content'] = 'documents';
        $this->load->view('includes/system.php', $data);
    }


    public function live_chats() {
        $data['main_content'] = 'live_chats';
        $this->load->view('includes/system.php', $data);
    }

    public function video_call() {
        $data['main_content'] = 'video_call';
        $this->load->view('includes/system.php', $data);
    }

    public function directory() {
        $data['main_content'] = 'directory';
        $this->load->view('includes/system.php', $data);
    }

    public function working_plan() {
        $data['main_content'] = 'working_plan';
        $this->load->view('includes/system.php', $data);
    }

    public function administration() {
        $data['main_content'] = 'administration';
        $this->load->view('includes/system.php', $data);
    }

    public function monitoring() {
        $data['main_content'] = 'monitoring';
        $this->load->view('includes/system.php', $data);
    }

    public function evaluation() {
        $data['main_content'] = 'evaluation';
        $this->load->view('includes/system.php', $data);
    }


}