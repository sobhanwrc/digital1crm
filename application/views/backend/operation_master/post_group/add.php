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
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">\
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
                                <a href="<?php echo $base_url; ?>PostGroup">Postcode Group</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add</span>
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
                                            <form role="form" id="postgroup-type-general-info-edit-form" enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo $base_url . 'PostGroup/add/' ?>" novalidate="novalidate">

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
                                                            <h3 class="hint"> PostGroup Details </h3>
                                                            <!--</div>-->
                                                            <div class="form-group">
                                                                <label class="control-label">Group Name</label>
                                                                <input type="text" placeholder="Enter Group Name" class="form-control" name="group_name" id="group_name" autocomplete="off" value="<?php echo set_value('group_name', $ci->session->userdata('current_client')); ?>" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Group Contains</label>
                                                                <div class="s2-example form-group" style="border-style: solid; border-color: #c2cad8;">
                                                                    <select class="js-states form-control select2-hidden-accessible" style="width: 100%;" name="group_contains[]" id="group_contains" multiple="multiple"  aria-hidden="true" tabindex="-1"/></select>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group required">
                                                                    <label class="control-label">Status</label>
                                                                    <select name="status" id="status" class="form-control">
                                                                    <option value="1">Active</option>
                                                                    <option value="0">De-Active</option>
                                                                    </select>
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
            .select2-search__field {
              width: 100%!important;
            }
            
            .s2-example {
                margin-left: 0;
                margin-right: 0;
                background-color: #fff;
                border-width: 1px;
                border-color: #eee;
                border-radius: 4px 4px 0 0;
                box-shadow: none;
            }
            
            .select2-selection--multiple .select2-selection__choice {
                background-color: #e4e4e4;
                border: 1px solid #aaa;
                border-radius: 4px;
                cursor: default;
                float: left;
                margin-right: 5px;
                margin-top: 5px;
                padding: 0 5px;
            }
            
            ul {
                list-style-type: none;
            }
            
        </style>

        <!-- BEGIN FOOTER -->
<?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript">

        $(window).load(function() {
        //          $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
        });


    $(document).ready(function () {

      $('#group_contains').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '<?php echo base_url();?>PostGroup/get_postcode',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
//            console.log(data);
            return {
              results: data
            };
          },
          cache: true
        }
      });


      $.validator.addMethod("alphanumeric", function(value, element) {
      return this.optional(element) || /^[a-zA-Z0-9 _]+$/.test(value);
    }, "Should have alphabet");
        $("#general-edit-submit-btn").click(function(e){
            $("#postgroup-type-general-info-edit-form").submit();
        });
        $("#postgroup-type-general-info-edit-form").validate({
            rules: {
                group_name: {
                    required: true,
                    alphanumeric: true
                },
                "group_contains[]": {
                  required: true
                },
                status: {
                    required: true
                }
            },
            messages: {
              group_name: {
                  required: "Please enter group name"
              },
              "group_contains[]": {
                required: "Please enter postcode that should exists in the above group"
              },
              status: {
                  required: "Please enter status"
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
