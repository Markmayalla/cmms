<div class="row">
    <div class="col-lg-3">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Sub Menu </h3>
            </div>

            <div class="box-body">
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?PHP echo (isset($active) && $active == 'meal_elements' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/meal_elements">Meal Spices</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'meals_components' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/meals_components">Meals Components</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'meals' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/meals">Meals </a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'diet' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/diet">Diet Plans</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'meal_programs' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/meal_programs">Meal Programs</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'vitamins' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/vitamins">Vitamins</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'meal_categories' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/meal_categories">Spice Categories</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'meal_categories_true' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/diet/meal_categories_true">Meal Categories</a> </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <?PHP $this->load->view('root/diet/' . $sub_content) ?>
    </div>
</div>