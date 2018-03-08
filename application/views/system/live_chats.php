<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid bg-green">
            <div class="box-header">
                <h3 class="box-title">Welcome to live chats sub-suite...</h3>
            </div>

            <div class="box-body">
                <p>It is a sub-suite belonging to the awareness suite. It aims at enhancing communication between members through chatting.</p>
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
                                   <th>Chat</th>

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
                                       <td><?PHP echo $contact->email; ?></td>
                                       <td><?PHP echo $contact->phone; ?></td>
                                       <td><p class="text-danger">offline</p> </td>
                                       <td><a href="<?PHP echo base_url(); ?>index.php/system/live_chats/chat/<?PHP echo $contact->id ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-comment"></span> </a> </td>
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
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-envelope"></i>
                        <h3 class="box-title">Quick Email</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                            </div>
                            <div>
                                <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer clearfix">
                        <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </Div>
        </div>

    </Div>

    <Div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-comments-o"></i> Unread Messeges</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <div class="btn-group" data-toggle="btn-toggle" >
                        <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                    </div>
                </div>
            </div>
            <div class="box-body chat" id="chat-box">
                <!-- chat item -->

                    <?PHP

                    if (isset($success)) {
                        echo '<div class="alert alert-success">' . $success . '</div>';
                    }

                    if (isset($inbox)) {
                        ChromePhp::log('Count Inbox Value: '. count($inbox));
                        if (is_array($inbox)) {
                            foreach ($inbox as $key => $value) {
                    ?>

                                <div class="item">
                                    <img src="<?PHP

                                    if ($sender[$key]->avatar == '') {
                                        if ($sender[$key]->gender == 'male') {
                                            echo base_url() . 'AdminLTE/img/avatar5.png';
                                        } else {
                                            echo base_url() . 'AdminLTE/img/avatar3.png';
                                        }
                                    }  else {
                                        echo $sender[$key]->avatar;
                                    }

                                    ?>" alt="user image" class="offline"/>
                                    <p class="message">
                                        <a href="<?PHP echo base_url() . 'index.php/system/live_chats/read/' . $value->id; ?>" class="name">
                                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?PHP echo $value->time; ?></small>
                                            <?PHP echo $sender[$key]->first_name . ' ' . $sender[$key]->last_name ?>
                                        </a>
                                        <strong>Status: </strong> <?PHP echo $value->status; ?>
                                    </p>
                                </div>

                    <?PHP
                            }
                        } else {
                            echo $inbox;
                        }
                    }

                    ?>

                <!-- chat item -->

            </div><!-- /.chat -->
            <div class="box-footer">

            </div>
        </div><!-- /.box (chat box) -->
    </Div>
</div>

