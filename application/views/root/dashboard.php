<div class="row">
    <div class="col-lg-3">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?PHP echo (isset($accounts) ? count($accounts) : "0"); ?></h3>
                <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios7-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?PHP echo (isset($clients) ? count($clients) : "0"); ?></h3>
                <p>Total Clients</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?PHP echo (isset($trainers) ? count($trainers) : "0"); ?></h3>
                <p>Total Trainers</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-fuchsia">
            <div class="inner">
                <h3><?PHP echo (isset($gyms) ? count($gyms) : "0"); ?></h3>
                <p>Total Gyms</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios7-cog"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>
</div>