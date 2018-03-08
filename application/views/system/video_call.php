<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to video calls sub-suite...</h3>
            </div>

            <div class="box-body">
                <p>It is a sub-suite belonging to the awareness suite. It aims at enhancing communication between members through video calling.</p>
            </div>

        </div>
    </div>

    <div class="col-sm-12">
        <div class="box box-solid bg-red">
            <div class="box-header">
                <h3 class="box-title"><span class="fa fa-warning"></span> Sorry, This service is inactive awaiting the SSL certificate. </h3>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <Div class="col-sm-7">
        <div class="row">
            <div class="col-sm-12">
                <Div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><span class="glyphicon glyphicon-list"></span> Contacts</h3>
                    </div>

                    <div class="box-body">

                        <table id="contacts" class="table table-stripped table-hover chat" >
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Call</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?PHP

                                foreach ($users as $contact) {

                                    ?>
                                    <tr>
                                        <?PHP

                                        if ($contact->avatar == '') {
                                            if ($contact->gender == 'male') {
                                                $avatar = base_url() . 'AdminLTE/img/avatar5.png';
                                            } else {
                                                $avatar = base_url() . 'AdminLTE/img/avatar3.png';
                                            }
                                        } else {
                                            $avatar = $contact->avatar;
                                        }

                                        ?>
                                        <td class="item"><img src="<?PHP echo $avatar; ?>" alt="user image" class="online"/></td>
                                        <td><?PHP echo $contact->first_name; ?></td>
                                        <td><?PHP echo $contact->last_name; ?></td>
                                        <td><span id="<?PHP echo $contact->id; ?>"><?PHP echo $contact->email; ?></span></td>
                                        <td><?PHP echo $contact->phone; ?></td>
                                        <td><p class="text-red">offline</p> </td>
                                        <td><button class="btn btn-sm btn-success" name="<?PHP echo $contact->id; ?>" id="call"><span class="glyphicon glyphicon-facetime-video"></span> </button> </td>
                                    </tr>
                                <?PHP
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </Div>
            </div>
        </div>

        <div class="row">
            <Div class="col-sm-12">

            </Div>
        </div>

    </Div>

    <Div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-video-camera"></i> Video Call Screen</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">

                </div>
            </div>
            <div class="box-body" >
                <div id="video_out">

                </div>
            </div><!-- /.chat -->
            <div class="box-footer">

            </div>
        </div><!-- /.box (chat box) -->
    </Div>
</div>

