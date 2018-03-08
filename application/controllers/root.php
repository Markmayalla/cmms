<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/7/17
 * Time: 12:39 PM
 */

include 'ChromePhp.php';

class Root extends CI_Controller {

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $data['menu_active'] = 'dashboard';
        $this->load->model('account_model');
        $accounts = $this->account_model->get_all();
        $trainers = $this->account_model->get_many_by(array('user_type' => 'trainer'));
        $clients = $this->account_model->get_many_by(array('user_type' => 'user'));
        $gyms = $this->account_model->get_many_by(array('user_type' => 'gym'));
        $data['accounts'] = $accounts;
        $data['trainers'] = $trainers;
        $data['clients'] = $clients;
        $data['gyms'] = $gyms;
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/administration', $data);
    }


    public function fitness() {

        //Instantiating URIs
        $uriSegment_3 = $this->uri->segment(3);
        $uriSegment_4 = $this->uri->segment(4);
        $uriSegment_5 = $this->uri->segment(5);
        $uriSegment_6 = $this->uri->segment(6);
        $uriSegment_7 = $this->uri->segment(7);

        //INstantiating Impontant Models
        $this->load->model("exercise_model");
        $this->load->model("exercise_program_model");
        $this->load->model("program_exercise_model");


        if ($uriSegment_3 == 'exercises') {
            $button = array('add_exercise', 'Add Exercise');
            $form_action = base_url() . "index.php/root/fitness/exercises/add_exercise";
            $data['button'] = $button;

            if ($uriSegment_4 == 'add_exercise') {
                if (isset($_POST['add_exercise'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_exercise') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->exercise_model->insert($form_data);
                    $data['success_msg'] = "Data Added Successfully";
                }

                if (isset($_POST['edit_exercise'])) {
                    $uriSegment_4 == 'edit_exercise';
                }
            }

            if ($uriSegment_4 == 'edit_exercise') {
                $form_action = base_url() . "index.php/root/fitness/exercises/edit_exercise/" . $uriSegment_5;
                $button = array('edit_exercise', 'Edit Exercise');
                $data['button'] = $button;
                $data['form_values'] = $this->exercise_model->get($uriSegment_5);
                if (isset($_POST['edit_exercise'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_exercise') {
                            $form_data[$key] = $value;
                        }
                    }

                    $this->exercise_model->update($uriSegment_5, $form_data);
                    $data['success_msg'] = "Data Updated Succesfull";
                }
            }

            if ($uriSegment_4 == 'delete_exercise') {
                $this->exercise_model->delete($uriSegment_5);
                $data['success_msg'] = "Deleted Transaction is successfull";
            }

            $data['form_action'] = $form_action;
            $data['exercises'] = $this->exercise_model->get_all();
            $data['sub_content'] = 'exercises';
            $data['active'] = 'exercises';
        }

        if ($uriSegment_3 == 'equipments') {
            $data['sub_content'] = 'exercises';
            $data['active'] = 'equipments';
        }

        if ($uriSegment_3 == 'exercise_programs') {
            $button = array('add_exercise_program', 'Add Exercise Program');
            $form_action = base_url() . "index.php/root/fitness/exercise_programs/add_exercise_program";
            $data['button'] = $button;

            if ($uriSegment_4 == 'add_exercise_program') {
                if (isset($_POST['add_exercise_program'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_exercise_program') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->exercise_program_model->insert($form_data);
                    $data['success_msg'] = "Data Added Successfully";
                }

                if (isset($_POST['edit_exercise_program'])) {
                    $uriSegment_4 == 'edit_exercise_program';
                }
            }

            if ($uriSegment_4 == 'edit_exercise_program') {
                $form_action = base_url() . "index.php/root/fitness/exercise_programs/edit_exercise_program/" . $uriSegment_5;
                $button = array('edit_exercise_program', 'Edit Exercise Program');
                $data['button'] = $button;
                $data['form_values'] = $this->exercise_program_model->get($uriSegment_5);
                if (isset($_POST['edit_exercise_program'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_exercise_program') {
                            $form_data[$key] = $value;
                        }
                    }

                    $this->exercise_program_model->update($uriSegment_5, $form_data);
                    $data['success_msg'] = "Data Updated Succesfull";
                }
            }

            if ($uriSegment_4 == 'delete_exercise_program') {
                $this->exercise_program_model->delete($uriSegment_5);
                $data['success_msg'] = "Deleted Transaction is successful";
            }

            $data['form_action'] = $form_action;
            $data['exercise_programs'] = $this->exercise_program_model->get_all();
            $data['sub_content'] = 'exercise_programs';
            $data['active'] = 'exercise_programs';
        }

        if ($uriSegment_3 == 'program_exercises') {

            if ($uriSegment_5 == 'add_program_exercise') {

                if (isset($_POST["add_program_exercise"])) {
                    ChromePhp::log("Adding Program Exercises");
                    $form_data = array();
                    $form_data["exercise_program_id"] = $uriSegment_4;
                    foreach ($_POST as $key => $value) {
                        if ($key != "add_program_exercise" && $key != "program_exercise_id") {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->program_exercise_model->insert($form_data);

                }

                if (isset($_POST["edit_program_exercise"])) {
                    ChromePhp::log("Editing Program Exercise");
                    $form_data = array();
                    $form_data["exercise_program_id"] = $uriSegment_4;
                    foreach ($_POST as $key => $value) {
                        if ($key != "edit_program_exercise" && $key != "program_exercise_id") {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->program_exercise_model->update($this->input->post("program_exercise_id"), $form_data);
                }

                if ($uriSegment_6 == "delete") {
                    ChromePhp::log("Unbinding Meal");
                    $this->program_exercise_model->delete($uriSegment_7);
                }
                $data['sub_content'] = 'add_program_exercises';
            } else {
                $data['sub_content'] = 'program_exercises';
            }


            $exercise_program = $this->exercise_program_model->get($uriSegment_4);
            $program_exercises = $this->program_exercise_model->get_many_by(array("program_id" => $exercise_program->id));
            $exercises = $this->exercise_model->get_all();

            $program_exercises_bind = array();

            if (count($exercises) > 0) {
                foreach ($exercises as $key => $value) {

                    foreach ($program_exercises as $key_i => $value_i) {
                        if ($value_i->exercise_id == $value->id) {
                            $program_exercises_bind[$key] = $value_i;
                        }
                    }
                }
            }

            $data['exercises'] = $exercises;
            $data['exercise_program'] = $exercise_program;
            $data['program_exercises_bind'] = $program_exercises_bind;
            $data['meal_program'] = $exercise_program;
            $data['active'] = 'exercise_programs';
        }

        $data['menu_active'] = 'fitness';
        $data['main_content'] = 'fitness';
        $this->load->view('includes/administration', $data);

    }

    public function diet() {
        $data['menu_active'] = 'diet';
        $uriSegment_3 = $this->uri->segment(3);
        $uriSegment_4 = $this->uri->segment(4);
        $uriSegment_5 = $this->uri->segment(5);
        $uriSegment_6 = $this->uri->segment(6);
        $uriSegment_7 = $this->uri->segment(7);

        //Loading The Nessessary Models
        $this->load->model('meal_element_model');
        $this->load->model('meal_model');
        $this->load->model('vitamin_model');
        $this->load->model('meals_component_model');
        $this->load->model('meal_elements_vitamin_model');
        $this->load->model('meal_elements_type_model');
        $this->load->model('meal_category_model');
        $this->load->model('meals_category_model');
        $this->load->model('diet_model');
        $this->load->model('diet_meal_model');
        $this->load->model('meals_elements_category_model');
        $this->load->model('meal_program_model');
        $this->load->model('program_meal_model');


        if ($uriSegment_3 == 'meal_elements') {


            if ($uriSegment_4 == 'add_spice') {
                $form_data = array();
                $form_data_i = array();
                $form_data_ii = array();
                foreach ($_POST as $key => $value) {

                    if ($key != 'add_spice') {
                        if (substr($key, 0, 7) === "vit_id_"){
                            if (strlen($key) == 8) {
                                array_push($form_data_i, substr($key, -1));
                            } else if(strlen($key) == 9) {
                                array_push($form_data_i, substr($key, -2));
                            } elseif (strlen($key) == 10) {
                                array_push($form_data_i, substr($key, -3));
                            }
                        } else if (substr($key, 0, 10) === "spice_cat_") {
                            if (strlen($key) == 11) {
                                array_push($form_data_ii, substr($key, -1));
                            } else if(strlen($key) == 12) {
                                array_push($form_data_ii, substr($key, -2));
                            } else if(strlen($key) == 13) {
                                array_push($form_data_ii, substr($key, -3));
                            }
                        } else {
                            $form_data[$key] = $value;
                        }
                    }
                }
                $spice_id = $this->meal_element_model->insert($form_data);
                if (count($form_data_i) > 0) {
                    $dataArray = array();
                    foreach($form_data_i as $value) {
                        $dataArray["meal_element_id"] = $spice_id;
                        $dataArray["vitamins_id"] = $value;
                        $this->meal_elements_vitamin_model->insert($dataArray);
                    }

                }
                if (count($form_data_ii) > 0) {
                    $dataArray = array();
                    foreach($form_data_ii as $value) {
                        $dataArray["meal_element_id"] = $spice_id;
                        $dataArray["meal_element_category_id"] = $value;
                        $this->meal_elements_type_model->insert($dataArray);
                    }

                }
                $data['add_spice_success'] = "Spice Added";

            }

            if ($uriSegment_4 == 'delete_spice') {
                $this->meals_component_model->delete_by(array("meal_element_id" => $uriSegment_5));
                $this->meal_elements_vitamin_model->delete_by(array("meal_element_id" => $uriSegment_5));
                $this->meal_elements_type_model->delete_by(array("meal_element_id" => $uriSegment_5));
                $this->meal_element_model->delete($uriSegment_5);
            }

            if ($uriSegment_4 == 'view_spice' || $uriSegment_4 == 'edit_spice') {



                if (isset($_POST['edit_spice'])) {

                    $form_data = array();
                    $form_data_i = array();
                    $form_data_ii = array();
                    foreach ($_POST as $key => $value) {

                        if ($key != 'edit_spice') {
                            if (substr($key, 0, 7) === "vit_id_"){
                                if (strlen($key) == 8) {
                                    array_push($form_data_i, substr($key, -1));
                                } else if(strlen($key) == 9) {
                                    array_push($form_data_i, substr($key, -2));
                                } elseif (strlen($key) == 10) {
                                    array_push($form_data_i, substr($key, -3));
                                }
                            } else if (substr($key, 0, 10) === "spice_cat_") {
                                if (strlen($key) == 11) {
                                    array_push($form_data_ii, substr($key, -1));
                                } else if(strlen($key) == 12) {
                                    array_push($form_data_ii, substr($key, -2));
                                } else if(strlen($key) == 13) {
                                    array_push($form_data_ii, substr($key, -3));
                                }
                            } else {
                                $form_data[$key] = $value;
                            }
                        }
                    }
                        $spice_id = $uriSegment_5;
                        $this->meal_element_model->update($uriSegment_5, $form_data);
                        $this->meal_elements_vitamin_model->delete_by(array("meal_element_id" => $spice_id));
                    if (count($form_data_i) > 0) {
                        $dataArray = array();

                        foreach($form_data_i as $value) {
                            $dataArray["meal_element_id"] = $spice_id;
                            $dataArray["vitamins_id"] = $value;
                            $this->meal_elements_vitamin_model->insert($dataArray);
                        }

                    }

                        $this->meal_elements_type_model->delete_by(array("meal_element_id" => $spice_id));
                    if (count($form_data_ii) > 0) {
                        $dataArray = array();

                        foreach($form_data_ii as $value) {
                            $dataArray["meal_element_id"] = $spice_id;
                            $dataArray["meal_element_category_id"] = $value;
                            $this->meal_elements_type_model->insert($dataArray);
                        }

                    }

                    $data['spice_edit_success'] = 'Spice Edited Successfully';
                }

                $spice_categories = $this->meals_elements_category_model->get_all();
                $vitamins = $this->vitamin_model->get_all();
                $spice_types = $this->meal_elements_type_model->get_many_by(array("meal_element_id" => $uriSegment_5));
                $spice_vitamins = $this->meal_elements_vitamin_model->get_many_by(array("meal_element_id" => $uriSegment_5));
                $spice_types_present = array();
                $spice_vitamins_present = array();
                foreach($spice_types as $key => $value) {
                    $spice_types_present[$key] = $this->meals_elements_category_model->get($value->meal_element_category_id);
                }
                foreach($spice_vitamins as $key => $value) {
                    $spice_vitamins_present[$key] = $this->vitamin_model->get($value->vitamins_id);
                }

                $selected_spice_types = array();
                if (count($spice_categories) > 0) {

                    foreach ($spice_categories as $key => $value) {
                        if (count($spice_types) > 0) {
                            foreach ($spice_types as $value_i) {
                                if ($value_i->meal_element_id == $uriSegment_5
                                    && $value_i->meal_element_category_id == $value->id) {
                                    $selected_spice_types[$key] = "checked";
                                }
                            }
                        }
                    }
                }

                $selected_vitamins = array();
                if (count($vitamins) > 0) {

                    foreach ($vitamins as $key => $value) {
                        if (count($spice_vitamins) > 0) {
                            foreach ($spice_vitamins as $value_i) {
                                if ($value_i->meal_element_id == $uriSegment_5
                                    && $value_i->vitamins_id == $value->id) {
                                    $selected_vitamins[$key] = "checked";
                                }
                            }
                        }
                    }
                }

                $data['spice'] = $this->meal_element_model->get($uriSegment_5);
                $data['spice_types_present'] = $spice_types_present;
                $data['spice_vitamins_present'] = $spice_vitamins_present;
                $data['spice_categories'] = $spice_categories;
                $data['vitamins'] = $vitamins;
                $data['selected_spice_categories'] = $selected_spice_types;
                $data['selected_vitamins'] = $selected_vitamins;
                $data['active'] = $uriSegment_3;
                $data['sub_content'] = 'edit_spice';
                $data['main_content'] = 'diet';
                $this->load->view('includes/administration', $data);
                return;
            }

            $spices = $this->meal_element_model->get_all();
            if (count($spices) > 0) {
                $data['spices'] = $spices;
            }
            $data['spice_categories'] = $this->meals_elements_category_model->get_all();
            $data['vitamins'] = $this->vitamin_model->get_all();
            $data['active'] = 'meal_elements';
            $data['sub_content'] = 'meal_elements';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'meals_components') {

            if ($uriSegment_4 == 'add_component') {
                $meal_elements = $this->meal_element_model->get_all();
                $meal = $this->meal_model->get($uriSegment_5);

                $uriSegment_6 = $this->uri->segment(6);
                $uriSegment_7 = $this->uri->segment(7);
                if ($uriSegment_6 == "add_element") {
                    $form_data['meal_id'] = $uriSegment_5;
                    $form_data['meal_element_id'] = $uriSegment_7;
                    $form_data['meal_element_amount'] = $this->input->post("meal_element_amount");
                    $this->meals_component_model->insert($form_data);
                }

                if ($uriSegment_6 == "update_element") {
                    $result = $this->meals_component_model->get_by(array("meal_id" => $uriSegment_5, "meal_element_id" => $uriSegment_7));
                    $form_data['meal_element_amount'] = $this->input->post('meal_element_amount');
                    $this->meals_component_model->update($result->id, $form_data);
                }

                if ($uriSegment_6 == "delete_element") {
                    $this->meals_component_model->delete_by(array("meal_id" => $uriSegment_5, "meal_element_id" => $uriSegment_7));
                }

                $meals_components = $this->meals_component_model->get_many_by(array('meal_id' => $uriSegment_5));
                if (count($meals_components) > 0) {
                    ChromePhp::log("Meal Component Count: " . count($meals_components));
                    $meal_component = array();
                    foreach ($meal_elements as $key => $value) {
                        foreach ($meals_components as $value_i) {
                            ChromePhp::log("Meal Element Id: " );
                            if ($value->id == $value_i->meal_element_id) {
                                $meal_component[$key] = $value_i;
                            }
                        }
                    }
                    $data['meal_component'] = $meal_component;
                }

                $data['meal'] = $meal;
                $data['meal_elements'] = $meal_elements;
                $data['sub_content'] = 'add_meal_component';
            } else {
                $data['sub_content'] = 'meals_components';
            }

            $meals = $this->meal_model->get_all();
            $meals_components = array();

            if (count($meals) > 0) {

                $meals_components['element_name'] = array();
                $meals_components['dietary_fiber'] = array();
                $meals_components['suger'] = array();
                $meals_components['saturated_fat'] = array();
                $meals_components['polyunsaturated_fat'] = array();
                $meals_components['monounsaturated_fat'] = array();
                $meals_components['proteins'] = array();
                $meals_components['water'] = array();
                $meals_components['si_unit'] = array();
                $meals_components['default_amount'] =array();

                foreach ($meals as $key => $value) {
                    $results = $this->meals_component_model->get_many_by(array('meal_id' => $value->id));
                    $element_name = array();
                    $dietary_fiber = array();
                    $suger = array();
                    $saturated_fat = array();
                    $monounsaturated_fat = array();
                    $polyunsaturated_fat = array();
                    $proteins = array();
                    $water = array();
                    $si_unit = array();
                    $default_amount = array();
                    $calories = array();
                    $portion_factor = array();

                    if (count($results) > 0) {
                        foreach ($results as $value_i) {
                            $result = $this->meal_element_model->get($value_i->meal_element_id);
                            array_push($element_name, $result->element_name);
                            array_push($dietary_fiber, $result->dietary_fiber);
                            array_push($suger, $result->suger);
                            array_push($saturated_fat, $result->saturated_fat);
                            array_push($polyunsaturated_fat, $result->polyunsaturated_fat);
                            array_push($monounsaturated_fat, $result->monounsaturated_fat);
                            array_push($proteins, $result->proteins);
                            array_push($water, $result->water);
                            array_push($si_unit, $result->si_unit);
                            array_push($calories, $result->calories);
                            array_push($default_amount, $result->default_amount);
                            array_push($portion_factor, $value_i->meal_element_amount);

                        }
                    }

                    $meals_components['element_name'][$key] = $element_name;
                    $meals_components['dietary_fiber'][$key] = $dietary_fiber;
                    $meals_components['suger'][$key] = $suger;
                    $meals_components['saturated_fat'][$key] = $saturated_fat;
                    $meals_components['polyunsaturated_fat'][$key] = $polyunsaturated_fat;
                    $meals_components['monounsaturated_fat'][$key] = $monounsaturated_fat;
                    $meals_components['proteins'][$key] = $proteins;
                    $meals_components['water'][$key] = $water;
                    $meals_components['si_unit'][$key] = $si_unit;
                    $meals_components['calories'][$key] = $calories;
                    $meals_components['default_amount'][$key] =  $default_amount;
                    $meals_components['portion_factor'][$key] = $portion_factor;
                }
            }
            $data['meals_components'] = $meals_components;
            $data['meals'] = $meals;
            $data['active'] = 'meals_components';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'meals') {

            if ($uriSegment_4 == 'add_meal') {
                $form_data = array();
                $form_data_ii = array();
                foreach ($_POST as $key => $value) {
                    if ($key != 'add_meal') {
                        if (substr($key, 0, 9) === "meal_cat_") {
                            if (strlen($key) == 10) {
                                array_push($form_data_ii, substr($key, -1));
                            } else if(strlen($key) == 11) {
                                array_push($form_data_ii, substr($key, -2));
                            } else if(strlen($key) == 12) {
                                array_push($form_data_ii, substr($key, -3));
                            }
                        } else {

                            $form_data[$key] = $value;
                        }
                    }
                }
                $meal_id = $this->meal_model->insert($form_data);
                if (count($form_data_ii) > 0) {
                    $dataArray = array();
                    foreach($form_data_ii as $value) {
                        $dataArray["meal_id"] = $meal_id;
                        $dataArray["category_id"] = $value;
                        $this->meals_category_model->insert($dataArray);
                    }

                }
                $data['add_meal_success'] = "Meal Added";

            }

            if ($uriSegment_4 == 'delete_meal') {
                $this->meals_component_model->delete_by(array("meal_id" => $uriSegment_5));
                $this->meals_category_model->delete_by(array("meal_id" => $uriSegment_5));
                $this->meal_model->delete($uriSegment_5);
            }

            if ($uriSegment_4 == 'view_meal' || $uriSegment_4 == 'edit_meal') {
                if (isset($_POST['edit_meal'])) {
                    $form_data = array();
                    $form_data_ii = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_meal') {
                            if (substr($key, 0, 9) === "meal_cat_") {
                                if (strlen($key) == 10) {
                                    array_push($form_data_ii, substr($key, -1));
                                } else if(strlen($key) == 11) {
                                    array_push($form_data_ii, substr($key, -2));
                                } else if(strlen($key) == 12) {
                                    array_push($form_data_ii, substr($key, -3));
                                }
                            } else {

                                $form_data[$key] = $value;
                            }
                        }
                    }
                    $this->meal_model->update($uriSegment_5, $form_data);
                    $meal_id = $uriSegment_5;
                    $this->meals_category_model->delete_by(array("meal_id" => $meal_id));
                    if (count($form_data_ii) > 0) {
                        $dataArray = array();
                        foreach($form_data_ii as $value) {
                            $dataArray["meal_id"] = $meal_id;
                            $dataArray["category_id"] = $value;
                            $this->meals_category_model->insert($dataArray);
                        }

                    }
                    $data['edit_meal_success'] = 'Meal Edited Successfully';


                }


                $meal_categories = $this->meal_category_model->get_all();
                $meal_types = $this->meals_category_model->get_many_by(array("meal_id" => $uriSegment_5));
                $meal_types_present = array();

                foreach($meal_types as $key => $value) {
                    $meal_types_present[$key] = $this->meal_category_model->get($value->category_id);
                }

                $selected_meal_categories = array();
                if (count($meal_categories) > 0) {

                    foreach ($meal_categories as $key => $value) {
                        if (count($meal_types) > 0) {
                            foreach ($meal_types as $value_i) {
                                if ($value_i->meal_id == $uriSegment_5
                                    && $value_i->category_id == $value->id) {
                                    $selected_meal_categories[$key] = "checked";
                                }
                            }
                        }
                    }
                }

                //Providing data for meals components
                $meal_components = $this->meals_component_model->get_many_by(array("meal_id" => $uriSegment_5));
                $spices = array();
                if (count($meal_components) > 0) {
                    foreach ($meal_components as $key => $value) {
                        $spices[$key] = $this->meal_element_model->get($value->meal_element_id);
                    }
                }

                $data['meal_components'] = $meal_components;
                $data['spices'] = $spices;
                $data['meal'] = $this->meal_model->get($uriSegment_5);
                $data['meal_categories'] = $meal_categories;
                $data['selected_meal_categories'] = $selected_meal_categories;
                $data['active'] = $uriSegment_3;
                $data['sub_content'] = 'edit_meal';
                $data['main_content'] = 'diet';
                $this->load->view('includes/administration', $data);
                return;
            }

            $meal_categories = $this->meal_category_model->get_all();
            ChromePhp::log("Checking Meals Categories...");
            if (count($meal_categories) > 0) {
                ChromePhp::log("Meal Categories: " . count($meal_categories));
            } else {
                ChromePhp::log("Meal CAtegories: 0");
            }

            $meals = $this->meal_model->get_all();
            if (count($meals) > 0) {
                $data['meals'] = $meals;
            }

            $data['meal_categories'] = $meal_categories;
            $data['active'] = 'meals';
            $data['sub_content'] = 'meals';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'diet') {
            $data['active'] = 'diet';
            $data['sub_content'] = 'diet';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'vitamins') {

            $button = array('add_vitamins', 'Add Vitamins');
            $form_action = base_url() . "index.php/root/diet/vitamins/add_vitamins";
            $data['button'] = $button;

            if ($uriSegment_4 == 'add_vitamins') {
                if (isset($_POST['add_vitamins'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_vitamins') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->vitamin_model->insert($form_data);
                    $data['success_msg'] = "Data Added Successfully";
                }

                if (isset($_POST['edit_vitamins'])) {
                    $uriSegment_4 == 'edit_vitamins';
                }
            }

            if ($uriSegment_4 == 'edit_vitamins') {
                $form_action = base_url() . "index.php/root/diet/vitamins/edit_vitamins/" . $uriSegment_5;
                $button = array('edit_vitamins', 'Edit Vitamins');
                $data['button'] = $button;
                $data['form_values'] = $this->vitamin_model->get($uriSegment_5);
                if (isset($_POST['edit_vitamins'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_vitamins') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->vitamin_model->update($uriSegment_5, $form_data);
                    $data['success_msg'] = "Data Updated Succesfull";
                }
            }

            if ($uriSegment_4 == 'delete_vitamins') {
                $this->meal_elements_vitamin_model->delete_by(array("vitamins_id" => $uriSegment_5));
                $this->vitamin_model->delete($uriSegment_5);
                $data['success_msg'] = "Deleted Transaction is successfull";
            }

            $data['form_action'] = $form_action;
            $data['vitamins'] = $this->vitamin_model->get_all();
            $data['active'] = 'vitamins';
            $data['sub_content'] = 'vitamins';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'meal_categories') {

            $button = array('add_category', 'Add Category');
            $form_action = base_url() . "index.php/root/diet/meal_categories/add_category";
            $data['button'] = $button;

            if ($uriSegment_4 == 'add_category') {
                if (isset($_POST['add_category'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_category') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->meals_elements_category_model->insert($form_data);
                    $data['success_msg'] = "Data Added Successfully";
                }

                if (isset($_POST['edit_category'])) {
                    $uriSegment_4 == 'edit_category';
                }
            }

            if ($uriSegment_4 == 'edit_category') {
                $form_action = base_url() . "index.php/root/diet/meal_categories/edit_category/" . $uriSegment_5;
                $button = array('edit_category', 'Edit Category');
                $data['button'] = $button;
                $data['form_values'] = $this->meals_elements_category_model->get($uriSegment_5);
                if (isset($_POST['edit_category'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_category') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->meals_elements_category_model->update($uriSegment_5, $form_data);
                    $data['success_msg'] = "Data Updated Succesfull";
                }
            }

            if ($uriSegment_4 == 'delete_category') {
                $this->meal_elements_type_model->delete_by(array("meal_element_id" => $uriSegment_5));
                $this->meals_elements_category_model->delete($uriSegment_5);
                $data['success_msg'] = "Deleted Transaction is successfull";
            }

            $data['form_action'] = $form_action;
            $data['meal_categories'] = $this->meals_elements_category_model->get_all();
            $data['active'] = 'meal_categories';
            $data['sub_content'] = 'meal_categories';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'meal_categories_true') {

            $button = array('add_category', 'Add Category');
            $form_action = base_url() . "index.php/root/diet/meal_categories_true/add_category";
            $data['button'] = $button;

            if ($uriSegment_4 == 'add_category') {
                if (isset($_POST['add_category'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_category') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->meal_category_model->insert($form_data);
                    $data['success_msg'] = "Data Added Successfully";
                }

                if (isset($_POST['edit_category'])) {
                    $uriSegment_4 == 'edit_category';
                }
            }

            if ($uriSegment_4 == 'edit_category') {
                $form_action = base_url() . "index.php/root/diet/meal_categories_true/edit_category/" . $uriSegment_5;
                $button = array('edit_category', 'Edit Category');
                $data['button'] = $button;
                $data['form_values'] = $this->meal_category_model->get($uriSegment_5);
                if (isset($_POST['edit_category'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_category') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->meal_category_model->update($uriSegment_5, $form_data);
                    $data['success_msg'] = "Data Updated Succesfull";
                }
            }

            if ($uriSegment_4 == 'delete_category') {
                $this->meals_category_model->delete_by(array("category_id" => $uriSegment_5));
                $this->meal_category_model->delete($uriSegment_5);
                $data['success_msg'] = "Deleted Transaction is successfull";
            }

            $data['form_action'] = $form_action;
            $data['meal_categories'] = $this->meal_category_model->get_all();
            $data['active'] = 'meal_categories_true';
            $data['sub_content'] = 'meal_categories_true';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'meal_programs') {

            $button = array('add_program', 'Add Program');
            $form_action = base_url() . "index.php/root/diet/meal_programs/add_program";
            $data['button'] = $button;

            if ($uriSegment_4 == 'add_program') {
                if (isset($_POST['add_program'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_program') {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->meal_program_model->insert($form_data);
                    $data['success_msg'] = "Data Added Successfully";
                }

                if (isset($_POST['edit_program'])) {
                    $uriSegment_4 == 'edit_program';
                }
            }

            if ($uriSegment_4 == 'edit_program') {
                $form_action = base_url() . "index.php/root/diet/meal_programs/edit_program/" . $uriSegment_5;
                $button = array('edit_program', 'Edit Program');
                $data['button'] = $button;
                $data['form_values'] = $this->meal_program_model->get($uriSegment_5);
                if (isset($_POST['edit_program'])) {
                    $form_data = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_program') {
                            $form_data[$key] = $value;
                        }
                    }
                    ChromePhp::log($form_data);
                    $this->meal_program_model->update($uriSegment_5, $form_data);
                    $data['success_msg'] = "Data Updated Succesfull";
                }
            }

            if ($uriSegment_4 == 'delete_program') {
                $this->meal_program_model->delete($uriSegment_5);
                $data['success_msg'] = "Deleted Transaction is successfull";
            }

            $data['form_action'] = $form_action;
            $data['meal_programs'] = $this->meal_program_model->get_all();
            $data['active'] = 'meal_programs';
            $data['sub_content'] = 'meal_programs';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }

        if ($uriSegment_3 == 'program_meals') {

            if ($uriSegment_5 == 'add_meals') {

                if (isset($_POST["add_program_meal"])) {
                    ChromePhp::log("Adding Program Meals");
                    $form_data = array();
                    $form_data["meal_program_id"] = $uriSegment_4;
                    foreach ($_POST as $key => $value) {
                        if ($key != "add_program_meal" && $key != "program_meal_id") {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->program_meal_model->insert($form_data);

                }
                if (isset($_POST["edit_program_meal"])) {
                    ChromePhp::log("Editing Program Meals");
                    $form_data = array();
                    $form_data["meal_program_id"] = $uriSegment_4;
                    foreach ($_POST as $key => $value) {
                        if ($key != "edit_program_meal" && $key != "program_meal_id") {
                            $form_data[$key] = $value;
                        }
                    }
                    $this->program_meal_model->update($this->input->post("program_meal_id"), $form_data);
                }

                if ($uriSegment_6 == "delete") {
                    ChromePhp::log("Unbinding Meal");
                    $this->program_meal_model->delete($uriSegment_7);
                }
                $data['sub_content'] = 'add_program_meals';
            } else {
                $data['sub_content'] = 'program_meals';
            }


            $meal_program = $this->meal_program_model->get($uriSegment_4);
            $program_meals = $this->program_meal_model->get_many_by(array("meal_program_id" => $meal_program->id));
            $meals = $this->meal_model->get_all();
            $meal_components = array();
            $meal_elements = array();
            $program_meals_bind = array();

            if (count($meals) > 0) {
                foreach ($meals as $key => $value) {
                    $meal_components[$key] = $this->meals_component_model->get_many_by(array("meal_id" => $value->id));
                    foreach ($meal_components[$key] as $key_i => $value_i) {
                        $meal_elements[$key][$key_i] = $this->meal_element_model->get($value_i->meal_element_id);
                    }

                    foreach ($program_meals as $key_i => $value_i) {
                        if ($value_i->meal_id == $value->id) {
                            $program_meals_bind[$key] = $value_i;
                        }
                    }
                }
            }

            $data['meals'] = $meals;
            $data['meal_components'] = $meal_components;
            $data['meal_elements'] = $meal_elements;
            $data['program_meals_bind'] = $program_meals_bind;
            $data['meal_program'] = $meal_program;
            $data['active'] = 'meal_programs';
            $data['main_content'] = 'diet';
            $this->load->view('includes/administration', $data);
        }


     }
}