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
            <div class="col-lg-4">
                <h3>Talk to us ASAP,</h3>
                <form method="post" action="<?PHP echo base_url(); ?>index.php/web/contacts/send_mail" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Your Email" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Your Subject" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="message">Message</label>
                        <textarea class="form-control" name="message" placeholder="Your Name"></textarea>
                    </div>
                    <input type="submit" value="Send" class="btn btn-info" />
                </form>
            </div>

            <div class="col-lg-4">
                <h3>Google Maps</h3>
            </div>
            <div class="col-lg-4">
                <h3>Contact Us</h3>
                <p><i class="fa fa-phone"> </i> &nbsp; +255 22 2543 764</p>
                <p><i class="fa fa-envelope-o"></i> &nbsp; info@wellnesstz.com </p>
                <hr />
                <p><i class="fa fa-map-marker"></i> &nbsp; Posta, Ohio Street</p>
                <p><i class="fa fa-building-o"></i> &nbsp; Posta House Building, 4th Floor, Room No. 403 </p>
                <p><i class="fa fa-envelope"></i> &nbsp; P.O. Box 5081, Dar es Salaam </p>
                <hr />
                <p><strong>Follow us...</strong></p>
                <p><i class="fa fa-facebook"></i> &nbsp; <i class="fa fa-twitter"></i> &nbsp; <i class="fa fa-instagram"></i>
                    &nbsp; <i class="fa fa-pinterest"></i> &nbsp; <i class="fa fa-linkedin"></i> </p>
            </div>
        </div>
    </div>
</section>