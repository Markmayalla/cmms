<?php 
		$name = "Equipment_Report";
		$array_heading = array('Equipment ID', 'Equipment Name', 'Price','Quantity');
		$array_shots = array('equipment_id', 'equipment_name','unit_price','quantity');
		$data['data'] = $display;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

