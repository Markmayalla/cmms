<form action="<?=site_url();?>/users/phone_data_to_edit" method="post">
                                <?php
                                    $i = 0;
                                    foreach(@$phone_data_to_edit as $phones){
                                        ?>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" value="<?=@$phones->id;?>" name="id<?=$i;?>" hidden >
                                                        <lable for="title">Title</label>
                                                        <input type="text" value="<?=@$phones->title;?>" name="title<?=$i;?>" class="col-md-4 form-control">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <lable for="number">Number</label>
                                                        <input type="text" value="<?=@$phones->number;?>" name="number<?=$i;?>" class="col-md-8 form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        $i++;
                                    }
                                ?>
                                <input type="text" name="number" value="<?=$i;?>" hidden />
                                <input type="text" name="send_to" value="<?=@$this->uri->segment(1);?>" hidden />
                                <input type="hidden" value="<?=@$back_id;?>" name="users_id" >
                                <div class="form-group text-right">
                                    <input type="submit" class="btn btn-success" value="update phones"/>
                                </div>
                            </form>