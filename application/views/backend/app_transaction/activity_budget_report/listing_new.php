<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php // t($bud_details_sum_final); exit;?>
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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Activity Budget Report</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>List</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Activity Budget Report</span>
                                    </div>
                                    <!--
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div>-->

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN BORDERED TABLE PORTLET-->
                                                <div class="portlet light portlet-fit">

                                                    <div class="portlet-body">
                                                        <div style="width:30%; display:inline-block">
                                                            <table width="100%" class="table table-bordered">

                                                        <tr>
                                                            <td width="45%" style="height: 91px"><strong>Marketing Budget Codes</strong></td>
                                                            <td width="20%" style="height: 91px"></td>
                                                            <td width="35%" style=" text-align:center; height: 35px"><strong>Page Total</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <td width="45%" style="height: 27px"></td>
                                                            <td width="20%" style=" text-align:center; height: 27px"><strong>CODE</strong></td>
                                                            <td width="35%" style=" text-align:center; height: 27px"><strong>Budget</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="3" style=" padding: 0; height: 35px">
                                                                <?php
                                                                $grand_total_hour_row = '';
                                                                $grand_total_cost_row = '';
                                                                foreach ($category_type as $key12 => $value12) {
//                                                                        foreach ($bud_details_sum_final as $key11 => $value11) { 
//                                                                            if($value12['code']==$key11){
                                                                    ?>
                                                                    <table width="100%" class="table table-bordered">
                                                                        <tr>
                                                                            <td width="45%" style=" border-top: none; height: 35px"><strong><?php echo $value12['short_description'] ?></strong> </td>
                                                                            <td width="20%" style="height: 35px"></td>
                                                                            <td width="35%" style=" padding:0; text-align:center; height: 35px">
                                                                                <table width="100%" height="35px">
                                                                                    <tr>
                                                                                        <td width="50%" style=" border-right: 1px solid #e7ecf1;"><strong>Hours</strong></td>
                                                                                        <td width="50%"><strong>US $</strong></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>

                                                                        <?php
                                                                        $sum_total_hour_row = '';
                                                                        $sum_total_cost_row = '';


                                                                        foreach ($budget_code as $key22 => $value22) {
                                                                            $code_category_string = substr($value22['code'], 0, 2);
                                                                            if ($value12['code'] == $code_category_string) {
                                                                                ?>
                                                                                <tr>

                                                                                    <td width="45%" style="height: 40px"><?php echo $value22['short_description'] ?></td>
                                                                                    <td width="20%"><?php echo $value22['code'] ?></td>
                                                                                    <td width="35%" style=" padding:0; text-align:center; height: 40px">
                                                                                        <table width="100%" style="height: 40px">
                                                                                            <tr>
                                                                                                <td width="50%" style=" border-right: 1px solid #e7ecf1; height: 40px">
                                                                                                    <?php
                                                                                                    if ($bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'] == '') {
                                                                                                        echo "-";
                                                                                                    } else {
                                                                                                        echo $bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'];
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                                <td width="50%" style="height: 40px">
                                                                                                    <?php
                                                                                                    if ($bud_details_sum_final[$value12['code']][$value22['code']]['total_cost'] == '') {
                                                                                                        echo "-";
                                                                                                    } else {
                                                                                                        echo $bud_details_sum_final[$value12['code']][$value22['code']]['total_cost'];
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>

                                                                                </tr>
                                                                                <?php
                                                                                $sum_total_hour_row = $sum_total_hour_row + $bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'];
                                                                                $sum_total_cost_row = $sum_total_cost_row + $bud_details_sum_final[$value12['code']][$value22['code']]['total_cost'];
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <tr>
                                                                            <td width="45%" style=" text-align:right; height: 35px"><strong>Sub-total</strong></td>
                                                                            <td width="20%"></td>
                                                                            <td width="35%" style=" padding:0; text-align:center" height="35px;">
                                                                                <table width="100%" style=" height: 35px">
                                                                                    <tr>
                                                                                        <td width="50%" style=" height: 35px; border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800">
                                                                                            <strong><?php
                                                                                                if ($sum_total_hour_row == '') {
                                                                                                    echo "-";
                                                                                                } else {
                                                                                                    echo $sum_total_hour_row;
                                                                                                }
                                                                                                ?></strong>
                                                                                        </td>
                                                                                        <td width="50%" style=" height: 35px; background:#ddd; color:#000; font-weight:800">
                                                                                            <strong><?php
                                                                                                if ($sum_total_cost_row == '') {
                                                                                                    echo "-";
                                                                                                } else {
                                                                                                    echo $sum_total_cost_row;
                                                                                                }
                                                                                                ?></strong>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <?php
                                                                    $grand_total_hour_row = $grand_total_hour_row + $sum_total_hour_row;
                                                                    $grand_total_cost_row = $grand_total_cost_row + $sum_total_cost_row;
                                                                }
//                                                                } 
//                                                                } 
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                            
                                                             <table width="100%" class="table table-bordered">
                                                        <tr>
                                                            <td width="45%" style=" text-align:right; height: 35px"><strong>Grand Total</strong></td>
                                                            <td width="20%" style=" height: 35px"></td>
                                                            <td width="35%" style=" padding:0; text-align:center; height: 35px">
                                                                <table width="100%" height="35px">
                                                                    <tr>
                                                                        <td width="50%" style=" height: 35px; border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800">
                                                                            <strong><?php
                                                                                if ($grand_total_hour_row == '') {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $grand_total_hour_row;
                                                                                }
                                                                                ?></strong>
                                                                        </td>
                                                                        <td width="50%" style=" height: 35px; background:#ddd; color:#000; font-weight:800">
                                                                            <strong><?php
                                                                                if ($grand_total_cost_row == '') {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $grand_total_cost_row;
                                                                                }
                                                                                ?></strong>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                        </div>

                                                        <div style=" width:69%; display:inline-block;vertical-align: top;">



                                                            <div class="table-scrollable">
                                                                <table class="table table-bordered">

                                                                    <tr>

                                                                       <?php foreach($bud_details_final_array as $key_1 => $value_1) { 
                                                                                    ?>                           <!-- main loop-->

                                                                        <td style="padding:0px;">

                                                                            <table style="width: 100%">
                                                                                <tr>
                                                                                    <td style="padding: 9px"><?php echo $value_1['activity_goal'];?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                     <?php foreach ($category_type as $k => $val) {?>                                                                                           inner loop td
                                                                                    <td>
                                                                                        <table style="width: 100%">

                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <td style=" width: 100%">
                                                                                                        <table style=" width: 100%">


                                                                                                            <tr>
                                                                                                                <td style="width: 100%">
                                                                                                                    <table style="width: 100%">
                                                                                                                        <tr>
                                                                                                                            <td style=" border-top:none; padding:0px;">
                                                                                                                                <table class="table table-bordered">
                                                                                                                                    <thead>
                                                                                                                                        <tr>
                                                                                                                                            <th style="height:80px;text-align:center"><?php echo $val['activity_name'];?></th>
                                                                                                                                        </tr>

                                                                                                                                        <tr>
                                                                                                                                            <th style=" text-align:center; height: 35px">Budget</th>
                                                                                                                                        </tr>

                                                                                                                                        <tr>
                                                                                                                                            <th style=" text-align:center; height: 36px">
                                                                                                                                    <table style="width:100%">
                                                                                                                                        <thead>
                                                                                                                                            <tr>
                                                                                                                                                <th style=" width:50%; text-align:center">Hours</th>
                                                                                                                                                <th style=" width:50%; text-align:center">Dollars</th>
                                                                                                                                            </tr>
                                                                                                                                        </thead>
                                                                                                                                    </table>
                                                                                                                                    </th>
                                                                                                                        </tr>


                                                                                                                        </thead>



                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                        </table>
                                                                                    </td>


                                                                                </tr>



                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style=" width: 100%;">
                                                                                            <table class="table-bordered" style="width: 100%">

                                                                                               <?php  
                                                                                                $sum_total_hour = '';
                                                                                                $sum_total_cost = '';
                                                                                                    foreach ($budget_code as $k2 => $val2) { 
                                                                                                $code_category_string = substr($val2['code'], 0, 2);
                                                                                                if ($val['code'] == $code_category_string) {        
                                                                                                        ?>                                                                      value loop tr
                                                                                                <tr>
                                                                                                    <td style=" width:50%; padding: 8px"><?php
                                                                                                            if ($value_1[$val['code']][$val2['code']]['total_hour'] == '') {
                                                                                                                echo "-";
                                                                                                            } else {
                                                                                                                echo $value_1[$val['code']][$val2['code']]['total_hour'];
                                                                                                            }
                                                                                                            ?></td>
                                                                                                    <td style=" width:50%; padding: 8px"><?php
                                                                                                            if ($value_1[$val['code']][$val2['code']]['total_cost'] == '') {
                                                                                                                echo "-";
                                                                                                            } else {
                                                                                                                echo $value_1[$val['code']][$val2['code']]['total_cost'];
                                                                                                            }
                                                                                                            ?></td>
                                                                                                </tr>

                                                                                                <tr>
                                                                                                    <td style=" width:50%; padding: 8px">1</td>
                                                                                                    <td style=" width:50%; padding: 8px">1</td>
                                                                                                </tr>
                                                                                                
                                                                                                
                                                                                               <?php
                                                                                               
                                                                                                    $sum_total_hour = $sum_total_hour + $value_1[$val['code']][$val2['code']]['total_hour'];
                                                                                                    $sum_total_cost = $sum_total_cost + $value_1[$val['code']][$val2['code']]['total_cost'];
                                                                                                    }
                                                                                                    }
                                                                                                    ?>

                                                                                                <tr>
                                                                                                    <td style=" width:50%; padding: 8px; background: #eee"> <?php
                                                                                                                if ($sum_total_hour == '') {
                                                                                                                    echo "-";
                                                                                                                } else {
                                                                                                                    echo $sum_total_hour;
                                                                                                                }
                                                                                                                ?>
                                                                                                    </td>
                                                                                                    <td style=" width:50%; padding: 8px; background: #eee"> 
                                                                                                              <?php
                                                                                                                if ($sum_total_cost == '') {
                                                                                                                    echo "-";
                                                                                                                } else {
                                                                                                                    echo $sum_total_cost;
                                                                                                                }
                                                                                                                ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                



                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>




                                                                                </tbody>
                                                                            </table>
                                                                        </td>

                                                                        <td>
                                                                            <table style="width: 100%">

                                                                                <thead>
                                                                                    <tr>
                                                                                        <td style=" width: 100%">
                                                                                            <table style=" width: 100%">


                                                                                                <tr>
                                                                                                    <td style="width: 100%">
                                                                                                        <table style="width: 100%">
                                                                                                            <tr>
                                                                                                                <td style=" border-top:none; padding:0px;">
                                                                                                                    <table class="table table-bordered">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th style="height:80px;text-align:center">Activity 2</th>
                                                                                                                            </tr>

                                                                                                                            <tr>
                                                                                                                                <th style=" text-align:center; height: 35px">Budget</th>
                                                                                                                            </tr>

                                                                                                                            <tr>
                                                                                                                                <th style=" text-align:center; height: 36px">
                                                                                                                        <table style="width:100%">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th style=" width:50%; text-align:center">Hours</th>
                                                                                                                                    <th style=" width:50%; text-align:center">Dollars</th>
                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                        </table>
                                                                                                                        </th>
                                                                                                            </tr>


                                                                                                            </thead>



                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                            </table>
                                                                        </td>


                                                                    </tr>



                                                                    </thead>

                                                                    <tbody>
                                                                        <tr>
                                                                            <td style=" width: 100%;">
                                                                                <table class="table-bordered" style="width: 100%">

                                                                                    value loop tr
                                                                                    <tr>
                                                                                        <td style=" width:50%; padding: 8px">1</td>
                                                                                        <td style=" width:50%; padding: 8px">1</td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style=" width:50%; padding: 8px">1</td>
                                                                                        <td style=" width:50%; padding: 8px">1</td>
                                                                                    </tr>
                                                                                    value loop tr end


                                                                                    <tr>
                                                                                        <td style=" width:50%; padding: 8px; background: #eee">2</td>
                                                                                        <td style=" width:50%; padding: 8px; background: #eee">2</td>
                                                                                    </tr>



                                                                                </table>
                                                                            </td>
                                                                        </tr>




                                                                    </tbody>
                                                                </table>
                                                                </td>
                                                                                     <?php } ?>
                                                                inner loop td
                                                                </tr>



                                                                </table>

                                                                </td>
                                                                <?php 
                                                                       }
                                                                       ?>

                                                                <td style="padding:0px;">

                                                                    <table style="width: 100%">
                                                                        <tr>
                                                                            <td style="padding: 9px">Goal 2</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <!--inner loop td-->
                                                                            <td>
                                                                                <table style="width: 100%">

                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td style=" width: 100%">
                                                                                                <table style=" width: 100%">


                                                                                                    <tr>
                                                                                                        <td style="width: 100%">
                                                                                                            <table style="width: 100%">
                                                                                                                <tr>
                                                                                                                    <td style=" border-top:none; padding:0px;">
                                                                                                                        <table class="table table-bordered">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th style="height:80px;text-align:center">Activity 1</th>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <th style=" text-align:center; height: 35px">Budget</th>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <th style=" text-align:center; height: 36px">
                                                                                                                            <table style="width:100%">
                                                                                                                                <thead>
                                                                                                                                    <tr>
                                                                                                                                        <th style=" width:50%; text-align:center">Hours</th>
                                                                                                                                        <th style=" width:50%; text-align:center">Dollars</th>
                                                                                                                                    </tr>
                                                                                                                                </thead>
                                                                                                                            </table>
                                                                                                                            </th>
                                                                                                                </tr>


                                                                                                                </thead>



                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                </table>
                                                                            </td>


                                                                        </tr>



                                                                        </thead>

                                                                        <tbody>
                                                                            <tr>
                                                                                <td style=" width: 100%;">
                                                                                    <table class="table-bordered" style="width: 100%">

                                                                                        <!--value loop tr-->
                                                                                        <tr>
                                                                                            <td style=" width:50%; padding: 8px">3</td>
                                                                                            <td style=" width:50%; padding: 8px">3</td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td style=" width:50%; padding: 8px">3</td>
                                                                                            <td style=" width:50%; padding: 8px">3</td>
                                                                                        </tr>
                                                                                        <!--value loop tr end-->


                                                                                        <tr>
                                                                                            <td style=" width:50%; padding: 8px; background: #eee">4</td>
                                                                                            <td style=" width:50%; padding: 8px; background: #eee">4</td>
                                                                                        </tr>



                                                                                    </table>
                                                                                </td>
                                                                            </tr>




                                                                        </tbody>
                                                                    </table>
                                                                </td>

                                                                <td>
                                                                    <table style="width: 100%">

                                                                        <thead>
                                                                            <tr>
                                                                                <td style=" width: 100%">
                                                                                    <table style=" width: 100%">


                                                                                        <tr>
                                                                                            <td style="width: 100%">
                                                                                                <table style="width: 100%">
                                                                                                    <tr>
                                                                                                        <td style=" border-top:none; padding:0px;">
                                                                                                            <table class="table table-bordered">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th style="height:80px;text-align:center">Activity 2</th>
                                                                                                                    </tr>

                                                                                                                    <tr>
                                                                                                                        <th style=" text-align:center; height: 35px">Budget</th>
                                                                                                                    </tr>

                                                                                                                    <tr>
                                                                                                                        <th style=" text-align:center; height: 36px">
                                                                                                                <table style="width:100%">
                                                                                                                    <thead>
                                                                                                                        <tr>
                                                                                                                            <th style=" width:50%; text-align:center">Hours</th>
                                                                                                                            <th style=" width:50%; text-align:center">Dollars</th>
                                                                                                                        </tr>
                                                                                                                    </thead>
                                                                                                                </table>
                                                                                                                </th>
                                                                                                    </tr>


                                                                                                    </thead>



                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                    </table>
                                                                </td>


                                                                </tr>



                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td style=" width: 100%;">
                                                                            <table class="table-bordered" style="width: 100%">

                                                                                <!--value loop tr-->
                                                                                <tr>
                                                                                    <td style=" width:50%; padding: 8px">3</td>
                                                                                    <td style=" width:50%; padding: 8px">3</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style=" width:50%; padding: 8px">3</td>
                                                                                    <td style=" width:50%; padding: 8px">3</td>
                                                                                </tr>


                                                                                <!--value loop tr end-->


                                                                                <tr>
                                                                                    <td style=" width:50%; padding: 8px; background: #eee">4</td>
                                                                                    <td style=" width:50%; padding: 8px; background: #eee">4</td>
                                                                                </tr>



                                                                            </table>
                                                                        </td>
                                                                    </tr>




                                                                </tbody>
                                                                </table>
                                                                </td>

                                                                <!--inner loop td-->
                                                                </tr>



                                                                </table>

                                                                </td>
                                                                       
                                                                <!-- main loop end-->     
                                                                </tr>



                                                                </table>
                                                            </div>



                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END BORDERED TABLE PORTLET-->
                                            </div>
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
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
</body>
<style>

    .top_table_sec{ margin: 0; border: none !important; width: 100%; display: inline-block;}

    .portlet.light.portlet-fit > .portlet-body {
        padding: 10px 0px 0px;
    }
    .table-scrollable {
        border: none;
        margin:0 !important ;
        overflow-x: auto;
        overflow-y: hidden;
        width: 100%;
    }
    .table {
        width: 100%;
        margin-bottom: 0;
    }

    .subtotal{text-align:center; width:100%; height:30px; background:#eee; display:inline-block;}

    .table_sec{ margin-bottom: 19px; width: 150px; display:block; }

    .table_header{ margin: 0; width: 100%; height: 91px; display: inline-block;text-align: center; border: 1px solid #e7ecf1;}
    .table_budget{ margin: 0; width: 100%; display: inline-block; font-size: 12px; height: 29px;line-height: 29px; text-align: center; border-left: 1px solid #e7ecf1; border-right: 1px solid #e7ecf1; border-bottom: 1px solid #e7ecf1;border-top:none;}

    .table_hours{ margin: 0; width: 100%; display: inline-block; height: 39px; text-align: center; border-left: 1px solid #e7ecf1; border-right: 1px solid #e7ecf1; border-bottom: 1px solid #e7ecf1;border-top:1px solid #e7ecf1;}
    .table_hours .col-md-6{ padding-left: 0; padding-right: 0; line-height: 39px; height: 39px; text-align: center}

    .table_content{ margin-top: -6px; width: 100%; display: inline-block; border-left: 1px solid #e7ecf1; border-right: 1px solid #e7ecf1; border-bottom: 1px solid #e7ecf1; border-top:1px solid #e7ecf1;}
    .table_content .row{ margin-left: 0; margin-right: 0; height: 40px; border-bottom: 1px solid #e7ecf1;}
    .table_content .col-md-6{ padding-left: 0; height: 40px; line-height: 40px; padding-right: 0; text-align: center;}

    .table_subtotal{ margin-top: -6px; height: 38px; width: 100%; display: inline-block; border-left: 1px solid #e7ecf1; border-right: 1px solid #e7ecf1; border-bottom: 1px solid #e7ecf1; border-top:1px solid #e7ecf1;}
    .table_subtotal .row{ margin-left: 0; margin-right: 0; height: 38px; border-bottom: 1px solid #e7ecf1;}
    .table_subtotal .col-md-6{ padding-left: 0; height: 38px; padding-right: 0; text-align: center; background: #ddd}




    .div_left{ margin:0; width:100%; padding-top: 8px; display:inline-block;}
    .div_left .table {
        width: 100%;
        margin-bottom: 20px;
    }

    .div_right{ margin:0; width:600px; padding-top:0px; display:inline-block; overflow-x:scroll; overflow-y:hidden;}

    .div_right .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
        border: 1px solid #e7ecf1;
        line-height: 13px;
    }

    .div_left .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
        border: 1px solid #e7ecf1;
        line-height: 11px;
    }

    /*    label.error {
            display: none !important;
        }*/
    .customErrorClass {
        border: 1px solid red !important;
        /*color: red;*/
        background-color: #ffcccc;
    }

    input[type=text].error,input[type=file].error, input[type=email].error, input[type=password].error, textarea.error, select.error,input[type=checkbox].error {
        border: 1px solid red !important;
    }

    .dropdown-menu {
        box-shadow: 5px 5px rgba(102,102,102,.1);
        left: -109px;
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
    }

    .btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {
        position: absolute;
        top: -7px;
        right: 10px !important;
        left: auto;
        display: inline-block !important;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #fff;
        border-left: 7px solid transparent;
        content: '';
    }

    .btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {
        position: absolute;
        top: -8px;
        right: 7px;
        left:auto;
        display: inline-block !important;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #e0e0e0;
        border-left: 8px solid transparent;
        content: '';
    }
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        border-top: none;
    }
</style>
<!--<script src="<?php echo $assets_path; ?>custom/js/validate/app_codes_add.js" type="text/javascript"></script>-->

<script type="text/javascript">

    $('document').ready(function () {

    $('#meals').on('click', function () {
    var div = "<div class=\"row\"><div class=\"col-md-12\">\<div class=\"col-md-6\">\
                                        <div class=\"row\">\
                                            <div class=\"col-md-12\">\
                                                <p style=\"font-size:12px;\">\
                                                    <select>\
                                                        <option>Food and Beverage</option>\
                                                        <option>Admission fees, tickets and venue fees</option>\
                                                        <option>Room rental - receptions and cocktail parties</option>\
                                                        <option>Gifts and take aways</option>\
                                                        <option>Labor and Support</option>\
                                                    </select>\
                                                </p>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p style=\"font-size:12px;\">\
                                            <select>\
                                                <option>ME 1</option>\
                                                <option>ME 2</option>\
                                                <option>ME 3</option>\
                                                <option>ME 4</option>\
                                                <option>ME 5</option>\
                                            </select>\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                </div></div>";
//                                                alert (div);
            $('.meals_div').append(div);
    });
            $('#travel').on('click', function () {
    var div = "<div class=\"row\"><div class=\"col-md-12\">\
                                    <div class=\"col-md-6\">\
                                        <div class=\"row\">\
                                            <div class=\"col-md-12\">\
                                                <p style=\"font-size:12px;\">\
                                                    <select>\
                                                        <option>Transportation</option>\
                                                        <option>Lodging</option>\
                                                        <option>Mileage</option>\
                                                        <option>Car rental</option>\
                                                        <option>Taxis and Uber</option>\
                                                        <option>Client transportation (limo's, buses, vans etc.)</option>\
                                                    </select>\
                                                </p>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p style=\"font-size:12px;\">\
                                            <select>\
                                                <option>T 1</option>\
                                                <option> T 2</option>\
                                                <option>T 3</option>\
                                                <option>T 4</option>\
                                                <option>T 5</option>\
                                                <option>T 6</option>\
                                            </select>\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                    <div class=\"col-md-2\">\
                                        <p>\
                                            <input type=\"text\" class=\"col-md-12 form-control\">\
                                        </p>\
                                    </div>\
                                </div> </div>";
//                                                alert (div);
            $('.travel_div').append(div);
    });
    });
</script>
</html>  
