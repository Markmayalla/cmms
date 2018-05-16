<div class="row" style="margin-top:25px;">
	<div class="col-md-12">
		<?php
			$num_user = count($display);
			$this->table->set_heading('Asset Id', 'Asset Name', 'Model Name', 'Organization');
			for($i = 0; $i < $num_user; $i++){
				$data = $display[$i];
				//print_r($data);
				$this->table->add_row($data->ass_id, $data->ass_name,$data->ass_m_n,$data->org_name);
			}
			echo $this->table->generate();
		?>
		<br>
	</div>
</div>