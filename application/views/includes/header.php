<div id="header_container" class="container-fluid">
    <div class="row">
        <div id="logo" class="col-lg-2 ">
            <img src="<?PHP echo base_url(); ?>images/logo.png" height="70px"/>
        </div>

        <div class="col-lg-5">
            <form action="#" method="post" class="sidebar-form">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="submit" name="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
                    </span>
                    <input type="text" name="search" class="form-control" placeholder="Search...">
                </div>
            </form>
        </div>

        <div class="col-lg-5">
            <div id="header_menu_top">
                <ul class="list-inline">
                    <li><a href="<?PHP echo base_url() ?>index.php/web/about">Who We are</a> </li>
                    <li><a href="#">News Room</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/contacts">Contact Us</a></li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/login">My Account</a></li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/register"><i class="fa fa-user"></i> </a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/cart"><i class="fa fa-shopping-cart"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 hidden-md hidden-sm hidden-xs">
            <div id="main_menu">
                <ul class="list-inline">
                    <li><a href="<?PHP echo base_url() ?>index.php/web/home">HOME</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/training_plans">TRAINING PLANS</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/meal_plans">MEAL PLANS</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/personal_training">PERSONAL TRAINING</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/trainers">TRAINERS</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/training_centers">TRAINING CENTERS</a></li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/training_academy">TRAINING ACADEMY</a> </li>
                </ul>
            </div>
        </div>

        <div class="col-md-12 hidden-lg">
            <button id="menu_btn" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main_menu_md">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_menu_md">
                <ul>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/home">HOME</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/training_plans">TRAINING PLANS</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/meal_plans">MEAL PLANS</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/personal_training">PERSONAL TRAINING</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/trainers">TRAINERS</a> </li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/training_centers">TRAINING CENTERS</a></li>
                    <li><a href="<?PHP echo base_url() ?>index.php/web/training_academy">TRAINING ACADEMY</a> </li>
                </ul>
            </div>
        </div>
    </div>

</div>
