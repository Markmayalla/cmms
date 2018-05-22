<div id="add_assets" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register New Asset</h4>
            </div>

            <div class="modal-body">
                <form id="add_item_form" onsubmit="event.preventDefault()" data-parsley-validate>
                    <div id="success_msg" class="alert alert-success alert-dismissable" style="display: none;">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p id="success_msg_msg"></p>
                    </div>

                    <div class="form-group">
					<input type="text" id="id" value="assets" hidden />
                        <label class="control-label" for="name">Asset Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                               onkeyup="showAssets(this.value)"
                               placeholder="Asset Name" list="assets_names" required/>
                        <datalist id="assets_names">

                        </datalist>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="model_number">Model Number</label>
                        <input type="text" id="model_number" name="model_number" class="form-control" placeholder="Model Number" required/>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="add_item_btn" name="add_asset" class="btn btn-info"><span class="fa fa-plus"></span> Add</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>