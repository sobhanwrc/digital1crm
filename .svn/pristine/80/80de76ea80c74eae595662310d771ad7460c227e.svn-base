<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php //print_r ($firm_details); die();?>
    
    <?php
//    echo 'devosmita'; exit;s
//    t($codes['Firm Address Type']); exit;
    echo $header_link;
    $ci =&get_instance();
    ?>
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
                    <div class="page-bar" style="position:relative">
                        <ul class="page-breadcrumb">
                             <li>
                                <a href="<?php echo $base_url; ?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo $base_url; ?>venue">Venue</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Edit</span>
                            </li>
                        </ul>

                        <div class="btn-group btn-group-devided" data-toggle="buttons" style=" position:  absolute; right:20px; top: 7px">
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
                                <div class="portlet-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_1_1">
                                            <form role="form" id="venue-general-info-edit-form" enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo $base_url . 'venue/update/' ?>" novalidate="novalidate">
                                            <input type="hidden" name="venue_seq_no" id="venue_seq_no" value="<?php echo base64_encode($venue_list[0]['venue_seq_no']); ?>"
                                                
                                                <div class="row">
                                                    <div class="add_form_sec">
                                                        <div class="col-md-8">
                                                            <?php
//                                                            t($city_info);exit;
                                                            $aaa = $ci->session->flashdata('suc_message');
                                                            if (isset($aaa) && $aaa != '') {
                                                                ?>
                                                                <div class="alert alert-success" id="general_msg_success" >
                                                                    <strong>Success!</strong> <?php echo $aaa; ?>
                                                                </div>
                                                            <?php } ?>
                                                            <?php
                                                            $aaa = $ci->session->flashdata('err_message');
                                                            if (isset($aaa) && $aaa != '') {
                                                                ?>
                                                                <div class="alert alert-danger" id="general_msg_success" >
                                                                    <strong>Error!</strong> <?php echo $aaa; ?>
                                                                </div>
                                                            <?php } ?>

                                                            <!--<div class="col-md-12">-->
                                                            <h3 class="hint"> Venue Details </h3>
                                                            <!--</div>-->
                                                            <div class="form-group required">
                                                                <label class="control-label">Venue Name</label>
                                                                <input type="text" placeholder="Enter Venue Name" class="form-control" name="venue_name" id="venue_name" autocomplete="off" value="<?php echo $venue_list[0]['venue_name']; ?>" />
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label">Address</label>
                                                                <textarea class="form-control" rows="3" placeholder="Enter Venue Address" id="venue_address" name="venue_address"><?php echo $venue_list[0]['venue_address']; ?></textarea>
                                                            </div>
                                                            <div class="form-group required">
                                                                    <label class="control-label">Country</label>
                                                                    <input type="text" name="country_seq_no" id="country_seq_no" class="form-control" value="<?php echo $venue_list[0]['country_seq_no']; ?>">
                                                            </div>
                                                            
                                                            <div class="form-group required">
                                                                    <label class="control-label">State</label>
                                                                    <input type="text" name="state_seq_no" id="state_seq_no" class="form-control" value="<?php echo $venue_list[0]['state_seq_no']; ?>">
                                                            </div>
                                                            <div class="form-group required">
                                                                    <label class="control-label">City</label>
                                                                    <input type="text" name="city_seq_no" id="city_seq_no" class="form-control" value="<?php echo $venue_list[0]['city_seq_no']; ?>">
                                                            </div>
                                                            <div class="form-group required">
                                                                    <label class="control-label">Zipcode</label>
                                                                    <input type="text" name="zips_seq_no" id="zips_seq_no" class="form-control" value="<?php echo $venue_list[0]['zips_seq_no']; ?>">
                                                            </div>
                                                            
                                                            <div class="form-group required">
                                                                <label class="control-label">Contact Person</label>
                                                                <input type="text" placeholder="Enter Contact Person" class="form-control" name="contact_person" id="contact_person" autocomplete="off" value="<?php echo $venue_list[0]['contact_person']; ?>" />
                                                            </div>

