
<div class="container">


    </div>

    <div class="row" id="copyright">
        <div class="col-sm-12">
            <div align="center">
                Copyright &copy; 2017 <a href="#">PES_CASS </a> </a>
            </div>
        </div>
    </div>
</div>

<div id="postModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Populate Post Table</h4>
            </div>

            <div class="modal-body">
                <div id="#postModalResults">

                </div>
                <?PHP

                echo form_open('pes/populate', array('id' => 'postPopulate'));
                $page = array('id' => 'page', 'name' => 'page', 'class' => 'form-group form-control', 'placeholder' => 'page');
                $heading = array('id' => 'heading', 'name' => 'heading', 'class' => 'form-group form-control', 'placeholder' => 'heading');
                $body = array('id' => 'body', 'name' => 'body', 'class' => 'form-group form-control', 'placeholder' => 'body');
                $addPost = array('id' => 'addPost', 'addPost', 'class' => 'btn btn-info', 'content' => 'Add Post');

                echo form_input($page);
                echo form_input($heading);
                echo form_textarea($body);
                echo form_button($addPost);
                echo form_close();

                ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>

<div id="registrationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register as a new User</h4>
            </div>

            <div class="modal-body">



                <?PHP

                echo form_open_multipart('pes/registration', array('id' => 'registrationForm'));

                $registration_form = array(
                    '1 text' => 'first_name',
                    '2 text' => 'middle_name',
                    '9 text' => 'last_name',
                    '3 text' => 'email',
                    '4 text' => 'phone',
                    '5 text' => 'region',
                    '6 text' => 'village',
                    '7 text' => 'district',
                    '8 text' => 'street',
                    'gender' => array('male' => 'male', 'female' => 'female'),
                    '1 file' => 'avatar',
                    '1 password' => 'password',
                    '2 password' => 'password_conf',
                    '1 button' => 'Register'
                );

                create_form($registration_form);


                echo form_close();

                ?>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>


<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login to the Studio</h4>
            </div>

            <div class="modal-body">

                <?PHP

                echo form_open_multipart('pes/login', array('id' => 'loginForm'));

                $loginForm = array(
                    '1 text' => 'email',
                    '2 password' => 'password',
                    '1 button' => 'Login'
                );

                create_form($loginForm);

                echo form_close();

                ?>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>