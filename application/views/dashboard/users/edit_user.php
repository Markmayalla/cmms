<div class="row" style="padding:20px;">
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs small pull-right">
                <li class="active">
                     <a href="#personal_info" data-toggle="tab">Personal Info</a>
                </li>
                <li><a href="#phones" data-toggle="tab">Phones</a> </li>
                <li><a href="#emails" data-toggle="tab">Emails</a> </li>
                <li><a href="#addresses" data-toggle="tab">Addresses</a> </li>
                <li class="pull-left header"><i class="fa fa-user"></i> Profile</li>
            </ul>
                    <?php
                        $people_data_to_edit = @$display['users'];
                        $email_data_to_edit = @$display['emails'];
                        $phone_data_to_edit = @$display['phones'];
                        $address_data_to_edit = @$display['addresses'];
                    ?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal_info">
                            <form action="<?=site_url().'/users/update_profile';?>" method="POST">
                                <h4>Personal Info</h4>
                                    <input type="text" value="<?=@$people_data_to_edit[0]->id;?>"  hidden name="users_id" >
                                    <div class="form-group">
                                        <label class="control-label" for="first_name">First Name</label>
                                        <input type="text" value="<?=@$people_data_to_edit[0]->first_name;?>" class="form-control" name="first_name" placeholder="First Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="middle_name">Middle Name</label>
                                         <input type="text" value="<?=@$people_data_to_edit[0]->middle_name;?>" class="form-control" name="middle_name" placeholder="Middle Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="last_name">Last Name</label>
                                        <input type="text" value="<?=@$people_data_to_edit[0]->last_name;?>" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="gender">Gender Name</label>
                                        <select name="gender" class="form-control">
                                            <option value="">Choose...</option>
                                            <?php 
                                                if(@$people_data_to_edit[0]->gender == 'male'){
                                            ?>
                                                <option value="male" selected >Male</option>
                                                <option value="female">Female</option>
                                            <?php
                                                }else{
                                            ?>
                                                <option value="male">Male</option>
                                                <option value="female" selected >Female</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </form>

                        </div>
                        <div class="tab-pane" id="phones">
                            <?php
                                print_r($phone_data_to_edit);
                            ?>
                        </div>
                        <div class="tab-pane" id="emails">
                            <?php
                                print_r($email_data_to_edit);
                            ?>
                        </div>
                        <div class="tab-pane" id="addresses">
                            <?php
                                print_r($address_data_to_edit);
                            ?>
                        </div>
                    </div>
                            
    </div>
</div>
