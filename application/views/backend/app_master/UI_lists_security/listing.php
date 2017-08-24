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
                                <a href="#">UI Lists and Security </a>
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
                                        <span class="caption-subject bold uppercase">UI Lists and Security</span>
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
                                            <div class="col-md-6" style=" padding-left: 0">
                                                <div class="btn-group">
                                                    <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
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

                                                <th> SL# </th>
                                                <th> User Interface ID </th>
                                                <th> User Interface name </th>
                                                <th> user Interface type </th>
                                                <th> UI Description </th>
                                                <th> Remarks/Notes </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($det as $key => $value) {
                                                $value = (array) $value;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?> </td>
                                                    <td><?php echo $value['user_interface_id'] ?></td>
                                                    <td><?php echo $value['user_interface_name'] ?></td>
                                                    <td><?php echo $value['user_interface_type'] ?></td>
                                                    <td><?php echo $value['ui_description'] ?></td>
                                                    <td><?php echo $value['remarks_notes'] ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="#responsive<?php echo $value['ui_seq_no']; ?>"  data-toggle="modal" >
                                                                        <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo $base_url . 'ui-lists-security/edit/' . base64_encode($value['ui_seq_no']); ?>">
                                                                        <i class="icon-tag"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo $base_url . 'ui-lists-security/delete/' . base64_encode($value['ui_seq_no']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
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

        </div>

        <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New UI</h4>
                    </div>
                    <form action="<?php echo $base_url; ?>ui-lists-security/add" name="ui_list_form" autocomplete="off" id="ui_list_form" method="post" class="section_edit_form">
                        <div class="modal-body">
                            <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">User Interface ID:</label>
                                            <div class="col-md-8">
                                                <input type="text"  name="user_interface_id" class="form-control" placeholder="Enter User Interface ID" id="user_interface_id">

                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">User Interface Type:</label>
                                            <div class="col-md-8">
                                                <select class="form-control"  name="ui_type">
                                                    <option value="">Select One</option>
                                                    <?php //t($codes); exit;  ?>
                                                    <?php foreach ($codes['Ui Type'] as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"> </span>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Interface Name:</label>
                                            <div class="col-md-8">
                                                <input type="text"  name="user_interface_name" class="form-control" placeholder="Enter Interface Name">
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">UI Descriptions:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="ui_descriptions" placeholder="Enter UI Descriptions"></textarea>
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


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            <button type="submit" class="btn green section_group_edit_button" id="ui_list_submit" name="ui_list_submit" >Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-------------- VIEW USER INTERFACE LISTS AND SECURITY DETAILS --------------------->     

        <?php foreach ($det as $key => $value) { ?>
            <div id="responsive<?php echo $value['ui_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View UI Lists</h4>
                        </div>
                        <form action="#" name="strategygroupadd-form" id="strategygroupadd_form<?php echo $value['ui_seq_no']; ?>" method="post" class="section_edit_form">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">User Interface ID:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="user_interface_id" id="user_interface_id<?php echo $value['ui_seq_no']; ?>" class="form-control" placeholder="Enter text" value="<?php
        if (isset($value['user_interface_id']) && $value['user_interface_id'] != '') {
            echo $value['user_interface_id'];
        }
            ?>" <?php
                                                           if (isset($value['user_interface_id']) && $value['user_interface_id'] != '') {
                                                               echo $value['user_interface_id'];
                                                           }
                                                           ?> disabled>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">User Interface Type:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="user_interface_id" id="user_interface_id<?php echo $value['ui_seq_no']; ?>" class="form-control" placeholder="Enter text" value="<?php
        if (isset($value['user_interface_type']) && $value['user_interface_type'] != '') {
            echo $value['user_interface_type'];
        }
            ?>" <?php
                                                           if (isset($value['user_interface_type']) && $value['user_interface_type'] != '') {
                                                               echo $value['user_interface_type'];
                                                           }
                                                           ?> disabled>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Interface Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="user_interface_name" name="user_interface_name<?php echo $value['ui_seq_no']; ?>" class="form-control" placeholder="Enter text" value="<?php
                                                           if (isset($value['user_interface_name']) && $value['user_interface_name'] != '') {
                                                               echo $value['user_interface_name'];
                                                           }
                                                           ?>" <?php
                                                       if (isset($value['user_interface_name']) && $value['user_interface_name'] != '') {
                                                           echo $value['user_interface_name'];
                                                       }
                                                       ?> disabled>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">UI Descriptions:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="UI_descriptions" id="UI_descriptions<?php echo $value['ui_seq_no']; ?>" placeholder="Enter text" disabled><?php
                                                    if (isset($value['ui_description']) && $value['ui_description'] != '') {
                                                        echo $value['ui_description'];
                                                    }
                                                    ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" disabled name="remarks" id="remarks<?php echo $value['ui_seq_no']; ?>" placeholder="Enter text"><?php
                                                    if (isset($value['remarks_notes']) && $value['remarks_notes'] != '') {
                                                        echo $value['remarks_notes'];
                                                    }
                                                    ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <!--                                    <button type="submit" class="btn green section_group_edit_button" id="firmcodeadd_submit_btn">Save</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php } ?>         

    </div>
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
<script src="<?php echo $assets_path; ?>custom/js/validate/ui_list_add.js" type="text/javascript"></script>


</html>  