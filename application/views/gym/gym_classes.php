<div class="row">
    <div class="col-lg-3">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Sub Menu</h3>
            </div>

            <div class="box-body">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="">Classes</a> </li>
                    <li><a href="">Scheduals</a> </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <?PHP $this->load->view('gym/classes/' . $sub_content); ?>
    </div>
</div>