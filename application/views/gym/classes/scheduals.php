<div class="row">
    <div class="col-lg-6">
        <div class="box box-primary">
            <Div class="box-header">
                <h3 class="box-title">Add/Edit Scheduals Form</h3>
            </Div>

            <div class="box-body">
                <form id="default_form" method="post" action="<?PHP echo $form['action']; ?>" data-parsley-validat>
                    <div class="form-group">
                        <select name="classes_id" class="form-control">
                            <option value="">Choose...</option>
                            <?PHP
                            if (isset($classes) && count($classes) > 0) {
                                foreach ($classes as $value) {
                                    ?>
                                    <option value="<?PHP echo $value->id; ?>"
                                        <?PHP echo (isset($form_values) && $form_values->classes_id == $value->id ? 'selected' : ''); ?>>
                                        <?PHP echo $value->name; ?>
                                    </option>
                                    <?PHP
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="day" class="form-control">
                            <option value="">Choose...</option>
                            <option value="monday" <?PHP echo (isset($form_values) && $form_values->day == 'monday' ? 'selected' : ''); ?>>Monday</option>
                            <option value="tuesday" <?PHP echo (isset($form_values) && $form_values->day == 'tuesday' ? 'selected' : ''); ?>>Tuesday</option>
                            <option value="wednesday" <?PHP echo (isset($form_values) && $form_values->day == 'wednesday' ? 'selected' : ''); ?>>Wednesday</option>
                            <option value="thursday" <?PHP echo (isset($form_values) && $form_values->day == 'thursday' ? 'selected' : ''); ?>>Thursday</option>
                            <option value="friday" <?PHP echo (isset($form_values) && $form_values->day == 'friday' ? 'selected' : ''); ?>>Friday</option>
                            <option value="saturday" <?PHP echo (isset($form_values) && $form_values->day == 'saturday' ? 'selected' : ''); ?>>Saturday</option>
                            <option value="sunday" <?PHP echo (isset($form_values) && $form_values->day == 'sunday' ? 'selected' : ''); ?>>Sunday</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="timeRange"
                               value="<?PHP echo (isset($form_values) ? $form_values->timeRange : ''); ?>"
                               class="form-control" placeholder="Time Range">
                    </div>
                    <input type="submit" name="<?PHP echo $form['btn_name']; ?>" class="btn btn-info" value="<?PHP echo $form['btn_value']; ?>" />
                </form>
            </div>
        </div>

    </div>

    <div class="col-lg-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gym Class Scheduals</h3>
            </div>

            <div class="box-body">
                <table id="default_table" class="table table-hover table-stripped">
                    <thead>
                    <tr>
                        <th>Class</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <?PHP

                    if (isset($scheduals) && count($scheduals) > 0) {
                        foreach ($scheduals as $key => $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $classes[$key]->name; ?></td>
                                <td><?PHP echo $value->day; ?></td>
                                <td><?PHP echo $value->timeRange; ?></td>
                                <td>
                                    <a href="<?PHP echo base_url(); ?>index.php/gym/gym_classes/<?PHP echo $gym->id; ?>/scheduals/update/<?PHP echo $value->id; ?>" class="btn btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    <a href="<?PHP echo base_url(); ?>index.php/gym/gym_classes/<?PHP echo $gym->id; ?>/scheduals/delete/<?PHP echo $value->id; ?>" class="btn btn-danger">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>


                        <?PHP
                        }
                    }

                    ?>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>