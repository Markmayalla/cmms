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
                            <?PHP
                                 if(isset($gym_rate_group) && count($gym_rate_group)>0){
                          foreach ($gym_rate_group as $gym_rate_group) { 

                            ?>
                         
                        	<tr>
                        		<td>
                        <?php echo $gym->name;  ?>
                    </td>
                   
                   	<td>
                    <?php     echo $gym_rate_group->gym_groupname;  ?>
                          
                    </td>
                     		<td>
           <a href="" class="btn btn-info"  title="EDIT" ><i class="fa fa-pencil"></i></a> &nbsp;<a href="" class="btn btn-danger" title="DELETE" ><i class="fa fa-trash-o fa-lg" ></i></a>
                    </td>
                       </tr>
            <?php    }
        }
              ?>
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
                                 <?PHP
                                 if(isset($gym_rate_bundle) && count($gym_rate_bundle)>0){
                          foreach ($gym_rate_bundle as $gym_rate_bundle) { 

                            ?>
                        	<tr>
                        		<td>
                        <?php echo $gym_rate_bundle->name;  ?>
                    </td>
                   
                   	<td>
                         <?php echo $gym_rate_bundle->bundle_name;  ?>
                    </td>
                      
                     		<td>
           <a href="" class="btn btn-info"  title="EDIT" ><i class="fa fa-pencil"></i></a> &nbsp;<a href="" class="btn btn-danger" title="DELETE" ><i class="fa fa-trash-o fa-lg" ></i></a>
                    </td>
                       </tr>
            <?php          }  } ?>

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
  
    </div>

      <div class="row section">
    <div class="col-lg-5">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active">
                    <a href="#about2" data-toggle="tab"><span class="fa fa-eye"></span> Preview</a>
                </li>
                <li>
                    <a href="#edit2" data-toggle="tab"><span class="fa fa-plus"></span> Add</a>
                </li>
                <li class="navbar-header pull-right">
                    <span class="fa fa-users"></span> Trainee Amount <?PHP echo strtoupper($gym->name); ?>
                </li>
            </ul>

            <div class="tab-content">
                <div id="edit2" class="tab-pane">
                    <?PHP if (isset ($success_msg)) { ?>
                        <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                    <?PHP } ?>
                    <form id="default_form" method="post" action="<?PHP echo base_url(); ?>index.php/gym/gym_rate_amount/<?PHP echo $gym->id; ?>/insert">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">GYM group name</span>
                             <select type="text" value="id" name="" class="form-control" value="" />
                              <option>Pick Gym group </option>
                          <?php       
                          if(isset($gym_option) && count($gym_option)){
                               foreach ($gym_option as $gym_option) { 
                                      ?>         
         <option   value="id" name="gym_groupname" ><?php  echo $gym_option->gym_groupname;  ?></option>
               <?php  } }?>
                                      </select>
                            </div>
                        </div>
                     
                     <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">GYM group bundle</span>
                             <select type="text" value="id" name="" class="form-control" value="" />

           <option>Pick Gym bundle</option>
           
          <option value="id"   value="bundle_name" >1 week</option>
          
                                      </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">GYM group amount</span>
                           <input type="text" name="amount" class="form-control" value=""  placeholder="set amount" />
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info" name="save" value="Save" />
                    </form>

                </div>
                <div id="about2" class="tab-pane active">
                     <div class="tab-pane" id="list_view">
                    <table class="table table-stripped table-hover" id="table">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Group Name</td>
                             <td>Group Bundle</td>
                              <td>Group Amount</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody id="gyms_list">
                            <?PHP
                            if(isset($gym_amount) && count($gym_amount)>0){ 
                                foreach($gym_amount as $gym_amount){ 
                           
                            ?>
                         
                            <tr>
                                <td>
                        <?php echo $gym->name;  ?>
                    </td>
                   
                    <td>
                    <?php    echo $gym_amount->group_id;   ?>
                          
                    </td>
                     <td>
                    <?php    echo $gym_amount->bundle_id;   ?>
                          
                    </td>
                     <td>
                    <?php    echo $gym_amount->amount;   ?>
                          
                    </td>
                            <td>
    <a href="" class="btn btn-info"  title="EDIT" ><i class="fa fa-pencil"></i></a> &nbsp;<a href="<?PHP echo base_url(); ?>index.php/gym/gym_rate_amount/delete_rate_amount/<?PHP echo $gym_amount->id; ?>" class="btn btn-danger" title="DELETE" ><i class="fa fa-trash-o fa-lg" ></i></a>
                    </td>
                       </tr>
            <?php    
        }}
              ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
  
    </div>