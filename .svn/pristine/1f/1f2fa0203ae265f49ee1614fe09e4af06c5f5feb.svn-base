<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php //print_r ($firm_details); die();?>

    <?php
//    echo 'devosmita'; exit;s
//    t($codes['Firm Address Type']); exit;
    echo $header_link;
    ?>
    <!-- END HEAD -->
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
                    <?php //echo $breadcrumb; ?>
                    <div class="page-bar" style="position:relative">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Company</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Company View</span>
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
                    <?php //t($address_info);die; ?>
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-settings theme-font"></i>
                                        <span class="caption-subject bold uppercase">
                                            Company Information
                                            <?php if ($firm_admin[0]['add_flage'] == 1) { ?>
                                                <font color="red" style="margin-left: 150px;">Imported Data</font>
                                            <?php } ?>
                                        </span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab">General Info</a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab">Locations</a>
                                        </li>
                                        <!--                                        <li>
                                                                                    <a href="#tab_1_3" data-toggle="tab">Attorneys</a>
                                                                                </li>-->
                                    </ul>
                                </div>

                                <div class="portlet-body">
                                
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_1_1">
                                            <form role="form" id="myfirm-general-info-edit-form" enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo $base_url . 'firm/my_firm/' ?>">
                                                <input type="hidden" name="firm_id" id="firm_id" value="<?php echo $firm_details[0]['firm_seq_no']?>">
                                                <input type="hidden" name="general_tab" value="yes">
                                                <div class="row">
                                                    <div class="add_form_sec">
                                                        <div class="col-md-6">
                                                            <?php
//                                                            t($value1);exit;
                                                            $aaa = $this->session->flashdata('suc_message');
                                                            if (isset($aaa) && $aaa != '') {
                                                                ?>
                                                                <div class="alert alert-success" id="general_msg_success" >
                                                                    <strong>Success!</strong> <?php echo $aaa; ?>
                                                                </div>
                                                            <?php } ?>
                                                            <?php
                                                            $aaa = $this->session->flashdata('err_message');
                                                            if (isset($aaa) && $aaa != '') {
                                                                ?>
                                                                <div class="alert alert-danger" id="general_msg_success" >
                                                                    <strong>Error!</strong> <?php echo $aaa; ?>
                                                                </div>
                                                            <?php } ?>

                                                            <!--<div class="col-md-12">-->
                                                            <h3 class="hint"> Firm Admin Credential </h3>
                                                            <!--</div>-->
                                                            <div class="form-group required">
                                                                <label class="control-label">First Name</label>
                                                                <input type="text" placeholder="Enter First Name" class="form-control" name="fname" id="fname" autocomplete="off" value="<?php echo $firm_admin[0]['user_first_name']; ?>" />
                                                            </div>
                                                            <div class="form-group required">
                                                                <label class="control-label">Last Name</label>
                                                                <input type="text" placeholder="Enter Last Name" class="form-control" name="lname" id="lname" autocomplete="off" value="<?php echo $firm_admin[0]['user_last_name']; ?>"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">User ID</label>
                                                                <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email" autocomplete="off" value="<?php echo $firm_admin[0]['user_id']; ?>" <?php if ($firm_admin[0]['add_flage'] == 0) { ?>readonly="readonly" <?php } ?>/>
                                                            </div>
                                                            <!--                                                    <div class="form-group required">
                                                                                                                    <label class="control-label">Password</label>
                                                                                                                    <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password"  autocomplete="off" />
                                                                                                                </div>-->

<!--                                                            <div class="form-group required">
                                                                <label class="control-label">Group</label>
                                                                <select name="group_code" id="group_code" class="form-control">
                                                                    <option value="">Select Group</option>
                                                                    <?php foreach ($all_groups as $key => $value) { ?>
                                                                        <option value="<?php echo $value['group_code']; ?>" <?php if ($firm_admin[0]['group_code'] == $value['group_code']) {
                                                                        echo 'selected="selected"';
                                                                    } ?>><?php echo $value['group']; ?></option>
<?php } ?>
                                                                </select>
                                                            </div>-->

                                                            <div class="form-group required">
                                                                <label class="control-label">Designation</label>
                                                                <!-- <input type="text" name="designation_code" id="designation_code" class="form-control" value="<?php echo $value1['designation']; ?>" /> -->
                                                                <input type="text" name="designation_code" id="designation_code" class="form-control" value="<?php echo $address_info['position']; ?>" />
                                                            </div>

                                                            <h3 class="hint"> General Informations </h3>
                                                            <div class="form-group required">
                                                                <label class="control-label">Firm Name</label>
                                                                <input type="text" placeholder="Enter Firm Name" class="form-control" name="firm_name" id="firm_name" value="<?php
if (isset($firm_info['firm_name']) && $firm_info['firm_name'] != '') {
    echo $firm_info['firm_name'];
}
?>" />
                                                            </div>

                                                            <div class="form-group required">
                                                                <label class="control-label">Firm Code</label>
                                                                <input type="text" placeholder="Enter Code" class="form-control" name="firm_code" id="firm_code" value="<?php
