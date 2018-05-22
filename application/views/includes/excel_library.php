	<script type="text/javascript">
        function createTableWorkbook(data,link_db) {
			//alert(link_db);
            $.ajax({
				type: "POST",
				url : link_db,
				data : {
					table : data
				},
				success: function(response){
					var rowV = ['A','B','C','D','E','F','G','H','I','J','K','L'];
					var objectJSON = JSON.parse(response);
					var data = objectJSON.data;
					var heading = objectJSON.heading;
					var shots = objectJSON.shots;
					var excelName = objectJSON.excelName;
					console.log(data);
					 var columns = heading.length;
					 var rows = data.length;
					 
					var workbook = new $.ig.excel.Workbook($.ig.excel.WorkbookFormat.excel2007);
					var sheet = workbook.worksheets().add('Sheet1');
					
					for(var i = 0; i < columns; i++){
						sheet.columns(i).setWidth(160, $.ig.excel.WorksheetColumnWidthUnit.pixel);
					}
					
					
					// Create a to-do list table with columns for tasks and their priorities.
					for(var i = 0; i < columns; i++){
						sheet.getCell(rowV[i] + '1').value(heading[i]);
					}
					
					var table_req = rowV[0] + '1:' + rowV[columns-1] + (rows+1);
					var table = sheet.tables().add(table_req , true);

					
					for(var i = 0; i < rows; i++){
						var dataPop = data[i];
						for(var j = 0; j <= columns; j++){
							var shot_i = shots[j];
							sheet.getCell(rowV[j] + (i+2)).value(dataPop[shot_i]);
						}
					}
					
					saveWorkbook(workbook, excelName);
				},
				error: function(response){
					//alert(response)
				}
			});
        }
		
		function saveWorkbook(workbook, name) {
            workbook.save({ type: 'blob' }, function (data) {
                saveAs(data, name);
            }, function (error) {
                alert('Error exporting: : ' + error);
            });
        }
    </script>
	
	
	<script src="<?=base_url();?>excel/filesaver.js"></script>
    <script src="<?=base_url();?>excel/blob.js"></script>

    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.core.js"></script>

    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_core.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_collections.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_text.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_io.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_ui.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.documents.core_core.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_collectionsextended.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.excel_core.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_threading.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.ext_web.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.xml.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.documents.core_openxml.js"></script>
    <script type="text/javascript" src="<?=base_url();?>excel/infragistics.excel_serialization_openxml.js"></script>
