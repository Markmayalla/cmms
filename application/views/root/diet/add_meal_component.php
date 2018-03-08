<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Meal Components</h3>
            </div>

            <div class="box-body">
                <?PHP if (isset($meal)) { ?>
                    <h4>Selected Meal Details</h4>
                    <strong>Meal Name: </strong> <span class="badge bg-olive"><?PHP echo $meal->meal_name; ?></span>
                    <strong>Meal Category: </strong> <span class="badge bg-aqua"><?PHP echo $meal->meal_time; ?></span>
                    <strong>Meal Calories: </strong> <span class="badge bg-info"><?PHP echo $meal->calories; ?></span>

                    <table id="meals" class="table table-hover table-stripped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Carbs</th>
                            <th>Fats</th>
                            <th>Protein</th>
                            <th>Calories</th>
                            <th>Portion</th>
                            <th>Amount/Portion</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?PHP
                    if (isset($meal_elements)) {
                        if (count($meal_elements) > 0) {
                            foreach ($meal_elements as $key => $value) {
                    ?>
                                <tr class="<?PHP echo (isset($meal_component[$key]) ? 'alert-info' : ''); ?>">
                                    <td><?PHP echo $value->element_name; ?></td>
                                    <td><?PHP echo $value->dietary_fiber + $value->suger; ?></td>
                                    <td><?PHP echo $value->saturated_fat + $value->monounsaturated_fat + $value->polyunsaturated_fat; ?></td>
                                    <td><?PHP echo $value->proteins; ?></td>
                                    <td><?PHP echo $value->calories; ?></td>
                                    <td><?PHP echo $value->si_unit . "(s)"; ?></td>
                                    <td><?PHP echo $value->default_amount . " grams(s)"; ?></td>
                                    <form method="post"
                                    action="<?PHP echo base_url(); ?>index.php/root/diet/meals_components/add_component/<?PHP echo $meal->id; ?>/<?PHP echo (isset($meal_component[$key]) ? 'update_element' : 'add_element'); ?>/<?PHP echo $value->id; ?>">
                                    <td><input size="10px" type="number" name="meal_element_amount" step="any"
                                               value="<?PHP echo (isset($meal_component[$key]) ? $meal_component[$key]->meal_element_amount : ''); ?>"
                                               placeholder="In <?PHP echo $value->si_unit; ?>(s)" /></td>
                                    <td>
                                        <button type="submit"
                                                class="btn btn-sm <?PHP echo (isset($meal_component[$key]) ? "btn-info" : 'btn-success'); ?>">
                                            <span class="fa fa-<?PHP echo (isset($meal_component[$key]) ? "pencil" : 'plus'); ?>"></span>
                                        </button>
                                        <a href="<?PHP echo base_url(); ?>index.php/root/diet/meals_components/add_component/<?PHP echo $meal->id; ?>/delete_element/<?PHP echo $value->id; ?>"
                                           class="btn btn-sm btn-danger <?PHP echo (isset($meal_component[$key]) ? "" : 'disabled'); ?>">
                                            <span class="fa fa-trash-o"></span>
                                        </a>
                                    </td>
                                    </form>
                                </tr>

                    <?PHP }}} ?>
                        </tbody>
                    </table>
                <?PHP } else { echo 'Invalid Meal'; }?>
            </div>
        </div>
    </div>
</div>