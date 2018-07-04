                            <form action="<?=site_url();?>/users/email_data_to_edit" method="post">
                                <?php
                                    $i = 0;
                                    foreach(@$email_data_to_edit as $emails){
                                        ?>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?=@$emails->id;?>" name="id<?=$i;?>" hidden >
                                                        <lable for="number">Number</label>
                                                        <input type="text" value="<?=@$emails->email;?>" name="email<?=$i;?>" class="col-md-8 form-control">
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
                                    <input type="submit" class="btn btn-success" value="update emails"/>
                                </div>
                            </form>