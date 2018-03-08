<div class="row">
    <div class="col-lg-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Add Spice</h3>
            </div>

            <Div id="side-menu" class="box-body">
                <?PHP echo (isset($add_spice_success) ? '<div class="alert alert-success">' . $add_spice_success . '</div>' : '');  ?>
                <form id="add_spice_form" method="post" action="<?PHP echo base_url(); ?>index.php/root/diet/meal_elements/add_spice" data-parsley-validate>
                    <blockquote>General Details</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="element_name">Spice Name</label>
                        <input type="text" name="element_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="si_unit">Meansured By</label>
                        <select name="si_unit" class="form-control" required>
                            <option value="">Choose...</option>
                            <option value="cup">Per Cup(s)</option>
                            <option value="tbs">Per Table Spoon</option>
                            <option value="small">Per Small Size</option>
                            <option value="medium">Per Medium Size</option>
                            <option value="large">Per Large Size</option>
                            <option value="litre">Per Litre(s)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="default_amount">Default Amount</label>
                        <input type="number" name="default_amount" class="form-control" placeholder="e.g. 100 grams" required>
                    </div>
                    <blockquote>Spice Categories</blockquote>
                    <div class="form-group">
                        <hr />
                        <?PHP
                        if (isset($spice_categories) && count($spice_categories) > 0) {
                            foreach ($spice_categories as $value) {

                                ?>
                                <label for="spice_cat_<?PHP echo $value->id; ?>"
                                       class="control-label"><?PHP echo $value->name; ?>
                                </label>
                                <input type="checkbox"
                                       class="form-control"
                                       name="spice_cat_<?PHP echo $value->id; ?>" />
                            <?PHP }} ?>
                        <hr />
                    </div>
                    <blockquote>Carbohydrates</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="dietary_fiber">Dietary Fiber</label>
                        <input type="number" step="any" name="dietary_fiber" class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="suger">Suger</label>
                        <input type="number" step="any" name="suger" class="form-control" placeholder="In Grams" >
                    </div>

                    <blockquote>Lipids (Fats)</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="saturated_fat">Saturated Fat</label>
                        <input type="number" step="any" name="saturated_fat" class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="polyunsaturated_fat">Poly Unsaturated Fat</label>
                        <input type="number" step="any" name="polyunsaturated_fat" class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="monounsaturated_fat">Mono Unsaturated Fat</label>
                        <input type="number" step="any" name="monounsaturated_fat" class="form-control" placeholder="In Grams" >
                    </div>
                    <blockquote>Proteins & Vitamins</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="proteins">Proteins</label>
                        <input type="number" step="any" name="proteins" class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <hr />
                        <?PHP
                            if (isset($vitamins) && count($vitamins) > 0) {
                                foreach ($vitamins as $value) {

                        ?>
                        <label for="vit_id_<?PHP echo $value->id; ?>"
                               class="control-label"><?PHP echo $value->name; ?>
                        </label>
                        <input type="checkbox"
                               class="form-control"
                               name="vit_id_<?PHP echo $value->id; ?>" />
                        <?PHP }} ?>
                        <hr />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="water">Water</label>
                        <input type="number" step="any" name="water" class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="calories">Calories</label>
                        <input type="number" step="any" name="calories" class="form-control" placeholder="In Grams" >
                    </div>

                    <div class="form-group">
                        <input type="submit" name="add_spice" class="btn btn-info" value="Add Spice">
                    </div>

                </form>
            </Div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Avalilable Spices</h3>
            </div>

            <div class="box-body">
                <table id="spices" class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Calories</th>
                            <th>SI Unit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?PHP

                    if (isset($spices)) {
                        foreach ($spices as $value) {
                    ?>
                            <tr>
                                <td><?PHP echo $value->element_name; ?></td>
                                <td><?PHP echo $value->calories; ?></td>
                                <td>Per <?PHP echo $value->si_unit; ?>(s)</td>
                                <td>
                                    <div class="btn-group-sm">
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meal_elements/view_spice/<?PHP echo $value->id ?>" class="btn btn-info"><i class="fa fa-eye"></i> </a>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meal_elements/edit_spice/<?PHP echo $value->id ?>" class="btn btn-warning"><i class="fa fa-edit"></i> </a>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meal_elements/delete_spice/<?PHP echo $value->id ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> </a>
                                    </div>
                                </td>
                            </tr>

                    <?PHP
                        }
                    } else {
                        echo 'No Spices Currently';
                    }

                    ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>