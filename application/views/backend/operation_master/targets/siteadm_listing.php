<!DOCTYPE html>
<?php
//$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;
//$page = $_SERVER['PHP_SELF'];
//$sec = "10";
?>
<html lang="en">
    <head>
<!--        <meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $url ?>'">-->
    </head>
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php
    echo $header_link;
    $ci = &get_instance();
    ?>
    <!-- END HEAD -->
    <link href="<?php echo $assets_path; ?>pages/css/ajaxloader.css" rel="stylesheet" type="text/css" />
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
                    <?php //echo $breadcrumb;  ?>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                <a href="#">Module 2</a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Super Master Contacts</span>
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
                                        <span class="caption-subject bold uppercase">Master Contact List</span>
                                    </div>


                                </div>
                                <div class="portlet-body" id="auto_load_div">

                                    <span style="  margin-bottom: 10px; text-align: right; display: inline-block">
                                        <button style= "text-align: left;" class="btn btn-transparent dark btn-outline btn-circle active" type="button" id="add_new_master_contact">Add New Master Contact</button>
                                    </span>
                                    <span style="  margin-bottom: 10px; text-align: right; display: inline-block">
                                        <!--<button class="btn btn-transparent dark btn-outline btn-circle active" type="button" id="add_import">Import</button>-->

                                        <button type="button" class="btn btn-transparent dark btn-outline btn-circle active" data-toggle="modal" data-target="#add_import">Import</button>
                                        <a href="<?php echo base_url(); ?>targets"class="btn btn-transparent dark btn-outline btn-circle active">Show All</a>
                                    </span>
                                    <form name="frmSearch" id="frmSearch" method="post" action="<?php echo base_url(); ?>targets/search_data" >
                                        <div class="row" style=" margin-bottom: 15px;">
                                            <div class="col-md-2">
                                                <input class="form-control" type="text" name="search_by_postcode" id="search_by_postcode" placeholder="Enter Postcode" value="<?php echo set_value('search_by_postcode', $ci->session->userdata('current_client')); ?>" />

                                            </div>

                                            <div class="col-md-2">
                                                <select class="form-control" name="search_by_postcode_group" id="search_by_postcode_group" />
                                                    <option value="">Select Group</option>
                                                    <?php foreach ($postcode_group as $key => $value) {
                                                    ?>
                                                        <option value="<?php echo $value['group_contains']; ?>" <?php echo set_select('search_by_postcode_group', $value['group_contains'], TRUE); ?>><?php echo $value['group_name']; ?>
                                                            
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>

                                            </div>

                                            <div class="col-md-2">
                                                <select class="form-control" name="search_by_industry_type" id="search_by_industry_type" style="width:100%;" />
                                                    <option value="">Select Industry Type</option>
                                                    <?php foreach ($industry_type_list as $key => $value) {
                                                    ?>
                                                        <option value="<?php echo $value['industry_type_seq_no']; ?>" <?php echo set_select('search_by_industry_type', $value['industry_type_seq_no'], TRUE); ?>><?php echo $value['type_name']; ?>
                                                            
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>

                                            </div>

                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-transparent dark btn-outline btn-circle active" id="btnSearch">Search</button>

                                            </div>

                                        </div>
                                        
                                        
                                        
                                        
                                        

                                        
                                    </form>
                                      <!--<span style=" margin-bottom: 10px; text-align: right; display: inline-block">
                                                  <button class="btn btn-transparent dark btn-outline btn-circle active" type="button" id="send_request">Send Request</button>
                                      </span>-->

                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>

                                                <th> Name </th>
                                                <th> Email</th>
                                                <th> Company Name </th>
                                                <th> Phone Number </th>
                                                <th> Mobile Number </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $SlNo = 1;
                                            foreach ($fetch_details_master_contacts as $key => $value) {
                                                ?>
                                                <tr style=" cursor: pointer" onclick="javascript:window.location.href = '<?php if (!empty($fetch_temporary_details)) {
                                                    
                                                } else {
                                                    echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']);
                                            } ?>'">
                                                    <td> <?php echo $SlNo++; ?>  <?php if (!empty($fetch_temporary_details)) { ?> <span style="color:red" class="glyphicon glyphicon-lock"></span> <?php } ?> </td>
    <?php //if($role_code=='SITEADM'){  ?>
                                                    <!--<td> <?php echo $value['firm_name']; ?> </td>-->
    <?php //}  ?>
                                                    <!--<td><a href="<?php echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']); ?>"> <?php if ($value['target_first_name'] == '' && $value['target_last_name'] == '') echo "no data";
    else echo $value['target_first_name'] . ' ' . $value['target_last_name']; ?></a></td>-->
                                                    <td>  <?php echo $value['target_first_name'] . ' ' . $value['target_last_name']; ?></td>
                                                    <td>  <?php echo $value['email']; ?></td>
                                                    <td  > <?php echo $value['company']; ?> </td>
                                                    <td> <?php echo $value['phone']; ?> </td>
                                                    <td> <?php echo ($value['mobile'] ? $value['mobile'] : 'N/A'); ?> </td>
                                                </tr>
<?php } ?>

                                        </tbody>
                                    </table>


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
            <!---------IMPORT EXCEL FORM---------->
            <div id="responsive_file" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Import Targets</h4>
                        </div>
                        <form autocomplete="off" name="import_target_form" id="import_target_form" action="<?php echo $base_url; ?>targets/contacts_import" method="post" enctype="multipart/form-data">

                            <div class="modal-body">
                                <div class="scroller" style="height:100px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if ($role_code == 'FIRMADM') { ?>
                                                <!--                                            <div class="form-group required">
                                                                                                <label class="col-md-4 control-label">Attorney:</label>
                                                                                                <div class="col-md-8">
                                                                                                    <select class="form-control"  name="attorney_seq_no">
                                                                                                        <option value="">Select One</option>
    <?php foreach ($all_attr as $key => $value) {
        ?>
                                                                                                                <option value="<?php echo $value['attorney_seq_no']; ?>"><?php echo $value['attorney_first_name'] . ' ' . $value['attorney_last_name']; ?></option>
    <?php } ?>
                                                                                                    </select>
                                                                                                    <span class="help-block"> </span>
                                                                                                </div>
                                                                                            </div>-->
<?php } ?>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">File</label>
                                                <div class="col-md-8">
                                                    <input style=" border:none; padding-top: 0;" type="file" class="form-control" name="xls_file" id="xls_file" required="">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" name="import_target_submit" id="import_target_submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->

        </div>


        <div class="modal fade" id="add_new_master_contact_module" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add New Super Master Contacts</b></div>
                    </div>
                    <div class="modal-body">
                        <div id="create_event" class=" mt10">
                            <div class="col-md-12">
                                <form name="frmAddNewContact1" id="frmAddNewContact1" method="POST" novalidate="novalidate" enctype="multipart/form-data">

                              <!-- <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo base64_encode($targets['target_seq_no']); ?>"> -->
                                    <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo $firm_seq_no; ?>">

                                    <div class="form-group">
                                        <div style="width: 100%"><label>First Name</label></div>
                                        <div class="input-group" style="width: 100%;">
                                            <input style="color: black; font-size: 14px;" type="text" name="new_contact_first_name" id="new_contact_first_name" class="form-control text-area required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="width: 100%"><label>Last Name</label></div>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" name="new_contact_last_name" id="new_contact_last_name" class="form-control text-area">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="width: 100%"><label>Email</label></div>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" name="new_contact_email" id="new_contact_email" class="form-control text-area">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="width: 100%"><label style=" width: 100%; display: inline-block">Phone</label></div>
                                        <input type="text" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">
                                        <input type="text" name="new_contact_phone" id="new_contact_phone" class="form-control text-area" style="width: 85%; margin-left: -5px; display: inline-block">
                                        <label id="country_code1-error" class="error" for="country_code1"></label>
                                        <label id="phone-error" class="customErrorClass" for="phone"></label>
                                    </div>
                                    <div class="form-group">
                                        <div style="width: 100%"><label style=" width: 100%; display: inline-block">Mobile</label></div>
                                        <input type="text" placeholder="" class="form-control" id="country_code2" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">
                                        <input type="text" name="new_contact_mobile" id="new_contact_mobile" class="form-control text-area" style="width: 85%; margin-left: -5px; display: inline-block">
                                       
                                    </div>
                                    <div class="form-group">
                                        <div style="width: 100%"><label>Address</label></div>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" name="new_contact_address" id="new_contact_address" class="form-control text-area">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="width: 100%"><label>Company Name</label></div>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" name="new_contact_company" id="new_contact_company" class="form-control text-area">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="width: 100%"><label>Categories</label></div>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="text" name="new_contact_category" id="new_contact_category" class="form-control text-area">
                                        </div>

                                    </div>
                                    <!--<div class="form-group">
                                      <div style="width: 100%"><label>Date Contacted</label></div>
                                      <div class="input-group" style="width: 100%;">
                                        <input type="text" name="new_contact_date" id="new_contact_date" class="form-control text-area" value="<?php echo date("d-m-Y"); ?>" readonly="readonly">
                                      </div>
          
                                    </div>-->
                                    <div class="form-group">
                                        <div style="width: 100%"><label>Image</label></div>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="file" name="new_contact_image" id="new_contact_image" class="form-control text-area">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label  class="control-label input-group">Contact Type</label>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label for="contact_type" class="btn btn-default active">
                                                <input type="radio" name="new_contact_type"  id="new_contact_type" value="I">Individual
                                            </label>
                                            <label for="contact_type" class="btn btn-default">
                                                <input type="radio" name="new_contact_type" id="new_contact_type" value="C">Corporate
                                            </label>
                                        </div>
                                        <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >
                                        <label id="new_contact_type-error" class="error" for="new_contact_type"></label>
                                        <label id="phone-error" class="customErrorClass" for="phone"></label>
                                    </div>
                                    <input type="button" value="Submit" class="submit btn green pull-left" name="submit" id="submit" >
                                </form>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                        <div class="input-group col-md-12 pull-right" style="padding-left:10px">

                          <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><!-- <img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font> --></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="add_import" class="modal fade" role="dialog">

            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="modal-title"><span style=" color:#333" class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b style=" color:#333">Add New Super Master Contacts</b></div>
                    </div>
                    <div class="modal-body">
                        <div id="create_event_import" class=" mt10">
                            <div class="col-md-12" id="">
                                <form name="frmAddNewContact2" id="frmAddNewContact2" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                    <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo $firm_seq_no; ?>">
                                    <div class="form-group" style=" color:#333">
                                        <div style="width: 16%; padding-top: 5px; display: inline-block"><label>Select Industry Type</label></div>
                                        <div class="input-group" style="width: 80%; display: inline-block">
                                            <select name="industry_type_seq_no" id="industry_type_seq_no" class="form-control">
                                                <option value="">Select Any</option>
