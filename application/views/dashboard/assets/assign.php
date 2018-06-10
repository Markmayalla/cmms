<div id="assign_assets" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assing Asset to Organizations</h4>
            </div>

            <div class="modal-body">
                <form id="assign_assets_form" onsubmit="event.preventDefault()" data-parsley-validate>
                    <div id="success_msg" class="alert alert-success alert-dismissable" style="display: none;">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p id="success_msg_msg"></p>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="organization_id">Choose Organization</label>
                        <select type="text" id="organization_id" name="organization_id" class="form-control">
                            <option value="">Choose...</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="serial_no">Serial No.</label>
                        <input type="text" id="serial_no" name="serial_no" class="form-control" placeholder="e.g. 0203.jkdlf.8939">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="price">Asset Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="e.g. 150000" />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="due_date">Due Date</label>
                        <input type="date" id="due_date" name="due_date" class="form-control ui-datepicker" >
                    </div>

                    <div class="form-group">
                        <button type="button" id="assign_asset" class="btn btn-info">Assign Asset</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>