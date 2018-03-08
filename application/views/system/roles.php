<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to Roles Sub-Suite</h3>
            </div>

            <div class="box-body">
                <p>This sub-suite provides information on the capabilities, roles and responsibilities for each actor in the watershed which enhances planning access among  actors, thus improves collaboration and decision making process</p>
            </div>
        </div>


    </div>
</div><div class="row">

    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Planning and Budgeting</h3>
            </div>

            <div class="box-body">

                <table class="table table-stripped table-hover">

                    <tr>
                        <th>Apex Group</th>
                        <th>Working Plan</th>
                        <th>Working Budget</th>
                    </tr>

                    <?PHP

                    foreach ($apexGroups as $key => $apexGroup) {

                    ?>

                    <tr>
                        <td><?PHP echo $apexGroup->name ?></td>


                        <td><?PHP if (isset($workingPlan[$key]->guide)) { ?>
                            <a href="<?PHP echo $workingPlan[$key]->guide; ?>">View </a>
                            <?PHP } else { echo 'null'; } ?>
                        </td>
                        <td><?PHP if (isset($workingBudget[$key]->guide)) { ?>
                                <a href="<?PHP echo $workingBudget[$key]->guide; ?>">View </a>
                            <?PHP } else { echo 'null'; } ?>
                        </td>
                    </tr>

                    <?PHP } ?>

                </table>
            	
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Performance Tracking</h3>
            </div>

            <div class="box-body">
                
                <table class="table table-stripped table-hover">

                    <tr>
                        <th>Apex Groups</th>
                        <th>Baseline Data</th>
                        <th>Monitoring Status</th>
                        <th>Evaluation Remarks</th>
                        <th>Program Adjustments</th>
                    </tr>

                    <?PHP

                    foreach ($apexGroups as $key => $apexGroup) {

                    ?>

                    <tr>
                        <td><?PHP echo $apexGroup->name ?></td>
                        <td><?PHP if (isset($baseline_data[$key]->guide)) { ?>
                                <a href="<?PHP echo $baseline_data[$key]->guide; ?>">View</a>
                            <?PHP } else { echo 'null'; } ?>
                        </td>
                        <td><?PHP if (isset($monitoring_status[$key]->guide)) { ?>
                                <a href="<?PHP echo $monitoring_status[$key]->guide; ?>">View</a>
                            <?PHP } else { echo 'null'; } ?>
                        </td>
                        <td><?PHP if (isset($evaluation_remarks[$key]->guide)) { ?>
                                <a href="<?PHP echo $evaluation_remarks[$key]->guide; ?>">View</a>
                            <?PHP } else { echo 'null'; } ?>
                        </td>
                        <td><?PHP if (isset($program_adjustments[$key]->guide)) { ?>
                                <a href="<?PHP echo $program_adjustments[$key]->guide; ?>">View</a>
                            <?PHP } else { echo 'null'; } ?>
                        </td>

                    </tr>

                    <?PHP } ?>

                </table>

            </div>
        </div>
    </div>


</div>

