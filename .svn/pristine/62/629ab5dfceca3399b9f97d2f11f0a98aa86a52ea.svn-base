<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->
    <style>
.add_form_sec h3 {
font-size: 18px !important;
width: 100%;
height: 30px;
margin-bottom: 0 !important;
margin-top: 0 !important;
text-align: left;
padding-left: 0 !important;
}	

.add_input_edit_area {
    margin: 0;
    width: 100%;
    display: inline-block;
	height: 300px;
	transition : height 1s linear;
}
	   
	   .add_input_edit_area.short{

   height : 300px;
}
		
.caption .btn-sm {
padding: 5px 10px;
font-size: 12px;
line-height: 1.5;
border-radius: 3px;
}

.add_input_edit_area h3 {
font-size: 18px !important;
width: 100%;
height: 30px;
margin-bottom: 0 !important;
margin-top: 0 !important;
text-align: left;
padding-left: 0 !important;
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
  height: 1px;
  width: 100%;
  background: #fff;
  text-align: left;
  transition : height 1s linear;
	margin-bottom: 30px;
	overflow: hidden;
	display: inline-block;
/*	border-bottom: 1px solid #e7ecf1 !important;*/
}
		
.control-label {
margin-top: 6px;
font-weight: 400;
}

#div1.short{

height: 1000px;
margin-bottom: 30px;
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
	   if($(this).find('i').hasClass('fa-angle-down')){
		   $(this).find('i').removeClass('fa-angle-down');
		   $(this).find('i').addClass('fa-angle-up');
	   }else{
		   $(this).find('i').addClass('fa-angle-down');
		   $(this).find('i').removeClass('fa-angle-up');
	   }
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
            <?php //echo $breadcrumb; ?>
            <div class="page-bar" style=" position: relative">
	<div class="col-md-8">
                    <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo base_url()?>dashboard">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <!-- <a href="#">Master Contacts</a> -->
                        <a href="<?php echo base_url()?>targets">Module1</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>View</span>
                    </li>
                </ul>
				</div>
              
              	<div class="col-md-4">
               
               	<table width="180px" align="right">
               		<tr>
               		    <?php if(!empty($prev)){?>
                                <td style="width: 35px" height="40px" valign="top"><a style="width: 100%; display: block" href="<?php echo $base_url;?>targets/previous_contact/<?php echo base64_encode($targets['target_seq_no']); ?>" id="prev"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-left"></i></a></td>
                            <?php } ?>
                            
                            <td style=" width: 90px">
                                <div class="btn-group btn-group-devided" data-toggle="buttons" style=" position: absolute; top:4px">				
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                    <!--<input name="options" class="toggle" id="option1" type="radio">-->
                                        <a style=" text-decoration: none; color:#fff" href="" onclick="javascript:window.location.href='<?php echo $base_url;?>targets'"> Back to Listing</a></label>				
                                </div>
                            </td>
                            
                            <?php if(!empty($next)){?>
                                <td style=" width: 35px" height="35px" valign="top"><a style="width: 100%; display: block" href="<?php echo $base_url;?>targets/next_contact/<?php echo base64_encode($targets['target_seq_no']); ?>" id="next"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-right pull-right"></i></a></td>
                            <?php } ?>
               		</tr>
                        
               		
               	</table>
                
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
                           	<div class="col-md-6 col-lg-6">
                           		<div class="caption font-dark">
                               
                               	<span class="caption-subject bold" style=" width: 100%; margin-bottom: 10px; margin-top: 10px; display: block"><i class="fa fa-university"></i> <?php echo $targets['company']; ?></span>
                               	
                               	<span class="caption-subject bold" style=" width: 100%; display: block"><i class="fa fa-user"></i> <?php echo $targets['target_first_name'].' '.$targets['target_last_name']; ?> </span>
                               	
                               	
<!--
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold"> Name: <?php echo $targets['target_first_name'].' '.$targets['target_last_name']; ?>
                                 <?php if($target_info['add_flag']==1){ ?>
                                   <font color="red" style="margin-left: 150px;">Imported Data</font>
                                   <?php } ?>
                                </span>
                                
                                <span class="caption-subject bold" style="margin-left: 0px; width: 100%; display: inline-block;">Phone:<?php echo $targets['phone'];?>
                                
                                <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                
                                </span>
-->
                                
<!--
                                <span style=" width: 200px; margin-left: 50px; display: inline-block">
                                	<button class="btn btn-transparent dark btn-outline btn-circle active" id="clicker">View Details <i class="fa  fa-angle-down"></i></button>
                                	
                                </span>
