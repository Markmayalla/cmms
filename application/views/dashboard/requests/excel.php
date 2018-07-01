<?php 
		$name = "Request_Report";
		$array_heading = array('Username', 'Organization name', 'Asset Name','Description','status');
		$array_shots = array('fullname', 'organization','asset_name','description','status');

		$datap = array();
		$i = 0;
		foreach($display as $datas){
			$account = $datas['username'];
			$organization = $datas['organization'];
			$asset = $datas['asset'];
			$request = $datas['request'];
			
			$fullname = $account->first_name . " " . $account->last_name;
			$organization_name = $organization->name;
			$asset_name = $asset->name;
			$status = $request->status;
			$request_id = $request->id;
			$request_desc = $request->description;

			$datap[$i] = array(
				'fullname' => $fullname,
				'organization' => $organization_name,
				'asset_name' => $asset_name,
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

