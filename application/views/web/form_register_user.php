<div class="tab-pane active" id="user">
                                <p class="margin-top">Step <span id="step">1</span>/5</p>
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
                                            <button id="next4" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>
								
								<div id="step5">
                                    <div id="addresses"></div>
                                    <form id="user_step5" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="password" id="password_user_new" data-parsley-length="[6, 20]" name="password" class="form-control" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" id="password_user_new_confirm" data-parsley-equalto="#password_user_new" name="password_conf" class="form-control" placeholder="Confirm password" required>
                                        </div>

                                        <div class="form-group">
											<button id="back_to_4" class="btn btn-info">Back</button>
                                            <button id="finish_user" class="btn btn-info">Finish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>