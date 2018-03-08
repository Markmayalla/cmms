<div class="row">
    <div class="col-lg-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Edit Spice</h3>
            </div>

            <Div class="box-body">
                <?PHP echo (isset($spice_edit_success) ? '<div class="alert alert-success">' . $spice_edit_success . '</div>' : '');  ?>
                <form id="add_spice_form" method="post" action="<?PHP echo base_url(); ?>index.php/root/diet/meal_elements/edit_spice/<?PHP echo $spice->id; ?>" data-parsley-validate>
                    <blockquote>General Details</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="element_name">Spice Name</label>
                        <input type="text" name="element_name" value="<?PHP echo $spice->element_name; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="si_unit">Meansured By</label>
                        <select name="si_unit" class="form-control" required>
                            <option value="">Choose...</option>
                            <option value="cup" <?PHP echo ($spice->si_unit == 'cup' ? 'selected' : ''); ?>>Per Cup(s)</option>
                            <option value="tbs" <?PHP echo ($spice->si_unit == 'tbs' ? 'selected' : ''); ?>>Per Table Spoon</option>
                            <option value="small" <?PHP echo ($spice->si_unit == 'small' ? 'selected' : ''); ?>>Per Small Size</option>
                            <option value="medium" <?PHP echo ($spice->si_unit == 'medium' ? 'selected' : ''); ?>>Per Medium Size</option>
                            <option value="large" <?PHP echo ($spice->si_unit == 'large' ? 'selected' : ''); ?>>Per Large Size</option>
                            <option value="gram" <?PHP echo ($spice->si_unit == 'gram' ? 'selected' : ''); ?>>Per Gram(s)</option>
                            <option value="litre" <?PHP echo ($spice->si_unit == 'litre' ? 'selected' : ''); ?>>Per Litre(s)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="default_amount">Default Amount</label>
                        <input type="number" name="default_amount"
                               value="<?PHP echo $spice->default_amount; ?>"
                               class="form-control" placeholder="e.g. 100 grams" required>
                    </div>
                    <blockquote>Spice Categories</blockquote>
                    <div class="form-group">
                        <hr />
                        <?PHP
                        if (isset($spice_categories) && count($spice_categories) > 0) {
                            foreach ($spice_categories as $key => $value) {

                                ?>
                                <label for="spice_cat_<?PHP echo $value->id; ?>"
                                       class="control-label"><?PHP echo $value->name; ?>
                                </label>
                                <input type="checkbox"
                                       class="form-control"
                                       name="spice_cat_<?PHP echo $value->id; ?>"
                                    <?PHP echo ((isset($selected_spice_categories) && count($selected_spice_categories)>0)
                                        ? (isset($selected_spice_categories[$key]) ? $selected_spice_categories[$key] : "") : ""); ?>/>
                            <?PHP }} ?>
                        <hr />
                    </div>
                    <blockquote>Carbohydrates</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="dietary_fiber">Dietary Fiber</label>
                        <input type="number" step="any" name="dietary_fiber"
                               value="<?PHP echo $spice->dietary_fiber; ?>"
                               class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="suger">Suger</label>
                        <input type="number" step="any" name="suger"
                               value="<?PHP echo $spice->suger; ?>"
                               class="form-control" placeholder="In Grams" >
                    </div>

                    <blockquote>Lipids (Fats)</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="saturated_fat">Saturated Fat</label>
                        <input type="number" step="any" name="saturated_fat"
                               value="<?PHP echo $spice->saturated_fat; ?>"
                               class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="polyunsaturated_fat">Poly Unsaturated Fat</label>
                        <input type="number" step="any" name="polyunsaturated_fat"
                               value="<?PHP echo $spice->polyunsaturated_fat; ?>"
                               class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="monounsaturated_fat">Mono Unsaturated Fat</label>
                        <input type="number" step="any" name="monounsaturated_fat"
                               value="<?PHP echo $spice->monounsaturated_fat; ?>"
                               class="form-control" placeholder="In Grams" >
                    </div>
                    <blockquote>Proteins & Vitamins</blockquote>
                    <div class="form-group">
                        <label class="control-label" for="proteins">Proteins</label>
                        <input type="number" step="any" name="proteins"
                               value="<?PHP echo $spice->proteins; ?>"
                               class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <hr />
                        <?PHP
                        if (isset($vitamins) && count($vitamins) > 0) {
                            foreach ($vitamins as $key => $value) {

                                ?>
                                <label for="vit_id_<?PHP echo $value->id; ?>"
                                       class="control-label"><?PHP echo $value->name; ?>
                                </label>
                                <input type="checkbox"
                                       class="form-control"
                                       name="vit_id_<?PHP echo $value->id; ?>"
                                    <?PHP echo ((isset($selected_vitamins) && count($selected_vitamins)>0)
                                        ? (isset($selected_vitamins[$key]) ? $selected_vitamins[$key] : "") : ""); ?>/>
                            <?PHP }} ?>
                        <hr />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="water">Water</label>
                        <input type="number" step="any" name="water"
                               value="<?PHP echo $spice->water; ?>"
                               class="form-control" placeholder="In Grams" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="calories">Calories</label>
                        <input type="number" step="any" name="calories"
                               value="<?PHP echo $spice->calories; ?>"
                               class="form-control" placeholder="In Grams" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="edit_spice" class="btn btn-info" value="Edit Spice">
                    </div>
                </form>
            </Div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?PHP echo $spice->element_name; ?></h3>
            </div>

            <div class="box-body">

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?PHP echo $spice->calories; ?></h3>
                        <p>Calories <span class="badge bg-navy"><?PHP echo "per " . $spice->default_amount . " Gram(s)"; ?></span> </p>
                        <p>Categories:
                        <?PHP
                        if (isset($spice_types_present) && count($spice_types_present) > 0) {
                            foreach($spice_types_present as $value) {
                                echo '<span class="badge bg-navy">' . $value->name . '</span> ';
                            }
                        } else {
                            echo '<span class="badge bg-navy">None</span>';
                        }
                        ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-thunderstorm"></i>
                    </div>

                </div>

                <h3>Diet Composition</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <blockquote>
                            <p>Carbohydrates</p>
                            <footer>Total Composition: <cite><?PHP echo $spice->dietary_fiber + $spice->suger ?>
                                Gram(s)</PHP></cite></footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round($spice->dietary_fiber/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#fb777b">
                        <div class="knob-label">Dietary Fiber</div>
                    </div>
                    <div class="col-lg-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round($spice->suger/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#00aae5">
                        <div class="knob-label">Suger</div>
                    </div>
                    <div class="col-lg-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round(($spice->dietary_fiber + $spice->suger)/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#0281a3">
                        <div class="knob-label">Total Carbs</div>
                    </div>
                    <div class="col-lg-12">
                        <hr />
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <blockquote>
                            <p>Lipids (Fats)</p>
                            <footer>Total Composition: <cite><?PHP echo $spice->saturated_fat + $spice->polyunsaturated_fat + $spice->monounsaturated_fat ?>
                                    Gram(s)</PHP></cite></footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-3 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round($spice->saturated_fat/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#fb777b">
                        <div class="knob-label">Saturated Fat</div>
                    </div>
                    <div class="col-lg-3 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round($spice->monounsaturated_fat/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#00aae5">
                        <div class="knob-label">MonoUnSaturated Fat</div>
                    </div>
                    <div class="col-lg-3 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round($spice->polyunsaturated_fat/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#00aae5">
                        <div class="knob-label">PolyUnSaturated Fat</div>
                    </div>
                    <div class="col-lg-3 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round(($spice->saturated_fat + $spice->polyunsaturated_fat + $spice->monounsaturated_fat)/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#0281a3">
                        <div class="knob-label">Total Fats</div>
                    </div>
                    <div class="col-lg-12">
                        <hr />
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6 text-center" style="border-right: 1px solid #f4f4f4">
                        <blockquote>
                            <p>Proteins</p>
                            <footer>Total Composition: <cite><?PHP echo $spice->proteins; ?>
                                    Gram(s)</PHP></cite></footer>
                        </blockquote>
                        <input type="text" class="knob" data-readonly="true" value="<?PHP echo round($spice->proteins/$spice->default_amount * 100); ?>" data-width="60" data-height="60" data-fgColor="#fb777b">
                        <div class="knob-label">Total Protein</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box box-success">
                            <Div class="box-header">
                                <h4 class="box-title">Vitamins & Minerals</h4>
                            </Div>
                            <div class="box-body">
                                <?PHP
                                if (isset($spice_vitamins_present) && count($spice_vitamins_present) > 0) {
                                    foreach($spice_vitamins_present as $value) {
                                        echo '<span class="badge bg-aqua">' .$value->name . '</span> ';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>