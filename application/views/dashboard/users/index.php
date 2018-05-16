<div class="row">
	<?php
		$data['link'] = site_url();
		$data['data'] = "user";
		tools_action($data['link'], $data['data']);
	?>
	<div class="container">
		<?php
			print_r($display);
			
		?>
	</div>
</div>