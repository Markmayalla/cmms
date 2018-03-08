<div class="row">
    <div class="col-lg-5">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Exersises Form</h3>
            </div>

            <div class="box-body">
                <?PHP if (isset($success_msg)) { ?>
                <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                <?PHP } ?>
                <form id="default_form" method="post" action="<?PHP echo $form_action; ?>">
                    <div class="form-group">
                        <label class="control-label" for="name">Exersise Name</label>
                        <input type="text" name="name"
                               value="<?PHP echo (isset($form_values) ? $form_values->name : ''); ?>"
                               class="form-control" placeholder="e.g. leg press" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="si_unit">Basic Meansurment Method</label>
                        <select name="si_unit" class="form-control" required>
                            <option value="">Choose...</option>
                            <option value="rep" <?PHP echo (isset($form_values) && $form_values->si_unit == 'rep' ? 'selected' : ''); ?>>Rep</option>
                            <option value="duration" <?PHP echo (isset($form_values) && $form_values->si_unit == 'duration' ? 'selected' : ''); ?>>Time Duration</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="default_duration">Minimum Activity Time</label>
                        <div class="input-group">
                            <span class="input-group-addon">Seconds</span>
                            <input type="number" step="any"
                                   value="<?PHP echo (isset($form_values) ? $form_values->default_duration : ''); ?>"
                                   name="default_duration" class="form-control" placeholder=" 3 (time for 1 rep)" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="met">MET Value</label>
                        <input type="number" step="any"
                               value="<?PHP echo (isset($form_values) ? $form_values->met : ''); ?>"
                               name="met" class="form-control" placeholder="Energy Factor" required/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="description">Description</label>
                        <textarea name="description" class="form-control" placeholder="Important points about the exercise"><?PHP echo (isset($form_values) ? $form_values->description : ''); ?></textarea>
                    </div>

                    <input type="submit" name="<?PHP echo $button[0]; ?>" class="btn btn-info" value="<?PHP echo $button[1]; ?>" />
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Exercises</h3>
            </div>

            <div class="box-body">
                <table id="default_table" class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Meansured In</th>
                            <th>Average Duration</th>
                            <th>MET </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?PHP

                    if (isset($exercises) && count($exercises) > 0) {
                        foreach ($exercises as $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $value->name; ?></td>
                                <td><?PHP echo $value->si_unit . "(s)"; ?></td>
                                <td><?PHP echo $value->default_duration . " secs"; ?></td>
                                <td><?PHP echo $value->met; ?></td>
                                <td>
                                    <a href="<?PHP echo base_url(); ?>index.php/root/fitness/exercises/edit_exercise/<?PHP echo $value->id; ?>"
                                       class="btn btn-sm btn-info">
                                     <span class="fa fa-pencil"></span>
                                   </a>
                                    <a href="<?PHP echo base_url(); ?>index.php/root/fitness/exercises/delete_exercise/<?PHP echo $value->id; ?>"
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