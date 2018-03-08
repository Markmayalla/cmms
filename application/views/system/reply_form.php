<div class="row">

    <Div class="col-sm-7">
        <div class="row">
            <div class="col-sm-12">
                <Div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><span class="glyphicon glyphicon-list"></span> Message</h3>
                    </div>

                    <div class="box-body">

                        <?PHP

                        if (isset($success)) {
                            echo '<div class="alert alert-success">' . $success . '</div>';
                        }

                        ?>

                        <?PHP echo form_open('system/live_chats/read/reply/'. $sender->id); ?>

                        <div class="item">
                            <img src="<?PHP

                            if ($sender->avatar == '') {
                                if ($sender->gender == 'male') {
                                    echo base_url() . 'AdminLTE/img/avatar5.png';
                                } else {
                                    echo base_url() . 'AdminLTE/img/avatar3.png';
                                }
                            }  else {
                                echo $sender->avatar;
                            }

                            ?>" alt="user image" class="img_round"/>
                            <p class="reply_details">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?PHP echo $message->time; ?></small>
                                <strong>Name: </strong><?PHP echo $sender->first_name . ' ' . $sender->last_name ?><br />
                                <strong>Message: </strong> <?PHP echo $message->message; ?>
                            </p>
                        </div>
                        <textarea name="msg" class="form-control form-group"></textarea>
                        <input type="submit" name="reply" class="btn btn-info" value="Reply"/>
                    </div>

                    <div class="box-footer">
                        <a href="<?PHP echo base_url() . 'index.php/system/live_chats'; ?>">Back</a>
                    </div>
                </Div>
            </div>
        </div>

        <div class="row">
            <Div class="col-sm-12">

            </Div>
        </div>

    </Div>


