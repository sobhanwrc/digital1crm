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
                        <a href="#">Metting/Appointment</a>
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
                                <span class="caption-subject bold uppercase">View Meeting/Appointment</span>
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
                                   
                                   <form role="form" autocomplete="off" id="myfirm-general-info-edit-form" method="post" action="<?php echo $base_url . 'competitor/details/' . base64_encode($value['competitor_seq_no']); ?>">
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
                              $value          </div>
                                        <?php } ?>
                                          
                                        <div class="col-md-12"><h3> General Informations</h3></div>
                                         <div class="form-group">
                                                  <label class="control-label"> First Name </label>
                                                  <input type="text" placeholder="Enter First Name" disabled="" class="form-control" name="f_name" id="f_name" value="<?php if(isset($views[0]['f_name']) && $views[0]['f_name'] != ''){echo $views[0]['f_name']; } ?>" /> </div>

                                             <div class="form-group">
                                                  <label class="control-label"> Last Name </label>
                                                  <input type="text" placeholder="Enter First Name" disabled="" class="form-control" name="l_name" id="l_name" value="<?php if(isset($views[0]['l_name']) && 
                                                  $views[0]['l_name'] != ''){echo $views[0]['l_name']; } ?>" /> 
                                            </div>  

                                            <div class="form-group">
                                            <label class="control-label">Contact Code</label>
                                               <input type="text" placeholder="Enter First Name" class="form-control" disabled="" name="contact_code" id="contact_code" 
                                               value="<?php if(isset($views[0]['contact_code']) && $views[0]['contact_code'] != ''){echo $views[0]['contact_code']; } ?>" /> 

                                            </div>    
                                             <div class="form-group">
                                                  <label class="control-label">Date Of Birth</label>
                                                  <input type="text" placeholder="Enter DOB" class="form-control" disabled="" name="dob" id="dob" value="<?php if(isset($views[0]['dob']) && $views[0]['dob'] != ''){echo $views[0]['dob']; } ?>" /> 
                                             </div> 
                                             <div class="form-group">
                                                      <label class="control-label">Contact Gender </label></br>
                                                        Male&nbsp;<input type="radio" name="gender" id="gender" value="M" <?php if($views[0]['gender']=='M'){echo 'checked';} ?>>&nbsp;Female&nbsp;<input type="radio" name="gender" id="gender" value="F"  <?php if($views[0]['gender']=='F'){echo 'checked';} ?>> 
                                              </div>

                                              <div class="form-group">
                                                     <label class="control-label">Main Contact Status</label>
                                                     <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Enter Experience" name="main_contact_status" id="main_contact_status" value="<?php if(isset($views[0]['main_contact_status']) && $views[0]['main_contact_status'] != ''){echo $views[0]['main_contact_status']; } ?>"/> 
                                              </div>

                                              <div class="form-group">
                                                      <label class="control-label">Industry Type </label>
                                                        <input type="text" placeholder="Enter Industry Type" disabled="" class="form-control" name="industry_type" id="industry_type" value="<?php if(isset($views[0]['industry_type']) && $views[0]['industry_type'] != ''){echo $views[0]['industry_type']; } ?>" /> 
                                               </div>
                                               <div class="form-group">
                                                     <label class="control-label">Company Name</label>
                                                     <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Company Name" name="company_name" id="company_name" value="<?php if(isset($views[0]['company_name']) && $views[0]['company_name'] != ''){echo $views[0]['company_name']; } ?>"/>
                                                 </div>

                                                 <div class="form-group">
                                                     <label class="control-label">Company Size</label>
                                                     <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Company Size" name="company_size" id="company_size" value="<?php if(isset($views[0]['company_size']) && $views[0]['company_size'] != ''){echo $views[0]['company_size']; } ?>"/> 
                                                  </div>
                                                 <div class="form-group">
                                                    <label class="control-label">Contact Business Title</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Contact Business Title" name="contact_business_title" id="contact_business_title" value="<?php if(isset($views[0]['contact_business_title']) && $views[0]['contact_business_title'] != ''){echo $views[0]['contact_business_title']; } ?>"/> 
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label class="control-label">Professional</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="professional" name="professional" id="professional" value="<?php if(isset($views[0]['professional']) && $views[0]['professional'] != ''){echo $views[0]['professional']; } ?>"/> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Contact Department</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Contact Department" name="contact_department" id="contact_department" value="<?php if(isset($views[0]['contact_department']) && $views[0]['contact_department'] != ''){echo $views[0]['contact_department']; } ?>"/> 
                                                </div>        
                                                  
                                              <div class="form-group">
                                                    <label class="control-label">Twitter URL</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Twitter Url" name="twitter_url" id="twitter_url" value="<?php if(isset($views[0]['twitter_url']) && $views[0]['twitter_url'] != ''){echo $views[0]['twitter_url']; } ?>"/> 
                                                </div>
                                                     
                                               <div class="form-group">
                                                    <label class="control-label">LinkedIn URL</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="linkedin Url" name="linkedin_url" id="linkedin_url" value="<?php if(isset($views[0]['linkedin_url']) && $views[0]['linkedin_url'] != ''){echo $views[0]['linkedin_url']; } ?>"/> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Google Plus URL</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="google plus Url" name="google_plus" id="google_plus" value="<?php if(isset($views[0]['google_plus']) && $views[0]['google_plus'] != ''){echo $views[0]['google_plus']; } ?>"/> 
                                                </div>  
                                                     
                                                  <div class="form-group">
                                                    <label class="control-label">Youtube URL</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="youtube Url" name="youtube_url" id="youtube_url" value="<?php if(isset($views[0]['youtube_url']) && $views[0]['youtube_url'] != ''){echo $views[0]['youtube_url']; } ?>"/> 
                                                </div>      
                                                       
                                                <div class="form-group">
                                                    <label class="control-label">IM</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Super Lawyers" name="im_url" id="im_url" value="<?php if(isset($views[0]['im_url']) && $views[0]['im_url'] != ''){echo $views[0]['linkedin_url']; } ?>"/> 
                                                </div>
                                          
                                                <div class="form-group">
                                                    <label class="control-label">LinkedIn URL</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Super Lawyers" name="linkedin_url" id="linkedin_url" value="<?php if(isset($views[0]['linkedin_url']) && $views[0]['linkedin_url'] != ''){echo $views[0]['linkedin_url']; } ?>"/> 
                                                </div>
                                               
                                       </div>
                                       <div class="col-md-6">
                                        <h3 class="hint"> Enter Address </h3>
                                        <input type="hidden" name="firmid_2" id="firmid_2" value="<?php if(isset($det['id']) && $det['id'] != ''){echo $det['id']; } ?>">                                                     
                                                     <div id="validate_div_12" >
                                                     <div class="form-group">
                                                         <label class="control-label">Email</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Email" name="email" value="<?php if(isset($views[0]['email']) && $views[0]['email'] != ''){echo $views[0]['email']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Phone</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Phone" name="phone" id="phone" value="<?php if(isset($views[0]['phone']) && $views[0]['phone'] != ''){echo $views[0]['phone']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Fax</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Facsimile" name="fax" id="fax" value="<?php if(isset($views[0]['fax']) && $views[0]['fax'] != ''){echo $views[0]['fax']; } ?>" /> 
                                                     </div>
                                                    <div class="form-group">
                                                         <label class="control-label">Mobile</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Mobile" name="mobile" id="mobile" value="<?php if(isset($views[0]['mobile_no']) && $views[0]['mobile_no'] != ''){echo $views[0]['mobile_no']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Website URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Website URL" name="web_url" value="<?php if(isset($views[0]['website_url']) && $views[0]['website_url'] != ''){echo $views[0]['website_url']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Social URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Social URL" name="social_url" value="<?php if(isset($views[0]['social_url']) && $views[0]['social_url'] != ''){echo $views[0]['social_url']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Address Line 1</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 1" name="addr_line_1" value="<?php if(isset($views[0]['address_line1']) && $views[0]['address_line1'] != ''){echo $views[0]['address_line1']; } ?>" /> </div>
                                                     
                                                     <div class="form-group">
                                                         <label class="control-label">Address Line 2</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 2" name="addr_line_2" value="<?php if(isset($views[0]['address_line2']) && $views[0]['address_line2'] != ''){echo $views[0]['address_line2']; } ?>" /> </div>
                                                      <div class="form-group">
                                                          <label class="control-label">Address Line 3</label>
                                                          <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($views[0]['address_line3']) && $views[0]['address_line3'] != ''){echo $views[0]['address_line3']; } ?>" /> </div>

                                                     <div class="form-group">
                                                          <label class="control-label">Country</label>
                                                          <select name="country" id="country" class="form-control">
                                                             <option value="">Country</option>
                                                              <?php
                                                                foreach($country as $val)
                                                                {
                                                                    $selected=($views[0]['country']==$val['country_seq_no'])?'selected=selected':'';
                                                                   echo "<option ".$selected."  value=$val[country_seq_no]>$val[name]</option>";
                                                                }

                                                              ?>
                                                             
                                                         </select>
                                                          </div>
                                                    <div class="form-group">
                                                          <label class="control-label">State</label>
                                                              <select name="state" id="state" class="form-control">
                                                             <option value="">State</option>
                                                             <?php
                                                                foreach($state as $row)
                                                                {
                                                                    $selected=($views[0]['state']==$row['state_seq_no'])?'selected=selected':'';
                                                                   echo "<option ".$selected."  value=$row[state_seq_no]>$row[state_name]</option>";
                                                                }

                                                              ?>
                                                         </select>
                                                           </div>
<!--                                                <div class="form-group">
                                                          <label class="control-label">County</label>
                                                          <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="County" name="addr_line_3" value="<?php if(isset($address['county']) && $address['county'] != ''){echo $address['county']; } ?>" /> </div>-->
                                                    <div class="form-group">
                                                          <label class="control-label">City/Town</label>
                                                           <select name="city" id="city" class="form-control">
                                                             <option value="">City/Town</option>
                                                            <?php
                                                                foreach($city as $row)
                                                                {
                                                                    $selected=($views[0]['city']==$row['city_seq_no'])?'selected=selected':'';
                                                                   echo "<option ".$selected."  value=$row[city_seq_no]>$row[city_name]</option>";
                                                                }

                                                              ?>
                                                         </select>
                                                           </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Postal Code</label>
                                                         <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Postal Code" name="postal_code" id="postal_code" value="<?php if(isset($views[0]['postal_code']) && $views[0]['postal_code'] != ''){echo $views[0]['postal_code']; } ?>" /> </div>
                                                     </div>

                                                      <h3 class="hint"> Remarks </h3>

                                                    <div class="form-group">
                                                                    <label class="control-label">Remarks</label>
                                                                    <textarea class="form-control" disabled="" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($views[0]['remarks']) && $views[0]['remarks'] != ''){echo $views[0]['remarks']; } ?></textarea>
                                                                </div>

                                               <div class="margiv-top-10">
                                                   <!-- <button type="submit" id="general-edit-submit-btn" class="btn green" name="general_save_change">Save Changes</button> -->
                                                   <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                               </div>
                                      </div>
                                       </form>
                                   </div>
                                   
                        </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-2" style=" padding-left: 0">
                                                <div class="btn-group">
                                                    <a href="#responsive_<?php echo $det['competitor_seq_no']; ?>" class="btn btn-outline sbold" data-toggle="modal" >
                                                        <button class="btn sbold green"> Add Rank
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <span class="help-block">  </span>
                                            </div>
                        </div>
                        <?php //foreach ($det as $key => $value) { //t($value);?>
                <div id="responsive_<?php echo $det['competitor_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add Competitor Rank</h4>
                            </div>
                            <form action="<?php echo $base_url . 'competitor/add_rank/' . base64_encode($det['competitor_seq_no']); ?>" autocomplete="off" name="add_competitor_rank" id="add_competitor_rank_<?php echo $value['competitor_seq_no']; ?>" method="post" class="add_competitor_rank_class">
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                <label class="col-md-4 control-label">Competitor Name:</label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php echo $det['competitor_first_name'] . ' ' .  $det['competitor_last_name'];  ?>"><?php// echo $value['competitor_first_name'] . ' ' .  $value['competitor_last_name'];  ?>
                                                        <span class="help-block">  </span>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Competitor Ranking</label>
                                                    <div class="col-md-8">
                                                        <select name="competitor_ranking" id="competitor_ranking" required="" class="form-control">
                                                                    <option value="">Select Ranking</option>
                                                                    <?php foreach ($competitor_rank as $key1 => $value1) { ?>
                                                                        <option value="<?php echo $value1['code']; ?>"><?php echo $value1['short_description']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Remarks or comments" name="remarks_notes" id="remarks_notes"></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="submit" class="btn green section_group_edit_button" name="general_save_change_attr" id="general_save_change_attr">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               <?php //} ?>
                        <div class="portlet-body">
                            
                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                <thead>
                                    <tr class="">
                                        <th> SL NO </th>
                                        <th> Ranked By - Role</th>
                                        <th> Competitor Name </th>
                                        <th> Competitor Ranking </th>
                                        <th> Date of Ranking </th>
                                        <th> Remarks </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php //t($all_competitor_rank, 1); ?>
                                    <?php $SlNo = 1;
                                    foreach($all_competitor_rank as $key => $value)
                                    {
//                                    t($value); exit;
                                    ?>
                                    <tr>
                                        <td><?php echo $SlNo++ ?></td>
                                        <td><?php echo $value['user_last_name'] . ',' . '&nbsp' . $value['user_first_name'] . ' ' . '-' . ' ' . $value['role_code'] ;?></td>
                                        <td><?php echo $value['competitor_last_name'] . ',' . '&nbsp' . $value['competitor_first_name'] ;?></td>
                                        <td><?php echo $value['competitor_ranking']; ?></td>
                                        <td><?php echo date("d-M-y", $value['created_date']);?></td>
                                        <td> <?php echo $value['remarks_notes']; ?>  </td>
                                    <?php } ?>
                                    </tr>
 
                                </tbody>
                            </table>
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
    <!-- END QUICK SIDEBAR -->
    
</div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/competitor_add_edit.js" type="text/javascript"></script>
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
    </body>

</html> 

