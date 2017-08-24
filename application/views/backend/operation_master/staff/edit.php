<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Staff</a>
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
                        <span class="caption-subject bold uppercase">Add Employee/Staff</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn dark btn-outline btn-circle  active">
                                <input type="radio" name="options" class="toggle" id="option1"><a href="javascript:void(0)" style=" color:#fff; text-decoration: none;" onclick="history.back()">Back</a></label>
                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                        </div>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="add_form_sec">
                            <form role="form" autocomplete="off" id="add_new_wmployee_frm" method="post" action="<?php echo base_url();?>employee/edit" enctype="multipart/form-data">
                            <input type="hidden" name="user_seq_no" value="<?php echo base64_encode($employee_details[0]->user_seq_no);?>">
                            <input type="hidden" name="attorney_seq_no" value="<?php echo base64_encode($employee_details[0]->attorney_seq_no);?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                    <!--<div class="col-md-6">-->
                                        
                                        <!--<div style=" width: 100%; display:  inline-block;">-->
                                            <!--<div class="col-md-12">-->
                                                 <!--<h3 class="hint"> Employment Information </h3>--> 
                                                 <h3 class="hint"> Add Digital1CRM Staff  </h3>
                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="first_name" id="first_name"  value="<?php echo $employee_details[0]->attorney_first_name;?>"/> </div>

                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo $employee_details[0]->attorney_last_name;?>"  /> </div>
                                                
                                            <div class="form-group">
                                                <label class="control-label">Email (Username)</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email_appointment_user" id="email_appointment_user" value="<?php echo $employee_details[0]->user_id;?>"  />  </div>
                                                  
                                                
                                            
                                                
                                             <div class="form-group">
                                                <label class="control-label">Mobile</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile_appointment_user" id="mobile_appointment_user" value="<?php echo $employee_details[0]->mobile;?>"  /> </div>
                                                   
                                              <div class="form-group">
                                                  <label style=" width: 100%; display:inline-block; " class="control-label">Phone1</label>
                                                
                                                <?php
                                                $country_code = substr($employee_details[0]->phone1, 0,3);
                                                $phone1 = substr($employee_details[0]->phone1, 5);
                                                ?>
                                                <div style=" width: 18%; display: inline-block;"><input type="text" value="<?php echo $country_code;?>" placeholder="" class="form-control" id="digital1_staff_country_code" name="digital1_staff_country_code" autocomplete="off" ></div>
                                                
                                                <div style="margin-left: -10px; width: 83%; display: inline-block;"><input class="form-control placeholder-no-fix" type="text" placeholder="Phone1" name="phone1_appointment_user" id="phone1_appointment_user" value="<?php echo $phone1;?>"  /> </div>  
                                                
                                                <label id="digital1_staff_country_code-error" class="error" for="digital1_staff_country_code"></label>
                                                <label id="phone1_appointment_user-error" class="error" for="phone1_appointment_user"></label>
                                              </div>
                                                
                                               
                                              
                                                
                                              <div class="form-group">
                                                <label class="control-label">Position</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="position" name="position_appointment_user" id="position_appointment_user" value="<?php echo $employee_details[0]->position;?>" /> </div>  
                                                
                                                <div class="input-group">
                                                    <label class="control-label">Date of Appointment</label>
                                                    <input aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="date_of_appointment_user" id="date_of_appointment_user" placeholder="DD-MM-YYYY" value="<?php echo $employee_details[0]->date_of_appointment;?>" >
                                                    
                                                </div>
                                                 
                                                <div class="form-group">
                                                    <label class="control-label">Assign to</label>
                                                    <div class="input-group " style="width: 100%">
                                                        <select class="form-control" multiple="multiple" name="all_firm_view[]" id="all_firm_view" value="">
                                                            <?php foreach ($all_firm as $key => $value) { ?>
                                                                <option value="<?php echo $value['firm_seq_no']; ?>"<?=in_array($value['firm_seq_no'],$assign_to)?'selected':''?>   
                                                                ><?php echo $value['firm_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                 
                                                 <div class="margiv-top-10">
                                            <button type="submit" id="add_new_employee_btn" class="btn green" name="add_new_employee_btn">Submit</button>
                                            <button type="reset" id="" class="btn green" name="">Cancel</button>
                                            <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                        </div>
                                            

                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
</div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/validate/employee_add_edit.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
        
<!--        //new implement for jquery multiselect-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<!--        //end-->
        
        <!-- END PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
                var FormInputMask = function () {

                    var handleInputMasks = function () {

                        $("#salary_cost").inputmask("numeric", {
                            radixPoint: ".",
                            groupSeparator: ",",
                            digits: 2,
                            autoGroup: true,
                            prefix: '$ ',
                            rightAlign: false
                        });

                        $("#benefit_cost").inputmask("numeric", {
                            radixPoint: ".",
                            groupSeparator: ",",
                            digits: 2,
                            autoGroup: true,
                            prefix: '$ ',
                            rightAlign: false
                        });

        $("#phone1_appointment_user").inputmask("mask", {
            "mask": "(0)9999 999999"
        });
        $("#phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#fax").inputmask("mask", {
            "mask": "(999) 999-9999"
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
    jQuery(document).ready(function() {
        FormInputMask.init(); // init metronic core componets
    });
}
$('#web_url').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#social_url').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    
    jQuery(document).ready(function(){
        //for space prevent
        jQuery.validator.addMethod("noSpace", function(value, element) { 
            return value.indexOf(" ") < 0 && value != ""; 
        }, "No space please and don't leave it empty");
        //end
        
        var date = new Date();
        date.setDate(date.getDate());
        $('#date_of_appointment_user').datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'startDate': date
        });

        $('#all_firm_view').multiselect({
            //includeSelectAllOption: true,
            enableFiltering: true,
            numberDisplayed: 3,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });
        
        $('#add_new_wmployee_frm').validate({
            rules:{
                first_name:{
                    required: true,
                    noSpace: true
                },
                last_name:{
                    required: true,
                    noSpace: true
                },
                email_appointment_user:{
                    required: true,
                    email: true,
                    noSpace: true
                },
                password:{
                   required: true,
                   minlength: 8,
                   maxlength: 12,
                   noSpace: true
                },
                digital1_staff_country_code:{
                    required: true,
                    minlength: 3,
                    maxlength: 3,
                    noSpace: true,
                    accept: "[0-9]+"
                },
                mobile_appointment_user:{
                    required: true,
                    number: true,
                    noSpace: true
                },
                phone1_appointment_user:{
                    required: true,
                    minlength: 14,
                    maxlength: 14,
                    accept: "[0-9-\(\)]+"
                    
                },
                position_appointment_user:{
                    required: true,
                    noSpace: true
                },
                date_of_appointment_user:{
                    required: true,
                    noSpace: true
                }
            },
            messages:{
                first_name:{
                    required: "<font color=\"red\">Please enter your first name!</font>",
                    noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                },
                last_name:{
                    required: "<font color=\"red\">Please enter your last name!</font>",
                    noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                },
                email_appointment_user:{
                    required: "<font color=\"red\">Please enter your email!</font>",
                    email: "<font color=\"red\">Please enter your correct email!</font>",
                    noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                },
                password:{
                    required: "<font color=\"red\">Please enter your password!</font>",
                    minlength: "<font color=\"red\">Password should be 8-12 alphanumeric!</font>",
                    maxlength: "<font color=\"red\">Password should be 8-12 alphanumeric!</font>",
                    noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                },
                mobile_appointment_user:{
                    required: "<font color=\"red\">Please enter your mobile number!</font>",
                    number: "<font color=\"red\">Mobile number should be digit!</font>",
                    noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                },
                digital1_staff_country_code:{
                    required: "<font color=\"red\">Please enter your country code!</font>",
                    maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                    minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                    accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>"  
                },
                phone1_appointment_user:{
                    required: "<font color=\"red\">Please enter your phone number!</font>",
//                    number: "<font color=\"red\">Phone number should be digit!</font>",
                    minlength: "<font color=\"red\">Mobile number must be 10 digit!</font>",
                    maxlength: "<font color=\"red\">Mobile number must be 10 digit!</font>" 
                },
                position_appointment_user:{
                    required: "<font color=\"red\">Please enter your designation!</font>",
                    noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                },
                date_of_appointment_user:{
                    required: "<font color=\"red\">Please select appointment date!</font>",
                    noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                }
            }
        });
        
        $('#add_new_employee_btn').on('click',function(){
            var valid = $('#add_new_wmployee_frm').val();
            if(valid){
                $('#add_new_wmployee_frm').submit();
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