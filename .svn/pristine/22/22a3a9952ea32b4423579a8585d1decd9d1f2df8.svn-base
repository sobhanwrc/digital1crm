<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    


    <?php echo $dashboard_header_link; ?>
    <!-- END HEAD -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo $assets_path; ?>custom/js/jquery.js" type="text/javascript"></script>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" style="position: relative">

        <div id="loader_image" style=" width: 100%; height: 800px; position: absolute; top: 0; left: 0; padding-top: 15%; text-align: center; overflow-y: hidden !important; overflow-x: hidden !important; background: #fff; z-index: 99999999999">
            <img style="width: 100px; height:100px" src="<?php echo $assets_path; ?>pages/img/Loading_icon.gif" alt="" class="" />

        </div>
       
       
        <!-- BEGIN HEADER -->
        <?php echo $header; ?>      
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container animated fadeIn">
            <!-- BEGIN SIDEBAR -->
            <?php echo $left_sidebar; ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content"  style=" min-height:490px !important">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->

                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <?php echo $breadcrumb; ?>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->

                    <?php $smsg = $this->session->flashdata('server_message');
                    if (isset($smsg) && $smsg != '') {
                        ?>
                        <div class="alert alert-success" id="general_msg_success" style=" width:50%; margin: 10px auto; text-align: center;">
                            <strong></strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                        </div>
                    <?php } ?>

                    <?php $msg = $this->session->flashdata('err_message');
                    if (isset($msg) && $msg != '') {
                        ?>
                        <div class="alert alert-success" id="general_msg_success" style=" width:50%; margin: 10px auto; text-align: center;">
                            <strong></strong> <span id="general_msg"> <?php echo $msg; ?></span> 
                        </div>
                    <?php } ?>


                    <!--                    <h3 class="page-title">
