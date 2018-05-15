<div class="tab-pane" id="organization">
                                <p class="margin-top">Step <span id="step_org">1</span>/4</p>
                                <div class="progress progress-striped active">
                                    <div id="reg_progress_org" class="progress-bar progress-bar-aqua" role="progressbar"
                                         aria-valuenow="30"
                                         aria-valuemin="0"
                                         aria-valuemax="100"
                                         aria-valuetext="Step" style="width: 25%"></div>
                                </div>
                                <div id="step1_org">
                                    <form id="org_step1" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="text" id="name_org" name="name" class="form-control" placeholder="Organization Name" required>
                                        </div>

                                        <div class="form-group">
                                            <button id="next_1_org" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step2_org">
                                    <div id="phones_org"></div>
                                    <form id="user_step2_org" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>

                                        <div id="add_phone_group_org">
                                            <div class="form-group">
                                                <select id="title_org" name="title" class="form-control" required>
                                                    <option value="">Choose Phone Type...</option>
                                                    <option value="tel">Tel</option>
                                                    <option value="fax">Fax</option>
                                                    <option value="home">Home</option>
                                                    <option value="mob">Mobile</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="number" id="phone_org" name="phone" class="form-control" placeholder="Phone No." required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button id="add_phone_org" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_phone_org" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_1_org" class="btn btn-info">Back</button>
                                            <button id="next2_org" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step3_org">
                                    <div id="emails_org"></div>
                                    <form id="user_step3_org" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>



                                        <div class="form-group">
                                            <input type="email" id="email_org" name="email" class="form-control" placeholder="Email" required>
                                        </div>



                                        <div class="form-group">
                                            <button id="add_email_org" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_email_org" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_2_org" class="btn btn-info">Back</button>
                                            <button id="next3_org" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="step4_org">
                                    <div id="addresses_org"></div>
                                    <form id="user_step4_org" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="number" id="box_org" name="box" class="form-control" placeholder="Box No.">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="street_org" name="street" class="form-control" placeholder="Street" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="district_org" name="district" class="form-control" placeholder="District" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="region_org" name="region" class="form-control" placeholder="region" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="country_org" name="country" class="form-control" placeholder="country" required>
                                        </div>

                                        <div class="form-group">
                                            <button id="add_address_org" class="btn btn-sm btn-success pull-right"><span class="fa fa-plus"></span> </button>
                                            <button id="reset_address_org" class="btn btn-sm btn-danger pull-right"><span class="fa fa-refresh"></span> </button>
                                            <button id="back_to_3_org" class="btn btn-info">Back</button>
                                            <button id="next4_org" class="btn btn-info">Next</button>
                                        </div>
                                    </form>
                                </div>
								
								<div id="step5_org">
                                    <form id="user_step5_org" class="margin-top" onsubmit="event.preventDefault()" data-parsley-validate>
                                        <div class="form-group">
                                            <input type="password" id="password_user_new_org" data-parsley-length="[6, 20]" name="password" class="form-control" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" id="password_user_new_confirm_org" data-parsley-equalto="#password_user_new_org" name="password_conf" class="form-control" placeholder="Confirm password" required>
                                        </div>

                                        <div class="form-group">
											<button id="back_to_4_org" class="btn btn-info">Back</button>
                                            <button id="finish_organization" class="btn btn-info">Finish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>