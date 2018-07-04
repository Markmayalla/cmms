<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$alldata = $display['assets'];
			$organizations = $display['organizations'];
				$array_header = array('Asset Id', 'Asset Name', 'Model Name');
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['worker']){
					array_push($array_header,"Serial No");
					array_push($array_header,"Due date");
					array_push($array_header,"Options");
				}else if($accountRole == $role['owner']){
					//array_push($array_header,"Options");
					array_push($array_header,"Serial No");
					array_push($array_header,"Due date");
					array_push($array_header,"Options");
				}else if($accountRole == $role['user']){
					array_push($array_header,"Serial No");
					array_push($array_header,"Due date");
					array_push($array_header,"Options");
				}
				
				$this->table->set_heading($array_header);
			//$num_user = count((array)$alldata);
			@$to_delete = $data['data'];
			
			foreach($alldata as $data){
				
				$has_asset = $data['has_asset'];
				$has_propert = $data['has_properties'];
				
				if($accountRole == $role['admin']){
					$id = $has_asset->id;
					
					$array_body = array($has_asset->id, $has_asset->name,$has_asset->model_number);
				}else{
					$id = $has_asset->serial_no;
					$array_body = array($id, $has_propert[0]->name,$has_propert[0]->model_number,$has_asset->serial_no,$has_asset->due_date);
				}
                $assign_btn = '<a onclick="loadAssetId(\''.$id.'\')" href="#assign_assets"  data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-reorder"></span> </a>';
                $request_btn = '<a onclick="loadAssetIdVy(\''.$id.'\')" href="#request_assets"  data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-eye"></span> </a>';
                $edit_btn = '<a href="'.site_url().'/assets/edit/'.$id.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
                $delete_btn = '<a href="'.site_url().'/assets/delete/'.$id.'" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';

				$cookie_name = "facebook_google_key_value";
				$cookie_value = "id";
				
				
				setcookie($cookie_name, $cookie_value, time() + (90), "/");
				
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					$option_link =  $assign_btn . $edit_btn . $delete_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['worker']){
					$option_link =  "";
					//array_push($array_body,$option_link);
				}else if($accountRole == $role['owner']){
					$option_link =   $request_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['user']){
					$option_link =   $request_btn;
					array_push($array_body,$option_link);
				}
	
				$this->table->add_row($array_body);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>
