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
            <?php //echo $breadcrumb; ?>
            <div class="page-bar" style=" position: relative">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Targets</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>View</span>
                    </li>
                </ul>
                
                 <div class="btn-group btn-group-devided" data-toggle="buttons" style=" position: absolute; top:7px; right: 20px;">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()"> Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>

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
                                <span class="caption-subject bold">Target Name: <?php if($targets['type']== 'I') echo $targets['target_first_name']." ".$targets['target_last_name']; else echo $targets['target_first_name']; ?>
                                 <?php if($target_info['add_flag']==1){ ?>
                                   <font color="red" style="margin-left: 150px;">Imported Data</font>
                                   <?php } ?>
                                </span><span class="caption-subject bold" style="margin-left: 195px;">Phone:<?php echo " ".$address['phone'];?></span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <!-- <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                         <input type="radio" name="options" class="toggle" id="option1"><a href="javascript:void(0)" onclick="history.back()">Back</a></label> -->
<!--                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                </div>
                            </div>

                        </div>
                        <div class="portlet-body">
                           <div class="row">
                           <div class="add_form_sec">
                               <form role="form" id="myfirm-general-info-form" autocomplete="off" method="post" action="<?php echo $base_url . 'targets/details/' ?>">
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
                                       <!--  <h3 class="hint"> Attorney Informations </h3>
                                       <div class="form-group">
                                           <label class="control-label">Attorney</label>
                                           <select name="firm_admin_seq_no" id="firm_admin_seq_no" class="form-control">
                                               <option value="">Attorney</option>
                                               <?php  foreach ($firm_admin as $key => $value) { $value = (array) $value;  ?>
                                                   <option value="<?php echo $value['attorney_seq_no']; ?>"><?php echo $value['user_first_name'] . ' ' . $value['user_last_name']; ?></option>
                                               <?php } ?>
                                           </select>
                                       </div> -->

                                       <div class="col-md-12"><h3 class="hint"> General Informations </h3></div>
                                       <div class="form-group bb">
                                            <label class="control-label">First Name</label>
                                            <input type="text" placeholder="Enter Firm Name" class="form-control" disabled="" name="target_first_name" id="target_first_name" value="<?php if(isset($targets['target_first_name']) && $targets['target_first_name'] != ''){echo $targets['target_first_name']; } ?>" /> </div>
                                             <div class="form-group bb">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" placeholder="Enter Firm Name" class="form-control" disabled="" name="target_last_name" id="target_last_name" value="<?php if(isset($targets['target_last_name']) && $targets['target_last_name'] != ''){echo $targets['target_last_name']; } ?>" /> </div>
                                        
                                        <div class="form-group required org">
                                                  <label class="control-label">Organization Name</label>
                                                  <input type="text" placeholder="Enter Client First Name" class="form-control" disabled name="org_name" id="org_name" value="<?php echo $targets['target_first_name']; ?>" /> 
                                                </div>    
                                            
                                        <div class="form-group required org">
                                                  <label class="control-label">Organization ID</label>
                                                  <input type="text" placeholder="Enter Organization ID" class="form-control" disabled name="org_id" id="org_id"  value="<?php echo $targets['target_id']; ?>" />
                                                  <input type="hidden" placeholder="type" class="form-control"  name="type" id="type"  value="<?php echo $target_info['type']; ?>" />
                                                  </div> 
                                       <div class="form-group required org">
                                                  <label class="control-label">Organization Code</label>
                                                  <input type="text" placeholder="Enter Organization Code" class="form-control" disabled name="org_code" id="org_code"  value="<?php echo $targets['target_code']; ?>" disabled="disabled" /> 
                                                 </div>
                                       
                                       <div class="form-group bb">
                                            <label class="control-label">Target ID</label>
                                            <input type="text" placeholder="Enter Firm ID" class="form-control" disabled="" name="target_id" id="target_id" value="<?php if(isset($targets['target_id']) && $targets['target_id'] != ''){echo $targets['target_id']; } ?>"  /> </div>
                                        <div class="form-group bb">
                                            <label class="control-label">Target Code</label>
                                            <input type="text" placeholder="Enter Code" class="form-control" disabled="" name="target_code" id="target_code" value="<?php if(isset($targets['target_code']) && $targets['target_code'] != ''){echo $targets['target_code']; } ?>" /> </div>
                                       
                                           <div class="form-group bb">
                                            <label class="control-label">Date of Birth</label>
                                            <input type="text" placeholder="Enter Code" class="form-control" disabled="" name="target_dob" id="target_dob" value="<?php if(isset($targets['target_dob']) && $targets['target_dob'] != ''){echo $targets['target_dob']; } ?>" /> </div>
                                       
                                        <div class="form-group bb">
                                            <label class="control-label">Target Gender</label>
                                            <input type="text" placeholder="Enter Code" class="form-control" disabled="" name="target_gender" id="target_gender" value="<?php if(isset($targets['target_gender']) && $targets['target_gender'] != ''){echo $targets['target_gender']; } ?>" /> </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label">Target Status</label>
                                            <input type="text" placeholder="Enter Code" class="form-control" disabled="" name="target_status" id="target_status" value="<?php if(isset($targets['association_status']) && $targets['association_status'] != ''){echo $targets['association_status']; } ?>" /> </div>
                                       
                                       <div class="form-group bb">
                                           <label class="control-label">Target Company</label>
                                           <input type="text" placeholder="Enter Target Company" class="form-control" disabled="" name="target_company_name" id="target_company_name" value="<?php if(isset($targets['target_company_name']) && $targets['target_company_name'] != ''){echo $targets['target_company_name']; } ?>" />
                                       </div>   
                                       <div class="form-group">
                                           <label class="control-label">Industry Type</label>
                                           <input type="text" placeholder="Enter Target Company" class="form-control" disabled="" name="industry_type" id="industry_type" value="<?php if(isset($targets['industry_type']) && $targets['industry_type'] != ''){echo $targets['industry_type']; } ?>" />
                                       </div>
                                       <?php if($role_code == 'FIRMADM' ) { ?>
                                        <div class="form-group">
                                           <label class="control-label">Attorney</label>
                                           <input type="text" placeholder="Enter Target Company" class="form-control" disabled="" name="attorney_seq_no" id="attorney_seq_no" value="<?php if(isset($targets['attorney_seq_no']) && $targets['attorney_seq_no'] != ''){echo $targets['attorney_seq_no']; } ?>" />
                                       </div>
                                        <?php } ?>
                                        <div class="form-group">
                                                  <label class="control-label">Social Security No</label>
                                                  <input type="text" value="<?php echo $targets['social_security_no']; ?>" disabled="disabled" placeholder="Enter SSN" class="form-control" name="social_security_no" id="social_security_no"  /> </div>
                                          <div class="form-group">
                                                    <label class="control-label">Social URL</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Social URL" name="social_url" id="social_url" value="<?php if(isset($address['social_media_url']) && $address['social_media_url'] != ''){echo $address['social_media_url']; } ?>" /> 
                                                </div>
                                                  
                                     <div class="form-group required">
                                                  <label class="control-label">Twitter URL</label>
                                                  <input type="text" placeholder="Enter Twitter URL" disabled="disabled" value="<?php echo $address['twitter']; ?>" class="form-control" name="twit" id="twit" /> 
                                         </div>   
                                         <div class="form-group required">
                                                  <label class="control-label">LinkedIn URL</label>
                                                  <input type="text" placeholder="Enter LinkedIn URL" disabled="disabled" value="<?php echo $address['linkedin']; ?>" class="form-control" name="link" id="link"/> 
                                         </div>  
                                         <div class="form-group required">
                                                  <label class="control-label">Google Plus URL</label>
                                                  <input type="text" placeholder="Enter Google Plus URL" disabled="disabled" value="<?php echo $address['google_plus']; ?>" class="form-control" name="goog" id="goog" /> 
                                         </div>
                                         <div class="form-group required">
                                                  <label class="control-label">Youtube URL</label>
                                                  <input type="text" placeholder="Enter Youtube URL" disabled="disabled" value="<?php echo $address['youtube']; ?>" class="form-control" name="yout" id="yout"/> 
                                         </div>
                                         <div class="form-group required">
                                                  <label class="control-label">IM</label>
                                                  <input type="text" placeholder="Enter IM" disabled="disabled" value="<?php echo $address['im']; ?>" class="form-control" name="im" id="im"/> 
                                         </div>
                                       
                                       <h3 class="hint"> Remarks </h3>

                                        <div class="form-group">
                                            <label class="control-label">Remarks</label>
                                            <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks1"><?php if(isset($targets['remarks_notes']) && $targets['remarks_notes'] != ''){echo $targets['remarks_notes']; } ?></textarea>
                                        </div>

                               </div>
                               <div class="col-md-6">
                                   <h3 class="hint"> Enter Address </h3>
                                     <input type="hidden" name="firmid_2" id="firmid_2" value="<?php if(isset($address['id']) && $address['id'] != ''){echo $address['id']; } ?>">            
                                                <div id="validate_div_12" >
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Email" name="email" id="email" value="<?php if(isset($address['email']) && $address['email'] != ''){echo $address['email']; } ?>" />   
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Phone</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Phone" name="phone" id="phone" value="<?php if(isset($address['phone']) && $address['phone'] != ''){echo $address['phone']; } ?>" />    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Fax</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Facsimile" name="fax" id="fax" value="<?php if(isset($address['fax']) && $address['fax'] != ''){echo $address['fax']; } ?>" />    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mobile</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Mobile" name="mobile" id="mobile" value="<?php if(isset($address['mobile_cell']) && $address['mobile_cell'] != ''){echo $address['mobile_cell']; } ?>"/> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Website URL</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Website URL" name="web_url" id="web_url" value="<?php if(isset($address['website_url']) && $address['website_url'] != ''){echo $address['website_url']; } ?>" /> 
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 1</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 1" name="addr_line_1" id="addr_line_1" value="<?php if(isset($address['address_line1']) && $address['address_line1'] != ''){echo $address['address_line1']; } ?>" /> </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 2" name="addr_line_2" id="addr_line_2" value="<?php if(isset($address['address_line2']) && $address['address_line2'] != ''){echo $address['address_line2']; } ?>"  /> </div>
                                                <div class="form-group">
                                                <label class="control-label">Address Line 3</label>
                                                <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 2" name="addr_line_3" id="addr_line_3" value="<?php if(isset($address['address_line3']) && $address['address_line3'] != ''){echo $address['address_line3']; } ?>"  /> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address['country']) && $address['country'] != ''){echo $address['country']; } ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address['state']) && $address['state'] != ''){echo $address['state']; } ?>" />
                                                </div>
