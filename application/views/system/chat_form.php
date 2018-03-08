 <div class="row">

    <Div class="col-sm-7">
       <div class="row">
           <div class="col-sm-12">
               <Div class="box box-primary">
                   <div class="box-header">
                       <h3 class="box-title"><span class="glyphicon glyphicon-list"></span> Contacts</h3>
                   </div>

                   <div class="box-body">

                       <?PHP

                       if (isset($success)) {
                           echo '<div class="alert alert-success">' . $success . '</div>';
                       }

                       ?>

                    <?PHP echo form_open('system/live_chats/chat/send_msg/' . $user->id); ?>

                       <input type="text" class="form-control form-group" name="to_id" value="<?PHP echo $user->first_name; ?>" />
                       <textarea name="msg" class="form-control form-group"></textarea>
                       <input type="submit" name="send_msg" class="btn btn-info" value="Send"/>
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
                <h3 class="box-title"><i class="fa fa-comments-o"></i> Sent Messages</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <div class="btn-group" data-toggle="btn-toggle" >
                        <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                    </div>
                </div>
            </div>
            <div class="box-body chat" id="chat-box">

                <?PHP

                foreach ($sentMsgs as $key => $message) {

                ?>
                <!-- chat item -->
                <div class="item">
                    <img src="<?PHP echo $sentTo[$key]->avatar; ?>" alt="user image" class="online"/>
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?PHP echo $message->time ?></small>
                            <?PHP echo $sentTo[$key]->first_name . ' ' . $sentTo[$key]->last_name ?>
                        </a>
                        <?PHP echo $message->message; ?>
                    </p>

                </div><!-- /.item -->
                <?PHP
                }

                ?>

        </div><!-- /.box (chat box) -->
    </Div>
</div>

