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
                    <div class="page-bar" style=" position:  relative;">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>firm">Company</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Edit</span>
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
                        <?php //t($firm_details);die; ?>
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">
                                            Company Information
                                            <?php if ($firm_admin[0]['add_flage'] == 1) { ?>
                                                <font color="red" style="margin-left: 150px;">Imported Data</font>
                                            <?php } ?>
                                        </span>
                                    </div>
                                    <?php //t($firm_details);die; ?>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab">General Info</a>
                                        </li>
                                        <!--                               <li>
                                                                           <a href="#tab_1_2" data-toggle="tab">Locations</a>
                                                                       </li>-->
                                        <!--                               <li>
                                                                           <a href="#tab_1_3" data-toggle="tab">Attorneys</a>
                                                                       </li>-->
                                    </ul>
                                </div>

                                <div class="portlet-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_1_1">
                                            <!-- <form role="form" autocomplete="off" id="myfirm-general-info-edit-form" enctype="multipart/form-data" method="post" action="<?php echo $base_url . 'firm/details/' . base64_encode($firm_details[0]['firm_seq_no']); ?>"> -->
                                            <form role="form" autocomplete="off" id="myfirm-general-info-edit-form" enctype="multipart/form-data" method="post" action="<?php echo $base_url . 'firm/edit_details/' . base64_encode($firm_details[0]['firm_seq_no']); ?>">
                                                <input type="hidden" name="general_tab" value="yes">
                                                <input type="hidden" name="firm_seq_no" value="<?php echo base64_encode($firm_details[0]['firm_seq_no']); ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?php $aaa = $this->session->flashdata('suc_message');
                                                        if (isset($aaa) && $aaa != '') {
                                                            ?>
                                                            <div class="alert alert-success" id="general_msg_success" >
                                                                <strong>Success!</strong> <?php echo $aaa; ?>
                                                            </div>
                                                        <?php } ?>
                                                        <?php $aaa = $this->session->flashdata('err_message');
                                                        if (isset($aaa) && $aaa != '') {
                                                            ?>
                                                            <div class="alert alert-danger" id="general_msg_success" >
                                                                <strong>Error!</strong> <?php echo $aaa; ?>
                                                            </div>
                                                        <?php } ?>
