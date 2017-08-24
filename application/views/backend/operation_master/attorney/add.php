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
                                <a href="#">Call Users</a>
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
                                        <span class="caption-subject bold uppercase">Add Manage Call Users</span>
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

                                            <form role="form" autocomplete="off" id="add_new_attorney_frm1" method="post" action="<?php echo $base_url . 'attorney/add' ?>" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div style=" width: 100%; display: block">
                                                        <div class="col-md-6">
                                                            <div class="col-md-12">
                                                                <!-- <h3 class="hint"> User credentials </h3> -->
                                                                <h3 class="hint"> Manage Call users  </h3>
                                                                <div class="form-group required">
                                                                    <label class="control-label">First Name</label>
                                                                    <input type="text" placeholder="First Name" class="form-control"  name="firstname" id="firstname"  />
                                                                </div> 
                                                                <div class="form-group required">
                                                                    <label class="control-label">Last Name</label>
                                                                    <input type="text" placeholder="Last Name" class="form-control"  name="lastname" id="lastname"  />
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" placeholder="Email" class="form-control"  name="email" id="email"  />
                                                                </div>

                                                                <div class="form-group required">
                                                                    <label class="control-label">Password</label>
                                                                    <input type="password" placeholder="Password" class="form-control"  name="password" id="password"  />
                                                                </div>

                                                                <div class="form-group required">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Mobile</label>
                                                                    <input type="text" value="<?php echo $country_code; ?>" placeholder="" class="form-control" id="country_code3" name="country_code3" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input type="text" placeholder="Mobile" class="form-control"  name="mobile" id="mobile"  style="width: 85%; margin-left: -5px; display: inline-block" />

                                                                    <label id="country_code3-error" class="error" for="country_code3"></label>
                                                                    <label id="mobile-error" class="error" for="mobile"></label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Phone1</label>
                                                                    <input type="text" value="<?php echo $country_code; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input type="text" placeholder="Phone1" class="form-control"  name="phone1" id="phone1" style="width: 85%; margin-left: -5px; display: inline-block" />

                                                                    <label id="country_code1-error" class="error" for="country_code1"></label>
                                                                    <label id="phone1-error" class="error" for="phone1"></label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Phone2</label>
                                                                    <input type="text" value="<?php echo $country_code; ?>" placeholder="" class="form-control" id="country_code2" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input type="text" placeholder="Phone2" class="form-control"  name="phone2" id="phone2" style="width: 85%; margin-left: -5px; display: inline-block" />

                                                                    <label id="country_code2-error" class="error" for="country_code2"></label>
                                                                    <label id="phone2-error" class="error" for="phone2"></label>
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">Position</label>
                                                                    <input type="text" placeholder="Position" class="form-control"  name="position" id="position"  />
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">Date of Appointment</label>
                                                                    <!-- <input type="text" placeholder="Date of Appointment" class="form-control"  name="date_of_appointment" id="date_of_appointment"  />
                                                                </div> -->
                                                                    <input style="width:88%; display:inline-block;" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="date_of_appointment" id="date_of_appointment" placeholder="DD-MM-YYYY" >
                                                                    <span style="width:10%; display: inline-block;" class="input-group-btn">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">User profile Image </label> 
                                                                    <input style="padding: 5px 12px 5px 12px;" type="file" name="profile_image" id = "profile_image" class="form-control placeholder-no-fix">
                                                                
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <!--<button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>-->
                                                                <!-- <button type="button" class="btn green">Save changes</button> -->
                                                                <button type="submit" name="add_new_attorney_btn" id="general-submit-btn" class="btn green">Save</button>
                                                                <input type="reset" class="btn green" name="reset" value="Reset">
                                                                
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
                            <script src="<?php echo $assets_path; ?>custom/js/validate/attorney_add_edit.js" type="text/javascript"></script>
                            <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
                            <!-- BEGIN PAGE LEVEL PLUGINS -->
                            <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
                            <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>



                            <!-- END PAGE LEVEL PLUGINS -->

                            <script type="text/javascript">
                                
                                $(window).load(function() {

                //                    $("#loader_image").hide();

                                    $('#loader_image').delay(2000).fadeOut(1000)

                                });

                                var FormInputMask = function () {

                                    var handleInputMasks = function () {

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
                                            "mask": "(999) 999-9999"
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
                                    jQuery(document).ready(function () {
                                        FormInputMask.init(); // init metronic core componets
                                    });
                                }
                            </script>
                            <script>

                                //for space prevent
                                    jQuery.validator.addMethod("noSpace", function(value, element) {
                                        return value.trim();
                                    }, "No space please and don't leave it empty");
                                    //end
                                // check validation for accepting only number and + for phone1 phone2 and mobile //
                                jQuery('#country_code1').keyup(function () {
                                    this.value = this.value.replace(/[^0-9\+]/g,'');
                                });

                                jQuery('#country_code3').keyup(function () {
                                    this.value = this.value.replace(/[^0-9\+]/g,'');
                                });

                                jQuery('#country_code2').keyup(function () {
                                    this.value = this.value.replace(/[^0-9\+]/g,'');
                                });
                                // -------------end---------------- //
                                
                                $(".approver_type").hide();
                                $(".approver").click(function () {
                                    if ($(this).is(":checked")) {
                                        $(".approver_type").show();
                                    } else {
                                        $(".approver_type").hide();
                                    }
                                });

                                $('#firm_seq_no').change(function () {
                                    var b = BASE_URL;
                                    var firm_seq_no = $(this).val();
                                    $.ajax({
                                        url: b + 'attorney/getFirmSections/',
                                        type: 'post',
                                        //                        dataType: 'json',
                                        data: {
                                            firm_seq_no: firm_seq_no
                                        },
                                        success: function (data) {
                                            $('#section').html(data);
                                        }
                                    });
                                });

                                var date = new Date();

                                $('#date_of_appointment').datepicker({
                                    //        'format': 'yyyy-m-d',
                                    'format': 'dd-mm-yyyy',
                                    'autoclose': true,
                                    'startDate': date
                                });



                                $(function () {
                                    // Initialize form validation on the registration form.
                                    // It has the name attribute "registration"
                                    $("#add_new_attorney_frm1").validate({
                                        // Specify validation rules
                                        rules: {
                                            // The key name on the left side is the name attribute
                                            // of an input field. Validation rules are defined
                                            // on the right side
                                            firstname: {
                                                required: true,
                                                noSpace: true
                                            },
                                            lastname:{
                                                required: true,
                                                noSpace: true
                                            },
                                            email: {
                                                required: true,
                                                noSpace: true,
                                                // Specify that email should be validated
                                                // by the built-in "email" rule
                                                email: true,
                                                remote: {
                                                    url: BASE_URL + "attorney/duplicate_email_check",
                                                    type: "post",
                                                    data: {
                                                        email: function () {
                                                            return $("#email").val();
                                                        }
                                                    }
                                                }
                                            },
                                            mobile: {
                                                required: true,
                                                noSpace: true,
                                                accept: "[0-9-\(\)]+"
                                            },
                                            password: {
                                                required: true,
                                                noSpace: true,
                                                minlength: 8
                                            },

                                            country_code1: {
                                                maxlength: 3
                                            },
                                            country_code2: {
                                                maxlength: 3,
                                            },
                                            country_code3: {
                                                noSpace: true,
                                                required: true,
                                                maxlength: 3,
                                                minlength: 3,
                                                accept: "[0-9]+"
                                            },
                                            position: {
                                                required: true,
                                                noSpace: true
                                            }
                                        },
                                        // Specify validation error messages
                                        messages: {
                                            firstname: {
                                                required: "<font color=\"red\">Please enter your firstname</font>",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            lastname: {
                                                required: "<font color=\"red\">Please enter your lastname</font>",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            mobile: {
                                                required: "<font color=\"red\">Please enter mobile number</font>",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            password: {
                                                required: "<font color=\"red\">Please provide a password</font>",
                                                minlength: "<font color=\"red\">Your password must be at least 8 characters long</font>",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            email: {
                                                required:"<font color=\"red\">Please enter a valid email address</font>",
                                                remote: "<font color=\"red\">Email is already is exists! please try with another</font>",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
//                                            phone1: {
//                                                required: "<font color=\"red\">Please enter your Phone number</font>",
//                                            },
//                                            phone2: {
//                                                required: "<font color=\"red\">Please enter your Phone number</font>",
//                                            },
                                            country_code1: {
                                                maxlength: "<font color=\"red\">Please enter correct country code</font>",
                                            },
                                            country_code2: {
//                                                required: "<font color=\"red\">Please enter your country code!</font>",
                                                maxlength: "<font color=\"red\">Please enter correct country code</font>",
                                            },
                                            country_code3: {
                                                required: "<font color=\"red\">Please enter your country code!</font>",
                                                maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                                                minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                                                accept: "<font color=\"red\">Maximum 3 digits allow.</font>",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            },
                                            position: {
                                                required: "<font color=\"red\">Please enter position</font>",
                                                noSpace: "<font color=\"red\">Space not allowed</font>"
                                            }
                                        },
                                        // Make sure the form is submitted to the destination defined
                                        // in the "action" attribute of the form when valid
                                        submitHandler: function (form) {
                                            form.submit();
                                        }
                                    });
                                });


                            </script>

                            <style type="text/css">
                                .btn.default:not(.btn-outline) {
                                    background-color: #E1E5EC;
                                    border-color: #E1E5EC;
                                    color: #666;
                                    top: -1px !important;
                                    left: -3px;
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