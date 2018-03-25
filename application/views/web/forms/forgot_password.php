<form id="forgot_password" method="post" action="<?PHP echo base_url() ?>/index.php/ForgotPassword" data-parsley-validate="">


    <div class="row">
        <div class="col-lg-12 form-group">
            <?PHP echo (isset($error) ? '<div class="alert alert-danger">' . $error . '</div>' : ""); ?>
            <label class="control-label" for="email">Email</label>
            <input type="email" name="email" class="form-control" required="">
        </div>
    </div>

    <Div class="row">
        <div class="col-lg-12 form-group">
            <input type="submit" name="send" class="btn btn-info form-control" value="Send" />
        </div>
        
    </Div>
</form>