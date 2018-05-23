<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$this->table->set_heading('Name', 'Phone No.', 'Email','Address', 'Options');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				//print_r($data);
				//echo "<br><br>";
                $edit_btn = '<button class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </button>';
                $delete_btn = '<button class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </button>';
				$this->table->add_row($data->name, $data->number,$data->email,$data->box . ", " .$data->street . ", " .$data->district . ", " .$data->region , $edit_btn . $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>