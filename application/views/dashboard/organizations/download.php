<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php

			$num_user = count($display["organizations"]);
			$this->table->set_heading('Name', 'Phone No.', 'Email','Address', 'Options');
			for($i = 0; $i < $num_user; $i++){
				$data = $display["organizations"][$i];
				//print_r($data);
				//echo "<br><br>";
                $delete_url = base_url() . 'index.php/system/view/organizations/organization_model/delete/' . $display['organizations'][$i]->id;
                $edit_btn = '<a href="'.site_url().'/organizations/edit/'.$data->id.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
                $delete_btn = '<a href="' . $delete_url . '" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>';
				$this->table->add_row($data->name,
                    $this->organization_model->populate($i, $display["phones"], array('title', 'number') , "","<br />", ": ", "null") ,
                    $this->organization_model->populate($i, $display["emails"], array('email'),"","<br />", "", "null"),
                    $this->organization_model->populate($i, $display["addresses"], array('region', 'district', 'street'),"<span class='fa fa-map-marker'></span> ","<br />", ", ", "null"),
                    $edit_btn . $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>