<div class="row">
    <div class="col-lg-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Add Skills</h3>
            </div>

            <div class="box-body">
                <?PHP echo (isset($add_skill_success) ? '<div class="alert alert-success">' . $add_skill_success . '</div>' : ''); ?>
                <form method="post" action="<?PHP echo base_url(); ?>index.php/tms/skills/add_skill">
                    <div class="form-group">
                        <label class="control-label" for="skill">Skill</label>
                        <select name="skill_id" class="form-control">
                            <option value="">Choose...</option>
                            <?PHP

                            if (isset($select_skills)) {
                                foreach ($select_skills as $key => $value) {
                                    ?>
                            <option value="<?PHP echo $key; ?>"><?PHP echo $value ?></option>
                            <?PHP
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_skill" class="btn btn-info form-control" value="Add Skill">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">My Skills</h3>
            </div>

            <div class="box-body">
                <?PHP

                if (isset($msg)) {
                    echo '<div class="alert alert-info">' . $msg . '</div>';
                }

                if (isset($skills)) {
                ?>

                    <table class="table table-hover table-stripped">
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Rating Average</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?PHP
                        $this->load->model('skill_model');
                        foreach ($skills as $skill_object) {
                            ?>

                            <tr>
                                <td><?PHP echo $this->skill_model->get($skill_object->skill_id)->name;  ?></td>
                                <td><?PHP echo $skill_object->rating_average; ?></td>
                                <td><a href="<?PHP echo base_url() . 'index.php/tms/skills/delete_skill/' . $skill_object->id; ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span> </a> </td>
                            </tr>

                            <?PHP
                        }

                        ?>
                        </tbody>
                    </table>

                <?PHP
                }

                ?>
            </div>
        </div>
    </div>
</div>