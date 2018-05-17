<?php
	function tools_action($link, $data){
		$fulllink = $link;
		?>
			<div class="row text-right" style="position: relative;  top: 5px; right:15px;">
				<div class="btn btn-group">
					<a href="<?=$fulllink;?>/action/new/<?=$data;?>" class="btn btn-success"><i class="fa fa-plus"></i> NEW </a>
					<a href="<?=$fulllink;?>/action/cvs/<?=$data;?>" class="btn btn-success"><i class="fa fa-file-cvs-o"></i> CVS </a>
					<a href="<?=$fulllink;?>/action/pdf/<?=$data;?>" class="btn btn-danger"><i class="fa fa-file-pdf"></i> PDF </a>
					<a href="<?=$fulllink;?>/action/excel/<?=$data;?>" class="btn btn-info"><i class="fa fa-file-excel"></i> Excel </a>
					<a href="<?=$fulllink;?>/action/print_priview/<?=$data;?>" class="btn btn-success"><i class="fa fa-print"></i> Print </a>
				</div>
			</div>
		<?php
	}
?>