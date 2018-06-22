<div id="add_spares" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register New Spare</h4>
            </div>

            <div class="modal-body">
                <form id="add_item_form" onsubmit="event.preventDefault()" data-parsley-validate>
                    <div id="success_msg" class="alert alert-success alert-dismissable" style="display: none;">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p id="success_msg_msg"></p>
                    </div>

                    <div class="form-group">
						<input type="text" id="id" value="spare_parts" hidden />
                        <label class="control-label" for="name">Spare Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                               placeholder="Spare Name" list="spare_names" required/>
                    </div>

					<div class="form-group">
                        <label class="control-label" for="model_number">Category</label>
                        <input type="text" id="category" name="category" class="form-control" placeholder="Unit Price" required/>
                    </div>
					
                    <div class="form-group">
                        <label class="control-label" for="model_number">Model</label>
                        <input type="text" id="model" name="model" class="form-control" placeholder="Unit Price" required/>
                    </div>
					
					<div class="form-group">
                        <label class="control-label" for="model_number">Price</label>
                        <input type="double" id="price" name="price" class="form-control" placeholder="Unit Price" required/>
                    </div>

					<div class="form-group">
                        <label class="control-label" for="model_number">Quantity</label>
                        <input type="number" id="inventory" name="inventory" class="form-control" placeholder="Quantity" required/>
                    </div>
						<input type="text" id="minimumRequired" name="minimumRequired" value="10" hidden />
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