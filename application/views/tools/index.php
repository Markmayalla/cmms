<?php
	function tools_action($link, $data){
		$fulllink = $link ."/". $data;
		?>
			<div class="row text-right" style="position: relative;  top: 5px; right:15px;">
				<div class="btn btn-group">
					<a href="<?=$fulllink;?>/new" class="btn btn-success"><i class="fa fa-plus"></i> NEW </a>
					<a href="<?=$fulllink;?>/cvs" class="btn btn-success"><i class="fa fa-file-cvs-o"></i> CVS </a>
					<a href="<?=$fulllink;?>/pdf" class="btn btn-danger"><i class="fa fa-file-pdf"></i> PDF </a>
					<a href="<?=$fulllink;?>/excel" class="btn btn-info"><i class="fa fa-file-excel"></i> Excel </a>
					<a href="<?=$fulllink;?>/print" class="btn btn-success"><i class="fa fa-print"></i> Print </a>
				</div>
			</div>
		<?php
	}
?>