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
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Staff</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>View</span>
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
                                <span class="caption-subject bold uppercase">View Employee/Staff</span>
                            </div>
                                                                <div class="actions">
                                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                        <label class="btn dark btn-outline btn-circle  active">
                                                                            <input type="radio" name="options" class="toggle" id="option1"><a style=" text-decoration: none; color:#fff"s href="javascript:void(0)" onclick="history.back()">Back</a></label>
                                                                        <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                                            <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                                                    </div>
                                                                </div>

                        </div>

                        <div class="portlet-body">
                           <div class="tab-content">
                               
                               <div class="tab-pane active" id="tab_1_1">
                                   <div class="row">
                                   <div class="add_form_sec">
                                       <form role="form" autocomplete="off" id="edit_employee_frm1" method="post" action="<?php echo $base_url . 'employee/edit'; ?>/<?php echo base64_encode($emp_edit['empstaff_seq_no']); ?>" enctype="multipart/form-data">
                                      
                                        <?php $smsg = $this->session->flashdata('err_message'); 
                                             if(isset($smsg) && $smsg != '') { 
                                        ?>
                                         <div class="alert alert-danger" id="general_msg_success" >
                                             <strong>Error!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                         </div>
                                         <?php } ?>

                                         <?php $smsg = $this->session->flashdata('suc_message'); if(isset($smsg) && $smsg != ''){ ?>
                                         <div class="alert alert-success" id="general_msg_success" >
                                             <strong>Success!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                         </div>
                                         <?php } ?>

                                         <input type="hidden" name="empstaff_seq_no" value="<?php echo base64_encode($attorney['empstaff_seq_no']); ?>">
                                         <div class="col-md-12">
                                             <div style=" width: 100%; display:  inline-block;">
                                                 <div class="col-md-6">
                                                     <div class="col-md-12">
                                             <h3 class="hint"> User Credentials </h3>
                                             <div class="form-group">
                                                <label class="control-label">Username</label>
                                                <input type="text" placeholder="Enter User ID" class="form-control" disabled="" name="user_id" id="user_id" value="<?php if(isset($emp_edit['user_id']) && $emp_edit['user_id'] != ''){echo $emp_edit['user_id']; } ?>" /> </div>
                                                <input type="hidden" name="original_user_id" id="original_user_id" value="<?php if(isset($emp_edit['user_id']) && $emp_edit['user_id'] != ''){echo $emp_edit['user_id']; } ?>">
                                            <div class="form-group">
                                                  <label class="control-label">Group</label>
                                                  <select name="group_code" id="group_code" disabled=""class="form-control">
                                                        <option value="">Select Group</option>
                                                          <?php foreach($codes['Groups'] as $key1=>$value1){ ?>
                                                            <option value="<?php echo $value1['code']; ?>" <?php if($emp_edit['group_code'] == $value1['code']){ echo 'selected="selected"'; } ?>><?php echo $value1['short_description']; ?></option>
                                                          <?php } ?>
                                                      </select>
                                                  </div>
                                         </div>
                                                     
                                                      <div class="col-md-12">
                                             <div style=" width: 100%; display: inline-block;">
                                                <h3 class="hint"> Employment Information </h3>
                                                
                                                <div class="form-group">
                                                     <label class="control-label"> EmpStaff Title</label>
                                                     <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="EmpStaff Title" name="empstaff_title" value="<?php echo $emp_edit['empstaff_title']; ?>" /> </div>

                                               <div class="form-group">
                                                        <label class="control-label">Job Type</label>  
                                                        <select name="full_part_time" id="full_part_time" disabled="" class="form-control">
                                                          <option value="">Select Job Type</option>
                                                            <?php foreach($codes['Job Type'] as $key1=>$value1){ ?>
                                                              <option value="<?php echo $value1['code']; ?>" <?php if($emp_edit['job_type'] == $value1['code']){ echo 'selected="selected"';} ?>><?php echo $value1['short_description']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                     <div class="input-group date date-picker" data-date-format="dd-M-yyyy">
                                                     <label class="control-label">Firm Join Date</label>
                                                     <input aria-describedby="datepicker-error" disabled="" aria-invalid="false" aria-required="true" class="form-control" type="text" name="firm_join_date" value="<?php echo $emp_edit['firm_join_date']; ?>" placeholder="DD-MMM-YYYY" >
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                         <div class="form-group">
                                                        <label class="control-label">Staff Experience</label>
                                                        <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Staff Experience" name="experience" value="<?php echo $emp_edit['experience']; ?>" /> </div>


                                                         <div class="form-group">
                                                        <label class="control-label">Salary Cost</label>
                                                        <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Salary Cost" name="salary_cost" id="salary_cost" value="<?php echo $emp_edit['salary_cost']; ?>" /> </div>

                                                         <div class="form-group">
                                                        <label class="control-label">Benefit Cost</label>
                                                        <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Benefit Cost" name="benefit_cost" id="benefit_cost" value="<?php echo $emp_edit['benefit_cost']; ?>" /> </div>


                                                        <div class="form-group">
                                                        <label class="control-label">Overhead Factor%</label>
                                                        <input class="form-control placeholder-no-fix" type="text" disabled=""placeholder="Overhead Factor%" name="overhead_factor" value="<?php echo $emp_edit['overhead_factor']; ?>" /> </div>
                                             </div> 
                                         </div>
                                                     
                                                    
                                                     
                                                 </div>
                                                 
                                                 
                                                     
                                                 <div class="col-md-6">
                                                     <div class="col-md-12">
                                             <h3 class="hint"> General Information </h3>
                                              <?php if ($role_code == 'SITEADM') { ?>
                                                <div class="form-group">
                                                  <label class="control-label">Base Firm Name</label>
                                                  <select name="firm_seq_no" id="firm_seq_no" disabled="" class="form-control">
                                                    <option value="">Select Firm</option>
                                                      <?php foreach($all_firms as $key1=>$value1){ ?>
                                                        <option value="<?php echo $value1['firm_seq_no']; ?>" <?php if($emp_edit['firm_seq_no'] == $value1['firm_seq_no']){ echo 'selected="selected"'; } ?>><?php echo $value1['firm_name']; ?></option>
                                                      <?php } ?>
                                                  </select>
                                                </div>
                                          <?php  } ?>
                                         <div class="form-group">
                                                  <label class="control-label"> EmpStaff ID </label>
                                                  <input type="text" placeholder="EmpStaff ID" class="form-control" disabled="" name="empstaff_id" id="empstaff_id" value="<?php echo $emp_edit['empstaff_id']; ?>" /> </div>
                                             <div class="form-group">
                                                  <label class="control-label"> EmpStaff Code </label>
                                                  <input type="text" placeholder="Enter Firm ID" class="form-control" disabled="" name="empstaff_code" id="empstaff_code" value="<?php echo $emp_edit['empstaff_code']; ?>" /> </div>
                                              <div class="form-group">
                                                  <label class="control-label"> First Name </label>
                                                  <input type="text" placeholder="Employee First Name" class="form-control" disabled="" name="emp_first_name" id="emp_first_name" value="<?php echo $emp_edit['empstaff_first_name']; ?>" /> </div>
                                                  <div class="form-group">
                                                  <label class="control-label"> Last Name </label>
                                                  <input type="text" placeholder="Employee Last Name" class="form-control" disabled="" name="emp_last_name" id="emp_last_name" value="<?php echo $emp_edit['empstaff_last_name']; ?>" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Gender</label>
                                                        <select name="empstaff_gender" id="empstaff_gender" disabled=""class="form-control">
                                                              <option value="">Select Gender</option>
                                                                <?php foreach($codes['Gender'] as $key1=>$value1){ ?>
                                                                  <option value="<?php echo $value1['code']; ?>" <?php if($emp_edit['empstaff_gender'] == $value1['code']){ echo 'selected="selected"';} ?>><?php echo $value1['short_description']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Education</label>
                                                        <input class="form-control placeholder-no-fix" type="text" disabled=""placeholder="Education" name="empstaff_education" value="<?php echo $emp_edit['empstaff_education']; ?>" /> </div>
                                                    

                                                     <div class="input-group date date-picker" data-date-format="dd-M-yyyy">
                                                     <label class="control-label">Date Of Birth </label>
                                                     <input aria-describedby="datepicker-error" disabled="" aria-invalid="false" aria-required="true" class="form-control" type="text" name="empstaff_dob" value="<?php echo $emp_edit['empstaff_dob']; ?>" placeholder="DD-MMM-YYYY" >
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    
                                         </div> 
                                         
                                         <div class="col-md-12">
                                                <h3 class="hint"> Address Details </h3>
                                                 <div class="form-group required">
                                                        <label class="control-label">Email</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" disabled name="email" id="email" value="<?php if(isset($emp_edit['email']) && $emp_edit['email'] != ''){echo $emp_edit['email']; } ?>">            
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Phone</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" disabled name="phone" id="phone" value="<?php if(isset($emp_edit['phone']) && $emp_edit['phone'] != ''){echo $emp_edit['phone']; } ?>" />
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Fax</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Fax" disabled name="fax" id="fax" value="<?php if(isset($emp_edit['fax']) && $emp_edit['fax'] != ''){echo $emp_edit['fax']; } ?>" />
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Mobile</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" disabled name="mobile" id="mobile" value="<?php if(isset($emp_edit['mobile_cell']) && $emp_edit['mobile_cell'] != ''){echo $emp_edit['mobile_cell']; } ?>" /> 
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Website URL</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" disabled name="web_url" id="web_url" value="<?php if(isset($emp_edit['website_url']) && $emp_edit['website_url'] != ''){echo $emp_edit['website_url']; } ?>" /> 
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Social URL</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" disabled name="social_url" id="social_url" value="<?php if(isset($emp_edit['social_media_url']) && $emp_edit['social_media_url'] != ''){echo $emp_edit['social_media_url']; } ?>"/> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Address Line 1</label>
                                                        <input type="text" placeholder="Address Line 1" class="form-control" disabled name="addr_line1" id="addr_line1" value="<?php if(isset($emp_edit['address_line1']) && $emp_edit['address_line1'] != ''){echo $emp_edit['address_line1']; } ?>" /> </div>
                                                   <div class="form-group">
                                                        <label class="control-label">Address Line 2</label>
                                                        <input type="text" placeholder="Address Line 2" class="form-control" disabled="" name="addr_line2" id="addr_line2" value="<?php if(isset($emp_edit['address_line2']) && $emp_edit['address_line2'] != ''){echo $emp_edit['address_line2']; } ?>" /> </div>
                                                        <div class="form-group">
                                                        <label class="control-label">Address Line 3</label>
                                                        <input type="text" placeholder="Address Line 3" class="form-control" disabled="" name="addr_line3" id="addr_line3" value="<?php if(isset($emp_edit['address_line3']) && $emp_edit['address_line3'] != ''){echo $emp_edit['address_line3']; } ?>" /> </div>
                                                   <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <select name="country" id="country" disabled="" class="form-control">
                                                         <option value="">Country</option>
                                                         <?php if(isset($country_info) && $country_info != ''){echo $country_info; } ?>
                                                    </select>
                                                </div>
                                                
                                               <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <select name="state" id="state" disabled="" class="form-control">
                                                        <option value="">State</option>
                                                          <?php if(isset($state_info) && $state_info != ''){echo $state_info; } ?>
                                                    </select>
                                                </div>
                                               <div class="form-group">
                                                    <label class="control-label">City/Town</label>
                                                    <select name="city" id="city" disabled="" class="form-control">
                                                        <option value="">City/Town</option>
                                                        <?php if(isset($city_info) && $city_info != ''){echo $city_info; } ?>
                                                    </select>
                                                </div>
                                                            
                                                <div class="form-group">
                                                    <label class="control-label">Postal Code</label>
                                                    <input type="text" placeholder="Postal Code" class="form-control" disabled="" name="postal_code" id="postal_code"value="<?php if(isset($emp_edit['postal_code']) && $emp_edit['postal_code'] != ''){echo $emp_edit['postal_code']; } ?>" /> </div>     
                                                            
                                                        </div>  
                                         
                                                     
                                         <div class="col-md-12">
                                              <h3> Profile Photo </h3>
                                                <div class="form-group">
                                                    <label class="control-label">Upload Image</label><br>
                                                    <img src="<?php echo $base_url . 'assets/upload/employee/' . $emp_edit['profile_photo']; ?>" alt="" width="150" height="100"/>
                                                    <br><br>
                                                    <!--<input class="form-control placeholder-no-fix" type="file" placeholder="Photo" disabled="" name="profile_photo"  />--> 
                                                </div>

                                                <h3> Remarks </h3>
                                                        <div class="form-group">
                                                         <label class="control-label">Remarks</label>
                                                         <textarea class="form-control" rows="3" placeholder="Remarks" disabled="" name="remarks"><?php if(isset($emp_edit['remark']) && $emp_edit['remark'] != ''){echo $emp_edit['remark']; } ?></textarea>
                                                     </div>
<!--
                                                 <div class="margiv-top-10">
                                                   <button type="submit" id="edit_employee_btn" class="btn green" name="edit_employee_btn">Submit</button>
                                                    <a href="javascript:;" class="btn default"> Cancel </a> 
                                               </div>-->
                                             
                                         </div>
                                                   
                                                     
                                                 </div>       
                                                
                                               
                                         
                                                 
                                        </div>
                                            
                                            
                                         </div>
                                        
                                         

                                       
                                       </form>
                                   </div>
                                   </div>
                               </div>

                               <div class="tab-pane" id="tab_1_2">
                                   <div class="portlet-body">

                                       <div class="portlet-title">
                                           <div class="caption font-dark">
                                               <i class="icon-settings font-dark"></i>
                                               <span class="caption-subject bold uppercase">Attorney Manager</span>
                                           </div>
                                       </div>

                                       <div style="margin-top:70px;"></div>
                                      <div class="table-toolbar">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="btn-group">
                                                      <!-- <a href="<?php echo $base_url; ?>firm/add" class="btn btn-outline sbold"  > --> <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                          <button class="btn sbold green"> Add New
                                                              <i class="fa fa-plus"></i>
                                                          </button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                       <table class="table table-striped table-bordered table-hover table-responsive" id="sample_22">
                                           <thead>
                                               <tr class="">
                                                    <th>SL#</th>
                                                   <th> Attorney Name </th>
                                                   <th> Jurisdiction </th>
                                                   <th> Industry Type </th>
                                                   <th> Job Type </th>
                                                  <th>  Firm join Date </th>
                                                   <th> Actions </th>
                                               </tr>
                                           </thead>
                                          
                                           </tbody>
                                           <?php // t($all_att_mgr); ?>
                                              <?php $i = 0; foreach( $all_att_mgr as $key1 => $val1 ){ ?>
                                               <tr>
                                                   <td> <?php echo ++$i; ?></td>
                                                   <td> <?php echo $val1['attorney_last_name'] . ',' . $val1['attorney_first_name'] ; ?> </td>
                                                   <td> <?php echo $val1['attorney_jurisdiction'] ; ?> </td>
                                                   <td> <?php echo $val1['industry_type'] ; ?> </td>
                                                   <td> <?php echo $val1['full_part_time'] ; ?> </td>
                                                   <td> <?php echo $val1['firm_join_date'] ; ?> </td>
                                                   
                                                   <td>
                                                       <div class="btn-group">
                                                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                               <i class="fa fa-angle-down"></i>
                                                           </button>
                                                           <ul class="dropdown-menu" role="menu">
                                                               
                                                               <li>
                                                                   <a href="#att_responsive_view_<?php echo $val1['art_relation_seq_no']; ?>" data-toggle="modal" >
                                                                       <i class="icon-docs"></i> View </a>
                                                               </li>
                                                               <li>
                                                                   <a href="#att_responsive_edit_<?php echo $val1['art_relation_seq_no']; ?>" data-toggle="modal" >
                                                                       <i class="icon-tag"></i> Edit
                                                                   </a>
                                                               </li>
                                                               <li>
                                                                   <a href="javascript:;">
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
                               <!-- END CHANGE AVATAR TAB -->
                               <!-- CHANGE PASSWORD TAB -->
                               <div class="tab-pane" id="tab_1_3">
                                   <div class="portlet-body">

                                       <div class="portlet-title">
                                           <div class="caption font-dark">
                                               <i class="icon-settings font-dark"></i>
                                               <span class="caption-subject bold uppercase">Strategy Group</span>
                                           </div>
                                       </div>

                                       <div style="margin-top:70px;"></div>
                                      <div class="table-toolbar">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="btn-group">
                                                      <a href="#responsive1" class="btn btn-outline sbold" data-toggle="modal" >
                                                          <button class="btn sbold green"> Add New
                                                              <i class="fa fa-plus"></i>
                                                          </button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                       <table class="table table-striped table-bordered table-hover table-responsive" id="sample_21">
                                           <thead>
                                               <tr class="">
                                                   <th> Strategy Group Name </th>
                                                   <th> Remarks/ Notes </th>
                                                   <th> Actions </th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                           <?php $i = 0; foreach( $all_firm_sgsec as $key1 => $val1 ){ ?>
                                               <tr>
                                                   <td> <?php echo $val1['sg_section_name']; ?> </td>
                                                   <td> <?php echo $val1['remarks_notes']; ?> </td>
                                                   
                                                   <td>
                                                       <div class="btn-group">
                                                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                               <i class="fa fa-angle-down"></i>
                                                           </button>
                                                           <ul class="dropdown-menu" role="menu">
                                                               <li>
                                                                   <a href="#sgsec_responsive_view_<?php echo $val1['asg_relation_seq_no']; ?>" data-toggle="modal" >
                                                                       <i class="icon-docs"></i> View </a>
                                                               </li>
                                                               <li>
                                                                   <a href="#sgsec_responsive_edit_<?php echo $val1['asg_relation_seq_no']; ?>" data-toggle="modal" >
                                                                       <i class="icon-tag"></i> Edit
                                                                   </a>
                                                               </li>
                                                               <li>
                                                                   <a href="javascript:;">
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
                              

                              <div class="tab-pane" id="tab_1_4">
                                
                                       <div class="portlet-body">

                                           <div class="portlet-title">
                                               <div class="caption font-dark">
                                                   <i class="icon-settings font-dark"></i>
                                                   <span class="caption-subject bold uppercase">Section</span>
                                               </div>
                                           </div>

                                           <div style="margin-top:70px;"></div>
                                            <div class="table-toolbar">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="btn-group">
                                                            <a href="#responsive2" class="btn btn-outline sbold" data-toggle="modal" > 
                                                                <button class="btn sbold green"> Add New
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <table class="table table-striped table-bordered table-hover table-responsive" id="sample_33">
                                               <thead>
                                                   <tr class="">
                                                       <th> Section Name </th>
                                                       <th> Remarks/ Notes </th>
                                                       <th> Actions </th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                               <?php $i = 0; foreach( $all_firm_sec as $key1 => $val1 ){ ; ?>
                                                   <tr>
                                                       <td> <?php echo $val1['sg_section_name']; ?> </td>
                                                   <td> <?php echo $val1['remarks_notes']; ?> </td>
                                                       
                                                       <td>
                                                           <div class="btn-group">
                                                               <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                   <i class="fa fa-angle-down"></i>
                                                               </button>
                                                               <ul class="dropdown-menu" role="menu">
                                                                   <li>
                                                                       <a href="#sec_responsive_view_<?php echo $val1['asec_relation_seq_no']; ?>" data-toggle="modal" >
                                                                           <i class="icon-docs"></i> View </a>
                                                                   </li>
                                                                   <li>
                                                                       <a href="#sec_responsive_edit_<?php echo $val1['asec_relation_seq_no']; ?>" data-toggle="modal" >
                                                                           <i class="icon-tag"></i> Edit
                                                                       </a>
                                                                   </li>
                                                                   <li>
                                                                       <a href="javascript:;">
                                                                           <i class="icon-tag"></i> Delete </a>
                                                                   </li>
                                                               </ul>
                                                           </div>
                                                       </td>
                                                   </tr>
                                                <?php  } ?>                                            
                                                   
                                               </tbody>
                                           </table>
                                       </div>
                                   
                              </div>

                               <!-- END CHANGE PASSWORD TAB -->
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
    <script src="<?php echo $assets_path; ?>custom/js/validate/employee_add_edit.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
     <script type="text/javascript">     
       var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        $("#salary_cost").inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            prefix: '$ ', 
            rightAlign: false
});

        $("#benefit_cost").inputmask("numeric", {
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
    
    <style type="text/css">
    .btn.default:not(.btn-outline) {
    background-color: #e1e5ec;
    border-color: #e1e5ec;
    color: #666;
    top:13px !important;
}

.add_form_sec{ margin: 0; width: 80%;  display: inline-block; background: #fafafa }

</style>
    </body>

</html> 