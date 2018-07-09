<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
	
		$num_user = count($display["organizations"]);
		$array_header = array('Name', 'Phone No.', 'Email','Address');
			//@$to_delete = $data['data'];		
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
                $data = $display["organizations"][$i];
				//print_r($data);
				//echo "<br><br>";
                $delete_url = base_url() . 'index.php/system/view/organizations/organization_model/delete/' . $display['organizations'][$i]->id;
                $edit_btn = '<a href="'.site_url().'/organizations/edit/'.$data->id.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
                $delete_btn = '<a href="' . $delete_url . '" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';
				
				$option_link = "";
				$array_body = array($data->name,
					$this->organization_model->populate($i, $display["phones"], array('title', 'number') , "","<br />", ": ", "null") ,
					$this->organization_model->populate($i, $display["emails"], array('email'),"","<br />", "", "null"),
					$this->organization_model->populate($i, $display["addresses"], array('region', 'district', 'street'),"<span class='fa fa-map-marker'></span> ","<br />", ", ", "null")
				);
				
				if(!$action_show_option){
					
				}else if($accountRole == $role['admin']){
					$option_link = $edit_btn . $delete_btn;
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