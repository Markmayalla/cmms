<div class="row" style="padding:20px;">
            <form  action="<?=site_url();?>/equipments/edit_item" method="POST">
                    <div class="form-group">
						<input type="text" name="id" value="<?=@$display[0]->equipment_id;?>" hidden />
                        <label class="control-label" for="name">Equipment Name</label>
                        <input type="text" id="equipment_name" name="equipment_name" class="form-control"
                               placeholder="Equipment Name"  required value="<?=@$display[0]->equipment_name;?>"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="model_number">Unit price</label>
                        <input type="double" id="unit_price" name="unit_price" class="form-control" value="<?=@$display[0]->unit_price;?>" placeholder="Unit Price" required/>
                    </div>

					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" for="model_number">Available Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="form-control"  value="<?=@$display[0]->quantity;?>" placeholder="Quantity" readonly />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" for="model_number">New Equipment</label>
                                <input type="number" id="add" name="add" class="form-control"  value="0" placeholder="Quantity" required/>
                            </div>
                        </div>
                    </div>
					
                    <div class="form-group text-right">
                        <button type="submit"  class="btn btn-info"><span class="fa fa-plus"></span> Edit</button>
                    </div>
                </form>
</div>