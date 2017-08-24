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
                                <a href="<?php echo base_url() ?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>change_module_number">Module</a>
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
                                        <span class="caption-subject bold uppercase">Add Module</span>
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
                                            <?php if($role_code == 'FIRMADM'){ ?>
                                                <form role="form" autocomplete="off" id="add_new_attorney_frm1" name="add_new_attorney_frm1" method="post" action="<?php echo $base_url . 'change_module_number/edit_by_firm' ?>" enctype="multipart/form-data">
                                            <?php }else{ ?>
                                                <form role="form" autocomplete="off" id="add_new_attorney_frm1" name="add_new_attorney_frm1" method="post" action="<?php echo $base_url . 'change_module_number/update' ?>" enctype="multipart/form-data">
                                            <?php } ?>
                                            
                                                    
                                            <?php if(count($fetch_details_from_change_module_name_byFirm) > 0) {
                                                    foreach ($fetch_details_from_change_module_name_byFirm as $key => $value){
                                            ?>
                                                        <div class="col-md-12">
                                                            <div style=" width: 100%; display: block">

                                                                <div class="col-md-7" style="padding-left: 0"><h3 class="hint">Change Module Name</h3></div>
                                                                <div class="col-md-6" style="padding-left: 0">
                                                                    <div class="portlet light bordered">
                                                                        <div class="form-group required">

                                                                            <label class="control-label">Module1</label>
                                                                            <input type="text" value="<?php echo $value['module1']; ?>" class="form-control"  name="module1" id="firstname" />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module2</label>
                                                                            <input type="text" value="<?php echo $value['module2']; ?>" class="form-control"  name="module2" id="lastname" />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module3</label>
                                                                            <input type="text" value="<?php echo $value['module3']; ?>" class="form-control"  name="module3" id="email"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module4</label>
                                                                            <input type="text" value="<?php echo $value['module4']; ?>" class="form-control"  name="module4" id="mobile"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module5</label>
                                                                            <input type="text" value="<?php echo $value['module5']; ?>" class="form-control"  name="module5" id="phone1"  />
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6" style="padding-right: 0">
                                                                    <div class="portlet light bordered">

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module6</label>
                                                                            <input type="text" value="<?php echo $value['module6']; ?>" class="form-control"  name="module6" id="phone2"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module7</label>
                                                                            <input type="text" value="<?php echo $value['module7']; ?>" class="form-control"  name="module7" id="position"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module8</label>
                                                                            <input type="text" value="<?php echo $value['module8']; ?>" class="form-control"  name="module8" id="position"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module9</label>
                                                                            <input type="text" value="<?php echo $value['module9']; ?>" class="form-control"  name="module9" id="position"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module10</label>
                                                                            <input aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="module10" id="date_of_appointment" value="<?php echo $value['module10']; ?>" >
                                                                        </div>
                                                                    </div> 

                                                                </div>

                                                            </div>
                                                        </div>
                                            <?php }} else{ 
                                                if(!empty($module)) {
                                                    foreach ($module as $key => $value) {                                                
                                            ?>
                                                        <div class="col-md-12">
                                                            <div style=" width: 100%; display: block">

                                                                <div class="col-md-7" style="padding-left: 0"><h3 class="hint">Change Module Name</h3></div>
                                                                <div class="col-md-6" style="padding-left: 0">
                                                                    <div class="portlet light bordered">
                                                                        <div class="form-group required">

                                                                            <label class="control-label">Module1</label>
                                                                            <input type="text" value="<?php echo $value['module1']; ?>" class="form-control"  name="module1" id="firstname" />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module2</label>
                                                                            <input type="text" value="<?php echo $value['module2']; ?>" class="form-control"  name="module2" id="lastname" />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module3</label>
                                                                            <input type="text" value="<?php echo $value['module3']; ?>" class="form-control"  name="module3" id="email"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module4</label>
                                                                            <input type="text" value="<?php echo $value['module4']; ?>" class="form-control"  name="module4" id="mobile"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module5</label>
                                                                            <input type="text" value="<?php echo $value['module5']; ?>" class="form-control"  name="module5" id="phone1"  />
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6" style="padding-right: 0">
                                                                    <div class="portlet light bordered">

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module6</label>
                                                                            <input type="text" value="<?php echo $value['module6']; ?>" class="form-control"  name="module6" id="phone2"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module7</label>
                                                                            <input type="text" value="<?php echo $value['module7']; ?>" class="form-control"  name="module7" id="position"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module8</label>
                                                                            <input type="text" value="<?php echo $value['module8']; ?>" class="form-control"  name="module8" id="position"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module9</label>
                                                                            <input type="text" value="<?php echo $value['module9']; ?>" class="form-control"  name="module9" id="position"  />
                                                                        </div>

                                                                        <div class="form-group required">
                                                                            <label class="control-label">Module10</label>
                                                                            <input aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="module10" id="date_of_appointment" value="<?php echo $value['module10']; ?>" >
                                                                        </div>
                                                                    </div> 

                                                                </div>

                                                            </div>
                                                        </div>
                                            <?php }}else{ ?>
                                                    <div class="col-md-12">
                                                        <div style=" width: 100%; display: block">
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <!-- <h3 class="hint"> User credentials </h3> -->
                                                                    <h3 class="hint">Change Module Name</h3>
                                                                    <div class="form-group required">



                                                                        <label class="control-label">Module1</label>
                                                                        <input type="text" value="" class="form-control"  name="module1" id="firstname" />
                                                                    </div> 
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module2</label>
                                                                        <input type="text" value="" class="form-control"  name="module2" id="lastname" />
                                                                    </div>
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module3</label>
                                                                        <input type="text" value="" class="form-control"  name="module3" id="email"  />
                                                                    </div>

                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module4</label>
                                                                        <input type="text" value="" class="form-control"  name="module4" id="mobile"  />
                                                                    </div>

                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module5</label>
                                                                        <input type="text" value="" class="form-control"  name="module5" id="phone1"  />
                                                                    </div>
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module6</label>
                                                                        <input type="text" value="" class="form-control"  name="module6" id="phone2"  />
                                                                    </div>
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module7</label>
                                                                        <input type="text" value="" class="form-control"  name="module7" id="position"  />
                                                                    </div>
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module8</label>
                                                                        <input type="text" value="" class="form-control"  name="module8" id="position"  />
                                                                    </div>
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module9</label>
                                                                        <input type="text" value="" class="form-control"  name="module9" id="position"  />
                                                                    </div>
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Module10</label>
                                                                        <input class="form-control" type="text" name="module10" id="date_of_appointment" value="" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }} ?>

                                                <div class="col-md-12">
                                                    <div class="modal-footer">
                                                        <?php if($role_code == 'FIRMADM'){ ?>
                                                            <button type="submit" name="add_new_module_btn_by_firm" id="general-submit-btn-by-fim" class="btn green" >Save Changes</button>
                                                        <?php }else{ ?>
                                                            <button type="submit" name="add_new_module_btn" id="general-submit-btn" class="btn green" >Save Changes</button>
                                                        <?php } ?>
                                                        
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
                <!-- END CONTAINER -->
                <!-- BEGIN FOOTER -->
                <?php echo $footer; ?>
                <!-- END FOOTER -->
