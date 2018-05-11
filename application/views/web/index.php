<div class="container">
    <div class="row margin-top">
        <div class="col-md-7">
            <div class="box box-solid bg-aqua">
                <div class="box-header">
                    <h3 class="box-title">About CMMS</h3>
                </div>

                <div class="box-body">
                    <p>CMMS - Stands for Computerized Maintenance Management System</p>
					<div id="success_string">hh</div>
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
                        <form method="post" action="#" data-parsley-validate>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span> </span>
                                    <input type="password" name="password" class="form-control" placeholder="Your Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info" value="Login">
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