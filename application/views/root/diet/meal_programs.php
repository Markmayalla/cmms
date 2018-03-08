<div class="row">
    <div class="col-lg-5">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Meal Program</h3>
            </div>

            <div class="box-body">
                <form method="post" action="<?PHP echo (isset($form_action) ? $form_action : "") ?>" data-parsley-validate>
                    <?PHP if (isset($success_msg)) { ?>
                    <div class="alert alert-success"><?PHP echo $success_msg;  ?></div>
                    <?PHP } ?>
                    <div class="form-group">
                        <label class="control-label" for="name">Program Name</label>
                        <input type="text" name="name"
                               value="<?PHP echo (isset($form_values) ? $form_values->name : ''); ?>"
                               class="form-control" placeholder="Program Name" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="duration">Program Duration</label>
                        <select name="duration" class="form-control">
                            <option value="">Choose...</option>
                            <option value="7" <?PHP echo (isset($form_values) && $form_values->duration == 7 ? "selected" : ''); ?>>One Week</option>
                            <option value="14" <?PHP echo (isset($form_values) && $form_values->duration == 14 ? "selected" : ''); ?>>Two Weeks</option>
                            <option value="21" <?PHP echo (isset($form_values) && $form_values->duration == 21 ? "selected" : ''); ?>>Three Weeks</option>
                            <option value="28" <?PHP echo (isset($form_values) && $form_values->duration == 28 ? "selected" : ''); ?>>Four Weeks</option>
                            <option value="30" <?PHP echo (isset($form_values) && $form_values->duration == 30 ? "selected" : ''); ?>>Short Month</option>
                            <option value="31" <?PHP echo (isset($form_values) && $form_values->duration == 31 ? "selected" : ''); ?>>Long Month</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="description">Program Description</label>
                        <textarea name="description" class="form-control" placeholder="About the meal program"><?PHP echo (isset($form_values) ? $form_values->description : ''); ?></textarea>
                    </div>

                    <input type="submit"
                           name="<?PHP echo (isset($button) ? $button[0] : ''); ?>"
                           class="btn btn-info"
                           value="<?PHP echo (isset($button) ? $button[1] : ''); ?>" />
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Food Programs</h3>
            </div>

            <div class="box-body">
                <table id="default_table" class="table table-hover table-stripped">
                    <thead>
                    <tr>
                        <th>Program Name</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?PHP
                    if (isset($meal_programs)) {
                        if (!(count($meal_programs) > 0)) {
                            echo "No Meal Programs, Please Add";
                        } else {
                            foreach ($meal_programs as $value) {
                                ?>
                                <tr>
                                    <td><?PHP echo $value->name; ?></td>
                                    <td><?PHP echo $value->duration; ?> days</td>
                                    <td>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/program_meals/<?PHP echo $value->id ?>"
                                           class="btn btn-success btn-sm">
                                            <span class="fa fa-paperclip"></span>
                                        </a>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meal_programs/edit_program/<?PHP echo $value->id ?>"
                                           class="btn btn-info btn-sm">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meal_programs/delete_program/<?PHP echo $value->id ?>" class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash-o"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?PHP }}} ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>