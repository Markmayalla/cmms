<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/13/17
 * Time: 1:05 AM
 */

class Pes extends CI_Controller {


    public function index() {


        $this->home();
    }

    public function home() {

        $this->load->model('post_model');

        if ($this->input->post('page') != NULL) {

            $this->post_model->insert(array('page' => $this->input->post('page'), 'heading' => $this->input->post('heading'), 'body' => $this->input->post('body')), FALSE);
            echo 'Data Populated Successfully';
            return;

        }

        $post_data = $this->post_model->get_all();

        $data['main_content'] = 'home';
        $data['post_data'] = $post_data;
        $this->load->view('includes/web', $data);
    }

    public function learn() {

        $data['main_content'] = 'learn';
        $this->load->view('includes/web', $data);
    }

    public function products() {

        $data['main_content'] = 'products';
        $this->load->view('includes/web', $data);
    }

    public function pes_cass() {

        $data['main_content'] = 'pes_cass';
        $this->load->view('includes/web', $data);
    }

    public function contacts() {

        $data['main_content'] = 'contacts';
        $this->load->view('includes/web', $data);
    }

    public function login() {

        $login = array();

        $fieldSet = array(
            'field' => 'email',
            'lable' => 'Email',
            'rules' => 'required|valid_email|callback_email_exists'
        );

        array_push($login, $fieldSet);

        $fieldSet = array(
            'field' => 'password',
            'lable' => 'Password',
            'rules' => 'required|callback_password_match'
        );

        array_push($login, $fieldSet);

        $this->form_validation->set_rules($login);
        $this->form_validation->set_error_delimiters("<p id='loginError' style='color: #ff0000;'><span class='glyphicon glyphicon-alert'></span>", "</p>");

        if ($this->form_validation->run() == FALSE) {

            $jsonString = "{ ";
            $x = count($_POST);
            $i = 0;
            foreach($_POST as $field => $value) {

                if (($i + 1) != $x) {
                    if (form_error($field) != NULL) {
                        $jsonString = $jsonString . '"' . $field . '": "' . form_error($field) . '", ';
                    } else {
                        $jsonString = $jsonString . '"' . $field . '": "success", ';
                    }
                } else {
                    if (form_error($field) != NULL) {
                        $jsonString = $jsonString . '"' . $field . '": "' . form_error($field) . '" } ';
                    } else {
                        $jsonString = $jsonString . '"' . $field . '": "success" } ';
                    }
                }

                $i++;
            }

            echo $jsonString;

        } else {

            $this->load->model("user_model");
            $user = $this->user_model->get_by('email', $this->input->post("email"));

            $sessionDAta = array(

                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'status' => 'logged_in'

            );



            $this->session->set_userdata($sessionDAta);

            echo "success";
        }
    }

    public function email_exists($email) {
        $this->load->model("account_model");
        if ($this->account_model->get_by('email', $email)  == FALSE) {
            $this->form_validation->set_message('email_exists', 'This %s is not Registered');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function password_match($password) {
        if ($this->email_exists($this->input->post("email")) == TRUE) {
            $this->load->model("account_model");
            if ($this->account_model->get_by('password', md5($password))  == FALSE) {
                $this->form_validation->set_message('password_match', 'This %s is not Correct');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            $this->form_validation->set_message('password_match', 'The Email Above does not Exist');
            return FALSE;
        }
    }

    public function check_email($email) {
        $this->load->model("user_model");
        if ($this->user_model->get_by('email', $email)  == TRUE) {
            $this->form_validation->set_message('check_email', 'The %s is already Used');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function registration() {

        $registrationForm = array();
        foreach($_POST as $field => $value) {

            if ($field == 'email') {
                $fieldSet = array(
                    'field' => $field,
                    'lable' => str_replace("_", " ", $value),
                    'rules' => 'required|valid_email|callback_check_email'
                );
                array_push($registrationForm, $fieldSet);
            }

            else if ($field == 'phone') {
                $fieldSet = array(
                    'field' => $field,
                    'lable' => str_replace("_", " ", $value),
                    'rules' => 'required|min_length[10]|max_length[13]|numeric'
                );
                array_push($registrationForm, $fieldSet);
            }

            else if ($field == 'avatar') {
                $fieldSet = array(
                    'field' => $field,
                    'lable' => str_replace("_", " ", $value),
                    'rules' => ''
                );
                array_push($registrationForm, $fieldSet);
            }

            else if($field == 'village') {
                $fieldSet = array(
                    'field' => $field,
                    'lable' => str_replace("_", " ", $value),
                    'rules' => ''
                );
                array_push($registrationForm, $fieldSet);
            }

            else if($field == 'password') {
                $fieldSet = array(
                    'field' => $field,
                    'lable' => str_replace("_", " ", $value),
                    'rules' => 'required'
                );
                array_push($registrationForm, $fieldSet);
            }



            else if($field == 'password_conf') {
                $fieldSet = array(
                    'field' => $field,
                    'lable' => str_replace("_", " ", $value),
                    'rules' => 'required|matches[password]'
                );
                array_push($registrationForm, $fieldSet);
            }

            else {
                $fieldSet = array(
                    'field' => $field,
                    'lable' => str_replace("_", " ", $value),
                    'rules' => 'required'
                );
                array_push($registrationForm, $fieldSet);
            }

        }

        $this->form_validation->set_rules($registrationForm);
        $this->form_validation->set_error_delimiters("<p id='regError' style='color: #ff0000;'><span class='glyphicon glyphicon-alert'></span>", "</p>");

        if ($this->form_validation->run() == FALSE) {

            $jsonString = "{ ";
            $x = count($_POST);
            $i = 0;
            foreach($_POST as $field => $value) {

                if (($i + 1) != $x) {
                    if (form_error($field) != NULL) {
                        $jsonString = $jsonString . '"' . $field . '": "' . form_error($field) . '", ';
                    } else {
                        $jsonString = $jsonString . '"' . $field . '": "success", ';
                    }
                } else {
                    if (form_error($field) != NULL) {
                        $jsonString = $jsonString . '"' . $field . '": "' . form_error($field) . '" } ';
                    } else {
                        $jsonString = $jsonString . '"' . $field . '": "success" } ';
                    }
                }

                $i++;
            }

            echo $jsonString;

        } else {

            $this->load->model('user_model');
            $this->load->model('account_model');

            $userValues = array();
            $accountValues = array();

            foreach ($_POST as $field => $value) {
                if ($field == 'email') {
                    $userValues[$field] = $value;
                    $accountValues[$field] = $value;
                } elseif ($field == 'password') {
                    $accountValues[$field] = md5($value);
                } elseif ($field == 'password_conf') {

                } else {
                    $userValues[$field] = $value;
                }
            }

            $this->user_model->insert($userValues);
            $result = $this->user_model->get_by('email', $_POST['email']);
            $accountValues['user_id'] = $result->id;
            $this->account_model->insert($accountValues);

            echo "success";
        }
    }

    public function avatar_upload() {

        $config['upload_path'] = base_url() . '/files/avatar';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
        $config['max_width']  = '300';
        $config['max_height']  = '400';



        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('avatar') != TRUE)
        {
            $errors = $this->upload->display_errors();
            $response = $errors;

            echo 'File Path:' . $_FILES['avatar'] . ' Response: ' . $response;


        }
        else
        {

            $response = "success";

            echo $response;


        }

    }

    public function logout() {
        $this->session->unset_userdata("status");
        $this->index();

    }



}