<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/12/17
 * Time: 7:46 PM
 */

include 'ChromePhp.php';

class Web extends CI_Controller {

    public function index() {
        $data['main_content'] = "index";
        $this->load->view("includes/web", $data);
    }

}