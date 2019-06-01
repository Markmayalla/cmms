<?php 
		$name = "Organization_Report";
		$array_heading = array('Name', 'Phone(s)', 'Email(s)','Address(s)');
		$array_shots = array('name', 'number','email','address');
		
			$num_user = count($display["organizations"]);
			for($i = 0; $i < $num_user; $i++){
				$data_org = $display["organizations"][$i];
				$data['data'][$i] = array(
					'name' => $data_org->name,
                    'number' => $this->organization_model->populate($i, $display["phones"], array('title', 'number') , "","\n", ": ", "null") ,
                    'email' => $this->organization_model->populate($i, $display["emails"], array('email'),"","\n", "", "null"),
					'address' => $this->organization_model->populate($i, $display["addresses"], array('region', 'district', 'street'),"","\n", ", ", "null")
				);
			}
		
		$data['heading'] = $array_heading;
		$data['shots'] = $array_shots;
		$date = date('Y-m-d:His');
		$name = $name . $date . ".xlsx";
		$data['excelName'] = $name;
		echo json_encode($data);
?>