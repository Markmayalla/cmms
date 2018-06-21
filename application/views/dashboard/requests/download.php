<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$to_delete = $data['data'];
			$this->table->set_heading('User', 'Organization Name', 'Asset Name','Status','Option');
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