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
                                <a href="<?php echo $base_url; ?>paymentsettings">Payment Settings</a>
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
                                            <form role="form" id="paymentsettings-general-info-edit-form" enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo $base_url . 'paymentsettings/update/' ?>" novalidate="novalidate">
                                                <input type="hidden" name="payment_settings_seq_no" value="<?php echo base64_encode($payment_settings[0]['payment_settings_seq_no']); ?>" />
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
                                                            <h3 class="hint"> Payment Settings Details </h3>
                                                            <!--</div>-->

                                                            <div class="form-group ">
                                                                <label class="control-label">Paypal Info</label>
                                                                <textarea class="form-control text-input" rows="3" placeholder="Enter Paypal Information" id="paypal_info" name="paypal_info"><?php echo $payment_settings[0]['paypal_info']; ?></textarea>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label class="control-label">Bank Info</label>
                                                                <textarea class="form-control text-input" rows="3" placeholder="Enter Bank Information" id="bank_info" name="bank_info"><?php echo $payment_settings[0]['bank_info']; ?></textarea>
                                                            </div>

                                                        </div>

                                                        </div>
                                                        <div class="margiv-top-10">
                                                                <button type="submit" id="general-edit-submit-btn" class="btn green" name="general_save_change" value="general_save_change">Save Changes</button>
                                                                <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
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
        $(".text-input").keydown(function(e){

            var html = $(this).val().replace(/</g, "").replace(/>/g, "");
        });
        $("#general-edit-submit-btn").click(function(e){
            $("#paymentsettings-general-info-edit-form").submit();
        });

        $("#paymentsettings-general-info-edit-form").validate({
            rules: {
                paypal_info: {
                    required: true
                },
                bank_info: {
                    required: true
                }
            },
            messages: {
                paypal_info: {
                    required: "Please Enter Paypal Information"
                },
                bank_info: {
                    required: "Please Enter Bank Information"
                }
            },
            submitHandler:function(form) {
                form.submit();
            }
        });


    });

        </script>
    </body>

</html>
