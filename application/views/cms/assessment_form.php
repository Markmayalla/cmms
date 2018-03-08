<div class="row">

    <div class="col-lg-3">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h4 class="box-title">Add Health Care Provider</h4>
            </div>
            <div class="box-body">
                <form method="post" action="<?PHP echo base_url(); ?>index.php/cms/assessment_form/health_care_provider" data-parsley-validate="">
                <input type="text" name="care_provider_name" class="form-group form-control" placeholder="Name" required/>
                <input type="text" name="care_provider_phone" class="form-group form-control" placeholder="Provider Contact" required/>
                <textarea name="care_provider_other" class="form-group form-control" placeholder="Other Specialists"></textarea>
                <input type="submit" name="add_provider" class="form-group btn btn-default" value="Add Provider" />
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Assessment Form</h3>
            </div>

            <div class="box-body">
                <form method="post" action="<?PHP echo base_url(); ?>index.php/cms/assessment_form/main">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="height">Height</label>
                        <input type="number" name="height" class="form-control" placeholder="Height in ft" />
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="current_weight">Current Weight</label>
                        <input type="number" name="current_weight" class="form-control" placeholder="In Kg" />
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="desired_weight">Desired Weight</label>
                        <input type="number" name="desired_weight" class="form-control" placeholder="In Kg" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="smoke">Do you Smoke ?</label>
                        <select name="smoking_habbit" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="no">No, I don't</option>
                            <option value="little">Yes, A little</option>
                            <option value="normal">Yes, Normal</option>
                            <option value="excess">Yes, Excessively</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="pressure">How is your blood pressure ?</label>
                        <select name="blood_pressure" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="low">Too Low</option>
                            <option value="normal">Normal</option>
                            <option value="high">Too High</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="diabetes">Do you have Diabetes ?</label> <br />
                        <select name="diabetes" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="smoke">Do you have any known cardiovascular problems ?</label>
                        <select name="cardiovascular" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="no">No, I don't</option>
                            <option value="heart_diseases">Yes, Heart Diseases</option>
                            <option value="abnormal_ect">Yes, Abnormal ECG</option>
                            <option value="others">Yes, Others</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="cholesterol">How is your cholesterol level ?</label>
                        <select name="cholesterol" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="low">Low</option>
                            <option value="normal">Normal</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="cholesterol">Do you have any injuries or orthopaedic problems ?</label>
                        <select name="athropaedic" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="no">no</option>
                            <option value="bad_back">Yes, Bad Back</option>
                            <option value="bad_knees">Yes, Bad Knees</option>
                            <option value="tendonitis">Yes, Tendonitis</option>
                            <option value="bursitis">Yes, Bursitis</option>
                            <option value="bad_knees">Yes, Others</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="prescribed_medication">Do you take any Prescribed Medications ?</label>
                        <select name="prescribed_medication" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="dietery_supplements">Do you take any Dietary Supplements ?</label>
                        <select name="dietary_suppliments" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="pregnancy">Are you pregnant or postpartum less than six weeks ?</label>
                        <select name="pregnancy" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="physical_examination">Date of last Physical Examination</label>
                        <input type="date" name="last_physical_examination" class="form-control calendar-date" />
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="dietery_supplements">What is your daily water intake ?</label>
                        <select name="daily_water" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="1/2">1/2 ltr</option>
                            <option value="1">1 ltr</option>
                            <option value="2">2 ltrs</option>
                            <option value="3">3 ltrs</option>
                            <option value="4">4 ltrs and Above</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="caffein_intake">What is your tea/coffee intake ?</label>
                        <select name="daily_caffein" class="form-control form-group">
                            <option value="">Choose...</option>
                            <option value="1">1 cup</option>
                            <option value="2">2 cups</option>
                            <option value="3">3 cups</option>
                            <option value="3">4 cups and above</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="other_medical_conditions">Do you have any other medical conditions ?</label>
                        <textarea name="other_medical_conditions" class="form-control" placeholder="Explain..."></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="current_exersise_program">Describe your current exersise program.</label>
                        <textarea name="current_exersises" class="form-control"></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="hobbies">What are leisure activities or hobbies?</label>
                        <textarea name="hobbies" class="form-control"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="current_lifestyle">Describe your current lifestyle ?</label>
                        <textarea name="current_lifestyle" class="form-control" placeholder="Explain..."></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="food_like">What kind of food do you dislike ?</label>
                        <textarea name="food_likes" class="form-control"></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="food_dislikes">What are leisure activities or hobbies?</label>
                        <textarea name="food_dislike" class="form-control"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="fdi_breakfast">What is your basic Breakfast ?</label>
                        <textarea name="fdi_breakfast" class="form-control" placeholder="Explain..."></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="fdi_lunch">What is your basic Lunch ?</label>
                        <textarea name="fdi_lunch" class="form-control"></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="fdi_dinner">What is your basic dinner ?</label>
                        <textarea name="fdi_dinner" class="form-control"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="exersise_likes">What are your exercise likes ?</label>
                        <textarea name="exersise_likes" class="form-control" placeholder="Explain..."></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="exersises_dislikes">What are your exercise dislikes</label>
                        <textarea name="exersise_dislikes" class="form-control"></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="nutrition_goals">What are your nutritional goals ?</label>
                        <textarea name="nutrition_goals" class="form-control"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label class="control-label" for="exersise_goals">What are your exercise goals ?</label>
                        <textarea name="exersise_goals" class="form-control"></textarea>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12 form-group">
                        <input type="submit" name="submit_assessment" class=" btn btn-warning form-control" value="Submit Assessment" />
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>