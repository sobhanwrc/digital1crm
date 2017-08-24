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
                                                <form  name="ui_list_form" id="ui_list_form" autocomplete="off" action="<?php echo $base_url; ?>ui-lists-security/add" method="post">
                                                    <div class="modal-body">
                                                        <!--<div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">User Interface ID:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text"  name="user_interface_id" class="form-control" placeholder="Enter text" id="user_interface_id">
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">User Interface Type:</label>
                                                                    <div class="col-md-8">
                                                                    <select class="form-control"  name="ui_type">
                                                                        <option value="">Select One</option>
                                                                            <?php foreach ($codes['Ui Type'] as $key => $value) { ?>
                                                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <span class="help-block"> </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">User Interface Name:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text"  name="user_interface_name" class="form-control" placeholder="Enter text">
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">UI Descriptions:</label>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control" name="ui_descriptions" placeholder="Enter text"></textarea>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Remark/Comments:</label>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control" name="remarks" placeholder="Enter text"></textarea>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--</div>-->
                                                    <div class="modal-footer">
                                                        <!--<button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>-->
                                                        <input type="submit" class="btn green" id="ui_list_submit" value="Save" name="ui_list_submit" >
                                                        <!--<button type="button" class="btn green" id="app_codes_submit">Save changes</button>-->
                                                    </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/validate/ui_list_add.js"></script>
    </body>

</html>  
