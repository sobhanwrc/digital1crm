<!DOCTYPE html>

<?php // t ($fetch_module_details); die(); ?>

<html lang="en">

    <!--<![endif]-->

    <!-- BEGIN HEAD -->



    <?php echo $header_link; ?>

    <!-- END HEAD -->

    <style>

        .add_form_sec h3 {

            font-size: 18px !important;

            width: 100%;

            height: 30px;

            margin-bottom: 0 !important;

            margin-top: 0 !important;

            text-align: left;

            padding-left: 0 !important;

        }



        .add_input_edit_area {

            margin: 0;

            width: 100%;

            display: inline-block;

            height: 300px;

            transition : height 1s linear;

        }



        .add_input_edit_area.short{



            height : 300px;

        }



        .caption .btn-sm {

            padding: 5px 10px;

            font-size: 12px;

            line-height: 1.5;

            border-radius: 3px;

        }



        .add_input_edit_area h3 {

            font-size: 18px !important;

            width: 100%;

            height: 30px;

            margin-bottom: 0 !important;

            margin-top: 0 !important;

            text-align: left;

            padding-left: 0 !important;

        }

        .portlet.light .portlet-body {

            padding-top: 0;

        }



        .form-group {

            margin-bottom: 0;

        }



        .dropdown-menu {

            box-shadow: 5px 5px rgba(102,102,102,.1);

            left: -50px;

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

            margin-bottom: 50px;



        }



        .btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {

            position: absolute;

            top: -8px;

            left: 55px;

            right: auto;

            display: inline-block !important;

            border-right: 8px solid transparent;

            border-bottom: 8px solid #e0e0e0;

            border-left: 8px solid transparent;

            content: '';

        }



        .btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {

            position: absolute;

            top: -7px;

            left: 54px;

            right: auto;

            display: inline-block !important;

            border-right: 7px solid transparent;

            border-bottom: 7px solid #fff;

            border-left: 7px solid transparent;

            content: '';

        }



        #div1 {

            height: 1px;

            width: 100%;

            background: #fff;

            text-align: left;

            transition : height 1s linear;

            margin-bottom: 30px;

            overflow: hidden;

            display: inline-block;

            /*	border-bottom: 1px solid #e7ecf1 !important;*/

        }



        .control-label {

            margin-top: 6px;

            font-weight: 400;

        }



        #div1.short{



            height: 1000px;

            margin-bottom: 30px;

        }

        .add_input_edit_area .form-control {

            height: 40px;

            margin-bottom: 8px;

            float: left;

        }



        .portlet.light .dataTables_wrapper .dt-buttons {

            margin-top: -38px;

        }



        .menu_icon {

            margin: 0;

            width: auto !important;;

            margin-right: 5px;

            height: 18px !important;

            display: inline-block;

            vertical-align: sub;

        }



    </style>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



    <script>



        var aboutMe = function (x) {

            $(x).toggleClass('short')

        };



        $(function () {

            $('#clicker').click(function () {

                aboutMe('#div1');

                if ($(this).find('i').hasClass('fa-angle-down')) {

                    $(this).find('i').removeClass('fa-angle-down');

                    $(this).find('i').addClass('fa-angle-up');

                } else {

                    $(this).find('i').addClass('fa-angle-down');

                    $(this).find('i').removeClass('fa-angle-up');

                }

            });

        });









    </script>



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

                    <div class="page-bar" style=" position: relative">


                        <div class="col-md-8">

                            <ul class="page-breadcrumb">

                                <li>

                                    <a href="<?php echo base_url() ?>dashboard">Home</a>

                                    <i class="fa fa-circle"></i>

                                </li>

                                <li>

                                    <!-- <a href="#">Master Contacts</a> -->

                                    <a href="<?php echo base_url() ?>targets">Module1</a>

                                    <i class="fa fa-circle"></i>

                                </li>

                                <li>

                                    <span>View</span>

                                </li>

                            </ul>

                        </div>



                        <div class="col-md-4">

                            <table width="180px" align="right">

                                <tr>



                                    <td style="width: 35px" height="40px" valign="top">

                                        <?php if ($prev_target_seq_no) { ?>

                                            <a style="width: 100%; display: block" href="<?php echo $base_url; ?>targets/details/<?php echo base64_encode($prev_target_seq_no); ?>" id="prev"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-left"></i></a>

                                        <?php } ?>

                                    </td>





                                    <td style=" width: 90px">

                                        <div class="btn-group btn-group-devided" data-toggle="buttons">

                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">

                                            <!--<input name="options" class="toggle" id="option1" type="radio">-->

                                                <a style=" text-decoration: none; color:#fff" href="" onclick="javascript:window.location.href = '<?php echo $base_url; ?>targets'"> Back to Listing</a></label>

                                        </div>

                                    </td>





                                    <td style=" width: 35px" height="40px" valign="top">

                                        <?php if ($next_target_seq_no) { ?>

                                            <a style="width: 100%; display: block" href="<?php echo $base_url; ?>targets/details/<?php echo base64_encode($next_target_seq_no); ?>" id="next"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-right pull-right"></i></a>

                                        <?php } ?>

                                    </td>



                                </tr>





                            </table>



                        </div>





                    </div>

                    <!-- END PAGE BAR -->



                    <!-- END PAGE HEADER-->

                    <div class="row">

                        <div class="col-md-12">

                            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                            <div class="portlet light bordered">

                                <?php //echo '<pre>';print_r($targets);die; ?>

                                <div class="portlet-title company_header">

                                  

<!--

                                  <div class="col-md-4 col-lg-4">

                                        <div class="caption font-dark" style=" padding-top: 25px">

                                            

                                            <?php if($fetch_add_contact_details['is_primary_contact']=='1'){ ?>

                                                <span class="caption-subject bold" style=" width: 100%; display: block"><?php echo $fetch_add_contact_details['first_name'].' '. $fetch_add_contact_details['last_name']; ?></span>

                                            <?php } ?>

                                             



                                        </div>



                                    </div>

