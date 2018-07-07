                <form action="<?=site_url();?>/users/address_data_to_edit" method="post">
                                <?php
                                    $i = 0;
                                    foreach(@$address_data_to_edit as $address){
                                        ?>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <lable for="box">Box</label>
                                                        <input type="text" value="<?=@$address->box;?>" name="box<?=$i;?>" class="col-md-8 form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" value="<?=@$address->id;?>" name="id<?=$i;?>" hidden >
                                                        <lable for="street">Street</label>
                                                        <input type="text" value="<?=@$address->street;?>" name="street<?=$i;?>" class="col-md-4 form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <lable for="district">District</label>
                                                        <input type="text" value="<?=@$address->district;?>" name="district<?=$i;?>" class="col-md-8 form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <lable for="region">Region</label>
                                                        <input type="text" value="<?=@$address->region;?>" name="region<?=$i;?>" class="col-md-8 form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <lable for="country">Country</label>
                                                        <input type="text" value="<?=@$address->country;?>" name="country<?=$i;?>" class="col-md-8 form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        $i++;
                                    }
                                ?>
                                <input type="text" name="number" value="<?=$i;?>" hidden />
                                <input type="text" name="send_to" value="<?=@$this->uri->segment(1);?>" hidden />
                                <input type="text" value="<?=@$back_id;?>"  hidden name="users_id" >
                                <div class="form-group text-right">
                                    <input type="submit" class="btn btn-success" value="update addresses"/>
                                </div>
                            </form>