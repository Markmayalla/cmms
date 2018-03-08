<div class="row">
    <div class="col-lg-5">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Add or Edit Meal Categories Form</h3>
            </div>
            <div class="box-body">
                <?PHP
                if (isset($success_msg)) {
                    ?>
                    <div class="alert alert-success"><?PHP echo $success_msg;  ?></div>
                <?PHP } ?>
                <?PHP
                if (isset($error_msg)) {
                    ?>
                    <div class="alert alert-success"><?PHP echo $error_msg;  ?></div>
                <?PHP } ?>


                <form method="post" action="<?PHP echo (isset($form_action) ? $form_action : ''); ?>" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" for="name">Meal Category Name</label>
                        <input type="text"
                               name="name"
                               value="<?PHP echo (isset($form_values) ? $form_values->name : ''); ?>"
                               class="form-control">
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
        <Div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Available Meal Categories</h3>
            </div>
            <div class="box-body">
                <table id="default_table" class="table table-hover table-stripped">
                    <thead>
                    <tr>
                        <th>S/n</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?PHP
                    if (isset($meal_categories)) {
                        if (!(count($meal_categories) > 0)) {
                            echo "No Meal Categories, Please Add";
                        } else {
                            foreach ($meal_categories as $value) {
                                ?>
                                <tr>
                                    <td><?PHP echo $value->id; ?></td>
                                    <td><?PHP echo $value->name; ?></td>
                                    <td>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meal_categories_true/edit_category/<?PHP echo $value->id ?>"
                                           class="btn btn-info btn-sm">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meal_categories_true/delete_category/<?PHP echo $value->id ?>" class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash-o"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?PHP }}} ?>

                    </tbody>
                </table>
            </div>
        </Div>
    </div>
</div>

