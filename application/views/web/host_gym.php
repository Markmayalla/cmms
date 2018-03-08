<Div class="container">
    <div class="row">
        <Div class="col-lg-12">
            <div id="gymMap" style="height: 360px; width: 100%">
                <!-- Here is where the map will reside -->
                <p>Google Maps</p>
            </div>
            <div id="map_form">
                <div class="row">
                    <form id="gym_reg_form" data-parsley-validate>
                        <div class="form_container">
                            <div class="col-lg-6">
                                <div class="form-group new_user">
                                    <label class="control-label" for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" required=""/>
                                </div>
                                <div class="form-group new_user">
                                    <label class="control-label" for="middle_name">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" />
                                </div>
                                <div class="form-group new_user">
                                    <label class="control-label" for="surname">Surname</label>
                                    <input type="text" name="surname" class="form-control" required/>
                                </div>
                                <div class="form-group new_user">
                                    <label class="control-label" for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input id="gis_email" type="text" name="email" class="form-control" required disabled/>
                                </div>
                                <div class="form-group existing_user">
                                    <label class="control-label" for="password">Password</label>
                                    <input id="gis_password" type="password" name="password" class="form-control" required disabled/>
                                </div>
                                <div class="form-group new_user">
                                    <label class="control-label" for="gender">Gender</label>
                                    <select name="gender" class="form-control" required="">
                                        <option value="">Choose...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group new_user">
                                    <label class="control-label" for="birth_date">Birth Date</label>
                                    <input type="date" name="birth_date" class="form-control calendar-date" />
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="gym_name">GYM name</label>
                                    <input type="text" id="gym_name" name="gym_name" class="form-control" required disabled/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="gym_description">GYM Description</label>
                                    <textarea id="gym_description" name="gym_description" class="form-control" disabled></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="country">Country</label>
                                    <input type="text" id="country" name="country" class="form-control" required disabled />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="region">Region</label>
                                    <input type="text" id="region" name="region" class="form-control" required disabled />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" form="district">District</label>
                                    <input type="text" id="district" name="district" class="form-control" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="ward">Ward</label>
                                    <input type="text" id="ward" name="ward" class="form-control" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="street">Street</label>
                                    <input type="text" id="street" name="street" class="form-control" disabled />
                                </div>
                                <input type="hidden" id="lat">
                                <input type="hidden" id="lng">
                                <input id="gis_submit" type="submit" name="add_gym" value="Add Gym" class="btn btn-info btn-sm" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="message">Gym Added</div>

        </Div>
    </div>
</Div>