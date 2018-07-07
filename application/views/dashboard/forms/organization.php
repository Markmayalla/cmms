                            <form method="post" action="<?=site_url();?>/users/update_organization">
                                <div class="form-group">
                                    <label class="control-label" for="name">Organization Name</label>
                                    <input type="text" name="send_to" value="<?=@$this->uri->segment(1);?>" hidden />
                                    <input type="hidden" value="<?=@$organizations_data_to_edit->id;?>" name="id">
                                    <input type="text" value="<?=@$organizations_data_to_edit->name;?>" name="name" class="form-control" placeholder="Organization Name" />
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Update Info">
                                </div>
                            </form>