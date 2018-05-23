<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$to_delete = $data['data'];
			$this->table->set_heading('Asset Id', 'Asset Name', 'Model Name', 'Options');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				//print_r($data);
                $edit_btn = '<a href="#" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
                $delete_btn = '<a href="'.site_url().'/action/delete_item/'.$to_delete.'/'.$data->id.'" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';
				
				$cookie_name = "facebook_google_key_value";
				$cookie_value = "id";
				setcookie($cookie_name, $cookie_value, time() + (90), "/");
				
				$this->table->add_row($data->id, $data->name,$data->Model_Number, $edit_btn . $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>