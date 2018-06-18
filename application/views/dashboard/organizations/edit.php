<div id="edit_organization" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Organization</h4>
            </div>

            <div class="modal-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right small">
                        <li class="active">
                            <a href="#org_info" data-toggle="tab">Info</a>
                        </li>
                        <li><a href="#contacts" data-toggle="tab">Contacts</a> </li>
                        <li><a href="#address" data-toggle="tab">Address</a> </li>

                        <li class="pull-left header">
                            <i class="fa fa-refresh"></i>
                            Update Organization
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="org_info">
                            <form method="post">
                                <div class="form-group">
                                    <label class="control-label" for="name">Organization Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Organization Name" />
                                </div>

                                <div class="form-group">
                                    <a href="" class="btn btn-success">Update Info</a>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="address">

                        </div>

                        <div class="tab-pane" id="contacts">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>