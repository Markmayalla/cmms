<div class="container-fluid">
    <div class="row" id="system_top_row">
        <div class="col-md-12">
            <div id="system_logo" class="pull-left">
                CMMS
            </div>


            <ul class="list-inline pull-right">
                <li><button class="btn btn-link"><span class="fa fa-user"></span> <?=$fullName;?></button></li>
                <li><a class="btn btn-link" href="<?=site_url()."/system/logout";?>"><span class="fa fa-sign-out"></span> Logout </a></li>
            </ul>

        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-lg-2">
            <div id="system_menu_wrapper">
                <ul>
					<?php 
						if($accountRole == $role['admin']){
					?>
							<li><a href="<?=site_url()."/system/view/";?>assets"><i class="fa fa-anchor" ></i> Assets </a> </li>
							<li><a href="<?=site_url()."/system/view/";?>organization"><i class="fa fa-user" > </i> Organizations</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>users"><i class="fa fa-user" ></i> Users </a> </li>
							<li><a href="<?=site_url()."/system/view/";?>request"><i class="fa fa-download" ></i> Requests</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>tasks" ><i class="fa fa-user" ></i> Tasks</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>equipments" ><i class="fa fa-cog" ></i> Equipments</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>spare" ><i class="fa fa-cogs" ></i> Spare Parts</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>parches"><i class="fa fa-money" ></i> Parches</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>workers"><i class="fa fa-money" ></i> Workers</a> </li>
					<?php 
						}
					?>
					<?php 
						if($accountRole == $role['user']){
					?>
							<li><a href="<?=site_url()."/system/view/";?>request"><i class="fa fa-download" ></i> Requests <span class='badge'><?=@$counted['requests'];?></span></a> </li>
							<li><a href="<?=site_url()."/system/view/";?>tasks" ><i class="fa fa-user" ></i> Tasks <span class='badge'><?=@$counted['tasks'];?></a> </li>
							<li><a href="<?=site_url()."/system/view/";?>equipments" ><i class="fa fa-cog" ></i> Equipments <span class='badge'><?=@$counted['equipments'];?></a> </li>
							<li><a href="<?=site_url()."/system/view/";?>spare" ><i class="fa fa-cogs" ></i> Spare Parts <span class='badge'><?=@$counted['equipments'];?></a> </li>
					<?php 
						}
					?>
					<?php 
						if($accountRole == $role['owner']){
					?>
							<li><a href="<?=site_url()."/system/view/";?>organization"><i class="fa fa-user" > </i> Organizations</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>users"><i class="fa fa-user" ></i> Users</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>request"><i class="fa fa-download" ></i> Requests</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>tasks" ><i class="fa fa-user" ></i> Tasks</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>equipments" ><i class="fa fa-cog" ></i> Equipments</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>spare" ><i class="fa fa-cogs" ></i> Spare Parts</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>parches"><i class="fa fa-money" ></i> Parches</a> </li>
					<?php 
						}
					?>
					<?php 
						if($accountRole == $role['worker']){
					?>
							<li><a href="<?=site_url()."/system/view/";?>request"><i class="fa fa-download" ></i> Requests</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>tasks" ><i class="fa fa-user" ></i> Tasks</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>equipments" ><i class="fa fa-cog" ></i> Equipments</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>spare" ><i class="fa fa-cogs" ></i> Spare Parts</a> </li>
							<li><a href="<?=site_url()."/system/view/";?>parches"><i class="fa fa-money" ></i> Parches</a> </li>
					<?php 
						}
					?>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-lg-10">
            <?PHP $this->load->view('system/' . $main_content); ?>
			
        </div>
    </div>
</div>