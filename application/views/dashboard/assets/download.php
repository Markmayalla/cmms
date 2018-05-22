<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$this->table->set_heading('Asset Id', 'Asset Name', 'Model Name', 'Options');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				//print_r($data);
                $edit_btn = '<button class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </button>';
                $delete_btn = '<button class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </button>';
				$this->table->add_row($data->id, $data->name,$data->model_number, $edit_btn . $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>