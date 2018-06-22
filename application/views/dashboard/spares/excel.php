<?php 
		$name = "Spares_Report";
		$array_heading = array('Spare Name', 'Model', 'Category','Quantity');
		$array_shots = array('name', 'model','category','inventory');
		$data['data'] = $display;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

