<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$this->table->set_heading('Equipment ID', 'Equipment Name', 'Price','Quantity', 'Options');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				//print_r($data);
                $edit_btn = '<button class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </button>';
                $delete_btn = '<button class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </button>';
				$this->table->add_row($data->equipment_id, $data->equipment_name,$data->unit_price,$data->quantity, $edit_btn . $delete_btn);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>