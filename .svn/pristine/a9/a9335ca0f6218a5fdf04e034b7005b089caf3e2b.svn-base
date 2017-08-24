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
                                <a href="#">App Users</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>App Users View</span>
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
                                            <form role="form" id="appuser_user_info_form" method="post" action="<?php echo $base_url . 'app-users/details/' . base64_encode($users_info['user_seq_no']); ?>">
                                                <input type="hidden" name="user_tab" value="yes">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?php $err = $this->session->flashdata('suc_message');
                                                        if (isset($err) && $err != '') { ?>
                                                            <div class="alert alert-success" id="general_msg_success" >
                                                                <strong>Success!</strong> <?php echo $err; ?>
                                                            </div>
                                                        <?php } ?>
<?php $err = $this->session->flashdata('err_message');
if (isset($err) && $err != '') { ?>
                                                            <div class="alert alert-danger" id="general_msg_success" >
                                                                <strong>Error!</strong> <?php echo $err; ?>
                                                            </div>
<?php } ?>

                                                        <h3 class="hint"> User Informations </h3>

                                                        <div class="form-group">
                                                            <label class="control-label">User First Name</label>
<?php //t($users_info); exit;  ?> 
                                                            <input type="text" placeholder="Enter User first Name" class="form-control" name="first_name" id="first_name" value="<?php if (isset($users_info['user_first_name']) && $users_info['user_first_name'] != '') {
    echo $users_info['user_first_name'];
} ?>" /> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">User Last Name</label>
<?php //t($users_info); exit;  ?> 
                                                            <input type="text" placeholder="Enter User last Name" class="form-control" name="last_name" id="last_name" value="<?php if (isset($users_info['user_last_name']) && $users_info['user_last_name'] != '') {
    echo $users_info['user_last_name'];
} ?>" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Roles</label>
                                                            <select name="role_code" id="role_code" class="form-control">
   <!--                                                            <option value="<?php //if(isset($users_info['role_code']) && $users_info['role_code'] != ''){echo $users_info['role_code']; } ?>"><?php //echo $users_info['role_code']; ?></option>-->
<?php foreach ($codes['Roles'] as $key => $value) { ?>
                                                                    <option value="<?php echo $value['code']; ?>" <?php if ($value['code'] == $users_info['role_code']) {
        echo 'selected="selected"';
    }
    ?>>
                                                                    <?php echo $value['short_description']; ?>
                                                                    </option>
                                                                <?php } ?>  
                                                            </select> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Groups</label>
                                                            <select name="group_code" id="group_code" class="form-control">
