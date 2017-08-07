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

    public function identity() {
        $data['main_content'] = 'identity';
        $this->load->view('includes/system.php', $data);
    }

    public function roles() {
        $data['main_content'] = 'roles';
        $this->load->view('includes/system.php', $data);
    }

    public function compensation() {
        $data['main_content'] = 'compensation';
        $this->load->view('includes/system.php', $data);
    }

    public function entry_requirements() {
        $data['main_content'] = 'entry_requirements';
        $this->load->view('includes/system.php', $data);
    }

    public function competition_management() {
        $data['main_content'] = 'competition_management';
        $this->load->view('includes/system.php', $data);
    }

    public function performance_assessment() {
        $data['main_content'] = 'performance_assessment';
        $this->load->view('includes/system.php', $data);
    }

    public function evaluation() {
        $data['main_content'] = 'evaluation';
        $this->load->view('includes/system.php', $data);
    }

    


}