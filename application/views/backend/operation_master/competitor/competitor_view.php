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
                                <span class="caption-subject bold uppercase">View Competitor</span>
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
                                                  <label class="control-label"> Competitor ID </label>
                                                  <input type="text" placeholder="Enter Competitor ID" disabled="" class="form-control" name="competitor_id" id="competitor_id" value="<?php if(isset($det['competitor_id']) && $det['competitor_id'] != ''){echo $det['competitor_id']; } ?>" /> </div>
                                              <div class="form-group">
                                                  <label class="control-label"> Competitor Code </label>
                                                  <input type="text" placeholder="Enter Competitor Code" disabled="" class="form-control" name="competitor_code" id="competitor_code" value="<?php if(isset($det['competitor_code']) && $det['competitor_code'] != ''){echo $det['competitor_code']; } ?>" /> </div>
                                              <div class="form-group">
                                                  <label class="control-label">First Name</label>
                                                  <input type="text" placeholder="Enter First Name" class="form-control" disabled="" name="first_name" id="first_name" value="<?php if(isset($det['competitor_first_name']) && $det['competitor_first_name'] != ''){echo $det['competitor_first_name']; } ?>" /> </div>
                                              <div class="form-group">
                                                  <label class="control-label">Last Name</label>
                                                  <input type="text" placeholder="Enter Last Name" class="form-control" disabled="" name="last_name" id="last_name" value="<?php if(isset($det['competitor_last_name']) && $det['competitor_last_name'] != ''){echo $det['competitor_last_name']; } ?>" /> </div>
                                              <div class="form-group">
                                                      <label class="control-label">Date Of Birth </label>
                                                        <input type="text" placeholder="Enter Competitor ID" disabled="" class="form-control" name="competitor_id" id="competitor_id" value="<?php if(isset($det['competitor_dob']) && $det['competitor_dob'] != ''){echo $det['competitor_dob']; } ?>" /> </div>
                                                  
                                              <div class="form-group">
                                                      <label class="control-label">Industry Type </label>
                                                        <input type="text" placeholder="Enter Competitor ID" disabled="" class="form-control" name="industry_type" id="industry_type" value="<?php if(isset($det['industry_type']) && $det['industry_type'] != ''){echo $det['industry_type']; } ?>" /> </div>
                                                     <div class="form-group">
                                                     <label class="control-label">Experience</label>
                                                     <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Enter Experience" name="experience" id="experience" value="<?php if(isset($det['experience']) && $det['experience'] != ''){echo $det['experience']; } ?>"/> </div>

                                                     <div class="form-group">
                                                      <label class="control-label">Date Of Birth </label>
                                                        <input type="text" placeholder="Enter Competitor ID" disabled="" class="form-control" name="competitor_id" id="competitor_id" value="<?php if(isset($det['bar_date']) && $det['bar_date'] != ''){echo $det['bar_date']; } ?>" /> </div>
                                                     <div class="form-group">
                                                     <label class="control-label">Bar Belongs to State</label>
                                                     <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Bar state" name="bar_state" id="bar_state" value="<?php if(isset($det['state']) && $det['state'] != ''){echo $det['state']; } ?>"/> </div>
                                                        
                                                       
                                            <h3>Ranking</h3>
                                          
                                                <div class="form-group">
                                                    <label class="control-label">Independent</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Independent" name="independent" id="independent" value="<?php if(isset($det['independent_ranking']) && $det['independent_ranking'] != ''){echo $det['independent_ranking']; } ?>"/> 
                                                </div>
                                              
                                              
                                                <div class="form-group">
                                                    <label class="control-label">Chambers</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Chambers" name="chambers" id="chambers" value="<?php if(isset($det['chambers_ranking']) && $det['chambers_ranking'] != ''){echo $det['chambers_ranking']; } ?>"/> 
                                                </div>
                                              
                                              
                                                <div class="form-group">
                                                    <label class="control-label">Best</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Best" name="best" id="best" value="<?php if(isset($det['best']) && $det['best'] != ''){echo $det['best']; } ?>"/> 
                                                </div>
                                              
                                              
                                                <div class="form-group">
                                                    <label class="control-label">Martindale</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Martindale" name="martindale" id="martindale" value="<?php if(isset($det['martindale']) && $det['martindale'] != ''){echo $det['martindale']; } ?>"/> 
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label class="control-label">Super Lawyers</label>
                                                    <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Super Lawyers" name="super_lawyers" id="super_lawyers" value="<?php if(isset($det['super_lawyers']) && $det['super_lawyers'] != ''){echo $det['super_lawyers']; } ?>"/> 
                                                </div>
                                              
                                       </div>
                                       <div class="col-md-6">
                                        <h3 class="hint"> Enter Address </h3>
                                        <input type="hidden" name="firmid_2" id="firmid_2" value="<?php if(isset($det['id']) && $det['id'] != ''){echo $det['id']; } ?>">                                                     
                                                     <div id="validate_div_12" >
                                                     <div class="form-group">
                                                         <label class="control-label">Email</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Email" name="email" value="<?php if(isset($address['email']) && $address['email'] != ''){echo $address['email']; } ?>" /> 
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
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Mobile" name="mobile" id="mobile" value="<?php if(isset($address['mobile_cell']) && $address['mobile_cell'] != ''){echo $address['mobile_cell']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Website URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Website URL" name="web_url" value="<?php if(isset($address['website_url']) && $address['website_url'] != ''){echo $address['website_url']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Social URL</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Social URL" name="social_url" value="<?php if(isset($address['social_media_url']) && $address['social_media_url'] != ''){echo $address['social_media_url']; } ?>" /> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Address Line 1</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 1" name="addr_line_1" value="<?php if(isset($address['address_line1']) && $address['address_line1'] != ''){echo $address_info['address_line1']; } ?>" /> </div>
                                                     
                                                     <div class="form-group">
                                                         <label class="control-label">Address Line 2</label>
                                                         <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 2" name="addr_line_2" value="<?php if(isset($address['address_line2']) && $address['address_line2'] != ''){echo $address['address_line2']; } ?>" /> </div>
                                                      <div class="form-group">
                                                          <label class="control-label">Address Line 3</label>
                                                          <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address['address_line3']) && $address['address_line3'] != ''){echo $address['address_line3']; } ?>" /> </div>

                                                     <div class="form-group">
                                                          <label class="control-label">Country</label>
                                                          <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address['country']) && $address['country'] != ''){echo $address['country']; } ?>" /> </div>
                                                    <div class="form-group">
                                                          <label class="control-label">State</label>
                                                          <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address['state']) && $address['state'] != ''){echo $address['state']; } ?>" /> </div>
<!--                                                <div class="form-group">
                                                          <label class="control-label">County</label>
                                                          <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="County" name="addr_line_3" value="<?php if(isset($address['county']) && $address['county'] != ''){echo $address['county']; } ?>" /> </div>-->
                                                    <div class="form-group">
                                                          <label class="control-label">City/Town</label>
                                                          <input class="form-control placeholder-no-fix" type="text" disabled="" placeholder="Address Line 3" name="addr_line_3" value="<?php if(isset($address['city']) && $address['city'] != ''){echo $address['city']; } ?>" /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Postal Code</label>
                                                         <input class="form-control placeholder-no-fix" disabled="" type="text" placeholder="Postal Code" name="postal_code" id="postal_code" value="<?php if(isset($address['postal_code']) && $address['postal_code'] != ''){echo $address_info['postal_code']; } ?>" /> </div>
                                                     </div>

                                                      <h3 class="hint"> Remarks </h3>

                                                    <div class="form-group">
                                                                    <label class="control-label">Remarks</label>
                                                                    <textarea class="form-control" disabled="" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($det['remarks_notes']) && $det['remarks_notes'] != ''){echo $det['remarks_notes']; } ?></textarea>
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

