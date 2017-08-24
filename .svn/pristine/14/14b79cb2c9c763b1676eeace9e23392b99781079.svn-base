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
                                <a href="#">Attorney Goal</a>
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
                                        <span class="caption-subject bold uppercase">Attorney Goal List</span>
                                    </div>
                                    <!--
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                            </div>
                                        </div>
                                    -->

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6" style=" padding-left: 0">
                                                <?php $smsg = $this->session->flashdata('err_message');
                                                if (isset($smsg) && $smsg != '') {
                                                    ?>
                                                    <div class="alert alert-danger" id="general_msg_success" >
                                                        <strong>Error!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                                    </div>
                                                <?php } ?>

                                                <?php $smsg1 = $this->session->flashdata('suc_message');
                                                if (isset($smsg1) && $smsg1 != '') {
                                                    ?>
                                                    <div class="alert alert-success" id="general_msg_success" >
                                                        <strong>Success!</strong> <span id="general_msg"> <?php echo $smsg1; ?></span> 
                                                    </div>
                                               <?php } ?>  
                                                                           
<!--
                                        <?php //if ($role_code == 'FIRMADM' || $at_goal_seq_no=='') { ?>
                                                    <div class="btn-group">
                                                        <a href="#responsive" class="btn btn-outline sbold <?php echo $at_goal_seq_no; ?>" data-toggle="modal" >
                                                            <button class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                        <?php // } ?>
