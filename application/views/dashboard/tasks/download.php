<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			
				$array_header = array('Asset Name','Asset model','Worker Name', 'Date start', 'Date end');
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['worker']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['owner']){
					//array_push($array_header,"Options");
				}else if($accountRole == $role['user']){
					//array_push($array_header,"Options");
				}
				
				$this->table->set_heading($array_header);
			//$num_user = count((array)$alldata);
			@$to_delete = $data['data'];
			
			foreach($display as $data){
				
				$username = $data['username'];
				$request = $data['request'];
				$task = $data['task'];
				$assets = $data['assets'];
				
				$id = $task->id;
					
				$array_body = array($assets->name,$assets->model_number,$username->first_name . " " . $username->last_name, $task->date_start,$task->date_end);
				
                $assign_btn = '<a onclick="loadAssetId(\''.$id.'\')" href="#assign_assets"  data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-reorder"></span> </a>';
                $request_btn = '<a onclick="loadAssetIdVy(\''.$id.'\')" href="#request_assets"  data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-eye"></span> </a>';
                $edit_btn = '<a href="#" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
                $delete_btn = '<a href="'.site_url().'/action/delete_item/'.@$to_delete.'/'.$id.'" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';

				$cookie_name = "facebook_google_key_value";
				$cookie_value = "id";
				
				setcookie($cookie_name, $cookie_value, time() + (2000000), "/");
				
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					$option_link =  $assign_btn . $edit_btn . $delete_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['worker']){
					$option_link =  $request_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['owner']){
					//$option_link =   $request_btn;
					//array_push($array_body,$option_link);
				}else if($accountRole == $role['user']){
					//$option_link =   $request_btn;
					//array_push($array_body,$option_link);
				}
	
				$this->table->add_row($array_body);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>
