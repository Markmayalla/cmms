<div class="row">
    <Div class="col-lg-12">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Add Program Meals</h3>
            </div>
            <div class="box-body">
                <p>Selected Meal Program: <span class="badge bg-navy"><?PHP echo (isset($meal_program) ? $meal_program->name : ""); ?></span> </p>
                <p>Selected Meal Program Duration: <span class="badge bg-navy"><?PHP echo (isset($meal_program) ? $meal_program->duration . " Days" : ""); ?></span> </p>
                <table id="default_table" class="table table-stripped table-hover">
                    <thead>
                    <tr>
                        <th>Meal Name</th>
                        <th>Carbs</th>
                        <th>Fats</th>
                        <th>Proteins</th>
                        <th>Calories</th>
                        <th>Day</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?PHP

                        if (isset($meals) && count($meals) > 0) {
                            foreach ($meals as $key => $value) {
                                ?>

                                <tr class="<?PHP echo (isset($program_meals_bind[$key]) ? "alert-warning" : "")  ?>">
                                    <td><?PHP echo $value->meal_name; ?></td>
                                    <td>
                                        <?PHP
                                        $carbs = 0;
                                        if (isset($meal_components[$key]) && count($meal_components[$key]) > 0) {
                                            foreach ($meal_components[$key] as $key_i => $value_i) {

                                                if (isset($meal_elements[$key][$key_i])) {
                                                    $carbs += ($meal_elements[$key][$key_i]->dietary_fiber +
                                                            $meal_elements[$key][$key_i]->suger) *
                                                            $value_i->meal_element_amount;
                                                }
                                            }
                                        }
                                        echo $carbs;
                                        ?>

                                    </td>

                                    <td>
                                        <?PHP
                                        $fats = 0;
                                        if (isset($meal_components[$key]) && count($meal_components[$key]) > 0) {
                                            foreach ($meal_components[$key] as $key_i => $value_i) {

                                                if (isset($meal_elements[$key][$key_i])) {
                                                    $fats += ($meal_elements[$key][$key_i]->saturated_fat +
                                                            $meal_elements[$key][$key_i]->monounsaturated_fat +
                                                            $meal_elements[$key][$key_i]->polyunsaturated_fat) *
                                                        $value_i->meal_element_amount;
                                                }
                                            }
                                        }
                                        echo $fats;
                                        ?>

                                    </td>

                                    <td>
                                        <?PHP
                                        $proteins = 0;
                                        if (isset($meal_components[$key]) && count($meal_components[$key]) > 0) {
                                            foreach ($meal_components[$key] as $key_i => $value_i) {

                                                if (isset($meal_elements[$key][$key_i])) {
                                                    $proteins += $meal_elements[$key][$key_i]->proteins *
                                                                 $value_i->meal_element_amount;
                                                }
                                            }
                                        }
                                        echo $proteins;
                                        ?>

                                    </td>

                                    <td>
                                        <?PHP
                                        $calories = 0;
                                        if (isset($meal_components[$key]) && count($meal_components[$key]) > 0) {
                                            foreach ($meal_components[$key] as $key_i => $value_i) {

                                                if (isset($meal_elements[$key][$key_i])) {
                                                    $calories += $meal_elements[$key][$key_i]->calories *
                                                        $value_i->meal_element_amount;
                                                }
                                            }
                                        }
                                        echo $calories;
                                        ?>

                                    </td>

                                    <form method="post" action="<?PHP echo base_url() ?>index.php/root/diet/program_meals/<?PHP echo $meal_program->id; ?>/add_meals">
                                        <td>
                                            <input type="hidden" name="meal_id" value="<?PHP echo $value->id; ?>">
                                            <select name="day" class="form-control" required>
                                                <option value="">Choose...</option>
                                                <?PHP for ($i = 1; $i <= $meal_program->duration; $i++) { ?>
                                                    <option value="<?PHP echo $i; ?>"
                                                        <?PHP echo (isset($program_meals_bind[$key]) && $program_meals_bind[$key]->day == $i ? "selected" : "")  ?>>
                                                        Day <?PHP echo $i ?>
                                                    </option>
                                                <?PHP } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="section" class="form-control" required>
                                                <option value="">Choose...</option>
                                                <option value="breakfast"
                                                    <?PHP echo (isset($program_meals_bind[$key]) && $program_meals_bind[$key]->section == "breakfast" ? "selected" : "")  ?>>
                                                    Breakfast
                                                </option>
                                                <option value="amSnack"
                                                    <?PHP echo (isset($program_meals_bind[$key]) && $program_meals_bind[$key]->section == "amSnack" ? "selected" : "")  ?>>
                                                    A.M Snack
                                                </option>
                                                <option value="lunch"
                                                    <?PHP echo (isset($program_meals_bind[$key]) && $program_meals_bind[$key]->section == "lunch" ? "selected" : "")  ?>>
                                                    Lunch
                                                </option>
                                                <option value="pmSnack"
                                                    <?PHP echo (isset($program_meals_bind[$key]) && $program_meals_bind[$key]->section == "pmSnack" ? "selected" : "")  ?>>
                                                    P.M Snack
                                                </option>
                                                <option value="dinner"
                                                    <?PHP echo (isset($program_meals_bind[$key]) && $program_meals_bind[$key]->section == "dinner" ? "selected" : "")  ?>>
                                                    Dinner
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="hidden" name="program_meal_id"
                                                   value="<?PHP echo (isset($program_meals_bind[$key]) ? $program_meals_bind[$key]->id : "")  ?>" />
                                            <button type="submit"
                                                    name="<?PHP echo (isset($program_meals_bind[$key]) ? "edit_program_meal" : "add_program_meal")  ?>"
                                                    class="btn btn-<?PHP echo (isset($program_meals_bind[$key]) ? "info" : "success")  ?> btn-sm">
                                                <span class="fa fa-<?PHP echo (isset($program_meals_bind[$key]) ? "pencil" : "plus")  ?>"></span>
                                            </button>
                                            <a href="<?PHP echo base_url() ?>index.php/root/diet/program_meals/<?PHP echo $meal_program->id; ?>/add_meals/delete/<?PHP echo (isset($program_meals_bind[$key]) ? $program_meals_bind[$key]->id : "")  ?>"
                                               class="btn btn-sm btn-danger <?PHP echo (isset($program_meals_bind[$key]) ? "" : "disabled")  ?>"><span class="fa fa-trash-o"></span> </a>
                                        </td>
                                    </form>
                                </tr>

                                <?PHP
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </Div>
</div>