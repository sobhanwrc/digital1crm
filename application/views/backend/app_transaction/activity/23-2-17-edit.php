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
                                <a href="#">Activity </a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Update</span>
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
                                        <span class="caption-subject bold uppercase">Activity Update</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1"><a style="color:#fff; text-decoration:none;" href="" onclick="history.back()"> Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                            <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">
                           
                                   <div class="row">
                                    <div class="add_input_edit_area">
                                    <div class="add_form_sec">
                                        <form role="form" autocomplete="off" id="add_new_activity_frm" method="post" action="<?php echo $base_url . 'activity/edit/'  . base64_encode($this_activity['activity_seq_no']); ?>" enctype="multipart/form-data">
                                      
                                      <div class="col-md-12"><h3 class="hint"> General Information </h3></div>

                                       <div class="col-md-8">
                                        <?php $smsg = $this->session->flashdata('err_message'); if(isset($smsg) && $smsg != ''){ ?>
                                         <div class="alert alert-danger" id="general_msg_success" >
                                             <strong>Error!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                         </div>
                                         <?php } ?>

                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Firm:</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="" id="" class="form-control" value="<?php echo $att_firm[0]['firm_name']; ?>" >
                                                    <input type="hidden" name="firm_seq_no" value="<?php echo $att_firm[0]['firm_seq_no']; ?>">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Origin Attorney:</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="" id="" class="form-control" value="<?php echo $att_firm[0]['attorney_first_name'] .' '. $att_firm[0]['attorney_last_name']; ?>" >
                                                    <input type="hidden" name="origin_attorney_seq_no" value="<?php echo $att_firm[0]['attorney_seq_no']; ?>">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Activity Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="activity_name" placeholder="Enter Activity Name" value="<?php echo $this_activity['activity_name']; ?>">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                           
                                           
                                           <div class="form-group required" style=" width: 100%; display: inline-block">
                                                <label class="col-md-4 control-label">Activity Goal:</label>
                                                <div class="radio-list col-md-8">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="activity_goal_radio"  class="form-control act_goal" id="new_goal" value="new_goal" <?php  if($this_activity['act_option'] == "new_goal") {?>checked <?php } ?>> New Goal </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="activity_goal_radio" class="form-control act_goal" id="existing_goals" value="existing_goals" <?php  if($this_activity['act_option'] == "existing_goals") {?>checked <?php } ?>> Existing Goals </label>
                                                </div>
                                            </div>
                                                        
                                                        <div class="form-group new_act_goal required">
                                                            <label class="col-md-4 control-label">
                                                                Activity Goal:
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="new_act_goal" id="new_act_goal" placeholder="Enter Activity Goal" value="<?php echo $this_activity['activity_goal']; ?>">
                                                                <span class="help-block"> </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group existing_act_goal required">
                                                            <label class="col-md-4 control-label">Select From Existing Goals:</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="existing_act_goal" id="existing_act_goal" >
                                                                    <option value="">Select One</option>
                                                                    <?php foreach ($activity_goal as $key => $value) { ?>
                                                                        <option value="<?php echo $value['activity_goal']; ?>" <?php if($this_activity['activity_goal'] == $value['activity_goal']){ echo 'selected="selected"'; } ?>><?php echo $value['activity_goal']; ?></option>
                                                                   <?php } ?>
                                                                </select>
                                                                <span class="help-block">  </span>
                                                            </div>
                                                        </div>

                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Activity Type:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="activity_type" id="activity_type">
                                                        <option value="">Select One</option>
                                                        <?php foreach($activity_type as $key => $value ){ ?>
                                                            <option value="<?php echo $value['code']; ?>" <?php if($this_activity['activity_type'] == $value['code']){ echo 'selected="selected"'; } ?>><?php echo $value['short_description']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Practice Area Type:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="practice_area_type" id="practice_area_type">
                                                        <option value="">Select One</option>
                                                        <?php foreach($practice_area as $key => $value ){ ?>
                                                            <option value="<?php echo $value['practice_area_seq_no']; ?>" <?php if($this_activity['practice_area_type'] == $value['practice_area_seq_no']){ echo 'selected="selected"'; } ?>><?php echo $value['practice_area_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group strat_group required">
                                                <label class="col-md-4 control-label">Strategy Group:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm_sg_seq_no" id="firm_sg_seq_no">
                                                        <option value="">Select One</option>
                                                        <?php foreach($sg as $key1 => $value1 ){ ?>
                                                            <option value="<?php echo $value1['firm_sg_seq_no']; ?>" <?php if($this_activity['firm_sg_seq_no'] == $value1['firm_sg_seq_no']){ echo 'selected="selected"'; } ?>><?php echo $value1['sg_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group section required">
                                                <label class="col-md-4 control-label">Section :</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="firm_section_seq_no" id="firm_section_seq_no">
                                                        <option value="">Select One</option>
                                                        <?php foreach($section as $key1 => $value1 ){ ?>
                                                            <option value="<?php echo $value1['firm_section_seq_no']; ?>" <?php if($this_activity['firm_section_seq_no'] == $value1['firm_section_seq_no']){ echo 'selected="selected"'; } ?>><?php echo $value1['section_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Activity Reason:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" style="height:80px;" name="activity_reason_desc" placeholder="Enter Activity Reason"><?php echo $this_activity['activity_reason_desc']; ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
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
                                            </div> -->
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Potential Revenue:</label>
                                                <div class="col-md-8">
                                                    <input type="text" value="<?php echo $this_activity['potential_revenue']; ?>" class="form-control" name="potential_revenue" placeholder="Enter Potential Revenue" id="potential_revenue">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Activity Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="activity_status">
                                                        <option value="">Select One</option>
                                                        <?php foreach($activity_status as $key => $value ){ ?>
                                                            <option value="<?php echo $value['code']; ?>" <?php if($this_activity['activity_status'] == $value['code']){ echo 'selected="selected"'; } ?>><?php echo $value['short_description']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group date date-picker required" data-date-format="dd-M-yyyy">
                                              <label class="col-md-4 control-label">Activity Creation Date</label>
                                              <div class="col-md-8">
                                                 <input style=" width:89%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="activity_created_date" placeholder="DD-MMM-YYYY" value="<?php echo $this_activity['activity_created_date']; ?>" >
                                                 <span class="input-group-btn">
                                                     <button class="btn default" type="button">
                                                         <i class="fa fa-calendar"></i>
                                                     </button>
                                                 </span>
                                                </div>
                                            </div>

                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Duration</label>
                                                <div class="col-md-8">
                                                    <div class="col-md-6" style=" padding-left:0; padding-right:0;">
                                                        <div class="input-group date date-picker" data-date-format="dd-M-yyyy">
                                                        
                                                          
                                                             
                                                         <table width="100%" align="left">
                                                        	<tr>
                                                            	<td width="100%">
                                                                	<table width="100%">
                                                                    	<tr>
                                                                        	<td width="100%"><label class="control-label">From</label></td>
                                                                        </tr>
                                                                        <tr>
                                                                        	<td width="100%">
                                                                            	<input style="width:75%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="duration_from" placeholder="DD-MMM-YYYY" value="<?php echo $this_activity['duration_from']; ?>" >
                                                             <span class="input-group-btn">
                                                                 <button class="btn default" type="button">
                                                                     <i class="fa fa-calendar"></i>
                                                                 </button>
                                                             </span>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                
                                                            </tr>
                                                        </table>
                                                         
                                                         
                                                         </div>
                                                    
                                                    </div>

                                                    <div class="col-md-6" style=" padding-left:0; padding-right:0;">
                                                        <div class="input-group date date-picker" data-date-format="dd-M-yyyy">
                                                            
                                                        <table width="100%" align="left">
                                                        	<tr>
                                                            	<td width="100%">
                                                                	<table width="100%">
                                                                    	<tr>
                                                                        	<td width="100%"><label class="control-label">To</label></td>
                                                                        </tr>
                                                                        <tr>
                                                                        	<td width="100%">
                                                                            	 <input style=" width:75%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="duration_to" placeholder="DD-MMM-YYYY" value="<?php echo $this_activity['duration_to']; ?>" >
                                                             <span class="input-group-btn">
                                                                 <button class="btn default" type="button">
                                                                     <i class="fa fa-calendar"></i>
                                                                 </button>
                                                             </span>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                
                                                            </tr>
                                                        </table>
                                                        
                                                        
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" style="height:80px;" name="remarks_notes" placeholder="Enter remarks/comments"><?php echo $this_activity['remarks_notes']; ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div> 
                                            <div class="col-md-12 hide" id="show_hide">
                                            <h3 class="hint"> Individual Client/Target Information </h3>
                                            <div class="form-group ">    
                                                <label class="col-md-4 control-label">Activity Details Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="activity_dtl_status" id="activity_dtl_status" disabled="disabled">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($act_dtl_status as $key => $value) {?>
                                                            <option value="<?php echo $value['code']; ?>" <?php if($act_dtl_res[0]['activity_dtl_status'] == $value['code']){ echo 'selected="selected"'; } ?>><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="form-group">
                                                <label class="col-md-4 control-label">Activity Budget Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="act_budget_status" id="act_budget_status">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($act_budget_status as $key => $value) {?>
                                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activity Budget Details Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="budget_dtl_status" id="budget_dtl_status" disabled="disabled">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($budget_dtl_status as $key => $value) {?>
                                                            <option value="<?php echo $value['code']; ?>" <?php if($budget_dtl_status1 == $value['code']){ echo 'selected="selected"'; } ?>><?php echo $value['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                               <div class="form-group" style=" width:100%; display:inline-block">
                                                  <label class="col-md-4 control-label">Relation Type:</label>
                                                  <div class="col-md-8">
                                                  
                                                  <table width="100%">
                                                  	<tr>
                                                    	<td width="50%">
                                                        <input disabled="disabled" style="margin-left: -8px; margin-top: -11px;" type="radio" name="relation_type" id="rel_type1" class="form-control" value="T" onchange="get_rel('T')" <?php if($act_dtl_res[0]['relation_type'] == 'T'){ echo 'checked="checked"'; } ?>> Target 
                                                        </td>
                                                        <td width="50%">
                                                        	<input disabled="disabled" style="margin-left: -8px; margin-top: -11px;" type="radio" name="relation_type" id="rel_type2" class="form-control" value="C" onchange="get_rel('C')" <?php if($act_dtl_res[0]['relation_type'] == 'C'){ echo 'checked="checked"'; } ?>> Client
                                                        </td>
                                                    </tr>
                                                  </table>
                                                      
                                                      
                                                      

                                                      <span class="help-block"> </span>
                                                  </div>
                                              </div>

                                             <div class="form-group" style=" width:100%; display:inline-block">
                                                <label class="col-md-4 control-label">Relation With:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="relation_seq_no" id="relation_seq_no" disabled="disabled">
                                                        <option value="">Select One</option>
                                                        <?php //t($thisallrelation); exit;
                                                            if($act_dtl_res[0]['relation_type'] == 'T'){ $type = 'target_seq_no'; $fname = 'target_first_name'; $lname = 'target_last_name'; } else {$type = 'client_seq_no';$fname = 'client_first_name'; $lname = 'client_last_name';}
                                                            foreach ($thisallrelation as $key => $value) {
                                                                if($value[$type] == $act_dtl_res[0]['relation_seq_no']){ $selected = 'selected="selected"'; }
                                                                echo '<option value="'.$value[$type].'" '.$selected.'>'.$value[$fname] . ' ' . $value[$lname].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                    
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label class="col-md-4 control-label">Budgets:</label>
                                                <div class="col-md-8">
                                                    <a name="add_budget" id="add_budget" class="btn green" href="#responsive_budget" data-toggle="modal">Add Budget</a>
                                                </div>
                                            </div> -->
                                            
                                            </div>

                                            <div class="col-md-12 margiv-top-10">
                                                <button type="submit" name="add_new_activity_btn" id="add_new_activity_btn" class="btn green pull-right">Save</button>
                                            </div>

                                       </div>
                                       </form>
                                   </div>
                                   </div>
                                   
                                   </div>

                                    <div style=" width:100%; display:block;">
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                    <thead>
                                    <tr class="">
                                    <th> SL# </th>
                                    <th> Attorney Name </th>
                                    <th> Relation </th>
                                    <th> Company Name </th>
                                    <th> Budget Code Cost $</th>
                                    <th> Potential Revenue </th>
                                    <th> Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; foreach ($act_dtl_res as $key => $value) { ?>
                                    <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $value['attorney_first_name'] . ' ' . $value['attorney_last_name']; ?></td>
                                    <td><?php if($value['relation_type'] == 'C'){echo 'Client';}else{ echo 'Target'; }  ?></td>
                                    <td><?php echo $value['ct_name'] ; ?></td>
                                    <td><a href="#individual_budget_dtl<?php echo $i; ?>" data-toggle="modal" style="text-decoration:none"><?php echo $value['budgeted_cost'] ; ?></a></td>
                                    <td><?php echo $value['potential_revenue'] ; ?></td>
                                    <td>
                                    <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                    
                                    <li>
                                    <a href="##responsive_view_<?php echo $value['activity_dtl_seq_no']?>" data-toggle="modal" >
                                    <i class="icon-tag"></i> View
                                    </a>
                                    </li>
                                    <!--                                                                    <li>
                                    <a href="javascript:;">
                                    <i class="icon-tag"></i> Delete </a>
                                    </li>-->
                                    </ul>
                                    </div>
                                    </td>
                                    </tr>
                                    
                                    <?php  } ?>
                                    
                                    
                                    </tbody>
                                    </table>
                                    </div>
                                   
                        		</div>
                
                                            </div>

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

<?php 
$j = 0; 
foreach ($ind_bud_dtl as $key => $value) { 
    ?>
<div id="individual_budget_dtl<?php echo ++$j; ?>" class="modal fade responsive_budget11<?php echo $j; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Marketing Budget Code</h4>
            </div>
            <form action="#" method="post" id="my_budg_form<?php echo $j; ?>">
            
            <div class="modal-body">
                <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">

                    <table class="table">
                        <thead>
                          <tr>
                            <th width="50%"></th>
                            <th width="15%">Code</th>
                            <th width="35%" style=" text-align:center">Budget</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="50%"></td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">
                                   <thead>
                                      <tr>
                                        <th width="50%" style=" text-align:center">Hours</th>
                                        <th width="50%" style=" text-align:center">Dollars</th>

                                      </tr>
                                    </thead>

                                    

                                </table>

                            </td>
                          </tr>

                          
                        <!-- One Loop start -->
                          <tr>
                            <td width="50%"><strong>Meals and Entertainment</strong> </td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td width="50%"></td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          <!-- One Loop End -->
                        

                        <!-- main Loop start -->

                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Food and Beverage</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME01</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME01_hr" value="<?php echo $value['ME01']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME01_bud" value="<?php echo $value['ME01']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Admission fees, tickets and venue fees</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME02</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME02_hr" value="<?php echo $value['ME02']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME02_bud" value="<?php echo $value['ME02']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Room rental  - receptions and cocktail parties</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME03</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME03_hr" value="<?php echo $value['ME03']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME03_bud" value="<?php echo $value['ME03']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Gifts and takeaways</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME04</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME04_hr" value="<?php echo $value['ME04']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME04_bud" value="<?php echo $value['ME04']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Labor and Support</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME05</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME05_hr" value="<?php echo $value['ME05']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME05_bud" value="<?php echo $value['ME05']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          
                    <!-- main Loop End -->

                          <!-- One Loop start -->
                          <tr>
                            <td width="50%"><strong>Travel</strong> </td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td width="50%"></td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          <!-- One Loop End -->
                          <!-- main Loop start -->
                        
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Transportation</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR01</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR01_hr" value="<?php echo $value['TR01']['budget_code_hours']; ?>" >
                                                </div>
                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR01_bud" value="<?php echo $value['TR01']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody> 
                                </table>
                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Lodging</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR02</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR02_hr" value="<?php echo $value['TR02']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR02_bud" value="<?php echo $value['TR02']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Mileage</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR03</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR03_hr" value="<?php echo $value['TR03']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR03_bud" value="<?php echo $value['TR03']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Car rental</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR04</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR04_hr" value="<?php echo $value['TR04']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR04_bud" value="<?php echo $value['TR04']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Taxis and Uber</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR05</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR05_hr" value="<?php echo $value['TR05']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR05_bud" value="<?php echo $value['TR05']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                        <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Client transportation (limo's, buses, vans etc.)</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR06</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR06_hr" value="<?php echo $value['TR06']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR06_bud" value="<?php echo $value['TR06']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          
                    <!-- main Loop End -->
                          <!-- One Loop start -->
                          <tr>
                            <td width="50%"><strong>CONFERENCE AND EVENT FEES - ATTEND</strong> </td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td width="50%"></td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          <!-- One Loop End -->
                          <!-- main Loop start -->
                        
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Bar and legal </td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CA01</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CA01_hr" value="<?php echo $value['CA01']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CA01_bud" value="<?php echo $value['CA01']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Industry/other</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CA02</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CA02_hr" value="<?php echo $value['CA02']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CA02_bud" value="<?php echo $value['CA02']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Conference materials</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CA03</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CA03_hr" value="<?php echo $value['CA03']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CA03_bud" value="<?php echo $value['CA03']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                         
                          
                    <!-- main Loop End -->
                    <!-- One Loop start -->
                          <tr>
                            <td width="50%"><strong>CONFERENCE AND EVENT FEES - CLIENTS</strong> </td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td width="50%"></td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          <!-- One Loop End -->
                          <!-- main Loop start -->
                        
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Firm Sponsored venue costs</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC01</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC01_hr" value="<?php echo $value['CC01']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC01_bud" value="<?php echo $value['CC01']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Seminar materials</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC02</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC02_hr" value="<?php echo $value['CC02']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC02_bud" value="<?php echo $value['CC02']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Takeaways and attendee gifts</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC03</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC03_hr" value="<?php echo $value['CC03']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC03_bud" value="<?php echo $value['CC03']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                         <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Audio Video production costs</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC04</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC04_hr" value="<?php echo $value['CC04']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC04_bud" value="<?php echo $value['CC04']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Promotional costs</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC05</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC05_hr" value="<?php echo $value['CC05']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC05_bud" value="<?php echo $value['CC05']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Labor and Support</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC06</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC06_hr" value="<?php echo $value['CC06']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC06_bud" value="<?php echo $value['CC06']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Event planners</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC07</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC07_hr" value="<?php echo $value['CC07']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC07_bud" value="<?php echo $value['CC07']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>


                    <!-- main Loop End -->
                    <!-- One Loop start -->
                          <tr>
                            <td width="50%"><strong>CONTENT/ INBOUND AND OTHER MARKETING SUPPORT</strong> </td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td width="50%"></td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          <!-- One Loop End -->
                          <!-- main Loop start -->
                        
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Content/Inbound and Other Marketing Support</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB01</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB01_hr" value="<?php echo $value['IB01']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB01_bud" value="<?php echo $value['IB01']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Web Development</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB02</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB02_hr" value="<?php echo $value['IB02']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB02_bud" value="<?php echo $value['IB02']['budget_code_cost']; ?>" >
                                                </div> 
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Search Engine Optimization (SEO)</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB03</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB03_hr" value="<?php echo $value['IB03']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB03_bud" value="<?php echo $value['IB03']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                         <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Social Medial Support</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB04</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB04_hr" value="<?php echo $value['IB04']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB04_bud" value="<?php echo $value['IB04']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Production and Distribution costs</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB05</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB05_hr" value="<?php echo $value['IB05']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB05_bud" value="<?php echo $value['IB05']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Video Production Support</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB06</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB06_hr" value="<?php echo $value['IB06']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB06_bud" value="<?php echo $value['IB06']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Graphics Support</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB07</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB07_hr" value="<?php echo $value['IB07']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB07_bud" value="<?php echo $value['IB07']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Editorial Support</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB08</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB08_hr" value="<?php echo $value['IB08']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB08_bud" value="<?php echo $value['IB08']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">CRM/MAS Licensing Fees </td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB09</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB09_hr" value="<?php echo $value['IB09']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB09_bud" value="<?php echo $value['IB09']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Research Databases</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB10</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB10_hr" value="<?php echo $value['IB10']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB10_bud" value="<?php echo $value['IB10']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Paid Advertising and Promotion</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB11</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB11_hr" value="<?php echo $value['IB11']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB11_bud" value="<?php echo $value['IB11']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Content Development </td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB12</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB12_hr" value="<?php echo $value['IB12']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB12_bud" value="<?php echo $value['IB12']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>


                    <!-- main Loop End -->
                    <!-- One Loop start -->
                          <tr>
                            <td width="50%"><strong>PROFESSIONAL SUPPORT</strong> </td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td width="50%"></td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          <!-- One Loop End -->
                          <!-- main Loop start -->
                        
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Marketing</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS01</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS01_hr" value="<?php echo $value['PS01']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS01_bud" value="<?php echo $value['PS01']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Public Relations</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS02</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS02_hr" value="<?php echo $value['PS02']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS02_bud" value="<?php echo $value['PS02']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Advertising</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS03</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS03_hr" value="<?php echo $value['PS03']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS03_bud" value="<?php echo $value['PS03']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                         <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Research</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS04</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS04_hr" value="<?php echo $value['PS04']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS04_bud" value="<?php echo $value['PS04']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Social Medial </td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS05</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS05_hr" value="<?php echo $value['PS05']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS05_bud" value="<?php echo $value['PS05']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                    <!-- main Loop End -->
                    <!-- One Loop start -->
                          <tr>
                            <td width="50%"><strong>STAFFING COSTS</strong> </td>
                            <td width="15%"></td>
                            <td width="35%">
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td width="50%"></td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>

                          <!-- One Loop End -->
                          <!-- main Loop start -->
                        
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Marketing Director</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">SC01</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="SC01_hr" value="<?php echo $value['SC01']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="SC01_bud" value="<?php echo $value['SC01']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Marketing Support Personnel</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">SC02</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="SC02_hr" value="<?php echo $value['SC02']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="SC02_bud" value="<?php echo $value['SC02']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">IT allocation</td>
                            <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">SC03</td>
                            <td width="35%" >
                                <table width="100%">

                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:95%; height:30px; " type="text" class="form-control" name="SC03_hr" value="<?php echo $value['SC03']['budget_code_hours']; ?>" >
                                                </div>

                                            </td>
                                            <td width="50%">
                                                <div class="form-group" style=" margin-bottom:0px">
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="SC03_bud" value="<?php echo $value['SC03']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                       
                    <!-- main Loop End -->
                        </tbody>
                      </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                <button type="button" class="btn green" id="budget_savetosession1<?php echo $j; ?>">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>  
<?php } ?>

            <!-- <div id="responsive_budget" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Marketing Budget Code</h4>
                        </div>
                        <form action="#" method="post" id="my_budg_form">
                        <div class="modal-body">
                            <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">
            
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th width="50%"></th>
                                        <th width="15%">Code</th>
                                        <th width="35%" style=" text-align:center">Budget</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td width="50%"></td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
                                               <thead>
                                                  <tr>
                                                    <th width="50%" style=" text-align:center">Hours</th>
                                                    <th width="50%" style=" text-align:center">Dollars</th>
            
                                                  </tr>
                                                </thead>
            
                                                
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      
                                    One Loop start
                                      <tr>
                                        <td width="50%"><strong>Meals and Entertainment</strong> </td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"></td>
                                                        <td width="50%"></td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      One Loop End
                                    
            
                                    main Loop start
            
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Food and Beverage</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME01</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME01_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME01_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Admission fees, tickets and venue fees</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME02</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME02_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME02_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Room rental  - receptions and cocktail parties</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME03</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME03_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME03_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Gifts and takeaways</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME04</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME04_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME04_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Labor and Support</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">ME05</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME05_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME05_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      
                                main Loop End
            
                                      One Loop start
                                      <tr>
                                        <td width="50%"><strong>Travel</strong> </td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"></td>
                                                        <td width="50%"></td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      One Loop End
                                      main Loop start
                                    
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Transportation</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR01</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR01_hr">
                                                            </div>
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR01_bud">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody> 
                                            </table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Lodging</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR02</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR02_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR02_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Mileage</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR03</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR03_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR03_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Car rental</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR04</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR04_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR04_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Taxis and Uber</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR05</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR05_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR05_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                    <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Client transportation (limo's, buses, vans etc.)</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">TR06</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR06_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR06_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      
                                main Loop End
                                      One Loop start
                                      <tr>
                                        <td width="50%"><strong>CONFERENCE AND EVENT FEES - ATTEND</strong> </td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"></td>
                                                        <td width="50%"></td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      One Loop End
                                      main Loop start
                                    
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Bar and legal </td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CA01</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CA01_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CA01_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Industry/other</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CA02</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CA02_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CA02_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Conference materials</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CA03</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CA03_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CA03_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                     
                                      
                                main Loop End
                                One Loop start
                                      <tr>
                                        <td width="50%"><strong>CONFERENCE AND EVENT FEES - CLIENTS</strong> </td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"></td>
                                                        <td width="50%"></td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      One Loop End
                                      main Loop start
                                    
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Firm Sponsored venue costs</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC01</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC01_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC01_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Seminar materials</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC02</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC02_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC02_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Takeaways and attendee gifts</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC03</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC03_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC03_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                     <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Audio Video production costs</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC04</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC04_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC04_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Promotional costs</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC05</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC05_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC05_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Labor and Support</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC06</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC06_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC06_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Event planners</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">CC07</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC07_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC07_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
            
                                main Loop End
                                One Loop start
                                      <tr>
                                        <td width="50%"><strong>CONTENT/ INBOUND AND OTHER MARKETING SUPPORT</strong> </td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"></td>
                                                        <td width="50%"></td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      One Loop End
                                      main Loop start
                                    
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Content/Inbound and Other Marketing Support</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB01</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB01_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB01_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Web Development</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB02</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB02_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB02_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Search Engine Optimization (SEO)</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB03</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB03_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB03_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                     <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Social Medial Support</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB04</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB04_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB04_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Production and Distribution costs</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB05</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB05_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB05_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Video Production Support</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB06</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB06_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB06_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Graphics Support</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB07</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB07_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB07_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Editorial Support</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB08</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB08_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB08_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">CRM/MAS Licensing Fees </td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB09</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB09_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB09_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Research Databases</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB10</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB10_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB10_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Paid Advertising and Promotion</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB11</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB11_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB11_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Content Development </td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">IB12</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB12_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB12_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
            
                                main Loop End
                                One Loop start
                                      <tr>
                                        <td width="50%"><strong>PROFESSIONAL SUPPORT</strong> </td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"></td>
                                                        <td width="50%"></td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      One Loop End
                                      main Loop start
                                    
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Marketing</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS01</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS01_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS01_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Public Relations</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS02</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS02_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS02_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Advertising</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS03</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS03_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS03_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                     <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Research</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS04</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS04_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS04_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Social Medial </td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">PS05</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS05_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS05_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                main Loop End
                                One Loop start
                                      <tr>
                                        <td width="50%"><strong>STAFFING COSTS</strong> </td>
                                        <td width="15%"></td>
                                        <td width="35%">
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"></td>
                                                        <td width="50%"></td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
            
                                      One Loop End
                                      main Loop start
                                    
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Marketing Director</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">SC01</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="SC01_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="SC01_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Marketing Support Personnel</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">SC02</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="SC02_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="SC02_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">IT allocation</td>
                                        <td width="15%" style="  line-height: 20px; padding-bottom: 0;  ">SC03</td>
                                        <td width="35%" >
                                            <table width="100%">
            
                                                <tbody>
                                                    <tr>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:95%; height:30px; " type="text" class="form-control" name="SC03_hr">
                                                            </div>
            
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group" style=" margin-bottom:0px">
                                                                <input style=" width:100%; height:30px; " type="text" class="form-control" name="SC03_bud">
                                                            </div>
                                                        </td>
            
            
                                                    </tr>
            
                                                </tbody> 
            
                                            </table>
            
                                        </td>
                                      </tr>
                                   
                                main Loop End
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            <button type="button" class="btn green" id="budget_savetosession">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div> -->


<?php foreach ($act_dtl_res as $key_1 => $value_1) {  
//                t($value_1);?>
            <div id="responsive_view_<?php echo $value_1['activity_dtl_seq_no']?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View Attorney Budget Per Client/Target</h4>
                        </div>
                        <form  name="ind_ct_potential_rev_frm" id="ind_ct_potential_rev_frm" action="#" method="post">    
<!--                            <input type="hidden" name="activity_seq_no" value="<?php //echo $this_activity['activity_seq_no']; ?>">
                            <input type="hidden" name="origin_attorney_seq_no" value="<?php //echo $thisattr; ?>">-->
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Firm:</label>
                                                <div class="col-md-8">
                                                    <input type="text" disabled="" class="form-control" value="<?php echo $value_1['firm_name']; ?>">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group" style="margin-top:15px; width:100%; display:inline-block;">
                                                <label class="col-md-4 control-label">Relation:</label>
                                                <div class="col-md-8">
                                                    <?php if($value_1['relation_type']== 'T') {?>
                                                    <input style="margin-left: -10px;" type="radio" name="relation_type" id="rel_type1" class="form-control relation_type" value="T" onchange="get_rel('T')" checked> Target 
                                                    <?php } else { ?>
                                                      <input style="margin-left: -10px;" type="radio" name="relation_type" id="rel_type2" class="form-control relation_type" value="C" onchange="get_rel('C')" checked> Client
                                                    <?php } ?>
                                                      <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group" style=" width:100%; display:inline-block;">
                                                <label class="col-md-4 control-label">Target/Client Name:</label>
                                                <div class="col-md-8">
                                                    
                                                    <input type="text" disabled="" class="form-control" name="ct_name" value="<?php echo $value_1['ct_name']; ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Budget Cost US$:</label>
                                                <div class="col-md-8">
                                                    <input type="text" disabled="" class="form-control" name="remarks" value="<?php echo $value_1['budgeted_cost']; ?>">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div> 
                                            <div class="form-group" style=" width:100%; display:inline-block">
                                                <label class="col-md-4 control-label">Potential Revenue:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  class="form-control" name="potential_rev" readonly="readonly" id="potential_rev" placeholder="Add client/target revenue" value="<?php echo $value_1['potential_revenue']; ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                           <div class="form-group" style=" width:100%; display:inline-block;">
                                                <label class="col-md-4 control-label">Activity Details Status:</label>
                                                <div class="col-md-8">
                                                     <select class="form-control" name="activity_status" disabled="disabled">
                                                             <option value="">Select One</option>
                                                             <?php foreach($act_dtl_status as $key => $value ){ ?>
                                                                 <option value="<?php echo $value['code']; ?>" <?php if($value_1['activity_dtl_status'] == $value['code']){ echo 'selected="selected"'; } ?> disabled="disabled"><?php echo $value['short_description']; ?></option>
                                                             <?php } ?>
                                                         </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <!--<input type="submit"  class="btn green" id="app_codes_submit" value="Save changes" >-->
                                <button type="button" class="btn green" id="ind_ct_potential_rev">Save</button>
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
    background-color: #fff;
    border: 1px solid #eee;
    border-radius: 4px;
    box-shadow: 5px 5px rgba(102, 102, 102, 0.1);
    display: none;
    float: left;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    left: -65px;
    list-style: outside none none;
    margin: 10px 0 0;
    min-width: 175px;
    padding: 0;
    position: absolute;
    z-index: 1000;
}

.btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {
    border-bottom: 8px solid #e0e0e0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    content: "";
    display: inline-block !important;
    left: 118px;
    position: absolute;
    right: auto;
    top: -8px;
}

.btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {
    border-bottom: 7px solid #fff;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    content: "";
    display: inline-block !important;
    left: 117px;
    position: absolute;
    right: auto;
    top: -7px;
}
.form-group.required .control-label:after {
                content:"*";
                color:red;
              }
    </style>
    <script src="<?php echo $assets_path; ?>custom/js/validate/activity.js" type="text/javascript"></script>
     <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!--<script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>-->
        <!--<script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>-->
    <!-- END PAGE LEVEL PLUGINS -->
    <style>
        .hide{display: none}
        .show{display: block}
        </style>
     <script type="text/javascript">
//var FormInputMask = function () {
//    
//    var handleInputMasks = function () {
//        
//        $("#potential_revenue").inputmask("numeric", {
//                    radixPoint: ".",
//                    groupSeparator: ",",
//                    digits: 2,
//                    autoGroup: true,
//                    prefix: '$ ', 
//                    rightAlign: false
//        });
//       $(".dollar_sign").inputmask("numeric", {
//                   radixPoint: ".",
//                   groupSeparator: ",",
//                   digits: 2,
//                   autoGroup: true,
//                   prefix: '$ ', 
//                   rightAlign: false
//       });
//        }
//           return {
//        //main function to initiate the module
//        init: function () {
//            handleInputMasks();
////            handleIPAddressInput();
//        }
//    };
//
//}();

//if (App.isAngularJsApp() === false) { 
//    jQuery(document).ready(function() {
//        FormInputMask.init(); // init metronic core componets
//    });
//}
</script>

    <script type="text/javascript">
        $(document).ready(function () {
            
         /****** Hide/show div on change of activity goal - Begin ******/
                //$('.new_act_goal').hide();
                var a= '<?php echo $this_activity['act_option'];?>';
                
                
              if(a == "new_goal"){ 
                     $('.new_act_goal').show();
                        $('.existing_act_goal').hide();
                     } else { 
                                $('.existing_act_goal').show();
                        $('.new_act_goal').hide();
                    }
                //$('.existing_act_goal').hide();
                $('.act_goal').on('click', function () {
                    var activity_goal = $(this).val();
//                  alert(activity_goal);
                    if (activity_goal === 'new_goal') {
                        $('.new_act_goal').show();
                        $('.existing_act_goal').hide();
                    } else if (activity_goal === 'existing_goals') {
                        $('.existing_act_goal').show();
                        $('.new_act_goal').hide();
                    } else {
                        $('.new_act_goal').hide();
                        $('.existing_act_goal').hide();
                    }
                });
            /****** Hide/show div on change of activity goal - End ******/
            
//            alert(123);
//              $('#show_hide').hide();
            <?php  if($this_activity['activity_type'] == 'SECTION') { ?>
                $('#show_hide').show();
                $('#show_hide').removeClass('hide');
                $('#show_hide').addClass('show');
            <?php }else{ ?>
                $('#show_hide').hide();
                $('#show_hide').removeClass('show');
                $('#show_hide').addClass('hide');
            <?php } ?>
            
            $("#activity_type").change(function(){
                $("#potential_revenue").removeAttr("readonly");
                var a = $(this).val();
                if (a == 'TEAM') {
                    $('#show_hide').hide();
                    $('#show_hide').removeClass('show');
                $('#show_hide').addClass('hide');
                    $("#potential_revenue").attr("readonly","true");
                    $("#potential_revenue").val("0.00");
                }else if(a == 'INDIVIDUAL'){
                    $("#potential_revenue").val("0.00");
                    $("#potential_revenue").removeAttr("readonly");
                    $('#show_hide').show();
                    $('#show_hide').removeClass('hide');
                    $('#show_hide').addClass('show');
                }else{
                    $('#show_hide').hide();
                    $('#show_hide').removeClass('hide');
                    $('#show_hide').addClass('show');
                    $("#potential_revenue").val("0.00");
                    $("#potential_revenue").removeAttr("readonly");
                }
            });
            /****** Hide/show div on page load (activity type) - Begin ******/
            var activity_type=$('#activity_type').val();
               if(activity_type === 'SECTION'){
                   $('.section').show(); 
                   $('.strat_group').hide();
                } else if(activity_type === 'STRAGRP'){
                   $('.strat_group').show();
                   $('.section').hide();
                } else {
                   $('.strat_group').hide(); 
                   $('.section').hide();
                }
            /****** Hide/show div on page load (activity type) - End ******/
            /****** Hide/show div on change of activity type - Begin ******/
            $('#activity_type').on('change', function(){
                var activity_type = $(this).val();
//                alert(activity_type);
                if(activity_type === 'SECTION'){
                   $('.section').show(); 
                   $('.strat_group').hide();
                } else if(activity_type === 'STRAGRP'){
                   $('.strat_group').show();
                   $('.section').hide();
                } else {
                   $('.strat_group').hide(); 
                   $('.section').hide();
                }
            });
             /****** Hide/show div on change of activity type - End ******/

            $('#budget_savetosession').click(function(){
               
                var form = $('#my_budg_form');
                $.ajax({
                    url : BASE_URL + 'activity/make_ct_budget',
                    type : 'POST',
                    dataType : 'json',
                    data : form.serialize() ,
                    success : function(data){
                        console.log(data);
                        $('#responsive_budget').modal('hide');
                    }
                });
            });


<?php 
$j = 0; 
foreach ($ind_bud_dtl as $key => $value) { 
    ?>

    <?php foreach ($value as $key1 => $value1) { 
                $act_dtl_seq_no =  $value1['activity_dtl_seq_no']; 
            break; 
            
    } ?>
            
            $('#budget_savetosession1<?php echo ++$j; ?>').click(function(){
//               alert(123);
                var form = $('#my_budg_form<?php echo $j; ?>');
                 
                $.ajax({
                    url : BASE_URL + 'activity/update_single_budget_dtl/<?php echo base64_encode($this_activity['activity_seq_no']); ?>/<?php echo $act_dtl_seq_no ;?>',
                    type : 'POST',
                    dataType : 'json',
                    data : form.serialize() ,
                    success : function(data){
                        console.log(data);
                        $('.responsive_budget11<?php echo $j; ?>').modal('hide');
                        location.reload(true);
                    }
                });
            });

            <?php } ?>

            

        });

        function get_rel(reltyp)
        {
            $.ajax({
                url : BASE_URL + 'activity/get_rel_type_users',
                type : 'POST',
                dataType : 'json',
                data : {
                    reltyp : reltyp
                },
                success : function(data)
                {
                    console.log(data);
                    //$('#relation_seq_no').html(data);
                }
            });
        }
    </script>


    
</html>  