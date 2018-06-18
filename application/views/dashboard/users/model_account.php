<div id="account_settings" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Account Settings</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Change Password</h4>
                        <form id="add_item_form" onsubmit="event.preventDefault()" data-parsley-validate>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-lock"></span> </span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-lock"></span> </span>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Re-type Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Update Password</button>
                        </div>
                        </form>
                    </div>

                    <div class="col-lg-6">

                        <form id="add_item_form"
                              style="padding-left: 30px; padding-right: 20px"
                              class="form-horizontal" onsubmit="event.preventDefault()" data-parsley-validate>

                            <div class="form-group">
                                <label class="control-label" for="account_type">Account Type</label>
                                <select name="account_type" id="account_type" class="form-control">
                                    <option value="">Choose...</option>
                                    <option value="user">Customer</option>
                                    <option value="worker">Worker</option>
                                    <option value="manager">Manager</option>
                                    <option value="admin"><i class="fa fa-key"></i>Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span> </span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span> </span>
                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Re-type Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-info pull-right">Add Account</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>