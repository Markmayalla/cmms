<div class="row">
    <div class="col-md-8">
		<div class="container box box-success" style="position: relative;  top: 20px; left:10px;;">
			<div class="tab-content">
				<div class="tab-pane active" id="request">
						<?php 
							$this->load->view('tools/index');
							$this->load->view('dashboard/'.$name.'/'.$page,$data); 
						?>
				</div>
			</div>
		</div>
    </div>

    <div class="col-md-4" >

        <div class="box box-success" style="position: relative;  top: 20px; right: 10px;">
            <div class="box-header">
                <h3 class="box-title">Update Request</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="btn btn-success" onclick="select_all_assets_on_due_date()">Update</div>
                    </div>
                    <div class="col-md-8">
                        <div id="automated_classess_sms">Updating...</div>
                    </div>
                </div>
                <div class="row" id="loader_layout" style="padding:5px;display:none">
                    <div class="col-md-12">
                        <div class="progress progress-striped active">
                            <div id="automatomate_loading" class="progress-bar progress-bar-aqua" role="progressbar"
                                aria-valuenow="20"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                aria-valuetext="Step" style="width: 0%"
                                ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-success" style="position: relative;  top: 20px; right: 10px;">

            <div class="box-header">
                <h3 class="box-title">Requests</h3>
            </div>

            <?php
               $total_request = $requests['total'];

               $pending_request = $requests['pending'];
               $pending_request_p = $total_request != 0 ? ($pending_request / $total_request) * 100 : 0;
               $pending_request_d = $pending_request . "/" . $total_request;

               $scheduled_request = $requests['scheduled'];
               $scheduled_request_p = $total_request != 0 ? ($scheduled_request / $total_request) * 100 : 0;
               $scheduled_request_d = $scheduled_request . "/" . $total_request;

               $complete_request = $requests['complete'];
               $complete_request_p = $total_request != 0 ? ($complete_request / $total_request) * 100 : 0;
               $complete_request_d = $complete_request . "/" . $total_request;

               $suspended_request = $requests['suspended'];
               $suspended_request_p = $total_request != 0 ? ($suspended_request / $total_request) * 100 : 0;
               $suspended_request_d = $suspended_request . "/" . $total_request;
            ?>
            <div class="box-body">
                <div class="clearfix">
                    <span class="pull-left">Scheduled Requests</span>
                    <span class="pull-right"><?=$scheduled_request_d;?></span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: <?=$scheduled_request_p;?>%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">New Requests</span>
                    <span class="pull-right"><?=$pending_request_d;?></span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-aqua" style="width: <?=$pending_request_p;?>%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">Cancelled Requests</span>
                    <span class="pull-right"><?=$suspended_request_d;?></span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-red" style="width: <?=$suspended_request_p;?>%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">Completed Requests</span>
                    <span class="pull-right"><?=$complete_request_d;?></span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-red" style="width: <?=$complete_request_p;?>%"></div>
                </div>
                <div class="clearfix">
                    <button class="btn btn-sm btn-success pull-right"><span class="fa fa-cogs"></span> Manage Requests</button>
                </div>
            </div>
        </div>

        <?php
               $total_task = $tasks['total'];

               $pending_task = $tasks['pending'];
               $pending_task_p = $total_task != 0 ? ($pending_task / $total_task) * 100 : 0;
               $pending_task_d = $pending_task . "/" . $total_task;

               $scheduled_task = $tasks['scheduled'];
               $scheduled_taskt_p = $total_task != 0 ? ($scheduled_task / $total_task) * 100 : 0;
               $scheduled_task_d = $scheduled_task . "/" . $total_task;

               $complete_task = $tasks['complete'];
               $complete_task_p = $total_task != 0 ? ($complete_task / $total_task) * 100 : 0;
               $complete_task_p = $total_task != 0 ? ($complete_task / $total_task) * 100 : 0;
               $complete_task_d = $complete_task . "/" . $total_task;

               $suspended_task = $tasks['suspended'];
               $suspended_task_p = $total_task != 0 ? ($suspended_task / $total_task) * 100 : 0;
               $suspended_task_d = $suspended_task . "/" . $total_task;
            ?>
        <div class="box box-info" style="position: relative;  top: 20px; right: 10px;">
            <div class="box-header">
                <h3 class="box-title">Tasks</h3>
            </div>

            <div class="box-body">
                <div class="clearfix">
                    <span class="pull-left">Ongoing Tasks</span>
                    <span class="pull-right"><?=$complete_task_d;?></span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: <?=$complete_task_p;?>%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">Pending Tasks</span>
                    <span class="pull-right"><?=$pending_task_d;?></span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-aqua" style="width: <?=$pending_task_p;?>%"></div>
                </div>

                <div class="clearfix">
                    <span class="pull-left">Scheduled Tasks</span>
                    <span class="pull-right"><?=$scheduled_task_d;?></span>
                </div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-warning" style="width: <?=$scheduled_task_p;?>%"></div>
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