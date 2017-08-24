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
                                <a href="#">Firm-Level Strategy Group Master</a>
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
                                        <span class="caption-subject bold uppercase">Firm-Level Strategy Group Master List</span>
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
                                                    <?php if ($role_code != 'SITEADM') { ?>
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
                                    <?php if ($role_code == 'SITEADM') { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-3"></div>
                                                    <form action="<?php echo $base_url; ?>firm-sg/fetchFirmCodes" method="post" autocomplete="off" name="firm_list_form" id="firm_list_form">
                                                        <div class="col-md-3">
                                                            <select class="form-control" name="firms">
                                                                <option value="">Select a firm</option>
                                                                <option value="all">All</option>
                                                                <?php foreach ($firms as $key => $value) { ?>
                                                                    <option value="<?php echo $value['firm_seq_no']; ?>" <?php if ($firm_id == $value['firm_seq_no']) { ?> selected="" <?php } ?>><?php echo $value['firm_name']; ?></option>                                         
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
                                    <?php } ?>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                <?php if ($role_code == 'SITEADM') { ?>
                                                    <th> Firm </th>
                                                <?php } ?>
                                    <!--<th> SG Section Type </th>-->
                                                <th> SG Id  </th>
                                                <th> SG Name  </th>
                                                <th> Long Description </th>
                                                <th> Group Members </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($strategy_groups as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td> <?php echo $i++; ?> </td>
                                                    <?php if ($role_code == 'SITEADM') { ?>
                                                        <td> <?php echo $value['firm_name']; ?> </td>
                                                    <?php } ?>
                                        <!--<td> <?php // echo $value['sg_type'];     ?> </td>-->
                                                    <td> <?php echo $value['sg_id']; ?> </td>
                                                    <td> <?php echo $value['sg_name']; ?> </td>
                                                    <td> <?php echo $value['long_description']; ?> </td>
                                                    <td> <?php echo $value['members']; ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="#responsive<?php echo $value['firm_sg_seq_no']; ?>"  data-toggle="modal" >
                                                                        <i class="icon-tag"></i> View
                                                                    </a>
                                                                </li>
                                                                <?php // if($role_code == 'SITEADM') {   ?>
                                                                <li>
                                                                    <a href="#responsive_edit_<?php echo $value['firm_sg_seq_no']; ?>"  data-toggle="modal" >
                                                                        <i class="icon-docs"></i> Edit </a>
                                                                </li>
                                                                <?php // } ?>
                                                                <?php if ($role_code == 'SITEADM') { ?>
                                                                    <li>
                                                                        <a href="<?php //echo $base_url . 'firm_sgs/delete/' . base64_encode($value['firm_sg_seq_no']);     ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                            <i class="icon-tag"></i> Delete </a>
                                                                    </li>
                                                                <?php } ?>
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
                            <h4 class="modal-title">Add New Firm-Level Strategy Group Master</h4>
                        </div>
                        <form action="<?php echo $base_url; ?>firm-sg/add" name="strategygroupadd-form" id="strategygroupadd-form" autocomplete="off" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Attorney:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="attorney[]" multiple="multiple" id="attorneys" required>
                                                        <!--<option value="">Select One</option>-->
                                                        <?php foreach ($attorney_fetch as $key => $value) { ?>
                                                            <option value="<?php echo $value['attorney_seq_no'] ?>"><?php echo $value['attorney_first_name'] . ' ' . $value['attorney_last_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <!--<span class="help-block"> </span>-->
                                                </div>
                                            </div>
                                            <!--                                            <div class="form-group">
                                                                                            <label class="col-md-4 control-label">SG Section Type</label>
                                                                                                <div class="col-md-8">
                                                                                                    <select class="form-control" name="code_seq_no">
                                                                                                    <option value="">Select One</option>
                                            <?php
                                            // foreach ($codes as $key => $value) {
                                            //                                                if ($value['short_description'] != '') {
                                            ?>
                                                                                                                    <option value="<?php // echo $value['code_seq_no'];   ?>"><?php // echo $value['short_description'];   ?></option>
                                            <?php
                                            //                                                }
                                            //                                            }
                                            ?>
                                                                                                    </select>
                                                                                                    <span class="help-block"> </span>
                                                                                                </div>
                                                                                        </div>-->
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">SG ID</label>
                                                <div class="col-md-8">
                                                    <input type="text" value="" class="form-control" placeholder="Strategy ID"  name="sg_id">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">SG Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" value=""  class="form-control" placeholder="Strategy Group name"  name="sg_name">

                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Long Description</label>
                                                <div class="col-md-8">
                                                    <input type="text" value=""   class="form-control " placeholder="Long description" name="long_description">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" placeholder="Remarks or comments" name="remarks"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" class="btn green" id="firmcodeadd_submit_btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php foreach ($strategy_groups as $key => $value) { ?>
                <div id="responsive<?php echo $value['firm_sg_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">View Firm-Level Strategy Group Master</h4>
                            </div>
                            <!--<form action="<?php // echo $base_url . 'firm-sg/details/' . base64_encode($value['firm_sg_seq_no']);    ?>" name="strategy_group_edit_form" id="strategy_group_edit_form<?php // echo $value['firm_sg_seq_no'];    ?>" method="post" class="sg_edit_form">-->
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label class="col-md-4 control-label">Attorney:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control attorney_multiselect" name="attorney[]" multiple="multiple" disabled="disabled">
                                                            <option value="">Select One</option>
                                                            <?php
                                                            foreach ($attorney_fetch as $key1 => $value1) {
                                                                $attornies = $value['attorney'];
//                                                                t($attornies);
                                                                ?>
                                                                <option value="<?php echo $value1['attorney_seq_no'] ?>"
                                                                        accesskey="" <?php
                                                                        foreach ($attornies as $key2 => $value2) {
                                                                            if ($value2['attorney_seq_no'] == $value1['attorney_seq_no']) { ?>
                                                                          selected="selected"
                                                                         <?php  
                                                                         }
                                                                        }
                                                                        ?>
                                                                        >
                                                                <?php echo $value1['attorney_first_name'] . ' ' . $value1['attorney_last_name']; ?>
                                                                </option>
                                                                    <?php } ?>
                                                        </select>
                                                        <!--<span class="help-block"> </span>-->
                                                    </div>
                                                </div>
                                            <!--                                                <div class="form-group">
                                                                                                <label class="col-md-4 control-label">SG Section Type</label>
                                                                                                <div class="col-md-8">
                                                                                                <input type="text" value="<?php echo $value['sg_type']; ?>" disabled=""  class="form-control" placeholder="Enter text"  name="sg_type">
                                                                                                    <span class="help-block"> </span>
                                                                                                </div>
                                                                                            </div>-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">SG ID</label>
                                                <div class="col-md-8">
                                                    <input type="text" value="<?php echo $value['sg_id']; ?>"  class="form-control" disabled >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Code Description</label>
                                                <div class="col-md-8">
                                                    <input type="text" value="<?php echo $value['sg_name']; ?>" class="form-control" disabled >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Long Description</label>
                                                <div class="col-md-8">
                                                    <input type="text" value="<?php echo $value['long_description']; ?>" class="form-control" disabled >
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" disabled  name="remarks"><?php echo $value['remark_notes']; ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <!--<button type="submit" class="btn green section_group_edit_button" name="firm_sg_submit_btn" id="firm_sg_submit_btn" >Save</button>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!----------------------- EDIT STRATEGY GROUP ---------------------------->
            <?php // t($strategy_groups); exit;?>
            <?php foreach ($strategy_groups as $key => $value) {
                //t($value); exit; 
                ?>
                <div id="responsive_edit_<?php echo $value['firm_sg_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit Firm-Level Strategy Group Master </h4>
                            </div>
                            <form action="<?php echo $base_url . 'firm-sg/details/' . base64_encode($value['firm_sg_seq_no']); ?>" autocomplete="off" name="strategy_group_edit_form" id="strategy_group_edit_form<?php echo $value['firm_sg_seq_no']; ?>" method="post" class="sg_edit_form">
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Attorney:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control attorney_multiselect" name="attorney[]" multiple="multiple" id="attorneys_1" required>
                                                            <!--<option value="">Select One</option>-->
                                                            <?php
                                                            foreach ($attorney_fetch as $key1 => $value1) {
                                                                $attornies = $value['attorney'];
                                                                ?>
                                                                <option value="<?php echo $value1['attorney_seq_no'] ?>"
                                                                        <?php
                                                                        foreach ($attornies as $key2 => $value2) {
                                                                            if ($value2['attorney_seq_no'] == $value1['attorney_seq_no']) { ?>
                                                                          selected="selected"
                                                                         <?php  
                                                                         }
                                                                        }
                                                                        ?>
                                                                        >
                                                                <?php echo $value1['attorney_first_name'] . ' ' . $value1['attorney_last_name']; ?>
                                                                </option>
                                                                    <?php } ?>
                                                        </select>
                                                        <!--<span class="help-block"> </span>-->
                                                    </div>
                                                </div>
                                                <!--                                                <div class="form-group">
                                                                                                    <label class="col-md-4 control-label">SG Section Type</label>
                                                                                                    <div class="col-md-8">
                                                                                                        <input type="text" value="<?php echo $value['sg_type']; ?>" disabled=""  class="form-control" placeholder="Enter text"  name="sg_type">
                                                                                                        <span class="help-block"> </span>
                                                                                                    </div>
                                                                                                </div>-->
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">SG ID</label>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?php echo $value['sg_id']; ?>" class="form-control" placeholder="Strategy ID"  name="sg_id">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">SG Name</label>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?php echo $value['sg_name']; ?>" class="form-control" placeholder="Strategy Group Name"  name="sg_name">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Long Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" value="<?php echo $value['long_description']; ?>" class="form-control" placeholder="Long description" name="long_description">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Remarks or comments" name="remarks"><?php echo $value['remark_notes']; ?></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="submit" class="btn green section_group_edit_button" name="firm_sg_submit_btn" id="firm_sg_submit_btn<?php echo $value['firm_sg_seq_no']; ?>" >Save</button>
                                </div>
                            </form>
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
        <link rel="stylesheet" href="<?php echo $assets_path; ?>custom/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo $assets_path; ?>custom/js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/validate/firm_sgs.js"></script>
        <script type="text/javascript">
                                                                            function fn_frm_submit(id)
                                                                            {
                                                                                $('#strategy_group_edit_form' + id).submit();
                                                                            }
//                                                                            $(document).ready(function () {
                                                                            $('#attorneys').multiselect({
                                                                                includeSelectAllOption: true,
                                                                                enableFiltering: true,
                                                                                numberDisplayed: 3,
//                    enableCaseInsensitiveFiltering: true,
                                                                                maxHeight: 800,
                                                                                maxWidth: 100
                                                                            });
                                                                            $('.attorney_multiselect').multiselect({
                                                                                includeSelectAllOption: true,
                                                                                enableFiltering: true,
                                                                                numberDisplayed: 3,
//                    enableCaseInsensitiveFiltering: true,
                                                                                maxHeight: 800,
                                                                                maxWidth: 100
                                                                            });



        </script>
        <style>
            .form-group.required .control-label:after {
                content:"*";
                color:red;
            }
        </style>
    </body>

</html>  