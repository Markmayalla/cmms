<div class="row">
    <div class="col-md-8">
		<div class="container box box-success" style="position: relative;  top: 20px; left:10px;;">
			<div class="tab-content">
				<div class="tab-pane active" id="request">
						<?php 
							$this->load->view('tools/index');
							$this->load->view('dashboard/'.$name.'/index',$data); 
						?>
				</div>
			</div>
		</div>
    </div>

    <div class="col-md-4" >

        <div class="box box-success" style="position: relative;  top: 20px; right: 10px;">
            <div class="box-header">
                <h3 class="box-title">Requests</h3>
            </div>

            <div class="box-body">
                <div class="clearfix">
                    <span class="pull-left">Scheduled Requests</span>
                    <span class="pull-right">20/100</span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 20%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">New Requests</span>
                    <span class="pull-right">50/100</span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-aqua" style="width: 50%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">Cancelled Requests</span>
                    <span class="pull-right">30/100</span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-red" style="width: 20%"></div>
                </div>
                <div class="clearfix">
                    <button class="btn btn-sm btn-success pull-right"><span class="fa fa-cogs"></span> Manage Requests</button>
                </div>
            </div>
        </div>

        <div class="box box-info" style="position: relative;  top: 20px; right: 10px;">
            <div class="box-header">
                <h3 class="box-title">Tasks</h3>
            </div>

            <div class="box-body">
                <div class="clearfix">
                    <span class="pull-left">Ongoing Tasks</span>
                    <span class="pull-right">20/100</span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 20%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">Pending Tasks</span>
                    <span class="pull-right">50/100</span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-aqua" style="width: 50%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">Pending Tasks</span>
                    <span class="pull-right">30/100</span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-warning" style="width: 20%"></div>
                </div>
                <div class="clearfix">
                    <button class="btn btn-sm btn-info pull-right"><span class="fa fa-cogs"></span> Manage Tasks</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function loadDataUi(id){
		var view = id.substr(1);
		var link_db = site_url + "action/view/"+view;
		
		$('#iFrameDisplay').src = link_db;
		/*$.ajax({
			url : link_db,
			type : "POST",
			data : {
				
			},
			success : function(response){
				$(id).html(response);
			},
			error : function(response){
				$(id).html("Internal server error");
			}
		});
		*/
	}
</script>