<?php $aaa = $this->session->flashdata('warning');
if (isset($aaa) && $aaa != '') {
    ?>
                                                            <div class="alert alert-danger" id="general_msg_success" >
                                                                <strong>Error!</strong> <?php echo $aaa; ?>
                                                            </div>
<?php } ?>



                                                        <h3 class="hint"> General Informations </h3>
                                                        <div class="form-group required">
                                                            <label class="control-label">Firm Name</label>
                                                            <input type="text" placeholder="Enter Firm Name" class="form-control" name="firm_name" id="firm_name" value="<?php echo $firm_details[0]['firm_name']; ?>" /> </div>

                                                        <div class="form-group required">
                                                            <label class="control-label">Firm Code</label>
                                                            <input type="text" placeholder="Enter Code" class="form-control" name="firm_code" id="firm_code" value="<?php echo $firm_details[0]['firm_code']; ?>" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Firm Registration</label>
                                                            <input type="text" placeholder="Enter Registration" class="form-control" name="firm_reg" id="firm_reg" value="<?php echo $firm_details[0]['firm_registration']; ?>" /> </div>

                                                        <h3 class="hint"> Single Point Information </h3>
                                                        <div class="form-group required">
                                                            <label class="control-label">SP Contact Name</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Name" name="sp_name" value="<?php echo $firm_details[0]['sp_contact_name']; ?>" /> </div>

                                                        <div class="form-group required">
                                                            <label class="control-label">SP Contact Role</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Role" name="sp_role" value="<?php echo $firm_details[0]['sp_contact_role']; ?>" /> </div>

                                                        <h3 class="hint"> Firm Credential </h3>
                                                        <div class="form-group">
                                                            <label class="control-label">Username</label>
                                                            <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email" value="<?php echo $firm_details[0]['user_id']; ?>" readonly="readonly" /> </div>

                                                        <div class="form-group required">
                                                            <label class="control-label">Company Image Upload</label>
                                                            <img src="<?php echo base_url() ?>/assets/upload/image/<?php echo $firm_details[0]['firm_image'] ?>"></br></br>
                                                            <input type="file" name="company_logo" id="company_logo" class="form-control placeholder-no-fix"></div>




                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3 class="hint"> Enter Address </h3>

                                                        <div id="validate_div_12" >
                                                            <div class="form-group required">
                                                                <label class="control-label">Email</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" value="<?php echo $firm_details[0]['email']; ?>" /> 
                                                            </div>
                                                            <!--                                                     <div class="form-group required">
                                                                                                                     <label class="control-label">Phone</label>
                                                                                                                     <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone" id="phone" value="<?php echo $firm_details[0]['phone']; ?>" /> 
                                                                                                                 </div>-->

                                                            <div class="form-group required">
                                                                <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>
                                                                <input type="text" placeholder="" class="form-control" id="country_code1" value="<?php echo $country_code1; ?>" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" value="<?php echo $phone_no; ?>" name="phone" id="phone" style="width: 85%; margin-left: -5px; display: inline-block" /> 

                                                                <label id="country_code1-error" class="error" for="country_code1"></label>
                                                                <label id="phone-error" class="customErrorClass" for="phone"></label>
                                                            </div>


                                                            <div class="form-group ">
                                                                <label class="control-label">Fax</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="fax" id="fax" value="<?php echo $firm_details[0]['fax']; ?>" /> 
                                                            </div>

                                                            <!--                                                     <div class="form-group ">
                                                                                                                     <label class="control-label">Mobile</label>
                                                                                                                     <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile" id="mobile" value="<?php echo $firm_details[0]['mobile_cell']; ?>" /> 
                                                                                                                 </div>-->
                                                            <div class="form-group required">
                                                                <label class="control-label" style=" width: 100%; display: inline-block">Mobile</label>
                                                                <input type="text" placeholder="" class="form-control" id="country_code2" value="<?php echo $country_code2; ?>" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" value="<?php echo $user_mobile_no; ?>" name="mobile" id="mobile" style="width: 85%; margin-left: -5px; display: inline-block" /> 

                                                                <label id="country_code2-error" class="error" for="country_code2"></label>
                                                                <label id="mobile-error" class="customErrorClass" for="mobile"></label>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label class="control-label">Website URL</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url" id="web_url" value="<?php echo $firm_details[0]['website_url']; ?>" /> 
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label">Social URL</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url" id="social_url" value="<?php echo $firm_details[0]['social_media_url']; ?>" /> 
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="control-label">Address Line 1</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_1" value="<?php echo $firm_details[0]['address_line1']; ?>" /> </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Address Line 2</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_2" value="<?php echo $firm_details[0]['address_line2']; ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Address Line 3</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_3" value="<?php echo $firm_details[0]['address_line3']; ?>" /> </div>

                                                            <div class="form-group required">
                                                                <label class="control-label">Country</label>
                                                                <!-- <select name="country" id="country" class="form-control">
                                                                    <option value="">Country</option>
                                                                <?php
                                                                foreach ($country_details as $key => $value) {
                                                                    # code...
                                                                    ?>
                                                                           <option value="<?php echo $value['country_seq_no']; ?>" <?= $value['country_seq_no'] == $firm_details[0]['country'] ? 'selected' : '' ?>><?php echo $value['name']; ?></option>
    <?php
}
?>
                                                                </select> -->
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Country" name="country" value="<?php echo $firm_details[0]['country']; ?>" />
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="control-label">State</label>
                                                                <!-- <select name="state" id="state" class="form-control">
                                                                    <option value="">State</option>
                                                                <?php
                                                                foreach ($state_details_details as $key => $value) {
                                                                    # code...
                                                                    ?>
                                                                           <option value="<?php echo $value['state_seq_no']; ?>" <?= $value['state_seq_no'] == $firm_details[0]['state'] ? 'selected' : '' ?>><?php echo $value['state_name']; ?></option>
    <?php
}
?>
                                                                </select> -->
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="State" name="state" value="<?php echo $firm_details[0]['state']; ?>" />
                                                            </div>

                                                            <div class="form-group required">
                                                                <label class="control-label">City/Town</label>
                                                                <!-- <select name="city" id="city" class="form-control">
                                                                    <option value="">City/Town</option>
                                                                <?php
                                                                foreach ($city_details_details as $key => $value) {
                                                                    # code...
                                                                    ?>
                                                                           <option value="<?php echo $value['city_seq_no']; ?>" <?= $value['city_seq_no'] == $firm_details[0]['city'] ? 'selected' : '' ?>><?php echo $value['city_name']; ?></option>
    <?php
}
?>
                                                                </select> -->
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="City" name="city" value="<?php echo $firm_details[0]['city']; ?>" />
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="control-label">Postal Code</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code1" id="postal_code1" value="<?php echo $firm_details[0]['postal_code']; ?>" /> </div>
                                                        </div>

                                                        <h3 class="hint"> Remarks </h3>

                                                        <div class="form-group">
                                                            <label class="control-label">Remarks</label>
                                                            <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php echo $firm_details[0]['remarks_notes']; ?></textarea>
                                                        </div>

                                                        <div class="margiv-top-10">
                                                            <button type="submit" id="general-edit-submit-btn" class="btn green" name="general_save_change" value="123">Edit</button>

                                                        </div>
                                                    </div>
                                                </div>     
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>



        <script type="text/javascript">
            $(document).ready(function() {
                $(window).load(function() {

                    //                    $("#loader_image").hide();

                    $('#loader_image').delay(2000).fadeOut(1000)

                });

                $('#sample_21').DataTable();

            });


        </script>

        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <link rel="stylesheet" href="<?php echo $assets_path; ?>custom/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo $assets_path; ?>custom/js/bootstrap-multiselect.js"></script>
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script>
        <!--<script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>-->
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

            jQuery('#country_code1').keyup(function() {
                this.value = this.value.replace(/[^0-9\+]/g, '');
            });
            jQuery('#country_code2').keyup(function() {
                this.value = this.value.replace(/[^0-9\+]/g, '');
            });
            jQuery('#postal_code1').keyup(function() {
                this.value = this.value.replace(/[^0-9\+]/g, '');
            });
            
            // begining of firm edit
    
     $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        }, "<font color=\"red\">File size must be less than 5 MB</font>");

        //for space prevent
        jQuery.validator.addMethod("noSpace", function (value, element) {
            return value.trim();
        }, "No space please and don't leave it empty");
    $("#myfirm-general-info-edit-form").validate({
            
            rules: {
                fname: {
                    required: true,
                    noSpace: true
                },
                lname: {
                    required: true,
                    noSpace: true
                },
                firm_admin_seq_no: {
                    required: true,
                    noSpace: true
                },
                firm_name: {
                    required: true,
                    noSpace: true
                },
                group_code: {
                    required: true,
                    noSpace: true
                },
                designation_code: {
                    required: true,
                    noSpace: true
                },
                firm_id: {
                    required: true,
                    noSpace: true
                },
                firm_code: {
                    required: true,
                    noSpace: true
                },
                firm_reg: {
                    required: true,
                    noSpace: true
                },
                sections: {
                    required: true,
                    noSpace: true
                },
                firm_jurisdiction: {
                    required: true,
                    noSpace: true
                },
                sp_name: {
                    required: true,
                    noSpace: true
                },
                sp_role: {
                    required: true,
                    noSpace: true
                },
//                email: {
//                    required: true,
//                    email: true,
//                    minlength: 6,
//                    remote: {
//                        url: BASE_URL + 'firm/user_id_check/',
//                        type: "post",
//                        data: {
//                            user_id: function () {
//                                return $('#email').val();
//                            }
//
//                        }
//                    }
//                },
                password: {
                    required: true,
                    noSpace: true,
                    minlength: 8
                },
                email_1: {
                    required: true,
                    noSpace: true,
                    email: true
                },
                country_code1: {
                    required: true,
                    noSpace: true,
                    maxlength: 3,
                    minlength: 3,
                    accept: "[0-9]+"
                },
                country_code2: {
                    required: true,
                    noSpace: true,
                    maxlength: 3,
                    minlength: 3,
                    accept: "[0-9]+"
                },
                phone: {
                    required: true,
                    noSpace: true,
                    accept: "[0-9-\(\)]+"
                },
                mobile: {
//                    required: true,
                    noSpace: true,
                    accept: "[0-9-\(\)]+"
                },
                addr_line_1: {
                    required: true,
                    noSpace: true
                },
                country: {
                    required: true,
                    noSpace: true
                },
                state: {
                    required: true,
                    noSpace: true

                },
                city: {
                    required: true,
                    noSpace: true
                },
                "practice_area[]": {
                    required: true,
                    noSpace: true
                },
                company_logo: {
//                    required: true,
                    accept:"jpg,png,jpeg,gif",
                    filesize: 5048576
                }
//                
            },
            messages: {
                fname: {
                    required: "<font color=\"red\">Please select first name</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                lname: {
                    required: "<font color=\"red\">Please select last name</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                firm_admin_seq_no: {
                    required: "<font color=\"red\">Please select firm admin</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                firm_name: {
                    required: "<font color=\"red\">Please enter firm name</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                group_code: {
                    required: "<font color=\"red\">Please select group</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                designation_code: {
                    required: "<font color=\"red\">Please select designation</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                firm_id: {
                    required: "<font color=\"red\">Please enter firm id</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                firm_code: {
                    required: "<font color=\"red\">Please enter firm code</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                firm_reg: {
                    required: "<font color=\"red\">Please enter firm registration</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                sections: {
                    required: "<font color=\"red\">Please enter sections</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                firm_jurisdiction: {
                    required: "<font color=\"red\">Please enter firm jurisdiction</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                sp_name: {
                    required: "<font color=\"red\">Please enter single point name</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                sp_role: {
                    required: "<font color=\"red\">Please enter single point role</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
//                email: {
//                    required: "<font color=\"red\">Please enter a User ID</font> ",
//                    email: "<font color=\"red\">Please enter a valid Email</font>",
//                    remote: "<font color=\"red\">User ID already exists. Please try with another ! </font>",
//                    noSpace: "<font color=\"red\">Space not allowed</font> "
//                },
                password: {
                    required: "<font color=\"red\">Please enter your Password</font> ",
                    maxlength: "<font color=\"red\">Your password must be more than 8 characters</font>",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                email_1: {
                    required: "<font color=\"red\">Please enter a Email</font> ",
                    email: "<font color=\"red\">Please enter a valid Email</font>",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                country_code1: {
                    required: "<font color=\"red\">Please enter your country code!</font>",
                    maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                    minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                    accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                country_code2: {
                    required: "<font color=\"red\">Please enter your country code!</font>",
                    maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                    minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                    accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone number</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                mobile: {
//                    required: "<font color=\"red\">Please enter phone number</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                addr_line_1: {
                    required: "<font color=\"red\">Please enter address line 1</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                country: {
                    required: "<font color=\"red\">Please enter country</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter state</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                city: {
                    required: "<font color=\"red\">Please enter city</font> ",
                    noSpace: "<font color=\"red\">Space not allowed</font> "
                },
                "practice_area[]": {
                    required: "<font color=\"red\">Please select atleast one practice area</font> "
                },
                company_logo: {
//                    required: "<font color=\"red\">Please upload company logo</font>",
                    accept:"<font color=\"red\">Must be image type file</font>"
                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    // end of firm edit
            
            
            var FormInputMask = function() {

                var handleInputMasks = function() {

                    $("#phone").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });
                    $("#mobile").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });
                    /*$("#fax").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });*/

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

                }
                return {
                    //main function to initiate the module
                    init: function() {
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
            $('#web_url').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#web_url1').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url1').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#web_url2').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url2').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#web_url3').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url3').keyup(function() {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#practice_area').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                numberDisplayed: 3,
                enableCaseInsensitiveFiltering: true,
                maxHeight: 300,
                maxWidth: 100
            });
        </script>
        <style type="text/css">
            .form-group.required .control-label:after {
                content:"*";
                color:red;
            }
        </style>
    </body>

</html> 