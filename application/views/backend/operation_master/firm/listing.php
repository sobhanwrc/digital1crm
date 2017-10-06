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
                    <?php //echo $breadcrumb; ?>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                 <a href="<?php echo base_url() ?>firm">Company</a>
                                 <i class="fa fa-circle"></i>
                             </li>
                            <!-- <li>
                                <span>Company</span>
                            </li> -->
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
                                        <span class="caption-subject bold uppercase">Company List</span>
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

                                <?php $aaa = $this->session->flashdata('suc_message');
                                if (isset($aaa) && $aaa != '') { ?>
                                    <div class="alert alert-success" id="general_msg_success" >
                                        <strong>Success!</strong> <?php echo $aaa; ?>
                                    </div>
                                <?php } ?>

<?php $aaa = $this->session->flashdata('err_message');
if (isset($aaa) && $aaa != '') { ?>
                                    <div class="alert alert-danger" id="general_msg_success" >
                                        <strong>Error!</strong> <?php echo $aaa; ?>
                                    </div>
<?php } ?>

                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6" style=" padding-left: 0">
                                                <div class="btn-group">
                                                    <a href="<?php echo $base_url; ?>firm/add" class="btn btn-outline sbold"  > <!-- <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" > -->
                                                        <button class="btn sbold green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <!--<button type="button" class="btn btn-transparent dark btn-outline btn-circle active" data-toggle="modal" data-target="#add_import">Import</button>-->
                                            </div>


                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                <th> Company Name </th>
                                                <th> Company Code </th>
                                                <th> Address </th>
                                                <th> SP Name </th>
                                                <th> SP Role </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php $i = 0;
