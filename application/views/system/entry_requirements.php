<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to Entry Requirements Sub-Suite</h3>
            </div>

            <div class="box-body">
                <p>This sub-suite is intended to moderate the quality of applicants to the competition by reviewing their suitability at the entry point and provide prequalification results.</p>
            </div>
        </div>


    </div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Competition Entry Requirements</h3>
            </div>

            <div class="box-body">
                
                <?PHP

                if (isset($successMsg)) {
                    echo '<div class="alert alert-success"> ' . $successMsg . '</div>';
                }

                if (isset($entry_requirement_flag)) {
                    if ($entry_requirement_flag == false) {


                        echo form_open('system/entry_requirements');

                        $entryForm = array(
                            '4 text' => 'Apex_Group_Name',
                            'basin' => array('Pangani' => 'Pangani', 'Wami-Ruvu' => 'Wami-Ruvu', 'Rufiji' => 'Rufiji', 'Lake Victoria' => 'Lake Victoria'),
                            'land_ownership' => array('communal_land' => 'communal_land', 'private' => 'private', 'hired' => 'hired'),
                            '3 text' => 'mandates',
                            'group_type' => array('PES' => 'PES', 'WUAs' => 'WUAs'),
                            'coverage_area' => array('small' => 'small', 'medium' => 'medium', 'large' => 'large'),
                            'type_of_ES_delivered' => array('water' => 'water', 'carbon' => 'carbon'),
                            '2 text' => 'relevant_skills',
                            'resource_availability' => array('inkind' => 'In-Kind', 'financial' => 'Financial'),
                            '1 submit' => 'Request_Entry'

                        );

                        create_form($entryForm);

                        echo form_close();
                    } else {
                        echo '<div class="alert alert-info">You have already applied, you results will be fowarded to the "Competition Suitability Assessment" Panel. Thanks for showing interest in this competition</div>';
                    }
                }

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

                    <?PHP

                    if (isset($entry_requirement_flag)) {
                        if ($entry_requirement_flag == false) {
                              echo '<div class="alert alert-info">Please Request for competition Entry. Your evaluation score and remarks will be obtained here.</div>';
                        } else {

                            if ($entry_requirement->status == 'pending') {
                                echo '<div class="alert alert-info">PESDES competition management team is still processing your request. Your results (feedback) will be provided in due course and notification will be provided through your email.</div>';
                            } else {

                        ?>

                     <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                         <input type="text" class="knob" data-readonly="true" value="<?PHP echo $entry_requirement->evaluation_score; ?>" data-width="60" data-height="60" data-fgColor="<?PHP echo ($entry_requirement->evaluation_score > 50 ? '#00a65a' : '#f56954'); ?>"/>
                         <div class="knob-label">Evaluation Score</div>
                     </div><!-- ./col -->
                     <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                         <Strong>Remarks: </strong> <p class="text-<?PHP echo ($entry_requirement->evaluation_score > 50 ? 'success' : 'danger'); ?>"><?PHP echo ($entry_requirement->evaluation_score > 50 ? 'Pass' : 'Fail'); ?></p>
                     </div>

                     <?PHP
                            }
                        }
                    }

                    ?>

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

                <?PHP

                if (isset($entry_requirement_flag)) {
                    if ($entry_requirement_flag == false) {
                        echo '<div class="alert alert-info">Please Request for competition Entry. Competition Endorsment Form will be obtained here.</div>';
                    } else {

                    if ($entry_requirement->status == 'pending') {
                        echo '<div class="alert alert-info">PESDES competition management team is still processing your request. Your results (feedback) will be provided in due course and notification will be provided through your email</div>';
                    } else {

                ?>

                <Div class="jumbotron">
                    <strong>Competition endorsement Form: </strong>
                    <?PHP

                    if ($entry_requirement->evaluation_score < 50 ) {
                        echo 'We regret to inform you that, you have not fullfilled the requirements for participating in the Competition. Please try in the upcoming competition';
                    } else {

                    ?>

                    <a href="<?PHP echo base_url(); ?>files/documents/competition_endorsment_form.pdf">View</a>
                </div>

                    <?PHP }
                    }
                    }
                }

                ?>
            </div>
        </div>
    </div>




</div>

</div>