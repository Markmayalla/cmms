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
                    <li><a href="<?=site_url()."/system/view/";?>assets"><i class="fa fa-anchor" style="font-size:30px;"></i> Assets</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>organization"><i class="fa fa-user" style="font-size:30px;"> </i> Organizations</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>users"><i class="fa fa-user" style="font-size:30px;"></i> Users</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>request"><i class="fa fa-download" style="font-size:30px;"></i> Requests</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>tasks" ><i class="fa fa-user" style="font-size:30px;"></i> Tasks</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>equipment" ><i class="fa fa-cog" style="font-size:30px;"></i> Equipments</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>spare" ><i class="fa fa-cogs" style="font-size:30px;"></i> Spare Parts</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>parches"><i class="fa fa-money" style="font-size:30px;"></i> Parches</a> </li>
                    <li><a href="<?=site_url()."/system/view/";?>report"><i class="fa fa-book" style="font-size:30px;"></i> Report</a> </li>
                </ul>
            </div>
        </div>
		
				

        <div class="col-md-9 col-lg-10">
            <?PHP $this->load->view('system/' . $main_content); ?>
        </div>
    </div>
</div>