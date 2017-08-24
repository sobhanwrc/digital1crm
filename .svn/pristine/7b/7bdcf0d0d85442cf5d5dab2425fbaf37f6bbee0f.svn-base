<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="menu-toggler sidebar-toggler"> </div>
            <!-- BEGIN HEADER INNER -->
            <?php echo $header; ?>
            <!-- END HEADER INNER -->
        </div><!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php echo $left_sidebar; ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->

                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">App Users </a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>List</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">
                                            <?php if($method_name=='importUserList'){ ?>
                                            Imported App Users List 
                                                <?php }else{ ?>
                                             App Users List 
                                            <?php } ?>
                                        </span>
                                    </div>
                                    <!--                                    <div class="actions">
                                                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                                                            </div>
                                                                        </div>-->

                                </div>

                                <?php $err = $this->session->flashdata('suc_message');
                                if (isset($err) && $err != '') {
                                    ?>
                                    <div class="alert alert-success" id="general_msg_success" >
                                        <strong>Success!</strong> <?php echo $err; ?>
                                    </div>
                                <?php } ?>
                                <?php $err = $this->session->flashdata('err_message');
                                if (isset($err) && $err != '') {
                                    ?>
                                    <div class="alert alert-danger" id="general_msg_success" >
                                        <strong>Error!</strong> <?php echo $err; ?>
                                    </div>
<?php } ?>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
<!--                                                    <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>-->
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-md-6">
                                                                                            <div class="btn-group pull-right">
                                                                                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                                                                    <i class="fa fa-angle-down"></i>
                                                                                                </button>
                                                                                                <ul class="dropdown-menu pull-right">
                                                                                                    <li>
                                                                                                        <a href="javascript:;">
                                                                                                            <i class="fa fa-print"></i> Print </a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="javascript:;">
                                                                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="javascript:;">
                                                                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>-->

                                        </div>
                                        <!--                                        <div class="row">
                                                                                    <div class="col-md-3">
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <div class="form-group">
                                                                                            <select  class="form-control" name="category">
                                                                                                <option value="">Select One</option>
                                                                                                <option >Firm1</option>
                                                                                                <option >Firm2</option>
                                                                                                <option >Firm3</option>
                                                                                                <option >Firm4</option>
                                                                                                <option >Firm5</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="button" value="Go">
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                    </div>
                                                                                </div>-->
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th>Sl#</th>
                                                <th> User Name </th>
                                                <th> Role </th>
                                                <th> Group</th>
                                                <th> Authorized By </th>
                                                <th> Authorized Date </th>
                                                <th> Remarks </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
