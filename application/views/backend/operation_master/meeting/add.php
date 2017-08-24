<!DOCTYPE html>
<?php
//    echo $role_code;
//    exit;
?>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php
//     t($codes['Jurisdictions']);exit;
    echo $header_link;
    ?>
    <!-- END HEAD -->
    
    <style>
        .swal2-container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    padding: 10px;
    background-color: transparent;
    z-index: 999999;
}

.swal2-modal .swal2-title {
    color: #595959;
    font-size: 20px;
    text-align: center;
    font-weight: 600;
    text-transform: none;
    position: relative;
    margin: 0;
    padding: 0;
    display: block;
}

hr, p {
    margin: 10px;
}
        
    </style>
    
     <script src="<?php echo $assets_path; ?>global/plugins/sweetalert2.js" type="text/javascript"></script>

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
                    <?php //echo $breadcrumb; ?>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Meeting/Appointment</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add</span>
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
                                        <span class="caption-subject bold uppercase">Add Meeting/Appointment</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()"> Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                                    </div>

                                </div>
                                <div class="portlet-body">

                                    <div class="row">
                                        <div class="add_form_sec">

                                            <form role="form" autocomplete="off" id="add_new_attorney_frm1" method="post" action="<?php echo $base_url . 'Meeting_Appointment/add_save' ?>" enctype="multipart/form-data" >

                                                <div class="row">
                                                    <div style=" width: 100%; display: block">
                                                        <div class="col-md-6">
                                                            <div class="col-md-12">
                                                                <h3 class="hint"> General Informations </h3>
                                                                
                                                                    <div class="form-group required">
                                                                        <label class="control-label">First Name</label>
                                                                        <input type="text" placeholder="Enter First Name" class="form-control"  name="f_name" id="f_name"  />
                                                                    </div>
                                                                
                                                                <div class="form-group required">
                                                                    <label class="control-label">Last Name</label>
                                                                    <input type="text" placeholder="Enter User ID" class="form-control"  name="l_name" id="l_name"  />
                                                                </div> 
                                                                <div class="form-group required">
                                                                    <label class="control-label">Profile Picture</label>
                                                                    <div class="form-group">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                        <div style=" height: 60px">
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="profile_photo" id="profile_photo" class="control-label">
                                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Code</label>
                                                                    <input type="text" name="contact_code" id="contact_code" class="form-control" placeholder="Enter Contact Code">
                                                                </div>
                                                                
                                                               <div class="form-group">
                                                                <div class=" col-md-12" style=" padding-left: 0; padding-right: 0;">
                                                                    <label class="control-label">Date of Birth</label>
                                                                </div>
                                                                <div class=" col-md-12" style=" padding-left: 0; padding-right: 0;">
                                                                    <div class="form-inline pull-left">
                                                                    <div class="input-group date date-picker" data-date-format="dd-M-yyyy">
                                                                <label class="control-label">Bar Practice Date</label>
                                                                <input aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="dob" id="dob" placeholder="DD-MMM-YYYY" >
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                                                    

                                                                        
                                                                                                                    
                                                                    </div> 
                                                                </div>

                                                            </div>
                                                                
                                                                
                                                                 <div class="form-group required">
                                                                    <label class="control-label">Contact Gender</label></br>
                                                                      Male&nbsp;<input type="radio" name="gender" id="gender" value="M">&nbsp;Female&nbsp;<input type="radio" name="gender" id="gender" value="F" checked="checked">
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                           

                                                            <div class="form-group required">
                                                                <label class="control-label">Main Contact Status</label>
                                                                <input type="text" placeholder="Enter Main Contact Status" class="form-control"  name="main_contact_status" id="main_contact_status"  /> </div>
                                                            <div class="form-group required">
                                                                <label class="control-label">Industry Type</label>
                                                                <input type="text" placeholder="Enter Industry Type" class="form-control" name="industry_type" id="industry_type"  /> </div>
                                                            <div class="form-group required">
                                                                <label class="control-label">Company Name</label>
                                                                <input type="text" placeholder="Enter Company Name" class="form-control" name="company_name" id="company_name"  /> </div>
                                                            <div class="form-group required">
                                                                <label class="control-label">Company Size</label>
                                                                <input type="text" placeholder="Enter Company Size" class="form-control" name="company_size" id="company_size"  /> </div> 
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label">Contact Business Title</label>
                                                               <input type="text" placeholder="Enter Contact Business Title" class="form-control" name="contact_business_title" id="contact_business_title"  />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Professional</label>
                                                                 <input type="text" placeholder="Enter Professional" class="form-control" name="professional" id="professional"  />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Contact Department</label>
                                                                 <input type="text" placeholder="Enter Contact Department" class="form-control" name="contact_department" id="contact_department"  /> 
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Twitter URL </label>
                                                                 <input type="text" placeholder="Enter Twitter URL " class="form-control" name="twitter_url" id="twitter_url"  />
                                                            </div>

                                                           

                                                            <div class="form-group">
                                                                <label class="control-label">LinkedIn URL </label>
                                                                 <input type="text" placeholder="Enter LinkedIn URL " class="form-control" name="linkedin_url" id="linkedin_url"  />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Google Plus URL </label>
                                                                 <input type="text" placeholder="Enter Google Plus URL " class="form-control" name="google_plus" id="google_plus"  />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Youtube URL </label>
                                                                 <input type="text" placeholder="Enter Youtube URL " class="form-control" name="youtube_url" id="youtube_url"  />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">IM  </label>
                                                                 <input type="text" placeholder="Enter IM Url" class="form-control" name="im_url" id="im_url"  />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Remarks</label>
                                                                 <input type="text" placeholder="Enter Remarks " class="form-control" name="remarks" id="remarks"  />
                                                            </div>


                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        
                                                        <div style=" width: 100%; display:  inline-block;">
                                                            <div class="col-md-12">
                                                                <h3 class="hint">Enter Address</h3>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Email" name="email" id="email"  /> </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Phone</label>
                                                                 <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Phone No" name="phone" id="phone"  />
                                                            </div>
                                                           
                                                                <div class="form-group">
                                                                    <label class="control-label">Fax</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Fax No" name="fax" id="fax"  />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Mobile No</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Mobile No" name="mobile_no" id="mobile_no" /> </div>

                                                                <div class="form-group ">
                                                                    <label class="control-label">Website URL </label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Website Url" name="website_url" id="website_url" /> </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label">Social Url</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Social Url" name="social_url" id="social_url" /> </div>

                                                                <div class="form-group ">
                                                                    <label class="control-label">Address Line1</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Address Line1" name="address_line1" id="address_line1" />
                                                                </div>

                                                                 <div class="form-group ">
                                                                    <label class="control-label">Address Line2</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Address Line2" name="address_line2" id="address_line2" />
                                                                </div>


                                                                 <div class="form-group ">
                                                                    <label class="control-label">Address Line3</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Address Line3" name="address_line3" id="address_line3" />
                                                                </div>

                                                                <div class="form-group required">
                                                                    <label class="control-label">Country</label>
                                                                    <select name="country" id="country" class="form-control country">
                                                                        <option value="">Country</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group required">
                                                                    <label class="control-label">State</label>
                                                                    <select name="state" id="state" class="form-control">
                                                                        <option value="">State</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">City/Town</label>
                                                                    <select name="city" id="city" class="form-control">
                                                                        <option value="">City/Town</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group required">
                                                                    <label class="control-label">Postal Code</label>
                                                                    <input type="text" placeholder="Postal Code" class="form-control"  name="postal_code" id="postal_code"/> </div>


                                                                     <h3 class="hint"> Remarks </h3>

                                                                 <div class="form-group ">
                                                                    <label class="control-label">Remarks</label>
                                                                    <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"></textarea>
                                                                </div>

                                                               

                                                                <div class="margiv-top-10">
                                                                    <button type="submit" name="add_new_attorney_btn" id="add_new_attorney_btn" class="btn green">Save Changes</button>
                                                                    <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                            
                                                            <div class="col-md-12">
                                                               
                                                               
                                                                     
                                                                <span class="help-block">  </span>       
                                                            </div>

                                                        </div> 

                                                        
                                                        
                                                        <div style=" width: 100%; display: inline-block;">
                                                            

                                                                
                                                                
                                                               
                                                            </div>
                                                        
                                                        </div>
                                                        
                                                        
                                                    

                                                    

                                                    </div>



                                            </form>
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
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar2.jpg" alt="...">
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
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar6.jpg" alt="...">
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
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar8.jpg" alt="...">
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
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="<?php echo $assets_path; ?>layouts/layout/img/avatar11.jpg" alt="...">
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
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="<?php echo $assets_path; ?>layouts/layout/img/avatar3.jpg" />
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
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script> 
        <script src="<?php echo $assets_path; ?>custom/js/validate/attorney_add_edit.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
       
        

    <!-- END PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        $("#hourly_comp_cost").inputmask("numeric", {
                    radixPoint: ".",
                    groupSeparator: ",",
                    digits: 2,
                    autoGroup: true,
                    prefix: '$ ', 
                    rightAlign: false
        });

        $("#overhead_amount").inputmask("numeric", {
                    radixPoint: ".",
                    groupSeparator: ",",
                    digits: 2,
                    autoGroup: true,
                    prefix: '$ ', 
                    rightAlign: false
        });
        
        $("#billing_rate_opp_cost").inputmask("numeric", {
                    radixPoint: ".",
                    groupSeparator: ",",
                    digits: 2,
                    autoGroup: true,
                    prefix: '$ ', 
                    rightAlign: false
        });

        $("#phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        
         $("#mobile").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        
        $("#fax").inputmask("mask", {
            "mask": "(999) 999-9999"
        });

        $('#web_url').keyup(function(){
            if (
                ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
                {
                $(this).val('http://' + $(this).val());    
                }
        });
        
        $('#social_url').keyup(function(){
            if (
                ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
                {
                $(this).val('http://' + $(this).val());    
                }
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
        <script>
            $(".approver_type").hide();
            $(".approver").click(function () {
                if ($(this).is(":checked")) {
                    $(".approver_type").show();
                } else {
                    $(".approver_type").hide();
                }
            });

            $('#firm_seq_no').change(function () {
                var b = BASE_URL;
                var firm_seq_no=$(this).val();
                $.ajax({
                    url: b + 'attorney/getFirmSections/',
                    type: 'post',
//                        dataType: 'json',
                    data: {
                        firm_seq_no: firm_seq_no
                    },
                    success: function (data) {
                        $('#section').html(data);
                    }
                });
            });

        </script>

        <style type="text/css">
            .btn.default:not(.btn-outline) {
                background-color: #e1e5ec;
                border-color: #e1e5ec;
                color: #666;
                top:13px !important;
            }

            .add_form_sec{ margin: 0; width: 80%;  display: inline-block; background: #fafafa }
            
            .form-group.required .control-label:after {
                content:"*";
                color:red;
              }
              .input-group.required .control-label:after {
                content:"*";
                color:red;
              }

        </style>
    </body>

</html> 