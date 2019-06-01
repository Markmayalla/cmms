<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			@$to_delete = $data['data'];
			$this->table->set_heading('User', 'Organization Name', 'Asset Name','Status','Option');
			
			$array_header = array('User', 'Organization Name', 'Asset Name','Status');
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['worker']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['owner']){
					//array_push($array_header,"Options");
					array_push($array_header,"Options");
				}else if($accountRole == $role['user']){
					array_push($array_header,"Options");
				}
				
				$this->table->set_heading($array_header);
				
			foreach($display as $data){
				$account = $data['username'];
				$organization = $data['organization'];
				$asset = $data['asset'];
				$request = $data['request'];
				
				$fullname = $account->first_name . " " . $account->last_name;
				$organization_name = $organization->name;
				$asset_name = $asset->name;
				$status = $request->status;
				$request_id = $request->id;
				
				$edit_btn = '<a href="#" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
				$delete_btn = '<a href="'.site_url().'/requests/change_request_status/'.$request_id.'" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';
				$assign_btn = '<a  href="'.site_url().'/requests/assign_request_to_task/'.$request_id.'"  data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-reorder"></span> </a>';
				$view = '<a href="'.site_url().'/requests/view/'.$request_id.'"  data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-eye"></span> </a>';
				
				$cookie_name = "facebook_google_key_value";
				$cookie_value = "equipment_id";
				setcookie($cookie_name, $cookie_value, time() + (200000), "/");
				
				$array_body = array($fullname, $organization_name,$asset_name,$status);
				
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					$option_link =  $view. $assign_btn  . $delete_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['worker']){
					$option_link =  "";
					//array_push($array_body,$option_link);
				}else if($accountRole == $role['owner']){
					$option_link =   $request_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['user']){
					$option_link =   $view . $edit_btn . $delete_btn;
					array_push($array_body,$option_link);
				}
	
				$this->table->add_row($array_body);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>