-->

                                    

                                    
                                    
                                   <div class="custom_header">

                                    <?php if ($targets['type'] == "C") {


                                        if(!empty($targets['target_image'])) {

                                            $image_name = base_url()."assets/upload/image/".$targets['target_image'];

                                        ?>

                                          <img class="corporate_image" style="border-radius:0 !important;" src="<?php echo $image_name;?>" alt="logo" class="logo-default">

                                        <?php } else { ?>

                                          <img class="corporate_image" style="border-radius:0 !important;" src="<?php echo base_url(); ?>assets/upload/image/user_blank.jpg" alt="logo" class="logo-default">

                                        <?php } ?>

                                    <?php }  else {

                                        if(!empty($targets['target_image'])) {

                                            $image_name = base_url()."assets/upload/image/".$targets['target_image'];

                                            ?>

                                            

                                            <div class="individual">

                                            <img src="<?php echo $image_name; ?>" alt="logo" class="logo-default">

                                            </div>

                                        <?php } else { ?>

                                            <img class="individual" src="<?php echo base_url(); ?>assets/upload/image/user_blank.jpg" alt="logo" class="logo-default">

                                    <?php } }?>

                                       

                                       

                                        <div style=" width: 100%; margin: 0 auto;">

                                            <div style="width: 100%; display: inline-block;">

                                                <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Target :</strong></span>

                                                <?php if ($targets['type'] == "C") { ?>

                                                <span style=" font-size: 20px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;"><?php  echo $targets['company'] ?>,</span>

                                                

                                                    <span style=" width: auto; padding: 0 5px; font-weight: bold; display: inline-block;">

                                                        <div>

                                                            <?php  echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>

                                                        </div>

                                                        



                                                    </span>

                                                <?php } else{?>

                                                <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;"><?php  echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>,</span>

                                                

                                                    <span style=" width: auto; padding: 0 5px; font-weight: bold; display: inline-block;">

                                                        <div>

                                                            <?php echo $targets['company']; ?>

                                                        </div>

                                                    

                                                    </span>

                                                <?php }?>



                                                <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php  echo $targets['email']; ?></span>

                                                <?php if ($targets['lead_source_and_date']){ ?>
                                                	<span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                    	<strong>Lead Source:</strong>                                                    	 
                                                   	  		<?php echo $targets['lead_source_and_date'];?>
                                                    </span>
                                                <?php }?>


                                                <span style=" width: auto; padding: 0 5px; display: inline-block;">

                                                    <strong>Phone:</strong> <?php  echo $targets['phone']; ?>



                                                <a class="call_now" id="call_now_module1" href="javascript:void(0)" val='<?php echo $targets['target_seq_no']; ?>' from_model="module1" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>"><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                                </span>
                                            </div>

                                            <?php 

                                            if($targets['type'] == "I"){

                                                if($fetch_add_contact_details){ ?>

                                                    <div style="width: 100%; display: inline-block;">

                                                        <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>

                                                        

                                                        <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">

                                                        <?php if($fetch_add_contact_details['is_primary_contact']=='1'){ ?>

                                                       

                                                            <div><?php echo $fetch_add_contact_details['first_name'].' '. $fetch_add_contact_details['last_name']; ?>,</div>

                                                        

                                                        <?php } ?>

                                                            

                                                        </span>

                                                        

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $fetch_add_contact_details['email']; ?></span>

                                                        

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">

                                                            <?php if($fetch_add_contact_details['is_primary_contact']=='1') { ?>

                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $fetch_add_contact_details['phone']; ?>

                                                                    <a class="call_now" href="javascript:void(0)" val='<?php echo $targets['target_seq_no']; ?>' from_model="module1" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>"><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                                                </div>

                                                            <?php } ?>



                                                        </span>

                                                        

                                                    </div>

                                                <?php } } else{

                                                if($fetch_add_contact_details){ ?>

                                                <div style="width: 100%; display: inline-block;">

                                                        <span style=" width: 150px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>

                                                        <span style=" font-size: 20px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">

                                                        <?php if($fetch_add_contact_details['is_primary_contact']=='1'){ ?>

                                                       

                                                            <div><?php echo $fetch_add_contact_details['first_name'].' '. $fetch_add_contact_details['last_name']; ?>,</div>

                                                        

                                                        <?php } ?>

                                                            

                                                        </span>

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $fetch_add_contact_details['email']; ?></span>

                                                        

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">

                                                            <?php if($fetch_add_contact_details['is_primary_contact']=='1') { ?>

                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $fetch_add_contact_details['phone']; ?>

                                                                    <a class="call_now" href="javascript:void(0)" val='<?php echo $targets['target_seq_no']; ?>' from_model="module1" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>"><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                                                </div>

                                                            <?php } ?>



                                                        </span>

                                                        

                                                    </div>

                                            <?php } else {?>

                                                <div style="width: 100%; display: inline-block;">

                                                        <span style=" width: 150px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>

                                                        <span style=" font-size: 20px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">

                                                       

                                                            <div><?php  echo $targets['target_first_name'] . ' ' . $targets[0]['target_last_name']; ?></div>

                                                            

                                                        </span>

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $targets['email']; ?></span>

                                                        

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">

                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $targets['phone']; ?>

                                                                    <a class="call_now" href="javascript:void(0)" val='<?php echo $targets['target_seq_no']; ?>' from_model="module1" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>"><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                                                </div>



                                                        </span>

                                                        

                                                    </div>

                                            <?php } }?>

                                        </div>

                                  </div>

                                </div>

                                <div class="portlet-body">

                                    <div class="row">



                                        <div style=" width: 100%; display: inline-block">

                                            <div class="main_hidediv_area">

                                                <form role="form" id="myfirm-general-info-form" autocomplete="off" method="post" >

                                                    <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo base64_encode($targets['target_seq_no']); ?>">

                                                    <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo base64_encode($firm_seq_no); ?>">

                                                    <!--<input type="hidden" name="target_seq_no" value="<?php echo $targets['target_seq_no']; ?>">-->

                                                    <div class="col-md-12">

                                                        <?php

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



                                                    <?php if($role_code!="SITEADM") { ?>

                                                        <div class="col-md-12" style=" padding-right: 0; padding-left: 0; text-align: left">

                                                        <?php if ($fetch_module_details[0]['content'] != '') { ?>

                                                                <span class="caption-subject bold" style=" width: 40%; display:inline-block; text-align: left"> <?php echo $fetch_module_details[0]['content']; ?> </span>

                                                        <?php } ?>

                                                            <button style=" margin-bottom: 15px; margin-top: 10px" class="btn btn-transparent dark btn-outline btn-circle active1" id="btn_make_appointment" type="button">

                                                                <img src="<?php echo $assets_path; ?>pages/img/Make_Appointment.png" alt="" class="menu_icon" />Make Appointment

                                                            </button>
                                                            
                                                                <span style=" width: 230px; margin-right: 0px; margin-top: 10px; float: right; text-align: right; display: inline-block">

                                                                    <button class="btn btn-transparent dark btn-outline btn-circle active" type="button" id="add_new_master_contact">

                                                                    <img src="<?php echo $assets_path; ?>pages/img/new_master_contact.png" alt="" class="menu_icon" />

                                                                    Add New Master Contact</button>

                                                                </span>
                                                        </div>
                                                    <?php }?>

                                                        <div class="row">

                                                            <div class="col-md-6">

                                                                <h3 class="hint"> General Informations </h3>

                                                                <div class="portlet light bordered">

                                                                    <div class="form-group bb">

                                                                        <label class="control-label">First Name</label>

                                                                        <input type="text" placeholder="Enter Firm Name" class="form-control text-field" name="target_first_name" id="target_first_name" value="<?php

if (isset($targets['target_first_name']) && $targets['target_first_name'] != '') {

    echo $targets['target_first_name'];

}

?>"/> </div>



                                                                    <div class="form-group bb">

                                                                        <label class="control-label">Last Name</label>

                                                                        <input type="text" placeholder="Enter Firm Name" class="form-control text-field" name="target_last_name" id="target_last_name" value="<?php

if (isset($targets['target_last_name']) && $targets['target_last_name'] != '') {

    echo $targets['target_last_name'];

}

