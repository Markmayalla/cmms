<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/7/17
 * Time: 12:38 PM
 */

include 'ChromePhp.php';

class Gym extends CI_Controller {

    

    public function index() {
        $this->dashboard();
        $this->load->model('gym_model');

    }

    public function dashboard() {
        $data['active'] = 'dashboard';
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/gym', $data);
    }

    public function ajaxRequestGyms() {
        $this->load->model('gym_model');
        $gyms = $this->gym_model->get_many_by(array('admin_id' => $this->session->userdata('user_id')));
    
        if (count($gyms) > 0) {

            echo json_encode($gyms);

        } else {
            echo json_encode("No Gyms Found");
        }
    }

    public function manage_gym() {
        //Instantiating URI segments
        $uri_Segment3 = $this->uri->segment(3);

        //Loading Important Models
        $this->load->model('gym_model');

        $gym = $this->gym_model->get($uri_Segment3);
        if (count($gym) > 0) {
            $data['gym'] = $gym;

        }

        $data['active'] = 'view_gym';
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/gym', $data);
    }

    public function about_gym() {
        //Instantiation URI Segments
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);

        //Loading Important Models
        $this->load->model('gym_model');

        if ($uri_segment4 == "update") {
            $form_data = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'update') {
                    $form_data[$key] = $value;
                }
            }
            $this->gym_model->update($uri_segment3, $form_data);
            $data['success_msg'] = "Update Successfull";
        }

        $gym = $this->gym_model->get($uri_segment3);
        $data['gym'] = $gym;

        $data['active'] = 'about_gym';
        $data['main_content'] = 'about_gym';
        $this->load->view('includes/gym', $data);
    }

    public function gym_photos() {
        //Instantiation URI Segments
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);

        //Loading Important Models
        $this->load->model('gym_model');

        $gym = $this->gym_model->get($uri_segment3);
        $data['gym'] = $gym;
        $data['active'] = 'gym_photos';
        $data['main_content'] = 'gym_photos';
        $this->load->view('includes/gym', $data);
    }

    public function gym_address() {
        ChromePhp::log("Gym Address Controller function triggered");
        //Instantiation URI Segments
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);

        //Loading Important Models
        $this->load->model('gym_model');

        $gym = $this->gym_model->get($uri_segment3);
        $data['gym'] = $gym;
        $data['main_content'] = "gym_address";
        $data['active'] = "gym_address";
        $this->load->view('includes/gym', $data);
    }
   
    public function gym_working_hours(){

         $uri_segment3 = $this->uri->segment(3);
         $uri_segment4 = $this->uri->segment(4);
         $uriSegment_5 = $this->uri->segment(5);

        //Loading Important Models
        $this->load->model('gym_model');
         $this->load->model('gym_working_hour_model');


        //my input data to database table gym_working_hours
        if ($uri_segment4 == "insert") {



            $formData = array();
            $formData['gym_id'] = $uri_segment3;
            $formData['day'] = strtolower($_POST['day']);
            $formData['timerange'] = strtolower($_POST['timerange']);
            $this->gym_working_hour_model->insert($formData);

        }
              
         
          $data['success_msg'] = "Added Successfull";
        
        //Geting Gym Working Hours with respect to the Gym ID
        $gym_working_hours = $this->gym_working_hour_model->get_many_by(array('gym_id' => $uri_segment3));
        $data['gym_working_hours'] = $gym_working_hours;
              

        $gym = $this->gym_model->get($uri_segment3);
        $data['gym'] = $gym;
        $data['main_content'] = "gym_working_hours";
        $data['active'] = "gym_working_hours";
        $this->load->view('includes/gym', $data);



    }
    
       public function gym_rates(){
          $data['menu_active'] = 'rates';
            //passing the URi segmemnts
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);
        $uriSegment_5 = $this->uri->segment(5);

        //loading content models
        $this->load->model('gym_model');
       // $this->load->model('gym_rate_group_model');
       // $this->load->model('gym_rate_duration_bundle_model');
       // $this->load->model('gym_rate_model');

         $gym= $this->gym_model->get($uri_segment3);
         $data['gym'] = $gym;
         $data['main_content'] = "gym_rates";
         $data['active'] = "gym_rates";
         $this->load->view('includes/gym' ,$data);
    }

}

