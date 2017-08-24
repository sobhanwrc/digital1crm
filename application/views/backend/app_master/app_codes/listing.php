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
                                <a href="#">App Codes</a>
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
                                        <span class="caption-subject bold uppercase">App Codes List</span>
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
                                        <div class="row" id="message">
                                            <div class="col-md-12">
                                                <?php
                                                $srvr_msg = $this->session->flashdata('server_message');
                                                if (isset($srvr_msg)) {
                                                    echo $srvr_msg;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style=" padding-left: 0">
                                                <div class="btn-group">
                                                   <?php if($role_code == 'SITEADM' ){ ?>
                                                    <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
                                                   <?php } ?>
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
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL # </th>
                                                <th> Category </th>
                                                <th> Code </th>
                                                <th> Short Description </th>
                                                <th> Long Description </th>
                                                <th> Firm Customization </th>
                                                <th> Full Visibility </th>
                                                <th> Paid Subscription </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php // t($codes); exit; 
                                                $i = 1;
                                                foreach ($codes as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $value['category_type'] ?> </td>
                                                    <td> <?php echo $value['code'] ?> </td>
                                                    <td> <?php echo $value['short_description'] ?>  </td>
                                                    <td> <?php echo $value['long_description'] ?>  </td>
                                                    <td> <?php
                                                        if ($value['firm_customization'] == 1) {
                                                            echo 'Yes';
                                                        } else {
                                                            echo 'No';
                                                        }
                                                        ?>  </td>
                                                    <td> <?php
                                                        if ($value['full_visibility'] == 1) {
                                                            echo 'Yes';
                                                        } else {
                                                            echo 'No';
                                                        }
                                                        ?>  </td>
                                                    <td> <?php
                                                        if ($value['paid_subscription'] == 1) {
                                                            echo 'Yes';
                                                        } else {
                                                            echo 'No';
                                                        }
                                                        ?>  </td>
                                                                            <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="#responsive_<?php echo $value['code_seq_no']; ?>"  data-toggle="modal">
                                                                    <i class="icon-docs"></i> View </a>
                                                            </li>
                                                            <li>
                                                                <a href="#responsive_edit_<?php echo $value['code_seq_no']; ?>"  data-toggle="modal">
                                                                    <i class="icon-tag"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="icon-tag"></i> Delete </a>
                                                            </li>
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
            
            <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New App Code</h4>
                        </div>
                        <form  name="app_codes_form" id="app_codes_form" autocomplete="off" action="<?php echo $base_url; ?>app_codes/add" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Category:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="category">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($code_category as $key => $value) { ?>
                                                            <option value="<?php echo $value['category_name']; ?>"><?php echo $value['category_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Code:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Short Description:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="short_description"  class="form-control" placeholder="Enter Short Description">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Long Description:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="long_description" class="form-control " placeholder="Enter Long Description">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Firm Customization:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm_customization">
                                                        <option value="">Select One</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Full Visibility:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control"  name="full_visibility">
                                                        <option value="">Select One</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Paid Subscription:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control"  name="paid_subscription">
                                                        <option value="">Select One</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" placeholder="Enter Remarks"></textarea>
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
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <input type="submit" class="btn green" id="app_codes_submit" name="app_codes_submit" value="Save" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-------------------------- VIEW APP CODES ------------------------>
            <?php foreach ($codes as $key => $value) { ?>
                <div id="responsive_<?php echo $value['code_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">View App Codes</h4>
                            </div>
                            
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label class="col-md-4 control-label">Category</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " disabled placeholder="Long description" name="long_description" disabled value="<?php if(isset($value['category_type']) && $value['category_type'] != ''){echo $value['category_type']; } ?>" <?php if(isset($value['category_type']) && $value['category_type'] != ''){echo $value['category_type']; } ?>>
                                                        <span class="help-block">  </span>
                                                    </div>
                                      
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Code</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " disabled placeholder="Long description" name="long_description" disabled value="<?php if(isset($value['code']) && $value['code'] != ''){echo $value['code']; } ?>" <?php if(isset($value['code']) && $value['code'] != ''){echo $value['code']; } ?>>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Short Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" disabled="" placeholder="Short description"  name="short_description" value="<?php if(isset($value['short_description']) && $value['short_description'] != ''){echo $value['short_description']; } ?>" <?php if(isset($value['short_description']) && $value['short_description'] != ''){echo $value['short_description']; } ?>>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Long Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " disabled placeholder="Long description" name="long_description" value="<?php if(isset($value['long_description']) && $value['long_description'] != ''){echo $value['long_description']; } ?>" <?php if(isset($value['long_description']) && $value['long_description'] != ''){echo $value['long_description']; } ?>>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Firm Customization</label>
                                                    <div class="col-md-8">
                                                       <input type="text" class="form-control " disabled placeholder="Long description" name="firm_customization" value="<?php if(isset($value['firm_customization']) && $value['firm_customization'] == '1'){echo "Yes";} else { echo "No";} ?>">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Full Visibility</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " disabled placeholder="Long description" name="full_visibility" value="<?php if(isset($value['full_visibility']) && $value['full_visibility'] == '1'){echo "Yes";} else { echo "No";} ?>">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Paid Subscription</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " disabled placeholder="Long description" name="paid_subscription" value="<?php if(isset($value['paid_subscription']) && $value['paid_subscription'] == '1'){echo "Yes";} else { echo "No";} ?>">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" disabled="" placeholder="Remarks or comments" name="remarks"><?php if(isset($value['remarks_notes']) && $value['remarks_notes'] != ''){echo $value['remarks_notes']; } ?></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <!-- <button type="submit" class="btn green section_group_edit_button" id="firmcodeadd_submit_btn">Save</button> -->
                                </div>
                        </div>
                    </div>
                </div>
                </div>
               <?php } ?>
            
            <!-------------------------- EDIT APP CODES ------------------------>
            <?php foreach ($codes as $key => $value) { ?>
                <div id="responsive_edit_<?php echo $value['code_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit App Codes</h4>
                            </div>
                            <form action="<?php echo $base_url . 'app-codes/details/' . base64_encode($value['code_seq_no']); ?>" autocomplete="off" name="app_codes_edit_form" id="app_codes_edit_form_<?php echo $value['code_seq_no']; ?>" method="post" class="section_edit_form">
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                <label class="col-md-4 control-label">Category:</label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($value['category_type']) && $value['category_type'] != ''){echo $value['category_type']; } ?>" <?php if(isset($value['category_type']) && $value['category_type'] != ''){echo $value['category_type']; } ?>>
                                                        <span class="help-block">  </span>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Code</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " disabled placeholder="Long description" name="code" disabled value="<?php if(isset($value['code']) && $value['code'] != ''){echo $value['code']; } ?>" <?php if(isset($value['code']) && $value['code'] != ''){echo $value['code']; } ?>>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Short Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Short description"  name="short_description" id="short_description" value="<?php if(isset($value['short_description']) && $value['short_description'] != ''){echo $value['short_description']; } ?>" <?php if(isset($value['short_description']) && $value['short_description'] != ''){echo $value['short_description']; } ?>>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Long Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " placeholder="Long description" name="long_description" id="long_description" value="<?php if(isset($value['long_description']) && $value['long_description'] != ''){echo $value['long_description']; } ?>" <?php if(isset($value['long_description']) && $value['long_description'] != ''){echo $value['long_description']; } ?>>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-4 control-label">Firm Customization</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="firm_customization" id="firm_customization" disabled="disabled" read-only="read-only">
<!--                                                        <option value="<?php //if ($value['firm_customization'] == '1') {echo "Yes";} else{ echo "No";}?>"></option>-->
                                                        <option value="1" <?php echo $value['firm_customization'] == '1' ? ' selected="selected"' : '';?>>Yes</option>
                                                        <option value="0" <?php echo $value['firm_customization'] == '0' ? ' selected="selected"' : '';?>>No</option>
                                                        
                                                    </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class="col-md-4 control-label">Full Visibility</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="full_visibility" id="full_visibility" disabled="disabled" read-only="read-only">
<!--                                                        <option value="<?php //if ($value['full_visibility'] == '1') {echo "Yes";} else{ echo "No";}?>"></option>-->
                                                        <option value="1" <?php echo $value['full_visibility'] == '1' ? ' selected="selected"' : '';?>>Yes</option>
                                                        <option value="0" <?php echo $value['full_visibility'] == '0' ? ' selected="selected"' : '';?>>No</option>
                                                        
                                                    </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class="col-md-4 control-label">Paid Subscription</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="paid_subscription" id="paid_subscription" disabled="disabled" read-only="read-only">
<!--                                                        <option value="<?php //if ($value['paid_subscription'] == '1') {echo "Yes";} else{ echo "No";}?>"></option>-->
                                                        <option value="1" <?php echo $value['paid_subscription'] == '1' ? ' selected="selected"' : '';?>>Yes</option>
                                                        <option value="0" <?php echo $value['paid_subscription'] == '0' ? ' selected="selected"' : '';?>>No</option>
                                                        
                                                    </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Remarks or comments" name="remarks" id="remarks"><?php if(isset($value['remarks_notes']) && $value['remarks_notes'] != ''){echo $value['remarks_notes']; } ?></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="submit" class="btn green section_group_edit_button" name="app_codes_edit_submit_btn" id="app_codes_edit_submit_btn" onclick="fn_frm_submit('<?php echo $value['code_seq_no']; ?>')">Save</button>
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
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar2.jpg" alt="...">
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
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar6.jpg" alt="...">
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
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar8.jpg" alt="...">
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
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="<?php echo $assets_path ?>layouts/layout/img/avatar11.jpg" alt="...">
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
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path ?>layouts/layout/img/avatar3.jpg" />
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
                                        <i class="icon-settings"></i> Save Changes
                                    </button>
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
    .form-group.required .control-label:after {
                content:"*";
                color:red;
              }
        
    </style>
   <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/app_codes_add.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
     <script>
            function fn_frm_submit(id)
            {
                $('#app_codes_edit_form' + id).submit();
            }
        </script>
</html>  