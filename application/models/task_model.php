<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:44
 */

class task_model extends MY_Model {

    public function add_task($req_id, $data) {
        $this->load->model("task_model");
        $this->load->model("request_model");

        $this->task_model->insert($data);
        $this->request_model->update($req_id, array('status' => 'scheduled'));
    }

    public function update_task_status($id, $workers_id, $date_start, $date_end, $notes) {
        $this->load->model('task_model');

        $task = $this->task_model->get($id);

        $data = array(
            'workers_id' => !is_null($workers_id) ? $workers_id : $task->workers_id,
            'date_start' => !is_null($date_start) ? $date_start : $task->date_start,
            'date_end' =>!is_null($date_end) ? $date_end : $task->date_end,
            'notes' => !is_null($notes) ? $notes : $task->notes
        );
        return $this->task_model->update($id, $data);
    }


	public function select_tasks($datas){
        $data = array();
        $names = array();
        if($datas == null){
             $tasks = $this->task_model->get_all();
        }else{
            $tasks['data'] = $this->task_model->get_by($datas);
            $names = $data[0]['workers'] = $this->worker_model->get_all(); 
        }
		$i = 0;
		foreach($tasks as $key){
            $request = $this->request_model->get($key->requests_id);
            $iiiii = $key->workers_id;
            $worker = $this->worker_model->get($key->workers_id)->accounts_id;
            $account = $this->account_model->get($worker)->user_id;
			$username = $this->user_model->get($account);
            $assets = $this->asset_model->get_by('id',$request->organizations_has_assets_assets_id);
            $orgname = $this->organization_model->get($request->organizations_has_assets_organizations_id);

			$data[$i]['username'] = $username;
			$data[$i]['request'] = $request;
			$data[$i]['organization'] = $orgname;
			$data[$i]['task'] = $key;
			$data[$i]['assets'] = $assets;
            $i++;
            $j = 0;
            foreach($names as $name){
                $yes_acc = $this->account_model->get($name->accounts_id)->user_id;
                $data[0]['worker'][$j] = (array)$this->user_model->get($yes_acc);
                array_push($data[0]['worker'][$j], $iiiii);
                $j++;
            }
		}
		return (object)$data;
	}

}