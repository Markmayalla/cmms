<form id="login_form" method="post" action="<?PHP echo base_url() ?>/index.php/web/login/log" data-parsley-validate="">


    <div class="row">
        <div class="col-lg-12 form-group">
            <?PHP echo (isset($error) ? '<div class="alert alert-danger">' . $error . '</div>' : ""); ?>
            <label class="control-label" for="email">Email</label>
            <input type="email" name="email" class="form-control" required="">
        </div>
    </div>

    <Div class="row">
        <div class="col-lg-12 form-group">
            <label class="control-label" for="password">Password</label>
            <input type="password" name="password" class="form-control" required=""/>
        </div>
    </Div>

    <Div class="row">
        <div class="col-lg-12 form-group">
            <input type="submit" name="login" class="btn btn-info form-control" value="Login" />
        </div>
        <p align="center"><a href="<?PHP echo base_url(); ?>index.php/web/forgot" >forgot password ?</a> </p>
    </Div>
</form>