-->
<!--
                                 <?php if($targets['type'] == 'O') {?>
                               <span style=" width: 200px; margin-left: -81px; display: inline-block">
                                <a href="<?php echo $base_url; ?>targets/add_contact/<?php echo base64_encode($targets['target_seq_no']); ?>/<?php echo base64_encode($targets['firm_seq_no']); ?>">	
                                    <button class="btn btn-transparent dark btn-outline btn-circle active" id="clicker">Add Contact </button>
                                </a>	
                                </span>  
                                 <?php }?> 
-->
                                 
                            </div>
                           		
                           	</div>
                           	
                            <div class="col-md-3 col-lg-3" style=" padding-left: 0; padding-right: 0">
                           		<span style=" width: 100%; display: inline-block;"><img src="http://localhost/digital1crm/assets/upload/image/inner_logo11.jpg" alt="logo" class="logo-default"></span>
                           		
								<span class="caption-subject bold" style="margin-top: 10px; width: 100%; display: inline-block;">Phone:<?php echo $targets['phone'];?>
                                
                                <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                
                                </span>

                                

                                
                           		
                           	</div>
                           	
                           	<div class="col-md-3 col-lg-3">
                           		<div class="actions" style=" width: 100%; display: inline-block">
                                <div class="btn-group btn-group-devided pull-right" data-toggle="buttons">
                                    <ul class="list-inline">
										<li><a href=""><i class="fa fa-envelope-o"></i> SMS</a></li>
										<li><a href="" onclick="javascript:window.location.href='<?php echo $base_url; ?>targets/temp_email/<?php echo base64_encode($targets['target_seq_no'])?>/<?php echo base64_encode($targets['company_id'])?>'"><i class="fa fa-envelope-o"></i> Email</a></li>
										<li><a href=""><i class="fa fa-code"></i> Script</a></li>
										
									</ul>
                                </div>
                                
                                
                                
                            </div>
                            
                            <span style=" width: 100%; margin-bottom: 10px; text-align: right; display: inline-block">
                                	<button class="btn btn-transparent dark btn-outline btn-circle active">Add New Master Contact</button>
                                	
                                </span>
                            
                            
                           	</div>
                           
                            
                            

                        </div>
                        <div class="portlet-body">
                           <div class="row">
                           
							   <div style=" width: 100%; display: inline-block">
                           <div class="add_form_sec">
                               <form role="form" id="myfirm-general-info-form" autocomplete="off" method="post" action="<?php echo $base_url . 'targets/send_module2/'. base64_encode($targets['target_seq_no'])?>">
                                   <!--<input type="hidden" name="target_seq_no" value="<?php echo $targets['target_seq_no'];?>">-->
                               <div class="col-md-12">
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
                                       
                                       
                                       <div class="col-md-12" style=" padding-right: 0; padding-left: 0">
                                
                                       
                                       </div>
                                       
                                       
										<div class="row">
											<div class="col-md-6">
												<h3 class="hint"> General Informations </h3>
												<div class="portlet light bordered">
													<div class="form-group bb">
														<label class="control-label">First Name</label>
														<input type="text" placeholder="Enter Firm Name" class="form-control" name="target_first_name" id="target_first_name" value="<?php if(isset($targets['target_first_name']) && $targets['target_first_name'] != ''){echo $targets['target_first_name']; } ?>"/> </div>

													<div class="form-group bb">
														<label class="control-label">Last Name</label>
														<input type="text" placeholder="Enter Firm Name" class="form-control" name="target_last_name" id="target_last_name" value="<?php if(isset($targets['target_last_name']) && $targets['target_last_name'] != ''){echo $targets['target_last_name']; } ?>"/> </div>

													<div class="form-group bb">
														<label class="control-label">Email</label>
														<input type="text" placeholder="Enter Firm ID" class="form-control" name="email_target_id" id="email_target_id" value="<?php echo $targets['email'];?>"/>
													</div>

													<div class="form-group bb">
														<label class="control-label" style=" width: 100%; display: inline-block">Phone</label>
														<!--<input type="text" placeholder="" class="form-control" disabled="" name="target_code" id="target_code" value="<?php echo $targets['phone'];?>" />-->
														<input type="text" value="<?php echo $targets['country_code1']; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block" readonly>
														<input type="text" placeholder="" value="<?php echo $targets['home_phone_10']; ?>" class="form-control phone" id="home_phone" name="home_phone" style="width: 83%; margin-left: -5px; display: inline-block">
													</div>

													<div class="form-group bb">
														<label class="control-label">Mobile</label>
														<input type="text" placeholder="" class="form-control" name="mobile" id="mobile" value="<?php echo $targets['mobile'];?>"/>
													</div>

													<div class="form-group bb">
														<label class="control-label">Address</label>
														<input type="text" placeholder="" class="form-control" name="address1" id="address1" value="<?php echo $targets['address']; ?>"/>
													</div>

													<div class="form-group bb">
														<label class="control-label">Company Name</label>
														<input type="text" placeholder="Enter Target Company" class="form-control" name="target_company_name" id="target_company_name" value="<?php echo $targets['company']; ?>"/>
													</div>





													<div class="form-group">
														<label class="control-label">Categories</label>
														<input type="text" placeholder="Enter Target Company" class="form-control" name="industry_type" id="industry_type" value="<?php echo $targets['categories']; ?>"/>
													</div>

													<div class="form-group">
														<label class="control-label">Date Contacted</label>
														<input type="text" placeholder="" class="form-control" name="date_contacted" id="" value="<?php echo date(" m-d-Y "); ?>"/>
													</div>

												</div>

											</div>

											<!-- <div class="col-md-6">
												<h3 class="hint"> Contact Type </h3>
												
												<div class="portlet light bordered" style=" display: inline-block; width: 100%;">
													<div class="col-md-5">
														<div class="checkbox">
															<label><input style="margin-top: 3px; margin-right: 10px" type="checkbox" value="">Corporate</label>
														</div>
														<div class="checkbox">
															<label><input style="margin-top: 3px; margin-right: 10px" type="checkbox" value="">individual</label>
														</div>
													</div>
													
													<div class="col-md-7">
														<div class="next_date_area">
															<ul class="list-unstyled">
																<li><button class="btn btn-transparent dark btn-outline btn-circle active">Next Call Date</button>
																</li>
																<li><button class="btn btn-transparent dark btn-outline btn-circle active">Make Appointment</button>
																</li>
																<li><button class="btn btn-transparent dark btn-outline btn-circle active">Do Not Call Me</button>
																</li>
																<li><button class="btn btn-transparent dark btn-outline btn-circle active">None</button>
																</li>
																<li><button class="btn btn-transparent dark btn-outline btn-circle active">Add Contact</button>
																</li>
																<li><button class="btn btn-transparent dark btn-outline btn-circle active">Add Note</button>
																</li>
															</ul>
														</div>
													</div>
													


												</div>

											</div> -->



											<div class="col-md-12">
												<input type="submit" id="general-edit-submit-btn" class="btn green pull-right" name="submit" value="Submit">
												<input style="margin-right: 10px" type="button" id="" class="btn green pull-right" name="" value="Cancel">
											</div>
										</div>

                               </div>

                               </form>
                               </div>
                               </div>
                               
                           </div>
                            
                        </div>
