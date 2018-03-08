<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to marketing sub-suite...</h3>
            </div>

            <div class="box-body">
                <p>It is a sub-suite belonging to the awareness suite. It is a connecting bridge between buyers and ES sellers for ES products. it contains the list of ES products that can selected for order and perform complete transaction between a seller and a buyer</p>
                <p>The marketing suite is concerned with enhancing sellers and buyers’ decisions relating to the sale of the outputs of PES products. Further, it provides services of advertising and buyer access.</p>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <Div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Marketing Products</h3>
            </div>

            <div class="box-body">
                <table id="products_table" class="table table-hover table-stripped">
                    <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Apex Group</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?PHP
                    if (count($products) > 0) {
                        foreach ($products as $key => $product) {
                            ?>

                            <tr>
                                <td><img src="<?PHP echo $product_pictures[$key][0]->guide ?>" height="50px" /> </td>
                                <td><?PHP echo $apex_groups[$key]->name; ?></td>
                                <td><?PHP echo $categories[$key]->name; ?></td>
                                <td><?PHP echo $product->name; ?></td>
                                <td><a href="<?PHP echo base_url(); ?>index.php/system/marketing/order/<?PHP echo $product->id; ?>" class="btn btn-sm btn-info"><span class="fa fa-shopping-cart"></span> Order</a> </td>
                            </tr>

                            <?PHP
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </Div>

    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"><span class="fa fa-shopping-cart"></span> Product Order Details</h3>
            </div>

            <div class="box-body">
                <?PHP

                if (!isset($product_selected)) {
                    echo 'Order details will be presented here';
                } else {
                    ?>

                    <table class="table table-stripped table-hover">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Status</th>
                            <th>Selling Price</th>
                        </tr>

                        <tr>
                            <td><?PHP echo $product->name; ?></td>
                            <td><span class="badge bg-blue"><?PHP echo $category->name; ?></span> </td>
                            <td><span class="badge bg-green"><?PHP echo $product->status; ?></span> </td>
                            <td><?PHP echo number_format($product_selected->selling_price); ?>/= <span class="badge bg-red">per <?PHP echo $category->si_unit; ?></span></td>
                        </tr>
                    </table>

                    <table class="table table-stripped table-hover">
                        <tr>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>

                        <tr>
                            <td><?PHP echo $product->contact_person; ?></td>
                            <td><?PHP echo $product->phone; ?></td>
                            <td><?PHP echo $product->email; ?></td>
                        </tr>
                    </table> <br />

                    <ul class="list-group">
                        <li class="list-group-item"><strong>Availability Date: </strong><span class="badge bg-aqua"><?PHP echo $product->availability; ?></span></li>
                        <li class="list-group-item"><strong>Available Stock: </strong><span class="badge bg-navy"><?PHP echo $product->quantity; ?> <?PHP echo $category->si_unit; ?>s</span></li>
                        <li class="list-group-item"><strong>Apex Group Identity: </strong><span class="badge bg-fuchsia"><?PHP echo $apex_group->name; ?></span></li>
                        <li class="list-group-item"><strong>Product Geo Location: </strong><span class="badge bg-maroon"><?PHP echo $apex_group->location; ?></span></li>
                        <li class="list-group-item"><strong>Product Description: </strong><?PHP echo $product->description; ?></li>
                    </ul>

                    <?PHP
                    foreach ($pictures as $pic) {
                        ?>
                        <img src="<?PHP echo $pic->guide; ?>" height="75px"  />
                        <?
                    }
                    ?>

                    <?PHP echo form_open('system/marketing/order/' . $product_selected->id . '/submit'); ?>
                    <?PHP echo (isset($order_success) ? $order_success : ''); ?>
                        <div class="form-group">
                            <label class="control-label" for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Order Quantity"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Order Description</label>
                            <textarea name="description" class="form-control" placeholder="Describe your order"></textarea>
                        </div>
                        <input type="submit" name="submit_order" class="btn btn-info" value="Submit Order" />
                    </form>

                    <?PHP
                }

                ?>
            </div>
        </div>


    </div>
</div>