foreach ($all_firms as $key => $value) {
    $value = (array) $value; ?>
                                                <tr>
                                                    <td> <?php echo ++$i; ?> </td>
                                                    <td> <?php echo $value['firm_name']; ?> </td>
                                                    <td> <?php echo $value['firm_code']; ?> </td>

                                            <!--<td> <?php echo $value['short_description']; ?> </td>-->
                                                    <td> <?php if ($value['address_line2'] != '') {
                                                        $addr2 = $value['address_line2'] . '<br>';
                                                    } else {
                                                        $addr2 = '';
                                                    } if ($value['address_line3'] != '') {
                                                        $addr3 = $value['address_line3'] . '<br>';
                                                    } else {
                                                        $addr3 = '';
                                                    }
                                                    echo $value['address_line1'] . '<br>' . $addr2 . $addr3 . $value['name'] . ',' . $value['state_name'] . ',' . $value['county_name'] . '<br>' . $value['city_name'] . ' - ' . $value['postal_code'];
                                                    ?> </td>
                                                    <td> <?php echo $value['sp_contact_name']; ?> </td>
                                                    <td> <?php echo $value['sp_contact_role']; ?> </td>


                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <!-- <li>
                                                                    <a href="http://dev.wrctechnologies.com/ams/case/index">
                                                                        <i class="icon-docs"></i> Case
                                                                    </a>
                                                                </li> -->
                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>firm/details/<?php echo base64_encode($value['firm_seq_no']); ?>/read">
                                                                        <i class="icon-docs"></i> View </a>
                                                                </li>
    <?php if (($role_code == 'FIRMADM') || ($role_code == 'SITEADM')) { ?>
                                                                    <li>
                                                                        <a href="<?php echo $base_url; ?>firm/details/<?php echo base64_encode($value['firm_seq_no']); ?>">
                                                                            <i class="icon-tag"></i> Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo $base_url; ?>firm/delete/<?php echo base64_encode($value['firm_seq_no']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                            <i class="icon-tag"></i> Delete </a>
                                                                    </li>
    <?php } ?>
                                                                    <?php if($role_code == 'SITEADM'){ ?>
                                                                    <li>
                                                                        <button style=" margin-bottom: 15px; margin-top: 10px" class="btn btn-transparent dark btn-outline btn-circle active1 btn_make_appointment" firm_seq_no="<?php echo $value['firm_seq_no'] ?>" type="button">
                                                                            Add more users
                                                                        </button>
                                                                    </li>
                                                                    <?php  } ?>
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
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar2.jpg" alt="...">
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
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar6.jpg" alt="...">
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
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar8.jpg" alt="...">
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
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar11.jpg" alt="...">
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
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="http://dev.wrctechnologies.com/ams/assets/layouts/layout/img/avatar3.jpg" />
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
            <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Client</h4>
                        </div>
                        <form action="" name="clientAddForm" id="clientAddForm">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Client Number</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">This Client already exists! <a href="">Click here to view details <i class="fa fa-search"></i></a> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">First Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Middle Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Email</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Phone (Office)</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Mobile</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Date of Birth</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Enter text">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Gender</label>
                                                <div class="col-md-8 radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Male </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Female </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!------------------------------------------------------------------------------------------------>

        <div id="add_import" class="modal fade" role="dialog">

            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="modal-title"><span style=" color:#333" class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b style=" color:#333">Add New Super Master Contacts</b></div>
                    </div>
                    <div class="modal-body">
                        <div id="create_event_import" class=" mt10">
                            <div class="col-md-12" id="">
                                <form name="frmAddNewContact2" id="frmAddNewContact2" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                    <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo $firm_seq_no; ?>">
                                    <!--<div class="form-group" style=" color:#333">
                                      <div style="width: 16%; padding-top: 5px; display: inline-block"><label>Select Industry Type</label></div>
                                      <div class="input-group" style="width: 80%; display: inline-block">
                                        <select name="industry_type_seq_no" id="industry_type_seq_no" class="form-control">
                                          <option value="">Select Any</option>
<?php foreach ($industry_type_list as $key => $value) {
    ?>
                                              <option value="<?php echo $value['industry_type_seq_no']; ?>"><?php echo $value['type_name']; ?></option>
    <?php
}
?>
                                        </select>
                                      </div>
          
                                    </div>-->
                                    <div class="form-group" style=" color:#333">
                                        <div style="width: 16%; padding-top: 5px; display: inline-block"><label>Import File</label></div>
                                        <div class="input-group" style="width: 80%; display: inline-block">
                                            <input type="file" name="upload_excel"  id="upload_excel" size="50">
                                        </div>

                                    </div>
                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >
                                    <input style=" color:#fff" type="button" value="Upload" class="submit btn green pull-left" name="submit1" id="submit1" >

                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
        
<!--        //add more users//-->
                    <!-- Make Appointment Modal -->

            <div class="modal fade appointment_date_and_time_div" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <form name="more_add_user_form" class="more_add_user_form" method="post" novalidate>
                            <input type="hidden" name="firm_seq_no_for_user" id="firm_seq_no_for_user" value="">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> Add more users</b></div>

                            </div>

                            <div class="modal-body" style=" display: inline-block; width: 100%">

                                <div id="create_event" class=" mt10">

                                    <div class="col-md-12" style=" padding-left: 0; padding-right: 0">

                                        <div class="form-group">
                                            <label for="comment">User First Name</label>
                                            <input class="form-control" type="text" name="user_fisrt_name" id="user_fisrt_name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">User Last Name</label>
                                            <input class="form-control" type="text" name="user_last_name" id="user_last_name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">User Email Id</label>
                                            <input class="form-control" type="text" name="user_emailId" id="user_emailId" value="" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Password</label>
                                            <input class="form-control" type="password" name="user_password" id="user_password" value="" autocomplete="off">
                                        </div>

                                    </div>

                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >

                                </div>

                            </div>

                            <div class="modal-footer">

                                <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                                <div class="input-group col-md-12" style="padding-right:15px">

                                    <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel user_add_cancel" name="user_add_cancel" id="">

                                    <input type="button" value="Submit" class="submit btn green pull-right more_add_user_submit" name="appointment_made_submit" id="" >

                                    <div id="master_name_submit_loader" style="display:none; padding-left:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- End Modal -->
<!--//end//-->


        <!---------------------------------------------------------------------------------------------->
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
    </body>

</html> 


<script type="text/javascript">

    $(document).ready(function() {
        $(window).load(function() {

//                    $("#loader_image").hide();

            $('#loader_image').delay(2000).fadeOut(1000)

        });

        $('#submit1').on('click', function() {
            $("#frmAddNewContact2").submit();
        });

        $("#frmAddNewContact2").validate({
            rules: {
                //industry_type_seq_no: {
                //required: true
                //},
                upload_excel: {
                    required: true,
                    extension: "xls|xlsx"
                }
            },
            messages: {
                //industry_type_seq_no: {
                // required: "<font color=\"red\">Please select industry type</font>"
                //},
                upload_excel: {
                    required: "<font color=\"red\">Please upload file</font>",
                    extension: "<font color=\"red\">File type must be excel</font>"
                }
            },
            submitHandler: function(form) {

                var form_data = new FormData($("#frmAddNewContact2").get(0));
                //alert(form_data);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>firm/import_file",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $("#create_event_import").find('img').css('display', 'block');
                        $("#submit1").prop('disabled', true);
                    },
                    success: function(response) {

                        var obj = $.parseJSON(response);
                        if (obj.status == 1) {
                            jconfirm({
                                title: 'Confirmation!',
                                content: obj.msg,
                                buttons: {
                                    OK: function() {
                                        window.location.href = "<?php echo base_url(); ?>firm";
                                    }
                                }
                            });
                        }
                        else {
                            jconfirm({
                                title: 'Alert!',
                                content: obj.msg,
                                buttons: {
                                    OK: function() {
                                        //window.location.href = "<?php echo base_url(); ?>targets";
                                    }
                                }
                            });
                        }
                        //$("#create_event").find('img').css('display', 'none');
                        $("#submit1").prop('disabled', false);

                    },
                    error: function(xhr) {

                        jconfirm({
                            title: 'Alert!',
                            content: 'Try Again.',
                            buttons: {
                                OK: function() {
                                    //window.location.href = "<?php echo base_url(); ?>firm";
                                }
                            }
                        });

                    }
                });
            }

        });
        
        $(".btn_make_appointment").click(function (e) {
            $(".appointment_date_and_time_div").modal('show');
            var firm_seq_no = $(this).attr('firm_seq_no');
            $('#firm_seq_no_for_user').val(firm_seq_no);
        });
        
        $('.user_add_cancel').on('click',function(){
            $(".appointment_date_and_time_div").modal('hide');
        });
        
        $(".more_add_user_form").validate({
            rules:{
                user_fisrt_name:{
                    required: true
                },
                user_last_name:{
                    required: true
                },
                user_emailId:{
                    required: true,
                    email: true
                },
                user_password:{
                    required: true,
                    minlength: 8
                }
            },
            messages:{
                user_fisrt_name:{
                    required: "<font color='red'>Please enter first name</font>"
                },
                user_last_name:{
                    required: "<font color='red'>Please enter last name</font>"
                },
                user_emailId:{
                    required: "<font color='red'>Please enter email id</font>",
                    email: "<font color='red'>Please enter valid email id</font>"
                },
                user_password:{
                    required: "<font color='red'>Please enter password</font>",
                    minlength: "<font color='red'>Minimum 8 character required.</font>"
                }
            }
        });
        
        $('.more_add_user_submit').on('click',function(){
            var valid = $('.more_add_user_form').valid();
            if(valid){
                var firm_seq_no = $('#firm_seq_no_for_user').val();
                var user_first_name = $('#user_fisrt_name').val();
                var user_last_name = $('#user_last_name').val();
                var user_emailId = $('#user_emailId').val();
                var user_password = $('#user_password').val();
                
                $.ajax({
                    type: "POST",
                    url: BASE_URL + "firm/add_more_users",
                    data:{
                        firm_seq_no:firm_seq_no,
                        user_first_name:user_first_name,
                        user_last_name: user_last_name,
                        user_emailId:user_emailId,
                        user_password: user_password
                    },
                    success: function(data){
                        if(data == 1){
                            jconfirm({
                                title: 'Confirmation !',
                                content: "User added successfully for this company.",
                                buttons: {
                                    OK: function () {
                                        $(".appointment_date_and_time_div").modal('hide');
                                    }
                                }
                            });
                        }
                        
                        if(data == 2){
                            jconfirm({
                                title: 'Alert !',
                                content: "User added failed for this company.",
                                buttons:{
                                    OK: function(){
                                    }
                                }
                            });
                        }
                        
                        if(data == 3){
                            jconfirm({
                                title: 'Alert !',
                                content: "Email id already exit for this company. Please try with another.",
                                buttons:{
                                    OK: function(){
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });

    });

</script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.15/api/fnReloadAjax.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />