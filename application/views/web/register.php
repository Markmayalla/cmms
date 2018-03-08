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
            <div class="col-lg-12">
                <?PHP $this->load->view('web/forms/' . $form); ?>
            </div>
        </div>
    </div>
    <div class="space"></div>
</section>