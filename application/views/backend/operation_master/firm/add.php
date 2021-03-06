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
                    <div class="page-bar" style=" position: relative">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                 <a href="<?php echo $base_url; ?>firm/">Company</a>

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
                                        <span class="caption-subject bold uppercase">Add Company</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">

                                        </div>
                                    </div>
                                </div>

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

                                <div class="portlet-body">
                                    <div class="row">
                                        <div class = "add_form_sec">
                                            <form role="form" autocomplete="off" id="myfirm-general-info-form" enctype="multipart/form-data" method="post" action="<?php echo $base_url . 'firm/add/' ?>">
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


                                                    <div class="col-md-12" style="padding-left: 0;">
                                                        <h3 class="hint"> Company Admin Credential </h3>
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
                                                        <label class="control-label">Designation</label>
                                                        <input type="text" placeholder="Enter designation" class="form-control" name="designation_code" id="designation_code"  autocomplete="off" />
                                                    </div>


                                                    <h3 class="hint"> General Informations </h3>

                                                    <div class="form-group required">
                                                        <label class="control-label">Company Name</label>
                                                        <input type="text" placeholder="Enter Firm Name" class="form-control" name="firm_name" id="firm_name" /> 
                                                    </div>

                                                    <div class="form-group required">
                                                        <label class="control-label">Company Code</label>
                                                        <input type="text" placeholder="Enter Code" class="form-control" name="firm_code" id="firm_code"  /> 
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="control-label">Company Registration</label>
                                                        <input type="text" placeholder="Enter Registration" class="form-control" name="firm_reg" id="firm_reg"   /> 
                                                    </div>

                                                    <h3 class="hint"> Single Point Information </h3>
                                                    <div class="form-group required">
                                                        <label class="control-label">SP Contact Name</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Name" name="sp_name" id="sp_name"  /> </div>

                                                    <div class="form-group required">
                                                        <label class="control-label">SP Contact Role</label>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Role" name="sp_role" id="sp_role" /> </div>


                                                    <div class="form-group required">
                                                        <label class="control-label">Company Image Upload</label>
                                                        <!-- <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Role" name="sp_role" id="sp_role" /> </div> -->
                                                        <input type="file" name="company_logo" id="company_logo" class="form-control placeholder-no-fix"></div>


                                                </div>
                                                <div class="col-md-6">
                                                    <h3 class="hint"> Enter Address </h3>

                                                    <div id="validate_div_12" >
                                                        <div class="form-group required">
                                                            <label class="control-label">Email</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email_1" id="email_1"  /> 
                                                        </div> 
                                                        <div class="form-group required">
                                                            <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>
                                                            <input type="text" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone" id="phone" style="width: 85%; margin-left: -5px; display: inline-block" /> 
                                                            
                                                            <label id="country_code1-error" class="customErrorClass" for="country_code1" style="display: inline-block;"></label>
                                                            <label id="phone-error" class="customErrorClass" for="phone"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Fax</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax" id="fax"  /> 
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="control-label" style=" width: 100%; display: inline-block">Mobile</label>
                                                            <input type="text" placeholder="" class="form-control" id="country_code2" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile" id="mobile" style="width: 85%; margin-left: -5px; display: inline-block" /> 

                                                            <label id="country_code2-error" class="customErrorClass" for="country_code2" style="display: inline-block;"></label>
                                                            <label id="phone-error" class="customErrorClass" for="phone"></label>
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
                                                            <!-- <select name="country" id="country" class="form-control country">
                                                                <option value="">Country</option>
                                                                
                                                            </select> -->
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Country" name="country" id="country"  />
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="control-label">State</label>
                                                            <!-- <select name="state" id="state" class="form-control">
                                                                <option value="">State</option>
                                                               
                                                            </select> -->
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="State" name="state" id="state"  />
                                                        </div>

                                                        <div class="form-group required">
                                                            <label class="control-label">City/Town</label>
                                                            <!-- <select name="city" id="city" class="form-control">
                                                                <option value="">City/Town</option>
                                                                
                                                            </select> -->
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="City/Town" name="city" id="city"  />
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="control-label">Postal Code</label>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code" id="postal_code" /> 
                                                        </div>
                                                    </div>

                                                    <h3 class="hint"> Remarks </h3>

                                                    <div class="form-group">
                                                        <label class="control-label">Remarks</label>
                                                        <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks" id="remarks"></textarea>
                                                    </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit" id="general-submit-btn" class="btn green">Add</button>
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
        <script src="<?php echo $assets_path; ?>custom/js/additional-methods.min.js" type="text/javascript"></script>
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
            
            jQuery('#country_code1').keyup(function () {
                this.value = this.value.replace(/[^0-9\+]/g,'');
            });
            jQuery('#country_code2').keyup(function () {
                this.value = this.value.replace(/[^0-9\+]/g,'');
            });

            
            jQuery('#postal_code').keyup(function () {
                this.value = this.value.replace(/[^0-9]/g,'');
            });

            $(window).load(function() {
        //          $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
            });
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

            $('#web_url').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });

            var FormInputMask = function () {

                var handleInputMasks = function () {

                    $("#phone").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });
                    $("#mobile").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });
                    //                    $("#fax").inputmask("mask", {
                    //                        "mask": "(999) 999-9999"
                    //                    });
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


            $('.level1').show();
            $('.level2').hide();
            $('.level3').hide();
            $('.level4').hide();
            $('.approval_process').on('click', function () {
                var approval_process = $(this).val();
                if (approval_process === '1') {
                    $('.level1').show();
                    $('.level2').hide();
                    $('.level3').hide();
                    $('.level4').hide();
                } else if (approval_process === '2') {
                    $('.level1').show();
                    $('.level2').show();
                    $('.level3').hide();
                    $('.level4').hide();
                } else if (approval_process === '3') {
                    $('.level1').show();
                    $('.level2').show();
                    $('.level3').show();
                    $('.level4').hide();
                } else if (approval_process === '4') {
                    $('.level1').show();
                    $('.level2').show();
                    $('.level3').show();
                    $('.level4').show();
                }

            });
        </script>
    </body>

</html> 