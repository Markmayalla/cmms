<div class="container">
    <div class="row margin-top">
        <div class="col-md-7">
            <div class="box box-solid bg-aqua">
                <div class="box-header">
                    <h3 class="box-title">About CPMS</h3>
                </div>

                <div class="box-body">
                    <p>CPMS - Stands for Computerized Maintenance System</p>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header">
                        <i class="fa fa-user"></i> Welcome to CPMS
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
                            <div class="tab-pane active" id="user">
                                <p class="margin-top">Step <span id="step">1</span>/4</p>
                                <div class="progress progress-striped active">
                                    <div id="reg_progress" class="progress-bar progress-bar-aqua" role="progressbar"
                                         aria-valuenow="30"
                                         aria-valuemin="0"
                                         aria-valuemax="100"
                                         aria-valuetext="Step" style="width: 25%"></div>
                                </div>
                                <div id="step1">
                                    <form id="user_step1" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Middle Name">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required>
                                        </div>

                                        <div class="form-group">
                                            <select id="gender" name="gender" class="form-control" required>
                                                <option value="">Choose Gender...</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button id="next1" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step2">
                                    <div id="phones"></div>
                                    <form id="user_step2" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>

                                        <div id="add_phone_group">
                                            <div class="form-group">
                                                <select id="title" name="title" class="form-control" required>
                                                    <option value="">Choose Phone Type...</option>
                                                    <option value="tel">Tel</option>
                                                    <option value="fax">Fax</option>
                                                    <option value="home">Home</option>
                                                    <option value="mob">Mobile</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone No." required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button id="add_phone" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_phone" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_1" class="btn btn-info">Back</button>
                                            <button id="next2" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step3">
                                    <div id="emails"></div>
                                    <form id="user_step3" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>



                                        <div class="form-group">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>



                                        <div class="form-group">
                                            <button id="add_email" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_email" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_2" class="btn btn-info">Back</button>
                                            <button id="next3" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step4">
                                    <div id="addresses"></div>
                                    <form id="user_step4" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="number" id="box" name="box" class="form-control" placeholder="Box No.">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="street" name="street" class="form-control" placeholder="Street" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="district" name="district" class="form-control" placeholder="District" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="region" name="region" class="form-control" placeholder="region" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="country" name="country" class="form-control" placeholder="country" required>
                                        </div>

                                        <div class="form-group">
                                            <button id="add_address" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_address" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_3" class="btn btn-info">Back</button>
                                            <button id="finish" class="btn btn-info">Finish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane" id="organization">
                                <p class="margin-top">Step <span id="step">1</span>/4</p>
                                <div class="progress progress-striped active">
                                    <div id="reg_progress" class="progress-bar progress-bar-aqua" role="progressbar"
                                         aria-valuenow="30"
                                         aria-valuemin="0"
                                         aria-valuemax="100"
                                         aria-valuetext="Step" style="width: 25%"></div>
                                </div>
                                <div id="step_1">
                                    <form id="org_step1" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Organization Name" required>
                                        </div>

                                        <div class="form-group">
                                            <button id="next_1" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step2">
                                    <div id="phones"></div>
                                    <form id="user_step2" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>

                                        <div id="add_phone_group">
                                            <div class="form-group">
                                                <select id="title" name="title" class="form-control" required>
                                                    <option value="">Choose Phone Type...</option>
                                                    <option value="tel">Tel</option>
                                                    <option value="fax">Fax</option>
                                                    <option value="home">Home</option>
                                                    <option value="mob">Mobile</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone No." required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button id="add_phone" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_phone" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_1" class="btn btn-info">Back</button>
                                            <button id="next2" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step3">
                                    <div id="emails"></div>
                                    <form id="user_step3" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>



                                        <div class="form-group">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>



                                        <div class="form-group">
                                            <button id="add_email" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_email" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_2" class="btn btn-info">Back</button>
                                            <button id="next3" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step4">
                                    <div id="addresses"></div>
                                    <form id="user_step4" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="number" id="box" name="box" class="form-control" placeholder="Box No.">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="street" name="street" class="form-control" placeholder="Street" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="district" name="district" class="form-control" placeholder="District" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="region" name="region" class="form-control" placeholder="region" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="country" name="country" class="form-control" placeholder="country" required>
                                        </div>

                                        <div class="form-group">
                                            <button id="add_address" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_address" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_3" class="btn btn-info">Back</button>
                                            <button id="finish" class="btn btn-info">Finish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>