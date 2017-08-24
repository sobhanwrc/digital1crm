<!DOCTYPE html>
<?php //echo $year; exit;?>
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
            <?php //echo $breadcrumb; ?>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Competitor</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Edit</span>
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
                                <span class="caption-subject bold uppercase">Edit Competitor</span>
                            </div>
                                                                <div class="actions">
                                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                                             <input type="radio" name="options" class="toggle" id="option1"><a style=" text-decoration: none; color:#fff" href="javascript:void(0)" onclick="history.back()">Back</a></label>
<!--                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                                                    </div>
                                                                </div>

                        </div>
                        <div class="portlet-body">
                               <div class="tab-pane active" id="tab_1_1">
                               <div class="add_form_sec">
                                   <form role="form" id="myfirm-general-info-edit-form" autocomplete="off" method="post" action="<?php echo $base_url . 'competitor/edit/' . base64_encode($competitor_info['competitor_seq_no']); ?>">
                                    <input type="hidden" name="competitor_tab" value="yes">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <?php $aaa = $this->session->flashdata('suc_message'); if(isset($aaa) &&  $aaa != ''){ ?>
                                        <div class="alert alert-success" id="general_msg_success" >
                                            <strong>Success!</strong> <?php echo $aaa; ?>
                                        </div>
                                        <?php } ?>
                                        <?php $aaa = $this->session->flashdata('err_message'); if(isset($aaa) &&  $aaa != ''){ ?>
                                        <div class="alert alert-danger" id="general_msg_success" >
                                            <strong>Error!</strong> <?php echo $aaa; ?>
                                        </div>
                                        <?php } ?>

                                        <?php $err = $this->session->flashdata('err_message'); if(isset($err) &&  $err != ''){ ?>
                                        <div class="alert alert-danger" id="general_msg_success" >
                                            <strong>Error!</strong> <?php echo $err; ?>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12"><h3> General Informations</h3></div>
                                         <div class="form-group required">
                                                  <label class="control-label"> Competitor ID </label>
                                                  <input type="text" placeholder="Enter Competitor ID" class="form-control" name="competitor_id" id="competitor_id" value="<?php if(isset($competitor_info['competitor_id']) && $competitor_info['competitor_id'] != ''){echo $competitor_info['competitor_id']; } ?>" /> </div>
                                              <div class="form-group required">
                                                  <label class="control-label"> Competitor Code </label>
                                                  <input type="text" placeholder="Enter Competitor Code" class="form-control" name="competitor_code" id="competitor_code" value="<?php if(isset($competitor_info['competitor_code']) && $competitor_info['competitor_code'] != ''){echo $competitor_info['competitor_code']; } ?>" /> </div>
                                              <div class="form-group required">
                                                  <label class="control-label">First Name</label>
                                                  <input type="text" placeholder="Enter First Name" class="form-control" name="first_name" id="first_name" value="<?php if(isset($competitor_info['competitor_first_name']) && $competitor_info['competitor_first_name'] != ''){echo $competitor_info['competitor_first_name']; } ?>" /> </div>
                                              <div class="form-group required">
                                                  <label class="control-label">Last Name</label>
                                                  <input type="text" placeholder="Enter Last Name" class="form-control" name="last_name" id="last_name" value="<?php if(isset($competitor_info['competitor_last_name']) && $competitor_info['competitor_last_name'] != ''){echo $competitor_info['competitor_last_name']; } ?>" /> </div>
                                              <div class="form-group required">
                                                                <div class=" col-md-12" style=" padding-left: 0; padding-right: 0;"><label class="control-label">Date of Birth</label></div>
                                                                <div class=" col-md-12" style=" padding-left: 0; padding-right: 0;">
                                                                    <div class="form-inline pull-left">
                                                                   <div class="form-group pull-right">
                                                                      <select name="year" id="year" class="form-control">
                                                                          <option value="<?php echo $year;?>" selected><?php echo $year;?></option>  
                                                                         
                                                                         <?php
                                                                             for($i=date('Y'); $i>1899; $i--) {
                                                                                 $birthdayYear = '';
                                                                                 $selected = '';
                                                                                 if ($birthdayYear == $i) $selected = ' selected="selected"';
                                                                                 echo('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
                                                                             }
                                                                         ?>                          
                                                                       </select>     
                                                                   </div>                    
                                                                   <div class="form-group pull-right">
                                                                     <select name="month" id="month" onchange="" class="form-control">
                                                                         <option value="<?php echo $month;?>" selected><?php echo $month;?></option>
                                                                         <option value="Jan">Jan</option>
                                                                         <option value="Feb">Feb</option>
                                                                         <option value="Mar">Mar</option>
                                                                         <option value="Apr">Apr</option>
                                                                         <option value="May">May</option>
                                                                         <option value="Jun">Jun</option>
                                                                         <option value="Jul">Jul</option>
                                                                         <option value="Aug">Aug</option>
                                                                         <option value="Sep">Sep</option>
                                                                         <option value="Oct">Oct</option>
                                                                         <option value="Nov">Nov</option>
                                                                         <option value="Dec">Dec</option>
                                                                     </select>            
                                                                   </div>                                             
                                                                             <div class="form-group pull-right">
                                                                    <select name="day" id="day" class="form-control">
                                                                        <option value="<?php echo $day;?>" selected><?php echo $day;?></option>
                                                                     <?php for ($i=1; $i<= 31; $i++) { ?>
                                                                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                                                               
                                                                   <?php  } ?>
                                                             </select>
                                                                 </div>
                                                             </div>        
                                                                </div>     
                                                             </div>  
                                                    <br>
                                                   <div class="form-group required">
                                                     <label class="control-label">Industry Type</label>
                                                     <select name="industry_type" id="industry_type" class="form-control">
                                                        
                                                         <?php foreach ($ind_type as $key1 => $value1) {$value1 = (array) $value1;?>
                                                            <option value="<?php echo $value1['code']; ?>" <?php
                                                                if ($value1['code'] == $competitor_info['industry_type']) {echo 'selected="selected"';}?>><?php echo $value1['short_description']; ?></option>
                                                                <?php } ?>  
                                                            </select> 
                                                    
                                                    </div>
                                                     <div class="form-group required">
                                                     <label class="control-label">Experience</label>
                                                     <input class="form-control placeholder-no-fix" type="text" placeholder="Enter Experience" name="experience" id="experience" value="<?php if(isset($competitor_info['experience']) && $competitor_info['experience'] != ''){echo $competitor_info['experience']; } ?>"/> </div>

                                                     <div class="input-group date date-picker required" data-date-format="dd/mm/yyyy">
                                                      <label class="control-label">Bar Date </label>
                                                         <input aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="bar_date" id="bar_date" placeholder="dd/mm/yyyy" value="<?php
                                                                  echo $competitor_info['bar_date']; ?>" >
                                                         <span class="input-group-btn">
                                                             <button class="btn default" type="button">
                                                                 <i class="fa fa-calendar"></i>
                                                             </button>
                                                         </span>
                                                     </div>
                                                     <div class="form-group required">
                                                     <label class="control-label">Bar Belongs to State</label>
                                                     <input class="form-control placeholder-no-fix" type="text" placeholder="Bar state" name="bar_state" id="bar_state" value="<?php if(isset($competitor_info['state']) && $competitor_info['state'] != ''){echo $competitor_info['state']; } ?>"/> </div>
                                                        
                                                       
                                            <h3>Ranking</h3>
                                            <div class="form-group required">
                                                <label class="control-label">Independent</label>
                                                <select name="independent" id="independent" class="form-control">
                                                    <option value="">Select Independent Ranking</option>
                                                    <?php foreach ($codes['Competitor Rank'] as $key1 => $value1) { ?>
                                                        <option value="<?php echo $value1['code']; ?>" <?php
                                                        if ($competitor_info['independent_ranking'] == $value1['code']) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value1['short_description']; ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label class="control-label">Chambers</label>
                                                <select name="chambers" id="chambers" class="form-control">
                                                    <option value="">Select Chambers Ranking</option>
                                                    <?php foreach ($codes['Competitor Rank'] as $key1 => $value1) { ?>
                                                        <option value="<?php echo $value1['code']; ?>" <?php
                                                        if ($competitor_info['chambers_ranking'] == $value1['code']) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value1['short_description']; ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>   
                                            <div class="form-group required">
                                                <label class="control-label">Best</label>
                                                <select name="best" id="best" class="form-control">
                                                    <option value="">Select Best Ranking</option>
                                                    <?php foreach ($codes['Competitor Rank'] as $key1 => $value1) { ?>
                                                        <option value="<?php echo $value1['code']; ?>" <?php
                                                        if ($competitor_info['best'] == $value1['code']) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value1['short_description']; ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>  
                                            <div class="form-group required">
                                                <label class="control-label">Martindale</label>
                                                <select name="martindale" id="martindale" class="form-control">
                                                    <option value="">Select Martindale Ranking</option>
                                                    <?php foreach ($codes['Competitor Rank'] as $key1 => $value1) { ?>
                                                        <option value="<?php echo $value1['code']; ?>" <?php
                                                        if ($competitor_info['martindale'] == $value1['code']) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value1['short_description']; ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label class="control-label">Super Lawyers</label>
                                                <select name="super_lawyers" id="super_lawyers" class="form-control">
                                                    <option value="">Select Super Lawyers Ranking</option>
                                                    <?php foreach ($codes['Competitor Rank'] as $key1 => $value1) { ?>
                                                        <option value="<?php echo $value1['code']; ?>" <?php
                                                        if ($competitor_info['super_lawyers'] == $value1['code']) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value1['short_description']; ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>      
                                       </div>
                                       <div class="col-md-6">
                                        <h3 class="hint"> Enter Address </h3>
                                        <input type="hidden" name="firmid_2" id="firmid_2" value="<?php if(isset($competitor_info['id']) && $competitor_info['id'] != ''){echo $competitor_info['id']; } ?>">                                                     
                                                     <div id="validate_div_12" >
                                                     <div class="form-group required">
                                                         <label class="control-label">Email</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" value="<?php if(isset($address_info['email']) && $address_info['email'] != ''){echo $address_info['email']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group required">
                                                         <label class="control-label">Phone</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone" id="phone" value="<?php if(isset($address_info['phone']) && $address_info['phone'] != ''){echo $address_info['phone']; } ?>" /> 
                                                     </div>
                                                    <div class="form-group required">
                                                         <label class="control-label">Fax</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="facsimile" name="fax" id="fax" value="<?php if(isset($address_info['fax']) && $address_info['fax'] != ''){echo $address_info['fax']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group required">
                                                         <label class="control-label">Mobile</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile" id="mobile" value="<?php if(isset($address_info['mobile_cell']) && $address_info['mobile_cell'] != ''){echo $address_info['mobile_cell']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group required">
                                                         <label class="control-label">Website URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url" id="web_url" value="<?php if(isset($address_info['website_url']) && $address_info['website_url'] != ''){echo $address_info['website_url']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group required">
                                                         <label class="control-label">Social URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url" id="social_url" value="<?php if(isset($address_info['social_media_url']) && $address_info['social_media_url'] != ''){echo $address_info['social_media_url']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group required">
                                                         <label class="control-label">Address Line 1</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_1" value="<?php if(isset($address_info['address_line1']) && $address_info['address_line1'] != ''){echo $address_info['address_line1']; } ?>" /> </div>
                                                     
                                                     <div class="form-group">
                                                         <label class="control-label">Address Line 2</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_2" value="<?php if(isset($address_info['address_line2']) && $address_info['address_line2'] != ''){echo $address_info['address_line2']; } ?>" /> </div>
                                                      <div class="form-group">
                                                          <label class="control-label">Address Line 3</label>
                                                          <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address_info['address_line3']) && $address_info['address_line3'] != ''){echo $address_info['address_line3']; } ?>" /> </div>

                                                     <div class="form-group required">
                                                         <label class="control-label">Country</label>
                                                         <select name="country" id="country" class="form-control">
                                                             <option value="">Country</option>
                                                             <?php if(isset($country_info) && $country_info != ''){echo $country_info; } ?>
                                                         </select>
                                                     </div>
                                                     <div class="form-group required">
                                                         <label class="control-label">State</label>
                                                         <select name="state" id="state" class="form-control">
                                                             <option value="">State</option>
                                                             <?php if(isset($state_info) && $state_info != ''){echo $state_info; } ?>
                                                         </select>
                                                     </div>
<!--                                                     <div class="form-group required">
                                                         <label class="control-label">County</label>
                                                         <select name="county" id="county" class="form-control">
                                                             <option value="">County</option>
                                                             <?php if(isset($county_info) && $county_info != ''){echo $county_info; } ?>
                                                         </select>
                                                     </div>-->
                                                     <div class="form-group required">
                                                         <label class="control-label">City/Town</label>
                                                         <select name="city" id="city" class="form-control">
                                                             <option value="">City/Town</option>
                                                             <?php if(isset($city_info) && $city_info != ''){echo $city_info; } ?>
                                                         </select>
                                                     </div>
                                                     <div class="form-group required">
                                                         <label class="control-label">Postal Code</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code" id="postal_code" value="<?php if(isset($address_info['postal_code']) && $address_info['postal_code'] != ''){echo $address_info['postal_code']; } ?>" /> </div>
                                                     </div>

                                                      <h3 class="hint"> Remarks </h3>

                                                    <div class="form-group">
                                                                    <label class="control-label">Remarks</label>
                                                                    <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($competitor_info['remarks_notes']) && $competitor_info['remarks_notes'] != ''){echo $competitor_info['remarks_notes']; } ?></textarea>
                                                                </div>

                                               <div class="margiv-top-10">
                                                   <button type="submit" id="general-edit-submit-btn" class="btn green" name="general_save_change">Save Changes</button>
                                                   <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
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
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
     <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";  </script>
    <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/competitor_add_edit.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
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
    <script type="text/javascript">
       $(document).ready(function() {

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
       });
   </script>
<script type="text/javascript">
var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        $("#phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#fax").inputmask("mask", {
            "mask": "(999) 999-9999"
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
</script>
    </body>

</html> 