<!--                        <div style=" width: 100%; display: inline-block">
                           <h2 style="font-size: 16px; font-weight: 700; color: #2f353b; margin-top: 15px; margin-left: 3px">Contact List</h2>
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
                                                <th> Action </th>
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
                                                    <td>
                                                        <div class="btn-group" style="width: 100px;">
                                                        <a href="<?php echo $base_url; ?>targets/con_edit/<?php echo base64_encode($val['contact_seq_no']); ?>" class="btn btn-xs green sbold">Edit</a>
                                                        </div>
                                                        </td>

                                                    
                                                </tr>
<?php } ?>
                                        </tbody>
                                    </table>
                            </div>-->
                            
                             
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
    
<!--    //new implement by sobhan 31-03-17-->

<script src="<?php echo $assets_path; ?>custom/Datepair.js/dist/datepair.js"></script>
<script src="<?php echo $assets_path; ?>custom/Datepair.js/dist/jquery.datepair.js"></script>
<script src="<?php echo $assets_path; ?>custom/jquery-timepicker/jquery.timepicker.js"></script>
<link href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css"/>
<!--<link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />-->
<!--    //end-->
<!-- END PAGE LEVEL PLUGINS -->   
    <style type="text/css">
  .btn.default:not(.btn-outline) {
    background-color: #e1e5ec;
    border-color: #e1e5ec;
    color: #666;
    top:13px !important;
}

