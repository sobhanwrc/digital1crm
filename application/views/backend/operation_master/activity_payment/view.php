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

        var aboutMe = function (x) {
            $(x).toggleClass('short')
        };

        $(function () {
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
            $('#clicker').click(function () {
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
            $('#clicker1').click(function () {
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
                                <a href="<?php echo base_url() ?>competitor">Module7</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>View</span>
                            </li>
                        </ul>
                        
                        
                        <!--      adding code for pageing -->
                        
                        
                        
                            <table width="180px" align="right">
                                    <tr>
                                        
                                            <td style="width: 35px" height="40px" valign="top">
                                                <?php if($prev_target_seq_no){?>
                                                <a style="width: 100%; display: block" href="<?php echo $base_url;?>Activity_Payment/view/<?php echo base64_encode($prev_target_seq_no); ?>/<?php echo base64_encode($fetch_details[0]['firm_seq_no']); ?>" id="prev"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-left"></i></a>
                                                <?php } ?>
                                            </td>
                                        

                                        <td style=" width: 90px">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <!--<input name="options" class="toggle" id="option1" type="radio">-->
                                                    <a style=" text-decoration: none; color:#fff" href="" onclick="javascript:window.location.href='<?php echo $base_url;?>Activity_Payment'"> Back to Listing</a></label>
                                            </div>
                                        </td>

                                        
                                            <td style=" width: 35px" height="40px" valign="top">
                                                <?php if($next_target_seq_no){?>
                                                <a style="width: 100%; display: block" href="<?php echo $base_url;?>Activity_Payment/view/<?php echo base64_encode($next_target_seq_no); ?>/<?php echo base64_encode($fetch_details[0]['firm_seq_no']); ?>" id="next"><i style=" font-size: 36px; margin-top: 10px;" class="fa fa-angle-right pull-right"></i></a>
                                                <?php } ?>
                                            </td>
                                        
                                    </tr>


                            </table>

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <!--  ending of pagging   -->

                        <?php /*<div class="btn-group btn-group-devided" data-toggle="buttons" style=" position: absolute; top:7px; right: 20px;">
                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()">Back</a></label>
                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                        </div> 
                         * /
                         */
                            ?>
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
                                
                                </div>
                                        </div>
                                     </ul>
                                                                     <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                                         <input type="radio" name="options" class="toggle" id="option1"><a href="javascript:void(0)" onclick="history.back()">Back</a></label> 
                                                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                                                </div>
                                                            </div>
                                
                                                        </div>-->


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
                                    <?php if ($user_detail[0]['type'] == "C") {
                                        if(file_exists("./assets/upload/".$contact_image) && $contact_image != "") {
                                            $image_name = base_url()."assets/upload/".$contact_image;
                                        ?>
                                          <img class="corporate_image" style="border-radius:0 !important;" src="<?php echo $image_name;?>" alt="logo" class="logo-default">
                                        <?php } else { ?>
                                          <img class="corporate_image" style="border-radius:0 !important;" src="<?php echo base_url(); ?>assets/upload/image/user_blank.jpg" alt="logo" class="logo-default">
                                        <?php } ?>
                                    <?php } else {
                                        if(file_exists("./assets/upload/".$contact_image) && $contact_image != "") {
                                            $image_name = base_url()."assets/upload/".$contact_image;
                                            ?>
                                            
                                            <div class="individual">
                                            <img class="individual" src="<?php echo $image_name; ?>" alt="logo" class="logo-default">
                                            </div>
                                        <?php } else { ?>
                                            <img class="individual" src="<?php echo base_url(); ?>assets/upload/image/user_blank.jpg" alt="logo" class="logo-default">
                                    <?php } }?>
                                       
                                       
                                        <div style=" width: 100%; margin: 0 auto;">
                                            <div style="width: 100%; display: inline-block;">
                                                <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Target :</strong></span>
                                                <?php if ($user_detail[0]['type'] == "C") { ?>
                                                <span style=" font-size: 20px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;"><?php  echo $user_detail[0]['company'] ?>,</span>
                                                
                                                    <span style=" width: auto; padding: 0 5px; font-weight: bold; display: inline-block;">
                                                        <div>
                                                            <?php  echo $user_detail[0]['target_first_name'] . ' ' . $user_detail[0]['target_last_name']; ?>
                                                        </div>
                                                        

                                                    </span>
                                                <?php } else{?>
                                                <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;"><?php  echo $user_detail[0]['target_first_name'] . ' ' . $user_detail[0]['target_last_name']; ?>,</span>
                                                
                                                    <span style=" width: auto; padding: 0 5px; font-weight: bold; display: inline-block;">
                                                        <div>
                                                            <?php echo $user_detail[0]['company']; ?>
                                                        </div>
                                                    
                                                    </span>
                                                <?php }?>

                                                <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php  echo $user_detail[0]['email']; ?></span>

                                                <?php if ($user_detail[0]['lead_source_and_date']){ ?>
                                                    <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                        <strong>Lead Source:</strong>                                                        
                                                            <?php echo $user_detail[0]['lead_source_and_date'];?>
                                                    </span>
                                                <?php }?>

                                                <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                    <strong>Phone:</strong> <?php  echo $user_detail[0]['phone']; ?>

                                                <a class="call_now" href="javascript:void(0)" val='<?php echo $fetch_details['target_seq_no']; ?>' from_model="module7" name="<?php echo $user_detail[0]['target_first_name'].' '.$user_detail[0]['target_last_name']; ?>"><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                                </span>
                                            
                                            </div>
                                            <?php 
                                            if($user_detail[0]['type'] == "I"){
                                                if($fetch_add_contact_details){
                                                //t($fetch_add_contact_details);die; ?>
                                                    <div style="width: 100%; display: inline-block;">
                                                        <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>
                                                        
                                                        <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">
                                                        <?php if($fetch_add_contact_details['is_primary_contact']=='1'){ ?>
                                                       
                                                            <div><?php echo $fetch_add_contact_details['first_name'].' '. $fetch_add_contact_details['last_name']; ?></div>
                                                        
                                                        <?php } ?>
                                                            
                                                        </span>
                                                        
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $fetch_add_contact_details['email']; ?></span>
                                                        
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                            <?php if($fetch_add_contact_details['is_primary_contact']=='1') { ?>
                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $fetch_add_contact_details['phone']; ?>
                                                                    <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                                                </div>
                                                            <?php } ?>

                                                        </span>
                                                        
                                                    </div>
                                                <?php } } else{
                                                if($fetch_add_contact_details){ ?>
                                                <div style="width: 100%; display: inline-block;">
                                                        <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>
                                                        <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">
                                                        <?php if($fetch_add_contact_details['is_primary_contact']=='1'){ ?>
                                                       
                                                            <div><?php echo $fetch_add_contact_details['first_name'].' '. $fetch_add_contact_details['last_name']; ?></div>
                                                        
                                                        <?php } ?>
                                                            
                                                        </span>
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $fetch_add_contact_details['email']; ?></span>
                                                        
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                            <?php if($fetch_add_contact_details['is_primary_contact']=='1') { ?>
                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $fetch_add_contact_details['phone']; ?>
                                                                    <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                                                </div>
                                                            <?php } ?>

                                                        </span>
                                                        
                                                    </div>
                                            <?php } else {?>
                                                <div style="width: 100%; display: inline-block;">
                                                        <span style=" width: auto; padding: 0 5px; text-align: right;display: inline-block;"><strong>Primary Contact :</strong></span>
                                                        <span style=" font-size: 16px; font-weight: bold; width: auto; padding: 0 5px; display: inline-block;">
                                                       
                                                            <div><?php  echo $user_detail[0]['target_first_name'] . ' ' . $user_detail[0]['target_last_name']; ?></div>
                                                            
                                                        </span>
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;"><strong>Email: </strong><?php echo $user_detail[0]['email']; ?></span>
                                                        
                                                        <span style=" width: auto; padding: 0 5px; display: inline-block;">
                                                                <div class="caption-subject bold" style=" width: 100%; display: inline-block;">Phone: <?php echo $user_detail[0]['phone']; ?>
                                                                    <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>
                                                                </div>

                                                        </span>
                                                        
                                                    </div>
                                            <?php } }?>
                                        </div>


                                        
                                    
                                   </div>



                                <!-- <div class="portlet-title">
                                    <div class="col-md-5 col-lg-5">
                                        <div class="caption font-dark">
                                        <?php if ($user_detail[0]['type'] == "C") {?>
                                            <span class="caption-subject bold" style=" width: 100%; margin-bottom: 10px; margin-top: 10px; display: block; font-size: 20px;"><i class="fa fa-university"></i> <?php echo $user_detail[0]['company']; ?></span>
                                        <?php } else {?>
                                            <span class="caption-subject bold" style=" width: 100%; margin-bottom: 10px; margin-top: 10px; display: block"><i class="fa fa-university"></i> <?php echo $user_detail[0]['company']; ?></span>
                                        <?php }?>

                                            <span class="caption-subject bold" style=" width: 100%; display: block"><i class="fa fa-user"></i> <?php echo $user_detail[0]['target_first_name'] . ' ' . $user_detail[0]['target_last_name']; ?> </span>
                                            
                                            <?php 
                                            if($get_contact_data[0]['is_primary_contact']==1)
                                            { ?>
                                             <span class="caption-subject bold" style=" width: 100%; display: block"><i class="fa fa-user"></i> <?php echo $get_contact_data[0]['first_name'] . ' ' . $get_contact_data[0]['last_name']; ?> (Primary  contact)</span>
                                           <?php } ?>

                                             
                                             
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-lg-4">
                                        <span style=" width: 100%; display: inline-block;">
                                                <?php  
                                                if ($targets[0]['type'] == "C") {
                                                    if(file_exists("./assets/upload/".$contact_image) && $contact_image != "") {
                                                        $image_name = base_url()."assets/upload/".$contact_image;
                                                ?>
                                                  <img src="<?php echo $image_name;?>" alt="logo" class="logo-default">
                                                <?php } else { ?>
                                                  <img src="<?php echo base_url(); ?>assets/upload/image/inner_logo11.jpg" alt="logo" class="logo-default">
                                                <?php } ?>
                                                <?php } else {
                                                if(file_exists("./assets/upload/".$contact_image) && $contact_image != "") {
                                                    $image_name = base_url()."assets/upload/".$contact_image;
                                                    ?>
                                                    <img class="individual" src="<?php echo $image_name; ?>" alt="logo" class="logo-default">
                                                <?php } else { ?>
                                                    <img class="individual" src="<?php echo base_url(); ?>assets/upload/image/inner_logo11.jpg" alt="logo" class="logo-default">
                                            <?php } }?>
                                        </span>

                                        <span class="caption-subject bold" style="margin-top: 10px; width: 100%; display: inline-block;">Phone:<?php echo $user_detail[0]['phone']; ?>

                                            <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                        </span>

                                    </div>

                                    <div class="col-md-3 col-lg-3">
                                        <div class="actions" style=" width: 100%; display: inline-block; margin-top: 20px;">
                                            <div class="btn-group btn-group-devided pull-right" data-toggle="buttons">
                                                <ul class="list-inline">
                                                    <li><a href=""><i class="fa fa-envelope-o"></i> SMS</a></li>
                                                    <li><a href="" onclick="javascript:window.location.href = '<?php echo $base_url; ?>targets/temp_email/<?php echo base64_encode($targets['target_seq_no']) ?>/<?php echo base64_encode($targets['company_id']) ?>'"><i class="fa fa-envelope-o"></i> Email</a></li>
                                                     <li>
                                                        <button style=" padding:6px 0; background-color: transparent; color:#337ab7" type="button" class="btn" data-toggle="popover" data-content="<?php echo $notes[0]['note7']; ?> " data-html="true"><i class="fa fa-code"></i> Script</button>


                                                </ul>
                                            </div>



                                        </div>



                                    </div> -->




                                </div>   

                                <div class="portlet-body">


                                    <!-- new div start-->
                                    <div class="main_hidediv_area">

                                        <div style=" width: 100%; display: inline-block; height: 50px;">
                                              <?php if($fetch_module_details[0]['content']!= ''){ ?>
                                             <span style="font-weight: 700;" class="span-width"><?php echo $fetch_module_details[0]['content']; ?></span>
                                             <?php } ?>
                                             <button class="btn btn-transparent dark btn-outline btn-circle active1" data-target="#payment_div" data-toggle="modal" >
                                                            <img src="<?php echo $assets_path; ?>pages/img/payment.png" alt="" class="menu_icon" /> Payment
                                                            </button>
                                            <span style=" width: 220px; margin-right: 21px; text-align: right; display: inline-block" class="pull-right">
                                                <button style="width: 210px" class="btn btn-transparent dark btn-outline btn-circle active" data-target="#view_user_details" data-toggle="modal">
                                                <img src="<?php echo $assets_path; ?>pages/img/View_Details.png" alt="" class="menu_icon" /> View Details
                                                </button>
              <!--                                  <button class="btn btn-transparent dark btn-outline btn-circle active" id="clicker1" style="display: none;">Hide Details <i class="fa  fa-angle-down"></i></button>-->
                                            </span>

                                        </div>


                                        <div class="comm_section">
                                                  <ul class="list-inline pull-right">
                                                    <li><a href="" data-target="#textModal" data-toggle="modal" id="" name="<?php echo $targets['target_first_name'] . ' ' . $targets['target_last_name']; ?>"><i class="fa fa-envelope-o"></i> SMS</a></li>
                                                    <li><a href="<?php echo $base_url; ?>Activity_Payment/temp_email/<?php echo base64_encode($target_seq_nos); ?>/<?php echo base64_encode($company_ids); ?>" ><i class="fa fa-envelope-o"></i> Email</a></li>
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
                                            </div>

                                            <div class="col-md-4" style=" padding-right: 0">
                                                <h3 class="hint" style="text-align: right; padding-right: 21px;"> Contact Type </h3>

                                                <div class="portlet light bordered">
                                                    <div class="next_date_area">
                                                        <ul class="list-unstyled">
                                                            <li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#add_payment_note_div" data-toggle="modal" >
                                                            <img src="<?php echo $assets_path; ?>pages/img/Add_Note.png" alt="" class="menu_icon" /> Add Note
                                                            </button>
                                                            </li>
                                                            <!-- <li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#payment_div" data-toggle="modal" >
                                                            <img src="<?php echo $assets_path; ?>pages/img/payment.png" alt="" class="menu_icon" /> Payment
                                                            </button>
                                                            </li>-->

                                                            <li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#do_not_call_add_note_payment" data-toggle="modal" >
                                                            <img src="<?php echo $assets_path; ?>pages/img/Not_Call_Me.png" alt="" class="menu_icon" /> Do Not Call Me
                                                            </button>
                                                            </li>
                                                        </ul>
                                                    </div>
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



                                    </div>


                                    <!--                                   view deatils div-->
                                    <div class="modal fade" id="view_user_details" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="master_name_edit" autocomplete="off" id="master_name_edit" method="post" action="<?php echo $base_url; ?>master_name/add">
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
                                                                <input type="hidden" name="seq_no" id="seq_no" value="<?php echo $user_detail[0]['module_7_seq_no']; ?>">
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
                                                                        <textarea name="newnotes" id="newnotes" cols="75" rows="5"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="clearfix"></div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                            <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                                                                <input type="button" value="Submit" class="submit btn bg-purple pull-left" name="master_name_submit" id="master_name_submit" >
                                                                <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!--end add note model div end-->  

                                    <!--                                    add next call date & time div-->
                                    <div class="modal fade" id="add_payment_note_div" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="add_payment_note" autocomplete="off" id="add_payment_note" method="post" action="<?php echo $base_url; ?>master_name/add">
                                                    <input type="hidden" name="user_company_id" id="user_company_id" value="<?php echo $targets[0]['company_id']; ?>">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> Add Note</b></div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="create_event" class=" mt10" style=" display: inline-block; width: 100%;">

                                                            
                                                            

                                                            <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                                <div class="form-group">
                                                                    <label for="comment">Write Note</label>
                                                                    <textarea class="form-control" rows="2" id="write_notes" name="write_notes"></textarea>
                                                                     <input type="hidden" value="<?php echo $target_seq_no ;?>" id="target_seq_no" name="target_seq_no">
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                        <div class="input-group col-md-12" style="padding-right:15px">
                                                            <input type="button" value="Submit" class="submit btn green pull-right" name="add_payment_note_submit" id="add_payment_note_submit" >
                                                            <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
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

                                                             <div class="col-md-7" style=" margin-top: 15px; padding-left: 0;">
                                                                <div style="width: 100%"><label>Date</label></div>
                                                                <div class="input-group " style="width: 100%">
                                                                    <!-- <input type="text" name="next_call_date" value=""  placeholder="" class="form-control "> -->
                                                                    <input style="width: 90%"  aria-describedby="datepicker-error" aria-required="true" aria-invalid="false"  type="text" id="payment_add_date" name="payment_add_date" value="<?php echo $user_detail[0]['appointment_date']; ?>"  placeholder="DD-MM-YYYY" class="form-control " readonly>

                                                                    <label id="next_call_date-error" class="error" for="next_call_date"></label>
                                                                </div>
                                                            </div>




                                                             <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                                <div class="form-group">
                                                                    <label for="comment">Payment Done</label>
                                                                     <input type="checkbox" id="chk_payment" name="chk_payment">

                                                                      <input type="hidden" id="target_seqs_no" name="target_seqs_no" value="<?php echo $target_seq_no ; ?>">
                                                                      <input type="hidden" value="<?php echo $module_no ;?>" id="module_no">
                                                                      <input type="hidden" value="<?php echo date('d-m-Y') ;?>" id="current_date">
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                        <div class="input-group col-md-12 pull-right" style="padding-right:15px">
                                                            <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel" name="" id="">
                                                            <input type="button" value="Submit" class="submit btn green pull-right" name="payment_done_submit" id="payment_done_submit" >
                                                            <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!--                                end appointment div-->
                                    <!--                                    do not call-->
                                    <div class="modal fade" id="do_not_call_add_note_payment" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="do_not_call_payment" autocomplete="off" id="do_not_call_payment" method="post" action="javascript:void(0)">
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
                                                                    <textarea class="form-control" name="do_not_call_notes_payment" id="do_not_call_notes_payment" cols="75" rows="5"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                        <div class="input-group col-md-12" style="padding-right:15px">
                                                            <input type="button" value="Submit" class="submit btn green pull-right" name="do_not_call_payment_submit" id="do_not_call_payment_submit" >
                                                            <div id="master_name_submit_loader" style="display:none; padding-right:15px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!--                                    end do not call-->

                                    <!--                                    add contact div-->
                                    <div class="modal fade" id="module3_addContactModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Add Contact</b></div>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="create_event" class=" mt10">
                                                        <div class="col-md-12">
                                                            <form name="module3_frmAddContact" id="module3_frmAddContact" method="POST" novalidate="" autocomplete="off">
                                                                <div class="form-group">
                                                                    <div style="width: 100%"><label>First Name</label></div>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" name="contact_first_name" id="contact_first_name" class="form-control text-area" value="<?php  if($get_contact_data[0]['is_primary_contact']==1)echo $get_contact_data[0]['first_name'] ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div style="width: 100%"><label>Last Name</label></div>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" name="contact_last_name" id="contact_last_name" class="form-control text-area" value="<?php  if($get_contact_data[0]['is_primary_contact']==1) echo $get_contact_data[0]['last_name'] ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div style="width: 100%"><label>Email</label></div>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" name="contact_email" id="contact_email" class="form-control text-area" value="<?php  if($get_contact_data[0]['is_primary_contact']==1)echo $get_contact_data[0]['email'] ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div style="width: 100%"><label>Phone</label></div>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" name="contact_phone" id="contact_phone" class="form-control text-area" value="<?php  if($get_contact_data[0]['is_primary_contact']==1)echo $get_contact_data[0]['phone'] ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div style="width: 100%"><label>Designation</label></div>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="text" name="contact_designation" id="contact_designation" class="form-control text-area" value="<?php  if($get_contact_data[0]['is_primary_contact']==1) {echo $get_contact_data[0]['designation'] ; } ?>">
                                                                    </div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <div style="width: 100%"><label>Primary Contact</label></div>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <input type="checkbox" name="contact_primary" id="contact_primary" <?php if($get_contact_data[0]['is_primary_contact']==1) echo "checked";?> >
                                                                        <input type="hidden" value="<?php $get_contact_data[0]['target_seq_no'];?>" id="target_seq_no" name="target_seq_no">
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
                                                    <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                                                        <input type="button" value="Submit" class="submit btn bg-purple pull-left" name="module3_add_contact" id="module3_add_contact" >
                                                        <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>
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
                                                        <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Send Text to  <?php echo $fetch_details['target_first_name'] . ' ' . $fetch_details['target_first_name'] ; ?> </b></div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="create_event" class=" mt10">
                                                            <div class="form-group" style="padding-bottom:25px;">
                                                                Mobile No. 
                                                                <input type="text" value="<?php echo $fetch_details['home_phone']; ?>" readonly placeholder="" class="form-control" id="mobile_no_for_send_tet" name="mobile_no" autocomplete="off" style="width: 85%">
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
                                                            <input type="button" value="Submit" class="submit btn green pull-left" name="<?php echo $fetch_details['target_first_name'] . ' ' . $fetch_details['target_first_name']; ?>" id="sendtext_submit" val='<?php echo $fetch_details['target_seq_no']; ?>' from_model="module7" admin_id="<?php echo $admin_id; ?>">
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
                $('#payment_add_date').datepicker({
                    //        'format': 'yyyy-m-d',
                    'format': 'dd-mm-yyyy',
                    'autoclose': true,
                    'startDate': date
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






                $('#keep_in_touch').on('click', function () {
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
                            confirm: function () {
                            }
                        });
                    }

                });
                $(document).on('click', '.remove', function (e) {
                    var numItems = $('.keep_touch').length;
                    var keep_in_touch_div_id = $(this).closest("div.keep_touch").attr("id");
                    $('#' + keep_in_touch_div_id).remove();
                });

            </script> 
            <script type="text/javascript">
                var FormInputMask = function () {

                    var handleInputMasks = function () {

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

                $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
                });

                $(document).ready(function () {
                    
                                        //validation for send sms//
                    $('#sendtext_submit').on('click', function () {
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
                                    Yes: function () {
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
                                                OK: function () {
                                                    window.location.reload();
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
                            }
                        },
                        messages: {
                            text1: {
                                required: "Please enter your text"
                            }
                        }
                    });

                    //end//

                    $('#master_name_submit').on('click', function (e) {
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
                            success: function (response) {

                                $('#calendarModal .close').trigger('click');
                                location.href = BASE_URL + 'client_master/details/' + encodedString;

                            },
                            error: function () {
                                alert('Error');
                            }
                        });
                        return false;
                    });













                    $(".edit_details").on('click', function (e) {
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
                            },
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
                                email: "<font color=\"red\">Enter valid email</font>"
                            },
                            country_code1: {
                                //required: "<font color=\"red\">Please enter country code !</font>"
                            },
                            mobile: {
                                //required: "<font color=\"red\">Please enter mobile !</font>"
                            },
                            address1: {
                                required: "<font color=\"red\">Please enter aaddress!</font>"
                            },
                            target_company_name: {
                                required: "<font color=\"red\">Please enter company name !</font>"
                            },
                            industry_type: {
                                required: "<font color=\"red\">Please enter industry type !</font>"
                            },
                            phione: {
                                //required: "<font color=\"red\">Please enter contact phone !</font>"
                            },
                        }
                    });
                    $('#edit_details_btn').on('click', function (e) {
                        var valid = $('#master_name_edit').valid();
                        if (valid) {
                            //alert("hjhgfjh");
                            var first_name = $('#first_name').val();
                            var seq_no = $('#seq_no').val();
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
                                url: BASE_URL + 'Activity_Payment/edit_details/',
                                data: {
                                    first_name: first_name,
                                    last_name: last_name,
                                    email: email,
                                    country_code1: country_code1,
                                    mobile: mobile,
                                    address1: address1,
                                    seq_no: seq_no,
                                    target_company_name: target_company_name,
                                    industry_type: industry_type,
                                    phione: phione,
                                    target_seq_no: target_seq_no
                                },
                                beforeSend: function () {
                                    $('#edit_details_btn').prop('disabled', true);
                                },
                                success: function (data) {
                                    $('#edit_details_btn').prop('disabled', false); 
                                    /*alert(data);                           
                                    console.log(data);*/
                                    if (data == 1) {
                                        jconfirm({
                                            title: 'Confirmation!',
                                            content: "Details Edited successfully",
                                            buttons: {
                                                OK: function () {
                                                    window.location.href = BASE_URL + 'Activity_Payment';
                                                }
                                            }
                                        });
                                    }
                                }
                            });

                        }
                    });
                    //--------------------------end--------------------------------//















                    $('#do_not_call_payment_submit').on('click', function (e) {
                        var valid = $('#do_not_call_payment').valid();
                        if (valid) {
                            var notes = $('#do_not_call_notes_payment').val();
                            var target_seq_no = $('#target_seq_no').val();
                              
                              
                            if (notes) {
                               
                               var val=$("#do_not_call_notes_payment").val();
                               if(!jQuery.trim(val))
                               { 
                                     jconfirm({
                                     title: 'Confirmation!',
                                     content: "Remove White Space",
                                      });
                                     $("#do_not_call_notes_payment").val('');
                                     $("#do_not_call_notes_payment").focus();
                               }
                               else
                               {
                                
                                $.ajax({
                                    type: "POST",
                                    url: BASE_URL + 'Activity_Payment/do_not_call_again_mod7/',
                                    data: {
                                        notes:notes,
                                        target_seq_no:target_seq_no
                                    },
                                    success: function (data) {
                                             //alert(data);
                                             if (data == '1') {
                                             jconfirm({
                                                 title: 'Confirmation!',
                                                 content: "Deleted From The Record",
                                                 buttons: {
                                                     OK: function () {
                                                         window.location.href = BASE_URL + 'Activity_Payment';
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

                    $('#do_not_call_payment').validate({
                        rules: {
                            do_not_call_notes_payment: {
                                required: true
                            }
                        },
                        messages: {
                            do_not_call_notes_payment: {
                                required: "<font color=\"red\">Please enter your note!</font>"
                            }
                        }
                    });


                    $('#add_payment_note_submit').on('click', function (e) {
                        var valid = $('#add_payment_note').valid();
                        if (valid) {
                            var write_notes=$('#write_notes').val();
                            var target_seq_no=$('#target_seq_no').val();
                            
                            var val=$("#write_notes").val();
                             if(!jQuery.trim(val))
                               { 
                                 jconfirm({
                                 title: 'Confirmation!',
                                 content: "Remove White Space",
                                  });
                                 $("#write_notes").val('');
                                 $("#write_notes").focus();
                               }
                            else
                            {
                              $.ajax({
                                type: "POST",
                                url: BASE_URL + 'Activity_Payment/add_note/',
                                data: {
                                    write_notes: write_notes,
                                    target_seq_no:target_seq_no
                                 },
                                success: function (data) {
                                 if (data == '1')
                                 {
                                  jconfirm({
                                           title: 'Confirmation!',
                                           content: "Note Added successfully",
                                           buttons: {
                                             OK: function () {
                                                 window.location.href="<?php echo base_url();?>Activity_Payment";
                                              }
                                           }
                                        });
                               }
                                    
                                }
                            });
                          
                          }

                        }
                    });

                    $('#add_payment_note').validate({
                        rules: {
                            write_notes: {
                                required: true
                            }
                        },
                        messages: {
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
                    $('#payment_done_submit').on('click', function (e) {
                        var valid = $('#payment_done_form').valid();
                        if (valid) {
                            var payment_add_notes=$('#payment_add_notes').val();
                           
                            var target_seq_no = $('#target_seqs_no').val();
                            var payment_add_date = $('#payment_add_date').val();

                            var val=$("#payment_add_notes").val();
                             if(!jQuery.trim(val))
                              { 
                                jconfirm({
                                 title: 'Confirmation!',
                                 content: "Remove White Space From Note",
                               
                               });
                                $("#payment_add_notes").val('');
                                $("#payment_add_notes").focus();
                              }
                            else
                            {
                             $.ajax({
                                type: "POST",
                                url: BASE_URL + 'Activity_Payment/add_payment/',
                                data: {
                                    payment_add_notes:payment_add_notes,
                                    target_seq_no: target_seq_no,
                                    payment_add_date:payment_add_date
                                   
                                },
                                beforeSend: function() {
                                    //$("#product_purchase_submit").ajaxloader('show');
                                    $('#payment_done_submit').prop('disabled', true);

                                },

                                success: function (data) {
                                     $('#payment_done_submit').prop('disabled', false);
                                     if (data==1) {
                                        //alert(data);
                                         jconfirm({
                                             title: 'Confirmation!',
                                             content: "Payment Done successfully",
                                             buttons: {
                                                 OK: function () {
                                                     window.location.href = BASE_URL + 'Activity_Payment';
                                                 }
                                             }
                                         });
                                     }
                                }
                            });

                           }

                        }
                    });
                    
                   

                });



              $('#module3_frmAddContact').validate({
                        rules:{
                            contact_first_name:{
                                required: true
                            },
                            contact_last_name:{
                                required: true
                            },
                            contact_email:{
                                required: true
                            },
                            contact_phone:{
                                required: true
                            },
                            contact_designation:{
                                required: true
                            }
                        },
                        messages: {
                            contact_first_name: {
                                required: "<font color=\"red\">Please select date!</font>"
                            },
                            contact_last_name: {
                                required: "<font color=\"red\">Please select time!</font>"
                            },
                             contact_email: {
                                required: "<font color=\"red\">Please enter note!</font>"
                            },
                            contact_phone: {
                                required: "<font color=\"red\">Please enter note!</font>"
                            },
                            contact_designation: {
                                required: "<font color=\"red\">Please enter note!</font>"
                            }

                        }
                    });

               $('#module3_add_contact').on('click', function (e) {
                        var valid = $('#module3_frmAddContact').valid();
                        if (valid) {
                            var contact_first_name = $('#contact_first_name').val();
                            var target_seq_no=$('#target_seq_no').val();
                            var contact_last_name = $('#contact_last_name').val();
                            var contact_email = $('#contact_email').val();
                            var contact_phone=$('#contact_phone').val();
                            var contact_designation=$('#contact_designation').val();
                            var user_company_id = $('#user_company_id').val();
                             if(jQuery("#contact_primary").prop("checked"))
                             {
                                 var contact_primary=1;
                             }
                             else 
                             {
                                var contact_primary='';
                             }
                              
                           //alert(contact_primary);
                            $.ajax({
                                type: "POST",
                                url: BASE_URL + 'Competitor/module3_add_contact/',
                                data: {
                                    contact_first_name:contact_first_name,
                                    target_seq_no: target_seq_no,
                                    contact_last_name:contact_last_name,
                                    contact_last_name:contact_last_name,
                                    contact_email:contact_email,
                                    contact_phone:contact_phone,
                                    contact_designation:contact_designation,
                                    contact_primary:contact_primary,
                                    user_company_id:user_company_id
                                },
                                success: function (data) {
                                    
                                     if (data == '1') {
                                         jconfirm({
                                             title: 'Confirmation!',
                                             content: "Contact Add successfully",
                                             buttons: {
                                                 OK: function () {
                                                     window.location.href = BASE_URL + 'competitor';
                                                 }
                                             }
                                         });
                                     }
                                }
                            });

                        }
                    });
            </script>
             <script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'bottom'
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

