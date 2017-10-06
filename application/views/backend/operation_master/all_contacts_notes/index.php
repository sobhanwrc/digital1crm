<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->
    <?php //print_r  ($categories); die(); ?>
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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="#">Reports</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                 <a href="#">Manage Call User</a>
                                 <i class="fa fa-circle"></i> 
                             </li> -->
                            <li>
                                <span>All contacts notes reports</span>
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
                                        <span class="caption-subject bold uppercase">Showing all contacts of firm</span>
                                    </div>

                                    <?php echo $this->session->flashdata('err_message'); ?>
                                    <?php echo $this->session->flashdata('succ_msg'); ?>

                                </div>
                                <div class="portlet-body">

                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                        <th> SL# </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Industry Name </th>
                                        <th> Industry  Type </th>
                                        <th> Phone Number </th>
                                        <th> Showing all notes </th>
                                        <!--<th> Actions </th>-->
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <?php
//                                            $i = 0;  t($firms); die();
                                            foreach ($firms as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td> <?php echo ++$i; ?> </td>
                                                    <?php if ($role_code == 'SITEADM') { ?>
                                                        <td> <?php echo $value['firm_name']; ?> </td>
                                                    <?php } ?>
                                                    <td> <?php echo $value['target_first_name'] . ' ' . $value['target_last_name']; ?></td>
            <!--                                        <td> <?php //if($value['attorney_gender'] == '122'){ echo 'Male'; }else if($value['attorney_gender'] == '123') { echo 'Female'; } else if($value['attorney_gender'] == '124') { echo 'Other'; }       ?> </td>-->
                                                    <td> <?php echo $value['email']; ?> </td>
                                                    <td> <?php echo $value['company']; ?> </td><!--
                                                    <td> <?php //echo $value['bar_registration_no'];       ?> </td>-->
                                                    <td> <?php echo $value['type']; ?> </td>
                                                    <td> <?php echo $value['phone']; ?> </td>
                                                    <td><a href="<?php echo $base_url; ?>all_contact_notes/show_all_notes/<?php echo base64_encode($value['target_seq_no']);?>">All notes</a></td>
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


            <!-- END QUICK SIDEBAR -->

        </div>

        <!---------------------- Modal-santanu-21.04.17 --------->

        <div id="add_category" class="modal fade" role="dialog">

            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="modal-title"><span style=" color:#333" class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b style=" color:#333">Add New Category  Contacts</b></div>
                    </div>
                    <div class="modal-body">
                        <div id="create_event" class=" mt10">
                            <div class="col-md-12">
                                <form name="form1" id="form1" method="POST" novalidate enctype="multipart/form-data">

    <!-- <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo base64_encode($targets['target_seq_no']); ?>"> -->
                                    <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo $firm_seq_no; ?>">




                                    <div class="form-group" style=" color:#333">
                                        <div style="width: 16%; padding-top: 5px; display: inline-block"><label>Category</label></div>
                                        <div style="width: 80%; display: inline-block">

                                            <div class="form-group">
                                                <select class="form-control" name="category" id="category">
                                                    <option value="">Select</option>
                                                    <?php foreach ($categories as $key => $categoriesVal) { ?>
                                                        <option value="<?php echo $categoriesVal['industry_type_seq_no']; ?>"><?php echo $categoriesVal['type_name']; ?></option>
                                                    <?php } ?> 
                                                </select>

                                            </div> 
                                        </div>

                                    </div>

                                    <div class="form-group" style=" color:#333">
                                        <div style="width: 16%; padding-top: 5px; display: inline-block"><label>Submit Date</label></div>
                                        <div class="input-group" style="width: 80%; display: inline-block">
                                            <input   class="form-control" name="submit_date" id="submit_date" placeholder="DD-MM-YYYY" type="text" readonly>
                                             <!-- <input   class="form-control" name="submit_date" id="submit_date" placeholder="DD-MM-YYYY" type="text"> -->
                                        </div>

                                    </div>
                                    <!-- <input style=" color:#fff" type="button" value="Submit" class="submit btn bg-purple pull-left" name="submit1" id="submit1" > -->
                                    <div class=" col-md-12">
                                        <input style=" color:#fff" type="button" value="Submit" class="submit btn green pull-right" name="submit1" id="submit1" >
                                    </div>  
                                </form>
                            </div>
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

        <!----------------------   End ----------------->
        <!--        //sobhan implement new import contact//-->
        <div class="modal fade" id="import_contact" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <form name="upload_contacts_form" autocomplete="off" id="upload_contacts_form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <div class="modal-title"><span style="color:#333" class="glyphicon glyphicon-pencil mr10"></span><b style="color:#333"> Upload Contacts</b></div>
                        </div>

                        <div class="row">    
                            <div class="input-group col-md-12" style="padding-left:10px">
                                <a style="padding-left: 20px; margin-top: 5px; display: inline-block; margin-left: 18px; background: #21daf0; color:#000"  href="<?php echo $base_url; ?>contacts_list/export_digital1crm_names_upload" id="" class="btn pull-left">Download Upload Contacts Template</a>
                                <span style="color:#ff0000; font-size: 11px; margin-top: 7px; margin-left: 18px; display: inline-block;">* before browse the file, you should download the template and fill with the data and then upload !</span>
                            </div>
                        </div>

                        <div class="modal-body" style=" display: inline-block; width: 100%">
                            <div id="create_event" class=" mt10">
                                <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                    <label class="col-md-1" for="comment" style="padding-right: 0; padding-left: 0; color:#333">File</label>
                                    <div class="form-group col-md-9" style="color:#333">

                                        <input type="file" name="upload_file" id="">
                                        <!--<input type="hidden" class="input-lg" id="filetype" name="filetype" value="upload_">-->
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                            <div class="input-group col-md-12 pull-right" style="padding-right:15px">
                                <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel" name="" id="">
                                <input type="button" value="Submit" class="submit btn green pull-right" name="import_contacts_submit" id="import_contacts_submit" >
                                <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        
        <!--//Add contact manually--> 
        <!-- Make Appointment Modal -->

            <div class="modal fade" id="appointment_date_and_time_div" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <form name="appointment_date_time_form" id="appointment_date_time_form" method="post" novalidate>

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> Add Contact</b></div>

                            </div>

                            <div class="modal-body" style=" display: inline-block; width: 100%">

                                <div id="create_event" class=" mt10">

                                    <!--<div style="width: 100%"><label> Appointment Date & Time</label></div>-->

                                    <div class="col-md-6" style=" padding-left: 0;">

                                        <div style="width: 100%"><label>Name</label></div>

                                        <div class="input-group " style="width: 100%">
                                            <input type="text" name="name" value="" placeholder="" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md-6" style=" padding-right: 0">

                                        <div style="width: 100%"><label>Email</label></div>

                                        <div class="input-group " style="width: 100%">
                                             <input type="text" name="email" value="" placeholder="" class="form-control"> 
                                        </div>

                                    </div>



                                    <div class=" col-md-6">
                                        <label class="" style=" width: 100%; display: inline-block">Phone</label>
                                        <input type="text" value="<?php echo $country_code_1; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 25%; display: inline-block">
                                        <input type="text" placeholder="Phone1" class="form-control"  name="phone1" id="phone1" value="<?php if(isset($attorney_edt[0]['phone1'])) {echo $phone_1;}  ?>" style="width: 75%; margin-left: -5px; display: inline-block"/>

                                        <label id="country_code1-error" class="error" for="country_code1"></label>
                                        <label id="phone1-error" class="error" for="phone1"></label>
                                    </div>

                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >

                                </div>

                            </div>

                            <div class="modal-footer">

                                <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                                <div class="input-group col-md-12" style="padding-right:15px">

                                    <input style=" margin-left: 15px" type="reset" value="Reset" class="submit btn green pull-right cancel" name="" id="">

                                    <input type="button" value="Submit" class="submit btn green pull-right" name="appointment_made_submit" id="appointment_made_submit" >

                                    <div id="master_name_submit_loader" style="display:none; padding-left:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- End Modal -->
<!--        //end-->
        <!--        //end-->
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <?php echo $footer_link; ?>
        <style>
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

            .portlet.light .dataTables_wrapper .dt-buttons {
                margin-top: -38px;
            }

        </style>
        <script src="http://jonthornton.github.io/Datepair.js/dist/datepair.js"></script>
        <script src="http://jonthornton.github.io/Datepair.js/dist/jquery.datepair.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>



        <script type="text/javascript">
            jQuery(document).ready(function() {
                
                $('#examplecBox0').on('click', function () {
                    if ($("#examplecBox0").prop('checked') == true) {
                        $('.myCheckbox').prop('checked', true);
                    } else {
                        $('.myCheckbox').prop('checked', false);
                    }

                });

                $('#all_item').on('click', function () {
                    $('.myCheckbox').prop('checked', true);
                });
                $("#f_5").on("click", function () {
                    $('.myCheckbox').prop('checked', false);
                    var checkBoxes = $("#datatable1 tr td :checkbox:lt(5)");//using :lt get first 5 checkboxes
                    $(checkBoxes).prop("checked", !checkBoxes.prop("checked"));//change checkbox status based on check/uncheck
                });

                $("#f_10").on("click", function () {
                    $('.myCheckbox').prop('checked', false);
                    var checkBoxes = $("#datatable1 tr td :checkbox:lt(10)");//using :lt get first 5 checkboxes
                    $(checkBoxes).prop("checked", !checkBoxes.prop("checked"));//change checkbox status based on check/uncheck
                });
                
                $('#send_invite').on('click',function(){
                    var checked_ids = [];
                    $("input[name='check[]']:checked").each(function (i) {
                        checked_ids[i] = $(this).val();
                    });
                    checked_ids = JSON.stringify(checked_ids);
                    checked_ids = JSON.parse(checked_ids);
                    
                    var checked_ids_length = $("input[name='check[]']:checked").length;
                    
                    if(checked_ids_length > 0){
                        $.ajax({
                            type:"POST",
                            url:BASE_URL + "Twilio/test",
                            data:{
                                checked_ids: checked_ids,
                            },
                            success: function(data){
                                if(data == 1){
                                    jconfirm({
                                        title: 'Success!',
                                        content: 'Invitation sent successfully.',
                                        buttons: {
                                            OK: function() {
                                                window.location.href = BASE_URL + 'contacts_list';
                                            }
                                        }
                                    });
                                    return false;
                                }
                                if(data == 0){
                                    jconfirm({
                                        title: 'Alert!',
                                        content: 'Invitation sent failed.',
                                        buttons: {
                                            OK: function() {
                                                window.location.href = BASE_URL + 'contacts_list';
                                            }
                                        }
                                    });
                                    return false;
                                }
                            }
                        });
                    }else{
                        jconfirm({
                            title: 'Notification:',
                            content: 'To use the Send feature, first select the contact(s) you want to send.  Please select at least one contact.',
                            confirmButton: 'Ok'
                        });
                        return false;
                    }
                });

                $('#submit_date').datepicker({
                    'format': 'dd-mm-yyyy',
                    //format: 'mm/dd/yyyy',
                    startDate: '0d',
                    'autoclose': true
                });

                $("#submit1").click(function(e) {
                    $("#form1").submit();
                    var valid = $('#form1').valid();
                    var firm_seq_no = $('#firm_seq_no').val();
                    var category = $('#category').val();
                    var submit_date = $('#submit_date').val();
                    if (valid) {
                        $.ajax({
                            type: "POST",
                            url: BASE_URL + "contacts_list/category_insert",
                            data: {
                                firm_seq_no: firm_seq_no,
                                category: category,
                                submit_date: submit_date
                            },
                            success: function(data) {
                                if (data == '1') {
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "Request sent  sucessfully",
                                        buttons: {
                                            OK: function() {
                                                window.location.href = BASE_URL + 'contacts_list';
                                                //   $('#add_category1').prop('disabled', true);
                                            }
                                        }
                                    });
                                }
                                else if (data == '2') {
                                    jconfirm({
                                        title: 'Alert!',
                                        content: "You already request for this type of contacts",
                                        buttons: {
                                            OK: function() {
                                                //window.location.href = BASE_URL + 'contacts_list';
                                                //   $('#add_category1').prop('disabled', true);
                                            }
                                        }
                                    });
                                }
                                else {
                                    jconfirm({
                                        title: 'Alert!',
                                        content: "Contacts not found based on selected category. Try different category",
                                        buttons: {
                                            OK: function() {
                                                //window.location.href = BASE_URL + 'contacts_list';
                                                //   $('#add_category1').prop('disabled', true);
                                            }
                                        }
                                    });
                                }
                            }

                        });

                    }

                });


                $("#download_contact").click(function(e) {
                    //alert("aaaa");
                    var category1 = $(this).data('industry-id');
                    var id = $(this).data('id');
                    //alert(category1);
                    $.ajax({
                        type: "POST",
                        url: BASE_URL + "contacts_list/download_contacts",
                        data: {
                            category1: category1,
                            id: id
                        },
                        success: function(data) {

                            //alert(data);
                            if (data == '1') {
                                jconfirm({
                                    title: 'Confirmation!',
                                    content: "Request is downloaded sucessfully",
                                    buttons: {
                                        OK: function() {
                                            window.location.href = BASE_URL + 'contacts_list';
                                            //   $('#add_category1').prop('disabled', true);
                                        }
                                    }
                                });
                            }
                            else
                            {
                                jconfirm({
                                    title: 'Confirmation!',
                                    content: "Contact list of such category is not found",
                                    buttons: {
                                        OK: function() {
                                            window.location.href = BASE_URL + 'contacts_list';
                                            //   $('#add_category1').prop('disabled', true);
                                        }
                                    }
                                });
                            }
                        }

                    });
                });

                $("#form1").validate({
                    rules: {
                        category: {
                            required: true
                        },
                        submit_date: {
                            required: true
                        }

                    },
                    messages: {
                        category: {
                            required: "<font color=\"red\">Please enter category</font>"
                        },
                        submit_date: {
                            required: "<font color=\"red\">Please enter Submit Date</font>"
                        }

                    },
                    submitHandler: function(form) {
                        //form.submit();
                    }

                });

                $("#upload_contacts_form").validate({
                    rules: {
                        upload_file: {
                            required: true
                        }
                    },
                    messages: {
                        upload_file: {
                            required: "<font color=\"red\">Please select upload template</font>"
                        }
                    }
                });

                $("#import_contacts_submit").on('click', function() {
                    $('.btn').attr('disabled', 'disabled');
                    var valid = $("#upload_contacts_form").valid();
                    if (valid) {
                        var data = new FormData($('#upload_contacts_form')[0]);
                        var url = BASE_URL + "contacts_list/upload_new_contacts";
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: data,
                            mimeType: "multipart/form-data",
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                                //alert (data);
                                if (data) {
                                    jconfirm({
                                        title: 'Confirmation !',
                                        content: data,
                                        buttons: {
                                            OK: function() {
                                                window.location.reload();
                                            }
                                        }
                                    });
                                }
                            }
                        });
                        //$("#upload_contacts_form").submit();
                    }
                });
                
                var FormInputMask = function () {



                    var handleInputMasks = function () {

                        $("#phone1").inputmask("mask", {

                            "mask": "(0)9999 999999"

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
                
                jQuery('#country_code1').keyup(function () {
                    this.value = this.value.replace(/[^0-9\+]/g,'');
                });
                
                $('#appointment_date_time_form').validate({
                    rules:{
                        name:{
                            required: true
                        },
                        email:{
                            required: true
                        },
                        phone1:{
                            required: true,
                            accept: "[0-9-\(\)]+"
                        },
                        country_code1:{
                            required: true,
                            maxlength: 3,
                        }
                    },
                    messages:{
                        name:{
                            required: "<font color=\"red\">Please enter name</font>"
                        },
                        email:{
                            required: "<font color=\"red\">Please enter email </font>"
                        },
                        phone1:{
                            required: "<font color=\"red\">Please enter phone number </font>"
                        },
                        country_code1:{
                            required:"Please enter your country code",
                            maxlength: "Maximum 3 digits allowed"
                        }
                    }
                });
                
                $('#appointment_made_submit').on('click',function(){
                    var valid = $('#appointment_date_time_form').valid();
                    if(valid){
                        var name = $('#name').val();
                        alert (name);
                        return false;
                        var phone = $('#phone1').val();
                        var country_code = $('#country_code1').val();
                        var email = $('#email').val();
                        $.ajax({
                            type: "post",
                            url: BASE_URL + "Contacts_list/add_new_contacts",
                            data:{
                                name: name,
                                phone: phone,
                                country_code: country_code,
                                email: email
                            },
                            success: function (data){
                                if(data == 1){
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "Contact added successfully",
                                        buttons: {
                                            OK: function () {
                                                window.location.href = "<?php echo base_url(); ?>Contacts_list";
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }
                });


            });
        </script>
    </body>

</html> 