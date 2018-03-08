<div class="row">
    <div class="col-lg-3">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Sub Menu </h3>
            </div>

            <div class="box-body">
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?PHP echo (isset($active) && $active == 'exercises' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/fitness/exercises">Exercises</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'equipments' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/fitness/equipments">Exercise Equipments</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == 'exercise_programs' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/root/fitness/exercise_programs">Exercise Programs </a> </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <?PHP $this->load->view('root/fitness/' . $sub_content) ?>
    </div>
</div>