//                                            t($det); exit;
                                            foreach ($det as $key => $value) {
//t($value); exit;
                                                ?>
                                            
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $value['user_last_name'] . ',' . '&nbsp' . $value['user_first_name']?> </td>                                                  
                                                    <td><?php echo $value['role_code']; ?> </td> 
                                                    <td><?php echo $value['group_code']; ?> </td>
                                                    <td><?php echo $value['authorized_by']; ?> </td>
                                                    <td><?php echo date('d-M-Y', $value['authorized_date']); ?> </td>
                                                    <td><?php echo $value['remarks_notes']; ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="#responsive<?php echo $value['user_seq_no']; ?>"  data-toggle="modal" >
                                                                        <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <?php if($method_name=='importUserList'){ ?>
<!--                                                                <li>
                                                                    <?php // if($value['role_code']=='ATTR'){ ?>
                                                                    <a href="<?php // echo $base_url; ?>/attorney/edit/"  data-toggle="modal" >
                                                                    <?php // } ?>
                                                                        <i class="icon-docs"></i> Edit </a>
                                                                </li>-->
                                                                <?php } ?>
<!--                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>app-users/delete/<?php echo base64_encode($value['user_seq_no']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                        <i class="icon-tag"></i> Delete </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php //}?>
                                                <?php //}?>
<?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New App User</h4>
                        </div>
                        <form  name="app_users_form" autocomplete="off" id="app_users_form" action="<?php echo $base_url; ?>app-users/add" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">User ID:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="user_id" class="form-control" placeholder="Enter text" id="user_id">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Password:</label>
                                                <div class="col-md-8">
                                                    <input type="password"  name="password" class="form-control" placeholder="***********">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">First Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="first_name" class="form-control" placeholder="Enter User First Name">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="last_name" class="form-control" placeholder="Enter User Last Name">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>  
                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Role:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control"  name="role_code">
                                                        <option value="">Select One</option>
                                                         <?php  //t($codes); exit; ?>
                                                            <?php foreach ($codes['Roles'] as $key => $value) {
                                                                if($role_code < $value['code'] && $value['code']!=1){
                                                                ?>
                                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                            <?php } }  ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Group:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control"  name="group_code">
                                                        <option value="">Select One</option>
                                                        <?php  //t($codes_1); exit; ?>
                                                        <?php foreach ($codes['Groups'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                           <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Designation:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control"  name="designation">
                                                        <option value="">Select One</option>
                                                        <?php  //t($codes_1); exit; ?>
                                                        <?php foreach ($codes['Designation'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                           <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Authorized By:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="authorized_by" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                        <label class="col-md-4 control-label"></label>
                                                        <input type="checkbox" name="approver[]" value="approver" class="form-control approver">&nbsp;Approver
                                                            <span class="help-block">  </span>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Authorized date:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="authorized_date" class="form-control date-picker" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" placeholder="Enter text"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <br>
                                            <h5 class="modal-title">User Address</h5>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Address Line 1:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="address_line1" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Address Line 2:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="address_line2" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Address Line 3:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="address_line3" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Country:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="country" id="country">
                                                        <option value="">Country</option>
                                                        <?php foreach ($country as $key => $value) { ?>
                                                            <option value="<?php echo $value['country_seq_no']; ?>"><?php echo $value['name']; ?></option>
                                                           <?php } ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">State/Province:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="state" id="state">
                                                        <option value="">State</option>
                                                        <?php
                                                        if (isset($state_info) && $state_info != '') {
                                                            echo $state_info;
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">County:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="county" id="county">
                                                        <option value="">County</option>
                                                                <?php
                                                                if (isset($county_info) && $county_info != '') {
                                                                    echo $county_info;
                                                                }
                                                                ?>
                                                                </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">City:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="city" id="city">
                                                        <option value="">City</option>
                                                        <?php
                                                        if (isset($city_info) && $city_info != '') {
                                                            echo $city_info;
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Postal Code:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="postal_code" id="postal_code" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Email:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="email" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label phone">Phone:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="phone" id="phone" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label mobile">Mobile/Cell:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="mobile_cell" id="mobile" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label mobile">Fax:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="mobile_cell" id="fax" class="form-control" placeholder="Enter facsimile">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Website URL:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="website_url" id="web_url" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Social Media URL:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="social_media_url" id="social_url" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Address Remarks/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks_notes" placeholder="Enter text"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
         
                                            <!--                                    <div class="form-group">
                                                                                    <label class="col-md-4 control-label">Gender</label>
                                                                                    <div class="col-md-8 radio-list">
                                                                                        <label class="radio-inline">
                                                                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Male </label>
                                                                                        <label class="radio-inline">
                                                                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Female </label>
                                                                                    </div>
                                                                                </div>-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--<button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>-->
                                <input type="submit" class="btn green" id="app_users_submit" value="Save" >
                                <!--<button type="button" class="btn green" id="app_codes_submit">Save changes</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        <!-----------------------------APP USERS VIEW----------------------------->
        
            <?php foreach($det as $key => $value) { ?>
            <div id="responsive<?php echo $value['user_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View App User</h4>
                        </div>
                        
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Username:</label>
                                                     <div class="col-md-8">
                                                         <input type="text"  name="user_id" disabled="" id="user_id" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_id']) && $value['user_id'] != '') {
                                                                echo $value['user_id'];
                                                                 }?>" <?php if (isset($value['user_id']) && $value['user_id'] != '') {
                                                                            echo $value['user_id'];
                                                                               }?> >
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">User First Name:</label>
                                                     <div class="col-md-8">
                                                        <input type="text"  name="first_name" id="first_name" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_first_name']) && $value['user_first_name'] != '') {
                                                                echo $value['user_first_name'];
                                                                 }?>" <?php if (isset($value['user_first_name']) && $value['user_first_name'] != '') {
                                                                            echo $value['user_first_name'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">User Last Name:</label>
                                                     <div class="col-md-8">
                                                        <input type="text"  name="last_name" id="last_name" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_last_name']) && $value['user_last_name'] != '') {
                                                                echo $value['user_last_name'];
                                                                 }?>" <?php if (isset($value['user_last_name']) && $value['user_last_name'] != '') {
                                                                            echo $value['user_last_name'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Role:</label>
                                                  <div class="col-md-8">
                                                      <input type="text"  name="user_id" id="user_id" disabled="" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['role_code']) && $value['role_code'] != '') {
                                                                echo $value['role_code'];
                                                                 }?>" <?php if (isset($value['role_code']) && $value['role_code'] != '') {
                                                                            echo $value['role_code'];
                                                                               }?> >
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Group:</label>
                                                  <div class="col-md-8">
                                                      <input type="text"  name="user_id" id="user_id" disabled="" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['group_code']) && $value['group_code'] != '') {
                                                                echo $value['group_code'];
                                                                 }?>" <?php if (isset($value['group_code']) && $value['group_code'] != '') {
                                                                            echo $value['group_code'];
                                                                               }?> >
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Designation:</label>
                                                  <div class="col-md-8">
                                                      <input type="text"  name="designation" id="user_id" disabled="" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['designation']) && $value['designation'] != '') {
                                                                echo $value['designation'];
                                                                 }?>" <?php if (isset($value['designation']) && $value['designation'] != '') {
                                                                            echo $value['designation'];
                                                                               }?> >
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <input type="checkbox" disabled="" name="approver[]" class="approver1" value="1" <?php if ($value['user_approver_type'] == '1') {echo 'checked="checked"';}?>>&nbsp;Approver
                                                        <span class="help-block">  </span>
                                            </div> 
                                            <div class="form-group approver_type">
                                                   <label class="col-md-4 control-label">Approver type:</label>
                                                     <div class="col-md-8">
                                                         <input type="text"  name="user_approver_type" disabled="" id="user_approver_type" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_approver_type']) && $value['user_approver_type'] != '') {
                                                                echo $value['user_approver_type'];
                                                                 }?>" <?php if (isset($value['user_approver_type']) && $value['user_approver_type'] != '') {
                                                                            echo $value['user_approver_type'];
                                                                               }?> >
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                            <label class="col-md-4 control-label">Authorized By:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="authorized_by" id="authorized_by" class="form-control" placeholder="Enter text" value="<?php
                                                 if (isset($value['authorized_by']) && $value['authorized_by'] != '') {
                                                     echo $value['authorized_by'];
                                                      }?>" <?php if (isset($value['authorized_by']) && $value['authorized_by'] != '') {
                                                                 echo $value['authorized_by'];
                                                                    }?> disabled>
                                                             <span class="help-block">  </span>
                                                         </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-4 control-label">Authorized Date:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="authorized_date" id="authorized_date" class="form-control" placeholder="Enter text" value="<?php
                                                      if (isset($value['authorized_date']) && $value['authorized_date'] != '') {
                                                                  echo date('d-M-Y', $value['authorized_date']); 
                                                                    }?>"  disabled>
                                                             <span class="help-block">  </span>
                                                         </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="col-md-4 control-label">Remarks:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="remarks_notes" id="remarks_notes" class="form-control" placeholder="Enter text" value="<?php
                                                 if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                     echo $value['remarks_notes'];
                                                      }?>" <?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                                 echo $value['remarks_notes'];
                                                                    }?> disabled>
                                                             <span class="help-block" disabled>  </span>
                                                         </div>
                                            </div>
                                            <br>
                                            <h5 class="modal-title">User Address</h5>
                                            <br>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Line 1:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="address_line_1" id="address_line_1" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['address_line1']) && $value['address_line1'] != '') {
                                                                echo $value['address_line1'];
                                                                 }?>" <?php if (isset($value['address_line1']) && $value['address_line1'] != '') {
                                                                            echo $value['address_line1'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Line 2:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="address_line_2" id="address_line_2" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['address_line2']) && $value['address_line2'] != '') {
                                                                echo $value['address_line2'];
                                                                 }?>" <?php if (isset($value['address_line2']) && $value['address_line2'] != '') {
                                                                            echo $value['address_line2'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Line 3:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="address_line_3" id="address_line_3" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['address_line3']) && $value['address_line3'] != '') {
                                                                echo $value['address_line3'];
                                                                 }?>" <?php if (isset($value['address_line3']) && $value['address_line3'] != '') {
                                                                            echo $value['address_line3'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Country:</label>
                                                  <div class="col-md-8">
                                                      <select name="country" id="country" class="form-control" disabled="">
                                                             <option value="">Country</option>
                                                             <?php if(isset($country_info) && $country_info != ''){echo $country_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">State:</label>
                                                  <div class="col-md-8">
                                                      <select name="state" id="state" class="form-control" disabled="">
                                                             <option value="">State</option>
                                                             <?php if(isset($state_info) && $state_info != ''){echo $state_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">County:</label>
                                                  <div class="col-md-8">
                                                      <select name="county" id="county" class="form-control" disabled="">
                                                             <option value="">County</option>
                                                             <?php if(isset($county_info) && $county_info != ''){echo $county_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">City/Town:</label>
                                                  <div class="col-md-8">
                                                      <select name="city" id="city" class="form-control" disabled>
                                                             <option value="">City/Town</option>
                                                             <?php if(isset($city_info) && $city_info != ''){echo $city_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Postal Code:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="postal_code" id="postal_code" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['postal_code']) && $value['postal_code'] != '') {
                                                                echo $value['postal_code'];
                                                                 }?>" <?php if (isset($value['postal_code']) && $value['postal_code'] != '') {
                                                                            echo $value['postal_code'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>

                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Email:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="email" id="email" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['email']) && $value['email'] != '') {
                                                                echo $value['email'];
                                                                 }?>" <?php if (isset($value['email']) && $value['email'] != '') {
                                                                            echo $value['email'];
                                                                               }?> disabled>
                                                         <input type="hidden" name="original_email" id="original_email" value="<?php if(isset($value['email']) && $value['email'] != ''){echo $value['email']; } ?>">
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label phone">Phone:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="phone" id="phone1" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['phone']) && $value['phone'] != '') {
                                                                echo $value['phone'];
                                                                 }?>" <?php if (isset($value['phone']) && $value['phone'] != '') {
                                                                            echo $value['phone'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label mobile">Mobile:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="mobile" id="mobile1" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['mobile_cell']) && $value['mobile_cell'] != '') {
                                                                echo $value['mobile_cell'];
                                                                 }?>" <?php if (isset($value['mobile_cell']) && $value['mobile_cell'] != '') {
                                                                            echo $value['mobile_cell'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                <div class="form-group">
                                                   <label class="col-md-4 control-label mobile">Fax:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="fax" id="fax1" class="form-control" placeholder="Enter facsimile" value="<?php
                                                            if (isset($value['fax']) && $value['fax'] != '') {
                                                                echo $value['fax'];
                                                                 }?>" <?php if (isset($value['fax']) && $value['fax'] != '') {
                                                                            echo $value['fax'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Website URL:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="web_url" id="web_url" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['website_url']) && $value['website_url'] != '') {
                                                                echo $value['website_url'];
                                                                 }?>" <?php if (isset($value['website_url']) && $value['website_url'] != '') {
                                                                            echo $value['website_url'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Social URL:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="social_url" id="social_url" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['social_media_url']) && $value['social_media_url'] != '') {
                                                                echo $value['social_media_url'];
                                                                 }?>" <?php if (isset($value['social_media_url']) && $value['social_media_url'] != '') {
                                                                            echo $value['social_media_url'];
                                                                               }?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Remarks:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" disabled="" name="remarks" id="remarks" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                                echo $value['remarks_notes'];
                                                                 }?>" <?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                                            echo $value['remarks_notes'];
                                                                               }?> disabled>
                                                                        <span class="help-block" disabled>  </span>
                                                                    </div>
                                                                </div>
                                            
                                            
                                            

                                            <!--        <div class="form-group">
                                                            <label class="col-md-4 control-label">Gender</label>
                                                            <div class="col-md-8 radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Male </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Female </label>
                                                            </div>
                                                        </div>-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--<button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>-->
                                <!--<input type="submit" class="btn green" id="app_users_submit" value="Save" >-->
