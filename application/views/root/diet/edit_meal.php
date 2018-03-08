<div class="row">
    <div class="col-lg-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Edit Meal</h3>
            </div>

            <Div class="box-body">
                <?PHP echo (isset($edit_meal_success) ? '<div class="alert alert-success">' . $edit_meal_success . '</div>' : '');  ?>
                <form id="add_meal_form" method="post" action="<?PHP echo base_url(); ?>index.php/root/diet/meals/edit_meal/<?PHP echo $meal->id; ?>" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" for="meal_name">Meal Name</label>
                        <input type="text" name="meal_name" class="form-control" value="<?PHP echo $meal->meal_name; ?>" required>
                    </div>

                    <div class="form-group">
                        <blockquote>Meal Categories</blockquote>
                        <hr />
                        <?PHP
                        if (isset($meal_categories) && count($meal_categories) > 0) {
                            foreach ($meal_categories as $key => $value) {

                                ?>
                                <label for="meal_cat_<?PHP echo $value->id; ?>"
                                       class="control-label"><?PHP echo $value->name; ?>
                                </label>
                                <input type="checkbox"
                                       class="form-control"
                                       name="meal_cat_<?PHP echo $value->id; ?>"
                                    <?PHP echo ((isset($selected_meal_categories) && count($selected_meal_categories)>0)
                                        ? (isset($selected_meal_categories[$key]) ? $selected_meal_categories[$key] : "") : ""); ?>/>
                            <?PHP }} ?>
                        <hr />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="edit_meal" class="btn btn-info" value="Edit Meal" />
                    </div>
                </form>
            </Div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?PHP echo $meal->meal_name; ?></h3>
            </div>

            <div class="box-body">

                <?PHP
                $total_calories = 0;
                if (isset($meal_components)) {
                    foreach ($meal_components as $key => $value) {
                        $total_calories += $value->meal_element_amount * $spices[$key]->calories;
                    }
                }
                ?>

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?PHP echo $total_calories; ?></h3>
                        <p>Total Calories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flash"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
                </div>

                <canvas id="myChart"></canvas>
                <?PHP

                $lables = array();
                $carbs = array();
                $prots = array();
                $fats = array();
                $calories = array();

                if (isset($meal_components)) {
                    foreach ($meal_components as $key => $value) {
                        array_push($lables, $spices[$key]->element_name);
                        array_push($calories, $value->meal_element_amount * $spices[$key]->calories);
                    }
                }

                ?>
                <input id="jLables" type="hidden" value='<?PHP echo json_encode($lables); ?>'>
                <input id="jCalories" type="hidden" value='<?PHP echo json_encode($calories); ?>'>
            <script type="text/javascript">
                var ctx = document.getElementById('myChart').getContext('2d');
                var myLables = document.getElementById('jLables').value;
                var calories = document.getElementById('jCalories').value;
                var obj = JSON.parse(myLables);
                var obj2 = JSON.parse(calories);

                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: obj,
                        datasets: [
                            {
                            label: "Calories per component",
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgb(255, 99, 132)',
                            data: obj2,
                            }

                        ]

                    },

                    // Configuration options go here
                    options: {}
                });
            </script>


                <table id="default_table">
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>