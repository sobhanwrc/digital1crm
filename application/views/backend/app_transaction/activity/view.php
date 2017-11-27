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
                                <a href="<?php echo base_url() ?>competitor">Module3</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>View</span>
                            </li>
                        </ul>

                        <div class="btn-group btn-group-devided" data-toggle="buttons" style=" position: absolute; top:7px; right: 20px;">
                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()"> Back</a></label>
                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                        </div>

                    </div>
                    <!-- END PAGE BAR -->

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
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
                                <div class="portlet-title">
                                    <div class="col-md-5 col-lg-5">
                                        <div class="caption font-dark">

                                            <span class="caption-subject bold" style=" width: 100%; margin-bottom: 10px; margin-top: 10px; display: block"><i class="fa fa-university"></i> <?php echo $module6_data[0]['company']; ?></span>

                                            <span class="caption-subject bold" style=" width: 100%; display: block"><i class="fa fa-user"></i> <?php echo $module6_data[0]['target_first_name'] . ' ' . $module6_data[0]['target_last_name']; ?> </span>
                                            
                                            <?php 
                                            if($get_contact_data[0]['is_primary_contact']==1)
                                            { ?>
                                             <span class="caption-subject bold" style=" width: 100%; display: block"><i class="fa fa-user"></i> <?php echo $get_contact_data[0]['first_name'] . ' ' . $get_contact_data[0]['last_name']; ?> (Primary  contact)</span>
                                           <?php } ?>

                                        </div>

                                    </div>

                                    <div class="col-md-4 col-lg-4">
                                        <span style=" width: 100%; display: inline-block;"><img src="https://localhost/digital1crm/assets/upload/image/inner_logo11.jpg" alt="logo" class="logo-default"></span>

                                        <span class="caption-subject bold" style="margin-top: 10px; width: 100%; display: inline-block;">Phone:<?php echo $module6_datas[0]['phone']; ?>

                                            <a href=""><i style="font-size: 23px; margin-left: 10px; color:#337ab7" class="fa fa-phone-square"></i></a>

                                        </span>

                                    </div>

                                    <div class="col-md-3 col-lg-3">
                                        <div class="actions" style=" width: 100%; display: inline-block; margin-top: 20px;">
                                            <div class="btn-group btn-group-devided pull-right" data-toggle="buttons">
                                                <ul class="list-inline">
                                                    <li><a href=""><i class="fa fa-envelope-o"></i> SMS</a></li>
                                                    <li><a href="" onclick="javascript:window.location.href = '<?php echo $base_url; ?>targets/temp_email/<?php echo base64_encode($targets['target_seq_no']) ?>/<?php echo base64_encode($targets['company_id']) ?>'"><i class="fa fa-envelope-o"></i> Email</a></li>
                                                    <li><a href=""><i class="fa fa-code"></i> Script</a></li>

                                                </ul>
                                            </div>



                                        </div>



                                    </div>




                                </div>   

                                <div class="portlet-body">


                                    <!-- new div start-->
                                    <div class="main_hidediv_area">

                                        <div style=" width: 100%; display: inline-block; height: 50px;">
                                            <span style=" width: 200px; margin-right: 21px; text-align: right; display: inline-block" class="pull-right">
                                                <button style="width: 190px" class="btn btn-transparent dark btn-outline btn-circle active" data-target="#view_user_details" data-toggle="modal">View Details</button>
              <!--                                  <button class="btn btn-transparent dark btn-outline btn-circle active" id="clicker1" style="display: none;">Hide Details <i class="fa  fa-angle-down"></i></button>-->
                                            </span>

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
                                                <h3 class="hint"> Contact Type </h3>

                                                <div class="portlet light bordered">
                                                    <div class="next_date_area">
                                                        <ul class="list-unstyled">
                                                            <li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#goods_service_div" data-toggle="modal" >Goods/Service Deliver</button>
                                                            </li>
                                                            <!--<li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#presentation_done_div" data-toggle="modal" >Presentation Done</button>
                                                            </li>

                                                            <li><button class="btn btn-transparent dark btn-outline btn-circle active" id="" data-target="#module3_addContactModal" data-toggle="modal" >Add Contact</button>
                                                            </li>-->
                                                            <!--<li><button class="btn btn-transparent dark btn-outline btn-circle active" id="add_note_module2" data-target="#calendarModal_add_note" data-toggle="modal">Add Note</button>
                                                            </li>-->
                                                            <li><button class="btn btn-transparent dark btn-outline btn-circle active" data-target="#do_not_call_add_note" data-toggle="modal" >Do Not Call Me</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>                                                                   

                                        </div>

                                    </div>


                                    <!--                                   view deatils div-->
                                    <div class="modal fade" id="view_user_details" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="master_name_add" autocomplete="off" id="master_name_add" method="post" action="<?php echo $base_url; ?>master_name/add">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> General Informations </b></div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="create_event" class=" mt10">

                                                            <div class="form-group bb">
                                                                <label class="control-label">First Name</label>
                                                                <input type="text" readonly placeholder="Enter Firm Name" class="form-control"  name="first_name" id="first_name" value="<?php
                                                                if (isset($module6_data[0]['target_first_name']) && $module6_data[0]['target_first_name'] != '') {
                                                                    echo $module6_data[0]['target_first_name'];
                                                                }
                                                                ?>" /> 
                                                                <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo $module6_data[0]['target_seq_no']; ?>">
                                                            </div>

                                                            <div class="form-group bb">
                                                                <label class="control-label">Last Name</label>
                                                                <input type="text" readonly placeholder="Enter Firm Name" class="form-control"  name="last_name" id="last_name" value="<?php
                                                                if (isset($module6_data[0]['target_last_name']) && $module6_data[0]['target_last_name'] != '') {
                                                                    echo $module6_data[0]['target_last_name'];
                                                                }
                                                                ?>" /> </div>

                                                            <div class="form-group bb">
                                                                <label class="control-label">Email</label>
                                                                <input type="text" readonly placeholder="Enter Firm ID" class="form-control" name="email" id="email" value="<?php echo $module6_data[0]['email']; ?>"  />
                                                            </div>

                                                            <div class="form-group bb">
                                                                <label class="control-label" style=" width: 100%; display: inline-block">Phone</label>
                                                                <!--<input type="text" placeholder="" class="form-control" disabled="" name="target_code" id="target_code" value="<?php echo $targets[0]['phione']; ?>" />--> 
                                                                <input type="text" readonly value="<?php echo $country_code; ?>" placeholder="" class="form-control" id="country_code1" name="country_code1" autocomplete="off" style="width: 15%; display: inline-block" readonly>
                                                                <input type="text" readonly placeholder="" value="<?php echo $module6_data[0]['phione'];; ?>" class="form-control phone" id="phione" name="phione" style="width: 83%; margin-left: -5px; display: inline-block">
                                                            </div>

                                                            <div class="form-group bb">
                                                                <label class="control-label">Mobile</label>
                                                                <input type="text" readonly placeholder="" class="form-control" name="mobile" id="mobile" value="<?php echo $module6_data[0]['mobile']; ?>" /> 
                                                            </div>
                                                            <div class="form-group bb">
                                                                <label class="control-label">Address</label>
                                                                <input type="text" readonly placeholder="" class="form-control"  name="address1" id="address1" value="<?php echo $module6_data[0]['address']; ?>" /> 
                                                            </div>
                                                            <div class="form-group bb">
                                                                <label class="control-label">Company Name</label>
                                                                <input type="text" readonly placeholder="Enter Target Company" class="form-control" name="target_company_name" id="target_company_name" value="<?php echo $module6_data[0]['company']; ?>" />
                                                            </div> 
                                                            <div class="form-group">
                                                                <label class="control-label">Categories</label>
                                                                <input type="text" readonly placeholder="Enter Target Company" class="form-control"  name="industry_type" id="industry_type" value="<?php echo $module6_data[0]['categories']; ?>" />
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
                                    <div class="modal fade" id="goods_service_div" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="goods_deliver" autocomplete="off" id="goods_deliver" method="post" action="<?php echo $base_url; ?>master_name/add">
                                                    <input type="hidden" name="user_company_id" id="user_company_id" value="<?php echo $targets[0]['company_id']; ?>">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b> Goods/Service Deliver</b></div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="create_event" class=" mt10" style=" display: inline-block; width: 100%;">

                                                             <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                                <div class="form-group">
                                                                    <label for="comment">Add Note</label>
                                                                    <textarea class="form-control" rows="2" id="goods_notes" name="goods_notes"></textarea>
                                                                     <input type="hidden" value="<?php echo $module_no ;?>" id="module_no" name="module_no">
                                                                </div>

                                                            </div>

                                                            <div class="col-md-8" style=" padding-left: 0;">
                                                                <div style="width: 100%"><label>Date</label></div>
                                                                <div class="input-group " style="width: 100%">
                                                                    <!-- <input type="text" name="next_call_date" value=""  placeholder="" class="form-control "> --> 
                                                                    <input style="width: 90%"  aria-describedby="datepicker-error" aria-required="true" aria-invalid="false"  type="text" id="goods_date" name="goods_date" value=""  placeholder="DD-MM-YYYY" class="form-control ">
                                                                    <span class="input-group-btn" style="display: -moz-box; vertical-align: top">
                                                                        <button class="btn default" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                    </span>
                                                                    <label id="next_call_date-error" class="error" for="next_call_date"></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8" style=" padding-right: 0">
                                                                <!--<div style="width: 100%"><label>Time</label></div>-->
                                                                <div class="input-group " style="width: 100%">
                                                                    Deliver&nbsp;<input type="radio" name="radio" id="radio" checked="checked" value="Deliver" class="radioBtnClass">&nbsp;&nbsp;&nbsp;Return&nbsp;<input type="radio" name="radio" id="radio" value="Return" class="radioBtnClass">
                                                                  
                                                                </div>
                                                            </div>
                                                            <!--<div class="col-md-5" style=" padding-right: 0">
                                                                <div style="width: 100%"><label>Time</label></div>
                                                                <div class="input-group " style="width: 100%">
                                                                    <input type="text" id="basicExample" name="next_call_time" value="<?php echo $user_detail[0]['appointment_time']; ?>" placeholder="" class="form-control">
                                                                  
                                                                </div>
                                                            </div>-->

                                                           

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                        <div class="input-group col-md-12 pull-right" style="padding-right:13px">
                                                            <input type="button" value="Submit" class="submit btn green pull-right" name="good_deliver_submit" id="good_deliver_submit" >
                                                            <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!--                                    end next call date & time div-->

                                    <!--                                presentation done div-->
                                    <div class="modal fade" id="presentation_done_div" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="presentation_done_form" autocomplete="off" id="presentation_done_form" method="post" action="<?php echo $base_url; ?>master_name/add">
                                                      
                                                   <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <div class="modal-title"><span class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b>Presentation Done</b></div>
                                                    </div>

                                                    <div class="modal-body" style=" display: inline-block; width: 100%">
                                                        <div id="create_event" class=" mt10">

                                                            
                                                          
                                                            

                                                            <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                                <div class="form-group">
                                                                    <label for="comment">Add Note</label>
                                                                    <textarea class="form-control" rows="2" id="presentation_notes" name="presentation_notes" id="presentation_notes"></textarea>
                                                                </div>

                                                            </div>
                                                             <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                                                <div class="form-group">
                                                                    <label for="comment">Presentation Done</label>
                                                                     <input type="checkbox" id="chk_presentation" name="chk_presentation">
                                                                      <input type="hidden" id="uid" name="uid" value="<?php echo $id ; ?>">
                                                                      <input type="hidden" value="<?php echo $module_no ;?>" id="module_no" name="module_no">
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                        <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                                                            <input type="button" value="Submit" class="submit btn green pull-right" name="presentation_done_submit" id="presentation_done_submit" >
                                                            <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!--                                end appointment div-->
                                    <!--                                    do not call-->
                                    <div class="modal fade" id="do_not_call_add_note" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-sm">
                                            <div class="modal-content">
                                                <form name="do_not_call" autocomplete="off" id="do_not_call" method="post" action="javascript:void(0)">
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
                                                                    <textarea name="do_not_call_notes" id="do_not_call_notes" cols="75" rows="5"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                                                        <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                                                            <input type="button" value="Submit" class="submit btn bg-purple pull-left" name="do_not_call_submit" id="do_not_call_submit" >
                                                            <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
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
                                                        <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="https://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    end add contact div-->

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

            <script src="https://jonthornton.github.io/Datepair.js/dist/datepair.js"></script>
            <script src="https://jonthornton.github.io/Datepair.js/dist/jquery.datepair.js"></script>
            <script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
            <link href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css"/>


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
                $('#goods_date').datepicker({
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
                // var FormInputMask = function () {

                //     var handleInputMasks = function () {

                //         $("#phone").inputmask("mask", {
                //             "mask": "(999) 999-9999"
                //         });
                //         $("#mobile").inputmask("mask", {
                //             "mask": "(999) 999-9999"
                //         });
                //         $("#fax").inputmask("mask", {
                //             "mask": "(999) 999-9999"
                //         });
                //         $("#social_security_no").inputmask("999-99-9999", {
                //             placeholder: " ",
                //             clearMaskOnLostFocus: true
                //         });
                //     }
                //     return {
                //         //main function to initiate the module
                //         init: function () {
                //             handleInputMasks();
                //             //            handleIPAddressInput();
                //         }
                //     };

                // }();

                if (App.isAngularJsApp() === false) {
                    jQuery(document).ready(function () {
                        FormInputMask.init(); // init metronic core componets
                    });
                }

                $(document).ready(function () {

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

                    $('#do_not_call_submit').on('click', function (e) {
                        var valid = $('#do_not_call').valid();
                        if (valid) {
                            var notes = $('#do_not_call_notes').val();
                            var target_seq_no = $('#target_seq_no').val();
                            var user_company_id = $('#user_company_id').val();
                            var module_no=$('#module_no').val();
                            var id=$('#uid').val();

                            //alert(notes); alert(target_seq_no);alert(user_company_id);alert(module_no);alert(id)
                            //alert(target_seq_no);
                            if (notes) {

                                $.ajax({
                                    type: "POST",
                                    url: BASE_URL + 'competitor/do_not_call_again/',
                                    data: {
                                        note: notes,
                                        target_seq_no: target_seq_no,
                                        user_company_id: user_company_id,
                                        module_no: module_no,
                                        uid:id
                                       
                                    },
                                    success: function (data) {
                                        
                                             if (data == '1') {
                                             jconfirm({
                                                 title: 'Confirmation!',
                                                 content: "Deleted From The Record",
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
                        }
                    });

                    $('#do_not_call').validate({
                        rules: {
                            do_not_call_notes: {
                                required: true
                            }
                        },
                        messages: {
                            do_not_call_notes: {
                                required: "<font color=\"red\">Please enter your note!</font>"
                            }
                        }
                    });


                    $('#good_deliver_submit').on('click', function (e) {
                        var valid = $('#goods_deliver').valid();
                        if (valid) {
                            var goods_date = $('#goods_date').val();
                            var goods_notes = $('#goods_notes').val();
                            

                            if($("input[type='radio'].radioBtnClass").is(':checked')) {
                                   var deliver_type = $("input[type='radio'].radioBtnClass:checked").val();
                                    
                                  }
                            var target_seq_no = $('#target_seq_no').val();
                            var user_company_id = $('#user_company_id').val();
                            //var module_no=$('#module_no').val();
                            //alert(target_seq_no);alert(goods_date);alert(goods_notes);alert(deliver_type);
                            
                            $.ajax({
                                type: "POST",
                                url: BASE_URL + 'activity/module6_add/',
                                data: {
                                    goods_notes:goods_notes,
                                    goods_date:goods_date,
                                    deliver_type:deliver_type,
                                    target_seq_no:target_seq_no,
                                   
                                    
                                },
                                success: function (data) {
                                  
                                   if (data == '1') {
                                    jconfirm({
                                           title: 'Confirmation!',
                                           content: "data inserted successfully",
                                           buttons: {
                                             OK: function () {
                                                 window.location.href="<?php echo base_url();?>activity";
                                              }
                                           }
                                        });
                                    }
                                }
                            });


                        }
                    });

                    $('#goods_deliver').validate({
                        rules: {
                            goods_notes: {
                                required: true
                            },
                            goods_date: {
                                required: true
                            },
                            next_call_date_notes: {
                                required: true
                            }
                        },
                        messages: {
                            goods_notes: {
                                required: "<font color=\"red\">Please Enter Note!</font>"
                            },
                            goods_date: {
                                required: "<font color=\"red\">Select Date!</font>"
                            },
                            radio: {
                                required: "<font color=\"red\">Select Goods Deliver Or Return!</font>"
                            }
                        }
                    });

                    $('#presentation_done_form').validate({
                        rules: {
                            presentation_notes: {
                                required: true
                            },
                            chk_presentation: {
                                
                                required: true
                            }
                        },
                        messages: {
                            presentation_notes: {
                                required: "<font color=\"red\">Please Write a Note !</font>"
                            },
                            chk_presentation: {
                                required: "<font color=\"red\">Please select Checkbox !</font>"
                            }
                        }
                    });
                    $('#presentation_done_submit').on('click', function (e) {
                        var valid = $('#presentation_done_form').valid();
                        if (valid) {
                            var presentation_notes = $('#presentation_notes').val();
                           
                            var target_seq_no = $('#target_seq_no').val();
                            var user_company_id = $('#user_company_id').val();
                            var id=$('#uid').val();
                            var module_no=$('#module_no').val();
                            
                        
                            $.ajax({
                                type: "POST",
                                url: BASE_URL + 'Competitor/presentation_done/',
                                data: {
                                    presentation_notes:presentation_notes,
                                    target_seq_no: target_seq_no,
                                    user_company_id:user_company_id,
                                    uid:id,
                                    module_no:module_no
                                },
                                success: function (data) {
                                    
                                     if (data == '1') {
                                         jconfirm({
                                             title: 'Confirmation!',
                                             content: "Presentation Done successfully",
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
                                var contact_primary=NULL;
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
    </body>

</html> 

