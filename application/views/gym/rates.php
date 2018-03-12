<div class="row">
    <div class="col-lg-3">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Sub Menu </h3>
            </div>

            <div class="box-body">
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?PHP echo (isset($active) && $active == 'exercises' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/gym_rates/">Gym group</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == '' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/gym/gym_rates/">Gym bundle</a> </li>
                    <li class="<?PHP echo (isset($active) && $active == '' ? 'active' : ''); ?>"><a href="<?PHP echo base_url(); ?>index.php/gym/gym_rates/">Gym amount </a> </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <?PHP $this->load->view('gym/gym_rates/' . $sub_content) ?>
    </div>
</div>