<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php // t($bud_details_sum_final); exit;?>
    <?php echo $header_link; ?>
    <!-- END HEAD -->
    
    
    <style>
    .floatingHeader {
      position: fixed;
      top: 46px;
      visibility: hidden;
    }
	
		.persist-header{ width: 100%; background:#fff; border-top: 1px solid #e7ecf1; border-bottom: 1px solid #e7ecf1}
	</style>
   
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    
    <script>
    function UpdateTableHeaders() {
       $(".persist-area").each(function() {
       
           var el             = $(this),
               offset         = el.offset(),
               scrollTop      = $(window).scrollTop(),
               floatingHeader = $(".floatingHeader", this)
           
           if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
               floatingHeader.css({
                "visibility": "visible"
               });
           } else {
               floatingHeader.css({
                "visibility": "hidden"
               });      
           };
       });
    }
    
    // DOM Ready      
    $(function() {
    
       var clonedHeaderRow;
    
       $(".persist-area").each(function() {
           clonedHeaderRow = $(".persist-header", this);
           clonedHeaderRow
             .before(clonedHeaderRow.clone())
             .css("width", clonedHeaderRow.width())
             .addClass("floatingHeader");
             
       });
       
       $(window)
        .scroll(UpdateTableHeaders)
        .trigger("scroll");
       
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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo base_url()?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                <a href="#">Activity Budget Report</a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Activity Budget Report</span>
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
                                            <div class="col-md-4" style=" padding-left:0;">
                                                <div class="div_left"> 
                                                    <table width="100%" class="table table-bordered persist-area">
                                                      <!--Marketing Budget Codes--> 
                                                       <thead class="persist-header">
                                                       	<tr>
                                                            <td style="height: 91px; width: 200px; vertical-align: middle"><strong>Marketing Budget Summary</strong></td>
                                                            <td style="height: 91px; height: 50px"></td>
                                                            <td style=" height: 150px; text-align:center; height: 35px; vertical-align: middle"><strong>Page Total</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <td width="45%" style="height: 35px"></td>
                                                            <td width="20%" style=" text-align:center; height: 35px; vertical-align: middle"><strong>CODE</strong></td>
                                                            <td width="35%" style=" text-align:center; height: 35px; vertical-align: middle"><strong>Budget</strong></td>
                                                        </tr>
                                                       	
                                                       </thead>
                                                        
                                                        <tbody>
                                                        	<tr>
                                                            <td colspan="3" style=" padding: 0;">
                                                                <?php
                                                                $grand_total_hour_row = '';
                                                                $grand_total_cost_row = '';
                                                                foreach ($category_type as $key12 => $value12) {
//                                                                        foreach ($bud_details_sum_final as $key11 => $value11) { 
//                                                                            if($value12['code']==$key11){
                                                                    ?>
                                                                    <table width="100%" class="table table-bordered">
                                                                        <tr>
                                                                            <td width="45%" style=" border-top: none; height: 40px; vertical-align: middle; text-align: center; " title="<?php echo $value12['short_description']; ?>"><strong><?php echo substr($value12['short_description'], 0, 30). '...'; ?></strong> </td>
                                                                            <td width="20%" style="height: 40px"></td>
                                                                            <td width="35%" style=" padding:0; text-align:center; height: 40px">
                                                                                <table width="100%" height="40px">
                                                                                    <tr>
                                                                                        <td width="50%" style=" border-right: 1px solid #e7ecf1; vertical-align: middle; text-align: center;"><strong>Hours</strong></td>
                                                                                        <td width="50%" style="vertical-align: middle; text-align: center;"><strong>US $</strong></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>

                                                                        <?php
                                                                        $sum_total_hour_row = '';
                                                                        $sum_total_cost_row = '';

                                                                        $i = 0;
                                                                        foreach ($budget_code as $key22 => $value22) {
                                                                            $code_category_string = substr($value22['code'], 0, 2);
                                                                            if ($value12['code'] == $code_category_string) {
                                                                                ?>
                                                                                <tr>

                                                                                    <td width="45%" style="height: 40px; vertical-align: middle;" title="<?php echo $value22['short_description']; ?>"><?php echo substr($value22['short_description'], 0, 30) . '...'?></td>
                                                                                    <td width="20%" style="vertical-align: middle; text-align: center;"><?php echo $value22['code'] ?></td>
                                                                                    <td width="35%" style=" padding:0; text-align:center; height: 40px">
                                                                                        <table width="100%" style="height: 40px">
                                                                                            <tr>
                                                                                                <td width="50%" style=" border-right: 1px solid #e7ecf1; height: 40px; vertical-align: middle; text-align: center;">
                                                                                                   
                                                                                                        <?php
                                                                                                    if ($bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'] == '') {
                                                                                                        echo "-";
                                                                                                    } else {
                                                                                                        echo $bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'];
                                                                                                    }
                                                                                                    ?>
                                                                                                     
                                                                                                </td>
                                                                                                <td width="50%" style="height: 40px; vertical-align: middle; text-align: center;">
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
                                                                            <td width="45%" style=" text-align:right; height: 35px; vertical-align: middle; text-align: center;"><strong>Sub-total</strong></td>
                                                                            <td width="20%"></td>
                                                                            <td width="35%" style=" padding:0; text-align:center" height="35px;">
                                                                                <table width="100%" style=" height: 35px">
                                                                                    <tr>
                                                                                        <td width="50%" style=" height: 35px; border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800; vertical-align: middle; text-align: center;">
                                                                                            <strong><?php
                                                                                                if ($sum_total_hour_row == '') {
                                                                                                    echo "-";
                                                                                                } else {
                                                                                                    echo $sum_total_hour_row;
                                                                                                }
                                                                                                ?></strong>
                                                                                        </td>
                                                                                        <td width="50%" style=" height: 35px; background:#ddd; color:#000; font-weight:800; vertical-align: middle; text-align: center;">
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
                                                        
                                                        <tr>
                                                            <td width="45%" style=" text-align:right; height: 35px; vertical-align: middle; text-align: center;"><strong>Grand Total</strong></td>
                                                            <td width="20%" style=" height: 35px"></td>
                                                            <td width="35%" style=" padding:0; text-align:center; height: 35px">
                                                                <table width="100%" height="35px">
                                                                    <tr>
                                                                        <td width="50%" style=" height: 35px; border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800; vertical-align: middle; text-align: center;">
                                                                            <strong><?php
                                                                                if ($grand_total_hour_row == '') {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo $grand_total_hour_row;
                                                                                }
                                                                                ?></strong>
                                                                        </td>
                                                                        <td width="50%" style=" height: 35px; background:#ddd; color:#000; font-weight:800; vertical-align: middle; text-align: center;">
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
                                                        </tbody>
                                                         
                                                        

                                                        
                                                    </table>

                                                </div>
                                            </div>

                                            <div class="col-md-8"> 


                                                <div class="div_right">


                                                    <div class="table-scrollable">

                                                        <table>
                                                           
                                                            <tr>
                                                                <?php  
//                                                                foreach ($bud_details_final_array as $key_final => $value_final) { 
//                                                                    
//                                                                    $bud_details_final=$value_final;
                                                                    ?>
                                                                <td>  
                                                                    <?php // echo $key_final; ?>
                                                                    <table class="table">
                                                                       
                                                                       
                                                                        <tr>   
                                                                            <?php
// t($budget_pg_total); exit;
                                                                            foreach ($bud_details_final as $key => $value) {
//                                                        t($value); exit;
                                                                                ?>
                                                                                <td width="150px">


                                                                                    <table width="100%" class="table table-bordered persist-area">
                                                                                       <thead class="persist-header">
                                                                                       	
                                                                                       	<tr>
                                                                                            <td height="91px" style=" width: 200px; text-align:center; vertical-align: middle">
                                                                                                <a href="<?php echo $base_url . 'activity-budget-report/activity-budget-split-up'; ?>/<?php echo base64_encode($value['activity_goal']); ?>" ><strong><?php echo $value['activity_goal'] ?></strong> </a>
                                                                                            </td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td height="35px" width="100%" style="text-align:center; vertical-align: middle">
                                                                                                <strong>Budget</strong>
                                                                                            </td>

                                                                                        </tr>
                                                                                       </thead>
                                                                                       
                                                                                       <tbody>
                                                                                       	
                                                                                       	<tr>
                                                                                            <td width="100%" style=" padding:0; text-align:center">
                                                                                                <?php
                                                                                                $grand_total_hour = '';
                                                                                                $grand_total_cost = '';
                                                                                                foreach ($category_type as $key1 => $value1) {
//                                                                                    $main_category = $value[$value1['code']];
                                                                                                    ?>
                                                                                                    <div style=" width: 100%; display: block; margin-bottom: 20px">
                                                                                                        <table width="100%" class="table-bordered">

                                                                                                            <tr>
                                                                                                                <td width="50%" height="40px" style=" border-right: 1px solid #e7ecf1; text-align: center">
                                                                                                                    <strong>Hours</strong>
                                                                                                                </td>
                                                                                                                <td width="50%" style="text-align: center;">
                                                                                                                    <strong>US $</strong>
                                                                                                                </td>
                                                                                                            </tr>

                                                                                                            <?php
                                                                                                            $i = 0;
                                                                                                            $k = 0;
                                                                                                            $sum_total_hour = '';
                                                                                                            $sum_total_cost = '';
                                                                                                            foreach ($budget_code as $key2 => $value2) {
                                                                                                                $code_category_string = substr($value2['code'], 0, 2);
                                                                                                                if ($value1['code'] == $code_category_string) {
                                                                                                                    ?>
                                                                                                                    <tr>
                                                                                                                        <td width="50%" height="41px" style=" border-right: 1px solid #e7ecf1; text-align: center;">    
                                                                                                                            <?php
                                                                                                                            if ($value[$value1['code']][$value2['code']]['total_hour'] == '') {
                                                                                                                                echo "-";
                                                                                                                            } else {
                                                                                                                                echo $value[$value1['code']][$value2['code']]['total_hour'];
                                                                                                                            }
                                                                                                                            ?>     
                                                                                                                        </td>
                                                                                                                        <td width="50%" style="text-align: center">   
                                                                                                                            <?php
                                                                                                                            if ($value[$value1['code']][$value2['code']]['total_cost'] == '') {
                                                                                                                                echo "-";
                                                                                                                            } else {
                                                                                                                                echo $value[$value1['code']][$value2['code']]['total_cost'];
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                        </td>
                                                                                                                    </tr>                                                         
                                                                                                                    <?php
                                                                                                                    $sum_total_hour = $sum_total_hour + $value[$value1['code']][$value2['code']]['total_hour'];
                                                                                                                    $sum_total_cost = $sum_total_cost + $value[$value1['code']][$value2['code']]['total_cost'];
                                                                                                                }
                                                                                                            }
                                                                                                            ?>

                                                                                                            <tr>
                                                                                                                <td width="100%" height="35px" colspan="2" style=" border:none;">
                                                                                                                    <table width="100%" height="35px">
                                                                                                                        <tr>
                                                                                                                            <td width="50%" height="35px" style=" border-left:none; border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800; text-align: center">
                                                                                                                                <?php
                                                                                                                                if ($sum_total_hour == '') {
                                                                                                                                    echo "-";
                                                                                                                                } else {
                                                                                                                                    echo $sum_total_hour;
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                            </td>
                                                                                                                            <td width="50%" style=" background:#ddd; color:#000; font-weight:800; text-align: center">
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
                                                                                                        </table>
                                                                                                    </div>
                                                                                                    <?php
                                                                                                    $grand_total_hour = $grand_total_hour + $sum_total_hour;
                                                                                                    $grand_total_cost = $grand_total_cost + $sum_total_cost;
                                                                                                }
                                                                                                ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        
                                                                                        <tr>
                                                                                            <td width="35%" style=" padding:0; text-align:center" height="35px;">
                                                                                                <table width="100%" height="35px">
                                                                                                    <tr>
                                                                                                        <td width="50%" height="35px" style=" border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800; text-align: center">
                                                                                                            <strong><?php
                                                                                                                if ($grand_total_hour == '') {
                                                                                                                    echo "-";
                                                                                                                } else {
                                                                                                                    echo $grand_total_hour;
                                                                                                                }
                                                                                                                ?></strong>
                                                                                                        </td>
                                                                                                        <td width="50%" style=" background:#ddd; color:#000; font-weight:800; text-align: center">
                                                                                                            <strong><?php
                                                                                                                if ($grand_total_cost == '') {
                                                                                                                    echo "-";
                                                                                                                } else {
                                                                                                                    echo $grand_total_cost;
                                                                                                                }
                                                                                                                ?>
                                                                                                            </strong>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                       </tbody>
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                    </table>
                                                                                    
                                                                                </td>
<?php } ?>

                                                                        </tr>						

                                                                    </table>
                                                                </td>
                                                                <?php // } ?>
                                                            </tr>
                                                        </table>





                                                    </div>   


                                                </div>   



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

    .div_right{ margin:0; width:100%; padding-top:0px; display:inline-block;}

    .div_right .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
        border: 1px solid #e7ecf1;
        line-height: 13px;
    }

    .div_left .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
        border: 1px solid #e7ecf1;
        line-height: 36px;
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
    padding: 0 0 0 5px;
    line-height: 12px;
    vertical-align: top;
    border-top: none;
}

.table-scrollable {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    border: none;
    margin: 8px 0 !important;
}
</style>


<!--<script src="<?php echo $assets_path; ?>custom/js/validate/app_codes_add.js" type="text/javascript"></script>-->

<script type="text/javascript">

    $('document').ready(function () {

    $('#meals').on('click', function(){
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
            $('#travel').on('click', function(){
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
