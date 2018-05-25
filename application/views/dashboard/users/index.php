<div class="row">
	<?php
		$data['link'] = site_url();
		$data['data'] = "users";
		tools_action($data['link'], $data['data']);
		$template['table_open']  = '<table id="table_'.$data['data'].'" class="table table table-striped table-bordered">';
		$this->table->set_template($template);
	?>
</div>
<?php
	include 'download.php';
?>