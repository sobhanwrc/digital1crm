<!-- BEGIN HEADER -->
<?php // t($users);exit; ?>
<?php 
    $admin_id = $this->data['admin_id']; 
    $role_code = $this->data['role_code'];
//            $firm_seq_no = $this->data['firm_seq_no']; 
    $company_session = $this->session->userdata('admin_session_data');
    $firm_seq_no = $company_session['firm_seq_no'];

    $profile_photo = $this->data['profile_photo'];
    $ci =&get_instance();
    $ci->load->model('firm_model');

    $cond = " and firm_seq_no = '" . $firm_seq_no . "'";
    $row = $ci->firm_model->fetch($cond);
//    echo $this->db->last_query();
//    t($row);die();
?>
<div class="page-header navbar navbar-fixed-top" style=" position:relative;">
    <div style=" position:absolute; width:100%; text-align:center; top:10px; z-index:-1">
        <span style="color: #FFF"> <b> <?php if($role_code == 'SITEADM'){ echo "Digital1CRM"; }else{ echo $row[0]['firm_name'] ;} ?></b>  </span>
    </div>
                    
    <div class="menu-toggler sidebar-toggler" style="z-index:9999999"> 

    </div>
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
    	
   
        
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo $base_url; ?>dashboard">
                <!--<img src="<?php echo $assets_path; ?>pages/img/inner_logo1.jpg" alt="logo" class="logo-default" /> </a>-->
                <?php if($role_code == 'SITEADM'){ ?>
                    <img src="<?php echo $assets_path; ?>pages/img/inner_logo.jpg" alt="logo" class="logo-default" /> </a>
                <?php }?>
                
                <?php if($role_code == 'FIRMADM' || $role_code == 'ATTR'){
                        if (($row[0]['firm_image'])!= '') {
                ?>
                            <a><img src="<?php echo $assets_path; ?>upload/image/<?php echo $row[0][firm_image]?>" alt="logo" class="logo-default" /> </a>
                <?php } else{ ?>
                <img src="<?php echo $assets_path; ?>pages/img/inner_logo.jpg" alt="logo" class="logo-default" /> </a>
                <?php }} ?>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li>
