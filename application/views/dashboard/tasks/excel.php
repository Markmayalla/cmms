<?php 
		$name = "Task_Report";
		$array_heading = array('Worker Name','Date Start','Date end','Description','Status');
		$array_shots = array('fullname','date_start','date_end','description','status');
		
		$datap = array();
		$i = 0;
		foreach($display as $datas){
			$username = $datas['username'];
			$request = $datas['request'];
			$task = $datas['task'];
			
			$fullname = $username->first_name . " " . $username->last_name;
			$date_start = $task->date_start;
			$date_end = $task->date_end;
			$status = $task->status;
			$request_id = $request->id;
			$request_desc = $request->description;

			$datap[$i] = array(
				'fullname' => $fullname,
				'date_start' => $date_start,
				'date_end' => $date_end,
				'description' => $request_desc,
				'status' => $status
			); 
			$i++;
		}

		$data['data'] = $datap;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

