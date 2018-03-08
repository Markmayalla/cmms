<div class="row">
    <Div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Exercise Program Description</h3>

                <div class="pull-right box-tools">
                    <button href="#" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span> </button>
                    <button href="#" class="btn btn-sm btn-primary"><span class="fa fa-times"></span> </button>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-lg-6">
                        <strong>Program Name: </strong> <span class="badge bg-aqua"> <?PHP echo (isset($exercise_program) ? $exercise_program->name : "") ?></span><hr/>
                        <strong>Program Goal: </strong> <span class="badge bg-aqua"> <?PHP echo (isset($exercise_program) ? $exercise_program->goal : "") ?></span><hr/>
                        <strong>Program Workout Type: </strong> <span class="badge bg-aqua"> <?PHP echo (isset($exercise_program) ? $exercise_program->workout_type : "") ?></span><hr/>

                    </div>

                    <div class="col-lg-6">
                        <strong>Program Duration: </strong> <span class="badge bg-aqua"> <?PHP echo (isset($exercise_program) ? $exercise_program->duration . " Week(s)" : "") ?></span><hr/>
                        <strong>Days per Week: </strong> <span class="badge bg-aqua"> <?PHP echo (isset($exercise_program) ? $exercise_program->days_weekly : "") ?></span><hr/>
                        <strong>Work Out Time: </strong> <span class="badge bg-aqua"> <?PHP echo (isset($exercise_program) ? $exercise_program->work_out_time . " Minute(s)" : "") ?></span><hr/>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <legend></legend>
                    </div>
                </div>
            </div>
        </div>
    </Div>
</div>