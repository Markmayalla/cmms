<div class="row" style="padding:20px;">
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs small pull-right">
                <li class="active">
                     <a href="#personal_info" data-toggle="tab">Personal Info</a>
                </li>
                <li><a href="#phones" data-toggle="tab">Phones</a> </li>
                <li><a href="#emails" data-toggle="tab">Emails</a> </li>
                <li><a href="#addresses" data-toggle="tab">Addresses</a> </li>
                <li class="pull-left header"><i class="fa fa-user"></i> Profile</li>
            </ul>
                    <?php
                        $data['people_data_to_edit'] = @$display['users'];
                        $data['email_data_to_edit'] = @$display['emails'];
                        $data['phone_data_to_edit'] = @$display['phones'];
                        $data['address_data_to_edit'] = @$display['addresses'];
                        $error = $this->sessionlib->sess_get($this->sessionlib->flashdata,'error_sms');

                        $data['back_id'] = @$data['people_data_to_edit']->id;
                        if($error != ""){
                            ?>
                                <br />
                                <div class="alert alert-success alert-dismissable" style="display: block;margin-top:10px;width:60%;">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?=$error;?>
                                </div>
                            <?php
                        }
                    ?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal_info">
                            <?php
                                $this->load->view('dashboard/forms/user',$data);
                            ?>
                        </div>
                        <div class="tab-pane" id="phones">
                            <?php
                                $this->load->view('dashboard/forms/phones',$data);
                            ?>
                        </div>
                        <div class="tab-pane" id="emails">
                            <?php
                                $this->load->view('dashboard/forms/emails',$data);
                            ?>
                        </div>
                        <div class="tab-pane" id="addresses">
                            <?php
                                $this->load->view('dashboard/forms/address',$data);
                            ?>
                        </div>
                    </div>
                            
    </div>
</div>
