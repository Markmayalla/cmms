<div class="row" style="padding:20px;">
    <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right small">
                        <li class="active">
                            <a href="#org_info" data-toggle="tab">Info</a>
                        </li>
                        <li><a href="#phone" data-toggle="tab">Phone(s)</a> </li>
                        <li><a href="#email" data-toggle="tab">Email(s)</a> </li>
                        <li><a href="#address" data-toggle="tab">Address(es)</a> </li>

                        <li class="pull-left header">
                            <i class="fa fa-refresh"></i>
                            Update Organization
                        </li>
                    </ul>

                        <?php
                            $data['organizations_data_to_edit'] = @$display['organizations']['data'];
                            $data['email_data_to_edit'] = @$display['emails']['data'];
                            $data['phone_data_to_edit'] = @$display['phones']['data'];
                            $data['address_data_to_edit'] = @$display['addresses']['data'];
                            $error = $this->sessionlib->sess_get($this->sessionlib->flashdata,'error_sms');

                            $data['back_id'] = @$data['organizations_data_to_edit']->id;
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
                        <div class="tab-pane active" id="org_info">
                            <?php
                                $this->load->view('dashboard/forms/organization',$data);
                            ?>
                        </div>

                        <div class="tab-pane" id="address">
                        <?php
                                $this->load->view('dashboard/forms/address',$data);
                            ?>
                        </div>

                        <div class="tab-pane" id="phone">
                            <?php
                                $this->load->view('dashboard/forms/phones',$data);
                            ?>
                        </div>
                        <div class="tab-pane" id="email">
                            <?php
                                $this->load->view('dashboard/forms/emails',$data);
                            ?>
                        </div>
                    </div>
                </div>
</div>