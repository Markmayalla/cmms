<?php

$num = count((array)$display);
if($num < 1){
    echo "No data found";
}

foreach($display as $data){
    $account = @$data['username'];
    $organization = @$data['organization'];
    $task = @$data['task'];
    $asset = @$data['assets'];
    $request = @$data['request'];
    $worker = @$data['worker'];
    $equipments = @$data['equipments'];
    $spares = @$data['spares'];

    $total_worker = count($worker);

    ?>
    <div class="pull-right">
        <p><span class="fa fa-money"></span> Total Amount: <strong id="total_amount" class="text-danger">0</strong>/= </p>
        <button onclick="addOrder()" class="btn btn-lg btn-success"><span class="fa fa-plus"></span> Submit Order</button>
    </div>
    <h3 class="text-aqua"><span class="fa fa-tasks"></span> Task Description</h3>
    <p><span class="fa fa-calendar"></span> <?=@$task->date_start; ?> <strong>to</strong>  <?=@$task->date_end; ?> |
        <strong>Organization:</strong> <?=$organization->name;?> |
        <strong>Asset:</strong> <?=$asset->name; ?> <?=$asset->model_number; ?></p>

    <p><?=@$task->notes; ?></p>

    <legend>Order Spares Form</legend>
    <p class="pull-right"><span class="fa fa-shopping-cart"></span> <strong>In Cart:</strong> <span id="cart_count">0</span> </p>
    <form id="spare_parts" onsubmit="event.preventDefault()" data-parsley-validate>
        <?php
            $error = $this->sessionlib->sess_get($this->sessionlib->flashdata,'error_sms');

            if($error != ""){
                ?>
                <br />
                <div class="alert alert-success alert-dismissable" style="display: block;margin-top:10px;width:60%;">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?=$error;?>
                </div>
            <?php
            }
        ?>
        <div class="form-group">
            <input type="hidden" id="taskId" value="<?=@$task->id?>" />
            <input type="hidden" id="id" value="tasks_has_equipments">
            <input type="hidden" name="tasks_id" value="<?=@$task->id;?>">
            <label class="control-label" for="equipment_id">Spares</label>
            <select id="spare" class="form-control" name="equipment_id" onchange="updateQuantity(this)" required>
                <option value="">Choose...</option>
                <?foreach($spares as $value){?>
                    <option tag="<?=@$value->inventory;?>" price="<?=@$value->price?>" name="<?=@$value->name;?>" model="<?=@$value->model;?>" value="<?=@$value->id?>">
                        <?=@$value->name;?> @ Tsh. <?=@$value->price;?>/=
                    </option>
                <?}?>
            </select>
        </div>

        <div class="form-group">
            <label class="label-control" for="quantity">Quantity</label>
            <input id="quantity" type="number" name="quantity" max="" class="form-control" required/>
        </div>

        <div class="form-group">
            <button onclick="addSpare()" class="btn btn-info">Add to cart</button>
        </div>

        <hr />
        <h3>Add a purchase order for the Un available spares</h3>
        <form id="spare_parts" onsubmit="event.preventDefault()" data-parsley-validate>
            <div class="form-group">
                <label class="control-label" for="spare_name">Spare Name</label>
                <input type="text" class="form-control" id="spare_name" />
            </div>

            <div class="form-group">
                <label class="control-label" for="quantity">Quantity</label>
                <input type="number" class="form-control" id="_quantity" />
            </div>

            <div class="form-group">

                <input type="button" class="btn btn-info btn-sm" onclick="purchase_order()" value="Add to purchase order" />
            </div>
        </form>
    </form>

    <script>
        function updateQuantity(select) {
            var max = $('option:selected').attr('tag');
            $('#quantity').attr('max', max);
        }

        var spares = [];
        var cart = 0;
        var total_amount = 0;
        var form = $("#spare_parts").parsley();
        function addSpare() {


                var selected = $('#spare option:selected');
                var spare_id = selected.val();
                var price = selected.attr('price');
                console.log("Price: " + price);
                var name = selected.attr('name');
                var quantity = $('#quantity').val();
                console.log('Quantity: ' + quantity);

                var object = {
                    'name':name,
                    'price':price,
                    'quantity':quantity,
                    'spare_id':spare_id
                };

                cart++;
                total_amount += parseInt(quantity) *  parseInt(price);
                spares.push(object);
                console.log("total_amount: " + total_amount);
                console.log("Spares Object" + JSON.stringify(spares));

                $('#cart_count').html(cart);
                $('#total_amount').html(total_amount);

        }

        function addOrder() {
            var data = {
                'taskId': $('#taskId').val(),
                'spares': JSON.stringify(spares)
            };
            $.ajax(
                {
                    type : "POST",
                    url : site_url + 'tasks/assign_spares',
                    data : data,
                    success : function(response){
                        //console.log(tag + "Login Success");
                        //console.log(tag + "Displaying Response");
                        //console.log(tag + response);
                        window.location = site_url + 'tasks/assign_spare/'+data['taskId'];
                        //alert(response);
                    },
                    error : function(response){
                        console.log("Failed");
                    }
                }
            );


        }

        function purchase_order() {
            var data = {
                'taskId': $('#taskId').val(),
                'spare_name': $('#spare_name').val(),
                'quantity': $('#_quantity').val()
            };
            $.ajax(
                {
                    type : "POST",
                    url : site_url + 'tasks/add_purchase_order',
                    data : data,
                    success : function(response){
                        //console.log(tag + "Login Success");
                        //console.log(tag + "Displaying Response");
                        //console.log(tag + response);
                        window.location = site_url + 'tasks/assign_spare/'+data['taskId'];
                        console.log(response);
                        //alert(response);
                    },
                    error : function(response){
                        console.log("Failed");
                    }
                }
            );


        }

    </script>

<?php


}
?>