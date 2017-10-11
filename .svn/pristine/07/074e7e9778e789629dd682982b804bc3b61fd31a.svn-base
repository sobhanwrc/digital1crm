<!DOCTYPE html>
<?php //print_r($all_contact); die(); ?>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo $assets_path; ?>custom/js/jquery.js" type="text/javascript"></script>


    <script>

        var aboutMe = function(x) {
            $(x).toggleClass('short')
        };

        $(function() {
            /*$('#clicker').click(function() {
             aboutMe('#div1');
             if($(this).find('i').hasClass('fa-angle-down')){
             $(this).find('i').removeClass('fa-angle-down');
             $(this).find('i').addClass('fa-angle-up');
             }else{
             $(this).find('i').addClass('fa-angle-down');
             $(this).find('i').removeClass('fa-angle-up');
             }
             });*/
            $('#clicker').click(function() {
                //alert("aaaaa");
                //$("#div2").hide();
                // $( "#div2" ).replaceWith( "" );
                aboutMe('#div1');

                if ($(this).find('i').hasClass('fa-angle-down')) {
                    //clicker
                    // $( "#clicker" ).replaceWith( "<button class='btn btn-transparent dark btn-outline btn-circle active' id='clicker'>Hide Details <i class='fa fa-angle-up'></i></button>" );
                    $("#clicker").hide();
                    $("#clicker1").show();
                    $("#div1").show();
                    $("#div2").hide();

                    // $(this).find('i').removeClass('fa-angle-down');
                    // $(this).find('i').addClass('fa-angle-up');
                } else {

                    // $( "#clicker" ).replaceWith( "<button class='btn btn-transparent dark btn-outline btn-circle active' id='clicker'>View Details <i class='fa fa-angle-down'></i></button>" );
                    $("#div1").hide();
                    $("#div2").show();
                    $(this).find('i').addClass('fa-angle-down');
                    //$("#div1").show();
                    //   $("#div1").hide();
                    $(this).find('i').removeClass('fa-angle-up');
                }
            });

            $('#clicker1').click(function() {
                //alert("aaaaa");
                //$("#div2").hide();
                // $( "#div2" ).replaceWith( "" );
                aboutMe('#div1');

                if ($(this).find('i').hasClass('fa-angle-down')) {
                    // alert("aaaaa");
                    //clicker
                    // $( "#clicker" ).replaceWith( "<button class='btn btn-transparent dark btn-outline btn-circle active' id='clicker'>Hide Details <i class='fa fa-angle-up'></i></button>" );
                    $("#clicker1").hide();
                    $("#clicker").show();
                    $("#div2").hide();
                    $("#div2").show();

                    // $(this).find('i').removeClass('fa-angle-down');
                    //  $(this).find('i').addClass('fa-angle-up');
                } else {

                    // $( "#clicker" ).replaceWith( "<button class='btn btn-transparent dark btn-outline btn-circle active' id='clicker'>View Details <i class='fa fa-angle-down'></i></button>" );
                    $("#div1").hide();
                    $("#div2").show();
                    $(this).find('i').addClass('fa-angle-down');
                    //$("#div1").show();
                    //   $("#div1").hide();
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
                        <ul class="page-breadcrumb">
                            <li>
                                <!-- <a href="index.html">Home</a> -->
                                <a href="<?php echo base_url() ?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Client_referral">Module9</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>View</span>
                            </li>
                        </ul>





                        <?php
                        /*
                          <div class="btn-group btn-group-devided" data-toggle="buttons" style=" position: absolute; top:7px; right: 20px;">
                          <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                          <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()"> Back</a></label>
                          <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                          <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                          </div>

                         */
                        ?>







                        <table width="180px" align="right">
                            <tr>

                                <td style="width: 35px" height="40px" valign="top">
                                    <?php if ($prev_target_seq_no) { ?>
                                        <a style="width: 100%; display: block" href="<?php echo $base_url; ?>Client_referral/view/<?php echo base64_encode($prev_target_seq_no); ?>/<?php echo base64_encode($fetch_details[0]['firm_seq_no']); ?>" id="prev"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-left"></i></a>
                                    <?php } ?>
                                </td>


                                <td style=" width: 90px">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                        <!--<input name="options" class="toggle" id="option1" type="radio">-->
                                            <a style=" text-decoration: none; color:#fff" href="" onclick="javascript:window.location.href = '<?php echo $base_url; ?>Client_referral'"> Back to Listing</a></label>
                                    </div>
                                </td>


                                <td style=" width: 35px" height="40px" valign="top">
                                    <?php if ($next_target_seq_no) { ?>
                                        <a style="width: 100%; display: block" href="<?php echo $base_url; ?>Client_referral/view/<?php echo base64_encode($next_target_seq_no); ?>/<?php echo base64_encode($fetch_details[0]['firm_seq_no']); ?>" id="next"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-right pull-right"></i></a>
                                    <?php } ?>
                                </td>

                            </tr>


                        </table>








                    </div>
                    <!-- END PAGE BAR -->

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <?php //t($user_detail);die; ?>
                                <!--                        <div class="portlet-title">
                                                            <div class="caption font-dark">
                                                                <i class="icon-settings font-dark"></i>
                                                                <span class="caption-subject bold"> Name: <?php echo $targets[0]['first_name'] . ' ' . $targets[0]['last_name']; ?>
                                <?php if ($target_info['add_flag'] == 1) { ?>
                                                                                           <font color="red" style="margin-left: 150px;">Imported Data</font>
                                <?php } ?>
                                                                </span><span class="caption-subject bold" style="margin-left: 82px; display: inline-block;">Phone:<?php echo $targets[0]['phione']; ?></span>
                                                                
                                
                                                                <span style=" width: 200px; margin-left: 50px; display: inline-block">
                                                                        <button class="btn btn-transparent dark btn-outline btn-circle active" id="clicker">View Details <i class="fa  fa-angle-down"></i></button>
                                                                        
                                                                </span>
                                
                                <?php if ($targets['type'] == 'O') { ?>
                                                                                       <span style=" width: 200px; margin-left: -81px; display: inline-block">
                                                                                        <a href="<?php echo $base_url; ?>targets/add_contact/<?php echo base64_encode($targets['target_seq_no']); ?>/<?php echo base64_encode($targets['firm_seq_no']); ?>">    
                                                                                            <button class="btn btn-transparent dark btn-outline btn-circle active" id="clicker">Add Contact </button>
                                                                                        </a>    
                                                                                        </span>  
                                <?php } ?> 
                                                                 
                                                            </div>
                                                            <div class="actions">
                                                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                    <ul class="list-inline">
                                                                        <li><a href="">SMS</a></li>
                                                    <li><a href="">Email</a></li>
                                                    <li><a data-target="#calendarModal1" data-toggle="modal" id="add_div" href="">Script</a></li>
                                  <div class="modal fade" id="calendarModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-sm">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    
                                                </div>
                                                <div class="modal-body">
                                                    <div id="create_event" class=" mt10">
                                                        <h2>NOTE</h2>
                                                         
                                                                
                                                        <table width="200" height="200">
                                                             
                                <?php echo $row[0][note3]; ?>     
                                                        
                                                        </table>
                                                        
                                                     
                                                    </div>
                                                        
                                                        
                                
                                                  </div>
                                    </div>
                                
                                                        </div>-->
                                <div class="portlet-title company_header">

                                    <!--
                                                                      <div class="col-md-4 col-lg-4">
                                                                            <div class="caption font-dark" style=" padding-top: 25px">
                                                                                
                                    <?php if ($fetch_add_contact_details['is_primary_contact'] == '1') { ?>
                                                                                        <span class="caption-subject bold" style=" width: 100%; display: block"><?php echo $fetch_add_contact_details['first_name'] . ' ' . $fetch_add_contact_details['last_name']; ?></span>
                                    <?php } ?>
                                                                                 
                                    
                                                                            </div>
                                    
                                                                        </div>
                                    -->


                                    <div class="custom_header">
                                        <?php
                                        if ($user_detail[0]['type'] == "C") {
                                            if (file_exists("./assets/upload/" . $user_detail[0]['target_image']) && $user_detail[0]['target_image'] != "") {
                                                $image_name = base_url() . "assets/upload/" . $user_detail[0]['target_image'];
                                                ?>
                                                <img class="corporate_image" style="border-radius:0 !important;" src="<?php echo $image_name; ?>" alt="logo" class="logo-default">
                                            <?php } else { ?>
                                                <img class="corporate_image" style="border-radius:0 !important;" src="<?php echo base_url(); ?>assets/upload/image/inner_user_blank.jpg" alt="logo" class="logo-default">
                                            <?php } ?>
                                        <?php
                                        } else {
                                            if (file_exists("./assets/upload/" . $user_detail[0]['target_image']) && $user_detail[0]['target_image'] != "") {
                                                $image_name = base_url() . "assets/upload/" . $user_detail[0]['target_image'];
                                                ?>

                                                <div class="individual">
                                                    <img class="individual" src="<?php echo $image_name; ?>" alt="logo" class="logo-default">
                                                </div>
                                            <?php } else { ?>
                                                <img class="individual" src="<?php echo base_url(); ?>assets/upload/image/user_blank.jpg" alt="logo" class="logo-default">
    <?php }
} ?>


                                        <div style=" width: 100%; margin: 0 auto;">
                                            <div style="width: 100%; display: inline-block;">
                                                <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Target :</strong></span>
<?php if ($user_detail[0]['type'] == "C") { ?>
                                                    <span style=" font-size: 20px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;"><?php echo $user_detail[0]['company'] ?>,</span>

                                                    <span style=" width: auto; padding: 0 5px; font-weight: bold; display: inline-block;">
                                                        <div>
    <?php echo $user_detail[0]['target_first_name'] . ' ' . $user_detail[0]['target_last_name']; ?>
                                                        </div>


                                                    </span>
<?php } else { ?>
                                                    <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;"><?php echo $user_detail[0]['target_first_name'] . ' ' . $user_detail[0]['target_last_name']; ?>,</span>

                                                    <span style=" width: auto; padding: 0 5px; font-weight: bold; display: inline-block;">
                                                        <div>
                                                    <?php echo $user_detail[0]['company']; ?>
                                                        </div>

                                                    </span>
<?php } ?>

                                                <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $user_detail[0]['email']; ?></span>

                                                <?php if ($user_detail[0]['lead_source_and_date']){ ?>
                                                    <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                        <strong>Lead Source:</strong>                                                        
                                                            <?php echo $user_detail[0]['lead_source_and_date'];?>
                                                    </span>
                                                <?php }?>

                                                <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                    <strong>Phone:</strong> <?php echo $user_detail[0]['phone']; ?>

                                                    <a class="call_now" href="javascript:void(0)" val='<?php echo $fetch_details[0]['target_seq_no']; ?>' from_model="module9" name="<?php echo $fetch_details[0]['name']; ?>"><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                                </span>

                                            </div>
<?php
if ($user_detail[0]['type'] == "I") {
    if ($fetch_add_contact_details) {
        ?>
                                                    <div style="width: 100%; display: inline-block;">
                                                        <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>

                                                        <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">
                                                            <?php if ($fetch_add_contact_details['is_primary_contact'] == '1') { ?>

                                                                <div><?php echo $fetch_add_contact_details['first_name'] . ' ' . $fetch_add_contact_details['last_name']; ?>,</div>

        <?php } ?>

                                                        </span>

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $fetch_add_contact_details['email']; ?></span>

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                            <?php if ($fetch_add_contact_details['is_primary_contact'] == '1') { ?>
                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $fetch_add_contact_details['phone']; ?>
                                                                    <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                                                </div>
                                                    <?php } ?>

                                                        </span>

                                                    </div>
                                                        <?php }
                                                    } else {
                                                        if ($fetch_add_contact_details) {
                                                            ?>
                                                    <div style="width: 100%; display: inline-block;">
                                                        <span style=" width: 150px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>
                                                        <span style=" font-size: 20px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">
        <?php if ($fetch_add_contact_details['is_primary_contact'] == '1') { ?>

                                                                <div><?php echo $fetch_add_contact_details['first_name'] . ' ' . $fetch_add_contact_details['last_name']; ?>,</div>

                                                            <?php } ?>

                                                        </span>
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $fetch_add_contact_details['email']; ?></span>

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">
        <?php if ($fetch_add_contact_details['is_primary_contact'] == '1') { ?>
                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $fetch_add_contact_details['phone']; ?>
                                                                    <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                                                </div>
        <?php } ?>

                                                        </span>

                                                    </div>
    <?php } else { ?>
                                                    <div style="width: 100%; display: inline-block;">
                                                        <span style=" width: 150px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>
                                                        <span style=" font-size: 20px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">

                                                            <div><?php echo $user_detail[0]['target_first_name'] . ' ' . $user_detail[0]['target_last_name']; ?></div>

                                                        </span>
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $user_detail[0]['email']; ?></span>

                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                            <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $user_detail[0]['phone']; ?>
                                                                <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                                            </div>

                                                        </span>

                                                    </div>
    <?php }
} ?>
                                        </div>




                                    </div>



                                </div>   

                                <div class="portlet-body">


                                    <!-- new div start-->
                                    <div class="main_hidediv_area">

                                        <div style=" width: 100%; display: inline-block; height: 50px;">
<?php if ($fetch_module_details[0]['content'] != '') { ?>
                                                <span style="font-weight: 700;" class="span-width"><?php echo $fetch_module_details[0]['content']; ?></span>
<?php } ?>
                                            <button class="btn btn-transparent dark btn-outline btn-circle active1" id="" data-target="#client_referral_addContactModal" data-toggle="modal" >
                                                <img src="<?php echo $assets_path; ?>pages/img/Client_Referral2.png" alt="" class="menu_icon" /> Client Referral
                                            </button>
                                            <span style=" width: 220px; margin-right: 21px; text-align: right; display: inline-block" class="pull-right">
                                                <button style="width: 210px" class="btn btn-transparent dark btn-outline btn-circle active" data-target="#view_user_details" data-toggle="modal">
                                                    <img src="<?php echo $assets_path; ?>pages/img/View_Details.png" alt="" class="menu_icon" />View Details
                                                </button>
              <!--                                  <button class="btn btn-transparent dark btn-outline btn-circle active" id="clicker1" style="display: none;">Hide Details <i class="fa  fa-angle-down"></i></button>-->
                                            </span>

                                        </div>


                                        <div class="comm_section">
                                            <ul class="list-inline pull-right">
                                                <li><a href="" data-target="#textModal" data-toggle="modal" id="" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>"><i class="fa fa-envelope-o"></i> SMS</a></li>
                                                <li><a href="<?php echo $base_url; ?>Client_referral/temp_email/<?php echo base64_encode($target_seq_nos); ?>/<?php echo base64_encode($company_ids); ?>" ><i class="fa fa-envelope-o"></i> Email</a></li>
                                               <!-- <li><a href="javascript:void(0)" data-target="#script_modal" data-toggle="modal"><i class="fa fa-code"></i> Script</a></li>-->
                                                <li>
                                                    <button style=" padding:6px 0; background-color: transparent; color:#337ab7" type="button" class="btn" data-toggle="popover" data-content="<?php echo $notes[0]['note2']; ?> " data-html="true"><i class="fa fa-code"></i> Script</button>


                                            </ul>


                                        </div>


                                        <div style=" width: 100%;">
                                            <div class="col-md-8" style=" padding-left: 0;">
                                                <h3 class="hint"> Note </h3>

                                                <div class="portlet light bordered" style="height: 300px; overflow-x: hidden; overflow-y: scroll">
                                                    <div class="note_sec">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($viewallnotes as $value) {
                                                            $getdate = $value['added_date'];

                                                            $date = date_create();
                                                            date_timestamp_set($date, $getdate);
                                                            $newdate = date_format($date, 'd-m-Y H:i:s');
                                                            ?>
                                                            <p>
    <?php echo $value['content']; ?>
                                                                <br> <span style="color:#07afee; margin-right: 10px"><strong>Posted by</strong>: <?php echo ucwords($call_user_admin_name); ?> </span><span style="color:#07afee;"><?php echo $newdate; ?></span>
                                                            </p>    
    <?php
}
?>
                                                    </div>

                                                </div>


                                                <h3 class="hint">Testimonial</h3>

                                                <div class="portlet light bordered" style="height: 300px; overflow-x: hidden; overflow-y: scroll">
                                                    <div class="note_sec">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($testimonial as $value) {
                                                            $getdate = $value['added_date'];

                                                            $date = date_create();
                                                            date_timestamp_set($date, $getdate);
                                                            $newdate = date_format($date, 'd-m-Y H:i:s');
                                                            ?>
                                                            <p>
    <?php echo $value['testimonial_notes']; ?>
                                                                <br> <span style="color:#07afee; margin-right: 10px"><strong>Posted by</strong>: <?php echo ucwords($call_user_admin_name); ?> </span><span style="color:#07afee;"><?php echo $newdate; ?></span>
                                                            </p>    
    <?php
}
?>
                                                    </div>

                                                </div>
                                        </div>
                                        <!--testimonial note--> 

                                        <div class="col-md-4" style=" padding-right: 0">
                                            <h3 class="hint"> Contact Type </h3>

                                            <div class="portlet light bordered">
                                                <div class="next_date_area">
                                                    <ul class="list-unstyled">
                                                        <!--<li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#client_referral_div" data-toggle="modal" >Client Referral</button>
                                                        </li>-->
                                                        <!--<li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#payment_div" data-toggle="modal" >Payment</button>
                                                        </li>-->

                                                        <!-- <li><button class="btn btn-transparent dark btn-outline btn-circle active" id="" data-target="#client_referral_addContactModal" data-toggle="modal" >
                                                        <img src="<?php echo $assets_path; ?>pages/img/Client_Referral2.png" alt="" class="menu_icon" /> Client Referral
                                                         </button>
                                                         </li> -->
                                                        <!--<li><button class="btn btn-transparent dark btn-outline btn-circle active" id="add_note_module2" data-target="#calendarModal_add_note" data-toggle="modal">Add Note</button>
                                                        </li>-->
                                                        <li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#do_not_call_add_clientreferral" data-toggle="modal" >
                                                                <img src="<?php echo $assets_path; ?>pages/img/Not_Call_Me.png" alt="" class="menu_icon" /> Do Not Call Me
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8" style=" padding-left: 0;">
                                                <h3 class="hint"> SMS Logs</h3>

                                                <div class="portlet light bordered" style="height: 150px; overflow-x: hidden; overflow-y: scroll">
                                                    <div class="note_sec">
                                                        <?php
//                                                        $i = 0;
                                                        foreach ($sms_content as $value) {
                                                            $getdate = $value['added_date'];

                                                            $date = date_create();
                                                            date_timestamp_set($date, $getdate);
                                                            $newdate = date_format($date, 'd-m-Y H:i:s');
                                                            ?>
                                                            <p>
                                                            <?php echo $value['content']; ?>
                                                                <br> <span style="color:#07afee; margin-right: 10px"><strong>Posted by</strong>: <?php echo ucwords($call_user_admin_name); ?> </span><span style="color:#07afee;"><?php echo $newdate; ?></span>
                                                            </p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>

                                                </div>

                                        </div> 




                                        <!--testimonial note end-->                              

                                                                                                           

                                    </div>


                                </div>


                                <!--                                   view deatils div-->
                                <div class="modal fade" id="view_user_details" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-sm">
                                        <div class="modal-content">
                                            <form name="master_name_edit" autocomplete="off" id="master_name_edit" method="post" action="">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> General Informations </b></div>
                                                    <a href="javascript:void(0)" class="edit_details btn green pull-right"><img src="<?php echo $assets_path; ?>pages/img/View_Details.png" alt="" class="menu_icon"/>Edit</a>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="create_event" class=" mt10">

                                                        <div class="form-group bb">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" readonly placeholder="Enter Firm Name" class="form-control"  name="first_name" id="first_name" value="<?php
if (isset($user_detail[0]['target_first_name']) && $user_detail[0]['target_first_name'] != '') {
    echo $user_detail[0]['target_first_name'];
}
?>" /> 
                                                            <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo $user_detail[0]['target_seq_no']; ?>">
                                                        </div>

                                                        <div class="form-group bb">
                                                            <label class="control-label">Last Name</label>
                                                            <input type="text" readonly placeholder="Enter Firm Name" class="form-control"  name="last_name" id="last_name" value="<?php
                                                            if (isset($user_detail[0]['target_last_name']) && $user_detail[0]['target_last_name'] != '') {
                                                                echo $user_detail[0]['target_last_name'];
                                                            }
?>" /> </div>

                                                        <div class="form-group bb">
                                                            <label class="control-label">Email</label>
                                                            <input type="text" readonly placeholder="Enter Firm ID" class="form-control" name="email" id="email" value="<?php echo $user_detail[0]['email']; ?>"  />
                                                        </div>

                                                        <div class="form-group bb">
                                                            <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>
                                                            <!--<input type="text" placeholder="" class="form-control" disabled="" name="target_code" id="target_code" value="<?php echo $targets[0]['phione']; ?>" />--> 
                                                            <input type="text" readonly value="<?php echo $country_code; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block" readonly>
                                                            <input type="text" readonly placeholder="" value="<?php echo $home_phone_number; ?>" class="form-control" id="phione" name="phione" style="width: 83%; margin-left: -5px; display: inline-block">
                                                        </div>

                                                        <div class="form-group bb">
                                                            <label class="control-label">Mobile</label>
                                                            <input type="text" readonly placeholder="" class="form-control" name="mobile" id="mobile" value="<?php echo $user_detail[0]['mobile']; ?>" /> 
                                                        </div>
                                                        <div class="form-group bb">
                                                            <label class="control-label">Address</label>
                                                            <input type="text" readonly placeholder="" class="form-control"  name="address1" id="address1" value="<?php echo $user_detail[0]['address']; ?>" /> 
                                                        </div>
                                                        <div class="form-group bb">
                                                            <label class="control-label">Company Name</label>
                                                            <input type="text" readonly placeholder="Enter Target Company" class="form-control" name="target_company_name" id="target_company_name" value="<?php echo $user_detail[0]['company']; ?>" />
                                                        </div> 
                                                        <div class="form-group">
                                                            <label class="control-label">Categories</label>
                                                            <input type="text" readonly placeholder="Enter Target Company" class="form-control"  name="industry_type" id="industry_type" value="<?php echo $user_detail[0]['categories']; ?>" />
                                                        </div>

                                                        <div class="form-group" style="margin-top:10px;">
                                                            <label class="control-label"></label>
                                                            <input type="button" style="display:none" value="Save" class="submit btn green pull-right" name="edit_details_btn" id="edit_details_btn" >
                                                        </div>

                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!--                                    end view details div-->

                                <!--------------add note model div-->

                                <form role="form" id="form1" autocomplete="off" method="post" action="">

                                    <div class="modal fade" id="calendarModal_add_note" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="master_name_add" autocomplete="off" id="master_name_add" method="post" action="<?php echo $base_url; ?>master_name/add">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add New Note</b></div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="create_event" class=" mt10">

                                                            <!--                        <div class="form-group">
                                                                                        <input type="text" placeholder="Title" class="form-control" id="title" name="title">
                                                                                    </div>-->
                                                            <div class="form-group" id="existing_group_field">
                                                                <div style="width: 100%"><label>Write Note</label></div>
                                                                <div class="input-group " style="width: 100%">
                                                                    <textarea class="form-control" name="newnotes" id="newnotes" cols="75" rows="5"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                        <div class="input-group col-md-12" style="padding-right:15px">
                                                            <input type="button" value="Submit" class="submit btn green pull-right" name="master_name_submit" id="master_name_submit" >
                                                            <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!--end add note model div end-->  

                                <!--                                    add next call date & time div-->
                                <div class="modal fade" id="client_referral_div" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-sm">
                                        <div class="modal-content">
                                            <form name="purchase_again" autocomplete="off" id="purchase_again" method="post" action="<?php echo $base_url; ?>master_name/add">
                                                <input type="hidden" name="user_company_id" id="user_company_id" value="<?php echo $targets[0]['company_id']; ?>">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Client Referral</b></div>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="create_event" class=" mt10" style=" display: inline-block; width: 100%;">


                                                        <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                            <div class="form-group">
                                                                <label for="comment">Purchase Again</label>
                                                                <input type="checkbox" id="chk_purchase" name="chk_purchase">
                                                                <input type="hidden" value="<?php echo $target_seq_no; ?>" id="target_seq_no" name="target_seq_no">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                            <div class="form-group">
                                                                <label for="comment">Write Note</label>
                                                                <textarea class="form-control" rows="2" id="write_notes" name="write_notes"></textarea>
                                                                <input type="hidden" value="<?php echo $target_seq_no; ?>" id="target_seq_no" name="target_seq_no">
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                    <div class="input-group col-md-12 pull-right" style="padding-right:13px">
                                                        <input type="button" value="Submit" class="submit btn green pull-right" name="add_purchase_again_submit" id="add_purchase_again_submit" >
                                                        <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!--                                    end next call date & time div-->

                                <!--                                presentation done div-->
                                <div class="modal fade" id="payment_div" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-sm">
                                        <div class="modal-content">
                                            <form name="payment_done_form" autocomplete="off" id="payment_done_form" method="post" action="<?php echo $base_url; ?>master_name/add">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Payment</b></div>
                                                </div>

                                                <div class="modal-body" style=" display: inline-block; width: 100%">
                                                    <div id="create_event" class=" mt10">





                                                        <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                            <div class="form-group">
                                                                <label for="comment">Add Note</label>
                                                                <textarea class="form-control" rows="2" id="payment_add_notes" name="payment_add_notes" ></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-7" style=" padding-left: 0;">
                                                            <div style="width: 100%"><label>Date</label></div>
                                                            <div class="input-group " style="width: 100%">
                                                                <!-- <input type="text" name="next_call_date" value=""  placeholder="" class="form-control "> -->
                                                                <input style="width: 90%"  aria-describedby="datepicker-error" aria-required="true" aria-invalid="false"  type="text" id="payment_add_date" name="payment_add_date" value="<?php echo $user_detail[0]['appointment_date']; ?>"  placeholder="DD-MM-YYYY" class="form-control ">

                                                                <label id="next_call_date-error" class="error" for="next_call_date"></label>
                                                            </div>
                                                        </div>




                                                        <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                            <div class="form-group">
                                                                <label for="comment">Payment Done</label>
                                                                <input type="checkbox" id="chk_payment" name="chk_payment">

                                                                <input type="hidden" id="uid" name="uid" value="<?php echo $target_seq_no; ?>">
                                                                <input type="hidden" value="<?php echo $module_no; ?>" id="module_no">
                                                                <input type="hidden" value="<?php echo date('d-m-Y'); ?>" id="current_date">
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                    <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                                                        <input type="button" value="Submit" class="submit btn green pull-right" name="payment_done_submit" id="payment_done_submit" >
                                                        <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!--                                end appointment div-->
                                <!--                                    do not call-->
                                <div class="modal fade" id="do_not_call_add_clientreferral" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-sm">
                                        <div class="modal-content">
                                            <form name="do_not_call_referral" autocomplete="off" id="do_not_call_referral" method="post" action="javascript:void(0)">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add Note</b></div>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="create_event" class=" mt10">

                                                        <!--                        <div class="form-group">
                                                                                    <input type="text" placeholder="Title" class="form-control" id="title" name="title">
                                                                                </div>-->
                                                        <div class="form-group" id="existing_group_field">
                                                            <div style="width: 100%"><label>Write Note</label></div>
                                                            <div class="input-group " style="width: 100%">
                                                                <textarea name="do_not_call_notes_referral" id="do_not_call_notes_referral" cols="75" rows="5"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                    <div class="input-group col-md-12" style="padding-right:15px">
                                                        <input type="button" value="Submit" class="submit btn green pull-right" name="do_not_call_client_ref_submit" id="do_not_call_client_ref_submit" >
                                                        <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!--                                    end do not call-->

                                <!--                                    add contact div-->
                                <div class="modal fade" id="client_referral_addContactModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add Contact</b></div>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div style="width: 100%; display: inline-block">
                                                        <div class="col-md-6"><label>Are you sure want to Add Referral ?</label></div>
                                                        <div class="col-md-6">
                                                            <input type="radio" name="sue_refferal" value="1" id="refferal_sure_yes"> Yes
                                                        <input type="radio" name="sue_refferal" value="0" id="refferal_sure_no"> No
                                                        </div>
                                                    
                                                    </div>
                           
                                                </div>
                                            </div>
                                            
                                            <div class="modal-body" id="add_refferal_div">
                                                <div id="create_event" class=" mt10">
                                                    <div class="col-md-12">
                                                        <form name="clientreferral_frmAddContact" id="clientreferral_frmAddContact" method="POST" novalidate autocomplete="off">
                                                            <div class="form-group">
                                                                <div style="width: 100%"><label>First Name</label></div>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="text" name="contact_first_name" id="contact_first_name" class="form-control text-area" value="<?php if ($get_contact_data[0]['is_primary_contact'] == 1) echo $get_contact_data[0]['first_name']; ?>">

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div style="width: 100%"><label>Last Name</label></div>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="text" name="contact_last_name" id="contact_last_name" class="form-control text-area" value="<?php if ($get_contact_data[0]['is_primary_contact'] == 1) echo $get_contact_data[0]['last_name']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div style="width: 100%"><label>Email</label></div>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="text" name="contact_email" id="contact_email" class="form-control text-area" value="<?php if ($get_contact_data[0]['is_primary_contact'] == 1) echo $get_contact_data[0]['email']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group bb">
                                                                <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>

                                                                <input type="text" value="" placeholder="Country code" class="form-control" id="country_code2" name="country_code1" autocomplete="off" style="width: 25%; display: inline-block;">
                                                                <input type="text" placeholder="Enter phone number" value="" class="form-control" id="contact_phone2" name="contact_phone" style="width: 75%; margin-left: -5px; display: inline-block;">
                                                            </div>

                                                            <label id="country_code2-error" class="error" for="country_code2" style="display: inline-block;"></label>
                                                            <label id="contact_phone-error" class="error" for="contact_phone" generated="true"></label>

                                                            <div class="form-group">
                                                                <div style="width: 100%"><label>Category</label></div>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="text" name="category" id="category" class="form-control text-area" value="<?php if ($get_contact_data[0]['is_primary_contact'] == 1) {
                                                                echo $get_contact_data[0]['designation'];
                                                            } ?>">

                                                                    <input type="hidden" value="<?php echo $target_seq_nos; ?>" id="target_seq_nos" name="target_seq_nos">
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div style="width: 100%"><label>Company Name</label></div>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="text" name="company_name" id="company_name" class="form-control text-area" value="<?php if ($get_contact_data[0]['is_primary_contact'] == 1) {
                                                                echo $get_contact_data[0]['designation'];
                                                            } ?>">


                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div style="width: 100%"><label>Address</label></div>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="text" name="ref_address" id="ref_address" class="form-control text-area" value="<?php if ($get_contact_data[0]['is_primary_contact'] == 1) {
                                                                echo $get_contact_data[0]['designation'];
                                                            } ?>">


                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div style="width: 100%"><label>Date Contacted</label></div>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input style="width: 87%"  aria-describedby="datepicker-error" aria-required="true" aria-invalid="false" type="text" name="date_contacted" id="date_contacted" class="form-control " value="<?php if ($get_contact_data[0]['is_primary_contact'] == 1) {
                                                                echo $get_contact_data[0]['designation'];
                                                            } ?>" placeholder="DD-MM-YYYY" readonly>


                                                                    <span class="input-group-btn" style="display: -moz-box; vertical-align: top">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                    </span>
                                                                    <label id="date_contacted-error" class="error" for="date_contacted"></label>

                                                                </div>

                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                    <div class="input-group col-md-12" style="padding-right:15px">
                                                        <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel" name="" id="">
                                                        <input type="button" value="Submit" class="submit btn green pull-right" name="referral_add_contact" id="referral_add_contact" >
                                                        <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer" id="refferal_not_submit">
                                                <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                <div class="input-group col-md-12" style="padding-right:15px">
<!--                                                    <input style=" margin-left: 15px" type="reset" value="Reset" class="submit btn green pull-right cancel" name="" id="">-->
                                                    <input type="button" value="Submit" class="submit btn green pull-right" name="referral_not_add_contact" id="referral_not_add_contact" >
                                                    <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                <!--                                    end add contact div-->



                                <!--            Send SMS Modal-->
                                <div class="modal fade" id="textModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-sm">
                                        <div class="modal-content">

                                            <form name="module1_send_msg" autocomplete="off" id="module1_send_msg" method="post" action="">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Send Text to  <?php echo $fetch_details[0]['name']; ?> </b></div>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="create_event" class=" mt10">
                                                        <div class="form-group" style="padding-bottom:25px;">
                                                            Mobile No. 
                                                            <input type="text" value="<?php echo $fetch_details[0]['phone']; ?>" readonly placeholder="" class="form-control" id="mobile_no_for_send_tet" name="mobile_no" autocomplete="off" style="width: 85%">
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
                                                    <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                                                        <input type="button" value="Submit" class="submit btn green pull-left" name="<?php echo $fetch_details[0]['name']; ?>" id="sendtext_submit" val='<?php echo $fetch_details[0]['target_seq_no']; ?>' from_model="module9" admin_id="<?php echo $admin_id; ?>">
                                                        <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!--            End Modal-->

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
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/validate/target_add_edit.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
        <!-- address db -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->   

        <script src="http://jonthornton.github.io/Datepair.js/dist/datepair.js"></script>
        <script src="http://jonthornton.github.io/Datepair.js/dist/jquery.datepair.js"></script>
        <script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
        <link href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css"/>


        <style type="text/css">
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

        </style>
        <script type="text/javascript">
            $('#add_refferal_div').hide();
            $('#refferal_not_submit').hide();
            
            $('#refferal_sure_yes').on('click',function(){
                $('#add_refferal_div').show();
                $('#refferal_not_submit').hide();
            });
            
            $('#refferal_sure_no').on('click',function(){
                $('#add_refferal_div').hide();
                $('#refferal_not_submit').show();
            });
            $('#template').on('change', function () {
                var template_value = $('#template option:selected').attr('value');
                $("#text1").val(template_value);

            });
            
            $('#referral_not_add_contact').on('click',function(){
                var target_seq_no = $('#target_seq_nos').val();
                $.ajax({
                    type: "POST",
                    url: BASE_URL + 'Client_referral/refferal_not_add/',
                    data:{
                        target_seq_no: target_seq_no,
                    },
                    success: function(data) {
                        if (data == 1) {
                            jconfirm({
                                title: 'Confirmation!',
                                content: "Contact successfully moved to next module.",
                                buttons: {
                                    OK: function() {
                                        window.location.href = BASE_URL + 'Client_referral';
                                    }
                                }
                            });
                        }
                    }
                }); 
            });
            
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

            $('#basicExample').timepicker();
            // initialize input widgets first
            var date = new Date();
            $('#date_contacted').datepicker({
                //        'format': 'yyyy-m-d',
                'format': 'dd-mm-yyyy',
                'autoclose': true,
                'startDate': date
            });
            $('#payment_add_date').datepicker({
                //        'format': 'yyyy-m-d',
                'format': 'dd-mm-yyyy',
                'autoclose': true
            });
            $('#datepairExample .time').timepicker({
                'showDuration': true,
                'timeFormat': 'g:ia'
            });
            $('#appt_call_date').datepicker({
                //        'format': 'yyyy-m-d',
                'format': 'dd-mm-yyyy',
                'autoclose': true
            });

            // initialize datepair
            $('#datepairExample').datepair();






            $('#keep_in_touch').on('click', function() {
                var numItems = $('.keep_touch').length;
                if (numItems <= 3) {
                    numItems = numItems + 1;
                    var content = "<div class=\"row keep_touch\" id='touch" + numItems + "'>\n\<span class=\"pull-right\"> <a id='reduce" + numItems + "' style=\"cursor: pointer;\" class=\"remove\"><span style=\"padding-right:10px\" class=\"glyphicon glyphicon-minus\"></span></a></span>\n\
                        <div style=\"width: 100%;\">\n\
                            <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                                <div style=\"width: 100%\"><label>First Name #" + numItems + "  </label></div>\n\
                                <div class=\"input-group\" style=\"width: 100%\">\n\
                                    <input type=\"text\" placeholder=\"\" class=\"form-control \" id='keep_in_touch" + numItems + "' name=\"keep_in_touch_1[]\" value=\"\">\n\
                                </div>\n\
                            </div>\n\
                            <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                                <div style=\"width: 100%\"><label>Last Name #" + numItems + "  </label></div>\n\
                                <div class=\"input-group\" style=\"width: 100%\">\n\
                                    <input type=\"text\" placeholder=\"\" class=\"form-control\" id='keep_in_touch_date" + numItems + "' name=\"keep_in_touch_date_1[]\" value=\"\">\n\
                                    <span class=\"input-group-addon\"><i class=\"fa fa-calendar\"></i> </span>\n\
                                </div>\n\
                            </div>\n\
                            <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                                <div style=\"width: 100%\"><label>Email #" + numItems + "  </label></div>\n\
                                <div class=\"input-group\" style=\"width: 100%\">\n\
                                    <input type=\"text\" placeholder=\"\" class=\"form-control\" id='email_" + numItems + "' name=\"email_1[]\" value=\"\">\n\
                                </div>\n\
                            </div>\n\
                            <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                                <div style=\"width: 100%\"><label>Phone #" + numItems + "  </label></div>\n\
                                <div class=\"input-group\" style=\"width: 100%\">\n\
                                    <input type=\"text\" placeholder=\"\" class=\"form-control\" id='phone_" + numItems + "' name=\"phone_1[]\" value=\"\">\n\
                                </div>\n\
                            </div>\n\
                            <div style=\" padding-left: 0; padding-right: 0\" class=\"col-md-12\">\n\
                                <div style=\"width: 100%\"><label>Designation #" + numItems + "  </label></div>\n\
                                <div class=\"input-group\" style=\"width: 100%\">\n\
                                    <input type=\"text\" placeholder=\"\" class=\"form-control\" id='designation_" + numItems + "' name=\"designation_1[]\" value=\"\">\n\
                                </div>\n\
                            </div>\n\
                        </div>";
                    $('#keep_in_touch_div').append(content);
                    $('.datepicker').datepicker();
                } else {
                    $.alert({
                        title: 'Alert!',
                        content: 'You can not add more than 12 fields!',
                        confirm: function() {
                        }
                    });
                }

            });
            $(document).on('click', '.remove', function(e) {
                var numItems = $('.keep_touch').length;
                var keep_in_touch_div_id = $(this).closest("div.keep_touch").attr("id");
                $('#' + keep_in_touch_div_id).remove();
            });

        </script> 
        <script type="text/javascript">

            $(window).load(function() {
                //          $("#loader_image").hide();
                $('#loader_image').delay(2000).fadeOut(1000)
            });


            var FormInputMask = function() {

                var handleInputMasks = function() {

                    $("#contact_phone2").inputmask("mask", {
                        "mask": "(0)9999 999999"
                    });
                    $("#phione").inputmask("mask", {
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
                    $("#social_security_no").inputmask("999-99-9999", {
                        placeholder: " ",
                        clearMaskOnLostFocus: true
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

            jQuery('#country_code2').keyup(function() {
                this.value = this.value.replace(/[^0-9\+]/g, '');
            });


            $(document).ready(function() {

                //validation for send sms//
                $('#sendtext_submit').on('click', function() {
                    var valid = $('#module1_send_msg').valid();

                    var user_name = $(this).attr('name');
//                      var url = "http://jygsaw.com/digital1crm/api/msg_push_notification"; // checking in server
//                      var url = "http://localhost/digital1crm/api/msg_push_notification"; //checking in local server
                    var url = "http://www.digital1crm.com/api/msg_push_notification"; //checking in main server http://www.digital1crm.com/
                    var id = $(this).attr('val');
                    var from_model = $(this).attr('from_model');
                    var text = $('#text1').val();
                    var admin_id = $(this).attr('admin_id');

                    if (valid) {
                        jconfirm({
                            title: 'Alert !',
                            content: "Are you sure you want to sent SMS " + user_name + "?",
                            buttons: {
                                Yes: function() {
                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: {
                                            id: id,
                                            from_model: from_model,
                                            text: text,
                                            admin_id: admin_id
                                        }
                                    });
                                    jconfirm({
                                        title: 'Confirmation !',
                                        content: "Please check your mobile to complete the SMS",
                                        buttons: {
                                            OK: function() {
                                                window.location.reload();
                                            }
                                        }
                                    });
                                },
                                No: function() {
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
                        }
                    },
                    messages: {
                        text1: {
                            required: "Please enter your text"
                        }
                    }
                });

                //end//

                //for space prevent
                jQuery.validator.addMethod("noSpace", function(value, element) {
                    return value.trim();
                }, "No space please and don't leave it empty");
                //end

                $('#master_name_submit').on('click', function(e) {
                    e.preventDefault();
                    var note = $('#newnotes').val();
                    var target_seq_no = $('#target_seq_no').val();
                    var encodedString = btoa(target_seq_no);
                    //     alert (encodedString);
                    //     alert (target_seq_no);
                    //     return false;
                    var b = BASE_URL;

                    $.ajax({
                        type: "POST",
                        url: b + 'Competitor/add_allnotes/',
                        data: {
                            note: note,
                            target_seq_no: target_seq_no,
                            status: 'Active'
                        },
                        success: function(response) {

                            $('#calendarModal .close').trigger('click');
                            location.href = BASE_URL + 'client_master/details/' + encodedString;

                        },
                        error: function() {
                            alert('Error');
                        }
                    });
                    return false;
                });







                $(".edit_details").on('click', function(e) {
                    //alert("hghggggggggggggg");
                    $('#master_name_edit input').removeAttr('readonly');
                    $('#edit_details_btn').show();

                });


                //-------------------------------edit details ajax------------------------------//

                $('#master_name_edit').validate({
                    rules: {
                        first_name: {
                            required: true
                        },
                        last_name: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        country_code1: {
                            /*required: true,
                            maxlength: 3*/
                        },
                        mobile: {
                            //required: true
                        },
                        address1: {
                            required: true
                        },
                        target_company_name: {
                            required: true
                        },
                        industry_type: {
                            required: true
                        },
                        phione: {
                            //required: true
                        }

                    },
                    messages: {
                        first_name: {
                            required: "<font color=\"red\">Please enter first name !</font>"
                        },
                        last_name: {
                            required: "<font color=\"red\">Please enter last name !</font>"
                        },
                        email: {
                            required: "<font color=\"red\">Please enter email !</font>",
                            email: "<font color=\"red\">Please enter valid email !</font>"
                        },
                        country_code1: {
                            /*required: "<font color=\"red\">Please enter country code !</font>",
                            maxlength: "<font color=\"red\">Maximum limit 3 !</font>"*/
                        },
                        mobile: {
                            //required: "<font color=\"red\">Please enter mobile!</font>"
                        },
                        address1: {
                            required: "<font color=\"red\">Please enter address !</font>"
                        },
                        target_company_name: {
                            required: "<font color=\"red\">Please enter company name !</font>"
                        },
                        industry_type: {
                            required: "<font color=\"red\">Please enter category !</font>"
                        },
                        phione: {
                            //required: "<font color=\"red\">Please enter phone !</font>"
                        }
                    }
                });
                $('#edit_details_btn').on('click', function(e) {
                    var valid = $('#master_name_edit').valid();
                    if (valid) {
                        var first_name = $('#first_name').val();
                        var last_name = $('#last_name').val();
                        var email = $('#email').val();
                        var country_code1 = $('#country_code1').val();
                        var mobile = $('#mobile').val();
                        var address1 = $('#address1').val();
                        var target_company_name = $('#target_company_name').val();
                        var industry_type = $("#industry_type").val();
                        var phione = $("#phione").val();
                        var target_seq_no = $("#target_seq_no").val();

                        $.ajax({
                            type: "POST",
                            url: BASE_URL + 'client_referral/edit_details/',
                            data: {
                                first_name: first_name,
                                last_name: last_name,
                                email: email,
                                country_code1: country_code1,
                                mobile: mobile,
                                address1: address1,
                                target_company_name: target_company_name,
                                industry_type: industry_type,
                                phione: phione,
                                target_seq_no: target_seq_no
                            },
                            beforeSend: function() {
                                $('#edit_details_btn').prop('disabled', true);
                            },
                            success: function(data) {
                                $('#edit_details_btn').prop('disabled', false);
                                /*alert(data);                         
                                 console.log(data);*/
                                if (data == 1) {
                                    //alert("success");
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "Details Edited successfully",
                                        buttons: {
                                            OK: function() {
                                                window.location.href = BASE_URL + 'Client_referral';
                                            }
                                        }
                                    });
                                }
                            }
                        });

                    }
                });
                //--------------------------end--------------------------------//













                $('#do_not_call_client_ref_submit').on('click', function(e) {
                    var valid = $('#do_not_call_referral').valid();
                    if (valid) {
                        var do_not_call_referral_notes = $('#do_not_call_notes_referral').val();
                        var target_seq_no = $('#target_seq_no').val();

                        //alert(do_not_call_referral_notes);alert(target_seq_no);
                        if (do_not_call_referral_notes) {

                            var val = $("#do_not_call_notes_referral").val();
                            if (!jQuery.trim(val))
                            {
                                jconfirm({
                                    title: 'Confirmation!',
                                    content: "Remove White Space From Notes",
                                });
                                $("#do_not_call_notes_referral").val('');
                                $("#do_not_call_notes_referral").focus();
                            }
                            else
                            {
                                $.ajax({
                                    type: "POST",
                                    url: BASE_URL + 'Client_referral/do_not_call_client_referral/',
                                    data: {
                                        do_not_call_referral_notes: do_not_call_referral_notes,
                                        target_seq_no: target_seq_no,
                                    },
                                    success: function(data) {

                                        if (data == '1') {
                                            jconfirm({
                                                title: 'Confirmation!',
                                                content: "Deleted From The Record",
                                                buttons: {
                                                    OK: function() {
                                                        window.location.href = BASE_URL + 'Client_referral';
                                                    }
                                                }
                                            });
                                        }
                                    }
                                });

                            }
                        }
                    }
                });

                $('#do_not_call_referral').validate({
                    rules: {
                        do_not_call_notes_referral: {
                            required: true
                        }
                    },
                    messages: {
                        do_not_call_notes_referral: {
                            required: "<font color=\"red\">Please enter your note!</font>"
                        }
                    }
                });


                $('#add_purchase_again_submit').on('click', function(e) {
                    var valid = $('#purchase_again').valid();
                    if (valid) {
                        var write_notes = $('#write_notes').val();
                        var target_seq_no = $('#target_seq_no').val();

                        $.ajax({
                            type: "POST",
                            url: BASE_URL + 'Client_purchase/add_client_purchase/',
                            data: {
                                write_notes: write_notes,
                                target_seq_no: target_seq_no
                            },
                            success: function(data) {

                                if (data == '1')
                                {
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "Delete Record",
                                        buttons: {
                                            OK: function() {
                                                window.location.href = "<?php echo base_url(); ?>Client_purchase/view/";
                                            }
                                        }
                                    });
                                }

                            }
                        });


                    }
                });

                $('#purchase_again').validate({
                    rules: {
                        chk_purchase: {
                            required: true
                        },
                        write_notes: {
                            required: true
                        }
                    },
                    messages: {
                        chk_purchase: {
                            required: "<font color=\"red\">Please Select The Purchase Again</font>"
                        },
                        write_notes: {
                            required: "<font color=\"red\">Please Write Note!</font>"
                        }
                    }
                });

                $('#payment_done_form').validate({
                    rules: {
                        payment_add_notes: {
                            required: true
                        },
                        payment_add_date: {
                            required: true
                        },
                        chk_payment: {
                            required: true
                        }
                    },
                    messages: {
                        payment_add_notes: {
                            required: "<font color=\"red\">Please Write a Note !</font>"
                        },
                        payment_add_date: {
                            required: "<font color=\"red\">Please Select Date !</font>"
                        },
                        chk_payment: {
                            required: "<font color=\"red\">Please select Checkbox !</font>"
                        }
                    }
                });
                $('#payment_done_submit').on('click', function(e) {
                    var valid = $('#payment_done_form').valid();
                    if (valid) {
                        var payment_add_notes = $('#payment_add_notes').val();

                        var target_seq_no = $('#target_seq_no').val();
                        var payment_add_date = $('#payment_add_date').val();


                        $.ajax({
                            type: "POST",
                            url: BASE_URL + 'Activity_Payment/add_payment/',
                            data: {
                                payment_add_notes: payment_add_notes,
                                target_seq_no: target_seq_no,
                                payment_add_date: payment_add_date

                            },
                            success: function(data) {

                                if (data == '1') {
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "Payment Done successfully",
                                        buttons: {
                                            OK: function() {
                                                window.location.href = BASE_URL + 'competitor';
                                            }
                                        }
                                    });
                                }
                            }
                        });



                    }
                });



            });



            $('#clientreferral_frmAddContact').validate({
             rules:{
             contact_first_name:{
             required: true,
             noSpace: true
             },
             contact_last_name:{
             required: true,
             noSpace: true
             },
             contact_email:{
             required: true,
             email: true
             },
             country_code1:{
             required: true,
             maxlength: 3,
             minlength: 3,
             accept: "[0-9-\(\)]+"
             },
             contact_phone:{
             required: true,
             //                                number: true,
             maxlength:14,
             minlength:14,
             accept: "[0-9-\(\)]+"
             },
             category:{
             required: true,
             noSpace: true
             },
             company_name:{
             required: true,
             noSpace: true
             },
             ref_address:{
             required: true,
             noSpace: true
             },
             date_contacted:{
             //required: true,
             }
                 
             },
             messages: {
             contact_first_name: {
             required: "<font color=\"red\">Please enter first name!</font>",
             noSpace: "<font color=\"red\">Space not allowed</font>"
             },
             contact_last_name: {
             required: "<font color=\"red\">Please enter last name!</font>",
             noSpace: "<font color=\"red\">Space not allowed</font>"
             },
             contact_email: {
             required: "<font color=\"red\">Please enter your email!</font>",
             email: "<font color=\"red\">Please enter valid email!</font>",
             },
             country_code1:{
             required: "<font color=\"red\">Please enter your country code!</font>",
             maxlength: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
             minlength: "<font color=\"red\">Please enter your correct country code !</font>",
             accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>",
             },
             contact_phone: {
             required: "<font color=\"red\">Please enter your phone number!</font>",
             maxlength: "<font color=\"red\">Please enter your 10 digit Phone number</font>",
             minlength: "<font color=\"red\">Please enter your 10 digit Phone number</font>",
             accept: "<font color=\"red\">Please enter your country code! Maximum 3 digits allow.</font>"
                 
             },
             category: {
             required: "<font color=\"red\">Please enter Industry type!</font>",
             noSpace: "<font color=\"red\">Space not allowed</font>"
             },
             company_name: {
             required: "<font color=\"red\">Please enter company name!</font>",
             noSpace: "<font color=\"red\">Space not allowed</font>"
             },
             ref_address: {
             required: "<font color=\"red\">Please enter address!</font>",
             noSpace: "<font color=\"red\">Space not allowed</font>"
             },
             date_contacted: {
             //required: "<font color=\"red\">Please select date note!</font>"
             }
                 
                 
             }
             });

            $('#referral_add_contact').on('click', function(e) {
                var valid = $('#clientreferral_frmAddContact').valid();
                if (valid) {
                    var contact_first_name = $('#contact_first_name').val();
                    var target_seq_no = $('#target_seq_nos').val();
                    var contact_last_name = $('#contact_last_name').val();
                    var contact_email = $('#contact_email').val();
                    var country_code1 = $('#country_code2').val();
                    var contact_phone = $('#contact_phone2').val();
                    var category = $('#category').val();
                    var company_name = $('#company_name').val();
                    var ref_address = $('#ref_address').val();
                    var date_contacted = $('#date_contacted').val();
                    //alert(contact_first_name);
//                            alert(contact_phone);return false;
                    var user_company_id = $('#user_company_id').val();



                    if (!jQuery.trim(category))
                    {
                        jconfirm({
                            title: 'Confirmation!',
                            content: "Remove White Space From Category",
                        });
                        $("#category").val('');
                        $("#category").focus();
                    }
                    else if (!jQuery.trim(ref_address))
                    {
                        jconfirm({
                            title: 'Confirmation!',
                            content: "Remove White Space From Address",
                        });
                        $("#ref_address").val('');
                        $("#ref_address").focus();

                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: BASE_URL + 'Client_referral/add_client_referral/',
                            data: {
                                contact_first_name: contact_first_name,
                                target_seq_no: target_seq_no,
                                contact_last_name: contact_last_name,
                                country_code1: country_code1,
                                contact_email: contact_email,
                                contact_phone: contact_phone,
                                category: category,
                                company_name: company_name,
                                ref_address: ref_address,
                                date_contacted: date_contacted

                            },
                            beforeSend: function() {
                                //$("#product_purchase_submit").ajaxloader('show');
                                $('#referral_add_contact').prop('disabled', true);

                            },
                            success: function(data) {
                                /*alert(data);
                                console.log(data);*/
                                $('#referral_add_contact').prop('disabled', false);
                                if (data == 1) {
                                    //alert(data);
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "Contact Add successfully",
                                        buttons: {
                                            OK: function() {
                                                window.location.href = BASE_URL + 'Client_referral';
                                            }
                                        }
                                    });
                                }
                            }
                        });

                    }

                }
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('[data-toggle="popover"]').popover({
                    placement: 'bottom'
                });
            });
        </script>

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

