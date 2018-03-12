
<div class="container">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h2>Wellness GuruFit</h2>
            <p>We are your fitness and nutrition adviser. Get an instant tailor made training programmes. Search for personal trainers, gyms and
            explore nutrition packages</p>
            <form method="post" action="#" data-parsley-validate>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="text" name="search" class="form-control" placeholder="Try 'Colosseum'"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="submit" name="search">Search</button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-12">
        <h2>Explore Wellness Guru Fit</h2>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?PHP echo count($trainers); ?></h3>
                <p>Total Trainees</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios7-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-fuchsia">
            <div class="inner">
                <h3><?PHP echo count($exercise_programs); ?></h3>
                <p>Total Trainers</p>
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
                <h3><?PHP echo count($meal_programs); ?></h3>
                <p>Total Nutrition Packages</p>
            </div>
            <div class="icon">
                <i class="ion ion-fork"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?PHP echo count($gyms); ?></h3>
                <p>Total Gyms</p>
            </div>
            <div class="icon">
                <i class="ion ion-disc"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>
</div>