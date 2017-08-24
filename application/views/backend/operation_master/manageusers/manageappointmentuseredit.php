<!DOCTYPE html>
<?php
//    echo $role_code;
//    exit;
?>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php
//     t($codes['Jurisdictions']);exit;
    echo $header_link;
    ?>
    <!-- END HEAD -->

    <style>
        .swal2-container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            padding: 10px;
            background-color: transparent;
            z-index: 999999;
        }

        .swal2-modal .swal2-title {
            color: #595959;
            font-size: 20px;
            text-align: center;
            font-weight: 600;
            text-transform: none;
            position: relative;
            margin: 0;
            padding: 0;
            display: block;
        }

        hr, p {
            margin: 10px;
        }

        label.error {
            font-weight: bold;
            color: #FF0000;
        }

    </style>

    <script src="<?php echo $assets_path; ?>global/plugins/sweetalert2.js" type="text/javascript"></script>

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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Appointment User</a>
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
                                        <span class="caption-subject bold uppercase">Edit Appointment User</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()"> Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                                    </div>

                                </div>
                                <div class="portlet-body">

                                    <div class="row">
                                        <div class="add_form_sec">

                                            <form role="form" autocomplete="off" id="add_new_attorney_frm1" method="post" action="<?php echo $base_url . 'Manageappointmentuser/edit_save/' . base64_encode($callview[0]['appt_seq_no']); ?>" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div style=" width: 100%; display: block">
                                                        <div class="col-md-6">
                                                            <div class="col-md-12">
                                                                <!-- <h3 class="hint"> User credentials </h3> -->
                                                                <h3 class="hint"> Manage Appointment users  </h3>
                                                                <div class="form-group required">
                                                                    <label class="control-label">First Name</label>
                                                                    <input type="text" placeholder="First Name" class="form-control"  name="f_name" id="f_name" value="<?php if (isset($callview[0]['f_name'])) echo $callview[0]['f_name']; ?>" />
                                                                    <input type="hidden" name="user_seq_no" value="<?php echo $callview[0]['user_seq_no']; ?>">
                                                                </div> 
                                                                <div class="form-group required">
                                                                    <label class="control-label">Last Name</label>
                                                                    <input type="text" placeholder="Last Name" class="form-control"  name="l_name" id="l_name"  value="<?php if (isset($callview[0]['l_name'])) echo $callview[0]['l_name']; ?>"/>
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" placeholder="Email" class="form-control"  name="email" id="email" value="<?php if (isset($callview[0]['email'])) echo $callview[0]['email']; ?>"/>
                                                                </div>
<!--                                                                <div class="form-group required">
                                                                    <label class="control-label">Password</label>
                                                                    <input type="password" placeholder="Password" class="form-control"  name="password" id="password" value="<?php if (isset($callview[0]['password'])) echo $callview[0]['password']; ?>"/>
                                                                </div>-->

<!--                                                                <div class="form-group required">
                                                                    <label class="control-label">Mobile</label>
                                                                    <input type="text" placeholder="Mobile" class="form-control"  name="mobile" id="mobile" value="<?php if (isset($callview[0]['mobile'])) echo $callview[0]['mobile']; ?>"/>
                                                                </div>-->
                                                                <div class="form-group required">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Mobile</label>
                                                                    <input type="text" value="<?php echo $country_code_3; ?>" placeholder="" class="form-control" id="country_code3" name="country_code3" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input type="text" value="<?php echo $mobile; ?>" placeholder="Mobile" class="form-control"  name="mobile" id="mobile" style="width: 85%; margin-left: -5px; display: inline-block" />

                                                                    <label id="country_code3-error" class="error" for="country_code3"></label>
                                                                    <label id="mobile-error" class="error" for="mobile"></label>
                                                                </div>

<!--                                                                <div class="form-group">
                                                                    <label class="control-label">Phone1</label>
                                                                    <input type="text" placeholder="Phone1" class="form-control"  name="phone1" id="phone1" value="<?php if (isset($callview[0]['phone1'])) echo $callview[0]['phone1']; ?>"/>
                                                                </div>-->
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Phone1</label>
                                                                    <input type="text" value="<?php echo $country_code2; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input type="text" value="<?php echo $phone1_number; ?>" placeholder="Phone1" class="form-control"  name="phone1" id="phone1"  style="width: 85%; margin-left: -5px; display: inline-block"/>

                                                                    <label id="country_code1-error" class="error" for="country_code1"></label>
                                                                    <label id="phone1-error" class="error" for="phone1"></label>
                                                                </div>

