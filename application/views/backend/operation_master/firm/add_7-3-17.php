<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->
<style>
h3 {
font-size: 18px;
}
.checker{
width: 24px;
display: inline-block;
}
</style>
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
                                <a href="#">Firm</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add</span>
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
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Add Firm</span>
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
                                        <div class = "add_form_sec">
                                            <form role="form" autocomplete="off" id="myfirm-general-info-form" method="post" action="<?php echo $base_url . 'firm/add/' ?>">
                                                <div class="col-md-6">
                                                    <?php
                                                    $aaa = $this->session->flashdata('suc_message');
                                                    if (isset($aaa) && $aaa != '') {
                                                        ?>
                                                        <div class="alert alert-success" id="general_msg_success" >
                                                            <strong>Success!</strong> <?php echo $aaa; ?>
                                                        </div>
                                                    <?php } ?>
                                                    <?php
                                                    $aaa = $this->session->flashdata('err_message');
                                                    if (isset($aaa) && $aaa != '') {
                                                        ?>
                                                        <div class="alert alert-danger" id="general_msg_success" >
                                                            <strong>Error!</strong> <?php echo $aaa; ?>
                                                        </div>
<?php } ?>
                                                    <!-- <h3 class="hint"> Firm Admin Informations </h3>
                                                    <div class="form-group">
                                                        <label class="control-label">Firm Admin</label>
                                                        <select name="firm_admin_seq_no" id="firm_admin_seq_no" class="form-control">
                                                            <option value="">Firm Admin</option>
                                                    <?php
                                                    foreach ($firm_admin as $key => $value) {
                                                        $value = (array) $value;
                                                        ?>
                                                        <option value="<?php echo $value['user_seq_no']; ?>"><?php echo $value['user_first_name'] . ' ' . $value['user_last_name']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div> -->  

                                                    <div class="col-md-12" style="padding-left: 0;">
                                                        <h3 class="hint"> Firm Admin Credential </h3>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" placeholder="Enter First Name" class="form-control" name="fname" id="fname" autocomplete="off" />
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" placeholder="Enter Last Name" class="form-control" name="lname" id="lname" autocomplete="off" />
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">User ID</label>
                                                        <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email" autocomplete="off" />
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Password</label>
                                                        <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password"  autocomplete="off" />
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Gender</label>
                                                        <select name="attorney_gender" id="attorney_gender" class="form-control">
                                                            <option value="">Select Gender</option>
                                                                <?php foreach ($codes['Gender'] as $key1 => $value1) { ?>
                                                                    <option value="<?php echo $value1['code']; ?>"><?php echo $value1['short_description']; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Group</label>
                                                        <select name="group_code" id="group_code" class="form-control">
                                                            <option value="">Select Group</option>
                                                            <?php foreach ($all_groups as $key => $value) { ?>
                                                                <option value="<?php echo $value['group_code']; ?>"><?php echo $value['group']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group required">
                                                        <label class="control-label">Designation</label>
                                                        <select name="designation_code" id="designation_code" class="form-control">
                                                            <option value="">Select Designation</option>
                                                            <?php foreach ($all_designations as $key => $value) { ?>
                                                                <option value="<?php echo $value['designation_code']; ?>"><?php echo $value['designation']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12" style="padding-left: 0;">Is Attorney</label>
                                                        
                                                        <input type="checkbox" name="is_attorney" id="is_attorney" value="1">Yes

                                                    </div>


                                                    <!-- <div class="form-group">
                                                        <label class="control-label">Re-type Password</label>
                                                        <input type="text" placeholder="Re-type Password" class="form-control" name="repass" id="repass"  /> 
                                                    </div> -->
                                                    
                                                    <div class="col-md-12" style="padding-left: 0; padding-right: 0; margin-bottom: 20px;">
                                                    
                                                    <div style=" width: 100%; display: inline-block">
                                                    	<h3 class="hint"> Approval Process Information </h3>

                                                    <div class="form-group">
                                                        <label class="control-label">How many level/s for the approval process ?</label>
                                                        <br>
                                                        <div class="radio-list">
                                                            <label class="radio-inline"> 
                                                                <input type="radio" name="approval_process_1" id="approval_process_1" value="1" checked="checked">  1
                                                            </label> 
                                                            <label class="radio-inline">
                                                                <input type="radio" name="approval_process_2" id="approval_process_2"   value="2">  2  
                                                            </label> 
                                                            <label class="radio-inline">
                                                                <input type="radio" name="approval_process_3" id="approval_process_3"   value="3">  3
                                                            </label> 
                                                            <label class="radio-inline">
                                                                 <input type="radio" name="approval_process_4" id="approval_process_4"   value="4">  4
                                                            </label> 
                                                        </div>
                                                    </div>
                                                    	
                                                    </div>
                                                    
                                                    <div style=" width: 100%; display: inline-block">
														<div class="form-group">
															<label class="control-label">Heading</label>
															<select name="designation_code" id="designation_code" class="form-control">
																<option value="">Select Designation</option>
																<option value="">1</option>
																<option value="">2</option>
																<option value="">3</option>
																<option value="">4</option>

															</select>
														</div>
                                                   	
                                                   		<div class="form-group">
															<label class="control-label">Heading</label>
															<select name="designation_code" id="designation_code" class="form-control">
																<option value="">Select Designation</option>
																<option value="">1</option>
																<option value="">2</option>
																<option value="">3</option>
																<option value="">4</option>

															</select>
														</div>
                                                   	
                                                   		<div class="form-group">
															<label class="control-label">Heading</label>
															<select name="designation_code" id="designation_code" class="form-control">
																<option value="">Select Designation</option>
																<option value="">1</option>
																<option value="">2</option>
																<option value="">3</option>
																<option value="">4</option>

															</select>
														</div>
                                                   	
                                                   		<div class="form-group">
															<label class="control-label">Heading</label>
															<select name="designation_code" id="designation_code" class="form-control">
																<option value="">Select Designation</option>
																<option value="">1</option>
																<option value="">2</option>
																<option value="">3</option>
																<option value="">4</option>

															</select>
														</div>
                                                    	
                                                    </div>
                                                    	
                                                    	
                                                    	
                                                    </div>
                                                    
                                                    
                                                    

                                                    <h3 class="hint"> General Informations </h3>

                                                    <div class="form-group required">
                                                        <label class="control-label">Firm Name</label>
                                                        <input type="text" placeholder="Enter Firm Name" class="form-control" name="firm_name" id="firm_name" /> 
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Firm ID</label>
                                                        <input type="text" placeholder="Enter Firm ID" class="form-control" name="firm_id" id="firm_id"  />
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Firm Code</label>
                                                        <input type="text" placeholder="Enter Code" class="form-control" name="firm_code" id="firm_code"  /> 
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Firm Registration</label>
                                                        <input type="text" placeholder="Enter Registration" class="form-control" name="firm_reg" id="firm_reg"   /> 
                                                    </div>

                                                    <div class="form-group required">
                                                        <label class="control-label">Sections</label>
                                                        <select name="sections[]" id="sections"  multiple="multiple" class="form-control">
                                                            <!-- <option value="">Select Section</option> -->
                                                            <?php foreach ($all_sections as $key => $value) { ?>
                                                                <option value="<?php echo $value['section_seq_no']; ?>"><?php echo $value['section_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Practice Area</label>
                                                        <select name="practice_area[]" id="practice_area"  multiple="multiple" class="form-control">
                                                            <!-- <option value="">Select Section</option> -->
                                                            <?php foreach ($all_practice_area as $key => $value) { ?>
                                                                <option value="<?php echo $value['practice_area_seq_no']; ?>"><?php echo $value['practice_area_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Firm Jurisdiction</label>
                                                        <select name="firm_jurisdiction" id="firm_jurisdiction" class="form-control">
                                                            <option value="">Select Jurisdiction</option>
                                                            <?php foreach ($codes['Jurisdictions'] as $key => $value) { ?>
                                                                <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>



                                                    <h3 class="hint"> Single Point Information </h3>
                                                    <div class="form-group required">
                                                        <label class="control-label">SP Contact Name</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Name" name="sp_name" id="sp_name"  /> </div>

                                                    <div class="form-group required">
                                                        <label class="control-label">SP Contact Role</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Role" name="sp_role" id="sp_role" /> </div>




                                                </div>
                                                <div class="col-md-6">
                                                    <h3 class="hint"> Enter Address </h3>

                                                    <div id="validate_div_12" >
                                                         <div class="form-group required">
                                                            <label class="control-label">Email</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email_1" id="email_1"  /> 
                                                        </div> 
                                                        <div class="form-group required">
                                                            <label class="control-label">Phone</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone" id="phone"  /> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Fax</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax" id="fax"  /> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile" id="mobile"  /> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Website URL</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url" id="web_url" /> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Social URL</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url" id="social_url"  /> 
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="control-label">Address Line 1</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_1" id="addr_line_1"  /> </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Address Line 2</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_2" id="addr_line_2"  /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Address Line 3</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_3" id="addr_line_3"  /> </div>
                                                        <div class="form-group required">
                                                            <label class="control-label">Country</label>
                                                            <select name="country" id="country" class="form-control country">
                                                                <option value="">Country</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="control-label">State</label>
                                                            <select name="state" id="state" class="form-control">
                                                                <option value="">State</option>
                                                            </select>
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label class="control-label">County</label>
                                                            <select name="county" id="county" class="form-control">
                                                                <option value="">County</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="form-group required">
                                                            <label class="control-label">City/Town</label>
                                                            <select name="city" id="city" class="form-control">
                                                                <option value="">City/Town</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="control-label">Postal Code</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code" id="postal_code" /> </div>
                                                    </div>

                                                    <h3 class="hint"> Remarks </h3>

                                                    <div class="form-group">
                                                        <label class="control-label">Remarks</label>
                                                        <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks" id="remarks"></textarea>
                                                    </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit" id="general-submit-btn" class="btn green">Save Changes</button>
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
            
            <!-- END QUICK SIDEBAR -->
            
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>

        <link rel="stylesheet" href="<?php echo $assets_path; ?>custom/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo $assets_path; ?>custom/js/bootstrap-multiselect.js"></script>

        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script>
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

            .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
    margin-left: -9px;
    position: absolute;
}
.form-group.required .control-label:after {
                content:"*";
                color:red;
              }
              
             .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
                margin-left: -20px!important;
                 position:absolute;
              }

        </style>
        <script type="text/javascript">
//            $(document).ready(function () {
                $('#sections').multiselect({
                    includeSelectAllOption: true,
                    enableFiltering: true,
                    numberDisplayed: 3,
                    enableCaseInsensitiveFiltering: true,
                    maxHeight: 300,
                    maxWidth: 100
                });
                $('#practice_area').multiselect({
                    includeSelectAllOption: true,
                    enableFiltering: true,
                    numberDisplayed: 3,
                    enableCaseInsensitiveFiltering: true,
                    maxHeight: 300,
                    maxWidth: 100
                });
//            });

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
//                        handleIPAddressInput();
                    }
                };

            }();

            if (App.isAngularJsApp() === false) {
                jQuery(document).ready(function () {
                    FormInputMask.init(); // init metronic core componets
                });
            }
        </script>
    </body>

</html> 