<?php //echo ucwords(strtolower($role_short_description));  ?> Dashboard
                                            
                                        </h3>-->

                     <div class="row">
                      <div class="col-md-12">

                   <div class="portlet light ">  
                                     
                    <div style=" margin-top: 0%">
                        <h4 class="page-title">   
                            <span class="caption-subject bold uppercase" style="width:100%; margin-top:5px; margin-bottom:5px;  text-align: center; display:block;">
                                digital1crm
                            </span>     
                        </h4> 
                    </div>
                    <div> 
                        <h4 class="page-title"> 
                            <p style="width:100%;  text-align: center; display:block;">Welcome, <?php echo $fname . ' ' . $lname; ?></p>
                        </h4>
                    </div>

                    <?php if ($role_code == 'FIRMADM') { ?>  
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div style="width: 20%; display: inline-block"><label>Year</label></div>
                                    <div style="width:78%; display: inline-block">
                                        <div class="form-group">
                                            <select id="year" class="year form-control">
                                                <option>Select Year</option>
                                                <?php for ($i = date('Y') - 1; $i <= 2025; $i++) { ?>
                                                    <option value="<?php echo $i; ?>" <?php if ($year == $i) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="width: 20%; display: inline-block"><label>Week</label></div>
                                    <div style="width:78%; display: inline-block">
                                        <div class="form-group">
                                            <select  name="week" id="week" class="form-control" >
                                                <option>Select Week</option>
                                                <?php foreach ($day_month_array as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $key; ?>" <?php if ($week == $key) { ?> selected="selected" <?php } ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">

                                    <div style="width:100%">
                                        <button style="margin-right: 5px; padding-right: 10px; margin-bottom: 15px;" type="button" class="btn green btn-primary" id="dashboard_search">Submit</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="weekly_area">

                                    <div class="col-md-2">
                                        <div class="weekly_drowpdown">
                                            <div class="dropdown">
                                                <button class="btn btn-primary weekly_area_val" type="button">
    <?php echo $weekly_area; //echo $month_date['first_month'] . ' ' . $month_date['first_day'] . ' to ' . $month_date['second_month'] . ' ' . $month_date['second_day'];  ?> 
                                                </button>
                                            </div>
                                        </div>

                                        <div class="weekly_drowpdown_ul">
                                            <ul class="list-unstyled">
                                                <li title="<?php echo $all_module_name['module1']; ?>"><?php echo $all_module_name['module1']; ?></li>
                                                <li title="<?php echo $all_module_name['module2']; ?>"><?php echo $all_module_name['module2']; ?></li>
                                                <li title="<?php echo $all_module_name['module3']; ?>"><?php echo $all_module_name['module3']; ?></li>
                                                <li title="<?php echo $all_module_name['module4']; ?>"><?php echo $all_module_name['module4']; ?></li>
                                                <li title="<?php echo $all_module_name['module5']; ?>"><?php echo $all_module_name['module5']; ?></li>
                                                <li title="<?php echo $all_module_name['module6']; ?>"><?php echo $all_module_name['module6']; ?></li>                                                        
                                                <li title="<?php echo $all_module_name['module7']; ?>"><?php echo $all_module_name['module7']; ?></li>                                                       
                                                <li title="<?php echo $all_module_name['module8']; ?>"><?php echo $all_module_name['module8']; ?></li>
                                                <li title="<?php echo $all_module_name['module9']; ?>"><?php echo $all_module_name['module9']; ?></li>
                                                <li title="<?php echo $all_module_name['module10']; ?>"><?php echo $all_module_name['module10']; ?></li>
                                            </ul>

                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead style="background-color:#428bca;">
                                                    <tr>
                                                        <!--<th style=" text-align:center; color:#fff; border-bottom:1px;">Weekly<br> Goal</th>-->
                                                        <th style=" text-align:center; color:#fff; font-weight:400">Monday<br><?php echo $week_date_array[0]; ?></th>
                                                        <th style=" text-align:center; color:#fff; font-weight:400">Tuesday<br><?php echo $week_date_array[1]; ?></th>
                                                        <th style=" text-align:center; color:#fff; font-weight:400">Wednesday<br><?php echo $week_date_array[2]; ?></th>
                                                        <th style=" text-align:center; color:#fff; font-weight:400">Thursday<br><?php echo $week_date_array[3]; ?></th>
                                                        <th style=" text-align:center; color:#fff; font-weight:400">Friday<br><?php echo $week_date_array[4]; ?></th>
                                                        <th style=" text-align:center; color:#fff; font-weight:400">Saturday<br><?php echo $week_date_array[5]; ?></th>
                                                        <th style=" text-align:center; color:#fff; font-weight:400">Sunday<br><?php echo $week_date_array[6]; ?></th>
    <!--                                                                <th style=" text-align:center; color:#fff;">Weekly <br> <strong>Actual</strong></th>
                                                        <th style=" text-align:center; color:#fff;">Weekly <br> <strong>Goal</strong></th>
                                                        <th style=" text-align:center; color:#fff;">% of <br> Goal Met</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['date_lead_generated']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module1[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module1[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module1[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module1[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module1[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module1[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module1[6]; ?></td>
    <!--                                                                <td style=" text-align:center"
                                                        <?php if ($total_date_lead_generated_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_date_lead_generated_percentage > 49 && $total_date_lead_generated_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_date_lead_generated_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_date_lead_generated; ?></td>-->
    <!--                                                                <td style=" text-align:center" 
                                                        <?php if ($total_date_lead_generated_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_date_lead_generated_percentage > 49 && $total_date_lead_generated_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_date_lead_generated_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['date_lead_generated']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_date_lead_generated_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_date_lead_generated_percentage > 49 && $total_date_lead_generated_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_date_lead_generated_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_date_lead_generated_percentage; ?>%</td>-->
                                                    </tr>

                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['date_email_campaign_sent']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module2[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module2[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module2[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module2[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module2[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module2[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module2[6]; ?></td>
    <!--                                                                <td style=" text-align:center" 
                                                        <?php if ($total_date_email_campaign_sent_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_date_email_campaign_sent_percentage > 49 && $total_date_email_campaign_sent_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_date_email_campaign_sent_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_date_email_campaign_sent; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_date_email_campaign_sent_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_date_email_campaign_sent_percentage > 49 && $total_date_email_campaign_sent_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_date_email_campaign_sent_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['date_email_campaign_sent']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_date_email_campaign_sent_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_date_email_campaign_sent_percentage > 49 && $total_date_email_campaign_sent_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_date_email_campaign_sent_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_date_email_campaign_sent_percentage; ?>%</td>-->
                                                    </tr>

                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['contact_date_1']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module3[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module3[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module3[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module3[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module3[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module3[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module3[6]; ?></td>
    <!--                                                                <td style=" text-align:center" 
                                                        <?php if ($total_contact_date_1_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_contact_date_1_percentage > 49 && $total_contact_date_1_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_contact_date_1_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_contact_date_1; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_contact_date_1_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_contact_date_1_percentage > 49 && $total_contact_date_1_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_contact_date_1_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['contact_date_1']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_contact_date_1_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_contact_date_1_percentage > 49 && $total_contact_date_1_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_contact_date_1_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_contact_date_1_percentage; ?>%</td>-->
                                                    </tr>

                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['connected_date']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module4[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module4[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module4[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module4[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module4[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module4[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module4[6]; ?></td>
    <!--                                                                <td style=" text-align:center" 
                                                        <?php if ($total_connected_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_connected_date_percentage > 49 && $total_connected_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_connected_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_connected_date; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_connected_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_connected_date_percentage > 49 && $total_connected_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_connected_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['connected_date']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_connected_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_connected_date_percentage > 49 && $total_connected_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_connected_date_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_connected_date_percentage; ?>%</td>-->
                                                    </tr>



                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['financial_profile_sheet_completed']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module5[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module5[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module5[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module5[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module5[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module5[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module5[6]; ?></td>
    <!--                                                                <td style=" text-align:center" 
                                                        <?php if ($total_financial_profile_sheet_completed_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_financial_profile_sheet_completed_percentage > 49 && $total_financial_profile_sheet_completed_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_financial_profile_sheet_completed_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_financial_profile_sheet_completed; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_financial_profile_sheet_completed_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_financial_profile_sheet_completed_percentage > 49 && $total_financial_profile_sheet_completed_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_financial_profile_sheet_completed_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['financial_profile_sheet_completed']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_financial_profile_sheet_completed_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_financial_profile_sheet_completed_percentage > 49 && $total_financial_profile_sheet_completed_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_financial_profile_sheet_completed_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_financial_profile_sheet_completed_percentage; ?>%</td>-->
                                                    </tr>


                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['gsi_scheduled_date']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module6[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module6[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module6[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module6[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module6[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module6[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module6[6]; ?></td>
    <!--                                                                <td style=" text-align:center" 
                                                        <?php if ($total_gsi_scheduled_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_gsi_scheduled_date_percentage > 49 && $total_gsi_scheduled_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_gsi_scheduled_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_gsi_scheduled_date; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_gsi_scheduled_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_gsi_scheduled_date_percentage > 49 && $total_gsi_scheduled_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_gsi_scheduled_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['gsi_scheduled_date']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_gsi_scheduled_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_gsi_scheduled_date_percentage > 49 && $total_gsi_scheduled_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_gsi_scheduled_date_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_gsi_scheduled_date_percentage; ?>%</td>-->
                                                    </tr>




                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['getting_started_interview_date']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module7[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module7[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module7[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module7[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module7[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module7[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module7[6]; ?></td>
    <!--                                                                <td style=" text-align:center"
                                                        <?php if ($total_getting_started_interview_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_getting_started_interview_date_percentage > 49 && $total_getting_started_interview_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_getting_started_interview_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_getting_started_interview_date; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_getting_started_interview_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_getting_started_interview_date_percentage > 49 && $total_getting_started_interview_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_getting_started_interview_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['getting_started_interview_date']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_getting_started_interview_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_getting_started_interview_date_percentage > 49 && $total_getting_started_interview_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_getting_started_interview_date_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_getting_started_interview_date_percentage; ?>%</td>-->
                                                    </tr>



                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['recruited_date']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module8[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module8[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module8[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module8[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module8[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module8[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module8[6]; ?></td>
    <!--                                                                <td style=" text-align:center" 
                                                        <?php if ($total_recruited_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_recruited_date_percentage > 49 && $total_recruited_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_recruited_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_recruited_date; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_recruited_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_recruited_date_percentage > 49 && $total_recruited_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_recruited_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['recruited_date']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_recruited_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_recruited_date_percentage > 49 && $total_recruited_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_recruited_date_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_recruited_date_percentage; ?>%</td>-->
                                                    </tr>

                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['product_purchase_date']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module9[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module9[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module9[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module9[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module9[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module9[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module9[6]; ?></td>
    <!--                                                                <td style=" text-align:center"
                                                        <?php if ($total_product_purches_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_product_purches_date_percentage > 49 && $total_product_purches_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_product_purches_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_product_purches_date; ?></td>
                                                        <td style=" text-align:center"
                                                        <?php if ($total_product_purches_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_product_purches_date_percentage > 49 && $total_product_purches_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_product_purches_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['product_purchase_date']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_product_purches_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_product_purches_date_percentage > 49 && $total_product_purches_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_product_purches_date_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_product_purches_date_percentage; ?>%</td>-->
                                                    </tr>

                                                    <tr>
                                                        <!--<td style=" text-align:center"><?php echo $fetch_weekly_goal_details['product_purchase_date']; ?></td>-->
                                                        <td style=" text-align:center"><?php echo $weekly_date_module10[0]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module10[1]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module10[2]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module10[3]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module10[4]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module10[5]; ?></td>
                                                        <td style=" text-align:center"><?php echo $weekly_date_module10[6]; ?></td>
    <!--                                                                <td style=" text-align:center"
                                                        <?php if ($total_product_purches_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_product_purches_date_percentage > 49 && $total_product_purches_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_product_purches_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $total_product_purches_date; ?></td>
                                                        <td style=" text-align:center"
                                                        <?php if ($total_product_purches_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_product_purches_date_percentage > 49 && $total_product_purches_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_product_purches_date_percentage >= 90) { ?>
                                                                    class="green"
                                                        <?php } ?>
                                                            ><?php echo $fetch_weekly_goal_details['product_purchase_date']; ?></td>
                                                        <td style=" text-align:center" 
                                                        <?php if ($total_product_purches_date_percentage < 50) { ?>
                                                                    class="red"
                                                        <?php } elseif ($total_product_purches_date_percentage > 49 && $total_product_purches_date_percentage < 90) { ?>
                                                                    class="yellow"
                                                        <?php } elseif ($total_product_purches_date_percentage >= 90) { ?>
                                                                    class="green"
    <?php } ?>
                                                            ><?php echo $total_product_purches_date_percentage; ?>%</td>-->
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                       
                        </div> 
                        </div>
                        </div>   
<?php } ?>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <?php echo $footer_link; ?>
        <!-- END FOOTER -->
<?php echo $dashboard_footer_link; ?>
        <!--<script src="<?php echo $assets_path; ?>custom/js/validate/common.js" type="text/javascript"></script>-->

        <style>
            .page-header-fixed .page-container {
                margin-top: 0 !important;
            }

            .weekly_drowpdown_ul {
                display: inline-block;
                margin: 0;
                padding-top: 25px;
                width: 100%;
            }
            .page-content-white .page-title {
                margin: 0px;
                font-size: 25px;
            }
            .weekly_drowpdown_ul li {
                height: 34px;
                line-height: 14px;
                margin: 0;
                overflow: hidden;
                width: 100%;
            }
            .page-container {
                margin: 0px;
                padding: 0px;
                position: relative;
                overflow: hidden;
            }

            .page-title p {
                margin: 9px 0px 35px 0;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function () {
                //for stop loader after complete page load
                $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
                });
                //end
                
                $('.year').change(function () {
//                        $('#dashboard_search').click();
                    var year = $('#year').val();
                    window.location.href = BASE_URL + 'dashboard/index/' + year;
                });

                $('#dashboard_search').on('click', function () {
                    var year = $('#year').val();
                    var week = $('#week').val();
                    window.location.href = BASE_URL + 'dashboard/index/' + year + '/' + week;
                });
            });

        </script>

    </body>

</html>  