<div class="row">
    <div class="col-lg-12">
        <Div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Select Available Meal</h3>
            </div>
            <div class="box-body">
                <p class="text-info">Please select a meal from the list of available meals. If the intended meal does not exist. create a new one</p>
                <table id="meals" class="table table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Carbohydrates</th>
                            <th>Lipids</th>
                            <th>Proteins</th>
                            <th>Calories</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?PHP
                    if (isset($meals)) {
                        if (count($meals) > 0) {
                            foreach ($meals as $key => $value) {
                                ?>

                                <tr>
                                    <td><?PHP echo $value->meal_name; ?></td>
                                    <td>
                                        <?PHP
                                        if (isset($meals_components['dietary_fiber'][$key]) || isset($meals_components['suger'][$key])) {
                                            $total = 0;
                                            if (isset($meals_components['dietary_fiber'][$key])) {
                                                foreach($meals_components['dietary_fiber'][$key] as $key_i => $value_i) {
                                                    $total += $value_i * $meals_components['portion_factor'][$key][$key_i];
                                                }
                                            }
                                            if (isset($meals_components['suger'][$key])) {
                                                foreach($meals_components['suger'][$key] as $key_i => $value_i) {
                                                    $total += $value_i  * $meals_components['portion_factor'][$key][$key_i];;
                                                }
                                            }
                                            echo $total;
                                        } else {
                                            echo 0;
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?PHP
                                        if (isset($meals_components['saturated_fat'][$key]) ||
                                            isset($meals_components['monounsaturated_fat'][$key]) ||
                                            isset($meals_components['polyunsaturated_fat'][$key])) {
                                            $total = 0;
                                            if (isset($meals_components['saturated_fat'][$key])) {
                                                foreach($meals_components['saturated_fat'][$key] as $key_i => $value_i) {
                                                    $total += $value_i  * $meals_components['portion_factor'][$key][$key_i];
                                                }
                                            }
                                            if (isset($meals_components['monosaturated_fat'][$key])) {
                                                foreach($meals_components['monosaturated_fat'][$key] as $key_i => $value_i) {
                                                    $total += $value_i  * $meals_components['portion_factor'][$key][$key_i];
                                                }
                                            }

                                            if (isset($meals_components['polysaturated_fat'][$key])) {
                                                foreach($meals_components['polysaturated_fat'][$key] as $key_i => $value_i) {
                                                    $total += $value_i  * $meals_components['portion_factor'][$key][$key_i];
                                                }
                                            }
                                            echo round($total);
                                        } else {
                                            echo 0;
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?PHP
                                        if (isset($meals_components['proteins'][$key])) {
                                            $total = 0;
                                            if (isset($meals_components['proteins'][$key])) {
                                                foreach($meals_components['proteins'][$key] as $key_i => $value_i) {
                                                    $total += $value_i * $meals_components['portion_factor'][$key][$key_i];
                                                }
                                            }

                                            echo round($total);
                                        } else {
                                            echo 0;
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?PHP
                                        if (isset($meals_components['calories'][$key])) {
                                            $total = 0;
                                            if (isset($meals_components['calories'][$key])) {
                                                foreach($meals_components['calories'][$key] as $key_i => $value_i) {
                                                    $total += $value_i * $meals_components['portion_factor'][$key][$key_i];
                                                }
                                            }

                                            echo round($total);
                                        } else {
                                            echo 0;
                                        }

                                        ?>
                                    </td>
                                    <td><a href="<?PHP echo base_url() ?>index.php/root/diet/meals_components/add_component/<?PHP echo $value->id; ?>" class="btn btn-sm btn-success">Select</a></td>
                                </tr>
                    <?PHP
                            }
                        } else {
                            echo "No available meals, Add a meal";
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </Div>
    </div>
</div>