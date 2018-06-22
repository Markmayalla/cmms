<!-- jQuery 2.0.2 -->
<script src="<?=base_url();?>js/jquery.min.js"></script>

<!-- PUBNUB SDK libraries -->
<script src="<?=base_url();?>js/pubnub-3.7.14.min.js"></script>
<script src="<?=base_url();?>js/webrtc.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>


<?php
	include 'excel_library.php';
?>
<!-- Bootstrap -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Sparkline -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?PHP echo base_url(); ?>AdminLTE/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/AdminLTE/dashboard.js" type="text/javascript"></script>

<!-- Parsley Form Validation Javascript Library -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/AdminLTE/parsley.js" type="text/javascript"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?PHP echo base_url(); ?>AdminLTE/js/AdminLTE/monsterJS.js" type="text/javascript"></script>
<script src="<?PHP echo base_url(); ?>js/dataTable.js" type="text/javascript"></script>
<script src="<?PHP echo base_url(); ?>js/print.min.js" type="text/javascript"></script>


<script src="<?PHP echo base_url(); ?>AdminLTE/js/AdminLTE/gis.js" type="text/javascript"></script>



<script>
(function($){
	$(document).ready( function () {
		$('#table_assets').DataTable();
		$('#table_equipments').DataTable();
		$('#table_organization').DataTable();
		$('#table_users').DataTable();
		$('#table_parches').DataTable();
		$('#table_report').DataTable();
		$('#table_requests').DataTable();
		$('#table_spares').DataTable();
		$('#table_tasks').DataTable();
	} );
	
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  var target = $(e.target).attr("href") // activated tab
	  loadDataUi(target);
	});
	$("#assets").click();



})(jQuery);


</script>
</body>
</html>