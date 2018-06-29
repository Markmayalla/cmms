<div id="edit_user" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>

            <div class="modal-body">


                    <div class="row">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs small pull-right">
                                <li class="active">
                                    <a href="#personal_info" data-toggle="tab">Personal Info</a>
                                </li>
                                <li><a href="#phones" data-toggle="tab">Phones</a> </li>
                                <li><a href="#emails" data-toggle="tab">Emails</a> </li>
                                <li><a href="#addresses" data-toggle="tab">Addresses</a> </li>
                                <li class="pull-left header">
                                    <i class="fa fa-user"></i>
                                    Profile
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="personal_info">

                                    <form>
                                            <h4>Personal Info</h4>
                                            <div class="form-group">
                                                <label class="control-label" for="first_name">First Name</label>
                                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="last_name">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="gender">Gender Name</label>
                                                <select name="gender" class="form-control">
                                                    <option value="">Choose...</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button type="button" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </form>

                                </div>
                                <div class="tab-pane" id="phones"></div>
                                <div class="tab-pane" id="emails"></div>
                                <div class="tab-pane" id="addresses"></div>
                            </div>
                        </div>
                    </div>


            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>