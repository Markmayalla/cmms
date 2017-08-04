<div class="container-fluid">
    <div class="row" id="topHeader">
        <div class="col-sm-3">
            <img class="img-thumbnail" src="<?PHP echo base_url(); ?>images/logo.png" height="60%" width="60%"/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a data-toggle="dropdown" href="#" class="navbar-brand dropdown-toggle">PES_CASS</a>
                    <ul class="dropdown-menu" id="">
                        <li><a href="#">What is PES_CASS ?</a> </li>
                        <li><a href="#">Terms and Conditions of Application</a> </li>
                        <li><a href="#">Contact Us</a> </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav">
                    <li><a href="<?PHP echo base_url(); ?>index.php/pes/home"><span class="glyphicon glyphicon-home"></span> Home </a> </li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/pes/learn"><span class="glyphicon glyphicon-pencil"></span> Learn More </a> </li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/pes/products"><span class="glyphicon glyphicon-shopping-cart"></span> Products </a> </li>
                    <li><a href="#pes_cass"><span class="glyphicon glyphicon-cog"></span> PES_CASS <span class="caret"></span> </a>

                    </li>
                    <li><a href="<?PHP echo base_url(); ?>index.php/pes/contacts"><span class="glyphicon glyphicon-globe"></span> Contacts </a> </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="modal" data-target="#registrationModal" ><span class="glyphicon glyphicon-user"></span> Sign Up</a> </li>
                    <li><a data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a> </li>
                    <li><a data-toggle="modal" data-target="#postModal" ><span class="glyphicon glyphicon-wrench"></span> Populate</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