<!--                                                <div class="form-group">
                                                    <label class="control-label">County</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="County" name="addr_line_3" value="<?php if(isset($address['county']) && $address['county'] != ''){echo $address['county']; } ?>" />
                                                </div>-->
                                                <div class="form-group">
                                                    <label class="control-label">City/Town</label>
                                                    <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address['city']) && $address['city'] != ''){echo $address['city']; } ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Postal Code</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" disabled="" name="postal_code" id="postal_code" value="<?php if(isset($address['postal_code']) && $address['postal_code'] != ''){echo $address['postal_code']; } ?>"  /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address Remarks</label>
                                                    <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($address['remarks_notes']) && $address['remarks_notes'] != ''){echo $address['remarks_notes']; } ?></textarea>
                                                </div>
                                                    
                                                <div class="margiv-top-10">
                                                    <!--<button type="submit" id="general-submit-btn" class="btn green" name="add_target">Submit</button>-->
                                                    <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                </div>
                               </div>
                               </form>
                               </div>
                           </div>
                            
                        </div>
                        <div class="row">
                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                
                                                <th> First Name </th>
                                                 <th> Last Name </th>
                                                <th> Designation </th>
                                                <th> Phone </th>
                                                <th> Email </th>
                                                <th> Fax </th>
<!--                                                <th> Action </th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($all_contact as $key => $val) { ?>
                                                <tr>
                                                    <td> <?php echo ++$i; ?> </td>
                                                  
                                                    <td> <a href="<?php echo $base_url; ?>targets/con_view/<?php echo base64_encode($val['contact_seq_no']); ?>"><?php echo $val['first_name']; ?> </a></td>
                                                 
                                                    <td> <a href="<?php echo $base_url; ?>targets/con_view/<?php echo base64_encode($val['contact_seq_no']); ?>"><?php echo $val['last_name']; ?></a> </td>
                                                    <td> <?php echo $val['designation']; ?> </td>
                                                    <td> <?php echo $val['phone']; ?> </td>
                                                  <td> <?php echo $val['email']; ?> </td>
                                                    <td> <?php echo $val['fax']; ?> </td>
                                                    <!--<td>Edit</td>-->

                                                    
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
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
    <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>"; </script>
    <!-- address db -->
    <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/target_add_edit.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
    <!-- address db -->
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

</style>
<script type="text/javascript">

   // $(document).ready(function () {
       
         var t= '<?php echo $targets['type']; ?>';
      
               //alert(t);
                 
                    if (t === 'I') {
                        $('.bb').show();
                        $('.org').hide();
                    } else if (t === 'O') {
                       $('.org').show();
                        $('.bb').hide();
                    } else {
                        $('.org').hide();
                        $('.ind').hide();
                    }
                
    //});
                                                          
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
        $("#social_security_no").inputmask("999-99-9999", {
            placeholder: " ",
            clearMaskOnLostFocus: true
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
    </body>

</html> 
