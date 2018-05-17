<div class="container-fluid">
    <div class="row" id="system_top_row">
        <div class="col-md-12">
            <div id="system_logo" class="pull-left">
                CMMS
            </div>


            <ul class="list-inline pull-right">
                <li><button class="btn btn-link"><span class="fa fa-user"></span> Profile</button></li>
                <li><button class="btn btn-link"><span class="fa fa-sign-out"></span> Logout </button></li>
            </ul>

        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-lg-2">
            <div id="system_menu_wrapper">
                <ul>
                    <li class="active"><a href="#asset" data-toggle="tab"><i class="fa fa-anchor" style="font-size:30px;"></i> Assets</a> </li>
                    <li><a href="#organization" data-toggle="tab"><i class="fa fa-user" style="font-size:30px;"> </i> Organizations</a> </li>
                    <li><a href="#user" data-toggle="tab"><i class="fa fa-user" style="font-size:30px;"></i> Users</a> </li>
                    <li><a href="#request" data-toggle="tab"><i class="fa fa-download" style="font-size:30px;"></i> Requests</a> </li>
                    <li><a href="#task" data-toggle="tab"><i class="fa fa-user" style="font-size:30px;"></i> Tasks</a> </li>
                    <li><a href="#equipment" data-toggle="tab"><i class="fa fa-cog" style="font-size:30px;"></i> Equipments</a> </li>
                    <li><a href="#spare" data-toggle="tab"><i class="fa fa-cogs" style="font-size:30px;"></i> Spare Parts</a> </li>
                    <li><a href="#parches" data-toggle="tab"><i class="fa fa-money" style="font-size:30px;"></i> Parches</a> </li>
                    <li><a href="#report" data-toggle="tab"><i class="fa fa-book" style="font-size:30px;"></i> Report</a> </li>
                </ul>
            </div>
        </div>
		
				

        <div class="col-md-9 col-lg-10">
            <?PHP $this->load->view('system/' . $main_content); ?>
        </div>
    </div>
</div>