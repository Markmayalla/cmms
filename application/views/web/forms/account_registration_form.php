<form id="account_registration" method="post" action="<?PHP echo base_url() ?>/index.php/web/register/account_details" data-parsley-validate="">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <?PHP echo (isset($success) ? '<div class="alert alert-success">' . $success . '</div>' : ''); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 form-group">
            <label class="control-label" for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?PHP echo (isset($email) ? $email : ''); ?>" required/>
        </div>
        <div class="col-lg-3 form-group">
            <label class="control-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" minlength="6" required />
        </div>
        <div class="col-lg-3 form-group">
            <label class="control-label" for="password_confirm">Password Confirm</label>
            <input type="password" name="password_confirm" class="form-control"
                   data-parsley-equalto="#password"
                   data-parsley-equalto-message="The passwords do not match";
                />
        </div>
        <div class="col-lg-3 form-group">
            <label class="control-label" for="user_type">Account Type</label>
            <select name="user_type" class="form-control" required>
                <option value="">Choose...</option>
                <option value="user">Normal User</option>
                <option value="trainer">Trainer</option>
                <option value="gym">GYM Representative</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 form-group">
            <input type="submit" name="register" class="btn btn-info" value="Register" />
        </div>
    </div>
</form>