<!--                                <button type="button" class="btn green" id="app_codes_submit">Save</button>-->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        
   <!---------------------------APP USERS EDIT----------------------------------->     
        
     <?php foreach($det as $key => $value) { ?>
            <div id="responsive_edit_<?php echo $value['user_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Edit App User</h4>
                        </div>
                        <form action="<?php echo $base_url . 'app-users/details/' . base64_encode($value['user_seq_no']); ?>" name="app_users_edit_form" id="app_users_edit_form" autocomplete="off" method="post" class="app_users_edit_form">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Username:</label>
                                                     <div class="col-md-8">
                                                         <input type="text"  name="user_id" disabled="" id="user_id" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_id']) && $value['user_id'] != '') {
                                                                echo $value['user_id'];
                                                                 }?>" <?php if (isset($value['user_id']) && $value['user_id'] != '') {
                                                                            echo $value['user_id'];
                                                                               }?> >
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">User First Name:</label>
                                                     <div class="col-md-8">
                                                         <input type="text"  name="first_name" disabled="" id="first_name" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_first_name']) && $value['user_first_name'] != '') {
                                                                echo $value['user_first_name'];
                                                                 }?>" <?php if (isset($value['user_first_name']) && $value['user_first_name'] != '') {
                                                                            echo $value['user_first_name'];
                                                                               }?> >
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">User Last Name:</label>
                                                     <div class="col-md-8">
                                                         <input type="text"  name="last_name" disabled="" id="last_name" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_last_name']) && $value['user_last_name'] != '') {
                                                                echo $value['user_last_name'];
                                                                 }?>" <?php if (isset($value['user_last_name']) && $value['user_last_name'] != '') {
                                                                            echo $value['user_last_name'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Role:</label>
                                                  <div class="col-md-8">
                                            <input type="text"  name="user_id" disabled="" id="user_id" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['role_code']) && $value['role_code'] != '') {
                                                                echo $value['role_code'];
                                                                 }?>" <?php if (isset($value['role_code']) && $value['role_code'] != '') {
                                                                            echo $value['role_code'];
                                                                               }?> >
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                                <div class="form-group">
                                                <label class="col-md-4 control-label">Group:</label>
                                                  <div class="col-md-8">
                                            <input type="text"  name="user_id" disabled="" id="user_id" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['group_code']) && $value['group_code'] != '') {
                                                                echo $value['group_code'];
                                                                 }?>" <?php if (isset($value['group_code']) && $value['group_code'] != '') {
                                                                            echo $value['group_code'];
                                                                               }?> >
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                             <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <input type="checkbox" name="approver[]" disabled class="approver" value="1" <?php if ($value['user_approver_type'] == '1') {echo 'checked="checked"';}?>>&nbsp;Approver
                                                        <span class="help-block">  </span>
                                            </div>
                                            <div class="form-group approver_type">
                                                   <label class="col-md-4 control-label">Approver type:</label>
                                                     <div class="col-md-8">
                                                         <input type="text"  name="user_approver_type" disabled="" id="user_approver_type" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['user_approver_type']) && $value['user_approver_type'] != '') {
                                                                echo $value['user_approver_type'];
                                                                 }?>" <?php if (isset($value['user_approver_type']) && $value['user_approver_type'] != '') {
                                                                            echo $value['user_approver_type'];
                                                                               }?> >
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                            <label class="col-md-4 control-label">Authorized By:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="authorized_by" disabled="" id="authorized_by" class="form-control" placeholder="Enter text" value="<?php
                                                 if (isset($value['authorized_by']) && $value['authorized_by'] != '') {
                                                     echo $value['authorized_by'];
                                                      }?>" <?php if (isset($value['authorized_by']) && $value['authorized_by'] != '') {
                                                                 echo $value['authorized_by'];
                                                                    }?>>
                                                             <span class="help-block">  </span>
                                                         </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-4 control-label">Authorized Date:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="authorized_date" disabled="" id="authorized_date" class="form-control" placeholder="Enter text" value="<?php
