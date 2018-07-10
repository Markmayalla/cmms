<?php

    class Automate extends CI_Controller{
        public function index(){
            $this->load->model('automation_model','auto');
            $this->auto->select_assets();
        }

        public function insert_request(){
            $datas = $this->input->post('data');
            $request_id = array();
            $i = 0;
            foreach($datas as $data){
                $request_id['request'][$i]['id'] = $this->request_model->insert($data);
                $request_id['request'][$i]['date'] = $data['description'];
                $i++;
            }
            echo json_encode($request_id);
        }

        public function select_worker_on_date(){
            $data = $this->input->post('data');

            $count = count($data);

            $added = array();
            for($i = 0; $i < $count; $i++){
                $date_s = $data[$i]['date'];
                $this->load->model('automation_model','auto');
                $r = $this->auto->select_worker_on_date($date_s,1);
               // print_r($r);
                if(count($r)){
                    $added['requests_id'] = $data[$i]['id'];
                    $added['date_start'] = $data[$i]['date'];
                    $added['workers_id'] = $r[0]->id;
                    $this->sessionlib->unsetData('request_success');
                    $this->sessionlib->sess_set($this->sessionlib->flashdata,array("request_success" => array($data[$i]['id']=>"Has given task")));
                }else{
                    $this->sessionlib->unsetData('request_error');
                    $this->sessionlib->sess_set($this->sessionlib->flashdata,array("request_error" => array($data[$i]['id']=>"Has not given task")));
                }
            }
            echo json_encode($added);
        }

        public function insert_task(){
            $post_data = $this->input->post('data');

            //print_r($post_data);
            $i = 0;
            for($i = 0; $i < count($_POST); $i++){
                $end_date = date('Y-m-d',strtotime($post_data['date_start']. ' +  2  days'));
                $status = 'pending';
                $data = array(
                    'requests_id' => $post_data['requests_id'],
                    'workers_id' => $post_data['workers_id'],
                    'date_start' => $post_data['date_start'],
                    'date_end'  => $end_date,
                    'notes' => "This request sent auto by due date " .$post_data['date_start'],
                    'status' => $status
                );
                $request = $post_data['requests_id'];
                $this->task_model->add_task($request,$data);
            }
            echo $i;
        }
    }
?>