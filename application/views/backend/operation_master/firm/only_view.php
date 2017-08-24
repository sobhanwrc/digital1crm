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
            <div class="page-bar" style=" position:  relative">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo base_url() ?>dashboard">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="<?php echo $base_url; ?>firm">Company</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Company View</span>
                    </li>
                </ul>
                
                <div class="btn-group btn-group-devided" data-toggle="buttons" style=" position:absolute; top: 7px; right: 20px">
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
                   <div class="portlet light ">
                       <div class="portlet-title tabbable-line">
                           <div class="caption caption-md">
                               <i class="icon-globe theme-font hide"></i>
                               <span class="caption-subject font-blue-madison bold uppercase">Company Information</span>
                           </div>
                           <ul class="nav nav-tabs">
                               <li class="active">
                                   <a href="#tab_1_1" data-toggle="tab">General Info</a>
                               </li><!-- 
                               <li>
                                   <a href="#tab_1_2" data-toggle="tab">Locations</a>
                               </li>
                               <li>
                                   <a href="#tab_1_3" data-toggle="tab">Attorneys</a>
                               </li> -->
                           </ul>
                       </div>
                       
                       <div class="portlet-body">
                           <div class="tab-content">
                               
                               <div class="tab-pane active" id="tab_1_1">
                                   <form role="form" id="myfirm-general-info-edit-form" autocomplete="off" method="post" action="<?php echo $base_url . 'firm/details/' . base64_encode($firm_details[0]['firm_seq_no']); ?>">
                                    <input type="hidden" name="general_tab" value="yes">
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

                                        
                                        <h3 class="hint"> General Informations </h3> <?php //t($firm_info); exit; ?>
                                        <div class="form-group">
                                                         <label class="control-label">Firm Name</label>
                                                         <input type="text" placeholder="Enter Firm Name" class="form-control" name="firm_name" id="firm_name" value="<?php echo $firm_details[0]['firm_name'];?>" disabled="disabled" /> </div>
                                                     
                                                     <div class="form-group">
                                                         <label class="control-label">Firm Code</label>
                                                         <input type="text" placeholder="Enter Code" class="form-control" name="firm_code" id="firm_code" value="<?php echo $firm_details[0]['firm_code'];?>"  disabled="disabled"/> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Firm Registration</label>
                                                         <input type="text" placeholder="Enter Registration" class="form-control" name="firm_reg" id="firm_reg" value="<?php echo $firm_details[0]['firm_registration'];?>"  disabled="disabled" /> </div>
                                                          <h3 class="hint"> Single Point Information </h3>
                                                            <div class="form-group">
                                                                <label class="control-label">SP Contact Name</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Name" name="sp_name" value="<?php echo $firm_details[0]['sp_contact_name'];?>" disabled="disabled" /> </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label">SP Contact Role</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Role" name="sp_role" value="<?php echo $firm_details[0]['sp_contact_role'];?>" disabled="disabled" /> </div>

                                                                <h3 class="hint"> Firm Credential </h3>
                                                                <div class="form-group">
                                                                    <label class="control-label">Username</label>
                                                                    <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email" value="<?php echo $firm_details[0]['user_id'];?>" readonly="readonly" disabled="disabled" /> </div>

                                      </div>
                                      <div class="col-md-6">
                                        <h3 class="hint"> Enter Address </h3>
                                        <input type="hidden" name="firmid_2" id="firmid_2" value="<?php if(isset($firm_info['id']) && $firm_info['id'] != ''){echo $firm_info['id']; } ?>">                                                     
                                                     <div id="validate_div_12" >
                                                     <div class="form-group">
                                                         <label class="control-label">Email</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" value="<?php echo $firm_details[0]['email'];?>" disabled="disabled" /> 
                                                     </div>
                                                     <div class="form-group required">
                                                        <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>
                                                        <input readonly="" type="text" placeholder="" class="form-control" id="country_code1" value="<?php echo $country_code1;?>" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">
                                                        <input readonly="" class="form-control placeholder-no-fix" type="text" placeholder="Phone" value="<?php echo $phone_no;?>" name="phone" id="phone" style="width: 85%; margin-left: -5px; display: inline-block" /> 

                                                        <label id="country_code1-error" class="customErrorClass" for="country_code1" style="display: inline-block;"></label>
                                                        <label id="phone-error" class="customErrorClass" for="phone"></label>
                                                    </div>
                                                     <div class="form-group required">
                                                        <label class="control-label" style=" width: 100%; display: inline-block">Mobile</label>
                                                        <input readonly="" type="text" placeholder="" class="form-control" id="country_code2" value="<?php echo $country_code2;?>" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">
                                                        <input readonly="" class="form-control placeholder-no-fix" type="text" placeholder="Mobile" value="<?php echo $user_mobile_no;?>" name="mobile" id="mobile" style="width: 85%; margin-left: -5px; display: inline-block" /> 

                                                        <label id="country_code2-error" class="customErrorClass" for="country_code2" style="display: inline-block;"></label>
                                                        <label id="mobile-error" class="customErrorClass" for="mobile"></label>
                                                    </div>
                                                    <div class="form-group">
                                                         <label class="control-label">Fax</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Fax" name="fax" id="fax" value="<?php echo $firm_details[0]['fax'];?>" disabled="disabled" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Website URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url" value="<?php echo $firm_details[0]['website_url'];?>" disabled="disabled"/> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Social URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url" value="<?php echo $firm_details[0]['social_media_url'];?>" disabled="disabled" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Address Line 1</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_1" value="<?php echo $firm_details[0]['address_line1'];?>" disabled="disabled" /> </div>
                                                     
                                                     <div class="form-group">
                                                         <label class="control-label">Address Line 2</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_2" value="<?php echo $firm_details[0]['address_line2'];?>" disabled="disabled" /> </div>
                                                      <div class="form-group">
                                                          <label class="control-label">Address Line 3</label>
                                                          <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_3" value="<?php echo $firm_details[0]['address_line3'];?>" disabled="disabled" /> </div>

                                                     <div class="form-group">
                                                         <label class="control-label">Country</label>
