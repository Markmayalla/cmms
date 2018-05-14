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
                    <li><a href="#">Assets</a> </li>
                    <li><a href="#">Organizations</a> </li>
                    <li><a href="#">Users</a> </li>
                    <li><a href="#">Requests</a> </li>
                    <li><a href="#">Tasks</a> </li>
                    <li><a href="#">Equipments</a> </li>
                    <li><a href="#">Spare Parts</a> </li>
                </ul>
            </div>
        </div>

        <div class="col-md-9 col-lg-10">
            <?PHP $this->load->view('system/' . $main_content); ?>
        </div>
    </div>
</div>