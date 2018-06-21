<div id="assign_assets" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assing Asset to Organizations</h4>
            </div>

            <div class="modal-body">
                <form id="assign_asset_form" onsubmit="event.preventDefault()" data-parsley-validate>
                    <div id="success_msg" class="alert alert-success alert-dismissable" style="display: none;">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p id="success_msg_msg"></p>
                    </div>

                    <input type="hidden" id="asset_id" value="" />

                    <div class="form-group">
                        <label class="control-label" for="organization_id">Choose Organization</label>
                        <select type="text" id="organization_id" name="organization_id" class="form-control" required>
                            <option value="">Choose...</option>
                            <?PHP
                              foreach ($organizations as $key => $value) {
                                // code...
                                echo '<option value="' . $value->id . '">' . $value->name . '</option>';
                              }
                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="serial_no">Serial No.</label>
                        <input type="text" id="serial_no" name="serial_no" class="form-control" placeholder="e.g. 0203.jkdlf.8939" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="price">Asset Price</label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="e.g. 150000" required/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="due_date">Due Date</label>
                        <input type="date" id="due_date" name="due_date" class="form-control ui-datepicker" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="assign_asset" class="btn btn-info">Assign Asset</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
