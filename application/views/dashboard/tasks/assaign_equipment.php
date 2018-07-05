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
            <form class="form" method="POST" action="<?=site_url();?>/tasks/edit_item">
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
                        <h4>Task</h4>
                                <div class="col-md-6">
                                    <label class="label-control" for="workrer">Start date</label>
                                    <input value="<?=@$task->id;?>" type="text" name="task_id" hidden>
                                    <input readonly value="<?=@$task->date_start;?>" type="date"  class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="workrer">End date</label>
                                    <input readonly value="<?=@$task->date_end;?>" type="date"  class="form-control">
                                </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Description</h4>
                        <div class="form-group">
                            <h5><?=@$task->notes;?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="equipment1" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="equipment2" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="equipment3" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="Assign Task">
                </div>
            </form>
        <?php
    }
 ?>