//                                                 if (isset($value['authorized_date']) && $value['authorized_date'] != '') {
//                                                     //echo $value['authorized_date'];
//                                                      }?><?php // echo $value['authorized_date'];
                                                      if (isset($value['authorized_date']) && $value['authorized_date'] != '') {
                                                                  echo date('d-M-Y', $value['authorized_date']); 
                                                                    }?>">
                                                             <span class="help-block">  </span>
                                                         </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="col-md-4 control-label">Remarks:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="remarks_notes" id="remarks_notes" class="form-control" placeholder="Enter text" value="<?php
                                                 if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                     echo $value['remarks_notes'];
                                                      }?>" <?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                                 echo $value['remarks_notes'];
                                                                    }?>>
                                                             <span class="help-block">  </span>
                                                         </div>
                                            </div>
                                            <br>
                                            <h5 class="modal-title">User Address</h5>
                                            <br>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Line 1:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="address_line_1" id="address_line_1" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['address_line1']) && $value['address_line1'] != '') {
                                                                echo $value['address_line1'];
                                                                 }?>" <?php if (isset($value['address_line1']) && $value['address_line1'] != '') {
                                                                            echo $value['address_line1'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Line 2:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="address_line_2" id="address_line_2" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['address_line2']) && $value['address_line2'] != '') {
                                                                echo $value['address_line2'];
                                                                 }?>" <?php if (isset($value['address_line2']) && $value['address_line2'] != '') {
                                                                            echo $value['address_line2'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Line 3:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="address_line_3" id="address_line_3" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['address_line3']) && $value['address_line3'] != '') {
                                                                echo $value['address_line3'];
                                                                 }?>" <?php if (isset($value['address_line3']) && $value['address_line3'] != '') {
                                                                            echo $value['address_line3'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                           
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Country:</label>
                                                  <div class="col-md-8">
                                                      <select name="country" id="country" class="form-control">
                                                             <option value="">Country</option>
                                                             <?php if(isset($country_info) && $country_info != ''){echo $country_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">State:</label>
                                                  <div class="col-md-8">
                                                      <select name="state" id="state" class="form-control">
                                                             <option value="">State</option>
                                                             <?php if(isset($state_info) && $state_info != ''){echo $state_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">County:</label>
                                                  <div class="col-md-8">
                                                      <select name="county" id="county" class="form-control">
                                                             <option value="">County</option>
                                                             <?php if(isset($county_info) && $county_info != ''){echo $county_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">City/Town:</label>
                                                  <div class="col-md-8">
                                                      <select name="city" id="city" class="form-control">
                                                             <option value="">City/Town</option>
                                                             <?php if(isset($city_info) && $city_info != ''){echo $city_info; } ?>
                                                         </select>
                                                        <span class="help-block"> </span>
                                                         </div>
                                                    </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Postal Code:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['postal_code']) && $value['postal_code'] != '') {
                                                                echo $value['postal_code'];
                                                                 }?>" <?php if (isset($value['postal_code']) && $value['postal_code'] != '') {
                                                                            echo $value['postal_code'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>

                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Email:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="email" id="email" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['email']) && $value['email'] != '') {
                                                                echo $value['email'];
                                                                 }?>" <?php if (isset($value['email']) && $value['email'] != '') {
                                                                            echo $value['email'];
                                                                               }?>>
                                                         <input type="hidden" name="original_email" id="original_email" value="<?php if(isset($value['email']) && $value['email'] != ''){echo $value['email']; } ?>">
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label phone">Phone:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="phone" id="phone2" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['phone']) && $value['phone'] != '') {
                                                                echo $value['phone'];
                                                                 }?>" <?php if (isset($value['phone']) && $value['phone'] != '') {
                                                                            echo $value['phone'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label mobile">Mobile:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="mobile" id="mobile2" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['mobile_cell']) && $value['mobile_cell'] != '') {
                                                                echo $value['mobile_cell'];
                                                                 }?>" <?php if (isset($value['mobile_cell']) && $value['mobile_cell'] != '') {
                                                                            echo $value['mobile_cell'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label mobile">Fax:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="fax" id="fax2" class="form-control" placeholder="Enter Facsimile" value="<?php
                                                            if (isset($value['fax']) && $value['fax'] != '') {
                                                                echo $value['fax'];
                                                                 }?>" <?php if (isset($value['fax']) && $value['fax'] != '') {
                                                                            echo $value['fax'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Website URL:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="web_url" id="web_url1" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['website_url']) && $value['website_url'] != '') {
                                                                echo $value['website_url'];
                                                                 }?>" <?php if (isset($value['website_url']) && $value['website_url'] != '') {
                                                                            echo $value['website_url'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Social URL:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="social_url" id="social_url1" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['social_media_url']) && $value['social_media_url'] != '') {
                                                                echo $value['social_media_url'];
                                                                 }?>" <?php if (isset($value['social_media_url']) && $value['social_media_url'] != '') {
                                                                            echo $value['social_media_url'];
                                                                               }?>>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                            
                                            <div class="form-group">
                                                   <label class="col-md-4 control-label">Address Remarks:</label>
                                                     <div class="col-md-8">
                                                         <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Enter text" value="<?php
                                                            if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                                echo $value['remarks_notes'];
                                                                 }?>" <?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                                            echo $value['remarks_notes'];
                                                                               }?>>
                                                                        <span class="help-block" disabled>  </span>
                                                                    </div>
                                                                </div>

                                            
                                            <!--        <div class="form-group">
                                                            <label class="col-md-4 control-label">Gender</label>
                                                            <div class="col-md-8 radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Male </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Female </label>
                                                            </div>
                                                        </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <!--<input type="submit" class="btn green" id="app_users_submit" value="Save" >-->
                                <button type="submit" class="btn green app_users_edit_submit" id="app_users_submit_btn" name="app_users_submit_btn" onclick="fn_frm_submit('<?php echo $value['user_seq_no']; ?>')">Save</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>   
        
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        
        
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
<?php echo $footer; ?>
    <!-- END FOOTER -->
