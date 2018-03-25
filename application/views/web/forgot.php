<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <img src="<?PHP echo base_url(); ?>images/contacts_banner.jpg" class="img-responsive" />
            </div>
        </div>
    </div>
</section>

<section id="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h3>Enter your Email</h3>
                <?PHP $this->load->view('web/forms/'. $forms'); ?>
            </div>



        </div>
    </div>
</section>