?>"/> </div>



                                                                    <div class="form-group bb">

                                                                        <label class="control-label">Email</label>

                                                                        <input type="text" placeholder="Enter Firm ID" class="form-control" name="email_target_id" id="email_target_id" value="<?php echo $targets['email']; ?>"/>

                                                                    </div>



                                                                    <div class="form-group bb">

                                                                        <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>

                                                                        <!--<input type="text" placeholder="" class="form-control" disabled="" name="target_code" id="target_code" value="<?php echo $targets['phone']; ?>" />-->

                                                                        <input type="text" value="<?php echo $targets['country_code1']; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block">

                                                                        <input type="text" placeholder="" value="<?php echo $targets['home_phone_10']; ?>" class="form-control phone" id="home_phone" name="home_phone" style="width: 83%; margin-left: -5px; display: inline-block">

                                                                        

                                                                        <label id="country_code1-error" class="error" for="country_code1"></label>

                                                                        <label id="home_phone-error" class="error" for="home_phone"></label>

                                                                    </div>



                                                                    <div class="form-group bb">

                                                                        <label class="control-label" style=" width: 100%; display: inline-block">Mobile</label>

                                                                        <input type="text" value="<?php echo $targets['country_code2']; ?>" placeholder="" class="form-control" id="country_code2" name="country_code2" autocomplete="off" style="width: 15%; display: inline-block">

                                                                        <input type="text" placeholder="" class="form-control" name="mobile" id="mobile123" value="<?php echo $targets['home_mobile_10']; ?>" style="width: 83%; margin-left: -5px; display: inline-block"/>

                                                                    </div>



                                                                    <div class="form-group bb">

                                                                        <label class="control-label">Address</label>

                                                                        <input type="text" placeholder="" class="form-control" name="address1" id="address1" value="<?php echo $targets['address']; ?>"/>

                                                                    </div>



                                                                    <div class="form-group bb">

                                                                        <label class="control-label">Company Name</label>

                                                                        <input type="text" placeholder="Enter Target Company" class="form-control text-field" name="target_company_name" id="target_company_name" value="<?php echo $targets['company']; ?>"/>

                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label class="control-label">Categories</label>

                                                                        <input type="text" placeholder="Enter Target Company" class="form-control text-field" name="industry_type" id="industry_type" value="<?php echo $targets['categories']; ?>"/>

                                                                    </div>



                                                                    <div class="form-group">

                                                                        <label class="control-label">Date Contacted</label>

                                                                        <input type="text" placeholder="" class="form-control" name="date_contacted" id="" value="<?php echo date("d-m-Y"); ?>" readonly/>

                                                                    </div>

                                                                    <?php if($role_code=="SITEADM"){ ?>
                                                                        <div class="form-group">
                                                                            <label  class="control-label input-group">Contact Type</label>
                                                                            <div class="btn-group" data-toggle="buttons">
                                                                                <label for="contact_type" style="color: #333; border: 1px solid #8c8c8c;" class="btn btn-default<?php if($targets['type']=='I'){?> active<?php }?>">
                                                                                    <input type="radio" name="new_contact_type"  id="new_contact_type" value="I">Individual
                                                                                </label>
                                                                                <label for="contact_type" style="color: #333; border: 1px solid #8c8c8c;" class="btn btn-default<?php if($targets['type']=='C'){?> active<?php }?>">
                                                                                    <input type="radio" name="new_contact_type" id="new_contact_type" value="C">Corporate
                                                                                </label>
                                                                            </div>
                                                                            <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >
                                                                        </div>
                                                                    <?php }?>



                                                                </div>



                                                            </div>


                                                        <?php if($role_code!="SITEADM"){ ?>
                                                            <div class="col-md-6">

                                                                <div class="comm_section" data-toggle="buttons">

                                                                <ul class="list-inline pull-right">

                                                                    <li><a href="" data-target="#textModal" data-toggle="modal" id="" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>"><i class="fa fa-envelope-o"></i> SMS</a></li>

                                                                    <li><a href="" onclick="javascript:window.location.href = '<?php echo $base_url; ?>targets/temp_email/<?php echo base64_encode($targets['target_seq_no']) ?>/<?php echo base64_encode($targets['company_id']) ?>'"><i class="fa fa-envelope-o"></i> Email</a></li>

                                                                    <li>

                                                                        <button style=" padding:6px 0; background-color: transparent; color:#337ab7" type="button" class="btn" data-toggle="popover" data-content="<?php echo $row[0]['note1']; ?> " data-html="true"><i class="fa fa-code"></i> Script</button>



                                                                </ul>

                                                            </div>



                                                                <div class="portlet light bordered" style=" display: inline-block; width: 100%;">

                                                                    <div class="col-md-5">

                                                                        <div class="checkbox">

                                                                            <label><input style="margin-top: 3px; margin-right: 10px" id="corporate" name="corporate" type="checkbox" <?php if ($targets['type'] == "C") { ?> checked="checked" <?php } ?> value="C">Corporate</label>

                                                                        </div>

                                                                        <div class="checkbox">

                                                                            <label><input style="margin-top: 3px; margin-right: 10px" id="individual" name="individual" type="checkbox" <?php if ($targets['type'] == "I" || $targets['type'] == NULL) { ?> checked="checked" <?php } ?> value="I">Individual</label>

                                                                        </div>

                                                                    </div>



                                                                    <div class="col-md-7" style=" padding-right: 0">

                                                                        <div class="next_date_area">

                                                                            <ul class="list-unstyled">

                                                                                <li>

                                                                                    <button class="btn btn-transparent dark btn-outline btn-circle active" id="btn_next_call" type="button">

                                                                                        <img src="<?php echo $assets_path; ?>pages/img/Next_Call_Date.png" alt="" class="menu_icon" />Next Call Date

                                                                                    </button>

                                                                                </li>



                                                                                <!--<li><button class="btn btn-transparent dark btn-outline btn-circle active">None</button>

                                                                                </li>-->

                                                                                <li>

                                                                                    <button class="btn btn-transparent dark btn-outline btn-circle active" id="btn_add_contact" type="button">

                                                                                        <img src="<?php echo $assets_path; ?>pages/img/Add_Contact.png" alt="" class="menu_icon" />Add Contact

                                                                                    </button>

                                                                                </li>

                                                                                <li>

                                                                                    <button class="btn btn-transparent dark btn-outline btn-circle active" id="btn_add_note" type="button">

                                                                                        <img src="<?php echo $assets_path; ?>pages/img/Add_Note.png" alt="" class="menu_icon" />Add Note

                                                                                    </button>

                                                                                </li>

                                                                                <li>

                                                                                    <button class="btn btn-transparent dark btn-outline btn-circle active" id="btn_do_not_call" type="button">

                                                                                        <img src="<?php echo $assets_path; ?>pages/img/Not_Call_Me.png" alt="" class="menu_icon" />Do Not Call Me

                                                                                    </button>

                                                                                </li>

                                                                            </ul>

                                                                        </div>

                                                                    </div>
                                                              </div>

                                                            </div>

                                                        <?php }?>


                                                            <div class="col-md-12">

                                                            <?php if($role_code != 'SITEADM'){ ?>
                                                                <input type="submit" id="general-edit-submit-btn" class="btn green" name="submit" value="Submit">
                                                            

                                                                <input style="margin-right: 10px" type="button" id="btn_cancel_main"  class="btn green" name="" value="Cancel">
                                                                <?php } 
                                                                ?>
                                                            </div>

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

                <!-- END QUICK SIDEBAR -->



            </div>



            <!--            //script model-->



            <!--            //end script model-->



            <!--Note Modal -->

            <div class="modal fade" id="noteModal" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add New Note</b></div>

                        </div>

                        <div class="modal-body">

                            <div id="create_event" class=" mt10">

                                <div class="form-group" id="existing_group_field">

                                    <div style="width: 100%"><label>Write Note</label></div>

                                    <div class="input-group " style="width: 100%">

                                        <textarea name="newnotes" id="newnotes" class="text-area" cols="75" rows="5"></textarea>

                                    </div>

                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >

                                </div>



                                <div class="clearfix"></div>



                            </div>

                        </div>

                        <div class="modal-footer">

                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                            <div class="input-group col-md-12" style="padding-right:15px">

                                <input type="button" value="Submit" class="submit btn green pull-right" name="master_name_submit_note" id="master_name_submit_note" >

                                <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!--End Note Modal -->



            <!--Do Not Call Me Modal -->

            <div class="modal fade" id="DoNotCallMeModal" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Do Not Call Me</b></div>

                        </div>

                        <div class="modal-body">

                            <div id="create_event" class=" mt10">

                                <div class="form-group" id="existing_group_field">

                                    <div style="width: 100%"><label>Write Note</label></div>

                                    <div class="input-group " style="width: 100%">

                                        <textarea name="do_not_call" id="do_not_call" class="form-control" cols="75" rows="5"></textarea>

                                    </div>

                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >

                                </div>



                                <div class="clearfix"></div>



                            </div>

                        </div>

                        <div class="modal-footer">

                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                            <div class="input-group col-md-12" style="padding-right:15px">

                                <input type="button" value="Submit" class="submit btn green pull-right" name="master_name_do_not_call" id="master_name_do_not_call" >

                                <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!--End Note Modal -->





            <!--Do Not Call Me Modal -->

            <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add Contact</b></div>

                        </div>

                        <div class="modal-body">

                            <div id="create_event" class=" mt10">

                                <div class="col-md-12">

                                    <form name="frmAddContact" id="frmAddContact" method="POST" novalidate>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>First Name</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="contact_first_name" id="contact_first_name" class="form-control text-area">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Last Name</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="contact_last_name" id="contact_last_name" class="form-control text-area">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Email</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="contact_email" id="contact_email" class="form-control text-area">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Phone</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <!--<input type="text" name="contact_phone" id="contact_phone" class="form-control text-area">-->

                                                <input type="text" value="" placeholder="" class="form-control text-area" id="add_contact_phone_country_code" name="add_contact_phone_country_code" autocomplete="off" style="width: 15%; display: inline-block">

                                                <input type="text" name="contact_phone" id="contact_phone" class="form-control text-area" style="width: 85%; display: inline-block">

                                            </div>

                                            <label id="add_contact_phone_country_code-error" class="error" for="add_contact_phone_country_code"></label>

                                            <label id="contact_phone-error" class="error" for="contact_phone"></label>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Designation</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="contact_designation" id="contact_designation" class="form-control">

                                            </div>



                                        </div>

                                        <div class="form-group">

                                            <div style="width: 21%; display: inline-block"><label>Primary Contact</label></div>

                                            <div class="input-group" style="width: 60%; display: inline-block">

                                                <input type="checkbox" name="contact_primary" id="contact_primary" value="1">

                                            </div>

                                            <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >

                                        </div>

                                    </form>

                                </div>

                                <div class="clearfix"></div>



                            </div>

                        </div>

                        <div class="modal-footer">

                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                            <div class="input-group col-md-12" style="padding-right:15px">

                                <input type="button" value="Submit" class="submit btn green pull-right" name="master_name_add_contact" id="master_name_add_contact" >

                                <div id="master_name_submit_loader" style="display:none; padding-girht:15px;"><font color="green"><img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!--End Note Modal -->

            <!-- Add New Master Contact Module -->

            <div class="modal fade" id="add_new_master_contact_module" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add New Master Contact</b></div>

                        </div>

                        <div class="modal-body">

                            <div id="create_event" class=" mt10">

                                <div class="col-md-12">

                                    <form name="frmAddNewContact" id="frmAddNewContact" method="POST" novalidate enctype="multipart/form-data">

                                        <div class="form-group">

                                            <div style="width: 100%"><label>First Name</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="new_contact_first_name" id="new_contact_first_name" class="form-control text-area text-field">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Last Name</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="new_contact_last_name" id="new_contact_last_name" class="form-control text-area text-field">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Email</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="new_contact_email" id="new_contact_email" class="form-control text-area">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Phone</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" value="<?php echo $targets['']; ?>" placeholder="" class="form-control" id="new_contact_phone_country_code" name="new_contact_phone_country_code" autocomplete="off" style="width: 15%; display: inline-block">

                                                <input type="text" name="new_contact_phone" id="new_contact_phone" class="form-control text-area" style="width: 85%; display: inline-block">

                                            </div>

                                            <label id="new_contact_phone_country_code-error" class="error" for="new_contact_phone_country_code"></label>

                                            <label id="new_contact_phone-error" class="error" for="new_contact_phone"></label>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Mobile</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="new_contact_mobile" id="new_contact_mobile" class="form-control text-area mobile-field" maxlength="10">

                                            </div>

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

                                                <input type="text" name="new_contact_company" id="new_contact_company" class="form-control text-area text-field">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Categories</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="new_contact_category" id="new_contact_category" class="form-control text-area text-field">

                                            </div>



                                        </div>

                                        <div class="form-group">

                                            <div style="width: 100%"><label>Date Contacted</label></div>

                                            <div class="input-group" style="width: 100%;">

                                                <input type="text" name="new_contact_date" id="new_contact_date" class="form-control text-area" value="<?php echo date("d-m-Y"); ?>" readonly>

                                            </div>



                                        </div>

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

                                                    <input type="radio" name="new_contact_type" checked="checked"  value="I">Individual

                                                </label>

                                                <label for="contact_type" class="btn btn-default">

                                                    <input type="radio" name="new_contact_type" value="C">Corporate

                                                </label>

                                            </div>

                                            <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >

                                        </div>

                                    </form>

                                </div>

                                <div class="clearfix"></div>



                            </div>

                        </div>

                        <div class="modal-footer">

                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                            <div class="input-group col-md-12 pull-right" style="padding-right:15px">

                                <input type="button" style="margin-right: 10px;" value="Submit" class="submit btn green pull-right" name="btn_new_contact" id="btn_new_contact" >

                                <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- End Module -->

            <!--Next Call Modal -->



            <div class="modal fade" id="NextCallModal" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <form name="next_call_date_time" autocomplete="off" id="next_call_date_time" method="post">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> Next Call Date & Time</b></div>

                            </div>

                            <div class="modal-body">

                                <div id="create_event" class=" mt10" style=" display: inline-block; width: 100%;">



                                    <div class="col-md-7" style=" padding-left: 0;">

                                        <div style="width: 100%"><label>Date</label></div>

                                        <div class="input-group " style="width: 100%">

                                            <!-- <input type="text" name="next_call_date" value=""  placeholder="" class="form-control "> -->

                                            <input style="width: 90%"  aria-describedby="datepicker-error" aria-required="true" aria-invalid="false"  type="text" id="next_call_date" name="next_call_date" value=""  placeholder="DD-MM-YYYY" class="form-control " readonly>

                                            <span class="input-group-btn" style="display: -moz-box; vertical-align: top">

                                                <button class="btn default" type="button">

                                                    <i class="fa fa-calendar"></i>

                                                </button>

                                            </span>

                                            <label id="next_call_date-error" class="error" for="next_call_date"></label>

                                        </div>

                                    </div>

                                    <div class="col-md-5" style=" padding-right: 0">

                                        <div style="width: 100%"><label>Time</label></div>

                                        <div class="input-group " style="width: 100%">

                                            <input type="text" id="basicExample" name="next_call_time" value="" placeholder="" class="form-control">

                                            <!--<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>-->

                                        </div>

                                    </div>



                                    <div class="col-md-12" style=" padding-left: 0; padding-right: 0">

                                        <div class="form-group">

                                            <label for="comment">Add Note</label>

                                            <textarea class="form-control text-area" rows="2" id="next_call_date_notes" name="next_call_date_notes"></textarea>

                                        </div>



                                    </div>



                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >



                                </div>

                            </div>

                            <div class="modal-footer">

                                <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                                <div class="input-group col-md-12" style="padding-right:15px">

                                    <input type="button" value="Submit" class="submit btn green pull-right" name="next_call_date_submit" id="next_call_date_submit" >

                                    <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>



            </div>



            <!-- END -- >



            <!-- Make Appointment Modal -->

            <div class="modal fade" id="appointment_date_and_time_div" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">

                        <form name="appointment_date_time_form" id="appointment_date_time_form" method="post" novalidate>

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> Appointment Date & Time</b></div>

                            </div>

                            <div class="modal-body" style=" display: inline-block; width: 100%">

                                <div id="create_event" class=" mt10">

                                    <div style="width: 100%"><label> Appointment Date & Time</label></div>

                                    <p id="datepairExample">

                                        <input style="width: 115px; border: 1px solid #C2CAD8; padding: 6px 12px; display: inline-block"  aria-describedby="datepicker-error" aria-required="true" aria-invalid="false"  type="text" id="to_appt_date" name="to_appt_date" value=""  placeholder="DD-MM-YYYY" class="form-control " readonly>

                                        <input style=" width: 100px; border: 1px solid #C2CAD8; padding: 6px 12px; display: inline-block" type="text" class="time start form-control" name="from_appt_time" id="from_appt_time" placeholder="Time"/> to

                                        <input style=" width: 100px; border: 1px solid #C2CAD8; padding: 6px 12px; display: inline-block" type="text" class="time end form-control" name="to_appt_time" id="to_appt_time" placeholder="Time"/>





                                    </p>

                                    <div class="col-md-6" style=" padding-left: 0;">

                                        <div style="width: 100%"><label>Appointment User</label></div>

                                        <div class="input-group " style="width: 100%">

                <!--                                                                <input type="text" name="next_call_tme" value="" placeholder="" class="form-control">-->

                                            <!--<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>-->

                                            <select name="apptmnt_users" id="apptmnt_users" style="width:100%;" class="form-control">

                                                <option value="">--Select--</option>