<?php echo $footer_link; ?>
</body>
<style>
    
        .dropdown-menu {
    box-shadow: 5px 5px rgba(102,102,102,.1);
    left: -109px;
    min-width: 175px;
    position: absolute;
    z-index: 1000;
    display: none;
    float: left;
    list-style: none;
    padding: 0;
    background-color: #fff;
    margin: 10px 0 0;
    border: 1px solid #eee;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
}


    /*    label.error {
            display: none !important;
        }*/
    .customErrorClass {
        border: 1px solid red !important;
        /*color: red;*/
        background-color: #ffcccc;
    }

    input[type=text].error,input[type=file].error, input[type=email].error, input[type=password].error, textarea.error, select.error,input[type=checkbox].error {
        border: 1px solid red !important;
    }
</style>
<!-- address db -->
<script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo $assets_path; ?>custom/js/validate/app_users_add.js" type="text/javascript"></script>
<script src="<?php echo $assets_path; ?>custom/js/validate/app_users_address.js" type="text/javascript"></script>
<script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
<!-- address db -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#addres_text').hide();
        $("#app_users_address_submit").on('click', function (e) {
//            alert(123);
            var valid = $('#app_users_address_form').valid();
            if (valid) {
                $.ajax({
                    url: BASE_URL + 'app-users/add_address',
                    type: 'POST',
                    data: $("#app_users_address_form").serialize(),
                    success: function (form)
                    {
                      $('#responsive_address').modal('hide');
                      $('#address_group').hide();
                    }
                });

            }

        });
        if ($("#approver").is(":checked")) {
                $(".approver_type").show();
            } else {
                $(".approver_type").hide();
            }
        
        if ($("#approver1").is(":checked")) {
                $(".approver_type1").show();
            } else {
                $(".approver_type1").hide();
            }
    
});
        $('#web_url').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#social_url').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
     $('#web_url1').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#social_url1').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    });
</script>
         <script>
            function fn_frm_submit(id)
            {
                $('#app_users_edit_form' + id).submit();
            }
        </script>
<script type="text/javascript">
var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        $("#phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#fax").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        
         $("#phone1").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile1").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#fax1").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        
         $("#phone2").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile2").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#fax2").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
    }
           return {
        //main function to initiate the module
        init: function () {
            handleInputMasks();
            //handleIPAddressInput();
        }
    };

}();

if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        FormInputMask.init(); // init metronic core componets
    });
}
$('#web_url').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#social_url').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#web_url1').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#social_url1').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
</script>
<script>
// $(".approver_type").hide();
$(".approver").click(function() {
    if($(this).is(":checked")) {
        $(".approver_type").show();
    } else {
        $(".approver_type").hide();
    }
});  
$(".approver1").click(function() {
    if($(this).is(":checked")) {
        $(".approver_type1").show();
    } else {
        $(".approver_type1").hide();
    }
});
    
</script>
</html>  

