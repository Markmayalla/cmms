<div class="row">
    <div class="col-lg-5">
       <div class="box box-success">
           <div class="box-header">
               <h3 class="box-title">Add Meal Form</h3>
           </div>

           <div class="box-body">
               <?PHP echo (isset($add_meal_success) ? '<div class="alert alert-success">' . $add_meal_success . '</div>' : '');  ?>
               <form id="add_meal_form" method="post" action="<?PHP echo base_url(); ?>index.php/root/diet/meals/add_meal" data-parsley-validate>
                   <div class="form-group">
                       <label class="control-label" for="meal_name">Meal Name</label>
                       <input type="text" name="meal_name" class="form-control" required>
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
                       <input type="submit" name="add_meal" class="btn btn-info" value="Add Meal" />
                   </div>
               </form>
           </div>
       </div>
    </div>

    <div class="col-lg-7">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Avalilable Meals</h3>
            </div>

            <div class="box-body">
                <table id="meals" class="table table-stripped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Calories</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?PHP

                    if (isset($meals)) {
                        foreach ($meals as $value) {
                            ?>
                            <tr>
                                <td><?PHP echo $value->meal_name; ?></td>
                                <td><?PHP echo $value->meal_time; ?></td>
                                <td> <?PHP echo $value->calories; ?></td>
                                <td>
                                    <div class="btn-group-sm">
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meals/view_meal/<?PHP echo $value->id ?>" class="btn btn-info"><i class="fa fa-eye"></i> </a>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meals/edit_meal/<?PHP echo $value->id ?>" class="btn btn-warning"><i class="fa fa-edit"></i> </a>
                                        <a href="<?PHP echo base_url() ?>index.php/root/diet/meals/delete_meal/<?PHP echo $value->id ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> </a>
                                    </div>
                                </td>
                            </tr>

                        <?PHP
                        }
                    } else {
                        echo 'No Meals Currently';
                    }

                    ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>