.add_form_sec{ margin: 0; width: 100%;  display: inline-block; background: #fff }
.ui-timepicker-wrapper {
	overflow-y: auto;
	height: 150px;
	width: 6.5em;
	background: #fff;
	border: 1px solid #ddd;
	-webkit-box-shadow:0 5px 10px rgba(0,0,0,0.2);
	-moz-box-shadow:0 5px 10px rgba(0,0,0,0.2);
	box-shadow:0 5px 10px rgba(0,0,0,0.2);
	outline: none;
	z-index: 10001;
	margin: 0;
}

.ui-timepicker-wrapper.ui-timepicker-with-duration {
	width: 13em;
}

.ui-timepicker-wrapper.ui-timepicker-with-duration.ui-timepicker-step-30,
.ui-timepicker-wrapper.ui-timepicker-with-duration.ui-timepicker-step-60 {
	width: 11em;
}

.ui-timepicker-list {
	margin: 0;
	padding: 0;
	list-style: none;
}

.ui-timepicker-duration {
	margin-left: 5px; color: #888;
}

.ui-timepicker-list:hover .ui-timepicker-duration {
	color: #888;
}

.ui-timepicker-list li {
	padding: 3px 0 3px 5px;
	cursor: pointer;
	white-space: nowrap;
	color: #000;
	list-style: none;
	margin: 0;
}

.ui-timepicker-list:hover .ui-timepicker-selected {
	background: #fff; color: #000;
}

li.ui-timepicker-selected,
.ui-timepicker-list li:hover,
.ui-timepicker-list .ui-timepicker-selected:hover {
	background: #1980EC; color: #fff;
}

li.ui-timepicker-selected .ui-timepicker-duration,
.ui-timepicker-list li:hover .ui-timepicker-duration {
	color: #ccc;
}

.ui-timepicker-list li.ui-timepicker-disabled,
.ui-timepicker-list li.ui-timepicker-disabled:hover,
.ui-timepicker-list li.ui-timepicker-selected.ui-timepicker-disabled {
	color: #888;
	cursor: default;
}

.ui-timepicker-list li.ui-timepicker-disabled:hover,
.ui-timepicker-list li.ui-timepicker-selected.ui-timepicker-disabled {
	background: #f2f2f2;
}

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
    
    //for datepicker & time picker
    $('#basicExample').timepicker();
    // initialize input widgets first
    $('#datepairExample .date').datepicker({
//        'format': 'yyyy-m-d',
        'format': 'mm-dd-yyyy',
        'autoclose': true
    });
    $('#datepairExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    

    // initialize datepair
    $('#datepairExample').datepair();

//end
	
	$('#keep_in_touch').on('click', function () {
            var numItems = $('.keep_touch').length;
            if (numItems <= 3) {
                numItems = numItems + 1;
                var content = "<div class=\"row keep_touch\" id='touch" + numItems + "'>\n\<span class=\"pull-right\"> <a id='reduce" + numItems + "' style=\"cursor: pointer;\" class=\"remove\"><span style=\"padding-right:10px\" class=\"glyphicon glyphicon-minus\"></span></a></span>\n\
                <div style=\"width: 100%;\">\n\
                    <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                        <div style=\"width: 100%\"><label>First Name #" + numItems + "  </label></div>\n\
                        <div class=\"input-group\" style=\"width: 100%\">\n\
                            <input type=\"text\" placeholder=\"\" class=\"form-control \" id='keep_in_touch" + numItems + "' name=\"keep_in_touch_1[]\" value=\"\">\n\
                        </div>\n\
                    </div>\n\
                    <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                        <div style=\"width: 100%\"><label>Last Name #" + numItems + "  </label></div>\n\
                        <div class=\"input-group\" style=\"width: 100%\">\n\
                            <input type=\"text\" placeholder=\"\" class=\"form-control\" id='keep_in_touch_date" + numItems + "' name=\"keep_in_touch_date_1[]\" value=\"\">\n\
                            <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"></i> </span>\n\
                        </div>\n\
                    </div>\n\
                    <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                        <div style=\"width: 100%\"><label>Email #" + numItems + "  </label></div>\n\
                        <div class=\"input-group\" style=\"width: 100%\">\n\
                            <input type=\"text\" placeholder=\"\" class=\"form-control\" id='email_" + numItems + "' name=\"email_1[]\" value=\"\">\n\
                        </div>\n\
                    </div>\n\
                    <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                        <div style=\"width: 100%\"><label>Phone #" + numItems + "  </label></div>\n\
                        <div class=\"input-group\" style=\"width: 100%\">\n\
                            <input type=\"text\" placeholder=\"\" class=\"form-control\" id='phone_" + numItems + "' name=\"phone_1[]\" value=\"\">\n\
                        </div>\n\
                    </div>\n\
                    <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                        <div style=\"width: 100%\"><label>Designation #" + numItems + "  </label></div>\n\
                        <div class=\"input-group\" style=\"width: 100%\">\n\
                            <input type=\"text\" placeholder=\"\" class=\"form-control\" id='designation_" + numItems + "' name=\"designation_1[]\" value=\"\">\n\
                        </div>\n\
                    </div>\n\
                </div>";
                $('#keep_in_touch_div').append(content);
                $('.datepicker').datepicker();
            } else {
                $.alert({
                    title: 'Alert!',
                    content: 'You can not add more than 12 fields!',
                    confirm: function () {
                    }
                });
            }

        });
        $(document).on('click', '.remove', function (e) {
            var numItems = $('.keep_touch').length;
            var keep_in_touch_div_id = $(this).closest("div.keep_touch").attr("id");
            $('#' + keep_in_touch_div_id).remove();
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
  
  
  <style type="text/css">
    .box{
        padding:5px 15px;
        display: none;
        margin-top: 0px;
    }

</style>
   
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script> 
   
   
    </body>

</html> 

