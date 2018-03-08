<div class="row">
    <div class="col-md-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Hello, <?PHP echo $this->session->userdata('first_name'); ?></h3>
            </div>

            <div class="box-body">
                <p>Congratulations once again our valued user. You have   registered an account and log in successfully using your account credentials. What you have just accomplished are the available services in the first suite called “Membership suite”. This suite has two sub-suites which are “registration sub-suite” and “login sub-suite” which you have just used to get here.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="box box-solid bg-light-blue">
            <div class="box-header">
                <h3 class="box-title"><span class="fa fa-arrow-left"></span> Look at the left hand side</h3>
            </div>

            <div class="box-body">
                <p>Find the links for the 3 remaining suites, namely:- </p>
                <ul>
                    <li>Awareness Suite</li>
                    <li>Facilitation and Incentive Suite</li>
                    <li>PESDES Competition Suite</li>
                </ul>
                <p>Each of the suites are designed to address a specific PES aspect. Also, these suites are coupled with sub-suites that offer a specific intended service. </p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Awareness Suite</h3>
            </div>

            <div class="box-body">
                <p class="description_dashboard">The Awareness Suite is intended to familiarise <abbr title="Payment for Ecosystem Services Decision Enhancement Studion">PESDES</abbr> users with <abbr title="Payment for Ecological/Ecosystem/Environmental Services">PES</abbr> information and related issues.
                    The intended information will be available by navigating through the sub-suites. These sub-suites are; live chats, video calls, documents and marketing.</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Facilitation and Incentive Suite</h3>
            </div>

            <div class="box-body">
                <p class="description_dashboard">Facilitation and Incentive Suite is intended to provide identity of various actors in the basin and their respective roles & responsibilities. In addition, this suite provides modalities for compensating the efforts of conserves in a watershed.
                These sub-suites are; identity, roles and compensation</p>

            </div>
        </div>


    </div>

    <div class="col-md-3">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">PESDES Competition Suite</h3>
            </div>
            <div class="box-body">
                <p class="description_dashboard">This suite is intended to motivate conservation groups through conservation competition programs. These programs will be established and managed through an award system on a regular basis in order to motivate winners and promote conservation.
                This suite is parked with 3 sub-suites namely; entry requirement, competition management and performance assessment.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><span class="fa fa-dashboard"></span> Dashboard</h3>
            </div>
            <div class="box-body">
                <p>
                Presents the layout of the PESDES model design and suites/sub-suites in order to guide you through the model. The information on the dashboard also provides you with the snapshot of the services offered, the administrative page and further options. The evaluate online option enables user to complete evaluation online and submit. Whereas, evaluate offline option triggers download for the questionnaire so as to be filled and emailed separately
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title"><span class="fa fa-warning"></span> Administration Page </h3>
            </div>
            <div class="box-body">
                <p>
                    In this function, the administrator is able to; manage all data inputs from users, add products for the marketing sub-suite, controls all data (e.g. work plans and work budgets).
                </p>

            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Further Options</h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?PHP echo base_url(); ?>index.php/system/evaluate" class="btn btn-sm btn-info">Evaluate Online</a>
                        <p class="text-center text-danger" data-toggle="tooltip" title="The evaluation results can be submitted only once. However, reset function can be used to allow redo."> <span class="fa fa-warning"></span> CAUTION</p>
                    </div>

                    <div class="col-md-6">
                        <a href="<?PHP echo base_url(); ?>files/questionnaire.doc" class="btn btn-sm btn-success">Evaluate Offline</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>