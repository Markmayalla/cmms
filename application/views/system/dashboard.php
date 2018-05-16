<div class="row">
    <div class="col-md-8">
		<div class="container box box-success" style="position: relative;  top: 20px; left:10px;">
			<div class="tab-content">
				<?php
					$this->load->view('tools/index');
				?>
				<div class="tab-pane active" id="asset">
						<?php 
							$this->load->view('dashboard/assets/index'); 
						?>
				</div>
				<div class="tab-pane" id="organization">
						<?php 
							$this->load->view('dashboard/organization/index'); 
						?>
				</div>	
				<div class="tab-pane" id="equipment">
						<?php
							$this->load->view('dashboard/equipment/index'); 
						?>
				</div>	
				<div class="tab-pane" id="parches">
						<?php 
							$this->load->view('dashboard/parches/index'); 
						?>
				</div>	
				<div class="tab-pane" id="request">
						<?php 
							$this->load->view('dashboard/request/index'); 
						?>
				</div>	
				<div class="tab-pane" id="spare">
						<?php 
							$this->load->view('dashboard/spare/index');
						?>
				</div>	
				<div class="tab-pane" id="task">
						<?php 
							$this->load->view('dashboard/tasks/index'); 
						?>
				</div>	
				<div class="tab-pane" id="user">
						<?php 
							$this->load->view('dashboard/users/index'); 
						?>
				</div>	
				<div class="tab-pane" id="report">
						<?php 
							$this->load->view('dashboard/report/index'); 
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