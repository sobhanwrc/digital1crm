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
                                <a href="#"> UI Lists and Security </a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span></span>
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
                                        <span class="caption-subject bold uppercase">UI Lists and Security</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1"><a style=" color:#fff; text-decoration: none;" href="" onclick="history.back()">Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form role="form" id="ui_list_edit_form" autocomplete="off" method="post" name="ui_list_edit_form" action="<?php echo $base_url . 'ui-lists-security/edit/' . base64_encode($list_info['ui_seq_no']); ?>">
                                                    <input type="hidden" name="list_tab" value="yes">
                                                    <div class="modal-body">
                                                        <!--<div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?php
                                                                $err = $this->session->flashdata('suc_message');
                                                                if (isset($err) && $err != '') {
                                                                    ?>
                                                                    <div class="alert alert-success" id="general_msg_success" >
                                                                        <strong>Success!</strong> <?php echo $err; ?>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php
                                                                $err = $this->session->flashdata('err_message');
                                                                if (isset($err) && $err != '') {
                                                                    ?>
                                                                    <div class="alert alert-danger" id="general_msg_success" >
                                                                        <strong>Error!</strong> <?php echo $err; ?>
                                                                    </div>
                                                                <?php } ?>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Interface ID:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text"  name="user_interface_id" class="form-control" placeholder="Enter text" value="<?php
                                                                        if (isset($list_info['user_interface_id']) && $list_info['user_interface_id'] != '') {
                                                                            echo $list_info['user_interface_id'];
                                                                        }
                                                                        ?>" <?php
                                                                               if (isset($list_info['user_interface_id']) && $list_info['user_interface_id'] != '') {
                                                                                   echo $list_info['user_interface_id'];
                                                                               }
                                                                               ?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Interface Type:</label>
                                                                    <div class="col-md-8">
                                                                        <select name="ui_type" id="ui_type" class="form-control" disabled>
<!--                                                            <option value="<?php //if(isset($users_info['role_code']) && $users_info['role_code'] != ''){echo $users_info['role_code']; }  ?>"><?php //echo $users_info['role_code'];  ?></option>-->
                                                                            <?php
                                                                            foreach ($codes['Ui Type'] as $key => $value) {
                                                                                
                                                                                ?>
                                                                                <option value="<?php echo $value['code']; ?>" <?php
                                                                                        if ($value['code'] == $list_info['user_interface_type']) {
                                                                                            echo 'selected="selected"';
                                                                                        }
                                                                                        ?>><?php echo $value['short_description']; ?></option>
<?php } ?>  
                                                                        </select> 
                                                                        <span class="help-block"> </span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Interface Name:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text"  name="user_interface_name" class="form-control" placeholder="Enter text" value="<?php
                                                                               if (isset($list_info['user_interface_name']) && $list_info['user_interface_name'] != '') {
                                                                                   echo $list_info['user_interface_name'];
                                                                               }
                                                                               ?>" <?php
                                                                               if (isset($list_info['user_interface_name']) && $list_info['user_interface_name'] != '') {
                                                                                   echo $list_info['user_interface_name'];
                                                                               }
                                                                               ?> disabled>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">UI Descriptions:</label>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control" name="UI_descriptions" placeholder="Enter text" disabled><?php
                                                                            if (isset($list_info['ui_description']) && $list_info['ui_description'] != '') {
                                                                                echo $list_info['ui_description'];
                                                                            }
                                                                            ?></textarea>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Remark/Comments:</label>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter text"><?php
                                                                            if (isset($list_info['remarks_notes']) && $list_info['remarks_notes'] != '') {
                                                                                echo $list_info['remarks_notes'];
                                                                            }
                                                                            ?></textarea>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="margiv-top-10">
                                                   <button type="submit" id="ui_list_edit_submit" class="btn green" name="ui_list_edit_save_changes">Save</button>
                                                   <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                </div>
        
                                      </div>
                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style=" padding-left: 0">
                                                <div class="btn-group">
                                                    <a href="#responsive_user" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add User
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <span class="help-block">  </span>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <a href="#responsive_role" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add Role
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <span class="help-block">  </span>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <a href="#responsive_group" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add Group
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <span class="help-block">  </span>
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    

                                    <div id="responsive_user" class="modal fade" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Add User</h4>
                                                </div>
                                                <form  name="acl_user_form" autocomplete="off" id="acl_user_form" action="<?php echo $base_url . 'ui-lists-security/user_add/' . base64_encode($list_info['ui_seq_no']); ?>" method="post">
<!--                                                  <input type="hidden" name="user_tab" value="yes">  -->
                                                    <input type="hidden" name="ui_seq_no" value="<?php echo $list_info['ui_seq_no']; ?>">  
                                                    <div class="modal-body">
                                                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group required">
                                                                        <label class="col-md-4 control-label">User:</label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control"  name="user">
                                                                                <option value="">Select One</option>
                                                                                <?php //t($user); exit;   ?>
                                                                                <?php
                                                                                foreach ($users as $key => $value) {
                                                                                    $value = (array) $value;
                                                                                    ?>
                                                                                    <option value="<?php echo $value['user_seq_no']; ?>"><?php echo $value['user_id']; ?></option>
<?php } ?>
                                                                            </select>
                                                                            <span class="help-block"> </span>
                                                                        </div>
                                                                    </div>
                                                                    <!--                                                                    <div class="form-group">
                                                                                                                                            <label class="col-md-4 control-label"> Name: </label>
                                                                                                                                            <div class="col-md-8">
                                                                                                                                                <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                                                                                <span class="help-block">  </span>
                                                                                                                                            </div>
                                                                                                                                        </div>-->
                                                                    <div class="form-group required">
                                                                        <label class="col-md-4 control-label">Access Control:</label>
                                                                        <div class="col-md-8">
                                                                            <input type="hidden" name="checkbox" id="checkbox"/>
                                                                            <input type="checkbox" name="read[]" value="read" class="acl">Read</br>
                                                                            <input type="checkbox" name="write[]" value="write" class="acl">Write</br>
                                                                            <input type="checkbox" name="execute[]" value="execute" class="acl">Execute
                                                                            <span class="help-block">  </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Remarks/Notes</label>
                                                                        <div class="col-md-8">
                                                                            <textarea class="form-control" name="remarks" placeholder="Enter text"></textarea>
                                                                            <span class="help-block">  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                        <button type="submit" id="acl_user_submit" class="btn green" name="acl_user_submit" return="onSubmit">Save</button>
                                                    </div>
                                                </form>

                                                <!--                                                <div class="modal-footer">
                                                                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                                                                    <button type="button" class="btn green">Save</button>
                                                                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div id="responsive_role" class="modal fade" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Add Role</h4>
                                                </div>
                                                <form  name="acl_role_form" id="acl_role_form" autocomplete="off" action="<?php echo $base_url . 'ui-lists-security/role_add/' . base64_encode($list_info['ui_seq_no']); ?>" method="post">
                                                    <input type="hidden" name="ui_seq_no" value="<?php echo $list_info['ui_seq_no']; ?>">  
                                                    <div class="modal-body">
                                                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group required">
                                                                        <label class="col-md-4 control-label">Role:</label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control"  name="role_code">
                                                                                <option value="">Select One</option>
                                                                                <?php //  t($roles_1); exit;    ?>
                                                                                <?php
                                                                                foreach ($codes['Roles'] as $key => $value) {
                                                                                    ?>
                                                                                    <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <span class="help-block"> </span>
                                                                        </div>
                                                                    </div>
                                                                    <!--                                                                    <div class="form-group">
                                                                                                                                            <label class="col-md-4 control-label"> Name: </label>
                                                                                                                                            <div class="col-md-8">
                                                                                                                                                <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                                                                                <span class="help-block">  </span>
                                                                                                                                            </div>
                                                                                                                                        </div>-->
                                                                    <div class="form-group required">
                                                                        <label class="col-md-4 control-label">Access Control:</label>
                                                                        <div class="col-md-8">
                                                                            <input type="checkbox" name="read[]" value="read" class="acl">Read</br>
                                                                            <input type="checkbox" name="write[]" value="write" class="acl">Write</br>
                                                                            <input type="checkbox" name="execute[]" value="execute" class="acl">Execute
                                                                            <span class="help-block">  </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Remarks/Notes</label>
                                                                        <div class="col-md-8">
                                                                            <textarea class="form-control" name="remarks" placeholder="Enter text"></textarea>
                                                                            <span class="help-block">  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                        <button type="submit" id="acl_role_submit" class="btn green" name="acl_role_submit">Save</button>
                                                    </div>
                                                </form>

                                                <!--                                                <div class="modal-footer">
                                                                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                                                                    <button type="button" class="btn green">Save</button>
                                                                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div id="responsive_group" class="modal fade" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Add Group</h4>
                                                </div>
                                                <form  name="acl_group_form" id="acl_group_form" autocomplete="off" action="<?php echo $base_url . 'ui-lists-security/group_add/' . base64_encode($list_info['ui_seq_no']); ?>" method="post">
                                                    <input type="hidden" name="ui_seq_no" value="<?php echo $list_info['ui_seq_no']; ?>">  
                                                    <div class="modal-body">
                                                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group required">
                                                                        <label class="col-md-4 control-label">Group:</label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control"  name="group_code">
                                                                                <option value="">Select One</option>
                                                                                <?php
                                                                                foreach ($codes['Groups'] as $key => $value) {
                                                                                    ?>
                                                                                    <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <span class="help-block"> </span>
                                                                        </div>
                                                                    </div>
                                                                    <!--                                                                    <div class="form-group">
                                                                                                                                            <label class="col-md-4 control-label"> Name: </label>
                                                                                                                                            <div class="col-md-8">
                                                                                                                                                <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                                                                                <span class="help-block">  </span>
                                                                                                                                            </div>
                                                                                                                                        </div>-->
                                                                    <div class="form-group required">
                                                                        <label class="col-md-4 control-label">Access Control:</label>
                                                                        <div class="col-md-8">
                                                                            <input type="checkbox" name="read[]" value="read" class="acl">Read</br>
                                                                            <input type="checkbox" name="write[]" value="write" class="acl">Write</br>
                                                                            <input type="checkbox" name="execute[]" value="execute"class="acl">Execute
                                                                            <span class="help-block">  </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Remarks/Notes</label>
                                                                        <div class="col-md-8">
                                                                            <textarea class="form-control" name="remarks" placeholder="Enter text"></textarea>
                                                                            <span class="help-block">  </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                        <button type="submit" id="acl_group_submit" class="btn green" name="acl_group_submit">Save</button>
                                                    </div>
                                                </form>

                                                <!--                                                <div class="modal-footer">
                                                                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                                                                    <button type="button" class="btn green">Save</button>
                                                                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div style=" width: 100%; display: block">
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL </th>
                                                <th>User/Role/Group</th>
                                                <th> Read </th>
                                                <th> Write </th>
                                                <th> Execute </th>
                                                <th> Remarks </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- DISPLAY USER-->
                                            <?php
                                            $i = 1;
                                            foreach ($user as $key => $value) {

                                                $value = (array) $value;
                                                //  t($value); exit;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?> </td>
                                                    <td>User - <?php echo $value['user_first_name'] . ' ' . $value['user_last_name']?></td>
                                                    <td><input type="checkbox" name="read[]" value="1" <?php if ($value['acl_read'] == '1') {echo 'checked="checked"';}?>></td>
                                                    <td><input type="checkbox" name="write[]" value="1" <?php if ($value['acl_write'] == '1') { echo 'checked="checked"'; } ?>></td>
                                                    <td><input type="checkbox" name="execute[]" value="1" <?php if ($value['acl_execute'] == '1') { echo 'checked="checked"'; } ?>></td>
                                                    <td><div class="form-group">
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" name="remarks" placeholder="Enter text"><?php echo $value['remarks_notes'] ?></textarea>
                                                                <span class="help-block">  </span>
                                                            </div>
                                                        </div></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                 <li>
                                                                    <a href="#user_responsive_view_<?php echo $value['user_ui_acl_seq_no']; ?>" data-toggle="modal" >
                                                                         <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#user_responsive_edit_<?php echo $value['user_ui_acl_seq_no']; ?>" data-toggle="modal" >
                                                                        <i class="icon-tag"></i> Edit
                                                                    </a>
                                                                </li>
                                                                 <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-tag"></i> Delete </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
<?php } ?>

                                            <!-- DISPLAY ROLE-->

                                                    <?php
                                                    $i = 1;
//                                                    t($role); exit;
                                                    foreach ($role as $key => $value) {
                                                        $value = (array) $value;
//                                                        t($value); exit;
                                                        ?>
                                                <tr>
                                                    <td><?php echo $i++; ?> </td>
                                                    <td>Role - <?php echo $value['short_description'] ?></td>
                                                    <td><input type="checkbox" name="read[]" value="1" <?php if ($value['acl_read'] == '1') { echo 'checked="checked"';}?>></td>
                                                    <td><input type="checkbox" name="write[]" value="1" <?php if ($value['acl_write'] == '1') { echo 'checked="checked"';}?>></td>
                                                    <td><input type="checkbox" name="execute[]" value="1" <?php if ($value['acl_execute'] == '1') { echo 'checked="checked"'; }?>></td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" name="remarks" placeholder="Enter text"><?php echo $value['remarks_notes'] ?></textarea>
                                                                <span class="help-block">  </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                        <a href="#role_responsive_view_<?php echo $value['role_ui_acl_seq_no']; ?>" data-toggle="modal" >
                                                                           <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#role_responsive_edit_<?php echo $value['role_ui_acl_seq_no']; ?>" data-toggle="modal" >
                                                                        <i class="icon-tag"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-tag"></i> Delete </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                           <?php } ?>


                                            <!--DISPLAY GROUP-->

                                                <?php
                                                $i = 1;
                                                foreach ($group as $key => $value) {
                                                     $value = (array) $value;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?> </td>
                                                    <td>Group - <?php echo $value['short_description'] ?></td>
                                                    <td><input type="checkbox" name="read[]" value="1" <?php  if ($value['acl_read'] == '1') {echo 'checked="checked"';}?>></td>
                                                    <td><input type="checkbox" name="write[]" value="1" <?php if ($value['acl_write'] == '1') {echo 'checked="checked"';}?>></td>
                                                    <td><input type="checkbox" name="execute[]" value="1" <?php if ($value['acl_execute'] == '1') {echo 'checked="checked"';}?>></td>
                                                    <td><div class="form-group">
                                                            <div class="col-md-8">
                                                            <textarea class="form-control" name="remarks" placeholder="Enter text"><?php echo $value['remarks_notes'] ?></textarea>
                                                            <span class="help-block">  </span>
                                                            </div>
                                                        </div></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                        <a href="#group_responsive_view_<?php echo $value['group_ui_acl_seq_no'] ?>" data-toggle="modal" >
                                                                            <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#group_responsive_edit_<?php echo $value['group_ui_acl_seq_no'] ?>" data-toggle="modal" >
                                                                        <i class="icon-tag"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                     <a href="javascript:;">
                                                                        <i class="icon-tag"></i> Delete </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
<?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                </div>
                                </div>

                        
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

    <!--EDIT USER FORM-->
    <?php
    foreach ($user as $key => $value) {
    $value = (array) $value;
    ?>
        <div id="user_responsive_edit_<?php echo $value['user_ui_acl_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Security Privileges - User</h4>
                    </div>
                    <form  name="edit_user_form" autocomplete="off" id="edit_user_form_<?php $value['user_ui_acl_seq_no']; ?>" action="<?php echo $base_url . 'ui-lists-security/edit_user/' . base64_encode($value['user_ui_acl_seq_no']); ?>" class="user_checkbox_validate" method="post">
                        <div class="modal-body">
                            <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="col-md-4 control-label">User/Role/group:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="edit_user" disabled>
                                                    <?php
                                                    foreach ($users as $key1 => $value1) {
                                                        $value = (array) $value;
                                                        ?>
                                                        <option value="<?php echo $value1['user_id']; ?>" <?php
                                                        if ($value1['user_seq_no'] == $value['user_seq_no']) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>>
                                                        <?php echo $value1['user_id']; ?>
                                                        </option>
                                                    <?php } ?>  
                                                </select>
                                                <span class="help-block"> </span>
                                            </div>
                                            </div>
                                            <!--                                        <div class="form-group">
                                                                                        <label class="col-md-4 control-label"> Name: </label>
                                                                                        <div class="col-md-8">
                                                                                            <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                            <span class="help-block">  </span>
                                                                                        </div>
                                                                                    </div>-->
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Access control:</label>
                                                <div class="col-md-8">
                                                    <input class="access_checkbox" type="checkbox" name="read[]"  value="1" <?php
                                                if ($value['acl_read'] == '1') {
                                                    echo 'checked="checked"';
                                                }
                                                ?>>Read</br>
                                                    <input class="access_checkbox"  type="checkbox" name="write[]"  value="1" <?php
                                                if ($value['acl_write'] == '1') {
                                                    echo 'checked="checked"';
                                                }
                                                ?>>Write</br>
                                                    <input class="access_checkbox"  type="checkbox" name="execute[]"  value="1" <?php
                                                if ($value['acl_execute'] == '1') {
                                                    echo 'checked="checked"';
                                                }
                                                ?>>Execute
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remarks/Notes</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" placeholder="Enter text"><?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {echo $value['remarks_notes'];}?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" id="user_security_privilege_submit_<?php $value['user_ui_acl_seq_no']; ?>" class="btn green form_button" name="user_security_privilege_submit">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>  
                                            <?php } ?>
    
    <!--VIEW USER FORM-->

    <?php foreach ($user as $key => $value) {
    $value = (array) $value;
    ?>
        <div id="user_responsive_view_<?php echo $value['user_ui_acl_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">View Security Privileges - User</h4>
                    </div>
                    <form  name="edit_user_form" id="edit_user_form_<?php $value['user_ui_acl_seq_no']; ?>" action="<?php echo $base_url . 'ui-lists-security/edit_user/' . base64_encode($value['user_ui_acl_seq_no']); ?>" class="user_checkbox_validate" method="post">
                        <div class="modal-body">
                            <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">User/Role/group:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="edit_user" disabled>
                                                    <?php
                                                    foreach ($users as $key1 => $value1) {
                                                        $value = (array) $value;
                                                        ?>
                                                        <option value="<?php echo $value1['user_id']; ?>" <?php
                                                        if ($value1['user_seq_no'] == $value['user_seq_no']) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>>
                                                        <?php echo $value1['user_id']; ?>
                                                        </option>
                                                    <?php } ?>  
                                                </select>
                                                <span class="help-block"> </span>
                                            </div>
                                            <!--                                        <div class="form-group">
                                                                                        <label class="col-md-4 control-label"> Name: </label>
                                                                                        <div class="col-md-8">
                                                                                            <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                            <span class="help-block">  </span>
                                                                                        </div>
                                                                                    </div>-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Access control:</label>
                                                <div class="col-md-8">
                                                    <input class="access_checkbox" disabled type="checkbox" name="read[]"  value="1" <?php
                                                if ($value['acl_read'] == '1') {
                                                    echo 'checked="checked"';
                                                }
                                                ?>>Read</br>
                                                    <input class="access_checkbox" disabled type="checkbox" name="write[]"  value="1" <?php
                                                if ($value['acl_write'] == '1') {
                                                    echo 'checked="checked"';
                                                }
                                                ?>>Write</br>
                                                    <input class="access_checkbox" disabled type="checkbox" name="execute[]"  value="1" <?php
                                                if ($value['acl_execute'] == '1') {
                                                    echo 'checked="checked"';
                                                }
                                                ?>>Execute
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remarks/Notes</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" disabled name="remarks" placeholder="Enter text"><?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {echo $value['remarks_notes'];}?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
<!--                                <button type="submit" id="user_security_privilege_submit_<?php $value['user_ui_acl_seq_no']; ?>" class="btn green form_button" name="user_security_privilege_submit">Save</button>-->
                            </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>  
<?php } ?>

<!-- EDIT ROLE FORM -->
<?php foreach ($role as $key => $value) {
    $value = (array) $value;
//        t($value); exit;
    ?>
    <div id="role_responsive_edit_<?php echo $value['role_ui_acl_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Security Privileges - Role</h4>
                </div>
                <form  name="edit_role_form" id="edit_role_form_<?php echo $value['role_ui_acl_seq_no']; ?>" action="<?php echo $base_url . 'ui-lists-security/edit_role/' . base64_encode($value['role_ui_acl_seq_no']); ?>" class="checkbox_validate" method="post">
                    <div class="modal-body">
                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-md-4 control-label">User/Role/group:</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="edit_role" disabled>
                                                <?php
                                                       foreach ($codes['Roles'] as $key1 => $value1) {
                                                           ?>
                                                    <option value="<?php echo $value1['code']; ?>" <?php
                                                           if ($value1['code'] == $value['user_role_code']) {
                                                               echo 'selected="selected"'; } ?>
                                                            ><?php echo $value1['short_description']; ?></option>
                                                <?php } ?>  
                                            </select>
                                            <span class="help-block"> </span>
                                        </div>
                                        </div>
                                        
                                        <!--                                        <div class="form-group">
                                                                                    <label class="col-md-4 control-label"> Name: </label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                        <span class="help-block">  </span>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Access control:</label>
                                            <div class="col-md-8">
                                                <input type="checkbox" name="read[]" id="read" value="1" <?php if ($value['acl_read'] == '1') {echo 'checked="checked"';}?>>Read</br>
                                                <input type="checkbox" name="write[]" id="read" value="1" <?php if ($value['acl_write'] == '1') {echo 'checked="checked"';}?>>Write</br>
                                                <input type="checkbox" name="execute[]" id="read" value="1" <?php  if ($value['acl_execute'] == '1') {echo 'checked="checked"';}?>>Execute
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Remarks/Notes</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="remarks" placeholder="Enter text"><?php
                                            if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') { echo $value['remarks_notes'];}?></textarea>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            <button type="submit" id="role_security_privilege_submit_<?php echo $value['role_ui_acl_seq_no']; ?>" class="btn green form_button" name="role_security_privilege_submit">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>     
    </div>
                                            <?php } ?>

<!-- VIEW ROLE FORM -->
<?php foreach ($role as $key => $value) {
    $value = (array) $value;
//        t($value); exit;
    ?>

    <div id="role_responsive_view_<?php echo $value['role_ui_acl_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">View Security Privileges - Role</h4>
                </div>
                <form  name="edit_role_form" id="edit_role_form_<?php echo $value['role_ui_acl_seq_no']; ?>" action="<?php echo $base_url . 'ui-lists-security/edit_role/' . base64_encode($value['role_ui_acl_seq_no']); ?>" class="checkbox_validate" method="post">
                    <div class="modal-body">
                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">User/Role/group:</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="edit_role" disabled>
                                                <?php
                                                       foreach ($codes['Roles'] as $key1 => $value1) {
//                                                            t($value1); exit;
                                                           ?>
                                                    <option value="<?php echo $value1['code']; ?>" <?php
                                                           if ($value1['code'] == $value['user_role_code']) {
                                                               echo 'selected="selected"'; } ?>><?php echo $value1['short_description']; ?></option>
                                                <?php } ?>  
                                            </select>
                                            <span class="help-block"> </span>
                                        </div>
                                        <!--                                        <div class="form-group">
                                                                                    <label class="col-md-4 control-label"> Name: </label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                        <span class="help-block">  </span>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Access control:</label>
                                            <div class="col-md-8">
                                                <input type="checkbox" disabled name="read[]" id="read" value="1" <?php if ($value['acl_read'] == '1') {echo 'checked="checked"';}?>>Read</br>
                                                <input type="checkbox" disabled="" name="write[]" id="read" value="1" <?php if ($value['acl_write'] == '1') {echo 'checked="checked"';}?>>Write</br>
                                                <input type="checkbox" disabled="" name="execute[]" id="read" value="1" <?php  if ($value['acl_execute'] == '1') {echo 'checked="checked"';}?>>Execute
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Remarks/Notes</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" disabled="" name="remarks" placeholder="Enter text" required><?php
                                            if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') { echo $value['remarks_notes'];}?></textarea>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
<!--                            <button type="submit" id="role_security_privilege_submit_<?php echo $value['role_ui_acl_seq_no']; ?>" class="btn green form_button" name="role_security_privilege_submit">Save</button>-->
                        </div>
                </form>
            </div>
        </div>
    </div>     
    </div>
                                            <?php } ?>

<!--EDIT GROUP FORM-->
<?php foreach ($group as $key => $value) {
    $value = (array) $value;
    ?>
    <div id="group_responsive_edit_<?php echo $value['group_ui_acl_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Security Privileges - Group</h4>
                </div>
                <form  name="edit_group_form" id="edit_group_form_<?php echo $value['group_ui_acl_seq_no']; ?>" action="<?php echo $base_url . 'ui-lists-security/edit_group/' . base64_encode($value['group_ui_acl_seq_no']); ?>" class="checkbox_validate" method="post">
                    <div class="modal-body">
                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-md-4 control-label">User/Role/group:</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="edit_group" disabled>
                                                <?php
                                                foreach ($codes['Groups'] as $key1 => $value1) {
//                                                    $value1 = (array) $value1;
//                                                            t($value1); exit;
                                                    ?>
                                                    <option value="<?php echo $value1['code']; ?>" <?php
                                                    if ($value1['code'] == $value['user_group_code']) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value1['short_description']; ?></option>
    <?php } ?>  
                                            </select>
                                            <span class="help-block"> </span>
                                        </div>
                                        </div>
                                        <!--                                        <div class="form-group">
                                                                                    <label class="col-md-4 control-label"> Name: </label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                        <span class="help-block">  </span>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="form-group required ">
                                            <label class="col-md-4 control-label">Access control:</label>
                                            <div class="col-md-8">
                                                <input type="checkbox" name="read[]" id="read" value="1" <?php if ($value['acl_read'] == '1') {echo 'checked="checked"';}?>>Read</br>
                                                <input type="checkbox" name="write[]" id="write" value="1" <?php if ($value['acl_write'] == '1') {echo 'checked="checked"';}?>>Write</br>
                                                <input type="checkbox" name="execute[]" id="execute" value="1" <?php if ($value['acl_execute'] == '1') {echo 'checked="checked"';}?>>Execute
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-4 control-label">Remarks/Notes</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="remarks" placeholder="Enter text"><?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {echo $value['remarks_notes'];}?></textarea>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            <button type="submit" id="group_security_privilege_submit" class="btn green form_button" name="group_security_privilege_submit">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>     

    </div>  
<?php } ?>

<!--VIEW GROUP FORM-->
<?php foreach ($group as $key => $value) {
    $value = (array) $value;
    ?>
    <div id="group_responsive_view_<?php echo $value['group_ui_acl_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">View Security Privileges - Group</h4>
                </div>
                <form  name="edit_group_form" id="edit_group_form_<?php echo $value['group_ui_acl_seq_no']; ?>" action="<?php echo $base_url . 'ui-lists-security/edit_group/' . base64_encode($value['group_ui_acl_seq_no']); ?>" class="checkbox_validate" method="post">
                    <div class="modal-body">
                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-md-4 control-label">User/Role/group:</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="edit_group" disabled>
                                                <?php
                                                foreach ($codes['Groups'] as $key1 => $value1) {
//                                                    $value1 = (array) $value1;
//                                                            t($value1); exit;
                                                    ?>
                                                    <option value="<?php echo $value1['user_id']; ?>" <?php
                                                    if ($value1['code'] == $value['user_group_code']) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value1['short_description']; ?></option>
    <?php } ?>  
                                            </select>
                                            <span class="help-block"> </span>
                                        </div>
                                        </div>
                                        <!--                                        <div class="form-group">
                                                                                    <label class="col-md-4 control-label"> Name: </label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control " placeholder="Enter text" name="name">
                                                                                        <span class="help-block">  </span>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="form-group ">
                                            <label class="col-md-4 control-label">Access control:</label>
                                            <div class="col-md-8">
                                                <input type="checkbox" disabled="" name="read[]" id="read" value="1" <?php if ($value['acl_read'] == '1') {echo 'checked="checked"';}?>>Read</br>
                                                <input type="checkbox" disabled="" name="write[]" id="write" value="1" <?php if ($value['acl_write'] == '1') {echo 'checked="checked"';}?>>Write</br>
                                                <input type="checkbox" disabled="" name="execute[]" id="execute" value="1" <?php if ($value['acl_execute'] == '1') {echo 'checked="checked"';}?>>Execute
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-4 control-label">Remarks/Notes</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" disabled="" name="remarks" placeholder="Enter text" required><?php if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {echo $value['remarks_notes'];}?></textarea>
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            <button type="submit" id="group_security_privilege_submit" class="btn green form_button" name="group_security_privilege_submit">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>     

    </div>  
<?php } ?>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php echo $footer; ?>
<!-- END FOOTER -->
<?php echo $footer_link; ?>
</body>
<style>
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
    .form-group.required .control-label:after {
                content:"*";
                color:red;
              }
</style>
<script src="<?php echo $assets_path; ?>custom/js/validate/ui_list_acl_add.js" type="text/javascript"></script>
<script src="<?php echo $assets_path; ?>custom/js/validate/ui_list_add.js" type="text/javascript"></script>
<script type="text/javascript">
function onSubmit()
{
    var fields = $("input[type='checkbox']").serializeArray();
    if (fields.length === 0)
    {
        alert('please select atleast one of the checkbox');
        // cancel submit
        return false;
    }

}
// register event on form, not submit button
$('#acl_user_form').submit(onSubmit)
</script>
<script type="text/javascript">
function onSubmit()
{
    var fields = $("input[type='checkbox']").serializeArray();
    if (fields.length === 0)
    {
        alert('please select atleast one of the checkbox');
        // cancel submit
        return false;
    }

}
// register event on form, not submit button
$('#acl_group_form').submit(onSubmit)
</script>
<script type="text/javascript">
function onSubmit()
{
    var fields = $("input[type='checkbox']").serializeArray();
    if (fields.length === 0)
    {
        alert('please select atleast one of the checkbox');
        // cancel submit
        return false;
    }

}
// register event on form, not submit button
$('#acl_role_form').submit(onSubmit)
</script>
<script type="text/javascript">
//$(".form_button").on("click",function(){
//    if (($("input[type='checkbox']:checked").length)<=0) {
//        alert("You must check at least 1 box");
//    }
//    return true;
//});
// register event on form, not submit button
//
//    $('.form_button').on('click', function () {
//        $(".user_checkbox_validate").find("checkbox").each(function () {
//             alert($(this).prop('checked'));
//            if ($(this).prop('checked') == true) {
//                //do something
//                alert('selected');
//                // cancel submit
//                return false;
////             $('.c').submit()
//                $(this).form.submit()
//            } else {
//                alert('please select atleast one of the checkbox');
//                // cancel submit
//                return false;
//            }
//            
//        });
//        if (($(".access_checkbox").prop('checked') === true))
//        {
//            alert('selected');
//            // cancel submit
//            return false;
////             $('.c').submit()
//            $(this).form.submit()
//        } else {
//            alert('please select atleast one of the checkbox');
//            // cancel submit
//            return false;
//        }
//    });

</script>

<script type="text/javascript">

    $('document').ready(function () {

        $('#meals').on('click', function () {
            var div = "<div class=\"row\"><div class=\"col-md-12\">\<div class=\"col-md-6\">\
                                    <div class=\"row\">\
                                        <div class=\"col-md-12\">\
                                            <p style=\"font-size:12px;\">\
                                                <select>\
                                                    <option>Food and Beverage</option>\
                                                    <option>Admission fees, tickets and venue fees</option>\
                                                    <option>Room rental - receptions and cocktail parties</option>\
                                                    <option>Gifts and take aways</option>\
                                                    <option>Labor and Support</option>\
                                                </select>\
                                            </p>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p style=\"font-size:12px;\">\
                                        <select>\
                                            <option>ME 1</option>\
                                            <option>ME 2</option>\
                                            <option>ME 3</option>\
                                            <option>ME 4</option>\
                                            <option>ME 5</option>\
                                        </select>\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                            </div></div>";
//                                                alert (div);
            $('.meals_div').append(div);
        });

        $('#travel').on('click', function () {
            var div = "<div class=\"row\"><div class=\"col-md-12\">\
                                <div class=\"col-md-6\">\
                                    <div class=\"row\">\
                                        <div class=\"col-md-12\">\
                                            <p style=\"font-size:12px;\">\
                                                <select>\
                                                    <option>Transportation</option>\
                                                    <option>Lodging</option>\
                                                    <option>Mileage</option>\
                                                    <option>Car rental</option>\
                                                    <option>Taxis and Uber</option>\
                                                    <option>Client transportation (limo's, buses, vans etc.)</option>\
                                                </select>\
                                            </p>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p style=\"font-size:12px;\">\
                                        <select>\
                                            <option>T 1</option>\
                                            <option> T 2</option>\
                                            <option>T 3</option>\
                                            <option>T 4</option>\
                                            <option>T 5</option>\
                                            <option>T 6</option>\
                                        </select>\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                            </div> </div>";
//                                                alert (div);
            $('.travel_div').append(div);
        });
    });
</script>
</html>  