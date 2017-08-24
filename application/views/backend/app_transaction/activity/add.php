<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->

   <style>
	   
.add_activity_area {
margin: 0;
width: 100%;
display: inline-block;
}

.add_activity_area h3 {
font-size: 18px;
width: 100%;
height: 30px;
margin-bottom: 0;
margin-top: 0;
text-align: left;
padding-left: 0;
}
.portlet.light .portlet-body {
    padding-top: 0;
}
	   
.form-group {
    margin-bottom: 0;
}
	   
	.dropdown-menu {
    box-shadow: 5px 5px rgba(102,102,102,.1);
    left: -50px;
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
		margin-bottom: 50px;

}

.btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {
position: absolute;
top: -8px;
left: 55px;
right: auto;
display: inline-block !important;
border-right: 8px solid transparent;
border-bottom: 8px solid #e0e0e0;
border-left: 8px solid transparent;
content: '';
}
	   
.btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {
    position: absolute;
    top: -7px;
    left: 54px;
    right: auto;
    display: inline-block !important;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #fff;
    border-left: 7px solid transparent;
    content: '';
}	
	</style>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" >
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="menu-toggler sidebar-toggler"> </div>
            <!-- BEGIN HEADER INNER -->
            <?php echo $header; ?>

<!--            <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
<script src="https://twitter.github.io/typeahead.js/js/jquery-1.10.2.min.js"></script>-->

            <script>


            </script>
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
                                        <span class="caption-subject bold uppercase">Activity Add</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1"><a style=" color:#fff; text-decoration:none;" href="" onclick="history.back()"> Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                            <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">

                                    <div class="row">
                                        <div class="add_activity_area">
                                            <div class="add_form_sec">
                                                <form role="form" id="add_new_activity_frm" method="post" action="<?php echo $base_url . 'activity/add' ?>" enctype="multipart/form-data">

                                                    <div class="col-md-12"><h3 class="hint"> General Information </h3></div>

                                                    <div class="col-md-12">
                                                        <?php $smsg = $this->session->flashdata('err_message');
                                                        if (isset($smsg) && $smsg != '') { ?>
                                                            <div class="alert alert-danger" id="general_msg_success" >
                                                                <strong>Error!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                                            </div>
                                                            
                                                         
<?php } ?>
                                                       <div class="row">
                                                       	<div class="col-md-6">
                                                       		<div class="portlet light bordered" style=" display: inline-block">
																<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0">
																	<label class="col-md-12 control-label"> Firm: </label>
																	<div class="col-md-12">
																	<input type="text" name="" id="" class="form-control" value="<?php echo $att_firm[0]['firm_name']; ?>" disabled="disabled">
																	<input type="hidden" name="firm_seq_no" value="<?php echo $att_firm[0]['firm_seq_no']; ?>">
																	<span class="help-block"> </span>
																	</div>
																</div>
                                                      	
																<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Activity Type:</label>
																	<div class="col-md-12">
																		<select class="form-control" name="activity_type" id="activity_type">
																			<option value="">Select One</option>
																			<?php foreach ($activity_type as $key => $value) { ?>
																			<option value="<?php echo $value['code']; ?>">
																				<?php echo $value['short_description']; ?>
																			</option>
																			<?php } ?>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
                                                     	
																<div class="form-group strat_group required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Strategy Group:</label>
																	<div class="col-md-12">
																		<select class="form-control" name="firm_sg_seq_no" id="firm_sg_seq_no">
																			<option value="">Select One</option>
																			<?php foreach ($sg as $key1 => $value1) { ?>
																				<option value="<?php echo $value1['firm_sg_seq_no']; ?>"><?php echo $value1['sg_name']; ?></option>
		<?php } ?>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="form-group section required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Section :</label>
																	<div class="col-md-12">
																		<select class="form-control" name="firm_section_seq_no" id="firm_section_seq_no">
																			<option value="">Select One</option>
																			<?php foreach ($section as $key1 => $value1) { ?>
																				<option value="<?php echo $value1['firm_section_seq_no']; ?>"><?php echo $value1['section_name']; ?></option>
		<?php } ?>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
                                                      	
                                                      			<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0; margin-bottom: 10px">
																	<label class="col-md-12">Activity Goal:</label>
																	<div class="radio-list col-md-12" style="padding-left: 10px">
																	<label class="radio-inline">
																	<input type="radio" name="activity_goal_radio"  class="form-control act_goal" id="new_goal" value="new_goal" checked> New Goal </label>
																	<label class="radio-inline">
																	<input type="radio" name="activity_goal_radio" class="form-control act_goal" id="existing_goals" value="existing_goals"> Existing Goals </label>
																	</div>
																</div>
                                                       	
																<div class="form-group new_act_goal required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">
																		Add New Activity Goal:
																	</label>
																	<div class="col-md-12">
																		<input type="text" class="form-control" name="new_act_goal" id="new_act_goal" placeholder="Enter Activity Goal">
																		<span class="help-block"> </span>
																	</div>
																</div>

																<div class="form-group existing_act_goal required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Select From Existing Goals:</label>
																	<div class="col-md-12">
																		<select class="form-control" name="existing_act_goal" id="existing_act_goal" >
																			<option value="">Select One</option>
																			<?php foreach ($activity_goal as $key => $value) { ?>
																				<option value="<?php echo $value['activity_goal']; ?>"><?php echo $value['activity_goal']; ?></option>
		<?php } ?>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
                                                       	
																<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Practice Area Type:</label>
																	<div class="col-md-12">
																		<select class="form-control" name="practice_area_type" id="practice_area_type">
																			<option value="">Select One</option>
																			<?php foreach ($practice_area as $key => $value) { ?>
																			<option value="<?php echo $value['practice_area_seq_no']; ?>">
																				<?php echo $value['practice_area_name']; ?>
																			</option>
																			<?php } ?>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
                                                        	
																<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Potential Revenue:</label>
																	<div class="col-md-12">
																		<input type="text" class="form-control" name="potential_revenue" id="potential_revenue" placeholder="Enter Potential Revenue">
																		<span class="help-block"> </span>
																	</div>
																</div>
																															<!-- <div class="form-group">
																<label class="col-md-4 control-label">Activity Status:</label>
																<div class="col-md-8">
																	<select class="form-control" name="activity_status">
																		<option value="">Select One</option>
																		<?php foreach ($activity_status as $key => $value) { ?>
																		<option value="<?php echo $value['code']; ?>">
																			<?php echo $value['short_description']; ?>
																		</option>
																		<?php } ?>
																	</select>
																	<span class="help-block"> </span>
																</div> <
																															/div> -->

																<input type="hidden" name="activity_status" value="NEWACT">
                                                        	
																<div class="form-group col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Remark/Comments</label>
																	<div class="col-md-12">
																		<textarea class="form-control" style="height:67px;" name="remarks_notes" placeholder="Enter remarks/comments"></textarea>
																		<span class="help-block">  </span>
																	</div>
																</div>

                                                        	
                                                        	</div>
                                                       	</div>
                                                       	
                                                       	<div class="col-md-6">
                                                       		<div class="portlet light bordered" style=" display: inline-block">
																<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label"> Origin Attorney: </label>
																	<div class="col-md-12">
																	<input type="text" name="" id="" class="form-control" value="<?php echo $att_firm[0]['attorney_first_name'] . ' ' . $att_firm[0]['attorney_last_name']; ?>" disabled="disabled">
																	<input type="hidden" name="origin_attorney_seq_no" value="<?php echo $att_firm[0]['attorney_seq_no']; ?>">
																	<span class="help-block"> </span>
																	</div>
																</div>

																<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Activity Name:</label>
																	<div class="col-md-12">
																		<input type="text" class="form-control" name="activity_name" placeholder="Enter Activity Name">
																		<span class="help-block"> </span>
																	</div>
																</div>
                                                       	
																<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0;">
																	<label class="col-md-12 control-label">Activity Reason:</label>
																	<div class="col-md-12">
																		<textarea class="form-control" style="height:40px;" name="activity_reason_desc" placeholder="Enter Activity Reason"></textarea>
																		<span class="help-block">  </span>
																	</div>
																</div>
                                                       	
																<div class="form-group date date-picker required col-md-12" data-date-format="dd-M-yyyy">
																	<label class="col-md-12 control-label">Activity Creation Date</label>
																	<div class="col-md 12" style="padding-right: 0">
																		<input style=" width:91%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="activity_created_date" placeholder="DD-MMM-YYYY" value="<?php echo date('d-M-Y'); ?>">
																		<span class="input-group-btn">
																			<button class="btn default" type="button">
																				<i class="fa fa-calendar"></i>
																			</button>
																		</span>
																	</div>
																</div>
                                                       	
                                                       			<div class="form-group required col-md-12" style="padding-left: 0; padding-right: 0;">
                                                            <label class="col-md-12 control-label">Duration</label>
                                                            <div class="col-md-12">
                                                                <div class="col-md-6" style="padding-left:0; padding-right:0;">
                                                                    <div class="input-group date date-picker" data-date-format="dd-M-yyyy" data-date="<?php echo date("d-M-Y", strtotime("+1 month", strtotime(date('d-M-Y')))); ?>">
                                                                        <table width="100%" align="left">
                                                                            <tr>
                                                                                <td width="100%">
                                                                                    <table width="100%">
                                                                                        <tr>
                                                                                            <td width="95%"><label class="control-label">From</label></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td width="100%">
                                                                                                <input style="width:77%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="duration_from" placeholder="DD-MMM-YYYY" >
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

                                                                <div class="col-md-6" style="padding-left:0; padding-right:0;">
                                                                    <div class="input-group date date-picker" data-date-format="dd-M-yyyy" data-date="<?php echo date("d-M-Y", strtotime("+1 month", strtotime(date('d-M-Y')))); ?>">

                                                                        <table width="100%" align="left">
                                                                            <tr>
                                                                                <td width="100%">
                                                                                    <table width="90%" align="right">
                                                                                        <tr>
                                                                                            <td width="100%"><label class="control-label">To</label></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td width="100%">
                                                                                                <input style="width:80%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="duration_to" id="duration_to" placeholder="DD-MMM-YYYY" >
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
                                                                
                                                                <div class="form-group col-md-12" style=" margin-top:15px;  padding-left: 0; padding-right: 0">

                                                            <div class="col-md-12" style=" padding-left: 0">    

                                                                <div id="show_hide">
                                                                    <h3 class="hint"> Individual Client/Target Information </h3>
                                                                    <div class="form-group col-md-12" style="padding-left: 0; padding-right: 0;">
                                                                        <label class="col-md-12 control-label" style="padding-left: 0; padding-right: 0;">Activity Details Status:</label>
                                                                        <div class="col-md-12" style="padding-left: 0; padding-right: 0;">
                                                                            <select class="form-control" name="activity_dtl_status" id="activity_dtl_status">
                                                                                <option value="">Select One</option>
                                                                                <?php foreach ($act_dtl_status as $key => $value) { ?>
                                                                                    <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description'] ?></option>
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
                                                                    <?php foreach ($act_budget_status as $key => $value) { ?>
                                                                                        <option value="<?php echo $value['code_seq_no']; ?>"><?php echo $value['short_description'] ?></option>
<?php } ?>
                                                                            </select>
                                                                            <span class="help-block"> </span>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="form-group col-md-12" style="padding-left: 0; padding-right: 0;">
                                                                        <label class="col-md-12 control-label" style="padding-left: 0; padding-right: 0;">Activity Budget Details Status:</label>
                                                                        <div class="col-md-12" style="padding-left: 0; padding-right: 0;">
                                                                            <select class="form-control" name="budget_dtl_status" id="budget_dtl_status">
                                                                                <option value="">Select One</option>
                                                                                <?php foreach ($budget_dtl_status as $key => $value) { ?>
                                                                                    <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description'] ?></option>
<?php } ?>
                                                                            </select>
                                                                            <span class="help-block"> </span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div style=" width: 100%; display: inline-block; height: 65px;">
																		<div class="form-group col-md-6" style="padding-left: 0; padding-right: 0;">
																			<label class="col-md-12 control-label" style="padding-left: 0; padding-right: 0;">Relation Type:</label>
																			<div class="col-md-12" style="padding-left: 0px; padding-right: 0">

																				<input style="margin-left: -10px;" type="radio" name="relation_type" id="rel_type1" class="form-control" value="T" onchange="get_rel('T')"> Target 
																				<input style="margin-left: -10px;" type="radio" name="relation_type" id="rel_type2" class="form-control" value="C" onchange="get_rel('C')"> Client

																				<span class="help-block"> </span>
																			</div>
																		</div>

																		<div class="form-group col-md-6" style="display: none; padding-left: 0; padding-right: 0;" id="rel">
																			<label class="col-md-6 control-label">Relation With:</label>
																			<div class="col-md-12">
																				<select style="width: 100%;" class="form-control" name="relation_seq_no[]" id="relation_seq_no" multiple="multiple"></select>
																				<span class="help-block"> </span>
																			</div>
																		</div>
                                                                    
																	</div>
                                                                   
                                                                    <div class="form-group col-md-12" style=" padding-left: 0; padding-right: 0; margin-top:10px ">
                                                                        <label class="col-md-12 control-labe" style="padding-right: 0; text-align: left">Budgets:</label>
                                                                        <div class="col-md-12" style=" padding-right: 0">
                                                                            <a name="add_budget" id="add_budget" class="btn green pull-left" href="#responsive_budget" data-toggle="modal">Add Budget</a>
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
                                                        
                                                        

                                                        

                                                        

                                                        

<!--                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label ">Activity Goal:</label>
                                                            <div class="col-md-8">
                                                                <input type="radio" checked="checked" name="activity_goal_radio" class="form-control act_goal" id="new_goal" value="new_goal">New Goal
                                                                <input type="radio" name="activity_goal_radio" class="form-control act_goal" id="existing_goals" value="existing_goals">Existing Goals
                                                                <span class="help-block"> </span>
                                                            </div>  
                                                        </div>-->
                                                        
                                           
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
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
                                                        

                                                        

                                                        
                                                        

                                                        
                                                        
                                                        

														<div class="col-md-12 margiv-top-10" style="padding-right: 0">
															<button type="submit" name="add_new_activity_btn" id="add_new_activity_btn" class="btn green pull-right">Save</button>
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
            <!-- END EXAMPLE TABLE PORTLET-->
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
<!-- END CONTENT BODY -->
</div>

<div id="responsive_budget" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Marketing Budget Code</h4>
            </div>
            <form action="#" method="post" id="my_budg_form">
                <div class="modal-body">
                    <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">
                         <div>
                             <label>Please Select: </label>
                             <input style="" type="radio" name="opt" id="ind" class="form-control" value="org"><strong> Evenly Equated</strong>
                             <input style="" type="radio" name="opt" id="org" class="form-control" value="ind"> <strong>Individual</strong>

                    <span class="help-block"> </span>
                    </div>
                        
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
                                                            <input style=" width:95%; height:30px; " type="text" class="form-control" name="ME01_hr">
                                                        </div>

                                                    </td>
                                                    <td width="50%">
                                                        <div class="form-group" style=" margin-bottom:0px">
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME01_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME02_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME03_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME04_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="ME05_bud">
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
                                                            <input style=" width:95%; height:30px; " type="text" class="form-control" name="TR01_hr">
                                                        </div>
                                                    </td>
                                                    <td width="50%">
                                                        <div class="form-group" style=" margin-bottom:0px">
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR01_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR02_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR03_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR04_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR05_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="TR06_bud">
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
                                                            <input style=" width:95%; height:30px; " type="text" class="form-control" name="CA01_hr">
                                                        </div>

                                                    </td>
                                                    <td width="50%">
                                                        <div class="form-group" style=" margin-bottom:0px">
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CA01_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CA02_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CA03_bud">
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
                                                            <input style=" width:95%; height:30px; " type="text" class="form-control" name="CC01_hr">
                                                        </div>

                                                    </td>
                                                    <td width="50%">
                                                        <div class="form-group" style=" margin-bottom:0px">
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC01_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC02_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC03_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC04_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC05_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC06_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="CC07_bud">
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
                                                            <input style=" width:95%; height:30px; " type="text" class="form-control" name="IB01_hr">
                                                        </div>

                                                    </td>
                                                    <td width="50%">
                                                        <div class="form-group" style=" margin-bottom:0px">
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB01_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB02_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB03_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB04_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB05_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB06_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB07_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB08_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB09_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB10_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB11_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="IB12_bud">
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
                                                            <input style=" width:95%; height:30px; " type="text" class="form-control" name="PS01_hr">
                                                        </div>

                                                    </td>
                                                    <td width="50%">
                                                        <div class="form-group" style=" margin-bottom:0px">
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS01_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS02_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS03_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS04_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="PS05_bud">
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
                                                            <input style=" width:95%; height:30px; " type="text" class="form-control" name="SC01_hr">
                                                        </div>

                                                    </td>
                                                    <td width="50%">
                                                        <div class="form-group" style=" margin-bottom:0px">
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="SC01_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="SC02_bud">
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
                                                            <input style=" width:100%; height:30px; " type="text" class="form-control dollar_sign" name="SC03_bud">
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
                    <button type="button" class="btn green" id="budget_savetosession">Save</button>
                </div>
            </form>
        </div>
    </div>
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
    /*  label.error {
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

    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        border-top: none;
        line-height: 20px;
        padding: 8px;
        vertical-align: top;
    }
    .form-group.required .control-label:after {
        content:"*";
        color:red;
    }
    
     .radio input[type=radio], .radio-inline input[type=radio] {
    position: absolute;
    margin-left: -10px;
    margin-top: 4px\9;
}
</style>

<script src="<?php echo $assets_path; ?>custom/js/validate/activity.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $assets_path; ?>custom/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="<?php echo $assets_path; ?>custom/js/bootstrap-multiselect.js"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <!--<script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>-->
    <!--<script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL PLUGINS -->


<!--  <script type=text/javascript>
      var config = {".chosen-select": {}, ".chosen-select-deselect": {allow_single_deselect: true}, ".chosen-select-no-single": {disable_search_threshold: 10}, ".chosen-select-no-results": {no_results_text: "Oops, nothing found!"}, ".chosen-select-width": {width: "95%"}};

    for (var selector in config) {

        $(selector).chosen(config[selector])

    }
  </script>-->

<script type="text/javascript">
    var data = [
    {label: "ACNP", value: "ACNP"},
    {label: "test", value: "test"}
];
//            $('#relation_seq_no').multiselect({
////                    includeSelectAllOption: true,
//                enableFiltering: true,
//                numberDisplayed: 3,
//                enableCaseInsensitiveFiltering: true,
//                maxHeight: 300,
//                maxWidth: 600,
//                dataprovider: data
//            });
            
        </script>
<script type="text/javascript">

                                                      $(document).ready(function () {
                                                          // Example #1
                                                          // instantiate the bloodhound suggestion engine

//               var numbers = new Bloodhound({
//          datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.value); },
//          queryTokenizer: Bloodhound.tokenizers.whitespace,
//          remote: {
//    wildcard: '%QUERY',
//    url: 'http://localhost/attorney_management_system/activity/get_activity/?query=%QUERY',
//    transform: function(response) {
//       
//      // Map the remote source JSON array to a JavaScript object array
//      return $.map(response.results, function(movie) {
//          //alert(movie);
//        return {
//             //alert(movie.name);
//          local: movie.name
//        };
//      });
//    }
//  }
//         
//          
//        });
//         
//        // initialize the bloodhound suggestion engine
//        numbers.initialize();
//         
//        // instantiate the typeahead UI
//        if (App.isRTL()) {
//          $('#goal_name').attr("dir", "rtl");  
//        }
//        $('.typeahead').typeahead(null, {
//          //name: 'numbers',
//        display: 'num',
//          //hint: (App.isRTL() ? false : true),
//          source: numbers
//        });



$('#show_hide').hide();
$("#activity_type").change(function () { //alert('sdg');
    $("#potential_revenue").removeAttr("readonly");
    var a = $(this).val();
    if (a == 'TEAM') {
        $('#show_hide').hide();
        $("#potential_revenue").attr("readonly", "true");
        $("#potential_revenue").val("0.00");
    } else if (a == 'INDIVIDUAL') {
        $("#potential_revenue").val("0.00");
        $("#potential_revenue").removeAttr("readonly");
        $('#show_hide').show();
    } else {
        $('#show_hide').hide();
        $("#potential_revenue").val("0.00");
        $("#potential_revenue").removeAttr("readonly");
    }
});
            /****** Hide/show div on change of activity type - Begin ******/
                $('.section').hide();
                $('.strat_group').hide();
                $('#activity_type').on('change', function () {
                    var activity_type = $('#activity_type').val();
                //                alert(activity_type);
                    if (activity_type === 'SECTION') {
                        $('.section').show();
                        $('.strat_group').hide();
                    } else if (activity_type === 'STRAGRP') {
                        $('.strat_group').show();
                        $('.section').hide();
                    } else {
                        $('.section').hide();
                        $('.strat_group').hide();
                    }
                });
            /****** Hide/show div on change of activity type - End ******/

            /****** Hide/show div on change of activity goal - Begin ******/
//                $('.new_act_goal').hide();
                $('.existing_act_goal').hide();
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


                                                          $('.date-picker2').datepicker({
                                                              rtl: App.isRTL(),
                                                              autoclose: true
                                                          });
                                                          $('.date-picker2 .form-control').change(function () {
                                                              form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
                                                          })


                                                          $('#budget_savetosession').click(function () {

//                alert(123);
                                                              /*var me_1_hr = $('#me_1_hr').val();
                                                               var me_2_hr = $('#me_2_hr').val();
                                                               var me_3_hr = $('#me_3_hr').val();
                                                               var me_4_hr = $('#me_4_hr').val();
                                                               var me_5_hr = $('#me_5_hr').val();
                                                                   
                                                               var me_1_bud = $('#me_1_bud').val();
                                                               var me_2_bud = $('#me_2_bud').val();
                                                               var me_3_bud = $('#me_3_bud').val();
                                                               var me_4_bud = $('#me_4_bud').val();
                                                               var me_5_bud = $('#me_5_bud').val();
                                                                   
                                                               var t_1_hr = $('#t_1_hr').val();
                                                               var t_2_hr = $('#t_2_hr').val();
                                                               var t_3_hr = $('#t_3_hr').val();
                                                               var t_4_hr = $('#t_4_hr').val();
                                                               var t_5_hr = $('#t_5_hr').val();
                                                               var t_6_hr = $('#t_6_hr').val();
                                                                   
                                                               var t_1_bud = $('#t_1_bud').val();
                                                               var t_2_bud = $('#t_2_bud').val();
                                                               var t_3_bud = $('#t_3_bud').val();
                                                               var t_4_bud = $('#t_4_bud').val();
                                                               var t_5_bud = $('#t_5_bud').val();
                                                               var t_6_bud = $('#t_6_bud').val();*/
                                                              var form = $('#my_budg_form');
                                                              $.ajax({
                                                                  url: BASE_URL + 'activity/make_ct_budget',
                                                                  type: 'POST',
                                                                  dataType: 'json',
                                                                  data: form.serialize() /*{
                                                                   me_1_hr : me_1_hr,
                                                                   me_2_hr : me_2_hr,
                                                                   me_3_hr : me_3_hr,
                                                                   me_4_hr : me_4_hr,
                                                                   me_5_hr : me_5_hr,
                                                                       
                                                                   me_1_bud : me_1_bud,
                                                                   me_2_bud : me_2_bud,
                                                                   me_3_bud : me_3_bud,
                                                                   me_4_bud : me_4_bud,
                                                                   me_5_bud : me_5_bud,
                                                                       
                                                                   t_1_hr : t_1_hr,
                                                                   t_2_hr : t_2_hr,
                                                                   t_3_hr : t_3_hr,
                                                                   t_4_hr : t_4_hr,
                                                                   t_5_hr : t_5_hr,
                                                                   t_6_hr : t_6_hr,
                                                                       
                                                                   t_1_bud : t_1_bud,
                                                                   t_2_bud : t_2_bud,
                                                                   t_3_bud : t_3_bud,
                                                                   t_4_bud : t_4_bud,
                                                                   t_5_bud : t_5_bud,
                                                                   t_6_bud : t_6_bud
                                                                       
                                                                   }*/,
                                                                  success: function (data) {
                                                                      console.log(data);
                                                                      $('#responsive_budget').modal('hide');
                                                                  }
                                                              });
                                                          });


// Example #1
                                                          // instantiate the bloodhound suggestion engine
//                                                          var numbers = new Bloodhound({
//                                                              datumTokenizer: function (d) {
//                                                                  return Bloodhound.tokenizers.whitespace(d.num);
//                                                              },
//                                                              queryTokenizer: Bloodhound.tokenizers.whitespace,
//                                                              local: [
//<?php //foreach ($activity_goal as $key => $value) { ?>
//                                                                      {num: "<?php //echo $value['activity_goal']; ?>"},
//<?php //} ?>
//                                                              ]
//                                                          });

                                                          // initialize the bloodhound suggestion engine
//                                                          numbers.initialize();

                                                          // instantiate the typeahead UI
//                                                          if (App.isRTL()) {
//                                                              $('#goal_name').attr("dir", "rtl");
//                                                          }
//                                                          $('#goal_name').typeahead(null, {
//                                                              displayKey: 'num',
//                                                              hint: (App.isRTL() ? false : true),
//                                                              source: numbers.ttAdapter()
//                                                          });



                                                      });

                                                      function get_rel(reltyp)
                                                      {
                                                          $('#rel').css('display','block');
                                                          $.ajax({
                                                              url: BASE_URL + 'activity/get_rel_type_users',
                                                              type: 'POST',
                                                              dataType: 'json',
                                                              data: {reltyp: reltyp},
                                                              success: function (data)
                                                              {
                                                                  console.log(data);
                                                                  //data=[{"label":"Pemberley, inc.","value":"2"},{"label":"New company","value":"3"},{"label":null,"value":"4"}];
                                                                  $("#relation_seq_no").multiselect('dataprovider', data);
                                                                   $("#relation_seq_no").multiselect('dataprovider', data)
                                                                  //$('#relation_seq_no').html(data);
                                                              }
                                                          });
                                                      }


                                                      $(window).on('beforeunload', function ()
                                                      {
                                                          console.log('closing ... ');
                                                          //return false;
                                                      });

</script>



</html>  