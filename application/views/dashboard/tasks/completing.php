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

        $total_worker = count($worker);
       
        ?>
            <form class="form" method="POST" action="<?=site_url();?>/tasks/finish">
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
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" readonly value="<?=@$request->status;?>">
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
                        <h4>Description</h4>
                        <div class="form-group">
                            <textarea  name="description" rows="8" class="form-control"><?=@$task->notes;?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="finish">
                </div>
            </form>
        <?php
    }

 ?>