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
        $equipment_views = @$data['equipment_view'];

        $total_worker = count($worker);
        
        ?>

        <h3 class="text-aqua"><span class="fa fa-tasks"></span> Task</h3>
        <p><span class="fa fa-calendar"></span> <?=@$task->date_start; ?> <strong>to</strong>  <?=@$task->date_end; ?> |
            <strong>Organization:</strong> <?=$organization->name;?> |
            <strong>Asset:</strong> <?=$asset->name; ?> <?=$asset->model_number; ?></p>

        <p><?=@$task->notes; ?></p>
        <p>
            <?php
                foreach($equipment_views as $equipment_view){
                    echo $this->equipment_model->get_by(array('equipment_id' => @$equipment_view->equipments_id))->equipment_name . " ( " .  $equipment_view->quantity . " )" . " <a href='".site_url()."/tasks/remove_equipment/".@$equipment_view->equipments_id."/".@$task->id."'>Remove</a><br>"; 
                }
            ?>
        </p>

        <form  action="<?=site_url()?>/tasks/create_equipment" method="POST">
            <div class="form-group">
                <input type="hidden" id="id" value="tasks_has_equipments">
                <input type="hidden" name="tasks_id" value="<?=@$task->id;?>">
                <label class="control-label" for="equipment_id">Equipment</label>
                <select class="form-control" id="equipments_id" name="equipments_id" onchange="updateQuantity(this)" required>
                    <option value="">Choose...</option>
                        <?php
                            foreach($equipments as $value){
                        ?>
                            <option tag="<?=@$value->quantity;?>" value="<?=@$value->equipment_id?>"><?=@$value->equipment_name;?></option>
                        <?php
                            }
                        ?>
                </select>
            </div>

            <div class="form-group">
                <label class="label-control" for="quantity">Quantity</label>
                <input id="quantity" type="number" value="1" name="quantity" hidden />
            </div>

            <div class="form-group text-rigth">
                <button  class="btn btn-info">Add Equipment</button>
            </div>
        </form>
        <script>
            function updateQuantity(select) {
                var max = $('option:selected').attr('tag');
                $('#quantity').attr('max', max);
            }
        </script>

        <?php


    }
 ?>