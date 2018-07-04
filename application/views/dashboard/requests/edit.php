<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 22/05/2018
 * Time: 08:25
 */
    $num = count((array)$display);
    if($num < 1){
        echo "No data found";
    }
    foreach($display as $data){
        $account = $data['username'];
		$organization = $data['organization'];
		$asset = $data['asset'];
        $request = $data['request'];
        $worker = $data['worker'];

        $total_worker = count($worker);
       
        ?>
            <form class="form" method="POST" action="<?=site_url();?>/requests/create_task">
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
                                            <option value="<?=$worker[$i][0];?>"><?=$worker[$i]['first_name'] ." ".$worker[$i]['last_name'] ;?></option>
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
                                    <label class="label-control" for="workrer">Name</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="duration">Duration</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="duration_number" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="duration_name" class="form-control">
                                                <option>hours</option>
                                                <option>days</option>
                                                <option>weeks</option>
                                                <option>months</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Description</h4>
                        <div class="form-group">
                            <textarea name="description" rows="8" class="form-control"></textarea>
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