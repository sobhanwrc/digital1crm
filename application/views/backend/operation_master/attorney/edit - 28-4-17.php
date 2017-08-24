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
	
	hr,
	p {
		margin: 10px;
	}
	
	label.error {
		font-weight: bold;
		color: #FF0000;
	}
	
	.add_form_sec h3 {
		font-size: 18px !important;
		width: 100%;
		height: 30px;
		margin-bottom: 0 !important;
		margin-top: 15px !important;
		text-align: left;
		padding-left: 0 !important;
	}
	
	.btn.default:not(.btn-outline) {
		background-color: #E1E5EC;
		border-color: #E1E5EC;
		color: #666;
		top: -1px !important;
		left: -3px;
	}
	
	.add_form_sec {
		margin: 0;
		width: 100%;
		display: inline-block;
		background: #fafafa
	}
	
	.form-group.required .control-label:after {
		content: "*";
		color: red;
	}
	
	.input-group.required .control-label:after {
		content: "*";
		color: red;
	}
	.portlet.light.bordered > .portlet-title {
    border-bottom: none;
}
	.portlet > .portlet-title {
    margin-bottom: 0px !important;

}
</style>
    
     <script src="<?php echo $assets_path; ?>global/plugins/sweetalert2.js" type="text/javascript"></script>

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
                                <a href="<?php echo base_url()?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>attorney">Call Users</a>
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

                                            <form role="form" autocomplete="off" id="add_new_attorney_frm1" method="post" action="<?php echo $base_url . 'attorney/edit_save/'.base64_encode($attorney_edt[0]['attorney_seq_no']); ?>" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div style=" width: 100%; display: block">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <!-- <h3 class="hint"> User credentials </h3> -->
                                                                <h3 class="hint" style=" margin-left: 15px;"> Manage Call users  </h3>
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">First Name</label>
                                                                    <input type="text" placeholder="First Name" class="form-control"  name="attorney_first_name" id="attorney_first_name" value="<?php if(isset($attorney_edt[0]['attorney_first_name'])) {echo $attorney_edt[0]['attorney_first_name'];}  ?>" />
                                                                      <input type="hidden" name="user_seq_no" value="<?php echo  $attorney_edt[0]['user_seq_no'];?>">
                                                                </div> 
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">Last Name</label>
                                                                    <input type="text" placeholder="Last Name" class="form-control"  name="attorney_last_name" id="attorney_last_name"  value="<?php if(isset($attorney_edt[0]['attorney_last_name'])) {echo $attorney_edt[0]['attorney_last_name'];}  ?>" />
                                                                </div>
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" placeholder="Email" class="form-control"  name="attorney_email1" id="attorney_email1" value="<?php if(isset($attorney_edt[0]['attorney_email1'])) {echo $attorney_edt[0]['attorney_email1'];}  ?>" />
                                                                </div>
                                                                
                                                                 <div class="form-group required col-md-6">
                                                                    <label class="control-label">Password</label>
                                                                    <input type="password" placeholder="Password" class="form-control"  name="password" id="password" value="<?php if(isset($attorney_edt[0]['password'])) {echo $attorney_edt[0]['password'];}  ?>" />
                                                                </div>
                                                             
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">Mobile</label>
                                                                    <input type="text" placeholder="Mobile" class="form-control"  name="mobile" id="mobile" value="<?php if(isset($attorney_edt[0]['mobile'])) {echo $attorney_edt[0]['mobile'];}  ?>"/>
                                                                </div>
                                                            
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">Phone1</label>
                                                                    <input type="text" placeholder="Phone1" class="form-control"  name="phone1" id="phone1" value="<?php if(isset($attorney_edt[0]['phone1'])) {echo $attorney_edt[0]['phone1'];}  ?>"/>
                                                                </div>
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">Phone2</label>
                                                                    <input type="text" placeholder="Phone2" class="form-control"  name="phone2" id="phone2" value="<?php if(isset($attorney_edt[0]['phone2'])) {echo $attorney_edt[0]['phone2'];}  ?>" />
                                                                </div>
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">Position</label>
                                                                    <input type="text" placeholder="Position" class="form-control"  name="position" id="position" value="<?php if(isset($attorney_edt[0]['position'])) {echo $attorney_edt[0]['position'];}  ?>" />
                                                                </div>
                                                                <div class="form-group required col-md-6">
                                                                    <label class="control-label">Date of Appointment</label>
                                                                    <!-- <input type="text" placeholder="Date of Appointment" class="form-control"  name="date_of_appointment" id="date_of_appointment"  />
                                                                </div> -->
                                                                    <input style="width:88%; display:inline-block;" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="date_of_appointment" id="date_of_appointment" placeholder="DD-MMM-YYYY" value="<?php if(isset($attorney_edt[0]['date_of_appointment'])) {echo $attorney_edt[0]['date_of_appointment'];}  ?>">
                                                                    <span style="width:10%; display: inline-block;" class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                                <!--added by me -->
                                                                  <div class="form-group col-md-6">
                                                                <label class="control-label">User profile Image </label> 
                                                                <img src="<?php echo base_url()?>/assets/upload/image/<?php echo $firm_details[0]['firm_image']?>"></br></br>
                                                                <input type="file" name="profile_image" id = "profile_image" class="form-control placeholder-no-fix">
                                                                
                                                            </div>
                                                            
                                                           
                                                                
                                                                
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <!-- <button type="button" class="btn green">Save changes</button> -->
                                <button type="submit" name="add_new_attorney_btn" id="general-submit-btn" class="btn green">Save Changes</button>
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>
        <script src="<?php echo $assets_path; ?>custom/js/validate/attorney_add_edit.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
       
        

    <!-- END PAGE LEVEL PLUGINS -->
  
        <script type="text/javascript">
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
            "mask": "(999) 999-9999"
        });
        
        $("#phone2").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile").inputmask("mask", {
            "mask": "(999) 999-9999"
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
</script>
        <script>
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
                var firm_seq_no=$(this).val();
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
            
            
            
            
            
    $(function() {
        $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
    }, "Should have alphabet or number");
    $.validator.addMethod("date_format", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9-]+$/.test(value);
    }, "Invalid date format");
    
    $.validator.addMethod('filesize', function (value, element, param) {

    return this.optional(element) || (element.files[0].size <= param)
  }, 'File size must be less than 1 MB');
    $("#add_new_attorney_frm1").validate({
        rules: {
            attorney_first_name: {
                required: true,
                alphanumeric: true
            },
            attorney_last_name: {
                required: true,
                alphanumeric: true
            },
            attorney_email1: {
                required: true,
                email: true
            },
            mobile: {
                required: true
            },
            password: {
                required: true,
                minlength: 5,
                maxlength: 32
            },
            phone1: {
                required: true
            },
            phone2: {
                required: true
            },
            position: {
                required: true,
                alphanumeric: true
            },
            date_of_appointment: {
                required: true,
                date_format: true
            },
            profile_image: {
                accept:"jpg,png,jpeg,gif",
                filesize: 1000000
            }
        },
        messages: {
            attorney_first_name: {
                required: "Please enter first name"
            },
            attorney_last_name: {
                required: "Please enter last name"
            },
            attorney_email1: {
                required: "Please enter email id",
                email: "Please enter valid email id"
            },
            mobile: {
                required: "Please enter mobile no"
            },
            password: {
                required: "Please enter password",
                minlength: "Password must have atleast 5 characters",
                maxlength: "Password must have maximum 32 characters"
            },
            phone1: {
                required: "Please enter phone 1"
            },
            phone2: {
                required: "Please enter phone 2"
            },
            position: {
                required: "Please enter position name"
            },
            date_of_appointment: {
                required: "Please enter date of appointment"
            },
            profile_image: {
                accept:"please select jpg or png image"
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