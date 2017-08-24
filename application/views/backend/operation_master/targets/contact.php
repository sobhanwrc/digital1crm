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
                        <a href="#">Target Contact</a>
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
                                <!--<span class="caption-subject bold uppercase">Add Contact<small style="margin-left: 10px;"><?php  if ($role_code == 'FIRMADM' || $role_code == 'ATTR'){ echo " For Organization"."  ".$cli_name[0]['target_company_name']; ?><?php } ?></small></span>-->
                                <span class="caption-subject bold">Add Contact<?php  if ($role_code == 'FIRMADM' || $role_code == 'ATTR'){ echo " For Organization"."  ".$cli_name[0]['target_company_name']; ?><?php } ?></span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons" >
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()"> Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                            </div>

                        </div>
<!--                        <span class="caption-subject bold uppercase" style="text-align: center;display: block; font-size: medium;">Organization:<?php echo "  ".$cli_name[0]['target_first_name']; ?></span>-->
                        <div class="portlet-body">
                               <div class="row">
                                    <div class="add_form_sec">
                                        <form role="form" id="add_new_cli_contact" autocomplete="off" method="post" action="<?php echo $base_url . 'targets/insert_con' ?>" enctype="multipart/form-data">
                                        
                                       <div class="col-md-6">
                                           <div class="col-md-12" style=" padding-left: 0;"><h3 class="hint"> General Information </h3></div>
                                        <?php $smsg = $this->session->flashdata('err_message'); if(isset($smsg) && $smsg != ''){ ?>
                                         <div class="alert alert-danger" id="general_msg_success" >
                                             <strong>Error!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                         </div>
                                         <?php } ?>

                                              <div class="form-group required bb">
                                                  <label class="control-label">First Name</label>
                                                  <input type="text" placeholder="Enter Contact First Name" class="form-control" name="client_first_name" id="client_first_name"  />
                                                  <input type="hidden" placeholder="" class="form-control" name="client" id="client" value="<?php echo $target; ?>"  />
                                                  <input type="hidden" placeholder="" class="form-control" name="firm" id="firm" value="<?php echo $firm; ?>"  />
                                              </div>
                                                
                                                  <div class="form-group required bb">
                                                  <label class="control-label">Last Name</label>
                                                  <input type="text" placeholder="Enter Contact Last Name" class="form-control" name="client_last_name" id="client_last_name"  /> </div>

                                                <div class="form-group required bb">
                                                  <label class="control-label">Designation</label>
                                                  <input type="text" placeholder="Enter Designation" class="form-control" name="designation" id="designation"  /> </div>    
                                            
                                         <div class="form-group">
                                                  <label class="control-label">IM</label>
                                                  <input type="text" placeholder="Enter IM" class="form-control" name="im" id="im"  /> 
                                         </div>  
                                                    
                                       </div>
                                       
                                       <div class="col-md-6">
                                          
                                              <h3 class="hint"> Enter Contact </h3>
                                                    <div class="form-group required">
                                                    <label class="control-label">Email</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" id="email"  /> 
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Phone</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone" id="phone"  /> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Fax</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax" id="fax"  /> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Facebook URL</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url" id="social_url"  /> 
                                                </div>
                                                  
                                         <div class="form-group">
                                                  <label class="control-label">Twitter URL</label>
                                                  <input type="text" placeholder="Enter Twitter URL" class="form-control" name="twit" id="twit"  /> 
                                         </div>   
                                         <div class="form-group">
                                                  <label class="control-label">LinkedIn URL</label>
                                                  <input type="text" placeholder="Enter LinkedIn URL" class="form-control" name="link" id="link"  /> 
                                         </div>  
                                         <div class="form-group">
                                                  <label class="control-label">Google Plus URL</label>
                                                  <input type="text" placeholder="Enter Google Plus URL" class="form-control" name="goog" id="goog"  /> 
                                         </div>
                                         <div class="form-group">
                                                  <label class="control-label">Youtube URL</label>
                                                  <input type="text" placeholder="Enter Youtube URL" class="form-control" name="yout" id="yout"  /> 
                                         </div>

                                                <div class="margiv-top-10">
                                                    <button type="submit" name="add_new_cli_contact_btn" id="add_new_cli_contact_btn" class="btn green">Save</button>
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
   
</div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
    <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";  </script>
    <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/client_add_edit.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
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

</style>
                                                
<script type="text/javascript">
var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        $("#phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
         $("#mobile").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#fax").inputmask("mask", {
            "mask": "(999) 999-9999"
        });
        $("#social_security_no").inputmask("999-99-9999", {
            placeholder: " ",
            clearMaskOnLostFocus: true
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
    $('#twit').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#link').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#goog').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
    $('#yout').keyup(function(){
        if (
            ($(this).val().length > 5) && ($(this).val().substr(0,7) !== 'http://') || ($(this).val() === ''))
            {
            $(this).val('http://' + $(this).val());    
            }
    });
</script>
    </body>

</html> 