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
                                <a href="<?php echo $base_url; ?>PostGroup">Postcode Group</a>
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
                    <?php //t($post_group_details);die; ?>
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_1_1">
                                            <form role="form" id="postgroup-type-general-info-edit-form" enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo $base_url . 'PostGroup/update/'.$post_group_details[0]['post_group_seq_no']; ?>" novalidate="novalidate">
                                            <input type="hidden" name="post_group_seq_no" value="<?php echo $post_group_details[0]['post_group_seq_no']?>">

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
                                                                <input type="text" placeholder="Enter Group Name" class="form-control" name="group_name" id="group_name" autocomplete="off" value="<?php echo $post_group_details[0]['group_name']; ?>" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Group Contains</label>
                                                                <select class="form-control group_contains" name="group_contains[]" id="group_contains" multiple="multiple"  />
                                                                <?php $group_contains = explode(",",$post_group_details[0]['group_contains']); ?>

                                                                <?php foreach ($group_contains as $key => $value) {
                                                                ?>
                                                                <option value="<?php echo $value;?>"><?php echo $value;?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                </select>

                                                            </div>
                                                            <div class="form-group required">
                                                                    <label class="control-label">Status</label>
                                                                    <select name="status" id="status" class="form-control">
                                                                    <option value="1" <?=$post_group_details[0]['status']=="1"?'selected':''?>>Active</option>
                                                                    <option value="0" <?=$post_group_details[0]['status']=="0"?'selected':''?>>De-Active</option>
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
            .select2-container .select2-selection--multiple .select2-selection__rendered {
            box-sizing: border-box!important;
            list-style: none!important;
            margin: 0!important;
            padding: 0 5px!important;
            width: 100%!important;
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
    $(document).ready(function () {

      $('.group_contains').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '<?php echo base_url();?>PostGroup/get_postcode',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {

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
        <?php foreach ($group_contains as $key => $value) {
          ?>
          $('<li class="select2-selection__choice" title="<?php echo $value;?>"><span class="select2-selection__choice__remove" role="presentation">×</span><?php echo $value;?></li>').insertBefore('.select2-search');
          <?php
        }
        ?>
    });
        </script>
    </body>
</html>