<!--                                                                <div class="form-group">
                                                                    <label class="control-label">Phone2</label>
                                                                    <input type="text" placeholder="Phone2" class="form-control"  name="phone2" id="phone2" value="<?php if (isset($callview[0]['phone2'])) echo $callview[0]['phone2']; ?>"/>
                                                                </div>-->
                                                                <div class="form-group">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Phone2</label>
                                                                    <input type="text" value="<?php echo $country_code1; ?>" placeholder="" class="form-control" id="country_code2" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input type="text" value="<?php echo $phone2_number; ?>" placeholder="Phone2" class="form-control"  name="phone2" id="phone2"  style="width: 85%; margin-left: -5px; display: inline-block"/>

                                                                    <label id="country_code2-error" class="error" for="country_code2"></label>
                                                                    <label id="phone2-error" class="error" for="phone2"></label>
                                                                </div>

                                                                <div class="form-group required">
                                                                    <label class="control-label">Position</label>
                                                                    <input type="text" placeholder="Position" class="form-control"  name="position" id="position" value="<?php if (isset($callview[0]['position'])) echo $callview[0]['position']; ?>"/>
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">Date of Appointment</label>
                                                                    <div class="form-inline">
                                                                        <div class="input-group date date-picker" data-date-format="dd-M-yyyy">

                                                                            <input aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="date_of_appointment" id="date_of_appointment" placeholder="DD-MMM-YYYY" value="<?php if (isset($callview[0]['position'])) echo $callview[0]['date_of_appointment']; ?>"/>
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button" style="top:0px !important">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>

                                                                        </div>

                                                                    </div>   
                                                                </div>

                                                                <div >
                                                                    
                                                                    <button type="submit" name="" id="general-submit-btn" class="btn green">Edit</button>
                                                                    <button type="reset" name="reset" value="" class="btn green">Reset</button>
                                                                </div> 


                                                            </div>



                                                        </div>
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
                            <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
                            <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script> 
                            <script src="<?php echo $assets_path; ?>custom/js/additional-methods.min.js" type="text/javascript"></script> 
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>
                            <script src="<?php echo $assets_path; ?>custom/js/validate/attorney_add_edit.js" type="text/javascript"></script>
                            <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
                            <!-- BEGIN PAGE LEVEL PLUGINS -->
                            <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
                            <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>



                            <!-- END PAGE LEVEL PLUGINS -->
                            <script type="text/javascript">
                                var FormInputMask = function() {
                                    

                                    var handleInputMasks = function() {

                                        $("#hourly_comp_cost").inputmask("numeric", {
                                            radixPoint: ".",
                                            groupSeparator: ",",
                                            digits: 2,
                                            autoGroup: true,
                                            prefix: '$ ',
                                            rightAlign: false
                                        });

                                        $("#overhead_amount").inputmask("numeric", {
                                            radixPoint: ".",
                                            groupSeparator: ",",
                                            digits: 2,
                                            autoGroup: true,
                                            prefix: '$ ',
                                            rightAlign: false
                                        });

                                        $("#billing_rate_opp_cost").inputmask("numeric", {
                                            radixPoint: ".",
                                            groupSeparator: ",",
                                            digits: 2,
                                            autoGroup: true,
                                            prefix: '$ ',
                                            rightAlign: false
                                        });

                                        $("#phone").inputmask("mask", {
                                            "mask": "(0)9999 999999"
                                        });

                                        $("#phone1").inputmask("mask", {
                                            "mask": "(0)9999 999999"
                                        });

                                        $("#phone2").inputmask("mask", {
                                            "mask": "(0)9999 999999"
                                        });
                                        $("#mobile").inputmask("mask", {
                                            "mask": "(0)9999 999999"
                                        });
                                        $("#mobile_appointment_user").inputmask("mask", {
                                            "mask": "(999) 999-9999"
                                        });
                                        $("#phone1_appointment_user").inputmask("mask", {
                                            "mask": "(999) 999-9999"
                                        });
                                        $("#phone2_appointment_user").inputmask("mask", {
                                            "mask": "(999) 999-9999"
                                        });
                                        $("#fax").inputmask("mask", {
                                            "mask": "(999) 999-9999"
                                        });

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
                            </script>
                            <script>
                                $(".approver_type").hide();
                                $(".approver").click(function() {
                                    if ($(this).is(":checked")) {
                                        $(".approver_type").show();
                                    } else {
                                        $(".approver_type").hide();
                                    }
                                });

                                $('#firm_seq_no').change(function() {
                                    var b = BASE_URL;
                                    var firm_seq_no = $(this).val();
                                    $.ajax({
                                        url: b + 'attorney/getFirmSections/',
                                        type: 'post',
                    //                        dataType: 'json',
                                        data: {
                                            firm_seq_no: firm_seq_no
                                        },
                                        success: function(data) {
                                            $('#section').html(data);
                                        }
                                    });
                                });
                                
                                
                                $(window).load(function() {

                    //                    $("#loader_image").hide();

                                    $('#loader_image').delay(2000).fadeOut(1000)

                                });


                                // check validation for accepting only number and + for phone1 phone2 and mobile //
                                jQuery('#country_code1').keyup(function() {
                                    this.value = this.value.replace(/[^0-9\+]/g, '');
                                });

                                jQuery('#country_code3').keyup(function() {
                                    this.value = this.value.replace(/[^0-9\+]/g, '');
                                });

                                jQuery('#country_code2').keyup(function() {
                                    this.value = this.value.replace(/[^0-9\+]/g, '');
                                });
                                // -------------end---------------- //

                                //for space prevent
                                jQuery.validator.addMethod("noSpace", function(value, element) {
                                    return value.trim();
                                }, "No space please and don't leave it empty");
                                //end 


                                $(function() {
//                                    $.validator.addMethod("alphanumeric", function(value, element) {
//                                        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
//                                    }, "Should have alphabet or number");
                                    $.validator.addMethod("date_format", function(value, element) {
                                        return this.optional(element) || /^[a-zA-Z0-9-]+$/.test(value);
                                    }, "Invalid date format");
                                    $("#add_new_attorney_frm1").validate({
                                        rules: {
                                            f_name: {
                                                required: true,
//                                                alphanumeric: true,
                                                noSpace: true
                                            },
                                            l_name: {
                                                required: true,
//                                                alphanumeric: true,
                                                noSpace: true
                                            },
                                            email: {
                                                required: true,
                                                email: true
                                            },
                                            mobile: {
                                                required: true,
                                                accept: "[0-9-\(\)]+"
                                            },
                                            password: {
                                                required: true,
                                                minlength: 5,
                                                maxlength: 32
                                            },
                                            phone1: {
//                                                required: true
                                                accept: "[0-9-\(\)]+"
                                            },
                                            phone2: {
//                                                required: true
                                                accept: "[0-9-\(\)]+"
                                            },
                                            position: {
                                                required: true,
//                                                alphanumeric: true,
                                                noSpace: true
                                            },
                                            date_of_appointment: {
                                                required: true,
                                                date_format: true
                                            },
                                            country_code1: {
//                                                required: true,
                                                maxlength: 3,
                                                minlength: 3,
                                                //accept: "[0-9]+"
                                            },
                                            country_code2: {
//                                                required: true,
                                                maxlength: 3,
                                                minlength: 3,
                                                //accept: "[0-9]+"
                                            },
                                            country_code3: {
                                                required: true,
                                                maxlength: 3,
                                                minlength: 3,
                                                //accept: "[0-9]+"
                                            },
                                        },
                                        messages: {
                                            f_name: {
                                                required: "Please enter first name",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            l_name: {
                                                required: "Please enter last name",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            email: {
                                                required: "Please enter email id",
                                                email: "Please enter valid email id"
                                            },
                                            mobile: {
                                                required: "Please enter mobile no"
                                            },
                                            password: {
                                                required: "Please enter password",
                                                minlength: "Password must have atleast 5 characters",
                                                maxlength: "Password must have maximum 32 characters"
                                            },
                                            phone1: {
//                                                required: "Please enter phone 1"
                                            },
                                            phone2: {
//                                                required: "Please enter phone 2"
                                            },
                                            position: {
                                                required: "Please enter position name",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            date_of_appointment: {
                                                required: "Please enter date of appointment"
                                            },
                                            country_code1: {
//                                                required: "<font color=\"red\">Please enter your country code!</font>",
                                                maxlength: "<font color=\"red\">Maximum 3 digits allow.</font>",
                                                minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                                                //accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>"
                                            },
                                            country_code2: {
//                                                required: "<font color=\"red\">Please enter your country code!</font>",
                                                maxlength: "<font color=\"red\">Maximum 3 digits allow.</font>",
                                                minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                                                //accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>"
                                            },
                                            country_code3: {
                                                required: "<font color=\"red\">Please enter your country code!</font>",
                                                maxlength: "<font color=\"red\">Maximum 3 digits allow.</font>",
                                                minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                                                //accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>"
                                            }
                                        },
                                        submitHandler: function(form) {
                                            form.submit();
                                        }
                                    });

                                });










                            </script>

                            <style type="text/css">
                                .btn.default:not(.btn-outline) {
                                    background-color: #e1e5ec;
                                    border-color: #e1e5ec;
                                    color: #666;
                                    top:13px !important;
                                }

                                .add_form_sec{ margin: 0; width: 80%;  display: inline-block; background: #fafafa }

                                .form-group.required .control-label:after {
                                    content:"*";
                                    color:red;
                                }
                                .input-group.required .control-label:after {
                                    content:"*";
                                    color:red;
                                }

                            </style>

                            </body>

                            </html> 