<div class="row" style="padding:20px;">
                <form action="<?=site_url();?>/spares/edit_item" method="POST">
                    <div class="form-group">
						<input type="text" name="id" value="<?=@$display[0]->id;?>" hidden />
                        <label class="control-label" for="name">Spare Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?=@$display[0]->name;?>"
                               placeholder="Spare Name" list="spare_names" required/>
                    </div>

					<div class="form-group">
                        <label class="control-label" for="model_number">Category</label>
                        <input type="text" id="category" name="category" value="<?=@$display[0]->category;?>" class="form-control" placeholder="Unit Price" required/>
                    </div>
					
                    <div class="form-group">
                        <label class="control-label" for="model_number">Model</label>
                        <input type="text" id="model" name="model"  value="<?=@$display[0]->model;?>" class="form-control" placeholder="Unit Price" required/>
                    </div>
					
					<div class="form-group">
                        <label class="control-label" for="model_number">Price</label>
                        <input type="double" id="price" name="price" value="<?=@$display[0]->price;?>" class="form-control" placeholder="Unit Price" required/>
                    </div>

					<div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label" for="model_number">Available Quantity</label>
                                <input type="number" id="invitory" name="inventory" value="<?=@$display[0]->inventory;?>" class="form-control"  value="<?=@$display[0]->quantity;?>" placeholder="Quantity" readonly />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="model_number">New Spares</label>
                                <input type="number" id="add" name="add" value ="0" class="form-control"  value="0" placeholder="Quantity" required/>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="model_number">Minimum Required</label>
                                <input type="text" id="minimumRequired" class="form-control" value="<?=@$display[0]->minimumRequired;?>" name="minimumRequired" />
                            </div>
                        </div>
                    </div>
						
                    <div class="form-group">
                        <button type="submit"  class="btn btn-info"><span class="fa fa-plus"></span> Add</button>
                    </div>
                </form>
</div>