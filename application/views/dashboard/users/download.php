<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$this->table->set_heading('First Name', 'Last name', 'Middle Name', 'Gender', 'Options');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				$edit_btn = '<a href="#edit_user" data-toggle="modal" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>';
				$account_settings = '<a href="#account_settings" data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-user"></span> </a>';
				$delete_btn = '<button class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </button>';
				$this->table->add_row($data->first_name, $data->last_name,$data->middle_name,$data->gender, $edit_btn .$account_settings. $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>