<!--                                                            <div class="form-group required">
                                                                <label class="control-label">Contact No</label>
                                                                <input type="text" placeholder="Enter Contact No" class="form-control" name="contact_no" id="contact_no" autocomplete="off" value="<?php echo $venue_list[0]['contact_no']; ?>" />
                                                            </div>-->
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label" style=" width: 100%; display: inline-block">Contact No</label>
                                                                <input type="text" value="<?php echo $country_code; ?>" placeholder="Country Code" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 22%; display: inline-block">
                                                                <input type="text" value="<?php echo $contact_no; ?>" placeholder="Enter Contact No" class="form-control"  name="contact_no" id="contact_no" style="width: 78%; margin-left: -5px; display: inline-block" />

                                                                <label id="country_code1-error" class="error" for="country_code1"></label>
                                                                <label id="contact_no-error" class="error" for="contact_no"></label>
                                                            </div>

                                                            <div class="form-group required">
                                                                    <label class="control-label">Status</label>
                                                                    <select name="status" id="status" class="form-control">
                                                                    <option value="1" <?php if($venue_list[0]['status'] == 1) { ?> selected="selected" <?php } ?> >Active</option>
                                                                    <option value="0" <?php if($venue_list[0]['status'] == 0) { ?> selected="selected" <?php } ?>>De-Active</option>
                                                                    </select>
                                                            </div>

                                                        </div>                                                   
                                                         
                                                        </div>
                                                        <div class="margiv-top-10">
                                                                <button type="submit" id="general-edit-submit-btn" class="btn green" name="general_save_change" value="general_save_change">Edit</button>
                                                                <input type="reset" value="Reset" class="btn green">
                                                        </div>
                                                    </div> 
                                                </div>     
                                            </form>
                                        </div>
                                               
                                                            
                                        

                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <style>
            .add_form_sec {
                margin: 0;
                width: 80%;
                display: inline-block;
                background: #fafafa;
            }
            .form-group.required .control-label:after {
                content:"*";
                color:red;
            }

            label.error {
                color: #FF0000;
            }

        </style>

        <!-- BEGIN FOOTER -->
<?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script> -->
        <!--<script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>-->

        <script type="text/javascript">
    $(document).ready(function () {
        $("#general-edit-submit-btn").click(function(e){
            $("#venue-general-info-edit-form").submit();
        });
        $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
         }, "Should have alphabet");
        $.validator.addMethod("address_validation", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9-,/_() ]+$/.test(value);
         }, "Please type proper address");
        $("#venue-general-info-edit-form").validate({
            rules: {
                venue_name: {
                    required: true,
                    alphanumeric: true
                },
                venue_address: {
                    required: true,
                    address_validation: true
                },
                country_seq_no: {
                    required: true
                },
                state_seq_no: {
                    required: true
                },
                city_seq_no: {
                    required: true
                },
                zips_seq_no: {
                    required: true
                },
                contact_person: {
                    required: true,
                    alphanumeric: true
                },
                country_code1: {
                    required: true,
                    maxlength: 3,
                    minlength: 3,
                    accept: "[0-9]+"
                },
                contact_no: {
                    required: true
                },
                status: {
                    required: true
                }
            },
            messages: {
                venue_name: {
                    required: "Please enter venue name"
                },
                venue_address: {
                    required: "Please enter venue address"
                },
                country_seq_no: {
                    required: "Please select country"
                },
                state_seq_no: {
                    required: "Please select state"
                },
                city_seq_no: {
                    required: "Please select city"
                },
                zips_seq_no: {
                    required: "Please enter zipcode"
                },
                contact_person: {
                    required: "Please enter contact person name"
                },
                country_code1: {
                    required: "<font color=\"red\">Please enter your country code!</font>",
                    maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                    minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                    accept: "<font color=\"red\"> Maximum 3 digits allow.</font>"
                },
                contact_no: {
                    required: "Please enter contact no"
                },
                status: {
                    required: "Please select status"
                }
            },
            submitHandler:function(form) {
                form.submit();
            }
        });
        
    });

        </script>

        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <link rel="stylesheet" href="<?php echo $assets_path; ?>custom/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo $assets_path; ?>custom/js/bootstrap-multiselect.js"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
            jQuery('#country_code1').keyup(function () {
                this.value = this.value.replace(/[^0-9\+]/g,'');
            });
            $(window).load(function() {

//                    $("#loader_image").hide();

                $('#loader_image').delay(2000).fadeOut(1000)

            });
            var FormInputMask = function () {

                var handleInputMasks = function () {

                    $("#contact_no").inputmask("mask", {
                        "mask": "(0)9999 999999"
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
        </script>
    </body>

</html> 