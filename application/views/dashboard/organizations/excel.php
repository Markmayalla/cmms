<?php 
		$name = "Organization_Report";
		$array_heading = array('Name', 'Phone No.', 'Email','Box','Street','District','Regional','Country');
		$array_shots = array('name', 'number','email','box','street','district','region','country');
		$data['data'] = $display;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

