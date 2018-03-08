<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to Identity Sub-Suite</h3>
            </div>

            <div class="box-body">
                <p>This sub-suite provides identity of various actors found in the watershed and their particulars for easy communication</p>
            </div>
        </div>


    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">The Basin</h3>
            </div>

            <div class="box-body">

            	

                

                <table class="table table-stripped table-hover">

                	<tr>
                        <th>Basin</th>
                		<th>Apex Group</th>
                		<th>Geo-info</th>
                        <th>Action</th>

                	</tr>

                    <?PHP

                    foreach ($apexGroups as $key => $apexGroup) {

                    ?>

                    <tr>
                        <td><?PHP echo $basins[$key]->name; ?></td>
                        <td><?PHP echo $apexGroup->name; ?></td>
                        <td><?PHP echo $apexGroup->location; ?></td>
                        <td><a href="<?PHP echo base_url() . 'index.php/system/identity/learn_more/' . $apexGroup->id; ?>" class="btn btn-success">Learn More</a></td>
                    </tr>

                    <?PHP
                    }
                    ?>
                	

                </table>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Apex Group Profile</h3>
            </div>

            <div class="box-body">
                
                <?PHP

                if ($apexGroupProfile !== true) {
                    echo '<div class="alert alert-info"> Press learn More to view Group profile</div>';
                } else {

                ?>

                <ul class="list-group">
                    <li class="list-group-item"><strong>Selected Group: </strong>
                        <?PHP if (isset($selected_group->name)) { ?>
                        <?PHP echo $selected_group->name; ?>
                        <?PHP } else { echo 'null'; } ?>
                    </li>
                    <li class="list-group-item"><strong>Group Organization: </strong>
                        <?PHP if (isset($group_organisation->guide)) { ?>
                        <a href="<?PHP echo $group_organisation->guide; ?>" >View</a>
                        <?PHP } else { echo 'null'; } ?>
                    </li>
                    <li class="list-group-item"><strong>Calender of Meetings: </strong>
                        <?PHP if (isset($calender_of_meetings->guide)) { ?>
                        <a href="<?PHP echo $calender_of_meetings->guide; ?>" >View</a>
                        <?PHP } else { echo 'null'; } ?>
                    </li>
                    <li class="list-group-item"><strong>Meeting Guidlines  </strong>
                        <?PHP if (isset($meeting_guidline->guide)) { ?>
                        <a href="<?PHP echo $meeting_guidline->guide; ?>" >View</a>
                        <?PHP } else { echo 'null'; } ?>
                    </li>
                    <li class="list-group-item"><strong>Group Leadership: </strong>
                        <?PHP if (isset($group_leadership->guide)) { ?>
                        <a href="<?PHP echo $group_leadership->guide; ?>" >View</a>
                        <?PHP } else { echo 'null'; } ?>
                    </li>
                </ul>

                <?PHP

                }
                ?>

            </div>
        </div>
    </div>


</div>

