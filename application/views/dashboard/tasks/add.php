<div id="add_equipment" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register New Equipment</h4>
            </div>

            <div class="modal-body">
                <form id="add_item_form" onsubmit="event.preventDefault()" data-parsley-validate>
                    <div id="success_msg" class="alert alert-success alert-dismissable" style="display: none;">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p id="success_msg_msg"></p>
                    </div>

                    <div class="form-group">
						<input type="text" id="id" value="equipment" hidden />
                        <label class="control-label" for="name">Equipment Name</label>
                        <input type="text" id="equipment_name" name="equipment_name" class="form-control"
                               placeholder="Equipment Name" list="equipment_names" required/>
                        <datalist id="equipment_names">

                        </datalist>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="model_number">Unit price</label>
                        <input type="double" id="unit_price" name="unit_price" class="form-control" placeholder="Unit Price" required/>
                    </div>

					<div class="form-group">
                        <label class="control-label" for="model_number">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Quantity" required/>
                    </div>
					
                    <div class="form-group">
                        <button type="submit" id="add_item_btn" name="add_item" class="btn btn-info"><span class="fa fa-plus"></span> Add</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>