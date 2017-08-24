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
                        <a href="#">App Codes</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>App Codes Edit</span>
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
                               <span class="caption-subject font-blue-madison bold uppercase"></span>
                           </div>
                       </div>
                       
                       <div class="portlet-body">
                           <div class="tab-content">
                               
                               <div class="tab-pane active" id="tab_1_1">
                                   <form role="form" id="appcodes_codes_form" method="post" action="<?php echo $base_url . 'app-codes/details/' . base64_encode($codes2['code_seq_no']); ?>">
                                       <input type="hidden" name="codes_tab" value="yes">
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

                                        <h3 class="hint"> App Codes Information </h3>
                                                   
                                                     <div class="form-group">
                                                         <label class="control-label">Category:</label>
                                                         <input type="text" placeholder="code" class="form-control" name="category" id="category" disabled value="<?php if(isset($codes2['category_type']) && $codes2['category_type'] != ''){echo $codes2['category_type']; } ?>" <?php if(isset($codes2['category_type']) && $codes2['category_type'] != ''){echo $codes2['category_type']; } ?> /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Code:</label>
                                                         <input type="text" placeholder="code" class="form-control" name="code" id="code" disabled value="<?php if(isset($codes2['code']) && $codes2['code'] != ''){echo $codes2['code']; } ?>" <?php if(isset($codes2['code']) && $codes2['code'] != ''){echo $codes2['code']; } ?> /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Short Description</label>
                                                         <input type="text" placeholder="Short Description" class="form-control" name="short_description" id="short_description" value="<?php if(isset($codes2['short_description']) && $codes2['short_description'] != ''){echo $codes2['short_description']; } ?>" <?php if(isset($codes2['short_description']) && $codes2['short_description'] != ''){echo $codes2['short_description']; } ?>  /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Long Description</label>
                                                         <input type="text" placeholder="Long Description" class="form-control" name="long_description" id="long_description" value="<?php if(isset($codes2['long_description']) && $codes2['long_description'] != ''){echo $codes2['long_description']; } ?>" <?php if(isset($codes2['long_description']) && $codes2['long_description'] != ''){echo $codes2['long_description']; } ?>  /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Firm Customization</label>
                                                         <input type="text" placeholder="Firm Customization" class="form-control" name="firm_customization" id="firm_customization" value="<?php if ($codes2['firm_customization'] == '1') {echo "Yes";} else{ echo "No";}?>" /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Full Visibility</label>
                                                         <input type="text" placeholder="Full Visibility" class="form-control" name="full_visibility" id="full_visibility" value="<?php if ($codes2['full_visibility'] == '1') {echo "Yes";} else{ echo "No";}?>" /> </div>
                                                     <div class="form-group">
                                                         <label class="control-label">Paid Subscription</label>
                                                         <input type="text" placeholder="Paid Subscription" class="form-control" name="paid_subscription" id="paid_subscription" value="<?php if ($codes2['paid_subscription'] == '1') {echo "Yes";} else{ echo "No";}?>" /> </div>
                                                    <div class="form-group">
                                                       <label class="control-label">Remarks</label>
                                                       <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php if(isset($codes2['remarks_notes']) && $codes2['remarks_notes'] != ''){echo $codes2['remarks_notes']; } ?></textarea>
                                                      </div>
        
                                                <div class="margiv-top-10">
                                                   <button type="submit" id="appcodes_info_submit" class="btn green" name="app_codes_save_changes">Save</button>
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