<?php //t($users_info); exit;  ?> 
   <!--                                                            <option value="<?php //if(isset($users_info['group_code']) && $users_info['group_code'] != ''){echo $users_info['group_code']; }  ?>"><?php //echo $users_info['group_code'];  ?></option>-->
                                                            <?php foreach ($codes['Groups'] as $key => $value) { ?>
                                                                    <option value="<?php echo $value['code']; ?>" <?php if ($value['code'] == $users_info['group_code']) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $value['short_description']; ?></option>
                                                            <?php } ?>  

                                                            </select> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Authorized By:</label>
                                                            <input type="text" placeholder="Authorized By" class="form-control" name="authorized_by" id="authorized_by" value="<?php if (isset($users_info['authorized_by']) && $users_info['authorized_by'] != '') {
                                                                echo $users_info['authorized_by'];
                                                            } ?>" <?php if (isset($users_info['authorized_by']) && $users_info['authorized_by'] != '') {
                                                                echo $users_info['authorized_by'];
                                                            } ?> /> </div>
                                                        <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                            <label class="control-label">Authorized_Date </label>
                                                            <input aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" id="authorized_date" name="authorized_date" placeholder="dd/mm/yyyy" value="<?php if (isset($users_info['authorized_date']) && $users_info['authorized_date'] != '') {
                                                                echo date('j-M-Y', $users_info['authorized_date']);
                                                            } ?>" >
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Remarks or Comments</label>
                                                            <input type="text" placeholder="Remarks/Notes" class="form-control" name="remarks_notes" id="remarks_notes" value="<?php if (isset($users_info['remarks_notes']) && $users_info['remarks_notes'] != '') {
    echo $users_info['remarks_notes'];
} ?>" <?php if (isset($users_info['remarks_notes']) && $users_info['remarks_notes'] != '') {
    echo $users_info['remarks_notes'];
} ?>  /> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3 class="hint"> Enter Address </h3>
                                                        <input type="hidden" name="userid_2" id="userid_2" value="<?php if (isset($users_info['id']) && $users_info['id'] != '') {
    echo $users_info['id'];
} ?>">
                                                        <div id="validate_div_12" >
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
<?php //t($address_info); exit;  ?> 
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" id="email" value="<?php if (isset($address_info['email']) && $address_info['email'] != '') {
    echo $address_info['email'];
} ?>" />
                                                                <input type="hidden" name="original_email" id="original_email" value="<?php if (isset($address_info['email']) && $address_info['email'] != '') {
    echo $address_info['email'];
} ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Phone</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone" value="<?php if (isset($address_info['phone']) && $address_info['phone'] != '') {
    echo $address_info['phone'];
} ?>" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile" value="<?php if (isset($address_info['mobile_cell']) && $address_info['mobile_cell'] != '') {
    echo $address_info['mobile_cell'];
} ?>" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Website URL</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url" value="<?php if (isset($address_info['website_url']) && $address_info['website_url'] != '') {
    echo $address_info['website_url'];
} ?>" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Social URL</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url" value="<?php if (isset($address_info['social_media_url']) && $address_info['social_media_url'] != '') {
    echo $address_info['social_media_url'];
} ?>" /> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Address Line 1</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="address_line_1" value="<?php if (isset($address_info['address_line1']) && $address_info['address_line1'] != '') {
    echo $address_info['address_line1'];
} ?>" /> </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Address Line 2</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="address_line_2" value="<?php if (isset($address_info['address_line2']) && $address_info['address_line2'] != '') {
    echo $address_info['address_line2'];
} ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Address Line 3</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="address_line_3" value="<?php if (isset($address_info['address_line3']) && $address_info['address_line3'] != '') {
    echo $address_info['address_line3'];
} ?>" /> </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Country</label>
                                                                <select name="country" id="country" class="form-control">
                                                                    <option value="">Country</option>
<?php if (isset($country_info) && $country_info != '') {
    echo $country_info;
} ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">State</label>
                                                                <select name="state" id="state" class="form-control">
                                                                    <option value="">State</option>
                                        <?php if (isset($state_info) && $state_info != '') {
                                            echo $state_info;
                                        } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">County</label>
                                                                <select name="county" id="county" class="form-control">
                                                                    <option value="">County</option>
<?php if (isset($county_info) && $county_info != '') {
    echo $county_info;
} ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">City/Town</label>
                                                                <select name="city" id="city" class="form-control">
                                                                    <option value="">City/Town</option>
<?php if (isset($city_info) && $city_info != '') {
    echo $city_info;
} ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Postal Code</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code" value="<?php if (isset($address_info['postal_code']) && $address_info['postal_code'] != '') {
    echo $address_info['postal_code'];
} ?>" /> </div>
                                                        </div>

                                                        <h3 class="hint"> Remarks </h3>

                                                        <div class="form-group">
                                                            <label class="control-label">Remarks</label>
                                                            <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php if (isset($address_info['remarks_notes']) && $address_info['remarks_notes'] != '') {
    echo $address_info['remarks_notes'];
} ?></textarea>
                                                        </div>

                                                        <div class="margiv-top-10">
                                                            <button type="submit" id="appuser_user_info_submit" class="btn green" name="user_save_changes">Save Changes</button>
                                                            <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                        </div>
                                                    </div>
                                                </div>     
                                            </form>
                                        </div>

                                        <!-- END CONTAINER -->
                                        <!-- BEGIN FOOTER -->
<?php echo $footer; ?>
                                        <!-- END FOOTER -->
<?php echo $footer_link; ?>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#sample_21').DataTable();
                                            });
                                        </script>

                                        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
                                        <!-- address db -->
                                        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
                                        <script src="<?php echo $assets_path; ?>custom/js/validate/app_users_edit.js" type="text/javascript"></script>
                                        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>


                                        </body>

                                        </html> 