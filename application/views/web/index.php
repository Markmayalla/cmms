<div class="container">
    <div class="row margin-top">
        <div class="col-md-7">
            <div class="box box-solid bg-aqua">
                <div class="box-header">
                    <h3 class="box-title">About CMMS</h3>
                </div>

                <div class="box-body">
                    <p>CMMS - Stands for Computerized Maintenance Management System</p>
					<div id="success_string"></div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header">
                        <i class="fa fa-user"></i> Welcome to CMMS
                    </li>
                    <li><a href="#register" data-toggle="tab">Register</a> </li>
                    <li class="active"><a href="#login" data-toggle="tab">Login</a> </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="login">
                        <form id="login_form" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="username" type="text" name="username" class="form-control" placeholder="Your Username"
                                           data-parsley-trigger="change"
                                           data-parsley-remote="<?PHP echo base_url() ?>index.php/web/username_exists"
                                           data-parsley-remote-message="Oops, Please insert a valid number or email as a username"
                                           data-parsley-remote-options='{"type":"POST","dataType":"jsonp","data": {"request":"ajax"}}'
                                           required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span> </span>
                                    <input id="password_login" type="password" name="password" class="form-control" placeholder="Your Password"
                                           data-parsley-trigger=""
                                           data-parsley-remote="<?PHP echo base_url(); ?>index.php/web/check_password"
                                           data-parsley-remote-message="Incorrect Password"
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="login_system" type="submit" name="login" class="btn btn-info" value="Login">
                            </div>
                        </form>

                    </div>

                    <div class="tab-pane" id="register">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#user" data-toggle="tab">User Registration</a> </li>
                            <li><a href="#organization" data-toggle="tab">Organization Registration</a> </li>
                        </ul>

                        <div class="tab-content">
                            <?php
								include 'form_register_user.php';
							?>

                            <?php
								include 'form_register_organization.php'
							?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>