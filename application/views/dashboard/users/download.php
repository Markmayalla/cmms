<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$this->table->set_heading('First Name', 'Last name', 'Middle Name', 'Gender');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				$this->table->add_row($data->first_name, $data->last_name,$data->middle_name,$data->gender);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>