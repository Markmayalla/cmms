<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			//$num_user = count((array)$display);
			$to_delete = $data['data'];
			$this->table->set_heading('User', 'Organization Name', 'Asset Name','Status','Option');
			/*
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
			*/
			foreach($display as $data){
				$account = $data['username'];
				$organization = $data['organization'];
				$asset = $data['asset'];
				$request = $data['request'];
				
				$fullname = $account->first_name . " " . $account->last_name;
				$organization_name = $organization->name;
				$asset_name = $asset->name;
				$status = $request->status;
				$request_id = $request->status;
				
				$edit_btn = '<a href="#" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
				$delete_btn = '<a href="'.site_url().'/action/delete_item/'.$to_delete.'/'.$request_id.'" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';
					
				$cookie_name = "facebook_google_key_value";
				$cookie_value = "equipment_id";
				setcookie($cookie_name, $cookie_value, time() + (200000), "/");
				
				$this->table->add_row($fullname, $organization_name,$asset_name,$status, $edit_btn . $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>