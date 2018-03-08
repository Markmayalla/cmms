<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <img src="<?PHP echo base_url(); ?>images/banner_about.jpg" class="img-responsive" />
            </div>
        </div>
    </div>
</section>

        <?PHP

        if (isset($trainers) && count($trainers) > 0) {
            $i = 1;
            foreach ($trainers as $key => $trainer_obj) {
                if ($i%2 != '') {
                    //Odd Sections
        ?>
<section id="about_us">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">

                <img src="<?PHP echo base_url(); ?>images/trainers/manipulated/<?PHP echo ($trainer_obj->picture != '' ? $trainer_obj->picture : 'default.jpg'); ?>" class="img-responsive" />
            </div>

            <div class="col-lg-4" style="border-right: 1px solid #f4f4f4">
                <Div class="col-lg-7" >
                    <h4>Profile</h4>
                    <hr />
                    <i class="fa fa-user"></i> <strong>Name: </strong> <span class="badge bg-aqua"><?PHP echo $profiles[$key]->first_name . " " . $profiles[$key]->surname; ?></span><hr/>
                    <i class="fa fa-certificate"></i> <strong>Qualification: </strong> <span class="badge bg-green"><?PHP echo $trainer_obj->qualification; ?></span><hr/>
                    <i class="fa fa-cogs"></i> <strong>Experience: </strong> <span class="badge bg-fuchsia"><?PHP echo $trainer_obj->experience; ?> year(s)</span><hr/>

                </Div>
                <div class="col-lg-5">
                    <h4>Skills</h4>
                    <hr />
                    <?PHP

                    if (count($trainer_skills[$key]) > 0) {
                        foreach($trainer_skills[$key] as $key_nd => $value) {
                            ?>

                            <?PHP echo ((is_object($skills[$key][$key_nd])) ? $skills[$key][$key_nd]->name:$skills[$key][$key_nd]); ?>
                            <div class="progress xs progress-striped active">
                                <?PHP
                                $p = $value->rating_average;
                                $p = $p/5 * 100;
                                ?>
                                <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?PHP echo $p; ?>%"></div>
                            </div>

                            <?PHP
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-6">
                <h3><?PHP echo $profiles[$key]->first_name . " " . $profiles[$key]->surname; ?></h3>
                <hr />
                <p><?PHP echo $trainer_obj->bio; ?></p>
            </div>


        </div>
    </div>
</section>

        <?PHP
                } else {
                    //Even Rows

                }


            }
        }

        ?>
