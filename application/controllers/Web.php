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
        $this->home();
    }

    public function home() {
        //Loading Impontant Models
        $this->load->model("trainer_model");
        $this->load->model("gym_model");
        $this->load->model("exercise_program_model");
        $this->load->model("meal_program_model");

        $data['trainers'] = $this->trainer_model->get_all();
        $data['gyms'] = $this->gym_model->get_all();
        $data['exercise_programs'] = $this->exercise_program_model->get_all();
        $data['meal_programs'] = $this->meal_program_model->get_all();

        $data['main_content'] = 'index';
        $this->load->view('includes/web', $data);
    }

    public function host_gym() {
        $uri_segment_3 = $this->uri->segment(3);
        if ($uri_segment_3 == 'ajax_check_email') {
            $this->load->model('user_model');
            $user = $this->user_model->get_by(array('email' => $_POST['gis_email']));
            if (count($user) > 0) {
                echo "user_exist";
            } else {
                echo "invalid_email";
            }
            return;
        }

        if ($uri_segment_3 == 'ajax_check_password') {
            $this->load->model('user_model');
            $this->load->model('account_model');
            $user = $this->user_model->get_by(array('email' => $_POST['gis_email']));
            if (count($user) > 0) {
               $account = $this->account_model->get_by(array('user_id' => $user->id));
                if (count($account) > 0) {
                    $password_hash = md5($_POST['gis_password']);
                    ChromePhp::log("Password: " . $_POST['gis_password']);
                    ChromePhp::log("Password_Hash: " . $password_hash);
                    ChromePhp::log("Account_password: " . $account->password);
                    if ($account->password == $password_hash) {
                        echo 'valid_password';
                    } else {
                        echo 'invalid_password';
                    }
                }
            }
            return;
        }

        if ($uri_segment_3 == 'ajax_add_gym') {
            $this->load->model('user_model');
            $this->load->model('account_model');
            $this->load->model('gym_model');
            $account = $this->account_model->get_by(array('email' => $_POST['gis_email']));
            $formData = array();
            if (count($account) > 0) {
                $formData['admin_id'] = $account->id;
                $formData['name'] = strtolower($_POST['gym_name']);
                $formData['description'] = strtolower($_POST['gym_description']);
                $formData['country'] = strtolower($_POST['country']);
                $formData['region'] = strtolower($_POST['region']);
                $formData['district'] = strtolower($_POST['district']);
                $formData['ward'] = strtolower($_POST['ward']);
                $formData['street'] = strtolower($_POST['street']);
                $formData['lat'] = (float) $_POST['lat'];
                $formData['lng'] = (float) $_POST['lng'];
                $gym = $this->gym_model->get_by(array('name' => strtolower($_POST['gym_name'])));
                if (count($gym) == 0) {
                    $this->gym_model->insert($formData);
                    $gym_ = $this->gym_model->get_by(array('name' => strtolower($_POST['gym_name'])));
                    if (count($gym_) > 0) {
                        $updateData['user_type_secondary'] = 'gym';
                        $this->account_model->update($account->id, $updateData);
                        echo 'gym_added';
                    } else {
                        echo "Failed to add the gym to the database";
                    }
                } else {
                    echo "The gym name exists";
                }
            }
            return;
        }
        $data['main_content'] = 'host_gym';
        $this->load->view('includes/web', $data);
    }

    public function about() {
        $data['main_content'] = 'about';
        $this->load->view('includes/web', $data);
    }

    public function contacts() {
        $data['main_content'] = 'contacts';
        $this->load->view('includes/web', $data);
    }

    public function login() {
        $uriSegment = $this->uri->segment(3);
        $this->load->model('user_model');
        $this->load->model('account_model');

        $account = $this->account_model->get_by(array('email' => $this->input->post('email')));

        if ($uriSegment == 'user') {
            $this->session->set_userdata('user_type', 'user');
            redirect(base_url() . 'index.php/cms');
        } elseif ($uriSegment == 'admin') {
            $this->session->set_userdata('user_type', 'admin');
            redirect(base_url() . 'index.php/root');
        } elseif ($uriSegment == 'gym') {
            $this->session->set_userdata('user_type', 'gym');
            redirect(base_url() . 'index.php/gym');
        } elseif ($uriSegment == 'trainer') {
            $this->session->set_userdata('user_type', 'trainer');
            redirect(base_url() . 'index.php/tms');
        }

        if (count($account) > 0) {
            if ($account->password == md5($this->input->post('password'))) {
                $this->load->model('user_model');
                $user = $this->user_model->get($account->user_id);
                $this->session->set_userdata('first_name', $user->first_name);
                $this->session->set_userdata('last_name', $user->surname);
                $this->session->set_userdata('account_id', $account->id);

                if ($account->user_type == 'user') {
                    $this->session->set_userdata('user_id', $account->user_id);

                    if ($account->user_type_secondary == "") {
                        $this->session->set_userdata('user_type', $account->user_type);
                        redirect(base_url() . 'index.php/cms');

                    } else {
                        if ($account->user_type_secondary == 'trainer') {
                            $data['user_type'] = array('user' => 'Trainee', $account->user_type_secondary => 'Trainer');
                        } elseif ($account->user_type_secondary == 'gym') {
                            $data['user_type'] = array('user' => 'Trainee', $account->user_type_secondary => 'GYM Representative');
                        } elseif ($account->user_type_secondary == 'admin') {
                            $data['user_type'] = array('user' => 'Trainee', $account->user_type_secondary => 'Admin');
                        }
                        $data['main_content'] = 'select_user_type';
                        $this->load->view('includes/web', $data);
                    }
                    return;
                }

                if ($account->user_type == 'trainer') {
                    $this->session->set_userdata('user_id', $account->user_id);

                    if ($account->user_type_secondary == "") {
                        $this->session->set_userdata('user_type', $account->user_type);
                        redirect(base_url() . 'index.php/tms');

                    } else {
                        if ($account->user_type_secondary == 'user') {
                            $data['user_type'] = array('trainer' => 'Trainer', $account->user_type_secondary => 'Trainee');
                        } elseif ($account->user_type_secondary == 'gym') {
                            $data['user_type'] = array('trainer' => 'Trainer', $account->user_type_secondary => 'GYM Representative');
                        } elseif ($account->user_type_secondary == 'admin') {
                            $data['user_type'] = array('trainer' => 'Trainer', $account->user_type_secondary => 'Admin');
                        }
                        $data['main_content'] = 'select_user_type';
                        $this->load->view('includes/web', $data);
                    }
                    return;
                }

                if ($account->user_type == 'gym') {
                    $this->session->set_userdata('user_id', $account->user_id);

                    if ($account->user_type_secondary == "") {
                        $this->session->set_userdata('user_type', $account->user_type);
                        redirect(base_url() . 'index.php/gym');

                    } else {
                        if ($account->user_type_secondary == 'trainer') {
                            $data['user_type'] = array('gym' => 'GYM Representative', $account->user_type_secondary => 'Trainer');
                        } elseif ($account->user_type_secondary == 'user') {
                            $data['user_type'] = array('gym' => 'GYM Representative', $account->user_type_secondary => 'Trainee');
                        } elseif ($account->user_type_secondary == 'admin') {
                            $data['user_type'] = array('gym' => 'GYM Representative', $account->user_type_secondary => 'Admin');
                        }
                        $data['main_content'] = 'select_user_type';
                        $this->load->view('includes/web', $data);
                    }
                    return;
                }

                if ($account->user_type == 'admin') {
                    $this->session->set_userdata('user_id', $account->user_id);

                    if ($account->user_type_secondary == "") {
                        $this->session->set_userdata('user_type', $account->user_type);
                        redirect(base_url() . 'index.php/root');

                    } else {
                        if ($account->user_type_secondary == 'user') {
                            $data['user_type'] = array('admin' => 'Admin', $account->user_type_secondary => 'Trainee');
                        } elseif ($account->user_type_secondary == 'gym') {
                            $data['user_type'] = array('admin' => 'Admin', $account->user_type_secondary => 'GYM Representative');
                        } elseif ($account->user_type_secondary == 'trainer') {
                            $data['user_type'] = array('admin' => 'Admin', $account->user_type_secondary => 'Trainer');
                        }
                        $data['main_content'] = 'select_user_type';
                        $this->load->view('includes/web', $data);
                    }
                    return;
                }

            } else {
                $data['error'] = "Email and Password do not match";
            }
        } else {
            $data['error'] = "Email address does not exist";
        }
        $data['form'] = 'login_form';
        $data['main_content'] = 'login';
        $this->load->view('includes/web', $data);
    }

    public function register() {
        $uriSegment = $this->uri->segment(3);

        if ($uriSegment == 'email_check') {

            $this->load->model('user_model');
            $user = $this->user_model->get_by(array('email' => $_POST['email']));

            if (count($user) > 0) {
                print http_response_code(200);
                return;
            } else {
                print http_response_code(404);
                return;
            }

        }

        if ($uriSegment == 'user_details') {
            $user_details = array();
            foreach ($_POST as $key => $value) {

                if ($key != 'register') {
                    $user_details[$key] = $value;
                }
            }

            $user_details['joining_date'] = date("Y/m/d H:i:s");
            $this->load->model('user_model');
            $this->user_model->insert($user_details);
            $data['email'] = $user_details['email'];
            $data['success'] = "Congratulations for finishing the first step. Please create an account to proceed. ";
            $data['form'] = 'account_registration_form';
            $data['main_content'] = 'register';
            $this->load->view('includes/web', $data);
            return;
        }

        if ($uriSegment == 'account_details') {
            $account_details = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'register' && $key != 'password_confirm') {
                    $account_details[$key] = $value;
                }
            }
            $this->load->model('user_model');
            $this->load->model('account_model');
            $user = $this->user_model->get_by(array('email' => $account_details['email']));
            if (count($user) > 0) {
                ChromePhp::log($user);
                $account_details['user_id'] = $user->id;
            }
            $account_details['password'] = md5($account_details['password']);
            $this->account_model->insert($account_details);
            $data['form'] = 'login_form';
            $data['main_content'] = 'login';
            $this->load->view('includes/web', $data);
            return;
        }
        $data['form'] = 'user_registration';
        $data['main_content'] = 'register';
        $this->load->view('includes/web', $data);
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_type');
        $this->login();
    }

    public function cart() {
        $data['main_content'] = 'cart';
        $this->load->view('includes/web', $data);
    }

    public function training_plans() {
        $data['main_content'] = 'training_plans';
        $this->load->view('includes/web', $data);
    }

    public function meal_plans() {
        $data['main_content'] = 'meals_plans';
        $this->load->view('includes/web', $data);
    }

    public function personal_training() {
        $data['main_content'] = 'personal_training';
        $this->load->view('includes/web', $data);
    }

    public function trainers() {
        $data['main_content'] = 'trainers';
        $this->load->view('includes/web', $data);
    }

    public function training_centers() {
        $data['main_content'] = 'training_centers';
        $this->load->view('includes/web', $data);
    }

    public function training_academy() {
        $data['main_content'] = 'training_academy';
        $this->load->view('includes/web', $data);
    }

}