<?php foreach ($industry_type_list as $key => $value) {
    ?>
                                                    <option value="<?php echo $value['industry_type_seq_no']; ?>"><?php echo $value['type_name']; ?></option>
    <?php
}
?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group" style=" color:#333">
                                        <div style="width: 16%; padding-top: 5px; display: inline-block"><label>Import File</label></div>
                                        <div class="input-group" style="width: 80%; display: inline-block">
                                            <input type="file" name="upload_excel"  id="upload_excel" size="50">
                                        </div>

                                    </div>
                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >
                                    <input type="button" value="Upload" class="submit btn green pull-left" name="submit1" id="submit1" >

                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="modal-footer">

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
        <style>
            .portlet.light .dataTables_wrapper .dt-buttons {
                margin-top: -44px;
            }
            .dropdown-menu {
                box-shadow: 5px 5px rgba(102,102,102,.1);
                left: -109px;
                min-width: 175px;
                position: absolute;
                z-index: 1000;
                display: none;
                float: left;
                list-style: none;
                padding: 0;
                background-color: #fff;
                margin: 10px 0 0;
                border: 1px solid #eee;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
                border-radius: 4px;
            }

            .btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {
                position: absolute;
                top: -7px;
                right: 10px !important;
                left: auto;
                display: inline-block !important;
                border-right: 7px solid transparent;
                border-bottom: 7px solid #fff;
                border-left: 7px solid transparent;
                content: '';
            }

            .btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {
                position: absolute;
                top: -8px;
                right: 7px;
                left:auto;
                display: inline-block !important;
                border-right: 8px solid transparent;
                border-bottom: 8px solid #e0e0e0;
                border-left: 8px solid transparent;
                content: '';
            }
            .table-scrollable .dataTable td .btn-group, .table-scrollable .dataTable th .btn-group {
                position: relative;
                margin-top: -2px;
                display: inline-table;
                left: auto;
            }

            table.dataTable {
                width: 100%;
                margin: 0 auto;
                clear: both;
                border-collapse: separate;
                border-spacing: 0;
                padding-bottom: 80px;
            }

            .table-scrollable>.table-bordered>tbody>tr:last-child>td {
                border-bottom: 1px solid #e7ecf1;
            }
            .form-group .required{ padding:6px 12px }

        </style>

        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/jquery.ajaxloader.1.5.1.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(window).load(function() {
    //          $("#loader_image").hide();
                $('#loader_image').delay(2000).fadeOut(1000)
            });

            var FormInputMask = function() {

                var handleInputMasks = function() {

                    $("#new_contact_phone").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });

                    $("#new_contact_mobile").inputmask("mask", {
                        "mask": "(0)9999 999999"
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


        <script type="text/javascript">

            jQuery(document).ready(function() {

              jQuery('#country_code1').keyup(function () {
                  this.value = this.value.replace(/[^0-9\+]/g,'');
              });

              jQuery('#country_code2').keyup(function () {
                  this.value = this.value.replace(/[^0-9\+]/g,'');
              });

                $("#add_new_master_contact").click(function(e) {
                    $("#add_new_master_contact_module").modal('show');
                });
                $("#submit").click(function(e) {
                    $("#frmAddNewContact1").submit();

                    var valid = $('#frmAddNewContact1').valid();
                    // var form = $('#frmAddNewContact1').serialize();
                    if (valid) {
                        var data = $("#frmAddNewContact1").get(0);
                        var form_data = new FormData(data);
                        $.ajax({
                            type: "POST",
                            url: BASE_URL + "targets/add_super_master_contact",
                            //alert (url);
                            //  data: formData,
                            data: form_data,
                            processData: false,
                            contentType: false,

                            beforeSend: function () {

                                    $("#frmAddNewContact1").ajaxloader('show');

                            },
                            success: function(response) {
                                $("#frmAddNewContact1").ajaxloader('hide');
                                /*alert(response);
                                console.log(response);*/
                                if (response == 1)
                                {
                                    jconfirm({

                                            title: 'Confirmation !',

                                            content: "Super master contact is added successfully",

                                            buttons: {

                                                OK: function () {

                                                    window.location.reload();

                                                }

                                            }

                                        });
                                }
                                if (response == '2')
                                {
                                    alert('Email is already Exits');
                                }

                                //alert(response);
                                //console.log(response);
                            },
                            error: function(errResponse) {
                                console.log(errResponse);
                            }
                        });


                    }
                });

                //for space prevent
                jQuery.validator.addMethod("noSpace", function(value, element) {
                    return value.trim();
                }, "No space please and don't leave it empty");
                //end

                jQuery("#frmAddNewContact1").validate({
                    rules: {
                        new_contact_first_name: {
                            required: true,
                            noSpace: true
                        },
                        new_contact_last_name: {
                            required: true,
                            noSpace: true
                        },
                        new_contact_email: {
                            required: true,
                            email: true,
                            noSpace: true
                        },
                        /*new_contact_mobile: {
                            //number: true,
                            minlength: 10,
                            maxlength: 10,
                            //noSpace: true
                                    //required: true,
                                    //email: true
                        },*/
                        new_contact_phone: {
                            required: true,
                            noSpace: true
                                    //number: true
                        },
                        country_code1: {
                          required: true,
                          maxlength: 3
                        },
                        country_code2: {
                          maxlength: 3
                        },
                        new_contact_address: {
                            required: true,
                            noSpace: true
                        },
                        new_contact_company: {
                            required: true,
                            noSpace: true
                        },
                        new_contact_category: {
                            required: true,
                            noSpace: true
                        },
                        new_contact_date: {
                            required: true,
                            noSpace: true
                        },
                        new_contact_image: {
                            accept: "jpg,png,jpeg,gif"
                        },
                        new_contact_type: {
                            required: true
                        }
                    },
                    messages: {
                        new_contact_first_name: {
                            required: "<font color=\"red\">Please enter first name</font>",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                        },
                        new_contact_last_name: {
                            required: "<font color=\"red\">Please enter last name</font>",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                        },
                        new_contact_email: {
                            required: "<font color=\"red\">Please enter email id</font>",
                            email: "<font color=\"red\">Please enter valid email id</font>",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                        },
                        /*new_contact_mobile: {
                            //number: "<font color=\"red\">Please enter the number only</font>",
                            minlength: "<font color=\"red\">Please enter the 10digits number</font>",
                            maxlength: "<font color=\"red\">Please enter the 10digits number</font>",
                            //noSpace: "<font color=\"red\">Space not allowed</font>"
                        },*/
                        new_contact_phone: {
                            required: "<font color=\"red\">Please enter phone no</font>",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                                    // number: "<font color=\"red\">Please enter the Number</font>"
                        },
                        country_code1: {
                          required: "<font color=\"red\">Please enter country code</font>",
                          maxlength: "<font color=\"red\">Maximum 3 digits allowed.</font>",
                        },
                        country_code2: {
                          maxlength: "<font color=\"red\">Maximum 3 digits allowed.</font>",
                        },
                        new_contact_address: {
                            required: "<font color=\"red\">Please enter address</font>",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                        },
                        new_contact_company: {
                            required: "<font color=\"red\">Please enter company name</font>",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                        },
                        new_contact_category: {
                            required: "<font color=\"red\">Please enter category</font>",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                        },
                        new_contact_date: {
                            required: "<font color=\"red\">Please enter contact date",
                            noSpace: "<font color=\"red\">Space not allowed</font>"
                        },
                        new_contact_image: {
                            accept: "<font color=\"red\">Only image type jpg/png/jpeg/gif is allowed</font>"
                        },
                        new_contact_type: {
                            required: "<font color=\"red\">Select one type</font>"
                        }
                    },
                    submitHandler: function(form) {

                        // form.submit();
                    }

                });
                $('#submit1').on('click', function() {
                    $("#frmAddNewContact2").submit();
                });
                $("#frmAddNewContact2").validate({
                    rules: {
                        industry_type_seq_no: {
                            required: true
                        },
                        upload_excel: {
                            required: true,
                            extension: "xls|xlsx"
                        }
                    },
                    messages: {
                        industry_type_seq_no: {
                            required: "<font color=\"red\">Please select industry type</font>"
                        },
                        upload_excel: {
                            required: "<font color=\"red\">Please upload file</font>",
                            extension: "<font color=\"red\">File type must be excel</font>"
                        }
                    },
                    submitHandler: function(form) {
                        var form_data = new FormData($("#frmAddNewContact2").get(0));
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>targets/import_file",
                            data: form_data,
                            processData: false,
                            contentType: false,
                            beforeSend: function() {
                                $("#create_event_import").find('img').css('display', 'block');
                                $("#submit1").prop('disabled', true);
                            },
                            success: function(response) {
                                var obj = $.parseJSON(response);
                                if (obj.status == 1) {
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: obj.msg,
                                        buttons: {
                                            OK: function() {
                                                window.location.href = "<?php echo base_url(); ?>targets";
                                            }
                                        }
                                    });
                                }
                                else {
                                    jconfirm({
                                        title: 'Alert!',
                                        content: obj.msg,
                                        buttons: {
                                            OK: function() {
                                                //window.location.href = "<?php echo base_url(); ?>targets";
                                            }
                                        }
                                    });
                                }
                                $("#create_event").find('img').css('display', 'none');
                                $("#submit1").prop('disabled', false);
                            },
                            error: function(xhr) {
                                jconfirm({
                                    title: 'Alert!',
                                    content: 'Try Again.',
                                    buttons: {
                                        OK: function() {
                                            //window.location.href = "<?php echo base_url(); ?>targets";
                                        }
                                    }
                                });
                                $("#create_event").find('img').css('display', 'none');
                                $("#submit1").prop('disabled', false);
                            }
                        });
                    }
                });


            });

        </script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.15/api/fnReloadAjax.js"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
        <script type="text/javascript">
            $(function() {
                $("#search_by_postcode").autocomplete({
                    minLength: 2,
                    source: "<?php echo base_url(); ?>targets/populate_postcode",
                    response: function(event, ui) {

                    },
                    select: function(event, ui) {
                        event.preventDefault();

                        $("#search_by_postcode").val(ui.item.value);

                    }
                });
                $("#btnSearch").click(function() {
                    $("#frmSearch").submit();
                });
            });
        </script>
    </body>

</html>