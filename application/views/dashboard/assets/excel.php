<?php 
		$name = "Assert_Report";
		$array_heading = array('Asset Id', 'Asset Name', 'Model Name');
		$array_shots = array('id', 'name','model_number');
		$data['data'] = $display['assets'];
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