<?php echo $footer_link; ?>
                <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
                <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script> 
                <script src="<?php echo $assets_path; ?>custom/js/validate/attorney_add_edit.js" type="text/javascript"></script>
                <script src="<?php echo $assets_path; ?>custom/js/validate/group_add_edit.js" type="text/javascript"></script>
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

        //        $("#phone").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });
        //        
        //        $("#phone1").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });
        //        
        //        $("#phone2").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });
        //         $("#mobile").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });
        //        $("#mobile_appointment_user").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });
        //        $("#phone1_appointment_user").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });
        //        $("#phone2_appointment_user").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });
        //        $("#fax").inputmask("mask", {
        //            "mask": "(999) 999-9999"
        //        });

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

                            $('#general-submit-btn').on('click', function() {
                                // alert("123");

                                var valid = ('#add_new_attorney_frm1').valid();
                                if (valid) {



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

                    //for space prevent
                    jQuery.validator.addMethod("noSpace", function(value, element) {
                        return value.trim();
                    }, "No space please and don't leave it empty");
                    //end





                    $(function() {


                        // Initialize form validation on the registration form.
                        // It has the name attribute "registration"
                        $("#add_new_attorney_frm1").validate({
                            // Specify validation rules
                            rules: {
                                // The key name on the left side is the name attribute
                                // of an input field. Validation rules are defined
                                // on the right side
                                module1: "required",
                                module1: "noSpace",
                                        module2: "required",
                                module2: "noSpace",
                                        module3: "required",
                                module3: "noSpace",
                                        module4: "required",
                                module4: "noSpace",
                                        module5: "required",
                                module5: "noSpace",
                                        module6: "required",
                                module6: "noSpace",
                                        module7: "required",
                                module7: "noSpace",
                                        module8: "required",
                                module8: "noSpace",
                                        module9: "required",
                                module9: "noSpace",
                                        module10: "required",
                                module10: "noSpace",
        //      email: {
        //        module3: true,
        //        // Specify that email should be validated
        //        // by the built-in "email" rule
        //        module4: true
        //      },
        //      module5 : "required",
        //      password: {
        //        required: true,
        //        minlength: 5
        //      }
                            },
                            // Specify validation error messages
                            messages: {
                                module1: "<font color=\"red\">Please enter your Module1 name</font>",
                                //module1: "<font color=\"red\">Space not allowed! </font>",
                                module2: "<font color=\"red\">Please enter your Module2 name</font>",
                                module3: "<font color=\"red\">Please enter your Module3 name</font>",
                                module4: "<font color=\"red\">Please enter your Module4 name</font>",
                                module5: "<font color=\"red\">Please enter your Module5 name</font>",
                                module6: "<font color=\"red\">Please enter your Module6 name</font>",
                                module7: "<font color=\"red\">Please enter your Module7 name</font>",
                                module8: "<font color=\"red\">Please enter your Module8 name</font>",
                                module9: "<font color=\"red\">Please enter your Module9 name</font>",
                                module10: "<font color=\"red\">Please enter your Module10 name</font>"
        //      password: {
        //        module4: "Please provide a password",
        //        module5: "Your password must be at least 5 characters long"
        //      },
        //      module6: "Please enter a valid email address"
                            },
                            // Make sure the form is submitted to the destination defined
                            // in the "action" attribute of the form when valid
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

                    .add_form_sec{ margin: 0; width: 100%;  display: inline-block; background: #fff }

                    .add_form_sec h3 {
                        font-size: 18px;
                        width: 100%;
                        height: 30px;
                        margin-bottom: 8px;
                        margin-top: 7px;
                        text-align: left;
                        padding-left: 0;
                    }

                    .form-group.required .control-label:after {
                        content:"*";
                        color:red;
                    }
                    .input-group.required .control-label:after {
                        content:"*";
                        color:red;
                    }

                </style>
                <script type="text/javascript">
                    $(window).load(function() {

                //                    $("#loader_image").hide();

                        $('#loader_image').delay(2000).fadeOut(1000)

                    });
                </script>

                </body>

                </html> 