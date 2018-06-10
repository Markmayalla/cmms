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
                    <li><a href="<?=site_url()."/system/view/";?>assets"><i class="fa fa-anchor" ></i> Assets</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>organizations"><i class="fa fa-user" > </i> Organizations</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>users"><i class="fa fa-user" ></i> Users</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>requests"><i class="fa fa-download" ></i> Requests</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>tasks" ><i class="fa fa-user" ></i> Tasks</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>equipments" ><i class="fa fa-cog" ></i> Equipments</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>spares" ><i class="fa fa-cogs" ></i> Spare Parts</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>purchases"><i class="fa fa-money" ></i> Purchases</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>report"><i class="fa fa-book" ></i> Report</a> </li>
                </ul>
            </div>
        </div>
		
				

        <div class="col-md-9 col-lg-10">
            <?PHP $this->load->view('system/' . $main_content); ?>
        </div>
    </div>
</div>