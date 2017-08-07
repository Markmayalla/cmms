<div class="row">

    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Competition Entry Requirements</h3>
            </div>

            <div class="box-body">
                
                <?PHP 

                echo form_open('system/entryForm');

                $entryForm = array(

                    'basin' => array('Pangani' => 'Pangani', 'Wami-Ruvu' => 'Wami-Ruvu', 'Rufiji' => 'Rufiji', 'Lake Victoria' => 'Lake Victoria'),
                    'land_ownership' => array('communal_land' => 'communal_land', 'private' => 'private', 'hired' => 'hired'),
                    '3 text' => 'mandates',
                    'group_type' => array('PES' => 'PES', 'WUAs' => 'WUAs'),
                    'coverage_area' => array('small' => 'small', 'medium' => 'medium', 'large' => 'large'),
                    'type_of_ES_delivered' => array('water' => 'water', 'carbon' => 'carbon'),
                    'relevant_techniacal_skills' => 'technical_competency',
                    '2 text' => 'relevant_skills',
                    'resource_availability' => array('inkind' => 'In-Kind', 'financial' => 'Financial'),
                    '1 button' => 'Request Entry'

                    );

                create_form($entryForm);

                echo form_close();

                ?>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Competition Suitability Assessment</h3>
            </div>

            <div class="box-body">
                
                 <div class="row">

                    <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="73" data-width="60" data-height="60" data-fgColor="#f56954"/>
                        <div class="knob-label">Evaluation Score</div>
                    </div><!-- ./col -->
                    <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                        <Strong>Remarks: </strong> <p class="text-danger">Not Qualified</p>
                    </div>

                 </div>


                    


            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Competition Endorsement</h3>
            </div>

            <div class="box-body">
                <Div class="jumbotron">
                    <strong>Competition Endorsment Form: </strong> <a href="#">View</a>
                </div>

            </div>
        </div>
    </div>




</div>

<div id="ResourceMobilization" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Resource Mobilization</h4>
            </div>

            <div class="modal-body">


                <table class="table table-stripped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Deficity</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Slashes</td>
                        <td>Wood Handed From Local Retails</td>
                        <td>15</td>
                        <td>5</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Gum Boots</td>
                        <td>Plastic Made</td>
                        <td>18</td>
                        <td>2</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Rain Coats</td>
                        <td>-</td>
                        <td>11</td>
                        <td>9</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Hand Gloves</td>
                        <td>-</td>
                        <td>20</td>
                        <td>0</td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>Panga</td>
                        <td>-</td>
                        <td>14</td>
                        <td>6</td>
                    </tr>
                </table>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>


<div id="Opportunity" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Opportunity Cost Forfeiture</h4>
            </div>

            <div class="modal-body">


                <table class="table table-stripped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Previous Activity</th>
                        <th>Quantity Output</th>
                        <th>Unit Cost</th>
                        <th>Adopted Activity</th>
                        <th>Calculated Quantity Output</th>
                        <th>Unit Cost</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Burning Charcoal</td>
                        <td>10 Sucks</td>
                        <td>60,000</td>
                        <td>Vegetable Production</td>
                        <td>20,000 Heeps</td>
                        <td>500</td>
                    </tr>


                </table>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>


<div id="Compensation" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rewarding & Compensation (R & C)</h4>
            </div>

            <div class="modal-body">


                <table class="table table-stripped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>ES Delivered</th>
                        <th>Quantity Output</th>
                        <th>Quality Output</th>
                        <th>Unit Cost</th>
                        <th>Buyer</th>
                        <th>Seller</th>
                        <th>Witness</th>
                        <th>Recursion</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Water</td>
                        <td>10,000 Liters/sec</td>
                        <td>ISO Standard</td>
                        <td>1 Tsh/Liter</td>
                        <td>Tanga Uwasa</td>
                        <td>Uwamakizi</td>
                        <td>Tanga Water Basin Office</td>
                        <td>5 Years</td>
                    </tr>


                </table>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>