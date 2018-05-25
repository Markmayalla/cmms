<?php 
		$name = "Assert_Report";
		$array_heading = array('Asset Id', 'Asset Name', 'Model Name', 'Organization');
		$array_shots = array('ass_id', 'ass_name','ass_m_n','org_name');
		$data['data'] = $display;
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>

