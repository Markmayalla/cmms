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
            </form>
            <div class="form-group text-right">
                <?php
                    if($accountType == $role['admin']){
                ?>
                    <a class="btn btn-success" href="<?=site_url();?>/requests/assign_request_to_task/<?=@$this->uri->segment(3);?>">Give task</a>
                    <a class="btn btn-warning" href="<?=site_url();?>/requests/change_request_status/<?=@$this->uri->segment(3);?>" >Susspend</a>
                <?php
                    }
                ?>
            </div>
        <?php
    }

 ?>