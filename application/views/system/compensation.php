<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to Compensation Sub-Suite</h3>
            </div>

            <div class="box-body">
                <p>This sub-suite is intended  to provide and a mechanism for facilitating  the process for determination of the fair compensation for the conservers upstream based on the measured additionality. This sub-suite enhances continuous collaboration among stakeholders of the watershed whose roles, skills and experience can be tapped during a collaboration and decision making processes.</p>
            </div>
        </div>


    </div>
</div>
<div class="row">

    <div class="col-sm-7">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Additionality</h3>
            </div>

            <div class="box-body">

                <?PHP echo form_open('system/compensation'); ?>
                <select name="apex_group" class="form-control form-group">
                    <?PHP foreach ($apexGroups as $apexGroup) { ?>
                    <option value="<?PHP echo $apexGroup->id; ?>"><?PHP echo $apexGroup->name; ?></option>
                    <?PHP } ?>
                </select>
                <input type="submit" name="view_additionality_data" class="btn btn-info" value="View Additionality Data" />
                <?PHP echo form_close(); ?>
                <hr />
                <?PHP

                if (isset($additionality)) {
                    if ($additionality == true) {

                ?>

                    <div class="row">
                        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                            <input type="text" class="knob" data-readonly="true" value="<?PHP echo ($additionalityQuality < 0 ? $additionalityQuality * -1 : $additionalityQuality) ?>" data-width="60" data-height="60" data-fgColor="#<?PHP echo ($additionalityQuality < 0 ? 'f56954' : '00a65a') ?>"/>
                            <div class="knob-label">Water Quality Additionality</div>
                            <a href="#" data-toggle="tooltip" title="Turbidity (ntu), Phosphorus, Nitrate, Sediments (g/m cubic) and others...">Measurable</a>

                        </div><!-- ./col -->
                        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                            <input type="text" class="knob" data-readonly="true" value="<?PHP echo ($additionalityQuantity < 0 ? $additionalityQuantity * -1 : $additionalityQuantity) ?>" data-width="60" data-height="60" data-fgColor="#<?PHP echo ($additionalityQuantity < 0 ? 'f56954' : '00a65a') ?>"/>
                            <div class="knob-label">Water Quantity Additionality</div>
                        </div>
                        <hr />
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Baseline Values</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Date: </strong><?PHP echo $baseline_value->date; ?></li>
                                <li class="list-group-item"><strong>Water Quality: </strong><?PHP echo $baseline_value->water_quality; ?></li>
                                <li class="list-group-item"><strong>Water Quantity: </strong><?PHP echo $baseline_value->water_quantity; ?></li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <h4>Meansured Values</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Date: </strong><?PHP echo $meansured_value->date; ?></li>
                                <li class="list-group-item"><strong>Water Quality: </strong><?PHP echo $meansured_value->water_quality; ?></li>
                                <li class="list-group-item"><strong>Water Quantity: </strong><?PHP echo $meansured_value->water_quantity; ?></li>
                            </ul>
                        </div>
                    </div>


                <?PHP


                    } else {
                        echo '<div class="alert alert-danger">Some data are missing for calculating Additionality</div>';
                    }
                } else {
                    echo '<div class="alert alert-info">Select Apex Group to view Additionality</div>';
                }

                ?>
            </div>

        </div>
    </div>

    <div class="col-sm-5">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Mode of Support </h3>
            </div>

            <div class="box-body">
                <?PHP

                if (isset($successMsg)) {
                    echo '<div class="alert alert-success">' . $successMsg . '</div>';
                }

                ?>
                <?PHP echo form_open('system/compensation'); ?>
                <div class="form-group">
                    <label for="apex_group">Select Apex Group</label>
                    <select name="apex_group" class="form-control form-group">
                        <?PHP foreach ($apexGroups as $apexGroup) { ?>
                            <option value="<?PHP echo $apexGroup->id; ?>"><?PHP echo $apexGroup->name; ?></option>
                        <?PHP } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type" class="control-label">Type of Support</label>
                    <select name="type" class="form-control">
                        <option value="in_kind">In Kind</option>
                        <option value="financial">Financial</option>
                    </select>
                </div>
                
                <Div class="form-group">
                    <label  for="description" class="control-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-info" value="Support" name="support">
                <?PHP echo form_close(); ?>

            </div>
        </div>

        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Contract Management</h3>
            </div>

            <div class="box-body">

                <ul class="list-group">
                <li class="list-group-item">Contract Abstract: <a href="<?PHP echo base_url() . 'files/documents/contract_abstract.pdf' ?>">View</a></li>
                <li class="list-group-item">Contract Management Guide: <a href="<?PHP echo base_url() . 'files/documents/contract_managment_guide.pdf' ?>">View</a> </li>
                </ul>

                <h4>Successfull Contracts</h4>
                <table class="table table-stripped table-hover">
                    <tr>
                        <th>Apex Group Name</th>
                        <th>Action</th>
                    </tr>

                    <?PHP

                    if (count($successfull_contracts > 0)) {
                        foreach ($successfull_contracts as $key => $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $apexGroupsNames[$key]->name ?></td>
                                <td><a href="<?PHP echo $value->guide ?>" class="btn btn-sm btn-info">View</a> </td>
                            </tr>

                            <?PHP
                        }
                    } else {
                        echo '<div class="alert alert-info">The are no any Successfull Contracts</div>';
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>

   
</div>
