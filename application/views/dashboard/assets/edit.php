<div class="row" style="padding:20px;">
            <h3> Edit Asset </h3>
            <form  action="<?=site_url();?>/assets/edit_item" method="POST">
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

                    <div class="form-group">
					<input type="text" id="id" value="assets" hidden />
                        <label class="control-label" for="name">Asset Name</label>
                        <input type="hidden" value="<?=@$display['assets']->id;?>" name="id">
                        <input type="text" id="name" name="name" class="form-control"
                               placeholder="Asset Name" value="<?=@$display['assets']->name;?>" required/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="model_number">Model Number</label>
                        <input type="text" id="model_number"value="<?=@$display['assets']->model_number;?>"  name="model_number" class="form-control" placeholder="Model Number" required/>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit"  class="btn btn-info"><span class="fa fa-plus"></span> Edit</button>
                    </div>
                </form>
</div>