


<div class="row">

    <div class="col-sm-6">
        <h1><?PHP echo $post_data[0]->heading; ?></h1>
        <p><?PHP echo $post_data[0]->body; ?></p>
    </div>

    <div class="col-sm-6">
        <h1>About PES_CASS</h1>

            <div class="panel-group" id="accordion">


                <?PHP

                for ($i = 1; $i < 5; $i++) {
                    ?>

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?PHP echo $i ?>"><?PHP echo $post_data[$i]->heading; ?></a>
                                 <span class="caret"></span>
                            </h4>
                        </div>

                        <div id="collapse<?PHP echo $i ?>" class="panel-collapse collapse">
                            <div class="panel-body"><?PHP echo $post_data[$i]->body; ?></div>
                        </div>
                    </div>

                <?PHP
                }

                ?>

            </div>

    </div>



</div>

<div class="row">
    <div class="col-sm-12">
        <img class="img-responsive" src="<?PHP echo base_url(); ?>images/banner1.png" />
    </div>
</div>

<div class="row">
    <div class="jumbotron">
        <legend>PES CUSTOMERS</legend>
        <div class="col-sm-3">
            <div class="well">
                <h2>DAWASCO</h2>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="well">
                <h2>TANESCO</h2>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="well">
                <h2>COCACOLA</h2>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="well">
                <h2>TWIGA CEMENT</h2>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <DIV class="col-sm-12">
        <legend><h3>TESTIMONIOS</h3></legend>
    </DIV>
</div>

<div class="row">

    <div class="col-sm-3">
        <h3>Jeffrey</h3>
        <div class="well">
            <p>Since the Start of PES, I have seen an absolute increase in the Quality and Quantity of Water Services</p>
        </div>
    </div>

    <div class="col-sm-3">
        <h3>Horrace Owiti</h3>
        <div class="well">
            <p>The establishment of PES_CASS has made it easy for me to obtain ES-Services. Am a bulk customer of Trees for Wood Purpose</p>
        </div>
    </div>

    <div class="col-sm-3">
        <h3>Cocacola</h3>
        <div class="well">
            <p>A good job is being conducted to facillitate conserves since the start of PES_CASS</p>
        </div>
    </div>

    <div class="col-sm-3">
        <h3>Dawasco</h3>
        <div class="well">
            <p>The cost for water purification has droped twice since the active establishment of PES_CASS</p>
        </div>
    </div>
</div>
