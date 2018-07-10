
<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
				$array_header = array('First Name', 'Last name', 'Middle Name', 'Gender');
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['worker']){
					//array_push($array_header,"Options");
				}else if($accountRole == $role['owner']){
					//array_push($array_header,"Options");
				}else if($accountRole == $role['user']){
				}
				
				$this->table->set_heading($array_header);
				
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				$edit_btn = '<a href="'.site_url().'/users/edit/'.$data->id.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
				$account_settings = '<a href="#account_settings" onclick="loadUserIdView('.$data->id.')" data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-user"></span> </a>';
				$delete_btn = '<a href="'.site_url().'/users/delete/'.$data->id.'/workers" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';				
				
				$option_link = "";
				$array_body = array($data->first_name, $data->last_name,$data->middle_name,$data->gender);
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					$option_link =  $account_settings . $edit_btn . $delete_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['worker']){
					$option_link =  "";
				}else if($accountRole == $role['owner']){
					$option_link =  "";
				}else if($accountRole == $role['user']){
					$option_link =  "";
				}
				
				$this->table->add_row($array_body);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>
