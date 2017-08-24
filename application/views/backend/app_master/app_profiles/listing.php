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
                                <a href="#">App Profiles</a>
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
                                        <span class="caption-subject bold uppercase">App Profiles List</span>
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
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php $srvr_msg = $this->session->flashdata('server_message'); if(isset($srvr_msg) ) { echo $srvr_msg; }?>
                                            </div>
                                        </div>
                                        <div class="row">
                                           <!--  <div class="col-md-6">
                                               <div class="btn-group">
                                                   <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                       <button class="btn sbold green"> Add New
                                                           <i class="fa fa-plus"></i>
                                                       </button>
                                                   </a>
                                               </div>
                                           </div> -->

<!--                                        <div class="col-md-6">
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
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                <th> User Name </th>
                                                <th> Base Location </th>
                                                <th> Base Session Ref </th>
                                                <th> Current Location </th>
                                                <th> Current Session Ref </th>
                                                <th> Remarks Notes </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                                            foreach($profiles as $key => $value)
                                                {
                                                $value = (array) $value;
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <?php
//                                                t($users); exit;
//                                                $j = 0;
                                                //foreach($users as $key1 => $value1)
                                                
                                               //{ $value1 = (array) $value1;
//                                                ?>
<!--                                                <td> <?php //echo $value1['user_id'];?> </td>-->
                                                <td> <?php echo $value['user_first_name'] . ' ' . $value['user_last_name'] ;?> </td>
                                                <?php //} ?>
                                                <td> <?php echo $value['base_location'];?> </td>
                                                <td> <?php echo $value['base_session_ref'];?> </td>
                                                <td> <?php echo $value['current_location']?> </td>
                                                <td> <?php echo $value['current_session_ref']?> </td>
                                                <td><?php echo $value['remarks_notes']?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                 <a href="#responsive_<?php echo $value['profile_seq_no']; ?>"  data-toggle="modal" >
                                                                    <i class="icon-docs"></i> View </a>
                                                            </li>
                                                            <li>
                                                                 <a href="#responsive_edit_<?php echo $value['profile_seq_no']; ?>"  data-toggle="modal" >
                                                                    <i class="icon-docs"></i> Edit </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo $base_url; ?>app-profiles/delete/<?php echo base64_encode($value['profile_seq_no']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                    <i class="icon-tag"></i> Delete </a>
                                                            </li>
                                                            <!--                                                    <li>
                                                                                                                    <a href="javascript:;">
                                                                                                                        <i class="icon-user"></i> New User </a>
                                                                                                                </li>
                                                                                                                <li class="divider"> </li>
                                                                                                                <li>
                                                                                                                    <a href="javascript:;">
                                                                                                                        <i class="icon-flag"></i> Comments
                                                                                                                        <span class="badge badge-success">4</span>
                                                                                                                    </a>
                                                                                                                </li>-->
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
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
            <!-----------------   ADD REMARKS   ---------------------> 
    <?php foreach($profiles as $key => $value) { 
        $value = (array) $value;?>        
            <div id="responsive_<?php echo $value['profile_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View APP Profile</h4>
                        </div>
                        <form action="#" name="appprofilesadd-form" id="appprofilesadd_form" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">   
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">User ID:</label>
                                                <div class="col-md-8">
                                                    <select name="user_id" id="user_id" class="form-control" disabled>
<!--                                                            <option value="<?php //if(isset($users_info['role_code']) && $users_info['role_code'] != ''){echo $users_info['role_code']; } ?>"><?php //echo $users_info['role_code']; ?></option>-->
                                                             <?php  foreach ($users as $key => $value1) { $value1 = (array) $value1;  ?>
                                                            <option value="<?php echo $value1['user_seq_no']; ?>" <?php if($value1['user_seq_no'] == $value['user_seq_no']){echo 'selected="selected"';} ?>><?php echo $value1['user_id']; ?></option>
                                                             <?php } ?>  
                                                        </select> 
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">User Name:</label>
                                                <div class="col-md-8">
                                                    <select name="user_id" id="user_id" class="form-control" disabled>
<!--                                                            <option value="<?php //if(isset($users_info['role_code']) && $users_info['role_code'] != ''){echo $users_info['role_code']; } ?>"><?php //echo $users_info['role_code']; ?></option>-->
                                                             <?php  foreach ($users as $key => $value1) { $value1 = (array) $value1;  ?>
                                                            <option value="<?php echo $value1['user_seq_no']; ?>" <?php if($value1['user_seq_no'] == $value['user_seq_no']){echo 'selected="selected"';} ?>><?php echo $value1['user_last_name'] . ',' . '&nbsp' . $value1['user_first_name']?></option>
                                                             <?php } ?>  
                                                        </select> 
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Base Location:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " placeholder="Enter text" disabled="" name="base_location" value="<?php if(isset($value['base_location']) && $value['base_location'] != ''){echo $value['base_location']; } ?>" <?php if(isset($value['base_location']) && $value['base_location'] != ''){echo $value['base_location']; } ?> >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Base Session Ref: </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($value['base_session_ref']) && $value['base_session_ref'] != ''){echo $value['base_session_ref']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Current Location: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" disabled="" placeholder="Enter text" name="current_location" value="<?php if(isset($value['current_location']) && $value['current_location'] != ''){echo $value['current_location']; } ?>" <?php if(isset($value['current_location']) && $value['current_location'] != ''){echo $value['current_location']; } ?>>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Current Session Ref: </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($value['current_session_ref']) && $value['current_session_ref'] != ''){echo $value['current_session_ref']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last Device Type: </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($value['last_device_type']) && $value['last_device_type'] != ''){echo $value['last_device_type']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last IP Address: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" disabled="" placeholder="Enter text" name="last_IP_address" value="<?php if(isset($value['last_ip_address']) && $value['last_ip_address'] != ''){echo $value['last_ip_address']; } ?>" <?php if(isset($value['last_ip_address']) && $value['last_ip_address'] != ''){echo $value['last_ip_address']; } ?>  >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last Device Ref: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " placeholder="Enter text" name="last_device_ref" disabled="" value="<?php if(isset($value['last_device_ref']) && $value['last_device_ref'] != ''){echo $value['last_device_ref']; } ?>" <?php if(isset($value['last_device_ref']) && $value['last_device_ref'] != ''){echo $value['last_device_ref']; } ?> >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-4 control-label">Last Accessed Time: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " placeholder="Enter text" name="last_accessed_time" disabled="" value="<?php if(isset($value['last_accessed_time']) && $value['last_accessed_time'] != ''){echo date('h:i:s ', $value['last_accessed_time']); } ?>">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($value['remarks_notes']) && $value['remarks_notes'] != ''){echo $value['remarks_notes']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <!--<button type="submit" class="btn green" id="app_profiles_submit_btn">Save</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php } ?>       
        <!-------------- EDIT APP PROFILE DETAILS ---------------------> 
        
        <?php foreach($profiles as $key => $value) { 
        $value = (array) $value;?>        
            <div id="responsive_edit_<?php echo $value['profile_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Edit APP Profile</h4>
                        </div>
                        <form action="<?php echo $base_url . 'app-profiles/details/' . base64_encode($value['profile_seq_no']); ?>" name="appprofilesedit_form" id="appprofilesedit_form_<?php echo $value['profile_seq_no']; ?>" method="post" class="appprofilesedit_form">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">   
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">User ID:</label>
                                                <div class="col-md-8">
                                                    <select name="user_id" id="user_id" class="form-control" disabled>
<!--                                                            <option value="<?php //if(isset($users_info['role_code']) && $users_info['role_code'] != ''){echo $users_info['role_code']; } ?>"><?php //echo $users_info['role_code']; ?></option>-->
                                                             <?php  foreach ($users as $key => $value1) { $value1 = (array) $value1;  ?>
                                                            <option value="<?php echo $value1['user_seq_no']; ?>" <?php if($value1['user_seq_no'] == $value['user_seq_no']){echo 'selected="selected"';} ?>><?php echo $value1['user_id']; ?></option>
                                                             <?php } ?>  
                                                        </select> 
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">User Name:</label>
                                                <div class="col-md-8">
                                                    <select name="user_id" id="user_id" class="form-control" disabled>
<!--                                                            <option value="<?php //if(isset($users_info['role_code']) && $users_info['role_code'] != ''){echo $users_info['role_code']; } ?>"><?php //echo $users_info['role_code']; ?></option>-->
                                                             <?php  foreach ($users as $key => $value1) { $value1 = (array) $value1;  ?>
                                                            <option value="<?php echo $value1['user_seq_no']; ?>" <?php if($value1['user_seq_no'] == $value['user_seq_no']){echo 'selected="selected"';} ?>><?php echo $value1['user_last_name'] . ',' . '&nbsp' . $value1['user_first_name']?></option>
                                                             <?php } ?>  
                                                        </select> 
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Base Location:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " placeholder="Enter text" disabled="" name="base_location" value="<?php if(isset($value['base_location']) && $value['base_location'] != ''){echo $value['base_location']; } ?>" <?php if(isset($value['base_location']) && $value['base_location'] != ''){echo $value['base_location']; } ?> >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Base Session Ref: </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($value['base_session_ref']) && $value['base_session_ref'] != ''){echo $value['base_session_ref']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Current Location: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" disabled="" placeholder="Enter text" name="current_location" value="<?php if(isset($value['current_location']) && $value['current_location'] != ''){echo $value['current_location']; } ?>" <?php if(isset($value['current_location']) && $value['current_location'] != ''){echo $value['current_location']; } ?>>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Current Session Ref: </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($value['current_session_ref']) && $value['current_session_ref'] != ''){echo $value['current_session_ref']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last Device Type: </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($value['last_device_type']) && $value['last_device_type'] != ''){echo $value['last_device_type']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last IP Address: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" disabled="" placeholder="Enter text" name="last_IP_address" value="<?php if(isset($value['last_ip_address']) && $value['last_ip_address'] != ''){echo $value['last_ip_address']; } ?>" <?php if(isset($value['last_ip_address']) && $value['last_ip_address'] != ''){echo $value['last_ip_address']; } ?>  >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last Device Ref: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " placeholder="Enter text" name="last_device_ref" disabled="" value="<?php if(isset($value['last_device_ref']) && $value['last_device_ref'] != ''){echo $value['last_device_ref']; } ?>" <?php if(isset($value['last_device_ref']) && $value['last_device_ref'] != ''){echo $value['last_device_ref']; } ?> >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-4 control-label">Last Accessed Time: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " placeholder="Enter text" name="last_accessed_time" disabled="" value="<?php if(isset($value['last_accessed_time']) && $value['last_accessed_time'] != ''){echo date('h:i:s ', $value['last_accessed_time']); } ?>">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" required rows="3" placeholder="remarks" id="remarks" name="remarks"><?php if(isset($value['remarks_notes']) && $value['remarks_notes'] != ''){echo $value['remarks_notes']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" name="app_profiles_submit_btn" class="btn green" id="app_profiles_submit_btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php } ?>       
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                <span class="badge badge-success">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-speech"></i> Activities </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-settings"></i> Settings </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                <h3 class="list-heading">Staff</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">8</span>
                                        </div>
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar3.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar1.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar4.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar2.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ella Wong</h4>
                                            <div class="media-heading-sub"> CEO </div>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="list-heading">Customers</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">2</span>
                                        </div>
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar6.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lara Kunis</h4>
                                            <div class="media-heading-sub"> CEO, Loop Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="label label-sm label-success">new</span>
                                        </div>
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar7.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar8.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lisa Stone</h4>
                                            <div class="media-heading-sub"> CTO, Keort Inc </div>
                                            <div class="media-heading-small"> Last seen 13:10 PM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">7</span>
                                        </div>
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar9.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar10.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="{{URL::asset('assets/layouts/layout/img/avatar11.jpg')}}" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Maria Gomez</h4>
                                            <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="page-quick-sidebar-item">
                                <div class="page-quick-sidebar-chat-user">
                                    <div class="page-quick-sidebar-nav">
                                        <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                            <i class="icon-arrow-left"></i>Back</a>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar3.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar2.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar3.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar2.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar3.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar2.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar3.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar2.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="{{URL::asset('assets/layouts/layout/img/avatar3.jpg')}}" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn green">
                                                    <i class="icon-paper-clip"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                            <div class="page-quick-sidebar-alerts-list">
                                <h3 class="list-heading">General</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-warning"> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="list-heading">System</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                            <div class="page-quick-sidebar-settings-list">
                                <h3 class="list-heading">General Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Enable Notifications
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Allow Tracking
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Log Errors
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Auto Sumbit Issues
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Enable SMS Alerts
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <h3 class="list-heading">System Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Security Level
                                        <select class="form-control input-inline input-sm input-small">
                                            <option value="1">Normal</option>
                                            <option value="2" selected>Medium</option>
                                            <option value="e">High</option>
                                        </select>
                                    </li>
                                    <li> Failed Email Attempts
                                        <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                    <li> Secondary SMTP Port
                                        <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                    <li> Notify On System Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Notify On SMTP Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <div class="inner-content">
                                    <button class="btn btn-success">
                                        <i class="icon-settings"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <?php echo $footer_link; ?>
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

.btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {
    position: absolute;
    top: -7px;
    right: 10px !important;
    left: auto;
    display: inline-block !important;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #fff;
    border-left: 7px solid transparent;
    content: '';
}

.btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {
    position: absolute;
    top: -8px;
    right: 7px;
    left:auto;
    display: inline-block !important;
    border-right: 8px solid transparent;
    border-bottom: 8px solid #e0e0e0;
    border-left: 8px solid transparent;
    content: '';
}
            
        </style>
        
        <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/validate/app_profiles_add.js"></script>
         <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/profile_user_name.js"></script>
    </body>

</html>  
