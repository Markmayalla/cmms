<div class="row">

    <Div class="col-sm-7">
       <div class="row">
           <div class="col-sm-12">
               <Div class="box box-primary">
                   <div class="box-header">
                       <h3 class="box-title"><span class="glyphicon glyphicon-list"></span> Contacts</h3>
                   </div>

                   <div class="box-body">

                       <table class="table table-stripped table-hover chat" >
                           <tr>
                               <th>Avatar</th>
                               <th>First Name</th>
                               <th>Last Name</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th>Status</th>

                           </tr>

                           <tr>
                               <td class="item"><img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar.png" alt="user image" class="online"/></td>
                               <td>Mark</td>
                               <td>Mayalla</td>
                               <td>markmayalla@gmail.com</td>
                               <td>0654303353</td>
                               <td><p class="text-green">Online</p> </td>
                               <td><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-comment"></span> </button> </td>
                           </tr>

                           <tr>
                               <td class="item"><img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar04.png" alt="user image" class="offline"/></td>
                               <td>Horace</td>
                               <td>Owiti</td>
                               <td>horace_owiti79@yahoo.com</td>
                               <td>0716166199</td>
                               <td><p class="text-red">Offline</p> </td>
                               <td><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-comment"></span> </button> </td>
                           </tr>

                           <tr>
                               <td class="item"><img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar2.png" alt="user image" class="offline"/></td>
                               <td>Jerry</td>
                               <td>Onasaa</td>
                               <td>jerry@gmail.com</td>
                               <td>0766554433</td>
                               <td><p class="text-red">Offline</p> </td>
                               <td><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-comment"></span> </button> </td>
                           </tr>

                           <tr>
                               <td class="item"><img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar5.png" alt="user image" class="online"/></td>
                               <td>Bonaventure</td>
                               <td>Baya</td>
                               <td>tomy.oranga@yahoo.com</td>
                               <td>0758400800</td>
                               <td><p class="text-green">Online</p> </td>
                               <td><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-comment"></span> </button> </td>
                           </tr>

                           <tr>
                               <td class="item"><img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar3.png" alt="user image" class="offline"/></td>
                               <td>Sabrina</td>
                               <td>Constantine</td>
                               <td>sabrina82@hotmail.com/td>
                               <td>0655439987</td>
                               <td><p class="text-red">Offline</p> </td>
                               <td><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-comment"></span> </button> </td>
                           </tr>
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
                <h3 class="box-title"><i class="fa fa-comments-o"></i> Recent Chats</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <div class="btn-group" data-toggle="btn-toggle" >
                        <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                    </div>
                </div>
            </div>
            <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                    <img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar.png" alt="user image" class="online"/>
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                            Mark Mayalla
                        </a>
                        I would like to meet you to discuss the latest news about
                        the arrival of the new theme. They say it is going to be one the
                        best themes on the market
                    </p>
                    <div class="attachment">
                        <h4>Attachments:</h4>
                        <p class="filename">
                            Theme-thumbnail-image.jpg
                        </p>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-sm btn-flat">Open</button>
                        </div>
                    </div><!-- /.attachment -->
                </div><!-- /.item -->
                <!-- chat item -->
                <div class="item">
                    <img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar04.png" alt="user image" class="offline"/>
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                            Horace Owiti
                        </a>
                        I would like to meet you to discuss the latest news about
                        the arrival of the new theme. They say it is going to be one the
                        best themes on the market
                    </p>
                </div><!-- /.item -->
                <!-- chat item -->
                <div class="item">
                    <img src="<?PHP echo base_url(); ?>AdminLTE/img/avatar5.png" alt="user image" class="offline"/>
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                            B.T. Baya
                        </a>
                        I would like to meet you to discuss the latest news about
                        the arrival of the new theme. They say it is going to be one the
                        best themes on the market
                    </p>
                </div><!-- /.item -->
            </div><!-- /.chat -->
            <div class="box-footer">
                <div class="input-group">
                    <input class="form-control" placeholder="Type message..."/>
                    <div class="input-group-btn">
                        <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.box (chat box) -->
    </Div>
</div>

