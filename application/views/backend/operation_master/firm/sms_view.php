<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php
    echo $header_link;
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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Script</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                 <span>Company View</span>
                             </li>-->
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

                                            <form role="form" id="script_view_frm" method="post" name="script_frm">

                                            <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo $firm_seq_no; ?>">


                                                <div class="form-group required" >
                                                    <label class="control-label" style=" width: 65px; display: inline-block">Module</label>
                                                    
                                                    <select class=" form-control" name = "module_value" id = "module_values" style=" width: 200px; display: inline-block">
                                                        <option value = "" selected disabled>-select-</option>
                                                        <option value="module1"><?php echo $modules['module1'] ?></option>
                                                        <option value="module2"><?php echo $modules['module2'] ?></option>
                                                        <option value="module3"><?php echo $modules['module3'] ?></option>
                                                        <option value="module4"><?php echo $modules['module4'] ?></option>
                                                        <option value="module5"><?php echo $modules['module5'] ?></option>
                                                        <option value="module6"><?php echo $modules['module6'] ?></option>
                                                        <option value="module7"><?php echo $modules['module7'] ?></option>
                                                        <option value="module8"><?php echo $modules['module8'] ?></option>
                                                        <option value="module9"><?php echo $modules['module9'] ?></option>
                                                        <option value="module10"><?php echo $modules['module10'] ?></option>
                                                    </select>

                                                </div>


                                                <h3 class="hint"> Remarks </h3>


                                                <div class="form-group">
                                                    <label for="message">Script:</label>
                                                    <div class="form-group">
                                                        <textarea rows="" cols="" style="height:300px;width: 600px;" id="script_area" name="script_area"></textarea>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="margiv-top-10">
                                            <button type="button" class="btn green sms_script_submit" name="general_save_change">Submit</button>
                                            <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                        </div>
                                    </div>
                                </div> 
                            </div>     
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script> -->
        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>


        <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/libs/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/libs/ckeditor/adapters/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/js/index.js"></script>

        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>


        <script>
            $(document).ready(function () {
                Index.init();
            });
        </script>


        <script type="text/javascript">

            $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
            });

            $(document).ready(function () {

                $('#script_view_frm').validate({

                        rules: {

                            script_area: {

                                required: true

                            },
                            module_value: {

                                required: true
                            }

                        },

                        messages: {

                            script_area: {

                                required: "Please enter your text"

                            },

                            module_value: {
                                
                                required: "Please select module"
                            }
                        }

                    });

                $('.sms_script_submit').on('click', function (e) {
                    var module_values = $('#module_values').val();
                    var script = $('#script_area').val();
                    var valid = $('#script_view_frm').valid();
                    if(valid) {
                        $.ajax({
                            type: "POST",
                            url: BASE_URL + 'firm/submit_sms_script/',
                            data: {
                                module_values: module_values,
                                script: script,
                            },
                            success: function (data) {
                                if (data == 'success') {
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "Sms script added successfully",
                                        buttons: {
                                            OK: function () {
                                                window.location.reload();
                                            },
                                            CANCEL: function () {
                                                //window.location.reload();
                                            },
                                        }
                                    });
                                }
                            }
                        });
                    }
                });

            })
        </script>
        <div id='#check'></div>


    </body>

</html> 