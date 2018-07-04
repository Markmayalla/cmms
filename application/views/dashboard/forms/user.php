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
                                        <input type="text" value="<?=$people_data_to_edit[0]->last_name;?>" class="form-control" name="last_name" placeholder="Last Name">
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
                                    <input type="text" name="send_to" value="<?=@$this->uri->segment(1);?>" hidden >
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </form>