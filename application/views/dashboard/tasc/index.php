<div class="row">
	<?php
		$data['link'] = site_url();
		$data['data'] = "tasc";
		$action_show = array('download' => "block", 'excel' => 'block','add' => 'none');
		tools_action($data['link'], $data['data'],$action_show);
		$template['table_open']  = '<table id="table_'.$data['data'].'" class="table table table-striped table-bordered">';
		$this->table->set_template($template);
	?>
</div>
<?php
	include 'download.php';
?>