if (isset($firm_info['firm_code']) && $firm_info['firm_code'] != '') {
    echo $firm_info['firm_code'];
}
?>" />
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label">Firm Registration</label>
                                                                <input type="text" placeholder="Enter Registration" class="form-control" name="firm_reg" id="firm_reg" value="<?php
                                                                       if (isset($firm_info['firm_registration']) && $firm_info['firm_registration'] != '') {
                                                                           echo $firm_info['firm_registration'];
                                                                       }
                                                                       ?>" <?php
                                                                       if (isset($firm_info['firm_registration']) && $firm_info['firm_registration'] != '' && $firm_admin[0]['add_flage'] == 0) {
                                                                           echo 'readonly="readonly"';
                                                                       }
                                                                       ?> />
                                                            </div>

                                                            <h3 class="hint"> Single Point Information </h3>
                                                            <div class="form-group required">
                                                                <label class="control-label">SP Contact Name</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Name" name="sp_name" value="<?php
if (isset($firm_info['sp_contact_name']) && $firm_info['sp_contact_name'] != '') {
    echo $firm_info['sp_contact_name'];
}
?>" />
                                                            </div>

                                                            <div class="form-group required">
                                                                <label class="control-label">SP Contact Role</label>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="SP Contact Role" name="sp_role" value="<?php
if (isset($firm_info['sp_contact_role']) && $firm_info['sp_contact_role'] != '') {
    echo $firm_info['sp_contact_role'];
}
?>" />
                                                            </div>

                                                            <h3 class="hint"> Firm Credential </h3>
                                                            <div class="form-group ">
                                                                <label class="control-label">Username</label>
                                                                <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email" value="<?php echo $firm_admin[0]['user_id']; ?>" readonly="readonly" />
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label">Company Image Upload</label>
                                                                <img src="<?php echo base_url()?>/assets/upload/image/<?php echo $firm_details[0]['firm_image']?>"></br></br>
                                                                <input type="file" name="company_logo" id="company_logo" class="form-control placeholder-no-fix">
                                                            </div>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3 class="hint"> Enter Address </h3>
                                                            <input type="hidden" name="firmid_2" id="firmid_2" value="<?php
                                                                       if (isset($firm_info['id']) && $firm_info['id'] != '') {
                                                                           echo $firm_info['id'];
                                                                       }
?>">
                                                            <div id="validate_div_12" >
                                                                <div class="form-group required">
                                                                    <label class="control-label">Email</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" value="<?php
                                                                       if (isset($address_info['email']) && $address_info['email'] != '') {
                                                                           echo $address_info['email'];
                                                                       }
?>" />
                                                                </div>
                                                                <?php
                                                                    $home_phone = $address_info['phone'];
                                                                    $original_home_phone = $home_phone;
                                                                    $length = strlen($original_home_phone);
                                                                    if ($length == 10) {
                                                                        $country_code1 = '';
                                                                    } else if ($length == 11) {
                                                                        $country_code1 = substr($original_home_phone, 0, 1);
                                                                    } else if ($length == 12) {
                                                                        $country_code1 = substr($original_home_phone, 0, 2);
                                                                    } else if ($length == 13) {
                                                                        $country_code1 = substr($original_home_phone, 0, 3);
                                                                    } else if ($length == 14) {
                                                                        $country_code1 = substr($original_home_phone, 0, 4);
                                                                    }
                                                                    else if ($length == 17) {
                                                                        $country_code1 = substr($original_home_phone, 0, 3);
                                                                    }
                                                        //            echo $country_code1;
                                                                    $home_phone_number = substr($original_home_phone, -11);
                                                                 ?>
                                                                <div class="form-group required">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>
                                                                    <input type="text" value="<?php echo $country_code1; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input style="width: 85%; margin-left: -5px; display: inline-block"  class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone" id="phone" value="<?php
                                                                       if (isset($address_info['phone']) && $address_info['phone'] != '') {
                                                                           echo $home_phone_number;
                                                                       }
?>" />
                                                                    
                                                                    <label id="country_code3-error" class="error" for="country_code3"></label>
                                                                    <label id="phone-error" class="error" for="phone"></label>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label">Fax</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax" id="fax" value="<?php
                                                                       if (isset($address_info['fax']) && $address_info['fax'] != '') {
                                                                           echo $address_info['fax'];
                                                                       }
