<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/7/17
 * Time: 12:37 PM
 */

include 'ChromePhp.php';

class Tms extends CI_Controller {

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {

        $this->load->model('user_model');
        $this->load->model('account_model');
        $this->load->model('trainer_model');

        $user_id = $this->session->userdata('user_id');
        $trainer = $this->trainer_model->get_by(array('user_id' => $user_id));

        $uriSegment_3 = $this->uri->segment(3);
        $uriSegment_4 = $this->uri->segment(4);

        if ($uriSegment_3 == 'add_info') {
            if (isset($_POST)) {
                $formData = array();
                foreach ($_POST as $key => $value) {
                    if ($key != 'add' && $key != 'update') {
                        $formData[$key] = $value;
                    }
                }
                if (count($trainer) > 0) {
                    //Perform Update
                    $this->trainer_model->update($trainer->id, $formData);
                    $data['feedback'] = '<div class="alert alert-success">Data update successful</div>';
                } else {
                    //Perform Insert
                    $formData['user_id'] = $this->session->userdata('user_id');
                    $formData['account_id'] = $this->session->userdata('account_id');
                    $this->trainer_model->insert($formData);
                    $data['feedback'] = '<div class="alert alert-success">Data insert successful</div>';
                }
            }
        }

        if ($uriSegment_3 == 'add_picture') {
            if ($_FILES['picture']['name'] != '') {
                $config['upload_path'] = './images/trainers/';
                $config['allowed_types'] = 'jpeg|jpg|png|gif';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('picture')) {
                    $data['upload_error'] = '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>';
                } else {
                    ChromePhp::log("Image Upload Successfull");
                    $upload_details = $this->upload->data();
                    ChromePhp::log("Setting preferences for image manipulation");
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/trainers/' . $upload_details['file_name'];
                    $config['new_image'] = './images/trainers/manipulated/' . $upload_details['file_name'];
                    $config['maintain_ratio'] = TRUE;
                    $config['height'] = '320';
                    $config['width'] = '200';
                    $this->load->library('image_lib', $config);
                    if (! $this->image_lib->resize()) {
                        $data['img_error'] = '<div class="alert alert-danger">' .$this->image_library->display_errors() . '</div>';
                    } else {
                        if (count($trainer) > 0) {
                            if ($trainer->picture != '') {
                                unlink(getcwd() .'/images/trainers/' . $trainer->picture);
                                unlink(getcwd() .'/images/trainers/manipulated/' . $trainer->picture);
                            }
                            $updateData['picture'] = $upload_details['file_name'];
                            $this->trainer_model->update($trainer->id, $updateData);
                        } else {
                            $insertData['picture'] = $upload_details['file_name'];
                            $insertData['user_id'] = $user_id;
                            $insertData['account_id'] = $this->session->userdata('account_id');
                            $this->trainer_model->insert($insertData);
                        }
                        $data['img_success'] = '<div class="alert alert-success">Upload & Manipulation Successfull</div>';
                    }
                }
            } else {

            }
        }

        $trainer = $this->trainer_model->get_by(array('user_id' => $user_id));
        $data['trainer'] = $trainer;
        $data['main_content'] = 'trainer_profile';
        $this->load->view('includes/tms', $data);

    }

    public function skills() {
        $this->load->model('trainer_model');
        $this->load->model('skill_model');
        $this->load->model('trainer_skill_model');
        $this->load->model('trainer_skill_rating_model');

        if ($this->uri->segment(3) == 'add_skill') {
            $trainer_skill = array();
            $trainer_skill['skill_id'] = $this->input->post('skill_id');
            $trainer_skill['account_id'] = $this->session->userdata('account_id');
            $trainer_skill['rating_average'] = '2.5';
            $this->trainer_skill_model->insert($trainer_skill);
            $data['add_skill_success'] = "Skill Added Successfully";

        }

        if ($this->uri->segment(3) == 'delete_skill') {
            $trainer_skill_id = $this->uri->segment(4);
            $this->trainer_skill_rating_model->delete_many(array('trainer_skill_id' => $trainer_skill_id));
            $this->trainer_skill_model->delete($trainer_skill_id);

        }

        $skills = $this->trainer_skill_model->get_many_by(array('account_id' => $this->session->userdata('account_id')));
        $all_skills = $this->skill_model->get_all();

        if (count($skills) > 0) {
            ChromePhp::log("Array detected;");
            ChromePhp::log($skills);
            $data['skills'] = $skills;

            $skip_skills = array();

            foreach ($skills as $value) {
                array_push($skip_skills, $value->skill_id);
            }
        } else {
            $data["msg"] = "No any skill found. Please add some skills";
        }

        $select_skill = array();
        if (isset($skip_skills)) {
            foreach ($all_skills as $value) {
                if (in_array($value->id, $skip_skills)) {

                } else {
                    $select_skill[$value->id] = $value->name;
                }
            }
        } else {
            foreach ($all_skills as $value) {
                $select_skill[$value->id] = $value->name;
            }
        }

        $data['select_skills'] = $select_skill;
        $data['all_skills'] = $all_skills;
        $data['main_content'] = 'skills';
        $this->load->view('includes/tms', $data);
    }

    public function activities() {
        $data['main_content'] = 'activities';
        $this->load->view('includes/tms', $data);
    }
}