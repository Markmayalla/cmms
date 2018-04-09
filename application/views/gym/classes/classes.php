<div class="row">
    <div class="col-lg-6">
        <div class="box box-primary">
            <Div class="box-header">
                <h3 class="box-title">Add/Edit Class Form</h3>
            </Div>

            <div class="box-body">
                <form id="default_form" method="post" action="<?PHP echo $form['action']; ?>" data-parsley-validat>
                    <div class="form-group">
                        <input type="text"
                               value="<?PHP echo (isset($form_values) ? $form_values->name : ''); ?>"
                               name="name" class="form-control" placeholder="Class Name" required/>
                    </div>

                    <Div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Description">
                            <?PHP echo (isset($form_values) ? $form_values->description : ''); ?>
                        </textarea>
                    </Div>
                    <input type="submit" name="<?PHP echo $form['btn_name']; ?>" class="btn btn-info" value="<?PHP echo $form['btn_value']; ?>" />
                </form>
            </div>
        </div>

    </div>

    <div class="col-lg-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gym Classes</h3>
            </div>

            <div class="box-body">
                <table id="default_table" class="table table-hover table-stripped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <?PHP

                    if (isset($classes) && count($classes) > 0) {
                        foreach ($classes as $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $value->name; ?></td>
                                <td>
                                    <a href="<?PHP echo base_url(); ?>index.php/gym/gym_classes/<?PHP echo $gym->id; ?>/classes/update/<?PHP echo $value->id; ?>" class="btn btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    <a href="<?PHP echo base_url(); ?>index.php/gym/gym_classes/<?PHP echo $gym->id; ?>/classes/delete/<?PHP echo $value->id; ?>" class="btn btn-danger">
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