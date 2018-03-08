<Div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">ASSESSING SUITABILITY OF THE “PESDES MODEL”
                    FOR WATERSHED MANAGEMENT IN TANZANIA
                </h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>By recognizing your expertise, you have been selected to participate in the assessment of the proposed PESDES model in order to provide comments regarding suitability of the <i>perceived usability</i> and <i>perceived usefulness</i> of the PESDES model. We have formulated both positive and negative statements which are measured according to five points on the Likert scale ranging from 1 (Strongly disagree), 2 (Disagree), 3 (Neutral), 4 (Agree) and 5 (Strongly agree). As a potential user of the PESDES, please complete sections A, B, & C below (select as appropriate) by sharing your perception on the <i>usability and usefulness</i> of the PESDES model which is intended to enhance PES actors’ virtual collaboration and decision making agility.</p>
                    </div>

                    <div class="col-md-6">
                        <strong>Definitions</strong>
                        <dl>
                            <dt>Perceived usability </dt>
                            <dd>Refers to the degree to which the use of PESDES is free of effort i.e. simplicity, clarity, flexibility, compatibility and convenience</dd>
                            <dt>Perceived usability </dt>
                            <dd>Is the degree to which the PESDES is perceived as beneficial or value it adds to PES actors and the practice.</dd>
                        </dl>
                        <?PHP

                        if (isset($reset_evaluation)) {
                            echo $reset_evaluation;
                        }

                        ?>
                        <a href="<?PHP echo base_url(); ?>index.php/system/evaluate/reset" class="btn btn-danger"><span class="fa fa-refresh"></span> Reset My Evaluation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">PESDES Usability Evaluation</h3>
            </div>

            <div class="box-body">
                <?PHP

                if (isset($usability_successMsg)) {
                    echo $usability_successMsg;
                }

                if (isset($usability_error)) {
                    echo $usability_error;
                }

                echo form_open('system/evaluate/usability')

                ?>
                <div class="form-group">
                    <label class="control-label" for="q1">Process sequences of the PESDES design are logical</label>
                    <select name="q1" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q2">Process sequences of the PESDES design are logical</label>
                    <select name="q2" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q3">PESDES users ‘guide are easy to follow</label>
                    <select name="q3" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q4">Terminologies used in PESDES design are consistent with PES terminologies</label>
                    <select name="q4" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q5">Information contained in PESDES is easily accessible</label>
                    <select name="q5" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q6">I was confident when using PESDES without technical support</label>
                    <select name="q6" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q7">The PESDES uses simple language that is easily understandable</label>
                    <select name="q7" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="evaluate_usability" class="btn btn-info" value="Submit Usability Evaluation" />
                </div>
                <?PHP echo form_close(); ?>
                <hr />
                <?PHP

                if (isset($comments_successMsg)) {
                    echo $comments_successMsg;
                }

                if (isset($comments_error)) {
                    echo $comments_error;
                }

                echo form_open('system/evaluate/comments'); ?>
                <div class="form-group">
                    <label class="control-label" for="comments">Comments</label>
                    <textarea name="comments" rows="5" class="form-control" placeholder="Write your comments/suggestions"></textarea>
                </div>

                <input type="submit" name="submit_comments" class="btn btn-info" value="Submit Comments" />
                <?PHP echo form_close(); ?>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">PESDES Usefulness Evaluation</h3>
            </div>

            <div class="box-body">
                <?PHP

                if (isset($usefulness_successMsg)) {
                    echo $usefulness_successMsg;
                }

                if (isset($usefulness_error)) {
                    echo $usefulness_error;
                }

                echo form_open('system/evaluate/usefulness');

                ?>
                <div class="form-group">
                    <label class="control-label" for="q1">The PESDES uses simple language that is easily understandable</label>
                    <select name="q1" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q2">Using PESDES has improved my ability to store data </label>
                    <select name="q2" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q3">Using PESDES generated credible and trustable operational records of data for watersheds activities </label>
                    <select name="q3" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q4">Using PESDES enhances open communication and networking among stakeholders</label>
                    <select name="q4" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q5">Using PESDES supports quick decision making process</label>
                    <select name="q5" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q6">Using PESDES improves marketing strategy for PES commodities</label>
                    <select name="q6" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q7">Using PESDES does not address key challenges hampering application of PES tool in Tanzania</label>
                    <select name="q7" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q8">Using PESDES does not enhance collaboration among stakeholders in PES schemes for watersheds management</label>
                    <select name="q8" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="q9">PESDES cannot guide and enable actors / practitioners to make real time decisions  from various locations</label>
                    <select name="q9" class="form-control">
                        <option value="5">Strongly Agree</option>
                        <option value="4">Agree</option>
                        <option value="3">Neutral</option>
                        <option value="2">Disagree</option>
                        <option value="1">Strongly Disagree</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="evaluate_usefulness" class="btn btn-info" value="Submit Usefulness Evaluation"
                </div>
                <?PHP echo form_close(); ?>
            </div>
        </div>
    </div>
</div>




