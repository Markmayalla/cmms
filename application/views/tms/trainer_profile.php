<div class="row">
    <div class="col-lg-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Additional Information</h3>
            </div>

            <div class="box-body">
                <?PHP echo (isset($feedback) ? $feedback : ''); ?>
                <form id="trainer_info" method="post" action="<?PHP echo base_url() ?>/index.php/tms/dashboard/add_info" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" for="qualification">Qualification</label>
                        <select name="qualification" class="form-control" required>
                            <option value="" <?PHP echo (count($trainer) > 0 ? ($trainer->qualification == '' ? 'selected' : '') : ''); ?>>Choose...</option>
                            <option value="certified" <?PHP echo (count($trainer) > 0 ? ($trainer->qualification == 'certified' ? 'selected' : '') : ''); ?>>Certified</option>
                            <option value="uncertified" <?PHP echo (count($trainer) > 0 ? ($trainer->qualification == 'uncertified' ? 'selected' : '') : ''); ?>>Uncertified</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="experience">Experience</label>
                        <input type="number" name="experience" class="form-control" value="<?PHP echo (count($trainer) > 0 ? $trainer->experience : '') ?>" placeholder="Experience in Years" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="language">Languages</label>
                        <input type="text" name="languages" class="form-control" value="<?PHP echo (count($trainer) > 0 ? $trainer->languages : '') ?>" placeholder="English, Chinese etc.." />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="bio">Bio</label>
                        <textarea name="bio" class="form-control" placeholder="About Yourself" required=""><?PHP echo (count($trainer) > 0 ? $trainer->bio : '') ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="add" class="btn btn-info" value="<?PHP echo (count($trainer) > 0 ? 'Update' : 'Add') ?>" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Additional Information</h3>
            </div>
            <div class="box-body">

            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Trainer Display Picture</h3>
            </div>
            <div class="box-body">
                <?PHP echo (isset($img_error) ? $img_error : ''); ?>
                <?PHP echo (isset($upload_error) ? $upload_error : ''); ?>
                <?PHP echo (isset($img_success) ? $img_success : ''); ?>
                <?PHP
                if (isset($trainer)) {
                    if (count($trainer) > 0) {
                        if ($trainer->picture != '') {
                            echo '<img src="' . base_url() . 'images/trainers/manipulated/' . $trainer->picture . '" class="img img-responsive" />';
                        } else {
                            echo 'No existing picture, please add';
                        }
                    } else {
                        echo 'No existing picture, please add';
                    }
                }
                ?>
                <form method="post" action="<?PHP echo base_url(); ?>index.php/tms/dashboard/add_picture" enctype="multipart/form-data" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" for="picture">Picture</label>
                        <input type="file" name="picture" class="form-control" />
                    </div>
                    <input type="submit" class="btn btn-info" name="add_picture" value="Add/Update" />
                </form>
            </div>
        </div>
    </div>
</div>