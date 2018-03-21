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

           if ($uri_segment4 == "update") {
            $form_data = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'update') {
                    $form_data[$key] = $value;
                }
            }
            $this->gym_working_hour_model->update($uri_segment3, $form_data);
            $data['success_msg'] = "Update Successfull";
        }
              
             

               if($uri_segment4 =="delete"){
             $this->gym_working_hour_model->delete($uriSegment_5);
                $data['success_msg'] = "Deleted  is successfull";

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
    //this function is for gym groups
       public function gym_rates(){
    
            //passing the URi segmemnts
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);


        //loading content models
        $this->load->model('gym_model');
        $this->load->model('gym_rate_group_model');
       
           if ($uri_segment4 == "insert") {
            $formData = array();
            $formData['gym_id'] = $uri_segment3;
            $formData['gym_groupname'] = strtolower($_POST['gym_groupname']);
            $this->gym_rate_group_model->insert($formData);
            
        }
              
         
          $data['success_msg'] = "Added Successfull";
        //getting gym group name corresponding gym id
        $gym_rate_group = $this->gym_rate_group_model->get_many_by(array('gym_id' => $uri_segment3));
       $data['gym_rate_group'] = $gym_rate_group;
         //gym_get selcect option value 
        $gym_option = $this->gym_rate_group_model->get_many_by(array('gym_id' => $uri_segment3));
       $data['gym_option'] = $gym_option;

         $gym= $this->gym_model->get($uri_segment3);
         $data['gym'] = $gym;
         $data['main_content'] = "gym_rates";
         $data['active'] = "gym_rates";
         $this->load->view('includes/gym' ,$data);
    }
        //this fucntion if for duration bundle 
        public function gym_bundle(){
    
            //passing the URi segmemnts
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);
    

        //loading content models
        $this->load->model('gym_model');
        $this->load->model('gym_rate_duration_bundle_model');
       
           if ($uri_segment4 == "insert") {
            $formData = array();
            $formData['gym_id'] = $uri_segment3;
            $formData['bundle_name'] = strtolower($_POST['bundle_name']);
            $this->gym_rate_duration_bundle_model->insert($formData);
            
        }
              
         
          $data['success_msg'] = "Added Successfull";
         //getting gym duration bundle corresponding gym id
        $gym_rate_bundle = $this->gym_rate_duration_bundle_model->get_many_by(array('gym_id' => $uri_segment3));
       $data['gym_rate_bundle'] = $gym_rate_bundle;
       //get data from option value 
        $select = $this->gym_rate_duration_bundle_model->get_many_by(array('gym_id' => $uri_segment3));
       $data['select'] = $select;

         $gym= $this->gym_model->get($uri_segment3);
         $data['gym'] = $gym;
         $data['main_content'] = "gym_rates";
         $data['active'] = "gym_rates";
         $this->load->view('includes/gym' ,$data);
    }
        //this function is for amount for each duration bundle 
        public function gym_rate_amount(){
    
            //passing the URi segmemnts
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);
        $uri_segment5  = $this->uri->segment(5);
    

        //loading content models
        $this->load->model('gym_model');
        $this->load->model('gym_rate_duration_bundle_model');
        $this->load->model('gym_rate_group_model');
        $this->load->model('gym_rate_model');
     

       
           if ($uri_segment4 == "insert") {
        $gym = $this->gym_rate_group_model->get_by(array('id' => $_POST['id']));
        $gym = $this->gym_rate_duration_bundle_model->get_by(array('id' => $_POST['id']));

            $formData = array();
            $formData['gym_id'] = $uri_segment3;
            $formData['amount'] = strtolower($_POST['amount']);
            $this->gym_rate_model->insert($formData);
            
        }

         if($uri_segment4 =='delete_rate_amount'){

            //$this->gym_rate_model->delete_by(array('id' => $uriSegment5));
             $this->gym_rate_model->delete($uriSegment5);
                $data['success_msg'] = "Deleted  is successfull";

         }
              
         
          $data['success_msg'] = "Added Successfull";
         
        //gym rates amount for each bundle and group match to gym ID
        $gym_amount = $this->gym_rate_model->get_many_by(array('gym_id' => $uri_segment3));
        $data['gym_amount'] = $gym_amount; 
         $gym= $this->gym_model->get($uri_segment3);
         $data['gym'] = $gym;
         $data['main_content'] = "gym_rates";
         $data['active'] = "gym_rates";
         $this->load->view('includes/gym' ,$data);
    }

}

