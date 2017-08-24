<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->
    
    
    
    
      <style>
	.add_input_deactive_area .btn:not(.btn-sm):not(.btn-lg) {
    line-height: 15px;
}	  
.portlet > .portlet-title {
margin-bottom: 0px !important;
min-height: 41px;

}
		  
.portlet.light > .portlet-title {
    padding-right: 17px;
    min-height: 48px;
}		  
		  
.add_input_deactive_area h3 {
    font-size: 18px !important;
    width: 100%;
    height: 30px;
    margin-bottom: 0 !important;
    margin-top: 13px !important;
    text-align: left;
    padding-left: 15px !important;
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
	   
#div1 {
  height: 300px;
  width: 100%;
  background: #fff;
  text-align: left;
  transition : height 1s linear;
	margin-bottom: 45px;
	overflow: hidden;
	display: inline-block;
/*	border-bottom: 1px solid #e7ecf1 !important;*/
}

#div1.short{

height: 650px;
margin-bottom: 40px;
}
.add_input_edit_area .form-control {
height: 40px;
margin-bottom: 8px;
float: left;
}

.portlet.light .dataTables_wrapper .dt-buttons {
margin-top: -38px;
}
	</style>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   
   <script>
	
 var aboutMe = function(x) {
   $(x).toggleClass('short')
 };

 $(function() {
   $('#clicker').click(function() {
     aboutMe('#div1');
   });
 });
	   
	   
	</script>

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
                                        <span class="caption-subject bold uppercase">Activity: <?php echo " ".$this_activity['activity_name']; ?></span><span class="caption-subject bold" style=" margin-left: 203px;"><?php echo "Origin Attorney:"." ".$att_firm[0]['attorney_first_name'] .' '. $att_firm[0]['attorney_last_name']; ?></span>
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
                                    <div class="table-toolbar">
                                    
                                    <div class="row">
                                    	<div id="div1" style="position: relative">
                                    	<div style=" text-align: center; left: 15px; position: absolute; bottom:0; height: 20px; width: 97.1%; background: #eee; z-index: 999"><button style=" outline: none; background-color:transparent; border-right: none; border-left: none;" id="clicker"><i style=" font-size: 30px;" class="fa fa-angle-down"></i></button></div>
                                    	
                                    	
                                    	<div class="add_input_deactive_area">
                                    
                                         <div class="add_form_sec">
                                         
                                             <form role="form" autocomplete="off" id="add_new_activity_frm" method="post" action="<?php echo $base_url . 'activity/edit/'  . base64_encode($this_activity['activity_seq_no']); ?>" enctype="multipart/form-data">
                                           
                                           <div class="col-md-12" style="position: relative;">
                                           
                                           <h3 class="hint"> General Information </h3>
                                           
                                           <div class="form-group" style="position: absolute; right: 18px; z-index: 9999; top: 0">
