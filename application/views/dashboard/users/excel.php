<?php 
		$array_heading = array('id','First Name','Last Name','Middle Name','Gender');
		$array_shots = array('id','first_name','last_name','middle_name','gender');
		$data['data'] = $display;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		echo json_encode($data);
?>

