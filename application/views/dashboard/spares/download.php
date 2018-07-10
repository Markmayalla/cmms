<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			@$to_delete = $data['data'];
			
				$array_header = array('Spare Name', 'Model', 'Category','Quantity');
				
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['worker']){
					//array_push($array_header,"Options");
				}else if($accountRole == $role['owner']){
					array_push($array_header,"Options");
				}else if($accountRole == $role['user']){
				}
				
				$this->table->set_heading($array_header);
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				//print_r($data);
                $edit_btn = '<a href="'.site_url().'/spares/edit/'.$data->id.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
                $delete_btn = '<a href="'.site_url().'/spares/delete/'.$data->id.'" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';
				
				$cookie_name = "facebook_google_key_value";
				$cookie_value = "id";
				setcookie($cookie_name, $cookie_value, time() + (90000), "/");
				
			
				$option_link = "";
				$array_body = array($data->name, $data->model,$data->category,$data->inventory);
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					$option_link =  $edit_btn . $delete_btn;
					array_push($array_body,$option_link);
				}else if($accountRole == $role['worker']){
					$option_link =  "";
				}else if($accountRole == $role['owner']){
					$option_link =  $edit_btn . $delete_btn;
					array_push($array_body,$option_link);
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