-->
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
                                                <th>SL#</th>
                                                <th> Attorney </th>
                                                <!--<th> Firm </th>-->
                                                <th> Current Year </th>
                                                <th> Current Year Goal </th>
                                                <th> Current Year Goal Percentage </th>
                                                <!--<th> Summary Info </th>-->
                                                <th> Remarks </th>
                                                <?php if($role_code == 'FIRMADM' || $role_code == 'ATTR'){?>
                                                <th> Actions </th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php $i = 0;
foreach ($all_att_goal as $key => $value) {
    ?>
                                                <tr>
                                                    <td> <?php echo ++$i; ?> </td>
                                                    <td> <?php echo $value['attorney_first_name'] . ' ' . $value['attorney_last_name']; ?> </td>
                                                    <!--<td> <?php // echo $value['firm_name'];   ?> </td>-->
                                                    <td> <?php echo $value['current_year']; ?> </td>
                                                    <td> $ <?php echo $value['current_year_goal']; ?> </td>
                                                    <td> <?php echo $value['current_year_goal_percentage']; ?> </td>
                                                    <!--<td> <?php echo $value['summary_info']; ?> </td>-->
                                                    <td> <?php echo $value['remarks_notes']; ?> </td>
                                                    <?php if($role_code == 'FIRMADM' || $role_code == 'ATTR'){?>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <!-- <a href="#responsive_view_<?php echo $value['at_goal_seq_no']; ?>" data-toggle="modal" > -->
                                                                    <a href="<?php echo $base_url; ?>attorney_goals/view/<?php echo base64_encode($value['at_goal_seq_no']); ?>">
                                                                        <i class="icon-tag"></i> View
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#responsive_edit_<?php echo $value['at_goal_seq_no']; ?>" data-toggle="modal" >
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
                                                    <?php } ?>
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
                            <h4 class="modal-title">Add New Attorney Goal</h4>
                        </div>
                        <form autocomplete="off" name="attorney_goal_add_frm" id="attorney_goal_add_frm" action="<?php echo $base_url; ?>attorney-goals/add" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <div class="form-group">
                                                <label class="col-md-4 control-label">Firm</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm_seq_no" id="firm_seq_no">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($all_firm as $k1 => $v1) { ?>
                                                                <option value="<?php echo $v1['firm_seq_no']; ?>"><?php echo $v1['firm_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div> -->
                                            <?php if($role_code == 'FIRMADM'){ ?>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Attorney</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="attorney_seq_no" id="attorney_seq_no_main">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($attorneys as $k2 => $v2) { ?>
                                                            <option value="<?php echo $v2['attorney_seq_no']; ?>"><?php echo $v2['attorney_first_name'] . ' ' . $v2['attorney_last_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Current Year</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="current_year" id="current_year_main">
                                                        <option value="">Select One</option>
<?php for ($i = 2017; $i <= 2200; $i++) { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php } ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Current Year Goal</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="current_year_goal" id="current_year_goal_main" class="form-control current_year_goal" placeholder="Enter Current Year Goal">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Current Year Goal %</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="current_year_goal_percentage" id="current_year_goal_percentage_main" class="form-control " placeholder="Enter Current Year Goal %">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Summary Info</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="summary_info" id="summary_info" class="form-control " placeholder="Enter Summery Info">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks_notes" id="remarks_notes" placeholder="Enter Remarks"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <input type="submit"  class="btn green" id="attorney_goal_add_btn" value="Save" name="attorney_goal_add_btn" >
                                <!--<button type="button" class="btn green" id="app_codes_submit">Save changes</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- edit -->
<?php $i = 0;
foreach ($all_att_goal as $key1 => $value1) {
    ?>
                <div id="responsive_edit_<?php echo $value1['at_goal_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Update Attorney Goal</h4>
                            </div>
                            <form  name="attorney_goal_edit_frm" id="attorney_goal_edit_frm" action="<?php echo $base_url; ?>attorney-goals/edit/<?php echo base64_encode($value1['at_goal_seq_no']); ?>" method="post">
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <?php if($role_code == 'FIRMADM') {?> 
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Attorney</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="attorney_seq_no" id="attorney_seq_no_<?php echo $v2['attorney_seq_no']; ?>">
                                                            <option value="">Select One</option>
                                                                    <?php foreach ($attorneys as $k2 => $v2) { ?>
                                                                <option value="<?php echo $v2['attorney_seq_no']; ?>" <?php
                                                                if ($v2['attorney_seq_no'] == $value1['attorney_seq_no']) {
                                                                    echo 'selected="selected"';
                                                                }
                                                                ?>><?php echo $v2['attorney_first_name'] . ' ' . $v2['attorney_last_name']; ?></option>
    <?php } ?>
                                                        </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                    <?php } ?>
                                                
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Current Year</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="current_year" disabled="disabled" id="current_year_<?php echo $v2['attorney_seq_no']; ?>">
                                                            <option value="">Select One</option>
    <?php for ($i = 2016; $i <= 2200; $i++) { ?>
                                                                <option value="<?php echo $i; ?>"
                                                                        accesskey="" <?php
        if ($i == $value1['current_year']) {
            echo 'selected="selected"';
        }
        ?>
                                                                        ><?php echo $i; ?>
                                                                </option>
    <?php } ?>
                                                        </select>
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Current Year Goal</label>
                                                    <div class="col-md-8">
                                                        <input type="text"  name="current_year_goal" id="current_year_goal_<?php echo $v2['attorney_seq_no']; ?>" class="form-control current_year_goal" placeholder="Enter Current Year Goal" value="<?php echo $value1['current_year_goal']; ?>">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Current Year Goal %</label>
                                                    <div class="col-md-8">
                                                        <input type="text"  name="current_year_goal_percentage" id="current_year_goal_percentage_<?php echo $v2['attorney_seq_no']; ?>" class="form-control " placeholder="Enter Current Year Goal %" value="<?php echo $value1['current_year_goal_percentage']; ?>">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Summery Info</label>
                                                    <div class="col-md-8">
                                                        <input type="text"  name="summary_info" id="summary_info_<?php echo $v2['attorney_seq_no']; ?>" class="form-control " placeholder="Enter Summery Info" value="<?php echo $value1['summary_info']; ?>">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" name="remarks_notes" id="remarks_notes_<?php echo $v2['attorney_seq_no']; ?>" placeholder="Enter Remarks"><?php echo $value1['remarks_notes']; ?></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <input type="submit"  class="btn green" id="attorney_goal_edit_btn" value="Save" name="attorney_goal_edit_btn" >
                                    <!--<button type="button" class="btn green" id="app_codes_submit">Save changes</button>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<?php } ?>
            <!-- edit -->

            <!-- view -->
<?php $i = 0;
foreach ($all_att_goal as $key1 => $value1) {
    ?>
                <div id="responsive_view_<?php echo $value1['at_goal_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">View Attorney Goal</h4>
                            </div>
                            <form  name="attorney_goal_edit_frm" id="attorney_goal_edit_frm" action="<?php echo $base_url; ?>attorney-goals/edit/<?php echo base64_encode($value1['at_goal_seq_no']); ?>" method="post">
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Attorney</label>
                                                    <div class="col-md-8">
                                                        <?php foreach ($all_attorney as $k2 => $v2) {
                                                            if ($v2['attorney_seq_no'] == $value1['attorney_seq_no']) {
                                                                ?>
                                                                <?php $a = $v2['attorney_first_name'] . ' ' . $v2['attorney_last_name']; ?>
                                                            <?php }
                                                        }
                                                        ?>
                                                        <input type="text" class="form-control " placeholder="Enter text" value="<?php echo $a; ?>" disabled="disabled">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Current Year</label>
                                                    <div class="col-md-8">

                                                        <input type="text" class="form-control " placeholder="Enter text" value="<?php echo $value1['current_year']; ?>" disabled="disabled">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Current Year Goal</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " placeholder="Enter text" value="<?php echo $value1['current_year_goal']; ?>" disabled="disabled">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Current Year Goal %</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " placeholder="Enter text" value="<?php echo $value1['current_year_goal_percentage']; ?>" disabled="disabled">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Summary Info</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control " placeholder="Enter text" value="<?php echo $value1['summary_info']; ?>" disabled="disabled">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Enter text" disabled="disabled"><?php echo $value1['remarks_notes']; ?></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <!-- <input type="submit"  class="btn green" id="attorney_goal_edit_btn" value="Save" name="attorney_goal_edit_btn" > -->
                                    <!--<button type="button" class="btn green" id="app_codes_submit">Save changes</button>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<?php } ?>
            <!-- view -->

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
    <script src="<?php echo $assets_path; ?>custom/js/validate/attorney_goals_add_edit.js" type="text/javascript"></script>
     <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script type="text/javascript">
        $(document).ready(function () {

            /*$('#attorney_seq_no').on('change', function () {
                
                var attorney_seq_no = $(this).val();
                
                $.ajax({
                    url: BASE_URL + 'attorney_goals/fetchRevenue/',
                    type: 'post',
//                    dataType: 'json',
                    data: {
                        attorney_seq_no: attorney_seq_no
                    },
                    success: function (data) {
                    }
                });
            });*/


            $('#current_year_main').on('change', function () {
                var current_year_main = $(this).val();
                var attorney_seq_no = $('#attorney_seq_no_main').val();

                $.ajax({
                    url : BASE_URL + 'attorney_goals/fetchRevenue/',
                    type : 'post',
                    dataType : 'json',
                    data : { current_year : current_year_main, attorney_seq_no : attorney_seq_no },
                    success : function(data){ //console.log(data.current_year_goal_percentage);
                        $('#current_year_goal_percentage_main').val(data.current_year_goal_percentage);
                        $('#current_year_goal_main').val(data.current_year_goal);
                    }
                });

            });

        });
    </script>
    <script type="text/javascript">
    var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        $(".current_year_goal").inputmask("numeric", {
                    radixPoint: ".",
                    groupSeparator: ",",
                    digits: 2,
                    autoGroup: true,
                    prefix: '$ ', 
                    rightAlign: false
        });


    }
    
           return {
        //main function to initiate the module
        init: function () {
            handleInputMasks();
//            handleIPAddressInput();
        }
    };

}();

if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        FormInputMask.init(); // init metronic core componets
    });
}
    </script>
</html>  