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

                    <?php
                    $smsg = $this->session->flashdata('server_message');
                    if (isset($smsg) && $smsg != '') {
                        ?>
                        <div class="alert alert-success" id="general_msg_success" style=" width:50%; margin: 10px auto; text-align: center;">
                            <strong></strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                        </div>
                    <?php } ?>

                    <?php
                    $msg = $this->session->flashdata('err_message');
                    if (isset($msg) && $msg != '') {
                        ?>
                        <div class="alert alert-success" id="general_msg_success" style=" width:50%; margin: 10px auto; text-align: center;">
                            <strong></strong> <span id="general_msg"> <?php echo $msg; ?></span> 
                        </div>
<?php } ?>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="portlet light ">  


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
                                                <div style="width: 20%; display: inline-block"><label>Module</label></div>
                                                <div style="width:78%; display: inline-block">
                                                    <div class="form-group">
                                                        <select  name="module" id="module" class="form-control" >
                                                            <option value="module1" <?php if($module_name =='module1'){ ?> selected=""<?php }?> ><?php echo $all_module_name['module1']; ?></option>
                                                            <option value="module2" <?php if($module_name =='module2'){ ?> selected=""<?php }?>><?php echo $all_module_name['module2']; ?></option>
                                                            <option value="module3" <?php if($module_name =='module3'){ ?> selected=""<?php }?>><?php echo $all_module_name['module3']; ?></option>
                                                            <option value="module4" <?php if($module_name =='module4'){ ?> selected=""<?php }?>><?php echo $all_module_name['module4']; ?></option>
                                                            <option value="module5" <?php if($module_name =='module5'){ ?> selected=""<?php }?>><?php echo $all_module_name['module5']; ?></option>
                                                            <option value="module6" <?php if($module_name =='module6'){ ?> selected=""<?php }?>><?php echo $all_module_name['module6']; ?></option>
                                                            <option value="module7" <?php if($module_name =='module7'){ ?> selected=""<?php }?>><?php echo $all_module_name['module7']; ?></option>
                                                            <option value="module8" <?php if($module_name =='module8'){ ?> selected=""<?php }?>><?php echo $all_module_name['module8']; ?></option>
                                                            <option value="module9" <?php if($module_name =='module9'){ ?> selected=""<?php }?>><?php echo $all_module_name['module9']; ?></option>
                                                            <option value="module10" <?php if($module_name =='module10'){ ?> selected=""<?php }?>><?php echo $all_module_name['module10']; ?></option>
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
    <?php echo $weekly_area; //echo $month_date['first_month'] . ' ' . $month_date['first_day'] . ' to ' . $month_date['second_month'] . ' ' . $month_date['second_day'];   ?> 
                                                            </button>
                                                        </div>
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
            $(document).ready(function() {
                //for stop loader after complete page load
                $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
                });
                //end

                $('.year').change(function() {
//                        $('#dashboard_search').click();
                    var year = $('#year').val();
                    window.location.href = BASE_URL + 'dashboard/index/' + year;
                });

                $('#dashboard_search').on('click', function() {
                    var year = $('#year').val();
                    var week = $('#week').val();
                    var module = $('#module').val();
                    window.location.href = BASE_URL + 'module_weeks_report/total_activities/' + year + '/' + week + '/' + module;
                });
            });

        </script>

    </body>

</html>  