?>" />
                                                                </div>
                                                                <?php
                                                                    $mobile = $address_info['mobile_cell'];
                                                                    $original_mobile = $mobile;
                                                                    $length1 = strlen($original_mobile);
                                                                    //echo $length;
                                                                    if ($length1 == 10) {
                                                                        $country_code2 = '';
                                                                    } else if ($length1 == 11) {
                                                                        $country_code2 = substr($original_mobile, 0, 1);
                                                                    } else if ($length1 == 12) {
                                                                        $country_code2 = substr($original_mobile, 0, 2);
                                                                    } else if ($length1 == 13) {
                                                                        $country_code2 = substr($original_mobile, 0, 3);
                                                                    } else if ($length1 == 14) {
                                                                        $country_code2 = substr($original_mobile, 0, 4);
                                                                    }
                                                                    else if ($length1 == 17) {
                                                                        $country_code2 = substr($original_mobile, 0, 3);
                                                                    }
                                                        //            echo $country_code1;
                                                                    $home_mobile_number = substr($original_mobile, -11);
                                                                ?>
                                                                <div class="form-group ">
                                                                    <label class="control-label" style=" width: 100%; display: inline-block">Mobile</label>
                                                                    <input type="text" value="<?php echo $country_code2; ?>" placeholder="" class="form-control" id="country_code2" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">
                                                                    <input style="width: 85%; margin-left: -5px; display: inline-block" class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile" id="mobile" value="<?php
                                                                       if (isset($address_info['mobile_cell']) && $address_info['mobile_cell'] != '') {
                                                                           echo $home_mobile_number;
                                                                       }
?>" />
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label">Website URL</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url" id="web_url" value="<?php
                                                                       if (isset($address_info['website_url']) && $address_info['website_url'] != '') {
                                                                           echo $address_info['website_url'];
                                                                       }
?>" />
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label">Social URL</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url" id="social_url" value="<?php
                                                                       if (isset($address_info['social_media_url']) && $address_info['social_media_url'] != '') {
                                                                           echo $address_info['social_media_url'];
                                                                       }
?>" />
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">Address Line 1</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_1" value="<?php
                                                                       if (isset($address_info['address_line1']) && $address_info['address_line1'] != '') {
                                                                           echo $address_info['address_line1'];
                                                                       }
?>" />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Address Line 2</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_2" value="<?php
                                                                       if (isset($address_info['address_line2']) && $address_info['address_line2'] != '') {
                                                                           echo $address_info['address_line2'];
                                                                       }
?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Address Line 3</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_3" value="<?php
                                                                       if (isset($address_info['address_line3']) && $address_info['address_line3'] != '') {
                                                                           echo $address_info['address_line3'];
                                                                       }
?>" />
                                                                </div>

                                                                <div class="form-group required">
                                                                    <label class="control-label">Country</label>
                                                                    <!-- <select name="country" id="country" class="form-control">
                                                                        <?php foreach ($country_info as $key => $value) { ?>
                                                                            <option value="<?php echo $value['country_seq_no']; ?>" <?php if ($value['country_seq_no'] == $address_info['country']) { ?> selected="selected" <?php } ?>><?php echo $value['name']; ?></option>
                                                                        <?php } ?>
                                                                    </select> -->
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Country" name="country" value="<?php echo $address_info['country'];
                                                                    ?>" />

                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">State</label>
                                                                    <!--</select> -->
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="State" id="state" name="state" value="<?php echo $address_info['state'];
                                                                    ?>" />
                                                                </div>
                                                                
                                                                <div class="form-group required">
                                                                    <label class="control-label">City/Town<?php // t($city_info);exit;?></label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="City" name="city" id="city" value="<?php echo $address_info['city'];
                                                                    ?>" />
                                                                </div>
                                                                <div class="form-group required">
                                                                    <label class="control-label">Postal Code</label>
                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code"  id="postal_code" value="<?php
                                                                    if (isset($address_info['postal_code']) && $address_info['postal_code'] != '') {
                                                                        echo $address_info['postal_code'];
                                                                    }
                                                                    ?>" />
                                                                </div>
                                                            </div>

                                                            <h3 class="hint"> Remarks </h3>

                                                            <div class="form-group ">
                                                                <label class="control-label">Remarks</label>
                                                                <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"><?php
                                                                    if (isset($firm_info['remarks_notes']) && $firm_info['remarks_notes'] != '') {
                                                                        echo $firm_info['remarks_notes'];
                                                                    }
                                                                    ?></textarea>
                                                            </div>

                                                            <div class="margiv-top-10">
                                                                <button type="submit" id="general-edit-submit-btn" class="btn green" name="general_save_change" value="general_save_change">Save Changes</button>
                                                                <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="tab_1_2">
                                            <div class="portlet-body">

                                                <div class="portlet-title">
                                                    <div class="caption font-dark">
                                                        <i class="icon-settings font-dark"></i>
                                                        <span class="caption-subject bold uppercase">Firm Locations</span>
                                                    </div>
                                                </div>
                                                <?php
                                                $aaa = $this->session->flashdata('suc_message11');
                                                if (isset($aaa) && $aaa != '') {
                                                    ?>
                                                    <div class="alert alert-success" id="general_msg_success" >
                                                        <strong>Success!</strong> <?php echo $aaa; ?>
                                                    </div>
<?php } ?>
                                                <?php
                                                $aaa = $this->session->flashdata('err_message11');
                                                if (isset($aaa) && $aaa != '') {
                                                    ?>
                                                    <div class="alert alert-danger" id="general_msg_success" >
                                                        <strong>Error!</strong> <?php echo $aaa; ?>
                                                    </div>
<?php } ?>
                                                <div style="margin-top:70px;"></div>
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-6" style=" padding-left: 0">
                                                            <div class="btn-group">
                                                                <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                                    <button class="btn sbold green"> Add New
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                                    <thead>
                                                        <tr class="">
                                                            <th> SL# </th>
                                                            <th> Address Type </th>
                                                            <th> Line-1 </th>
                                                            <!--<th> City/State </th>-->
                                                            <th> Email </th>
                                                            <th> Phone </th>
                                                            <th> Actions </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php //t($all_locations);    ?>
