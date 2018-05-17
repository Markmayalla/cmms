<div id="data_show" style="display:none">
	<?php 
		$data['data'] = $display;
		echo json_encode($data);
	?>
</div>
<script>
		var data = document.getElementById('data_show').textContent;
		//alert(data);
		var obj = JSON.parse(data);
		
		
		for(var i = 0; i < obj.data.length; i++){
			console.log(obj.data[i]);
		}
</script>