<!--                                                         <select name="country" id="country" class="form-control" disabled="disabled">
                                                             <option value="">Country</option>
                                                             <?php foreach ($country_details as $key => $value) {
                                                                 # code...
                                                            ?>
                                                            <option value="<?php echo $value['country_seq_no'];?>" <?=$value['country_seq_no'] == $firm_details[0]['country']?'selected':''?>><?php echo $value['name'];?></option>
                                                            <?php
                                                             }
                                                             ?>
                                                             
                                                         </select>-->
                                                         <input readonly="" class="form-control placeholder-no-fix" type="text" placeholder="Country" name="country" value="<?php echo $firm_details[0]['country'];?>" />
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">State</label>
<!--                                                         <select name="state" id="state" class="form-control" disabled="disabled">
                                                             <option value="">State</option>
                                                             <?php foreach ($state_details_details as $key => $value) {
                                                                 # code...
                                                            ?>
                                                            <option value="<?php echo $value['state_seq_no'];?>" <?=$value['state_seq_no'] == $firm_details[0]['state']?'selected':''?>><?php echo $value['state_name'];?></option>
                                                            <?php
                                                             }
                                                             ?>
                                                             
                                                         </select>-->
                                                         <input readonly="" class="form-control placeholder-no-fix" type="text" placeholder="State" name="state" value="<?php echo $firm_details[0]['state'];?>" />
                                                     </div>
                                                     
                                                     <div class="form-group">
                                                         <label class="control-label">City/Town</label>
