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
                        <a href="#">App Profiles</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>App Profile View</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->

            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                   <div class="portlet light ">
                       <div class="portlet-title tabbable-line">
                           <div class="caption caption-md">
                               <i class="icon-globe theme-font hide"></i>
                               <span class="caption-subject font-blue-madison bold uppercase">User Information</span>
                           </div>
                       </div>
                       
                       <div class="portlet-body">
                           <div class="tab-content">
                               
                               <div class="tab-pane active" id="tab_1_1">
                                   <form role="form" id="appprofile_info_form" method="post" action="<?php echo $base_url . 'app-profiles/details/' . base64_encode($profile_info['profile_seq_no']); ?>">
                                       <input type="hidden" name="profile_tab" value="yes">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <?php $err = $this->session->flashdata('suc_message'); if(isset($err) &&  $err != ''){ ?>
                                        <div class="alert alert-success" id="general_msg_success" >
                                            <strong>Success!</strong> <?php echo $err; ?>
                                        </div>
                                        <?php } ?>
                                        <?php $err = $this->session->flashdata('err_message'); if(isset($err) &&  $err != ''){ ?>
                                        <div class="alert alert-danger" id="general_msg_success" >
                                            <strong>Error!</strong> <?php echo $err; ?>
                                        </div>
                                        <?php } ?>

                                        <h3 class="hint"> Profile Informations </h3>
                                                   
                                                     <div class="form-group">
                                                         <label class="control-label">User ID</label>
                                                         <select name="user_id" id="user_id" class="form-control" disabled>
<!--                                                            <option value="<?php //if(isset($users_info['role_code']) && $users_info['role_code'] != ''){echo $users_info['role_code']; } ?>"><?php //echo $users_info['role_code']; ?></option>-->
                                                             <?php  foreach ($user as $key => $value) { $value = (array) $value;  ?>
                                                            <option value="<?php echo $value['user_id']; ?>" <?php if($value['user_seq_no'] == $profile_info['user_id']){echo 'selected="selected"';} ?>><?php echo $value['user_id']; ?></option>
                                                             <?php } ?>  
                                                        </select> 
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Base Location:</label>
                                                         <input type="text" placeholder="Base Location" class="form-control" name="base_location" id="base_location" value="<?php if(isset($profile_info['base_location']) && $profile_info['base_location'] != ''){echo $profile_info['base_location']; } ?>" <?php if(isset($profile_info['base_location']) && $profile_info['base_location'] != ''){echo $profile_info['base_location']; } ?> /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Base Session Reference</label>
                                                         <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($profile_info['base_session_ref']) && $profile_info['base_session_ref'] != ''){echo $profile_info['base_session_ref']; } ?></textarea>
                                                     <div class="form-group">
                                                         <label class="control-label">Current Location</label>
                                                         <input type="text" placeholder="Current Location" class="form-control" name="current_location" id="current_location" value="<?php if(isset($profile_info['current_location']) && $profile_info['current_location'] != ''){echo $profile_info['current_location']; } ?>" <?php if(isset($profile_info['current_location']) && $profile_info['current_location'] != ''){echo $profile_info['current_location']; } ?>  /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Current Session Reference</label>
                                                         <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($profile_info['current_session_ref']) && $profile_info['current_session_ref'] != ''){echo $profile_info['current_session_ref']; } ?></textarea>
                                                     <div class="form-group">
                                                         <label class="control-label">Last Device Type</label>
                                                         <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($profile_info['last_device_type']) && $profile_info['last_device_type'] != ''){echo $profile_info['last_device_typelast_device_type']; } ?></textarea>
                                                     <div class="form-group">
                                                         <label class="control-label">Last IP Address</label>
                                                         <input type="text" placeholder="Last IP Address" class="form-control" name="last_ip_address" id="last_ip_address" value="<?php if(isset($profile_info['last_ip_address']) && $profile_info['last_ip_address'] != ''){echo $profile_info['last_ip_address']; } ?>" <?php if(isset($profile_info['last_ip_address']) && $profile_info['last_ip_address'] != ''){echo $profile_info['last_ip_address']; } ?>  /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Last Device Reference</label>
                                                         <input type="text" placeholder="Last Device Reference" class="form-control" name="last_device_ref" id="last_device_ref" value="<?php if(isset($profile_info['last_device_ref']) && $profile_info['last_device_ref'] != ''){echo $profile_info['last_device_ref']; } ?>" <?php if(isset($profile_info['last_device_ref']) && $profile_info['last_device_ref'] != ''){echo $profile_info['last_device_ref']; } ?>  /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Last Accessed Time</label>
                                                         <input type="text" placeholder="Last Accessed Time" class="form-control" name="last_accessed_time" id="last_accessed_time" value="<?php if(isset($profile_info['last_accessed_time']) && $profile_info['last_accessed_time'] != ''){echo date('h:i:s ', $profile_info['last_accessed_time']); } ?>"   /> </div>
                                                    <div class="form-group">
                                                       <label class="control-label">Remarks</label>
                                                       <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($profile_info['remarks_notes']) && $profile_info['remarks_notes'] != ''){echo $profile_info['remarks_notes']; } ?></textarea>
                                                      </div>
        
                                                <div class="margiv-top-10">
                                                   <button type="submit" id="appprofile_info_submit" class="btn green" name="profile_save_changes">Save</button>
                                                   <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                </div>
        
                                      </div>
                                    </div>     
                                           </form>
                               </div>
                               </div>
                           </div>
                                 
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
    <script type="text/javascript">
       $(document).ready(function() {
           $('#sample_21').DataTable();
       } );
   </script>

    <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>"; </script>
    <!-- address db -->
    <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/app_profiles_edit.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>


    </body>

</html> 