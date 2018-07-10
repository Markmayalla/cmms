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
        $equipment_views = @$data['equipment_view'];

        $total_worker = count($worker);
       
        ?>
            <form class="form" method="POST" action="<?=site_url();?>/tasks/edit_item">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Users</h4>
                        <div class="form-group">
                            <input class="form-control" type="text" readonly value="<?=@$account->first_name . " " . @$account->middle_name . " " . @$account->last_name;?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Organization</h4>
                        <div class="form-group">
                            <input class="form-control" type="text" readonly value="<?=@$organization->name;?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Assets</h4>
                        <div class="form-group">
                            <input class="form-control" type="text" readonly value="<?=@$asset->name;?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" readonly value="<?=@$asset->model_number;?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                         <h4>Request</h4>
                         <div class="form-group">
                            <input class="form-control" type="text" readonly value="<?=@$request->description;?>">
                            <input type="text" name="request_id" hidden value="<?=@$this->uri->segment(3);?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" readonly value="<?=@$request->status;?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Worker</h4>
                        <div class="form-group">
                            <select name="workers" class="form-control">
                                <?php
                                    for($i= 0; $i<$total_worker;$i++){
                                        ?>
                                            <option <?=$task->workers_id == $worker[0][0] ? 'selected' : '';?> value="<?=$worker[$i][0];?>"><?=$worker[$i]['first_name'] ." ".$worker[$i]['last_name'] ;?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Task</h4>
                                <div class="col-md-6">
                                    <label class="label-control" for="workrer">Start date</label>
                                    <input value="<?=@$task->id;?>" type="text" name="task_id" hidden>
                                    <input value="<?=@$task->date_start;?>" type="date" name="date_start" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="workrer">End date</label>
                                    <input value="<?=@$task->date_end;?>" type="date" name="date_end" class="form-control">
                                </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Equipments</h4>
                        <p>
                            <?php
                                foreach($equipment_views as $equipment_view){
                                    echo $this->equipment_model->get_by(array('equipment_id' => @$equipment_view->equipments_id))->equipment_name . " ( " .  $equipment_view->quantity . " )" . " <a href='".site_url()."/tasks/remove_equipment/".@$equipment_view->equipments_id."/".@$task->id."'>Remove</a><br>"; 
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="form-group text-right">
                                <?php
                                    if($task->status != 'completed'){
                                        $app = "approve";
                                    }else{
                                        $app = "depprove";
                                    }
                                ?>
                    <a href="<?=site_url();?>/tasks/<?=$app;?>/<?=$this->uri->segment(3);?>"  class="btn btn-success" ><?=$app;?></a>
                </div>
            </form>
        <?php
    }

 ?>