<!--                                                         <select name="city" id="city" class="form-control" disabled="disabled">
                                                             <option value="">City/Town</option>
                                                             <?php foreach ($city_details_details as $key => $value) {
                                                                 # code...
                                                            ?>
                                                            <option value="<?php echo $value['city_seq_no'];?>" <?=$value['city_seq_no'] == $firm_details[0]['city']?'selected':''?>><?php echo $value['city_name'];?></option>
                                                            <?php
                                                             }
                                                             ?>
                                                             
                                                             
                                                         </select>-->
                                                         <input readonly="" class="form-control placeholder-no-fix" type="text" placeholder="City" name="city" value="<?php echo $firm_details[0]['city'];?>" />
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Postal Code</label>
                                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code" value="<?php echo $firm_details[0]['postal_code'];?>" disabled="disabled" /> </div>
                                                     </div>

                                                      <h3 class="hint"> Remarks </h3>

                                                    <div class="form-group">
                                                                    <label class="control-label">Remarks</label>
                                                                    <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks" disabled="disabled"><?php echo $firm_details[0]['remarks_notes'];?></textarea>
                                                                </div>

                                               <div class="margiv-top-10">
                                                   
                                               </div>
                                      </div> 
                                    </div>     
                                           </form>
                               </div>

                               <div class="tab-pane" id="tab_1_2">
                                   <div class="portlet-body">
                                        
                                       <div class="portlet-title">
                                           <div class="caption font-dark">
                                               <i class="icon-settings font-dark"></i>
                                               <span class="caption-subject bold uppercase">Firm Locations</span>
                                           </div>
                                       </div>
                                        <?php $aaa = $this->session->flashdata('suc_message11'); if(isset($aaa) &&  $aaa != ''){ ?>
                                        <div class="alert alert-success" id="general_msg_success" >
                                            <strong>Success!</strong> <?php echo $aaa; ?>
                                        </div>
                                        <?php } ?>
                                        <?php $aaa = $this->session->flashdata('err_message11'); if(isset($aaa) &&  $aaa != ''){ ?>
                                        <div class="alert alert-danger" id="general_msg_success" >
                                            <strong>Error!</strong> <?php echo $aaa; ?>
                                        </div>
                                        <?php } ?>
                                       <div style="margin-top:70px;"></div>
                                       <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                       <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                           <thead>
                                               <tr class="">
                                                   <th> SL# </th>
                                                   <th> Address Type </th>
                                                   <th> Line-1 </th>
                                                   <th> City/State </th>
                                                   <th> Email </th>
                                                   <th> Phone </th>
                                                   <th> Actions </th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                           <?php //t($all_locations); exit; ?>
                                           <?php $i = 0; foreach ($all_locations as $key => $value) { $value = (array) $value; ?>
                                               <tr>
                                                   <td> <?php echo ++$i; ?> </td>
                                                   <td> <?php echo $value['short_description']; ?> </td>
                                                   <td> <?php echo $value['address_line1']; ?> </td>
                                                   <td> <?php echo $value['city_name'] . '/' . $value['state_name']; ?> </td>
                                                   <td> <?php echo $value['email']; ?> </td>
                                                   <td> <?php echo $value['phone']; ?> </td>
                                                   
                                                   <td>
                                                       <div class="btn-group">
                                                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                               <i class="fa fa-angle-down"></i>
                                                           </button>
                                                           <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                   <a href="http://dev.wrctechnologies.com/ams/case/index">
                                                                       <i class="icon-docs"></i> Case
                                                                   </a>
                                                               </li>
                                                               <li>
                                                                   <a href="#responsive_v_<?php echo $i; ?>" data-toggle="modal" >
                                                                       <i class="icon-docs"></i> View </a>
                                                               </li>
                                                               <li>
                                                                   <a href="#responsive_<?php echo $i; ?>" data-toggle="modal">
                                                                       <i class="icon-tag"></i> Edit
                                                                   </a>
                                                               </li>
                                                               <li>
                                                                   <a href="javascript:;">
                                                                       <i class="icon-tag"></i> Delete </a>
                                                               </li><!-- -->
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
                               <d
                               <!-- END CHANGE PASSWORD TAB -->
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    
    <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Location</h4>
                </div>
                <form action="#" name="add-location-form" id="add-location-form" method="post">

                    <input type="hidden" name="" id="url_submit1" value="<?php echo $base_url . 'firm/details/' . base64_encode($firm_info['firm_seq_no']); ?>">
                    <input type="hidden" name="add_firm_location" value="yes"> 

                    <div class="modal-body">
                        <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="validate_div_12" >
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email1" id="email1"  /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Phone</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone1" id="phone1"  /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mobile</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile1" id="mobile1" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Fax</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax1" id="fax1"  /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Website URL</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url1" id="web_url1" /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Social URL</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url1" id="social_url1"  /> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Firm Address Type</label>
                                        <select name="firm_addr_type" id="firm_addr_type" class="form-control ">
                                            <option value="">Select</option>
                                            <?php foreach ($all_firm_addr_type as $key => $value) { $value = (array) $value; ?>
                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                            <?php } ?>
                                           
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Address Line 1</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_11"  /> </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Address Line 2</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_21"  /> </div>
                                     <div class="form-group">
                                         <label class="control-label">Address Line 3</label>
                                         <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_31"  /> </div>

                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                        <select name="country11" id="country1" class="form-control country1">
                                            <option value="">Country</option>
                                           
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">State</label>
                                        <select name="state11" id="state1" class="form-control">
                                            <option value="">State</option>
                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">City/Town</label>
                                        <select name="city11" id="city1" class="form-control">
                                            <option value="">City/Town</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Postal Code</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code1" id="postal_code1" /> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button type="submit" id="add-location-submit-btn" class="btn green" name="general_save_change">Save</button>
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


    <?php $i = 0; foreach ($all_locations as $key => $value) { $value = (array) $value; ?>
       <div id="responsive_<?php echo ++$i; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title">Edit Firm Location</h4>
                       </div>
                       <form action="<?php echo $base_url . 'firm/location-edit/' . base64_encode($value['address_seq_no']); ?>" name="add-location-form" class="add-location-form firm_location_edit_form" method="post">

                           <input type="hidden" name="edit_firm_location" value="yes"> 
                           <input type="hidden" name="firm_id" value="<?php echo base64_encode($firm_info['firm_seq_no']); ?>"> 

                           <div class="modal-body">
                               <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div id="validate_div_12" >
                                           <div class="form-group">
                                               <label class="control-label">Email</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email2" id="email2" value="<?php echo $value['email']; ?>"  /> 
                                               <input  type="hidden" id="hidden_original_email" value="<?php echo $value['email']; ?>"  />

                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Phone</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone2" id="phone2" value="<?php echo $value['phone']; ?>" /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Mobile</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile2" id="mobile2" value="<?php echo $value['mobile_cell']; ?>"  /> 
                                           </div>
                                            <div class="form-group">
                                               <label class="control-label">Fax</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax2" id="fax2" value="<?php echo $value['mobile_cell']; ?>"  /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Website URL</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url2" id="web_url2"  value="<?php echo $value['website_url']; ?>" /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Social URL</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url2" id="social_url2" value="<?php echo $value['social_media_url']; ?>"  /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Firm Address Type</label>
                                               <select name="firm_addr_type2" id="firm_addr_type" class="form-control ">
                                                   <option value="">Select</option>
                                                   <?php foreach ($all_firm_addr_type as $key1 => $value1) { $value1 = (array) $value1; ?>
                                                   <option value="<?php echo $value1['code']; ?>" <?php if($value1['code'] == $value['firm_address_type']){ echo 'selected="selected"';} ?>><?php echo $value1['short_description']; ?></option>
                                                   <?php } ?>
                                                  
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Address Line 1</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_12" value="<?php echo $value['address_line1']; ?>"  /> </div>
                                           
                                           <div class="form-group">
                                               <label class="control-label">Address Line 2</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_22" value="<?php echo $value['address_line2']; ?>" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Address Line 3</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_32" value="<?php echo $value['address_line3']; ?>" /> </div>


                                            <?php 
                                            $sql_31 = "select * from  plma_address where address_seq_no = '".$value['address_seq_no']."'";
                                            $res_31 = $this->db->query($sql_31);
                                            $row_31 = $res_31->result(); //
                                            $row_31 = (array) $row_31[0]; //echo '<pre>' . print_r($row_31);
                                            ?>
                                           <div class="form-group">
                                               <label class="control-label">Country</label>
                                               <select name="country2" id="country_<?php echo $y = $i + 100; ?>" class="form-control">
                                                   <option value="">Country</option>
                                                    <?php 
                                                        $sql3 = "SELECT * FROM `plma_country` ORDER BY `plma_country`.`name` ASC ";
                                                        $res3 = $this->db->query($sql3); 
                                                        foreach ($res3->result() as $key3 => $value3) { $value3 = (array) $value3; ?>
                                                        <option value="<?php echo $value3['country_seq_no']; ?>" <?php if($value3['country_seq_no'] == $row_31['country']){echo 'selected="selected"';} ?> ><?php echo $value3['name']; ?></option>
                                                    <?php } ?>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">State</label>
                                               <select name="state2" id="state_<?php echo $y; ?>" class="form-control">
                                                   <option value="">State</option>
                                                   <?php 
                                                       $sql4 = "SELECT * FROM `plma_states` ORDER BY `plma_states`.`state_name` ASC";
                                                       $res4 = $this->db->query($sql4); 
                                                       foreach ($res4->result() as $key4 => $value4) { $value4 = (array) $value4; ?>
                                                       <option value="<?php echo $value4['state_seq_no']; ?>" <?php if($value4['state_seq_no'] == $row_31['state']){echo 'selected="selected"';} ?> ><?php echo $value4['state_name']; ?></option>
                                                   <?php } ?>
                                               </select>
                                           </div>
<!--                                           <div class="form-group">
                                               <label class="control-label">County</label>
                                               <select name="county2" id="county_<?php echo $y; ?>" class="form-control">
                                                   <option value="">County</option>
                                                   <?php 
                                                       $sql5 = "SELECT * FROM `plma_county`  ORDER BY `plma_county`.`county_name` ASC";
                                                       $res5 = $this->db->query($sql5); 
                                                       foreach ($res5->result() as $key5 => $value5) { $value5 = (array) $value5; ?>
                                                       <option value="<?php echo $value5['county_seq_no']; ?>" <?php if($value5['county_seq_no'] == $row_31['county']){echo 'selected="selected"';} ?> ><?php echo $value5['county_name']; ?></option>
                                                   <?php } ?>
                                               </select>
                                           </div>-->
                                           <div class="form-group">
                                               <label class="control-label">City/Town</label>
                                               <select name="city2" id="city_<?php echo $y; ?>" class="form-control">
                                                   <option value="">City/Town</option>
                                                   <?php 
                                                       $sql6 = "SELECT * FROM `plma_city` ORDER BY `plma_city`.`city_name` ASC";
                                                       $res6 = $this->db->query($sql6); 
                                                       foreach ($res6->result() as $key6 => $value6) { $value6 = (array) $value6; ?>
                                                       <option value="<?php echo $value6['city_seq_no']; ?>" <?php if($value6['city_seq_no'] == $row_31['county']){echo 'selected="selected"';} ?> ><?php echo $value6['city_name']; ?></option>
                                                   <?php } ?>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Postal Code</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code2"  value="<?php echo $value['postal_code']; ?>" /> </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                               <button type="submit" class="btn green add-location-submit-btn firm_location_edit" name="general_save_change">Save</button>
                           </div>
                       </form>
                   </div>
               </div>
       </div>

       <div id="responsive_v_<?php echo $i; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title">Edit Firm Location</h4>
                       </div>
                       <form action="<?php echo $base_url . 'firm/location-edit/' . base64_encode($value['address_seq_no']); ?>" name="add-location-form" class="add-location-form firm_location_edit_form" method="post">

                           <input type="hidden" name="edit_firm_location" value="yes"> 
                           <input type="hidden" name="firm_id" value="<?php echo base64_encode($firm_info['firm_seq_no']); ?>"> 

                           <div class="modal-body">
                               <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div id="validate_div_12" >
                                           <div class="form-group">
                                               <label class="control-label">Email</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email2" id="email2" value="<?php echo $value['email']; ?>"  disabled="disabled" /> 
                                               <input  type="hidden" id="hidden_original_email" value="<?php echo $value['email']; ?>"  />

                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Phone</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone2" id="phone3" value="<?php echo $value['phone']; ?>" disabled="disabled" /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Mobile</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile2" id="mobile3" value="<?php echo $value['mobile_cell']; ?>"  disabled="disabled" /> 
                                           </div>
                                            <div class="form-group">
                                               <label class="control-label">Fax</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax2" id="fax3" value="<?php echo $value['mobile_cell']; ?>"  disabled="disabled" /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Website URL</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url2" id="web_url3" value="<?php echo $value['website_url']; ?>" disabled="disabled" /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Social URL</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url2" id="social_url3" value="<?php echo $value['social_media_url']; ?>" disabled="disabled"  /> 
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Firm Address Type</label>
                                               <select name="firm_addr_type2" id="firm_addr_type" class="form-control " disabled="disabled">
                                                   <option value="">Select</option>
                                                   <?php foreach ($all_firm_addr_type as $key1 => $value1) { $value1 = (array) $value1; ?>
                                                   <option value="<?php echo $value1['code']; ?>" <?php if($value1['code'] == $value['firm_address_type']){ echo 'selected="selected"';} ?>><?php echo $value1['short_description']; ?></option>
                                                   <?php } ?>
                                                  
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Address Line 1</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_12" value="<?php echo $value['address_line1']; ?>" disabled="disabled"  /> </div>
                                           
                                           <div class="form-group">
                                               <label class="control-label">Address Line 2</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_22" value="<?php echo $value['address_line2']; ?>" disabled="disabled" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Address Line 3</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_32" value="<?php echo $value['address_line3']; ?>" disabled="disabled" /> </div>


                                            <?php 
                                            $sql_31 = "select * from  plma_address where address_seq_no = '".$value['address_seq_no']."'";
                                            $res_31 = $this->db->query($sql_31);
                                            $row_31 = $res_31->result(); //
                                            $row_31 = (array) $row_31[0]; //echo '<pre>' . print_r($row_31);
                                            ?>
                                           <div class="form-group">
                                               <label class="control-label">Country</label>
                                               <select name="country2" id="country_<?php echo $y = $i + 100; ?>" class="form-control" disabled="disabled">
                                                   <option value="">Country</option>
                                                    <?php 
                                                        $sql3 = "SELECT * FROM `plma_country` ORDER BY `plma_country`.`name` ASC ";
                                                        $res3 = $this->db->query($sql3); 
                                                        foreach ($res3->result() as $key3 => $value3) { $value3 = (array) $value3; ?>
                                                        <option value="<?php echo $value3['country_seq_no']; ?>" <?php if($value3['country_seq_no'] == $row_31['country']){echo 'selected="selected"';} ?> ><?php echo $value3['name']; ?></option>
                                                    <?php } ?>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">State</label>
                                               <select name="state2" id="state_<?php echo $y; ?>" class="form-control" disabled="disabled">
                                                   <option value="">State</option>
                                                   <?php 
                                                       $sql4 = "SELECT * FROM `plma_states` ORDER BY `plma_states`.`state_name` ASC";
                                                       $res4 = $this->db->query($sql4); 
                                                       foreach ($res4->result() as $key4 => $value4) { $value4 = (array) $value4; ?>
                                                       <option value="<?php echo $value4['state_seq_no']; ?>" <?php if($value4['state_seq_no'] == $row_31['state']){echo 'selected="selected"';} ?> ><?php echo $value4['state_name']; ?></option>
                                                   <?php } ?>
                                               </select>
                                           </div>
<!--                                           <div class="form-group">
                                               <label class="control-label">County</label>
                                               <select name="county2" id="county_<?php echo $y; ?>" class="form-control" disabled="disabled">
                                                   <option value="">County</option>
                                                   <?php 
                                                       $sql5 = "SELECT * FROM `plma_county`  ORDER BY `plma_county`.`county_name` ASC";
                                                       $res5 = $this->db->query($sql5); 
                                                       foreach ($res5->result() as $key5 => $value5) { $value5 = (array) $value5; ?>
                                                       <option value="<?php echo $value5['county_seq_no']; ?>" <?php if($value5['county_seq_no'] == $row_31['county']){echo 'selected="selected"';} ?> ><?php echo $value5['county_name']; ?></option>
                                                   <?php } ?>
                                               </select>
                                           </div>-->
                                           <div class="form-group">
                                               <label class="control-label">City/Town</label>
                                               <select name="city2" id="city_<?php echo $y; ?>" class="form-control" disabled="disabled">
                                                   <option value="">City/Town</option>
                                                   <?php 
                                                       $sql6 = "SELECT * FROM `plma_city` ORDER BY `plma_city`.`city_name` ASC";
                                                       $res6 = $this->db->query($sql6); 
                                                       foreach ($res6->result() as $key6 => $value6) { $value6 = (array) $value6; ?>
                                                       <option value="<?php echo $value6['city_seq_no']; ?>" <?php if($value6['city_seq_no'] == $row_31['county']){echo 'selected="selected"';} ?> ><?php echo $value6['city_name']; ?></option>
                                                   <?php } ?>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label">Postal Code</label>
                                               <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code2" id="postal_code3"  value="<?php echo $value['postal_code']; ?>" disabled="disabled" /> </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                               <!-- <button type="submit" class="btn green add-location-submit-btn firm_location_edit" name="general_save_change">Save</button> -->
                           </div>
                       </form>
                   </div>
               </div>
       </div>

       <script type="text/javascript">

            $('#country_<?php echo $y; ?>').change(function(){
                var b = BASE_URL;
                   $.ajax({
                       url :  b + 'address/fetch-state/',
                       type : 'post',
                       dataType : 'json',
                       data : { country_id : this.value },
                       success : function(data){
                          $('#state_<?php echo $y; ?>').html(data);
                          $('#county_<?php echo $y; ?>').html('<option value="">County</option>');
                          $('#city_<?php echo $y; ?>').html('<option value="">City/Town</option>');
                       }
                   });
            });

            $('#state_<?php echo $y; ?>').change(function(){
                var b = BASE_URL;
                   $.ajax({
                       url :  b + 'address/fetch-county/',
                       type : 'post',
                       dataType : 'json',
                       data : { country_id : $('#country_<?php echo $y; ?>').val(), state_id : this.value},
                       success : function(data){
                          $('#county_<?php echo $y; ?>').html(data);
                          $('#city_<?php echo $y; ?>').html('<option value="">City/Town</option>');
                       }
                   });
            });

            $('#county_<?php echo $y; ?>').change(function(){
                var b = BASE_URL;
                   $.ajax({
                       url :  b + 'address/fetch-city/',
                       type : 'post',
                       dataType : 'json',
                       data : { country_id : $('#country_<?php echo $y; ?>').val(), state_id : $('#state_<?php echo $y; ?>').val(), county_seq_no : this.value},
                       success : function(data){
                          $('#city_<?php echo $y; ?>').html(data);
                       }
                   });
            });
       </script>
    <?php } ?> 



    <script type="text/javascript">
       $(document).ready(function() {
           
            $(window).load(function() {

//                    $("#loader_image").hide();

                $('#loader_image').delay(2000).fadeOut(1000)

            });

           $('#sample_21').DataTable();

//           $('#country1').change(function(){
//               var b = BASE_URL;
//                  $.ajax({
//                      url :  b + 'address/fetch-state/',
//                      type : 'post',
//                      dataType : 'json',
//                      data : { country_id : this.value },
//                      success : function(data){
//                         $('#state1').html(data);
//                         $('#county1').html('<option value="">County</option>');
//                         $('#city1').html('<option value="">City/Town</option>');
//                      }
//                  });
//           });
//
//           $('#state1').change(function(){
//               var b = BASE_URL;
//                  $.ajax({
//                      url :  b + 'address/fetch-county/',
//                      type : 'post',
//                      dataType : 'json',
//                      data : { country_id : $('#country1').val(), state_id : this.value},
//                      success : function(data){
//                         $('#county1').html(data);
//                         $('#city1').html('<option value="">City/Town</option>');
//                      }
//                  });
//           });
//
//           $('#county1').change(function(){
//               var b = BASE_URL;
//                  $.ajax({
//                      url :  b + 'address/fetch-city/',
//                      type : 'post',
//                      dataType : 'json',
//                      data : { country_id : $('#country1').val(), state_id : $('#state1').val(), county_seq_no : this.value},
//                      success : function(data){
//                         $('#city1').html(data);
//                      }
//                  });
//           });

              $.get(BASE_URL + 'address/fetch-country/', function(data, status){
                  $('.country1').html(data);
                  //console.log(data);
              });
       } );



        
       
   </script>

    <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>"; </script>
    <!-- address db -->
    <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
    <script>
        
      function open_firmaddr_modal(id)
      {
        $('#modal_for_location').modal('show');
        $('#firm_address_seq_no_on_modal').val(id);
      }
    </script>
    <!-- address db -->
<script type="text/javascript">
var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        $("#phone").inputmask("mask", {
            "mask": "(0)9999 999999"
        });
         $("#mobile").inputmask("mask", {
            "mask": "(0)9999 999999"
        });
          /*$("#fax").inputmask("mask", {
            "mask": "(999) 999-9999"
        });*/
        $("#fax1").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#phone1").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile1").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        
         $("#phone2").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile2").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#fax2").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        
        $("#phone3").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile3").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#fax3").inputmask("mask", {
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
    $('#web_url1').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#social_url1').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
        $('#web_url2').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#social_url2').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
</script>
    </body>

</html> 