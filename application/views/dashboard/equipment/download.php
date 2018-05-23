<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$to_delete = $data['data'];
			$this->table->set_heading('Equipment ID', 'Equipment Name', 'Price','Quantity', 'Options');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				//print_r($data);
                $edit_btn = '<a href="#" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
                $delete_btn = '<a href="'.site_url().'/action/delete_item/'.$to_delete.'/'.$data->equipment_id.'" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';
				
				$cookie_name = "facebook_google_key_value";
				$cookie_value = "equipment_id";
				setcookie($cookie_name, $cookie_value, time() + (90), "/");
				
				$this->table->add_row($data->equipment_id, $data->equipment_name,$data->unit_price,$data->quantity, $edit_btn . $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>