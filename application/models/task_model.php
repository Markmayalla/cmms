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

        $date = $data['date_start'];
        $worker = $data['workers_id'];

        $sql = "SELECT tasks.workers_id FROM tasks WHERE date_start <= '$date' && date_end >= '$date' AND workers_id = '$worker'";
        if(!$this->db->query($sql)->num_rows){
            $this->task_model->insert($data);
            return $this->request_model->update($req_id, array('status' => 'scheduled'));
        }else{
            return false;
        }
    }

    public function update_byy($a,$up){
        $this->task_model->update_by($a,$up);
        $id = $this->task_model->get_by($a)->requests_id;
        $this->request_model->update_by(array('id'=>$id),$up);
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


    public function select_task_data($arrayData){
        $this->load->model('task_model');
		$accRole = $arrayData['accountRole'];
		$role = $arrayData['role'];
		$accountId = $arrayData['accountId'];
		if($accRole == $role['admin']){
			return $this->task_model->get_all();
		}else if($accRole == $role['worker']){
			$userrrr = $this->account_model->get($accountId)->user_id;
			$work_id = $this->worker_model->get_by('accounts_id',$userrrr);
			$returned  = array();
			$Datas  = array();
			
			if(count((array)$work_id)){
				$work_id = $work_id->id;
				$returned  = array();
				$Datas =  $this->task_model->get_many_by(array('workers_id' => $work_id));
            }
           //print_r($Datas);
			return $Datas;
		}else if($accRole == $role['user']){
			$userrrr = $this->account_model->get($accountId)->user_id;
			$org_id = $this->organizations_has_user_model->get_by('users_id',$userrrr);
			$returned  = array();
			$Datas  = array();
			
			if(count((array)$org_id)){
				$org_id = $org_id->organizations_id;
                $returned  = array();
                $sql = "SELECT * FROM tasks WHERE requests_id IN (SELECT id FROM requests WHERE organizations_has_assets_organizations_id = '$org_id')";
				$Datas =  $this->db->query($sql)->result();
			}
			return $Datas;
		}
    }

	public function select_tasks($num,$datas){
        $data = array();
        $names = array();
        if($num == null){
             $tasks = $this->task_model->select_task_data($datas);
        }else if($num == 'data'){
            $tasks['data'] = $this->task_model->get_by(array('id' => $datas));
            $names = $data[0]['workers'] = $this->worker_model->get_all(); 
        }else{
            $tasks = $this->task_model->get_many_by(array('workers_id' => $datas,'status' => 'completed'));
        }

		$i = 0;
		foreach($tasks as $key){
            $request = $this->request_model->get($key->requests_id);
            $iiiii = $key->workers_id;
            $worker = $this->worker_model->get($key->workers_id)->accounts_id;
            $account = $this->account_model->get($worker)->user_id;
			$username = $this->user_model->get($account);
            $assets = $this->asset_model->get_by('id',$request->organizations_has_assets_assets_id);
            $equipments = $this->equipment_model->select_tasked_equipment($key->id);
            $orgname = $this->organization_model->get($request->organizations_has_assets_organizations_id);

			$data[$i]['username'] = $username;
			$data[$i]['request'] = $request;
			$data[$i]['organization'] = $orgname;
			$data[$i]['task'] = $key;
			$data[$i]['assets'] = $assets;
            $data[$i]['equipments'] = $equipments;
            $this->load->model('tasks_has_equipment_model');
            $data[$i]['equipment_view'] = $this->tasks_has_equipment_model->get_many_by(array('tasks_id' => $key->id));
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