<!--                    <div style="margin-left: 40px; padding-top:14px">
                        <?php if ($role_code == 'SITEADM') { ?>
                            <span style="color: #c6cfda; font-size: 13px"> Site Admin</span>

                        <?php } ?>
                        <?php if ($role_code == 'FIRMADM') { ?>
                            <span style="color: #c6cfda; font-size: 13px">Firm Admin</span>

                        <?php } ?>
                        <?php if ($role_code == 'ATTRMGR') { ?>
                            <span style="color: #c6cfda; font-size: 13px"> Attorney Manager</span>

                        <?php } ?>
                        <?php if ($role_code == 'ATTR') { ?>
                            <span style="color: #c6cfda; font-size: 13px"> Attorney</span>

                        <?php } ?>
                        <?php if ($role_code == 'NLSTAFF') { ?>
                            <span style="color: #c6cfda; font-size: 13px">Employee/Staff</span>

                        <?php } ?>
                    </div>-->
                </li>
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">

                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <?php if ($notify_count > 0) { ?>
                            <span class="badge badge-default"> <?php echo $notify_count; ?> </span>
                        <?php } ?>
                    </a>
                    <?php if ($notify_count > 0) { ?>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold"><?php echo $notify_count; ?> pending</span> notifications</h3>
                            <!-- <a href="page_user_profile_1.html">view all</a> -->
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <?php foreach ($notify as $key => $value) { ?>
                                    <li>
                                        <a href="<?php echo $base_url . 'activity/add-own-clients-targets/' . base64_encode($value['activity_seq_no']) . '/seen'; ?> ">
                                            <!--<span class="time">just now</span>-->
                                            <span class="details">
                                                <span class="label label-sm label-icon label-success">
                                                   <!-- <i class="fa fa-plus"></i> -->
                                                </span> <?php echo $value['msg']; ?> </span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                      <?php } ?>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->

                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<!--                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have
                                <span class="bold">7 New</span> Messages</h3>
                            <a href="app_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php // echo $assets_path; ?>layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">Just Now </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo $assets_path; ?>layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">16 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo $assets_path; ?>layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Bob Nilson </span>
                                            <span class="time">2 hrs </span>
                                        </span>
                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo $assets_path; ?>layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">40 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo $assets_path; ?>layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">46 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<!--                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>You have
                                <span class="bold">12 pending</span> tasks</h3>
                            <a href="app_todo.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">New release v1.2 </span>
                                            <span class="percent">30%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Application deployment</span>
                                            <span class="percent">65%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">65% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Mobile app release</span>
                                            <span class="percent">98%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">98% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Database migration</span>
                                            <span class="percent">10%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">10% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Web server upgrade</span>
                                            <span class="percent">58%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">58% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Mobile development</span>
                                            <span class="percent">85%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">85% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">New UI release</span>
                                            <span class="percent">38%</span>
                                        </span>
                                        <span class="progress progress-striped">
                                            <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">38% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <?php
                //foreach ($users as $key => $value) {
                //t($users); exit; 
                ?>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                     <?php
                      if($role_code == 'ATTR'){
                       if($profile_photo != "" && file_exists($_SERVER['DOCUMENT_ROOT']."assets/upload/employee/resize/CROP/".$profile_photo)){ ?>
                        <img alt="" class="img-circle" src="<?php echo $assets_path; ?>upload/employee/resize/CROP/<?php echo $profile_photo;?>" />
                        
                       <?php  }else{ ?>
                         <img alt="" class="img-circle" src="<?php echo $assets_path; ?>layouts/layout/img/avatar.png" />
                       <?php  } ?>
                      <?php } else {?>
                       
                       <?php  if($profile_photo != "" && file_exists($_SERVER['DOCUMENT_ROOT']."assets/upload/employee/resize/".$profile_photo)){ ?>
                        <img alt="" class="img-circle" src="<?php echo $assets_path; ?>upload/employee/resize/<?php echo $profile_photo;?>" />
                        
                       <?php  }else{ ?>
                         <img alt="" class="img-circle" src="<?php echo $assets_path; ?>layouts/layout/img/avatar.png" />
                       <?php  } ?>
                      <?php }?> 
                        
                        <span class="username username-hide-on-mobile"> <?php   echo $name;  ?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
<!--                        <li>
                            <a href="<?php echo $base_url; ?>profile">
                                <i class="icon-user"></i> My Profile </a>
                        </li>-->
                        <?php if ($role_code == 'FIRMADM') { ?>
<!--                            <li>
                                <a href="<?php echo $base_url; ?>my-firm">
                                    <i class="icon-calendar"></i> My Firm 
                                </a>
                            </li>-->
                        <?php } ?>
<!--                        <li>
                            <a href="app_inbox.html">
                                <i class="icon-envelope-open"></i> My Inbox
                                <span class="badge badge-danger"> 3 </span>
                            </a>
                        </li>-->
<!--                        <li>
                            <a href="app_todo.html">
                                <i class="icon-rocket"></i> My Tasks
                                <span class="badge badge-success"> 7 </span>
                            </a>
                        </li>   -->
                        <li>
                            <a href="#chngpass_responsive"  data-toggle="modal" >
                                <i class="icon-lock"></i> Change Password </a>
                                
                        </li>
                        
                       
                        <?php //if($role_code == 'SITEADM'){ ?>
<!--                         <li class="divider"> </li>
                        <li>
                            <a href="#super_user_login"  data-toggle="modal" >
                                <i class="icon-lock"></i> Login As Super User </a>
                        </li>-->
                        <?php// } ?>
                        
                        <li class="divider"> </li>
                        <?php if($is_site){ ?>
                        <li>
                            <a href="<?php echo $base_url; ?>dashboard/actSite">
                                <i class="icon-lock"></i> Login as Site Admin </a>
                        </li>
                        <?php } ?>
                        
                        <?php if($is_attorney){ ?>
                        <li>
                            <a href="<?php echo $base_url; ?>dashboard/actAttorney">
                                <i class="icon-lock"></i> Act as Attorney </a>
                        </li>
                        <?php } ?>
                        <?php if($is_firm){ ?>
                        <li>
                            <a href="<?php echo $base_url; ?>dashboard/actFirm">
                                <i class="icon-lock"></i> Act as Firm Admin</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo $base_url; ?>login/logout">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <?php //}  ?>


                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li> -->
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>


    <!-- END HEADER INNER -->
</div>     






<!-- END HEADER -->

