<?php 
		$name = "Request_Report";
		$array_heading = array('Request ID', 'Equipment Name', 'Price','Quantity');
		$array_shots = array('id', 'Organiza','unit_price','quantity');
		$data['data'] = $display;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