<!--                                                     <label class="col-md-12 control-label">Add Client/Traget:</label>-->
                                                     
                                                         <div class="btn-group">
                                                             <a href="#<?php if($this_activity['activity_status'] == 'NEWACT'){ ?>responsive<?php } ?>" class="btn btn-outline sbold" data-toggle="modal" <?php if($this_activity['activity_status'] == 'PENDACT'){ ?> onclick="alert('This activity is under approval process');" <?php } ?> <?php if($this_activity['activity_status'] == 'APPRACT'){ ?> onclick="alert('This activity is approved');" <?php } ?> <?php if($this_activity['activity_status'] == 'NAPPRACT'){ ?> onclick="alert('This activity is rejected');" <?php } ?> >
                                                                 <button class="btn sbold green"> Add Client/Traget
                                                                     <i class="fa fa-plus"></i>
                                                                 </button>
                                                             </a>
                                                         </div>
                                                         <span class="help-block">  </span>
                                                     
                                                 </div>
                                           </div>
                                            
                                            
                                            		

                                            <div class="col-md-12">
                                             <?php $smsg = $this->session->flashdata('err_message'); if(isset($smsg) && $smsg != ''){ ?>
                                              <div class="alert alert-danger" id="general_msg_success" >
                                                  <strong>Error!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                              </div>
                                              <?php } ?>
                                                 
                                                 <div class="col-md-6">
                                            	<div class="portlet light col-md-12 bordered" style="display: inline-block">
                                            		<div class="form-group">
                                                     <label class="col-md-12 control-label">Firm:</label>
                                                     <div class="col-md-12">
                                                         <input type="text" name="" id="" class="form-control" value="<?php echo $att_firm[0]['firm_name']; ?>" disabled="disabled">
                                                         <input type="hidden" name="firm_seq_no" value="<?php echo $att_firm[0]['firm_seq_no']; ?>" disabled="disabled">
                                                         <span class="help-block"> </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Activity Name:</label>
                                                     <div class="col-md-12">
                                                         <input type="text" class="form-control" name="activity_name" placeholder="Enter text" value="<?php echo $this_activity['activity_name']; ?>" disabled="disabled">
                                                         <span class="help-block"> </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Practice Area Type:</label>
                                                     <div class="col-md-12">
                                                         <select class="form-control" name="practice_area_type" id="practice_area_type" disabled="disabled">
                                                             <option value="">Select One</option>
                                                             <?php foreach($practice_area as $key => $value ){ ?>
                                                                 <option value="<?php echo $value['practice_area_seq_no']; ?>" <?php if($this_activity['practice_area_type'] == $value['practice_area_seq_no']){ echo 'selected="selected"'; } ?>><?php echo $value['practice_area_name']; ?></option>
                                                             <?php } ?>
                                                         </select>
                                                         <span class="help-block">  </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group section">
                                                     <label class="col-md-12 control-label">Section :</label>
                                                     <div class="col-md-12">
                                                         <select class="form-control" name="firm_section_seq_no" id="firm_section_seq_no" disabled="disabled">
                                                             <option value="">Select One</option>
                                                             <?php foreach($section as $key1 => $value1 ){ ?>
                                                                 <option value="<?php echo $value1['firm_section_seq_no']; ?>" <?php if($this_activity['firm_section_seq_no'] == $value1['firm_section_seq_no']){ echo 'selected="selected"'; } ?>><?php echo $value1['section_name']; ?></option>
                                                             <?php } ?>
                                                         </select>
                                                         <span class="help-block">  </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Potential Revenue:</label>
                                                     <div class="col-md-12">
                                                         <input type="text" value="<?php echo $this_activity['potential_revenue']; ?>" class="form-control" name="potential_revenue" placeholder="Enter text" readonly>
                                                         <span class="help-block"> </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group date date-picker" data-date-format="dd-M-yyyy">
                                                   <label class="col-md-12 control-label">Activity Creation Date</label>
                                                   <div class="col-md-12">
                                                      <input style=" width:89%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="activity_created_date" placeholder="DD-MMM-YYYY" value="<?php echo $this_activity['activity_created_date']; ?>" disabled="disabled">
                                                      <span class="input-group-btn">
                                                          <button class="btn default" type="button">
                                                              <i class="fa fa-calendar"></i>
                                                          </button>
                                                      </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Remark/Comments</label>
                                                     <div class="col-md-12">
                                                         <textarea class="form-control" name="remarks_notes" style="height:80px;" placeholder="Enter text" disabled="disabled"><?php echo $this_activity['remarks_notes']; ?></textarea>
                                                         <span class="help-block">  </span>
                                                     </div>
                                                 </div>
                                            		
                                            	</div>
											</div>
                                            
                                            <div class="col-md-6">
                                            	<div class="portlet light col-md-12 bordered" style="display: inline-block">
                                            		<div class="form-group">
                                                     <label class="col-md-12 control-label">Origin Attorney:</label>
                                                     <div class="col-md-12">
                                                         <input type="text" name="" id="" class="form-control" value="<?php echo $att_firm[0]['attorney_first_name'] .' '. $att_firm[0]['attorney_last_name']; ?>" disabled="disabled">
                                                         <input type="hidden" name="origin_attorney_seq_no" value="<?php echo $thisattr; ?>" disabled="disabled">
                                                         <span class="help-block"> </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Activity Type:</label>
                                                     <div class="col-md-12">
                                                         <select class="form-control" name="activity_type" id="activity_type" disabled="disabled">
                                                             <option value="">Select One</option>
                                                             <?php foreach($activity_type as $key => $value ){ ?>
                                                                 <option value="<?php echo $value['code']; ?>" <?php if($this_activity['activity_type'] == $value['code']){ echo 'selected="selected"'; } ?>><?php echo $value['short_description']; ?></option>
                                                             <?php } ?>
                                                         </select>
                                                         <span class="help-block">  </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group strat_group">
                                                     <label class="col-md-12 control-label">Strategy Group:</label>
                                                     <div class="col-md-12">
                                                         <select class="form-control" name="firm_sg_seq_no" id="firm_sg_seq_no" disabled="disabled">
                                                             <option value="">Select One</option>
                                                             <?php foreach($sg as $key1 => $value1 ){ ?>
                                                                 <option value="<?php echo $value1['firm_sg_seq_no']; ?>" <?php if($this_activity['firm_sg_seq_no'] == $value1['firm_sg_seq_no']){ echo 'selected="selected"'; } ?>><?php echo $value1['sg_name']; ?></option>
                                                             <?php } ?>
                                                         </select>
                                                         <span class="help-block">  </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Activity Reason:</label>
                                                     <div class="col-md-12">
                                                         <textarea class="form-control" style="height:80px;" name="activity_reason_desc" placeholder="Enter activity reason" disabled="disabled"><?php echo $this_activity['activity_reason_desc']; ?></textarea>
                                                         <span class="help-block">  </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Activity Status:</label>
                                                     <div class="col-md-12">
                                                         <select class="form-control" name="activity_status" disabled="disabled">
                                                             <option value="">Select One</option>
                                                             <?php foreach($activity_status as $key => $value ){ ?>
                                                                 <option value="<?php echo $value['code']; ?>" <?php if($this_activity['activity_status'] == $value['code']){ echo 'selected="selected"'; } ?> disabled="disabled"><?php echo $value['short_description']; ?></option>
                                                             <?php } ?>
                                                         </select>
                                                         <span class="help-block"> </span>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="form-group">
                                                     <label class="col-md-12 control-label">Duration</label>
                                                     <div class="col-md-12">
                                                     
                                                     
                                                         <div class="col-md-6" style=" padding-left:0; padding-right:0">
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
                                                                            	<input style=" width:75%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="duration_from" placeholder="DD-MMM-YYYY" value="<?php echo $this_activity['duration_from']; ?>" disabled="disabled">
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

                                                         <div class="col-md-6" style=" padding-left:0; padding-right:0">
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
                                                                            	<input style="width:75%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="duration_to" placeholder="DD-MMM-YYYY" value="<?php echo $this_activity['duration_to']; ?>" disabled="disabled">
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
                                                 
                                                 
                                            		
                                            	</div>
											</div>



                                            </div>
                                            </form>
                                        </div>
                                        
                                        </div>
										</div>
                                        
                                     </div>   
                                        
                                        <div style=" width:100%; display:block;">
                                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                                <thead>
                                                    <tr class="">
                                                        <th> SL# </th>
                                                        <!-- <th> Attorney Name </th> -->
                                                        <th> Relation </th>
                                                        <th> Company Name </th>
                                                        <th> Contact Name </th>
                                                        <th> Budget Code Cost $</th>
                                                        <th> Potential Revenue </th>
                                                        <th> Actions </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0; foreach ($act_dtl_res as $key => $value) { ?>
                                                    <tr>
                                                        <td><?php echo ++$i; ?></td>
                                                        <!--<td><?php echo $value['attorney_first_name'] . ' ' . $value['attorney_last_name']; ?></td>-->
                                                        <td><?php if($value['relation_type'] == 'C'){echo 'Client';}else{ echo 'Target'; }  ?></td>
                                                        <td><?php echo $value['ct_name'] ; ?></td>
                                                         <td><?php if($value['con_name'] == " ") echo "N/A"; else echo $value['con_name'] ; ?></td>
                                                        <td><a <?php if($this_activity['activity_status'] == 'PENDACT'){ ?> onclick="alert('This activity is under approval process');" <?php } ?> <?php if($this_activity['activity_status'] == 'APPRACT'){ ?> onclick="alert('This activity is approved');" <?php } ?> <?php if($this_activity['activity_status'] == 'NAPPRACT'){ ?> onclick="alert('This activity is rejected');" <?php } ?> href="#<?php if($this_activity['activity_status'] == 'NEWACT'){ ?>individual_budget_dtl<?php echo $i;} ?>" data-toggle="modal" style="text-decoration:none;<?php if($value['budgeted_cost'] == 0){ echo 'color:red;';} ?>"><?php echo $value['budgeted_cost'] ; ?><?php if($value['budgeted_cost'] == 0){ echo ' (Add Budget)';} ?></a></td>
                                                        <td><?php echo $value['potential_revenue'] ; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button <?php if($this_activity['activity_status'] == 'PENDACT'){ ?> onclick="alert('This activity is under approval process');" <?php } ?> <?php if($this_activity['activity_status'] == 'APPRACT'){ ?> onclick="alert('This activity is approved');" <?php } ?> <?php if($this_activity['activity_status'] == 'NAPPRACT'){ ?> onclick="alert('This activity is rejected');" <?php } ?> class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <?php if($this_activity['activity_status'] == 'NEWACT'){ ?>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    
                                                                    <li>
                                                                        <a href="#responsive_edit_<?php echo $value['activity_dtl_seq_no']?>" data-toggle="modal" >
                                                                            <i class="icon-tag"></i> View
                                                                        </a>
                                                                    </li>
<!--                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="icon-tag"></i> Delete </a>
                                                                    </li>-->
                                                                </ul>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php  } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- <div class="row">
                                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                                <thead>
                                                    <tr class="">
                                                        <th> SL </th>
                                                        <th> Budget Code Type </th>
                                                        <th> Budget Code </th>
                                                        <th> Budget Hour </th>
                                                        <th> Budget Cost US$ </th>
                                                        <th> Budget level Status </th>
                                                        <th> Actions </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php // foreach ($codes as $key => $value) { ?>
                                                    <tr>
                                                        <td>1 </td>
                                                        <td>Budget Code Type</td>
                                                        <td>ME1</td>
                                                        <td>50</td>
                                                        <td>500</td>
                                                        <td>Pending</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    
                                                                    <li>
                                                                       <a href="#responsive_budget" data-toggle="modal" >
                                                                            <i class="icon-tag"></i> View
                                                                        </a>
                                                                    </li>
                                        
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php // } ?>
                                        
                                        
                                                </tbody>
                                            </table>
                                        </div> -->
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
<?php $j = 0; foreach ($ind_bud_dtl as $key => $value) {  ?>
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME01_bud" value="<?php echo $value['ME01']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME02_bud" value="<?php echo $value['ME02']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME03_bud" value="<?php echo $value['ME03']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME04_bud" value="<?php echo $value['ME04']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="ME05_bud" value="<?php echo $value['ME05']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR01_bud" value="<?php echo $value['TR01']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR02_bud" value="<?php echo $value['TR02']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR03_bud" value="<?php echo $value['TR03']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR04_bud" value="<?php echo $value['TR04']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR05_bud" value="<?php echo $value['TR05']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="TR06_bud" value="<?php echo $value['TR06']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CA01_bud" value="<?php echo $value['CA01']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CA02_bud" value="<?php echo $value['CA02']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CA03_bud" value="<?php echo $value['CA03']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC01_bud" value="<?php echo $value['CC01']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC02_bud" value="<?php echo $value['CC02']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC03_bud" value="<?php echo $value['CC03']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC04_bud" value="<?php echo $value['CC04']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC05_bud" value="<?php echo $value['CC05']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC06_bud" value="<?php echo $value['CC06']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="CC07_bud" value="<?php echo $value['CC07']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB01_bud" value="<?php echo $value['IB01']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB02_bud" value="<?php echo $value['IB02']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB03_bud" value="<?php echo $value['IB03']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB04_bud" value="<?php echo $value['IB04']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB05_bud" value="<?php echo $value['IB05']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB06_bud" value="<?php echo $value['IB06']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB07_bud" value="<?php echo $value['IB07']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB08_bud" value="<?php echo $value['IB08']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB09_bud" value="<?php echo $value['IB09']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB10_bud" value="<?php echo $value['IB10']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB11_bud" value="<?php echo $value['IB11']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="IB12_bud" value="<?php echo $value['IB12']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS01_bud" value="<?php echo $value['PS01']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS02_bud" value="<?php echo $value['PS02']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS03_bud" value="<?php echo $value['PS03']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS04_bud" value="<?php echo $value['PS04']['budget_code_cost']; ?>" >
                                                </div>
                                            </td>


                                        </tr>

                                    </tbody> 

                                </table>

                            </td>
                          </tr>
                          <tr>
                            <td width="50%" style="  line-height: 20px; padding-bottom: 0; ">Social Media </td>
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="PS05_bud" value="<?php echo $value['PS05']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="SC01_bud" value="<?php echo $value['SC01']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="SC02_bud" value="<?php echo $value['SC02']['budget_code_cost']; ?>" >
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
                                                    <input style=" width:100%; height:30px; " type="text" class="form-control" name="SC03_bud" value="<?php echo $value['SC03']['budget_code_cost']; ?>" >
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
               <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add Attorney Budget Per Client/Target</h4>
                        </div>
                        <form  name="ind_ct_potential_rev_frm" id="ind_ct_potential_rev_frm" action="#" method="post">
                            <input type="hidden" name="activity_seq_no" value="<?php echo $this_activity['activity_seq_no']; ?>">
                            <input type="hidden" name="origin_attorney_seq_no" value="<?php echo $thisattr; ?>">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Firm:</label>
                                                <div class="col-md-8">
                                                    <input type="text" disabled="" class="form-control" value="<?php echo $att_firm[0]['firm_name']; ?>">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group" style=" width:100%; height:40px; padding-top: 15px; display:inline-block">
                                                <label class="col-md-4 control-label">Relation:</label>
                                                <div class="col-md-8">
                                                    <input style="margin-left: -10px;" type="radio" name="relation_type" id="rel_type1" class="form-control relation_type" value="T" onchange="get_rel('T')"> Target 
                                                      <input style="margin-left: -10px;" type="radio" name="relation_type" id="rel_type2" class="form-control relation_type" value="C" onchange="get_rel('C')"> Client
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group" style=" width:100%; display:inline-block">
                                                <label class="col-md-4 control-label">Target/Client Name:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="relation_seq_no" id="relation_seq_no" >
                                                        <option value="">Select One</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group" style=" width:100%; display:inline-block">
                                                <label class="col-md-4 control-label">Contact Name:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="contact_seq_no" id="contact_seq_no" >
                                                        <option value="">Select One</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="col-md-4 control-label">Budget Cost US$:</label>
                                                <div class="col-md-8">
                                                    <input type="text" disabled="" class="form-control" name="remarks" value="5000">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div> -->
                                            <div class="form-group" style=" width:100%; display:inline-block">
                                                <label class="col-md-4 control-label">Potential Revenue:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  class="form-control" name="potential_rev" id="potential_rev" placeholder="Add client/target revenue" >
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group" style=" width:100%; display:inline-block">
                                                <label class="col-md-4 control-label">Activity Details Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="activity_dtl_status" id="activity_dtl_status">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($act_dtl_status as $key => $value) {?>
                                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description'] ?></option>
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
            <!--view client budget-->
             <?php // t($act_dtl_status); exit;?>
            <?php foreach ($act_dtl_res as $key_1 => $value_1) {  
//                t($value_1);?>
            <div id="responsive_edit_<?php echo $value_1['activity_dtl_seq_no']?>" class="modal fade" tabindex="-1" aria-hidden="true">
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
                                                    <input type="text"  class="form-control" name="potential_rev" readonly id="potential_rev" placeholder="Add client/target revenue" value="<?php echo $value_1['potential_revenue']; ?>">
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
    </style>
    <!--<script src="<?php echo $assets_path; ?>custom/js/validate/app_codes_add.js" type="text/javascript"></script>-->
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
    <script type="text/javascript">
    
    $('document').ready(function () {

    $('#meals').on('click', function(){
    var div = "<div class=\"row\"><div class=\"col-md-12\">\<div class=\"col-md-6\">\
                                        <div class=\"row\">\
                                            <div class=\"col-md-12\">\
                                                <p style=\"font-size:12px;\">\
                                                    <select>\
                                                        <option>Food and Beverage</option>\
                                                        <option>Admission fees, tickets and venue fees</option>\
                                                        <option>Room rental - receptions and cocktail parties</option>\
                                                        <option>Gifts and take aways</option>\
                                                        <option>Labor and Support</option>\
                                                    </select>\
                                                </p>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p style=\"font-size:12px;\">\
                                            <select>\
                                                <option>ME 1</option>\
                                                <option>ME 2</option>\
                                                <option>ME 3</option>\
                                                <option>ME 4</option>\
                                                <option>ME 5</option>\
                                            </select>\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                </div></div>";
//                                                alert (div);
            $('.meals_div').append(div);
    });

    $('#travel').on('click', function(){
    var div = "<div class=\"row\"><div class=\"col-md-12\">\
                                    <div class=\"col-md-6\">\
                                        <div class=\"row\">\
                                            <div class=\"col-md-12\">\
                                                <p style=\"font-size:12px;\">\
                                                    <select>\
                                                        <option>Transportation</option>\
                                                        <option>Lodging</option>\
                                                        <option>Mileage</option>\
                                                        <option>Car rental</option>\
                                                        <option>Taxis and Uber</option>\
                                                        <option>Client transportation (limo's, buses, vans etc.)</option>\
                                                    </select>\
                                                </p>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p style=\"font-size:12px;\">\
                                            <select>\
                                                <option>T 1</option>\
                                                <option> T 2</option>\
                                                <option>T 3</option>\
                                                <option>T 4</option>\
                                                <option>T 5</option>\
                                                <option>T 6</option>\
                                            </select>\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                </div> </div>";
//                                                alert (div);
            $('.travel_div').append(div);
    });
    });
</script>

<script>
        var BASE_URL = "<?php echo base_url(); ?>";
    </script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/activity.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#show_hide').hide();
            $("#activity_type").change(function(){
                $("#potential_revenue").removeAttr("readonly");
                var a = $(this).val();
                if (a == 'TEAM') {
                    $('#show_hide').hide();
                    $("#potential_revenue").attr("readonly","true");
                    $("#potential_revenue").val("0.00");
                }else if(a == 'INDIVIDUAL'){
                    $("#potential_revenue").val("0.00");
                    $("#potential_revenue").removeAttr("readonly");
                    $('#show_hide').show();
                }else{
                    $('#show_hide').hide();
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

            $('#budget_savetosession').click(function(){
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
                    url : BASE_URL + 'activity/make_ct_budget',
                    type : 'POST',
                    dataType : 'json',
                    data : form.serialize() /*{
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
                    success : function(data){
                        console.log(data);
                        $('#responsive_budget').modal('hide');
                    }
                });
            });

            $('#ind_ct_potential_rev').click(function(){
                if(!$('.relation_type').is(':checked')) { alert('Select relation type');  exit;}
                if($('#relation_seq_no').val() == '') { alert('Select relation name'); exit;}
//                if($('#contact_seq_no').val() == '') { alert('Select contact name'); exit;}
                if($('#potential_rev').val() == ''){ alert('Enter potential revenue'); exit; }
                var a= $('#potential_rev').val();
                 if (!isNaN(a)){
                    
                    }
                    else {
                    alert("Potential revenue should be numeric");
                    exit;
                   }
                $.ajax({
                    url : BASE_URL + 'activity/add_ct_potential_rev',
                    type : 'POST',
                    dataType : 'json',
                    data : $('#ind_ct_potential_rev_frm').serialize(),
                    success : function(data)
                    {
                       if (data.msg = 'ok') {$('#responsive').modal('hide'); 
                            location.reload(true);
                        }
                    }
                });    

            });

            <?php $j = 0; foreach ($ind_bud_dtl as $key => $value) {  
                $act_dtl_seq_no =  $act_dtl_res[$key]['activity_dtl_seq_no']; 
            ?>
            
            $('#budget_savetosession1<?php echo ++$j; ?>').click(function(){
               
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
    
             $('#relation_seq_no').change(function () {
            var a= $('input:radio[name=relation_type]:checked').val();
            //alert(a);
            $.ajax({
                url: BASE_URL + 'activity/fetch_contact/',
                type: 'post',
                dataType: 'json',
                data: {id: $('#relation_seq_no').val(),type: a },
                success: function (data) {
                    $('#contact_seq_no').html(data);

                }
            });
        });

        });

        function get_rel(reltyp)
        {
            $.ajax({
                url : BASE_URL + 'activity/get_rel_type_users_new/<?php echo base64_encode($this_activity['activity_seq_no']); ?>',
                type : 'POST',
                dataType : 'json',
                data : {
                    reltyp : reltyp
                    },
                success : function(data)
                {
//                    alert(data);
                    console.log(data);
                    $('#relation_seq_no').html(data);
                }
            });
        }
    </script>
</html>  