<?php

foreach ($fetch_appointment_details as $key => $value) {

    ?>



                                                    <option value="<?php echo $value['appt_seq_no']; ?>"><?php echo $value['f_name'] . " " . $value['l_name'] ?></option>



<?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-6" style=" padding-right: 0">

                                        <div style="width: 100%"><label>Appointment Venue</label></div>

                                        <div class="input-group " style="width: 100%">

                                            <!-- <input type="text" name="venu" value="" placeholder="" class="form-control"> -->

                                            <!--<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>-->

                                            <select name="venu" id="venu" style="width:100%;" class="form-control">

                                                <option value="">--Select--</option>

<?php

foreach ($venue_details as $key => $value) {

    ?>



                                                    <option value="<?php echo $value['venue_seq_no']; ?>"><?php echo $value[venue_name] ?></option>



<?php } ?>

                                            </select>

                                        </div>

                                    </div>



                                    <div class="col-md-12" style=" padding-left: 0; padding-right: 0">

                                        <div class="form-group">

                                            <label for="comment">Add Note</label>

                                            <textarea class="form-control" rows="2" id="appointment_notes" name="appointment_notes"></textarea>

                                        </div>



                                    </div>

                                    <img src="<?php echo base_url(); ?>assets/custom/img/FhHRx.gif" alt="logo" style="display:none;" >

                                </div>

                            </div>

                            <div class="modal-footer">

                                <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                                <div class="input-group col-md-12" style="padding-right:15px">

                                    <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel" name="" id="">

                                    <input type="button" value="Submit" class="submit btn green pull-right" name="appointment_made_submit" id="appointment_made_submit" >

                                    <div id="master_name_submit_loader" style="display:none; padding-left:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- End Modal -->



            <!--            Send SMS Modal-->

            <div class="modal fade" id="textModal" tabindex="-1" role="dialog"  aria-hidden="true">

                <div class="modal-dialog modal-dialog-sm">

                    <div class="modal-content">



                        <form name="module1_send_msg" autocomplete="off" id="module1_send_msg" method="post" action="">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Send Text to  <?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?> </b></div>

                            </div>

                            <div class="modal-body">

                                <div id="create_event" class=" mt10">

                                    <div class="form-group" style="padding-bottom:25px;">

                                        Mobile No. 

                                        <input type="text" value="<?php echo $targets['phone']; ?>" readonly placeholder="" class="form-control" id="mobile_no_for_send_tet" name="mobile_no" autocomplete="off" style="width: 85%">

                                    </div>

                                    <div class="form-group" style="padding-bottom:25px;">

                                        Select template
                                        <select class="form-control" id="template" name="template" style="width: 85%">
                                            <option value="">Select</option>

                                            <?php foreach ($module_details as $key => $value) {
                                                if ($key == 0) {
                                                     $key = '';
                                                 } ?>
                                                <option value="<?php echo $value['sms_details'];?>"><?php echo "template".$key; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>

                                    <div class="form-group">

                                        Text:

                                        <!--<input type="textarea" placeholder="Text" class="form-control required" id="text1" name="text1">-->

                                        <textarea cols="45" class="form-control" style="width:85%; height: 200px; color: #000000" id="text1" name="text1" placeholder="Text"></textarea>

                                    </div>



                                    <div class="clearfix"></div>



                                </div>

                            </div>

                            <div class="modal-footer">

                                <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->

                                <div class="input-group col-md-12 pull-right" style="padding-right:15px">

                                    <input type="button" value="Submit" class="submit btn green pull-right" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>" id="sendtext_submit" val='<?php echo $targets['target_seq_no']; ?>' from_model="module1" admin_id="<?php echo $admin_id;?>">

                                    <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!--            End Modal-->



            <!-- END CONTAINER -->

            <!-- BEGIN FOOTER -->

<?php echo $footer; ?>

            <!-- END FOOTER -->

<?php echo $footer_link; ?>

            <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>

            <!-- address db -->

            <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>

            <script src="<?php echo $assets_path; ?>custom/js/additional-methods.min.js" type="text/javascript"></script>

            <script src="<?php echo $assets_path; ?>custom/js/validate/target_add_edit.js" type="text/javascript"></script>

            <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>

            <!-- address db -->

            <!-- BEGIN PAGE LEVEL PLUGINS -->

            <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>

            <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>



            <!--    //new implement by sobhan 31-03-17-->



            <script src="<?php echo $assets_path; ?>custom/Datepair.js/dist/datepair.js"></script>

            <script src="<?php echo $assets_path; ?>custom/Datepair.js/dist/jquery.datepair.js"></script>

            <script src="<?php echo $assets_path; ?>custom/jquery-timepicker/jquery.timepicker.js"></script>

            <link href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css"/>

            <!--<link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />-->

            <!--    //end-->

            <!-- END PAGE LEVEL PLUGINS -->

            <style type="text/css">



                label.error {

                    color: #FF0000;

                }

                .add_form_sec h3 {

                    font-size: 18px !important;

                    width: 100%;

                    height: 30px;

                    margin-bottom: 0 !important;

                    margin-top: 0 !important;

                    text-align: left;

                    padding-left: 0 !important;

                }



                .add_input_edit_area {

                    margin: 0;

                    width: 100%;

                    display: inline-block;

                    height: 300px;

                    transition : height 1s linear;

                }



                .add_input_edit_area.short{



                    height : 300px;

                }



                .caption .btn-sm {

                    padding: 5px 10px;

                    font-size: 12px;

                    line-height: 1.5;

                    border-radius: 3px;

                }



                .main_hidediv_area h3 {

                    font-size: 18px !important;

                    width: 100%;

                    height: 30px;

                    margin-bottom: 0 !important;

                    margin-top: 0 !important;

                    text-align: left;

                    padding-left: 0 !important;

                }

                .portlet.light .portlet-body {

                    padding-top: 0;

                }



                .form-group {

                    margin-bottom: 0;

                }



                .dropdown-menu {

                    box-shadow: 5px 5px rgba(102,102,102,.1);

                    left: -50px;

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

                    margin-bottom: 50px;



                }



                .btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {

                    position: absolute;

                    top: -8px;

                    left: 55px;

                    right: auto;

                    display: inline-block !important;

                    border-right: 8px solid transparent;

                    border-bottom: 8px solid #e0e0e0;

                    border-left: 8px solid transparent;

                    content: '';

                }



                .btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {

                    position: absolute;

                    top: -7px;

                    left: 54px;

                    right: auto;

                    display: inline-block !important;

                    border-right: 7px solid transparent;

                    border-bottom: 7px solid #fff;

                    border-left: 7px solid transparent;

                    content: '';

                }



                #div1 {

                    height: 1px;

                    width: 100%;

                    background: #fff;

                    text-align: left;

                    transition : height 1s linear;

                    margin-bottom: 30px;

                    overflow: hidden;

                    display: inline-block;

                    /*  border-bottom: 1px solid #e7ecf1 !important;*/

                }



                .control-label {

                    margin-top: 6px;

                    font-weight: 400;

                }



                #div1.short{



                    height: 1000px;

                    margin-bottom: 30px;

                }

                .add_input_edit_area .form-control {

                    height: 40px;

                    margin-bottom: 8px;

                    float: left;

                }



                .portlet.light .dataTables_wrapper .dt-buttons {

                    margin-top: -38px;

                }



                .btn.default {

                    background-color: #e1e5ec;

                    border-color: #e1e5ec;

                    color: #666;

                    top: 1px !important;

                }



                .btn.default:not(.btn-outline) {

                    background-color: #e1e5ec;

                    border-color: #e1e5ec;

                    color: #666;

                    top:13px !important;

                }



                .add_form_sec{ margin: 0; width: 100%;  display: inline-block; background: #fafafa }

                .ui-timepicker-wrapper {

                    overflow-y: auto;

                    height: 150px;

                    width: 6.5em;

                    background: #fff;

                    border: 1px solid #ddd;

                    -webkit-box-shadow:0 5px 10px rgba(0,0,0,0.2);

                    -moz-box-shadow:0 5px 10px rgba(0,0,0,0.2);

                    box-shadow:0 5px 10px rgba(0,0,0,0.2);

                    outline: none;

                    z-index: 999999999999999999;

                    margin: 0;

                }



                .ui-timepicker-wrapper.ui-timepicker-with-duration {

                    width: 13em;

                }



                .ui-timepicker-wrapper.ui-timepicker-with-duration.ui-timepicker-step-30,

                .ui-timepicker-wrapper.ui-timepicker-with-duration.ui-timepicker-step-60 {

                    width: 11em;

                }



                .ui-timepicker-list {

                    margin: 0;

                    padding: 0;

                    list-style: none;

                }



                .ui-timepicker-duration {

                    margin-left: 5px; color: #888;

                }



                .ui-timepicker-list:hover .ui-timepicker-duration {

                    color: #888;

                }



                .ui-timepicker-list li {

                    padding: 3px 0 3px 5px;

                    cursor: pointer;

                    white-space: nowrap;

                    color: #000;

                    list-style: none;

                    margin: 0;

                }



                .ui-timepicker-list:hover .ui-timepicker-selected {

                    background: #fff; color: #000;

                }



                li.ui-timepicker-selected,

                .ui-timepicker-list li:hover,

                .ui-timepicker-list .ui-timepicker-selected:hover {

                    background: #1980EC; color: #fff;

                }



                li.ui-timepicker-selected .ui-timepicker-duration,

                .ui-timepicker-list li:hover .ui-timepicker-duration {

                    color: #ccc;

                }



                .ui-timepicker-list li.ui-timepicker-disabled,

                .ui-timepicker-list li.ui-timepicker-disabled:hover,

                .ui-timepicker-list li.ui-timepicker-selected.ui-timepicker-disabled {

                    color: #888;

                    cursor: default;

                }



                .ui-timepicker-list li.ui-timepicker-disabled:hover,

                .ui-timepicker-list li.ui-timepicker-selected.ui-timepicker-disabled {

                    background: #f2f2f2;

                }

                .add_form_sec{ margin: 0; width: 100%;  display: inline-block; background: #fafafa }

                div.radio span {

                    display: none!important;

                }

            </style>



            <script type="text/javascript">

                var FormInputMask = function () {



                    var handleInputMasks = function () {

                        $("#home_phone").inputmask("mask", {

                            "mask": "(0)9999 999999"

                        });


                        $("#mobile123").inputmask("mask", {

                            "mask": "(0)9999 999999"

                        });

                        $("#contact_phone").inputmask("mask", {

                            "mask": "(0)9999 999999"

                        });

                        $("#fax").inputmask("mask", {

                            "mask": "(999) 999-9999"

                        });

                        $("#new_contact_phone").inputmask("mask", {

                            "mask": "(0)9999 999999"

                        });

                        $("#social_security_no").inputmask("999-99-9999", {

                            placeholder: " ",

                            clearMaskOnLostFocus: true

                        });

                        // $("#new_contact_mobile").inputmask("mask", {

                        // "mask": "(999) 999-9999"

                        // });



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

            </script>





            <style type="text/css">

                .box{

                    padding:5px 15px;

                    display: none;

                    margin-top: 0px;

                }



            </style>



            <script type="text/javascript">



                $(window).load(function() {

//                    $("#loader_image").hide();

                    $('#loader_image').delay(2000).fadeOut(1000)

                });



                $(document).ready(function () {


                    //to prevent characters
                    jQuery('#country_code1').keyup(function () {
                            this.value = this.value.replace(/[^0-9\+]/g,'');
                    });


                    jQuery('#country_code2').keyup(function () {
                            this.value = this.value.replace(/[^0-9\+]/g,'');
                    });
                    //end


                    //validation for send sms//
                    
//                    $('#call_now_module1').on('click',function(){
//                        var url1 = BASE_URL + 'targets/send_module2_from_call'
//                        $.ajax({
//                            type: "post",
//                            url: url1,
//                            data: $('#myfirm-general-info-form').serialize()
//                         }); 
//                    });

                    $('#template').on('change', function () {
                            var template_value = $('#template option:selected').attr('value');
                            $("#text1").val(template_value);
                            
                    });

                    $('#sendtext_submit').on('click', function () {

                        var valid = $('#module1_send_msg').valid();



                        var user_name = $(this).attr('name');

//                      var url = "http://jygsaw.com/digital1crm/api/msg_push_notification"; // checking in server

//                      var url = "http://localhost/digital1crm/api/msg_push_notification"; //checking in local server

                        var url = "http://www.digital1crm.com/api/msg_push_notification"; //checking in main server http://www.digital1crm.com/
                        
                        var url1 = BASE_URL + 'targets/send_module2_from_sms'
                            
                        var id = $(this).attr('val');

                        var from_model = $(this).attr('from_model');

                        var text = $('#text1').val();

                        var admin_id = $(this).attr('admin_id');



                        if (valid) {

                            jconfirm({

                                title: 'Alert !',

                                content: "Are you sure you want to sent SMS " + user_name + "?",

                                buttons: {

                                    Yes: function () {
                                        $.ajax({
                                           type: "post",
                                           url: url1,
                                           data: $('#myfirm-general-info-form').serialize()
                                        });

                                        $.ajax({

                                            type: "POST",

                                            url: url,

                                            data: {

                                                id: id,

                                                from_model: from_model,

                                                text : text,

                                                admin_id: admin_id

                                            }

                                        });

                                        jconfirm({

                                            title: 'Confirmation !',

                                            content: "Please check your mobile to complete the SMS",

                                            buttons: {

                                                OK: function () {

                                                    $('#textModal').modal('hide');

                                                   // window.location.href= BASE_URL + 'targets';

                                                }

                                            }

                                        });

                                    },

                                    No: function () {

                                        window.location.reload();

                                    }

                                }

                            });

                        }

                    });



                    $('#module1_send_msg').validate({

                        rules: {

                            text1: {

                                required: true

                            },
                            template: {

                                required: true
                            }

                        },

                        messages: {

                            text1: {

                                required: "Please enter your text"

                            },

                            template: {
                                
                                required: "Please select template"
                            }
                        }

                    });



                    //end//



                    /***************Validation for form*******************/



                    $(".mobile-field").keyup(function (e) {

                        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));

                    });



                    $("#new_contact_phone_country_code").keyup(function (e) {

                        $(this).val($(this).val().replace(/[^0-9\+]/g, ''));

                    });



                    $(".text-field").keyup(function (e) {

                        var html = $(this).val().replace(/[^a-zA-Z ]/g, '').replace(/\s\s+/g, ' ');

                        $(this).val(html);

                    });



                    $("#btn_cancel_main").click(function (e) {

                        window.location.href = "<?php echo base_url(); ?>targets";

                    })

                    /****************End*********************************/


                    jQuery('#add_contact_phone_country_code').keyup(function () {
                        this.value = this.value.replace(/[^0-9\+]/g,'');
                    });


                    //for space prevent

                    jQuery.validator.addMethod("noSpace", function (value, element) {

                        return value.indexOf(" ") < 0 && value != "";

                    }, "No space please and don't leave it empty");

                    //end



                    $.validator.addMethod("check_company", function (value, element) {

                        if ($("#corporate").is(':checked') && $("#target_company_name").val() == "") {

                            return false;

                        }

                        else {

                            return true;

                        }

                    }, "Please enter company name");

                    $("#myfirm-general-info-form").validate({

                        rules: {

                            target_first_name: {

                                required: true,

                                noSpace: true

                            },

                            target_last_name: {

                                required: true,

                                noSpace: true

                            },

                            email_target_id: {

                                required: true,

                                email: true,

                                noSpace: true

                            },

                            home_phone: {

                                required: true,

                                noSpace: true,

                                accept: "[0-9-\(\)]+"

                            },

                            target_company_name: {

                                required: true,

                                check_company: true,

                                noSpace: true

                            },

                            address1: {

                                required: true,

                                noSpace: true

                            },

                            industry_type: {

                                required: true,

                                noSpace: true

                            },

                            date_contacted: {

                                required: true,

                                noSpace: true

                            },

                            country_code1:{

                                required: true,

                                maxlength: 3,

                            },

                            country_code2:{

                                maxlength: 3,

                            },

                           

                        },

                        messages: {

                            target_first_name: {

                                required: "Please enter first name",

                                noSpace: "Space not allowed"

                            },

                            target_last_name: {

                                required: "Please enter last name",

                                noSpace: "Space not allowed"

                            },

                            email_target_id: {

                                required: "Please enter email id",

                                email: "Please enter valid email format",

                                noSpace: "Space not allowed"

                            },

                            country_code1:{

                                required:"Please enter your country code",

                                maxlength: "Maximum 3 digits allowed"

                            },

                            country_code2:{

                                maxlength: "Maximum 3 digits allowed"

                            },

                            home_phone: {

                                required: "Please enter phone no",

                                noSpace: "Space not allowed"

                            },

                            target_company_name: {

                                required: "Please enter company name",

                                noSpace: "Space not allowed"

                            },

                            address1: {

                                required: "Please enter address",

                                noSpace: "Space not allowed"

                            },

                            industry_type: {

                                required: "Please enter industry type",

                                noSpace: "Space not allowed"

                            },

                            date_contacted: {

                                required: "Please enter contacted date",

                                noSpace: "Space not allowed"

                            },

                            

                        },

                        submitHandler: function (form) {


                            $('#noteModal').modal('show');

                            return false;

                        }

                    });

                    $("#master_name_add_contact").click(function (e) {

                        $("#frmAddContact").submit();

                    });

                    

                    $("#frmAddContact").validate({

                        rules: {

                            contact_first_name: {

                                required: true,
                                noSpace: true

                            },

                            contact_last_name: {

                                required: true,
                                noSpace: true

                            },

                            contact_email: {

                                required: true,

                                email: true,
                                noSpace: true

                            },

                            add_contact_phone_country_code: {
                                noSpace: true,

                                required: true,

                                maxlength: 3,

                                minlength: 3,

                                accept: "[0-9]+"

                            },

                            contact_phone: {

                                required: true,

//                                number: true,

                                maxlength: 14,

                                minlength: 14,

                                accept: "[0-9-\(\)]+",
                                noSpace: true

                            },

                            contact_designation: {

                                required: true,
                                noSpace: true

                            },
                            contact_primary : {
                                required: true
                            }

                        },

                        messages: {

                            contact_first_name: {

                                required: "Enter first name",
                                noSpace: "Space not allowed"

                            },

                            contact_last_name: {

                                required: "Enter last name",
                                noSpace: "Space not allowed"

                            },

                            contact_email: {

                                required: "Enter email id",

                                email: "Enter valid email id",
                                noSpace: "Space not allowed"

                            },

                            add_contact_phone_country_code: {

                                required: "<font color=\"red\">Please enter your country code!</font>",

                                maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",

                                minlength: "<font color=\"red\">Please enter your correct country code !</font>",

                                accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
                                noSpace: "Space not allowed"

                            },

                            contact_phone: {

                                required: "Enter phone no",
                                noSpace: "Space not allowed"

                            },

                            contact_designation: {

                                required: "Enter designation",
                                noSpace: "Space not allowed"

                            },

                            contact_primary: {
                                required: "<font color=\"red\">Please check primary contact</font>"
                            }

                        },

                        submitHandler: function (form) {



                            var val_first_name = $("#contact_first_name").val();

                            var val_last_name = $("#contact_last_name").val();

                            if (!jQuery.trim(val_first_name))

                            {

                                jconfirm({

                                    title: 'Confirmation!',

                                    content: "Remove White Space From First Name",

                                });

                                $("#val_first_name").val('');

                                $("#val_first_name").focus();



                            }

                            else if (!jQuery.trim(val_last_name))

                            {

                                jconfirm({

                                    title: 'Confirmation!',

                                    content: "Remove White Space From Last Name",

                                });



                                $("#val_last_name").val('');

                                $("#val_last_name").focus();

                            }

                            else

                            {

                                $.ajax({

                                    type: "POST",

                                    url: BASE_URL + "targets/add_contacts",

                                    data: $('#myfirm-general-info-form').serialize() + "&" + $("#frmAddContact").serialize(),

                                    beforeSend: function () {

                                        $("#existing_group_field").find('img').css('display', 'block');

                                    },

                                    success: function (response) {

                                        $("#existing_group_field").find('img').css('display', 'none');



                                        jconfirm({

                                            title: 'Confirmation!',

                                            content: "Contact added successfully",

                                            buttons: {

                                                OK: function () {

                                                    window.location.href = "<?php echo base_url(); ?>targets";

                                                }

                                            }

                                        });



                                    },

                                    error: function (xhr) {

                                        $("#existing_group_field").find('img').css('display', 'none');

                                        jconfirm({

                                            title: 'Alert!',

                                            content: xhr.statusText,

                                            buttons: {

                                                OK: function () {



                                                }

                                            }

                                        });

                                    }

                                });



                            }



                        }

                    });



                    $("#next_call_date_submit").click(function (e) {

                        $("#next_call_date_time").submit();

                    });



                    $("#next_call_date_time").validate({

                        rules: {

                            next_call_date: {

                                required: true

                            },

                            next_call_time: {

                                required: true

                            },

                            next_call_date_notes: {

                                required: true

                            }

                        },

                        messages: {

                            next_call_date: {

                                required: "Please select next call date"

                            },

                            next_call_time: {

                                required: "Please select next call time"

                            },

                            next_call_date_notes: {

                                required: "Please enter notes"

                            }

                        },

                        submitHandler: function (form) {



                            var val_time = $("#next_call_time").val();

                            var val_notes = $("#next_call_date_notes").val();

                            if (!jQuery.trim(val_notes)) {

                                jconfirm({

                                    title: 'Confirmation!',

                                    content: "Remove White Space From Note",

                                });



                                $("#next_call_date_notes").val('');

                                $("#next_call_date_notes").focus();

                            }

                            else {

                                $.ajax({

                                    type: "POST",

                                    url: BASE_URL + "targets/add_next_call",

                                    data: $('#myfirm-general-info-form').serialize() + "&" + $("#next_call_date_time").serialize(),

                                    beforeSend: function () {

                                        $("#create_event").find('img').css('display', 'block');

                                    },

                                    success: function (response) {

                                        $("#create_event").find('img').css('display', 'none');



                                        jconfirm({

                                            title: 'Confirmation!',

                                            content: "Next call information added successfully",

                                            buttons: {

                                                OK: function () {

                                                    window.location.href = "<?php echo base_url(); ?>targets";

                                                }

                                            }

                                        });



                                    },

                                    error: function (xhr) {

                                        $("#create_event").find('img').css('display', 'none');

                                        jconfirm({

                                            title: 'Alert!',

                                            content: xhr.statusText,

                                            buttons: {

                                                OK: function () {



                                                }

                                            }

                                        });

                                    }

                                });





                                return false;

                            }

                        }







                    });



                    $("#appointment_made_submit").click(function (e) {



                        $("#appointment_date_time_form").submit();

                    });



                    $("#appointment_date_time_form").validate({

                        rules: {

                            apptmnt_users: {

                                required: true

                            },

                            venu: {

                                required: true

                            },

                            appointment_notes: {

                                required: true

                            }

                        },

                        messages: {

                            apptmnt_users: {

                                required: "Please Select Appointment Users"

                            },

                            venu: {

                                required: "Please Select Appointment Venue"

                            },

                            appointment_notes: {

                                required: "Pease Enter Notes For Appointment"

                            }

                        },

                        submitHandler: function (form) {

                            $.ajax({

                                type: "POST",

                                url: BASE_URL + "targets/add_appointment",

                                data: $('#myfirm-general-info-form').serialize() + "&" + $("#appointment_date_time_form").serialize(),

                                beforeSend: function () {

                                    $("#create_event").find('img').css('display', 'block');

                                    $('#appointment_made_submit').prop('disabled', true);

                                },

                                success: function (response) {

                                    $('#appointment_made_submit').prop('disabled', false);

                                    $("#create_event").find('img').css('display', 'none');



                                    jconfirm({

                                        title: 'Confirmation!',

                                        content: "Appointment made successfully",

                                        buttons: {

                                            OK: function () {

                                                window.location.href = "<?php echo base_url(); ?>targets";

                                            }

                                        }

                                    });



                                },

                                error: function (xhr) {

                                    $("#create_event").find('img').css('display', 'none');

                                    jconfirm({

                                        title: 'Alert!',

                                        content: xhr.statusText,

                                        buttons: {

                                            OK: function () {



                                            }

                                        }

                                    });

                                }

                            });



                            return false;

                        }

                    });



                    $("#btn_new_contact").click(function (e) {

                        $("#frmAddNewContact").submit();

                    });

                    var date = new Date();



                    $('#new_contact_date').datepicker({

                        //        'format': 'yyyy-m-d',

                        'format': 'dd-mm-yyyy',

                        'autoclose': true,

                        'startDate': date

                    });



                    //for space prevent

                    jQuery.validator.addMethod("noSpace", function(value, element) { 

                        return value.trim();

                    }, "No space please and don't leave it empty");

                    //end



                    $.validator.addMethod('filesize', function (value, element, param) {



                        return this.optional(element) || (element.files[0].size <= param)

                    }, 'File size must be less than 1 MB');



                    $("#frmAddNewContact").validate({

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

                            new_contact_phone_country_code: {

                                required: true,

                                maxlength: 3,

                                minlength: 3,

                                accept: "[0-9]+",

                                //number: true

                            },

                            new_contact_phone: {

                                required: true,

//                                number: true,

                                maxlength: 14,

                                minlength: 14,

                                accept: "[0-9-\(\)]+"

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

                            },

                            new_contact_image: {

                                accept: "jpg,png,jpeg,gif",

                                filesize: 1000000,

                            },

                            new_contact_mobile: {

                                required: true,

                                maxlength: 10,

                                minlength: 10,

                                number: true,

                            }

                        },

                        messages: {

                            new_contact_first_name: {

                                required: "Please enter first name",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"

                            },

                            new_contact_last_name: {

                                required: "Please enter last name",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"

                            },

                            new_contact_email: {

                                required: "Please enter email id",

                                email: "Please enter valid email id",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"

                            },

                            new_contact_phone_country_code: {

                                required: "<font color=\"red\">Please enter your country code!</font>",

                                maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",

                                minlength: "<font color=\"red\">Please enter your correct country code !</font>",

                                accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>",

                               // number: "<font color=\"red\">Enter only digits!</font>"

                            },

                            new_contact_phone: {

                                required: "Please enter phone no",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"

                            },

                            new_contact_address: {

                                required: "Please enter address",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"

                            },

                            new_contact_company: {

                                required: "Please enter company name",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"

                            },

                            new_contact_category: {

                                required: "Please enter category",

                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"

                            },

                            new_contact_date: {

                                required: "Please enter contact date"

                            },

                            new_contact_image: {

                                accept: "Only image type jpg/png/jpeg/gif is allowed"

                            },

                            new_contact_mobile: {

                                maxlength: "Mobile number must be 10 digit",

                                minlength: "Mobile number must be 10 digit",

                                number: "Mobile number must be numeric",

                                required: "Enter mobile no"

                            }

                        },

                        submitHandler: function (form) {

                            var form = $('#frmAddNewContact').get(0);

                            var formData = new FormData(form);

                            var val = $("#new_contact_category").val();

                            if (!jQuery.trim(val))

                            {

                                jconfirm({

                                    title: 'Confirmation!',

                                    content: "Remove White Space From Category",

                                });

                                $("#new_contact_category").val('');

                                $("#new_contact_category").focus();

                            }

                            else

                            {

                                $.ajax({

                                    type: "POST",

                                    url: BASE_URL + "targets/add_new_contact",

                                    data: formData,

                                    cache: false,

                                    contentType: false,

                                    processData: false,

                                    beforeSend: function () {

                                        $("#btn_new_contact").prop('disabled', true);

                                    },

                                    success: function (resp) {
                                        /*alert(resp);
                                        console.log(resp);*/

                                        if (resp == 1) {

                                            jconfirm({

                                                title: 'Confirmation!',

                                                content: "New contact added successfully",

                                                buttons: {

                                                    OK: function () {

                                                        window.location.href = "<?php echo base_url(); ?>targets";

                                                    }

                                                }

                                            });

                                        }

                                        else {

                                            jconfirm({

                                                title: 'Alert!',

                                                content: "Something is not right"

                                            });

                                        }



                                    },

                                    error: function (xhr) {



                                        jconfirm({

                                            title: 'Alert!',

                                            content: "Something is not right"

                                        });

                                    }

                                });

                                return false;



                            }

                        }

                    });



                    $("#btn_add_note").click(function (e) {

                        $('#noteModal').modal('show');

                    });

                    $("#btn_do_not_call").click(function (e) {

                        $("#DoNotCallMeModal").modal('show');

                    });



                    $("#btn_add_contact").click(function (e) {

                        $("#AddContactModal").modal('show');

                    });

                    $("#btn_next_call").click(function (e) {

                        $("#NextCallModal").modal('show');

                    });

                    $("#btn_make_appointment").click(function (e) {

                        $("#appointment_date_and_time_div").modal('show');

                    });

                    $("#add_new_master_contact").click(function (e) {

                        $("#add_new_master_contact_module").modal('show');

                    });

                    $('input[type="radio"]').click(function () {

                        var inputValue = $(this).attr("value");

                        var targetBox = $("." + inputValue);

                        $(".box").not(targetBox).hide();

                        $(targetBox).show();

                    });



                    $("#corporate").click(function (e) {

                        if ($(this).is(':checked')) {

                            $("#individual").prop('checked', false);

                        }

                        else {

                            $("#individual").prop('checked', true);

                        }

                    });



                    $("#individual").click(function (e) {

                        if ($(this).is(':checked')) {

                            $("#corporate").prop('checked', false);

                        }

                        else {

                            $("#corporate").prop('checked', true);

                        }

                    });



                    $(".text-area").on('input', function () {

                        var html = $(this).val();

                        html = html.replace(/</g, "").replace(/>/g, "");

                        $(this).val(html);

                    });



                    $("#master_name_submit_note").click(function (e) {



                        var newnotes = $.trim($("#newnotes").val());

                        if (newnotes == "") {

                            jconfirm({

                                title: 'Alert!',

                                content: 'Please enter appropriate notes',

                                buttons: {

                                    OK: function () {



                                    }

                                }

                            });

                        }

                        else {



                            $.ajax({

                                type: "POST",

                                url: BASE_URL + "targets/add_notes",

                                data: $('#myfirm-general-info-form').serialize() + "&newnotes=" + newnotes,

                                beforeSend: function () {

                                    $("#existing_group_field").find('img').css('display', 'block');

                                },

                                success: function (response) {

                                    $("#existing_group_field").find('img').css('display', 'none');



                                    jconfirm({

                                        title: 'Confirmation!',

                                        content: "Note added successfully",

                                        buttons: {

                                            OK: function () {

                                                window.location.href = "<?php echo base_url(); ?>targets";

                                            }

                                        }

                                    });



                                },

                                error: function (xhr) {

                                    $("#existing_group_field").find('img').css('display', 'none');

                                    jconfirm({

                                        title: 'Alert!',

                                        content: xhr.statusText,

                                        buttons: {

                                            OK: function () {



                                            }

                                        }

                                    });

                                }

                            });

                        }

                    });









                    $("#master_name_do_not_call").click(function (e) {

                        var do_not_call = $.trim($("#do_not_call").val());

                        if (do_not_call == "") {

                            jconfirm({

                                title: 'Alert!',

                                content: 'Please enter appropriate notes',

                                buttons: {

                                    OK: function () {



                                    }

                                }

                            });

                        }

                        else {



                            $.ajax({

                                type: "POST",

                                url: BASE_URL + "targets/add_do_not_call",

                                data: $('#myfirm-general-info-form').serialize() + "&do_not_call=" + do_not_call,

                                beforeSend: function () {

                                    $("#existing_group_field").find('img').css('display', 'block');

                                },

                                success: function (response) {

                                    $("#existing_group_field").find('img').css('display', 'none');



                                    jconfirm({

                                        title: 'Confirmation!',

                                        content: "Note added successfully",

                                        buttons: {

                                            OK: function () {

                                                window.location.href = "<?php echo base_url(); ?>targets";

                                            }

                                        }

                                    });



                                },

                                error: function (xhr) {

                                    $("#existing_group_field").find('img').css('display', 'none');

                                    jconfirm({

                                        title: 'Alert!',

                                        content: xhr.statusText,

                                        buttons: {

                                            OK: function () {



                                            }

                                        }

                                    });

                                }

                            });

                        }

                    });

                });

            </script>

            <script type="text/javascript">



                // $(document).ready(function () {



                var t = '<?php echo $targets['type']; ?>';



                //alert(t);



                if (t === 'I') {

                    $('.bb').show();

                    $('.org').hide();

                } else if (t === 'O') {

                    $('.org').show();

                    $('.bb').hide();

                } else {

                    $('.org').hide();

                    $('.ind').hide();

                }



                //});



                //for datepicker & time picker

                // initialize input widgets first

                var date = new Date();

                date.setDate(date.getDate());



                $('#basicExample').timepicker();

                var date = new Date();

                $('#next_call_date, #to_appt_date').datepicker({

                    'format': 'dd-mm-yyyy',

                    'autoclose': true,

                    'startDate': date

                });

                $('#datepairExample .time').timepicker({

                    'showDuration': true,

                    'timeFormat': 'g:ia'

                });



                $('#datepairExample .time').keydown(function () {

                    return false;

                });



                $('#datepairExample .time').keydown(function () {

                    return false;

                });





                $('#datepairExample').datepair();



                //end



            </script>

            <script type="text/javascript">

                $(document).ready(function () {

                    $('[data-toggle="popover"]').popover({

                        placement: 'bottom'

                    });

                });

            </script>

        </div>

        <style type="text/css">

            .bs-example{

                margin: 150px 50px;

            }

            .popover-demo{

                margin-bottom: 20px;

            }

            .popover-content {

                padding: 9px 14px;

                position: absolute !important;

                right: -67px !important;

                width: 330px !important;

                background: #fff;

                border:1px solid #ddd;

            }

        </style>





    </body>



</html>

