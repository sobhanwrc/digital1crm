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
                                <a href="#">Practice area survey</a>
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
                                        <span class="caption-subject bold uppercase">Practice area survey List</span>
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
                                                    <?php if ($role_code == 'FIRMADM') { ?>
                                                        <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                            <button class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($role_code=='SITEADM'){ ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-3"></div>
                                                    <form action="<?php echo $base_url; ?>practice-area-survey/fetchFirm" method="post" name="firm_list_form" id="firm_list_form">
                                                        <div class="col-md-3">
                                                            <select class="form-control" name="firms">
                                                                <option value="">Select a firm</option>
                                                                <option value="all">All</option>
                                                                <?php // t($firms, 1);
                                                                foreach ($firms as $key => $value){?> 
                                                                <option value="<?php echo $value['firm_seq_no']; ?>" <?php if($firm_id==$value['firm_seq_no']){ ?> selected="" <?php } ?>><?php echo $value['firm_name']; ?></option>                                         
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="submit" value="Go" class="btn" id="firm_list_submit">
                                                        </div>
                                                    </form>
                                                    <div class="col-md-4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php  } ?>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                <?php if($role_code == 'SITEADM') { ?>
                                                <th> Firm </th>
                                                <?php } ?>
                                                <th> Practice Area </th>
                                                <th> Sub Practice Area </th>
                                                <th> Rating/Grading </th>
                                                <th> Firm/Attorney </th>
                                                <th> Remarks-Notes </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 1;
                                            foreach ($practice_area_survey as $key => $value) { ?>
                                                <tr>
                                                    <td> <?php echo $i++; ?> </td>
                                                    <?php if($role_code == 'SITEADM') { ?>
                                                    <td> <?php echo $value['firm_name']; ?> </td>
                                                    <?php } ?>
                                                    <td> <?php echo get_short_desc_by_code($value['pa_code'],$value['firm_seq_no']); ?> </td>
                                                    <td> <?php echo get_short_desc_by_code($value['sub_pa_code'],$value['firm_seq_no']); ?> </td>
                                                    <td> <?php echo get_short_desc_by_code($value['pa_grade_code'],$value['firm_seq_no']); ?> </td>
                                                    <td> <?php echo get_short_desc_by_code($value['survey_done_by'],$value['firm_seq_no']); ?> </td>
                                                    <td> <?php echo $value['remarks_notes']; ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <?php if($role_code=='SITEADM') {?>
                                                                <li>
                                                                    <a href="#responsive<?php echo $value['pa_survey_seq_no']; ?>" data-toggle="modal">
                                                                        <i class="icon-docs"></i> View 
                                                                    </a>
                                                                </li>
                                                                <?php } ?>
                                                                 <?php if($role_code=='FIRMADM') { ?>
                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>practice_area_survey/details/<?php echo base64_encode($value['pa_survey_seq_no']); ?>">
                                                                        <i class="icon-docs"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if(($role_code=='FIRMADM') || ($role_code == 'ATTR')) { ?>
                                                                <li>
                                                                    <a href="#responsive<?php echo $value['pa_survey_seq_no']; ?>" data-toggle="modal">
                                                                        <i class="icon-docs"></i> View
                                                                    </a>
                                                                </li>
                                                                <?php } ?>
                                                                 <?php //if($role_code=='FIRMADM') { ?>
<!--                                                                <li>
                                                                    <a href="#" data-toggle="modal">
                                                                        <i class="icon-docs"></i> Delete
                                                                    </a>
                                                                </li>-->
                                                                <?php //} ?>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } 
                                            ?>
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
         <?php if(($role_code == 'FIRMADM') || ($role_code == 'ATTR') || ($role_code == 'SITEADM')) {?>
            <?php foreach ($practice_area_survey1 as $key1 => $value1) { ?>
              <div id="responsive<?php echo $value1['pa_survey_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
               <?php // t($practice_area_survey); ?>
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View Survey</h4>
                        </div>
                        <form autocomplete="off" class="pas_edit_form" name="practice_area_survey_form" id="practice_area_survey_form<?php echo $value1['pa_survey_seq_no']; ?>" action="<?php echo $base_url; ?>practice_area_survey/edit/<?php echo $value1['pa_survey_seq_no']; ?>" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Practice Area:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($value1['pa_code']) && $value1['pa_code'] != ''){echo $value1['pa_code']; } ?>" <?php if(isset($value1['pa_code']) && $value1['pa_code'] != ''){echo $value1['pa_code']; } ?>>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Sub-practice Area:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($value1['sub_pa_code']) && $value1['sub_pa_code'] != ''){echo $value1['sub_pa_code']; } ?>" <?php if(isset($value1['sub_pa_code']) && $value1['sub_pa_code'] != ''){echo $value1['sub_pa_code']; } ?>>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Rating/Grading:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($value1['pa_grade_code']) && $value1['pa_grade_code'] != ''){echo $value1['pa_grade_code']; } ?>" <?php if(isset($value1['pa_grade_code']) && $value1['pa_grade_code'] != ''){echo $value1['pa_grade_code']; } ?>>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">PA Survey Done By:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($value1['survey_done_by']) && $value1['survey_done_by'] != ''){echo $value1['survey_done_by']; } ?>" <?php if(isset($value1['survey_done_by']) && $value1['survey_done_by'] != ''){echo $value1['survey_done_by']; } ?>>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
<!--                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Firm Name:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm_name">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($firms as $key => $value) { ?>
                                                            <option value="<?php echo $value['firm_seq_no'] ?>"  <?php if($value1['firm_seq_no'] == $value['firm_seq_no']){ ?> selected="selected" <?php } ?>><?php echo $value['firm_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" disabled placeholder="Enter text"><?php echo $value1['remarks_notes'] ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
<!--                                <input type="submit"  class="btn green pas_edit_button" id="practice_area_survey_submit<?php echo $value1['pa_survey_seq_no']; ?>" value="Save" >-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
         <?php if($role_code=='SITEADM'){ ?>
        <?php foreach ($practice_area_survey1 as $key1 => $value1) { ?>
              <div id="responsive<?php echo $value1['pa_survey_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
               <?php // t($practice_area_survey); ?>
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View Survey</h4>
                        </div>
                        <form autocomplete="off" class="pas_edit_form" name="practice_area_survey_form" id="practice_area_survey_form<?php echo $value1['pa_survey_seq_no']; ?>" action="<?php echo $base_url; ?>practice_area_survey/edit/<?php echo $value1['pa_survey_seq_no']; ?>" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Practice Area:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="practice_area" disabled>
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['Practice Areas'] as $key => $value) { ?>
                                                        <option value="<?php echo $value['code']; ?>" <?php if($value1['pa_code'] == $value['code']){ ?> selected="selected" <?php } ?>><?php echo $value['short_description']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Sub-practice Area:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="sub_practice_area" disabled>
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['Sub Practice Areas'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code'] ?>"  <?php if($value1['sub_pa_code'] == $value['code']){ ?> selected="selected" <?php } ?>><?php echo $value['short_description']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Rating/Grading:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="pa_grade" disabled>
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['PA Grade'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code'] ?>"  <?php if($value1['pa_grade_code'] == $value['code']){ ?> selected="selected" <?php } ?>><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">PA Survey Done By:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="pa_survey" disabled>
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['PA Surveyor'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code'] ?>"  <?php if($value1['survey_done_by'] == $value['code']){ ?> selected="selected" <?php } ?>><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Firm Name:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm_name" disabled>
                                                        <option value="">Select One</option>
                                                        <?php foreach ($firms as $key => $value) { ?>
                                                            <option value="<?php echo $value['firm_seq_no'] ?>"  <?php if($value1['firm_seq_no'] == $value['firm_seq_no']){ ?> selected="selected" <?php } ?>><?php echo $value['firm_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" disabled placeholder="Enter text"><?php echo $value1['remarks_notes'] ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
<!--                                <input type="submit"  class="btn green pas_edit_button" id="practice_area_survey_submit<?php echo $value1['pa_survey_seq_no']; ?>" value="Save" >-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php  } ?>
            <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add Survey</h4>
                        </div>
                        <form autocomplete="off" name="practice_area_survey_form" id="practice_area_survey_form" action="<?php echo $base_url; ?>practice_area_survey/add" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Practice Area:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="practice_area">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['Practice Areas'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code'] ?>"><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Sub-practice Area:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="sub_practice_area">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['Sub Practice Areas'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code'] ?>"><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Rating/Grading:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="pa_grade">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['PA Grade'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code'] ?>"><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">PA Survey Done By:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="pa_survey">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['PA Surveyor'] as $key => $value) { ?>
                                                            <option value="<?php echo $value['code'] ?>"><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
<!--                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Firm Name:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm_name">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($firms as $key => $value) { ?>
                                                            <option value="<?php echo $value['firm_seq_no'] ?>"><?php echo $value['firm_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" placeholder="Enter Remarks"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <input type="submit"  class="btn green" id="practice_area_survey_submit" value="Save" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src="<?php echo $assets_path; ?>custom/js/validate/practice_area_survey.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
</html>  