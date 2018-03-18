<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 3/3/18
 * Time: 6:41 PM
 */ 

?>
 <div class="row">
    <div class="col-lg-5">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active">
                    <a href="#about" data-toggle="tab"><span class="fa fa-eye"></span> Preview</a>
                </li>
                <li>
                    <a href="#edit" data-toggle="tab"><span class="fa fa-plus"></span> Add</a>
                </li>
                <li class="navbar-header pull-right">
                    <span class="fa fa-users"></span> Trainee Group <?PHP echo strtoupper($gym->name); ?>
                </li>
            </ul>

            <div class="tab-content">
                <div id="edit" class="tab-pane">
                    <?PHP if (isset ($success_msg)) { ?>
                        <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                    <?PHP } ?>
                    <form id="default_form" method="post" action="<?PHP echo base_url(); ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/insert">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">GYM group name</span>
                           <input type="text" name="gym_groupname" class="form-control" value=""  placeholder="Trainee group" />
                            </div>
                        </div>
                     
                        <input type="submit" class="btn btn-info" name="save" value="Save" />
                    </form>

                </div>
                <div id="about" class="tab-pane active">
                     <div class="tab-pane" id="list_view">
                    <table class="table table-stripped table-hover" id="table">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Group Name</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody id="gyms_list">
                         
                        	<tr>
                        		<td>
                        <?php echo $gym->name;  ?>
                    </td>
                   
                   	<td>
                   
                          
                    </td>
                     		<td>
           <a href="" class="btn btn-info"  title="EDIT" ><i class="fa fa-pencil"></i></a> &nbsp;<a href="" class="btn btn-danger" title="DELETE" ><i class="fa fa-trash-o fa-lg" ></i></a>
                    </td>
                       </tr>
            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
  
    </div>
 
    <div class="row">
    <div class="col-lg-5">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active">
                    <a href="#about1" data-toggle="tab"><span class="fa fa-eye"></span> Preview</a>
                </li>
                <li>
                    <a href="#edit1" data-toggle="tab"><span class="fa fa-plus"></span> Add</a>
                </li>
                <li class="navbar-header pull-right">
                    <span class="fa fa-users"></span> Trainee Bundle <?PHP echo strtoupper($gym->name); ?>
                </li>
            </ul>

            <div class="tab-content">
                <div id="edit1" class="tab-pane">
                    <?PHP if (isset ($success_msg)) { ?>
                        <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                    <?PHP } ?>
                    <form id="default_form" method="post" action="<?PHP echo base_url(); ?>index.php/gym/gym_bundle/<?PHP echo $gym->id; ?>/insert">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">GYM Bundle name</span>
                           <input type="text" name="bundle_name" class="form-control" value=""  placeholder="Bundle name" />
                            </div>
                        </div>
                     
                        <input type="submit" class="btn btn-info" name="save" value="Save" />
                    </form>

                </div>
                <div id="about1" class="tab-pane active">
                     <div class="tab-pane" id="list_view">
                    <table class="table table-stripped table-hover" id="table">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Bundle Name</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody id="gyms_list">
                         
                        	<tr>
                        		<td>
                        <?php echo $gym->name;  ?>
                    </td>
                   
                   	<td>
                         
                    </td>
                      
                     		<td>
           <a href="" class="btn btn-info"  title="EDIT" ><i class="fa fa-pencil"></i></a> &nbsp;<a href="" class="btn btn-danger" title="DELETE" ><i class="fa fa-trash-o fa-lg" ></i></a>
                    </td>
                       </tr>
            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
  
    </div>