<?php 
		$name = "User_Report";
		$array_heading = array('id','First Name','Last Name','Middle Name','Gender');
		$array_shots = array('id','first_name','last_name','middle_name','gender');
		$data['data'] = $display;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

