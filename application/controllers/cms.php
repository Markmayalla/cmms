<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/7/17
 * Time: 12:35 PM
 */

include 'ChromePhp.php';

class Cms extends CI_Controller {

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/cms', $data);
    }

    public function assessment_form() {

        $uriSegment_3 = $this->uri->segment(3);
        $uriSegment_4 = $this->uri->segment(4);
        $uriSegment_5 = $this->uri->segment(5);

        $this->load->model("assessment_form_model");

        if ($uriSegment_3 == "health_care_provider") {
            $form_values = array();
            $accessment_form = $this->assessment_form_model->get_by(array("account_id" => $this->session->userdata('account_id')));

            if (count($accessment_form) > 0) {
                //Update Values
                foreach ($_POST as $key => $value) {
                    if ($key != "add_provider") {
                        $form_values[$key] = $value;
                    }
                }
                $this->assessment_form_model->update_by(array("account_id" => $this->session->userdata("account_id")), $form_values);
            } else {
                //Add Values
                foreach ($_POST as $key => $value) {
                    if ($key != "add_provider") {
                        $form_values[$key] = $value;
                    }
                }
                $form_values["account_id"] = $this->session->userdata("account_id");
                $this->assessment_form_model->insert($form_values);
            }


        }

        if ($uriSegment_3 == "main") {
            $form_values = array();
            $accessment_form = $this->assessment_form_model->get_by(array("account_id" => $this->session->userdata('account_id')));

            if (count($accessment_form) > 0) {
                //Update Values
                foreach ($_POST as $key => $value) {
                    if ($key != "submit_assessment") {
                        $form_values[$key] = $value;
                    }
                }
                $this->assessment_form_model->update_by(array("account_id" => $this->session->userdata("account_id")), $form_values);
            } else {
                //Add Values
                foreach ($_POST as $key => $value) {
                    if ($key != "submit_assessment") {
                        $form_values[$key] = $value;
                    }
                }
                $form_values["account_id"] = $this->session->userdata("account_id");
                $this->assessment_form_model->insert($form_values);
            }

        }

        $data['main_content'] = 'assessment_form';
        $this->load->view('includes/cms', $data);
    }

    public function trainers() {
        $this->load->model("user_model");
        $this->load->model("account_model");
        $this->load->model("skill_model");
        $this->load->model("trainer_model");
        $this->load->model("trainer_skill_model");

        $trainers = $this->trainer_model->get_all();
        $profiles = array();
        $trainers_skills = array();
        $skills = array();

        if (count($trainers) > 0) {
            foreach ($trainers as $key => $value) {
                $profiles[$key] = $this->user_model->get($value->user_id);
                $trainers_skills[$key] = $this->trainer_skill_model->get_many_by(array("account_id" => $value->account_id));
                if (count($trainers_skills[$key]) > 0) {
                    foreach ($trainers_skills[$key] as $key_nd => $value) {
                        $skills[$key][$key_nd] = $this->skill_model->get($value->skill_id);
                    }
                } else {
                    $skills[$key][0] = "Unspecified";
                }
            }
            $data['profiles'] = $profiles;
            $data['trainer_skills'] = $trainers_skills;
            $data['skills'] = $skills;
        }


        $data['trainers'] = $trainers;
        $data['main_content'] = 'trainers';
        $this->load->view('includes/cms', $data);
    }

    public function exercise_plan() {
        $data['main_content'] = 'exercise_plan';
        $this->load->view('includes/cms', $data);
    }

    public function diet_plan() {
        $data['main_content'] = 'diet_plan';
        $this->load->view('includes/cms', $data);
    }

    public function gym() {
        $data['main_content'] = 'gym';
        $this->load->view('includes/cms', $data);
    }

    public function progress_report() {
        $data['main_content'] = 'progress_report';
        $this->load->view('includes/cms', $data);
    }

    public function review() {
        $data['main_content'] = 'review';
        $this->load->view('includes/cms', $data);
    }
}