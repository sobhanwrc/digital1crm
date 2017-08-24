<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div id="loader_image" style=" width: 100%; height: 800px; position: absolute; top: 0; left: 0; padding-top: 15%; text-align: center; overflow-y: hidden !important; overflow-x: hidden !important; background: #fff; z-index: 99999999999">
            <img style="width: 100px; height:100px" src="<?php echo $assets_path; ?>pages/img/Loading_icon.gif" alt="" class="" />

        </div>
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
                                <a href="<?php echo base_url()?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                           <!-- <li>
                                <a href="#">Activity </a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Module 6</span>
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
                                        <span class="caption-subject bold uppercase">Module 6 List</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL NO </th>
                                                 <th> Name </th>
                                                 <th> Email  </th>
                                                <th> Company Name </th>
                                                <th> Phone Number </th>
                                                <th> Product Purchased Date </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($fetch_all_contact as $key => $value) { 
//                                                t($value); exit; ?>
                                                <tr style=" cursor: pointer" onclick="javascript:window.location.href='<?php echo $base_url;?>activity/details/<?php echo base64_encode($value['target_seq_no']); ?>'">
                                                    <?php $i = 0 ; ?>
                                                    <td><?php echo ++$i; ?> </td>
                                                    <td <?php if($value['type'] == 'I'){ ?> class="border_show" <?php }?>> <?php echo $value['name']; ?> </td>
                                                    <td> <?php echo $value['email']; ?> </td> 
                                                    <td <?php if($value['type'] == 'C'){ ?> class="border_show" <?php }?>> <?php echo $value['company_name']; ?> </td>    
                                                    <td> <?php echo $value['phone']; ?> </td>    
                                                    <td> <?php echo $value['purchased_date']; ?> </td>                                                    
                                                    
                                                </tr>
                                            <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET
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
                            <h4 class="modal-title">Add New Activity</h4>
                        </div>
                        <form  name="app_codes_form" autocomplete="off" id="app_codes_form" action="<?php echo $base_url; ?>app_codes/add" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Firm:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm">
                                                        <option value="">Select One</option>
                                                        <option value="Firm1">Firm1</option>
                                                        <option value="Firm2">Firm2</option>
                                                        <option value="Firm3">Firm3</option>
                                                        <option value="Firm4">Firm4</option>
                                                        <option value="Firm5">Firm5</option>
                                                        <option value="Firm6">Firm6</option>
                                                        <option value="Firm7">Firm7</option>
                                                        <option value="Firm8">Firm8</option>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Attorney:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm">
                                                        <option value="">Select One</option>
                                                        <option value="Firm1">Attorney1</option>
                                                        <option value="Firm2">Attorney2</option>
                                                        <option value="Firm3">Attorney3</option>
                                                        <option value="Firm4">Attorney4</option>
                                                        <option value="Firm5">Attorney5</option>
                                                        <option value="Firm6">Attorney6</option>
                                                        <option value="Firm7">Attorney7</option>
                                                        <option value="Firm8">Attorney8</option>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activity Type:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm">
                                                        <option value="">Select One</option>
                                                        <option value="Firm1">SECTION LEVEL</option>
                                                        <option value="Firm2">STRATEGIC GROUP LEVEL</option>
                                                        <option value="Firm3">INDIVIDUAL LEVEL</option>
                                                        <option value="Firm4">TEAM LEVEL</option>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Strategy Group:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm">
                                                        <option value="">Select One</option>
                                                        <option value="Firm1">SECTION1</option>
                                                        <option value="Firm2">SECTION1</option>
                                                        <option value="Firm3">SECTION1</option>
                                                        <option value="Firm4">SECTION1</option>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activity Reason:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" placeholder="Enter text"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Add Budget:</label>
                                                <div class="col-md-8">
                                                    <div class="btn-group">
                                                        <a href="#responsive_budget" class="btn btn-outline sbold" data-toggle="modal" >
                                                            <button class="btn sbold green"> Add Budget
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Potential Revenue:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" placeholder="Enter text"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activity Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm">
                                                        <option value="">Select One</option>
                                                        <option value="Firm1">NEW ACTIVITY - CREATED</option>
                                                        <option value="Firm2">PENDING APPROVAL - IN-PROGRESS</option>
                                                        <option value="Firm3">APPROVED - PROCEED</option>
                                                        <option value="Firm4">NOT APPROVED - DISCARD ACTIVITY</option>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activity Creation Date</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="long_description" class="form-control date-picker" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Duration</label>
                                                <div class="col-md-4">
                                                    From <input type="text"  name="long_description" class="form-control date-picker" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                                <div class="col-md-4">
                                                    To <input type="text"  name="long_description" class="form-control date-picker" placeholder="Enter text">
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
                                <input type="submit"  class="btn green" id="app_codes_submit" value="Save changes" >
                                <!--<button type="button" class="btn green" id="app_codes_submit">Save changes</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="responsive_budget" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Marketing Budget Code</h4>
                        </div>
                        <div class="modal-body">
                            <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-3">
                                        <b>Code</b>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Budget</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <b>Hours</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b>Dollars</b>
                                    </div>
                                </div>
                                <div class="row meals_div">
                                    <div class="col-md-6">
                                        <b class="line-highlight"> Meals and Entertainment </b>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="button" value="add" id="meals">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <p style="font-size:12px;">
                                                    <select>
                                                        <option>Food and Beverage</option>
                                                        <option>Admission fees, tickets and venue fees</option>
                                                        <option>Room rental - receptions and cocktail parties</option>
                                                        <option>Gifts and take aways</option>
                                                        <option>Labor and Support</option>
                                                    </select>
                                                </p>
        <!--                                        <p style="font-size:12px;">
                                                    Admission fees, tickets and venue fees
                                                </p>
                                                <p style="font-size:12px;">
                                                    Room rental - receptions and cocktail parties
                                                </p>
                                                <p style="font-size:12px;">
                                                    Gifts and takeaways
                                                </p>
                                                <p style="font-size:12px;">
                                                    Labor and Support
                                                </p>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <p style="font-size:12px;">
                                            <select>
                                                <option>ME 1</option>
                                                <option>ME 2</option>
                                                <option>ME 3</option>
                                                <option>ME 4</option>
                                                <option>ME 5</option>
                                            </select>

                                        </p>
        <!--                                <p style="font-size:12px;">
                                            ME 2
                                        </p>
                                        <p style="font-size:12px;">
                                            ME 3
                                        </p>
                                        <p style="font-size:12px;">
                                            ME 4
                                        </p>
                                        <p style="font-size:12px;">
                                            ME 5 
                                        </p>-->
                                    </div>
                                    <div class="col-md-2">
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
        <!--                                <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>-->
                                    </div>
                                    <div class="col-md-2">
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
        <!--                                <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>-->
                                    </div>
                                </div>
                                <div class="row travel_div">
                                    <div class="col-md-6">
                                        <b class="line-highlight"> Travel </b>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="button" value="add" id="travel">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <p style="font-size:12px;">
                                                    <select>
                                                        <option>Transportation</option>
                                                        <option>Lodging</option>
                                                        <option>Mileage</option>
                                                        <option>Car rental</option>
                                                        <option>Taxis and Uber</option>
                                                        <option>Client transportation (limo's, buses, vans etc.)</option>
                                                    </select>

                                                </p>
        <!--                                        <p style="font-size:12px;">
                                                    Lodging
                                                </p>
                                                <p style="font-size:12px;">
                                                    Mileage
                                                </p>
                                                <p style="font-size:12px;">
                                                    Car rental
                                                </p>
                                                <p style="font-size:12px;">
                                                    Taxis and Uber
                                                </p>
                                                <p style="font-size:12px;">
                                                    Client transportation (limo's, buses, vans etc.)
                                                </p>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <p style="font-size:12px;">
                                            <select>
                                                <option>T 1</option>
                                                <option> T 2</option>
                                                <option>T 3</option>
                                                <option>T 4</option>
                                                <option>T 5</option>
                                                <option>T 6</option>
                                            </select>

                                        </p>
        <!--                                <p style="font-size:12px;">
                                            T 2
                                        </p>
                                        <p style="font-size:12px;">
                                            T 3
                                        </p>
                                        <p style="font-size:12px;">
                                            T 4
                                        </p>
                                        <p style="font-size:12px;">
                                            T 5
                                        </p>
                                        <p style="font-size:12px;">
                                            T 6
                                        </p>-->
                                    </div>
                                    <div class="col-md-2">
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
        <!--                                <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>-->
                                    </div>
                                    <div class="col-md-2">

                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
        <!--                                <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control">
                                        </p>-->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            <button type="button" class="btn green">Save</button>
                        </div>
                    </div>
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


</style>

<script type="text/javascript">

                $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
                });
</script>
<!--<script src="<?php echo $assets_path; ?>custom/js/validate/app_codes_add.js" type="text/javascript"></script>-->


</html>  