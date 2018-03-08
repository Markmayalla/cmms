<div class="row">
    <Div class="col-lg-5">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Add Exercise Program</h3>
            </div>

            <div class="box-body">
                <?PHP if (isset($success_msg)) { ?>
                    <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                <?PHP } ?>
                <?PHP if (isset($error_msg)) { ?>
                    <div class="alert alert-success"><?PHP echo $error_msg; ?></div>
                <?PHP } ?>
                <form id="default_form" method="post" action="<?PHP echo $form_action; ?>" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" for="name">Program Name</label>
                        <input type="text" name="name"
                               value="<?PHP echo (isset($form_values) ? $form_values->name : ''); ?>"
                               class="form-control" placeholder="Program name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="goal">Program Goal</label>
                        <input type="text" name="goal"
                               value="<?PHP echo (isset($form_values) ? $form_values->goal : ''); ?>"
                               class="form-control" placeholder="Weight Loss" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="workout_type">Workout Type</label>
                        <input type="text" name="workout_type"
                               value="<?PHP echo (isset($form_values) ? $form_values->workout_type : ''); ?>"
                               class="form-control" placeholder="Split" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="duration">Program Duration</label>
                        <select name="duration" class="form-control">
                            <option value="">Choose</option>
                            <option value="1" <?PHP echo (isset($form_values) && $form_values->duration == "1" ? "selected" : ""); ?>>1 Week</option>
                            <option value="2" <?PHP echo (isset($form_values) && $form_values->duration == "2" ? "selected" : ""); ?>>2 Week(s)</option>
                            <option value="3" <?PHP echo (isset($form_values) && $form_values->duration == "3" ? "selected" : ""); ?>>3 Week(s)</option>
                            <option value="4" <?PHP echo (isset($form_values) && $form_values->duration == "4" ? "selected" : ""); ?>>4 Week(s)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="days_weekly">Workout Days Per Week</label>
                        <input type="number" name="days_weekly"
                            <?PHP echo (isset($form_values) ? $form_values->days_weekly : ''); ?>
                               class="form-control" placeholder="5" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="work_out_time">Work Out Time</label>
                        <input type="text" name="work_out_time"
                               value="<?PHP echo (isset($form_values) ? $form_values->work_out_time : ''); ?>"
                               class="form-control" placeholder="45 to 60 mins" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Program Description</label>
                        <textarea name="description" class="form-control" placeholder="About the program"><?PHP echo (isset($form_values) ? $form_values->description : ''); ?></textarea>
                    </div>
                    <input type="submit" name="<?PHP echo $button[0]; ?>" value="<?PHP echo $button[1]; ?>" class="btn btn-info">
                </form>
            </div>
        </div>
    </Div>

    <div class="col-lg-7">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Exercise Programs</h3>
            </div>

            <div class="box-body">
                <table id="default_table" class="table table-stripped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Goal </th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP

                    if (isset($exercise_programs) && count($exercise_programs) > 0) {
                        foreach ($exercise_programs as $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $value->name; ?></td>
                                <td><?PHP echo $value->goal; ?></td>
                                <td><?PHP echo $value->duration . " Week(s)"; ?></td>
                                <td>
                                    <a href="<?PHP echo base_url(); ?>index.php/root/fitness/program_exercises/<?PHP echo $value->id; ?>"
                                       class="btn btn-sm btn-success">
                                        <span class="fa fa-paperclip"></span>
                                    </a>
                                    <a href="<?PHP echo base_url(); ?>index.php/root/fitness/exercise_programs/edit_exercise_program/<?PHP echo $value->id; ?>"
                                       class="btn btn-sm btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    <a href="<?PHP echo base_url(); ?>index.php/root/fitness/exercise_programs/delete_exercise_program/<?PHP echo $value->id; ?>"
                                       class="btn btn-sm btn-danger">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>

                        <?PHP
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>