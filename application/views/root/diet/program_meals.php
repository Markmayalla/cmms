<div class="row">
    <Div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Meal Program Description</h3>
            </div>

            <div class="box-body">
                <div id="products_form">
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h3>1200</h3>
                            <p>Total Calories</p>
                            <p>Meal Program Name: <span class="badge bg-navy"><?PHP echo (isset($meal_program) ? $meal_program->name : "null"); ?></span> </p>
                            <p>Meal Program Duration: <span class="badge bg-navy"><?PHP echo (isset($meal_program) ? $meal_program->duration . " Day(s)" : "null"); ?></span> </p>

                        </div>
                        <div class="icon">
                            <i class="fa fa-flash"></i>
                        </div>

                    </div>

                    <div class="well bg-gray">
                        <h3>About the meal program</h3>
                        <p><?PHP echo (isset($meal_program) ? $meal_program->description : "null"); ?></p>
                        <a
                            href="<?PHP echo base_url(); ?>index.php/root/diet/program_meals/<?PHP echo (isset($meal_program) ? $meal_program->id : ""); ?>/add_meals"
                            class="btn btn-link btn-lg">Attach Meals <span class="fa fa-paperclip"></span>
                        </a>

                    </div>


                </div>
            </div>
        </div>
    </Div>
</div>