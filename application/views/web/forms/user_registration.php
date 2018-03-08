<h3>Account Registration</h3>
    <form id="registration_form" method="post" action="<?PHP echo base_url() ?>/index.php/web/register/user_details" data-parsley-validate=""/>

    <div class="row">
        <div class="form-group col-lg-4">
            <label class="control-label" for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Your First Name" minlength="3" maxlength="15" required/>
        </div>
        <div class="form-group col-lg-4">
            <label class="control-label" for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" class="form-control" placeholder="Your Middle Name" minlength="3" maxlength="15" required=""/>
        </div>
        <div class="form-group col-lg-4">
            <label class="control-label" for="surname">Surname:</label>
            <input type="text" name="surname" class="form-control" placeholder="Your Surname" minlength="3" maxlength="15" required/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-4">
            <label class="control-label" for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" placeholder="+255888888888 or 0788888888"
                   data-parsley-pattern="(\+\d{3}|0)\d{9}"
                   data-parsley-pattern-message="Phone No. should start with +255 or 0"
                   required/>
        </div>
        <div class="form-group col-lg-4">
            <label class="control-label" for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Your Email"
                   data-parsley-trigger="change"
                   data-parsley-remote="<?PHP echo base_url() ?>index.php/web/register/email_check"
                   data-parsley-remote-message="the email exists"
                   data-parsley-remote-options='{ "type": "POST", "dataType": "json", "data": { "request": "ajax" } }'
                   data-parsley-remote-reverse="true" required/>
        </div>

        <div class="form-group col-lg-4">
            <label class="control-label" for="gender">Gender</label>
            <select class="form-control" name="gender" required>
                <option value="">Choose..</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-lg-3">
            <label class="control-label" for="country">Country</label>
            <input type="text" name="country" class="form-control" placeholder="Your Country" required=""/>
        </div>
        <div class="form-group col-lg-3">
            <label class="control-label" for="region">Region:</label>
            <input type="text" name="region" class="form-control" placeholder="Your Region" required=""/>
        </div>
        <div class="form-group col-lg-3">
            <label class="control-label" for="street">Street</label>
            <input type="text" name="street" class="form-control" placeholder="Your Street" required=""/>
        </div>
        <div class="form-group col-lg-3">
            <label class="control-label" for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" class="form-control calendar-date" placeholder="Your Country" required=""/>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12">
            <input type="submit" name="register" id="submitt" value="Register" class="btn btn-info form-control" />
        </div>
    </div>

</form>