<?php
$i = 0;
foreach ($all_locations as $key => $value) {
    ?>
                                                            <tr>
                                                                <td> <?php echo ++$i; ?> </td>
                                                                <td> <?php echo get_short_desc_by_code($value['firm_address_type'], $firm_seq_no); ?> </td>
                                                                <td> <?php echo $value['address_line1']; ?> </td>
                                                                <!--<td> <?php // echo $value['city_name'] . '/' . $value['state_name'];  ?> </td>-->
                                                                <td> <?php echo $value['email']; ?> </td>
                                                                <td> <?php echo $value['phone']; ?> </td>

                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <!--                                                                            <li>
                                                                                                                                                            <a href="http://dev.wrctechnologies.com/ams/case/index">
                                                                                                                                                                <i class="icon-docs"></i> Case
                                                                                                                                                            </a>
                                                                                                                                                        </li>-->
                                                                            <li>
                                                                                <a href="#responsive_v_<?php echo $i; ?>" data-toggle="modal" >
                                                                                    <i class="icon-docs"></i> View </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#responsive_<?php echo $i; ?>" data-toggle="modal">
                                                                                    <i class="icon-tag"></i> Edit
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="<?php echo $base_url . 'firm/delete/' . base64_encode($value['firm_address_seq_no']).'/'.base64_encode($value['address_seq_no']); ?>">
                                                                                    <i class="icon-tag"></i> Delete </a>
                                                                            </li><!-- -->
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
<?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END CHANGE AVATAR TAB -->
                                        <!-- CHANGE PASSWORD TAB -->
                                        <!--                                        <div class="tab-pane" id="tab_1_3">
                                                                                    <div class="portlet-body">
                                                                                        <div class="portlet-title">
                                                                                            <div class="caption font-dark">
                                                                                                <i class="icon-settings font-dark"></i>
                                                                                                <span class="caption-subject bold uppercase">All Attorneys</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div style="margin-top:70px;"></div>
                                                                                         <div class="table-toolbar">
                                                                                         <div class="row">
                                                                                             <div class="col-md-6">
                                                                                                 <div class="btn-group">
                                                                                                     <a href="#responsive_1" class="btn btn-outline sbold" data-toggle="modal" >
                                                                                                         <button class="btn sbold green"> Add New
                                                                                                             <i class="fa fa-plus"></i>
                                                                                                         </button>
                                                                                                     </a>
                                                                                                 </div>
                                                                                             </div>

                                                                                         </div>
                                                                                     </div>

                                                                                        <table class="table table-striped table-bordered table-hover table-responsive" id="sample_21">
                                                                                            <thead>
                                                                                                <tr class="">
                                                                                                    <th> SL# </th>
                                                                                                    <th> Name </th>
                                                                                                    <th> Jurisdiction </th>
                                                                                                    <th> Industry Type </th>
                                                                                                    <th> Job Type </th>
                                                                                                    <th> Firm Join Date </th>
                                                                                                     <th> Actions </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
<?php
$i = 0;
foreach ($all_firm_attorney as $key7 => $value7) {
    ?>
                                                                                                                <tr>
                                                                                                                    <td> <?php echo ++$i; ?> </td>
                                                                                                                    <td> <?php echo $value7['attorney_first_name'] . ' ' . $value7['attorney_last_name']; ?> </td>
                                                                                                                    <td> <?php echo $value7['attorney_jurisdiction']; ?> </td>
                                                                                                                    <td> <?php echo $value7['industry_type']; ?> </td>
                                                                                                                    <td> <?php echo $value7['full_part_time']; ?> </td>
                                                                                                                    <td> <?php echo $value7['firm_join_date']; ?> </td>
                                                                                                                     <td>
                                                                                                                        <div class="btn-group">
                                                                                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                                                                                <i class="fa fa-angle-down"></i>
                                                                                                                            </button>
                                                                                                                            <ul class="dropdown-menu" role="menu">
                                                                                                                                <li>
                                                                                                                                    <a href="http://dev.wrctechnologies.com/ams/case/index">
                                                                                                                                        <i class="icon-docs"></i> Case
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a href="<?php echo $base_url; ?>firm/details">
                                                                                                                                        <i class="icon-docs"></i> View </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a href="http://dev.wrctechnologies.com/ams/client/edit">
                                                                                                                                        <i class="icon-tag"></i> Edit
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a href="javascript:;">
                                                                                                                                        <i class="icon-tag"></i> Delete </a>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                </tr>

<?php } ?>
                                                                                            </tbody>
                                                                                        </table>


                                                                                    </div>
                                                                                </div>-->
                                        <!-- END CHANGE PASSWORD TAB -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

            <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Location</h4>
                        </div>
                        <form action="#" name="add-location-form" id="add-location-form" method="post">

                            <input type="hidden" name="" id="url_submit1" value="<?php echo $base_url . 'firm/details/' . base64_encode($firm_info['firm_seq_no']); ?>">
                            <input type="hidden" name="add_firm_location" value="yes">

                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="validate_div_12" >
                                                <div class="form-group required">
                                                    <label class="control-label">Firm Address Type</label>
                                                    <select name="firm_addr_type" id="firm_addr_type" class="form-control ">
                                                        <option value="">Select</option>
<?php foreach ($codes['Firm Address Type'] as $key => $value) { //t($value); ?>
                                                            <option value="<?php echo $value['code']; ?>"><?php echo $value['short_description']; ?></option>
<?php } ?>

                                                    </select>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Email</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email1" id="email1"  />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Phone</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone1" id="phone1"  />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Fax</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax1" id="fax1"  />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Mobile</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile1" id="mobile1"  />
                                                </div>

                                                <div class="form-group required">
                                                    <label class="control-label">Website URL</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url1" id="web_url1"  />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Social URL</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url1" id="social_url1"  />
                                                </div>

                                                <div class="form-group required">
                                                    <label class="control-label">Address Line 1</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_11"  /> </div>

                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_21"  /> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 3</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_31"  /> </div>

                                                <div class="form-group required">
                                                    <label class="control-label">Country</label>
                                                    <select name="country11" id="location_country" class="form-control country1">
                                                        <option value="">Country</option>
<?php foreach ($country_info as $key1 => $value1) { ?>
                                                            <option value="<?php echo $value1['country_seq_no']; ?>" ><?php echo $value1['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">State</label>
                                                    <select name="state11" id="location_state" class="form-control">
                                                        <option value="">State</option>
<?php // foreach ($state_info as $key2 => $value2) {  ?>
<!--                                                            <option value="<?php echo $value2['state_seq_no']; ?>"><?php echo $value2['state_name']; ?>
                                                            </option>                                                                    -->
<?php // }  ?>
                                                    </select>
                                                </div>
                                                <!--                                    <div class="form-group">
                                                                                        <label class="control-label">County</label>
                                                                                        <select name="county11" id="county1" class="form-control">
                                                                                            <option value="">County</option>

                                                                                        </select>
                                                                                    </div>-->
                                                <div class="form-group required">
                                                    <label class="control-label">City/Town</label>
                                                    <select name="city11" id="location_city" class="form-control">
                                                        <option value="">City/Town</option>
                                                        <?php
//                                                                        if (isset($city_info) && $city_info != '') {
//                                                                    echo $city_info;
//                                                                }
//                                                           foreach ($city_info as $key3 => $value3) {
                                                        ?>
<!--                                                            <option value="<?php echo $value3['city_seq_no']; ?>" ><?php echo $value3['city_name']; ?>
                                                            </option> -->
<?php // }
?>
                                                    </select>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Postal Code</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code1" id="postal_code1" /> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" id="add-location-submit-btn" class="btn green" name="general_save_change">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- END CONTAINER -->



<?php
$i = 0;
foreach ($all_locations as $key => $value) {
    ?>
            <div id="responsive_<?php echo ++$i; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Edit Firm Location</h4>
                        </div>
                        <form id="form_id_<?php echo $key; ?>" action="<?php echo $base_url . 'firm/location-edit/' . base64_encode($value['address_seq_no']).'/'.base64_encode($value['firm_address_seq_no']); ?>" name="add-location-form" class="add-location-form firm_location_edit_form" method="post">

                            <input type="hidden" name="edit_firm_location" value="yes">
                            <input type="hidden" name="firm_id" value="<?php echo base64_encode($firm_info['firm_seq_no']); ?>">

                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="validate_div_12" >
                                                <div class="form-group required">
                                                    <label class="control-label">Firm Address Type</label>
                                                    <select name="firm_addr_type2" id="firm_addr_type2" class="form-control ">
                                                        <option value="">Select</option>
                                                                <?php foreach ($codes['Firm Address Type'] as $key1 => $value1) {
                                                                    ?>
                                                            <option value="<?php echo $value1['code']; ?>" <?php
                                                                    if ($value1['code'] == $value['firm_address_type']) {
                                                                        echo 'selected="selected"';
                                                                    }
                                                                    ?>><?php echo $value1['short_description']; ?></option>
    <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="control-label">Email</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email2" id="email2" value="<?php echo $value['email']; ?>"  />
                                                    <input  type="hidden" id="hidden_original_email" value="<?php echo $value['email']; ?>"  />

                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Phone</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" name="phone2" id="phone2" value="<?php echo $value['phone']; ?>" />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Fax</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" name="fax2" id="fax2" value="<?php echo $value['fax']; ?>"  />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Mobile</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" name="mobile2" id="mobile2" value="<?php echo $value['mobile_cell']; ?>"  />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Website URL</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" name="web_url2" id="web_url2" value="<?php echo $value['website_url']; ?>" />
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Social URL</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" name="social_url2" id="social_url2" value="<?php echo $value['social_media_url']; ?>"  />
                                                </div>

                                                <div class="form-group required">
                                                    <label class="control-label">Address Line 1</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" name="addr_line_12" value="<?php echo $value['address_line1']; ?>"  /> </div>

                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" name="addr_line_22" value="<?php echo $value['address_line2']; ?>" /> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 3</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" name="addr_line_32" value="<?php echo $value['address_line3']; ?>" /> </div>

                                                <div class="form-group required">
                                                    <label class="control-label">Country</label>
                                                    <select name="country2" country_key="<?php echo $y = $i + 100; ?>"  id="location_edit_country_<?php echo $key; ?>" class="form-control country_class">
                                                        <option value="">Country</option>
    <?php foreach ($country_info as $key1 => $value1) { ?>
                                                            <option value="<?php echo $value1['country_seq_no']; ?>" <?php if ($value1['country_seq_no'] == $value['country']) { ?> selected="selected" <?php } ?>><?php echo $value1['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">State</label>
                                                    <select name="state2" state_key="<?php echo $y; ?>"  id="location_edit_state_<?php echo $key; ?>" class="form-control state_class">
                                                        <option value="">State</option>

                                                         <?php
                                                        if (isset($state_info) && $state_info != '') {
                                                            echo $state_info;
                                                        }
                                                        ?>

    <?php //foreach ($state_info as $key2 => $value2) { ?>
<!--                                                            <option  value="<?php echo $value2['state_seq_no']; ?>" <?php if ($value2['state_seq_no'] == $value['state']) { ?> selected="selected" <?php } ?>><?php echo $value2['state_name']; ?>
                                                            </option>                                                                    -->
                                                        <?php //} ?>
                                                    </select>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">City/Town</label>
                                                    <select name="city2" id="location_edit_city_<?php echo $key; ?>" class="form-control">
                                                        <option value="">City/Town</option>
                                                        <?php
                                                        if (isset($city_info) && $city_info != '') {
                                                            echo $city_info;
                                                        }
//                                                        foreach ($city_info as $key3 => $value3) {
                                                        ?>
    <!--                                                            <option value="<?php echo $value3['city_seq_no']; ?>" <?php if ($value3['city_seq_no'] == $value['city']) { ?> selected="selected" <?php } ?>><?php echo $value3['city_name']; ?>
                                                            </option> -->
    <?php // }
    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="control-label">Postal Code</label>
                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code" name="postal_code2" id="postal_code_<?php echo $key; ?>" value="<?php echo $value['postal_code']; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" button_id="<?php echo $key; ?>" class="btn green add-location-submit-btn firm_location_edit" name="general_save_change">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="responsive_v_<?php echo $i; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View Firm Location</h4>
                        </div>
                        <div class="modal-body">
                            <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="validate_div_12" >
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" value="<?php echo $value['email']; ?>"  disabled="disabled" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Phone" value="<?php echo $value['phone']; ?>" disabled="disabled" id="phone" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fax</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Facsimile" value="<?php echo $value['fax']; ?>"  disabled="disabled" id="mobile"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Mobile</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile" value="<?php echo $value['mobile_cell']; ?>"  disabled="disabled" id="mobile"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Website URL</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Website URL" value="<?php echo $value['website_url']; ?>" disabled="disabled" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Social URL</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Social URL" value="<?php echo $value['social_media_url']; ?>" disabled="disabled"  />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Firm Address Type</label>
                                                <select class="form-control " disabled="disabled">
                                                    <option value="">Select</option>
                                                            <?php foreach ($codes['Firm Address Type'] as $key1 => $value1) {
                                                                ?>
                                                        <option value="<?php echo $value1['code']; ?>" <?php
                                                                if ($value1['code'] == $value['firm_address_type']) {
                                                                    echo 'selected="selected"';
                                                                }
                                                                ?>><?php echo $value1['short_description']; ?> </option>
    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Address Line 1</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 1" value="<?php echo $value['address_line1']; ?>" disabled="disabled"  />
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Address Line 2</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 2" value="<?php echo $value['address_line2']; ?>" disabled="disabled" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Address Line 3</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Address Line 3" value="<?php echo $value['address_line3']; ?>" disabled="disabled" />
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Country</label>
                                                <select class="form-control" disabled="disabled">
                                                    <option value="">Country</option>
    <?php foreach ($country_info as $key1 => $value1) { ?>
                                                        <option value="<?php echo $value1['country_seq_no']; ?>" <?php if ($value1['country_seq_no'] == $value['country']) { ?> selected="selected" <?php } ?>><?php echo $value1['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">State</label>
                                                <select class="form-control" disabled="disabled">
                                                    <option value="">State</option>

                                                    <?php
                                                    if (isset($state_info) && $state_info != '') {
                                                        echo $state_info;
                                                    }
                                                    ?>
    <?php //foreach ($state_info as $key2 => $value2) { ?>
<!--                                                        <option value="<?php echo $value2['state_seq_no']; ?>" <?php if ($value2['state_seq_no'] == $value['state']) { ?> selected="selected" <?php } ?>><?php echo $value2['state_name']; ?>
                                                        </option>                                                                    -->
                                                    <?php //} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">City/Town</label>
                                                <select class="form-control" disabled="disabled">
                                                    <option value="">City/Town</option>
                                                    <?php
                                                    if (isset($city_info) && $city_info != '') {
                                                        echo $city_info;
                                                    }
//                                                    foreach ($country_info as $key1 => $value1) {
                                                    ?>
    <!--                                                        <option value="<?php echo $value1['country_seq_no']; ?>" <?php if ($value1['country_seq_no'] == $value['country']) { ?> selected="selected" <?php } ?>><?php echo $value1['name']; ?></option>                                                                    -->
    <?php // }
    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Postal Code</label>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Postal Code"  value="<?php echo $value['postal_code']; ?>" disabled="disabled" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">

                
    //          $(document).ready(function () {





    //                $('#county_<?php echo $y; ?>').change(function () {
    //                    var b = BASE_URL;
    //                    $.ajax({
    //                        url: b + 'address/fetch-city/',
    //                        type: 'post',
    //                        dataType: 'json',
    //                        data: {country_id: $('#country_<?php echo $y; ?>').val(), state_id: $('#state_<?php echo $y; ?>').val(), county_seq_no: this.value},
    //                        success: function (data) {
    //                            $('#city_<?php echo $y; ?>').html(data);
    //                        }
    //                    });
    //              });
    //   )};
            </script>
<?php } ?>

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

        </style>




        <!-- BEGIN FOOTER -->
<?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script>
        <!-- <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script> -->
        <!--<script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>-->

        <script type="text/javascript">

        $(window).load(function() {
//          $("#loader_image").hide();
            $('#loader_image').delay(2000).fadeOut(1000)
        });


    $(document).ready(function () {

        // check validation for accepting only number and + for phone1 phone2 and mobile //
                                jQuery('#country_code1').keyup(function () {
                                    this.value = this.value.replace(/[^0-9\+]/g,'');
                                });

                                jQuery('#country_code2').keyup(function () {
                                    this.value = this.value.replace(/[^0-9\+]/g,'');
                                });
                                // -------------end---------------- //

        $('.country_class').change(function () {
            var country_key=$(this).attr('country_key');
            var country_id=$(this).val();
//              alert(country_key);
            var b = BASE_URL;
            $.ajax({
                url: b + 'address/fetch-state/',
                type: 'post',
                dataType: 'json',
                data: {country_id: country_id},
                success: function (data) {
//                    alert(data);
                    $('#location_edit_state_'+country_key).html(data);
//                            $('#location_edit_county_<?php echo $y; ?>').html('<option value="">County</option>');
                    $('#location_edit_city_'+country_key).html('<option value="">City/Town</option>');
                }
            });
        });

        $('.state_class').change(function () {
         var state_key=$(this).attr('state_key');
         var state=$(this).val();
         var country_id=$('#location_edit_country_'+state_key).val();
            var b = BASE_URL;
            $.ajax({
                url: b + 'address/fetch-county/',
                type: 'post',
                dataType: 'json',
                data: {
                    country_id: country_id,
                    state_id: state
        },
                success: function (data) {
                    /*$('#county_<?php echo $y; ?>').html(data);
                     $('#city_<?php echo $y; ?>').html('<option value="">City/Town</option>');*/
                    $('#location_edit_city_'+state_key).html(data.city);
                }
            });
        });
        //                $('#sample_21').DataTable();

        $('#country').change(function () {

            var b = BASE_URL; //alert(b);
            $.ajax({
                url: b + 'address/fetch-state/',
                type: 'post',
                dataType: 'json',
                data: {country_id: this.value},
                success: function (data) {
                    console.log(data);
                    $('#state').html(data);
                    //                            $('#county1').html('<option value="">County</option>');
                    $('#city').html('<option value="">City/Town</option>');
                }
            });
        });

        $('#location_country').change(function () {
            var b = BASE_URL;
            $.ajax({
                url: b + 'address/fetch-state/',
                type: 'post',
                dataType: 'json',
                data: {country_id: this.value},
                success: function (data) {
                    $('#location_state').html(data);
                    //                            $('#county2').html('<option value="">County</option>');
                    $('#location_city').html('<option value="">City/Town</option>');
                }
            });
        });

        $('#state').change(function () {
            var b = BASE_URL;
            $.ajax({
                url: b + 'address/fetch-county/',
                type: 'post',
                dataType: 'json',
                data: {
                    country_id: $('#country1').val(),
                    state_id: this.value
                },
                success: function (data) {
                    //                            alert(data);
                    //                            $('#county1').html(data.county);
                    $('#city').html(data.city);
                }
            });
        });

        $('#location_state').change(function () {
            var b = BASE_URL;
            $.ajax({
                url: b + 'address/fetch-county/',
                type: 'post',
                dataType: 'json',
                data: {
                    country_id: $('#location_country').val(),
                    state_id: this.value
                },
                success: function (data) {
                    //                            alert(data);
                    //                            $('#county2').html(data.county);
                    $('#location_city').html(data.city);
                }
            });
        });


        $('#myfirm-general-info-edit-form').validate({
                        rules: {
                            fname: {
                                required: true
                            },
                            lname: {
                                required: true
                            },
                            designation_code: {
                                required: true,
                            },
                            firm_name: {
                                required: true,
                            },
                            firm_code: {
                                required: true
                            },
                            sp_name: {
                                required: true
                            },
                            sp_role: {
                                required: true
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            country_code3: {
                                required: true,
                                maxlength: 3,
                                minlength: 3,
                                accept: "[0-9]+"
                            },
                            phone: {
                                required: true,
                                accept: "[0-9-\(\)]+"
                            },
                            addr_line_1: {
                                required: true
                            },
                            country: {
                                required: true
                            },
                            state: {
                                required: true
                            },
                            city: {
                                required: true
                            },
                            postal_code: {
                                required: true
                            },
                            company_logo: {
                                extension: "jpg|jpeg|png|gif"
                            },
                        },
                        messages: {
                            fname: {
                                required: "<font color=\"red\">Please enter first name !</font>"
                            },
                            lname: {
                                required: "<font color=\"red\">Please enter last name !</font>"
                            },
                            designation_code: {
                                required: "<font color=\"red\">Please enter designation code !</font>",
                            },
                            firm_name: {
                                required: "<font color=\"red\">Please enter firm name !</font>",
                            },
                            firm_code: {
                                required: "<font color=\"red\">Please enter firm code!</font>"
                            },
                            sp_name: {
                                required: "<font color=\"red\">Please enter single point name !</font>"
                            },
                            sp_role: {
                                required: "<font color=\"red\">Please enter single point role !</font>"
                            },
                            email: {
                                required: "<font color=\"red\">Please enter email !</font>",
                                email: "<font color=\"red\">Please enter valid email !</font>"
                            },
                            country_code3: {
                                required: "<font color=\"red\">Please enter your country code!</font>",
                                maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                                minlength: "<font color=\"red\">Please enter your correct country code !</font>",
                                accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>"
                            },
                            phone: {
                                required: "<font color=\"red\">Please enter phone !</font>"
                            },
                            addr_line_1: {
                                required: "<font color=\"red\">Please enter address !</font>"
                            },
                            country: {
                                required: "<font color=\"red\">Please enter country !</font>"
                            },
                            state: {
                                required: "<font color=\"red\">Please enter state !</font>"
                            },
                            city: {
                                required: "<font color=\"red\">Please enter city !</font>"
                            },
                            postal_code: {
                                required: "<font color=\"red\">Please enter postal code !</font>"
                            },
                            company_logo: {
                                required: "<font color=\"red\">Extension not allowed !</font>"
                            }
                        }
                    });


    });

        </script>

        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <link rel="stylesheet" href="<?php echo $assets_path; ?>custom/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo $assets_path; ?>custom/js/bootstrap-multiselect.js"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script>
            function open_firmaddr_modal(id)
            {
                $('#modal_for_location').modal('show');
                $('#firm_address_seq_no_on_modal').val(id);
            }
        </script>
        <!-- address db -->
        <script type="text/javascript">
            $('#practice_area').multiselect({
                    includeSelectAllOption: true,
                enableFiltering: true,
                numberDisplayed: 3,
                enableCaseInsensitiveFiltering: true,
                maxHeight: 300,
                maxWidth: 100
            });
        </script>
        <script type="text/javascript">
            var FormInputMask = function () {

                var handleInputMasks = function () {

                    $("#phone").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });
                    $("#phone1").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                    $("#phone2").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                    $("#phone3").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });

                    $("#mobile").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });
                    $("#mobile1").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                    $("#mobile2").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                    $("#mobile3").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                    /*$("#fax").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });*/
                    $("#fax1").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                    $("#fax2").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                    $("#fax3").inputmask("mask", {
                        "mask": "(999) 999-9999"
                    });
                }
                return {
                    //main function to initiate the module
                    init: function () {
                        handleInputMasks();
//                        handleIPAddressInput();
                    }
                };

            }();

            if (App.isAngularJsApp() === false) {
                jQuery(document).ready(function () {
                    FormInputMask.init(); // init metronic core componets
                });
            }
            $('#web_url').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#web_url1').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url1').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#web_url2').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url2').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#web_url3').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
            $('#social_url3').keyup(function () {
                if (
                        ($(this).val().length > 5) && ($(this).val().substr(0, 7) !== 'http://') || ($(this).val() === ''))
                {
                    $(this).val('http://' + $(this).val());
                }
            });
        </script>



    </body>

</html>
