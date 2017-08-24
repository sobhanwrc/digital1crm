<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php //t($bud_details_final); exit;?>
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

                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn dark btn-outline btn-circle  active">
                                                <input type="radio" name="options" class="toggle" id="option1"><a style=" text-decoration: none; color:#fff" href="javascript:void(0)" onclick="history.back()">Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-4" style=" padding-left:0;">
                                                <div class="div_left"> 
                                                    <table width="100%" class="table table-bordered persist-area">
                                                        
                                                        <thead class="persist-header">
                                                        	<tr>
                                                            <td style=" width: 200px; height: 91px;vertical-align: middle"><strong>Marketing Budget Codes</strong></td>
                                                            <td style=" width: 20%"></td>
                                                            <td style=" width: 150px; text-align:center; height: 35px; vertical-align: middle"><strong>Page Total</strong></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td width="50%" height="35px"></td>
                                                            <td height="35px" width="15%" style=" text-align:center; vertical-align: middle"><strong>CODE</strong></td>
                                                            <td height="35px" width="35%" style=" text-align:center; vertical-align: middle"><strong>Budget</strong></td>
                                                        </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                        	
                                                        	<tr>
                                                            <td colspan="3" style=" padding: 0;">
                                                                <?php
                                                                foreach ($category_type as $key12 => $value12) {
//                                                                        foreach ($bud_details_sum_final as $key11 => $value11) { 
//                                                                            if($value12['code']==$key11){
                                                                    ?>
                                                                    <table width="100%" class="table table-bordered">
                                                                        <tr>
                                                                            <td width="50%" style=" border-top: none" title="<?php echo $value12['short_description'] ?>"><strong><?php echo substr($value12['short_description'], 0, 25) . '....'; ?></strong> </td>
                                                                            <td width="15%"></td>
                                                                            <td width="35%" height="35px" style=" padding:0; text-align:center">
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
//                                                                            t($budget_code); exit;
                                                                            $code_category_string = substr($value22['code'], 0, 2);
                                                                            if ($value12['code'] == $code_category_string) {
                                                                                ?>
                                                                                <tr>

                                                                                    <td width="45%" height="40px" title="<?php echo $value22['short_description'] ?>"><?php echo substr($value22['short_description'], 0, 25) . '...'; ?></td>
                                                                                    <td width="20%"><?php echo $value22['code'] ?></td>
                                                                                    <td width="35%" style=" padding:0; text-align:center" height="40px;">
                                                                                        <table width="100%" height="27px">
                                                                                            <tr>
                                                                                                <td width="50%" height="40px" style=" border-right: 1px solid #e7ecf1;">
                                                                                                    <?php
                                                                                                    if ($bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'] == '') {
                                                                                                        echo "-";
                                                                                                    } else {
                                                                                                        echo $bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'];
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                                <td width="50%">
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
                                                                            <td width="45%" height="36px" style=" text-align:right; vertical-align: middle"><strong>Sub-total</strong></td>
                                                                            <td width="20%"></td>
                                                                            <td width="35%" style=" padding:0; text-align:center" height="35px;">
                                                                                <table width="100%" height="36px">
                                                                                    <tr>
                                                                                        <td width="50%" height="36px" style=" border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800">
                                                                                            <strong><?php
                                                                                                if ($sum_total_hour_row == '') {
                                                                                                    echo "-";
                                                                                                } else {
                                                                                                    echo $sum_total_hour_row;
                                                                                                }
                                                                                                ?></strong>
                                                                                        </td>
                                                                                        <td width="50%" style=" background:#ddd; color:#000; font-weight:800">
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
}
//                                                                } 
//                                                                } 
?>
                                                            </td>

                                                        </tr>
                                                        </tbody>

                                                        

                                                        

                                                        


                                                    </table>
                                                </div>


                                            </div>

                                            <div class="col-md-8"> 
                                                <div class="table-responsive">

                                                    <table class="table">

                                                        <tr> 
                                                            <?php
//                                                             t($bud_details_final); exit;
                                                            foreach ($bud_details_final as $key => $value) {
//                                                    echo    $value['activity_goal']; exit;
                                                                ?>
                                                                <td width="150px">

                                                                    
                                                                    <table width="100%" class="table table-bordered persist-area">
                                                                       <thead class="persist-header">
                                                                       	
                                                                       	<tr>
                                                                            <td width="100%" height="90px" style="text-align:center; vertical-align: middle">
                                                                                <span style=" width: 100%; text-align: center; display: inline-block; margin-bottom: 5px"><strong><?php echo $value['activity_name']; ?></strong></span> 
                                                                                <span style=" width: 100%; text-align: center; display: inline-block;"><strong>Origin Attorney - <?php echo $value['attorney_name']; ?></strong></span>
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
                                                                                foreach ($category_type as $key1 => $value1) {
//                                                                                    $main_category = $value[$value1['code']];
                                                                                    ?>
                                                                                    <div style=" width: 100%; display: block; margin-bottom: 19px">
                                                                                        <table width="100%" class="table-bordered">

                                                                                            <tr>
                                                                                                <td width="50%" height="35px" style=" border-right: 1px solid #e7ecf1;">
                                                                                                    <strong>Hours</strong>
                                                                                                </td>
                                                                                                <td width="50%">
                                                                                                    <strong>US $</strong>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <?php
                                                                                            $sum_total_hour = '';
                                                                                            $sum_total_cost = '';
                                                                                            foreach ($budget_code as $key2 => $value2) {
                                                                                                $code_category_string = substr($value2['code'], 0, 2);
                                                                                                if ($value1['code'] == $code_category_string) {
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td width="50%" height="41px" style=" border-right: 1px solid #e7ecf1;">
                                                                                                        <a href="#individual_budget_dtl_hr_<?php echo $value['activity_seq_no']; ?>" data-toggle="modal" style="text-decoration:none"><?php
                                                                                                                if ($value[$value1['code']][$value2['code']]['total_hour'] == '') {
                                                                                                                    echo "-";
                                                                                                                } else {
                                                                                                                    echo $value[$value1['code']][$value2['code']]['total_hour'];
                                                                                                                }
                                                                                                                ?></a>
                                                                                                        </td>
                                                                                                        <td width="50%">
                                                                                                            <a href="#individual_budget_dtl_usd_<?php echo $value['activity_seq_no']; ?>" data-toggle="modal" style="text-decoration:none">
                                                                                                                <?php
                                                                                                                if ($value[$value1['code']][$value2['code']]['total_cost'] == '') {
                                                                                                                    echo "-";
                                                                                                                } else {
                                                                                                                    echo $value[$value1['code']][$value2['code']]['total_cost'];
                                                                                                                }
                                                                                                                ?> </a>
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
                                                                                                            <td width="50%" height="35px" style=" border-left:none; border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800">
                                                                                                                <?php
                                                                                                                if ($sum_total_hour == '') {
                                                                                                                    echo "-";
                                                                                                                } else {
                                                                                                                    echo $sum_total_hour;
                                                                                                                }
                                                                                                                ?>
                                                                                                            </td>
                                                                                                            <td width="50%" style=" background:#ddd; color:#000; font-weight:800">
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
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                       	
                                                                       </tbody>
                                                                       
                                                                        
                                                                        
                                                                        
                                                                    </table>

                                                                </td>
                                                            <?php } ?>

                                                        </tr>						

                                                    </table>






                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                </div>

                                <!--HOUR-->
                                 <?php foreach ($all_activity_array as $main_key => $main_value) { 
                                     //t($main_value);?>
                                <div id="individual_budget_dtl_hr_<?php echo $main_value['activity_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" style=" width: 30%; display: inline-block">Marketing Budget Summary</h4>
                                                Activity - <span class="caption-subject bold uppercase"><?php echo $main_value['activity_name']; ?></span>
                                                
                                            </div>
                                            <form action="#" method="post" id="my_budg_form">
                                                <div class="modal-body">
                                                    <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">

                                                        <div class="col-md-6">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 100%; padding: 0;">
                                                                            <table style="margin-bottom: 0;" class="table table-bordered">
                                                                                <thead>
                                                                                <th colspan="2" style="width: 80%; height: 50px; vertical-align: middle">Marketing Budget Codes</th>

                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="width: 100%; padding: 0; height: 25px;">
                                                                            <table style="margin-bottom: 0;" class="table">
                                                                                <thead>
                                                                                <th style="width: 80%; border-left: 1px solid #e7ecf1; height: 25px; border-bottom: none">&nbsp;</th>
                                                                                <th style="width: 20%; height: 25px; border-right: 1px solid #e7ecf1; vertical-align: middle; border-bottom: none;">Code</th>
                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>

                                                                        <td width="100%" style="padding: 0;">
                                                                            <table  class="table table-bordered ">

                                                                                    <tbody>
                                                                                        <!--...main loop...-->
                                                                                        <?php
                                                                                        foreach ($category_type as $key12 => $value12) {
//                                                                                      foreach ($bud_details_sum_final as $key11 => $value11) { 
//                                                                                      if($value12['code']==$key11){
                                                                                            ?>
                                                                                            <tr>
                                                                                                <td colspan="2" style="width: 100%; padding: 0;">
                                                                                                    <table style="margin-bottom: 0;" class="table">
                                                                                                        <tr>
                                                                                                            <td style="width: 80%; height: 25px; vertical-align: middle; border-right: 1px solid #e7ecf1;"title="<?php echo $value12['short_description'] ?>"><strong><?php echo substr($value12['short_description'], 0, 25) . '....'; ?></strong></td>
                                                                                                            <td style="width: 20%; height: 25px; text-align: center;">&nbsp;</td>
                                                                                                        </tr>
                                                                                                        <!--...inner loop....-->
                                                                                                        <?php
                                                                                                        foreach ($budget_code as $key22 => $value22) {
                                                                                                            $code_category_string = substr($value22['code'], 0, 2);
                                                                                                            if ($value12['code'] == $code_category_string) {
                                                                                                                ?>
                                                                                                                <tr>
                                                                                                                    <td style="width: 80%; vertical-align: middle; height: 25px; border-top: 1px solid #e7ecf1; border-right: 1px solid #e7ecf1;" title="<?php echo $value22['short_description']; ?>"><?php echo substr($value22['short_description'], 0, 25) . '...'; ?></td>
                                                                                                                    <td style="width: 20%;height: 25px; vertical-align: middle; text-align: center; border-top: 1px solid #e7ecf1;"><?php echo $value22['code'] ?></td>
                                                                                                                </tr>
                                                                                                                <!--...inner loop.end...-->
                                                                                                                <?php
                                                                                                            }
                                                                                                        }
                                                                                                        ?>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <!--...main loop.end..-->
                                                                                        <?php } ?>
                                                                                    </tbody>
                                                                            </table>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="table-responsive">

                                                                <table class="table table-bordered" style="border-bottom: none">
                                                                    <tr>
                                                                            <?php
                                                                            foreach ($main_value as $first_key => $first_value) {
//                                                                                    t($first_value);
                                                                                if(is_array($first_value)>0){
                                                                                ?>
                                                                        <td style=" padding: 0; border-bottom: none;">
                                                                            <table class="table" style="width: 130px; margin-bottom: 0; border-right: 1px solid #e7ecf1;  display:inline-block ">
                                                                                <tbody>
                                                                    <tr>
                                                                        <td style=" padding: 0;">
                                                                            <table style="margin-bottom: 0;" class="table">
                                                                                <thead>
                                                                                <th colspan="2" style=" width: 130px; height: 50px; vertical-align: middle">
                                                                                    <?php if ($first_value['client_type'] == 'C') {
                                                                                            if($first_value['type'] == 'I'){ ?>
                                                                                              Client - <?php echo $first_value['client_name']; ?>   
                                                                                        <?php    } else if($first_value['type'] == 'O'){ ?>
                                                                                            Client - <?php echo $first_value['client_company']; ?>   
                                                                                                
                                                                                        <?php    }
                                                                                        ?>
                                                                                            <?php } else if ($first_value['client_type'] == 'T') {
                                                                                                if($first_value['type'] == 'I'){ ?>
                                                                                                 Target - <?php echo $first_value['client_name']; ?>   
                                                                                            <?php    }else if($first_value['type'] == 'O'){ ?>
                                                                                                Target - <?php echo $first_value['client_company']; ?>  
                                                                                         <?php   }
                                                                                                ?>
                                                                                    
                                                                                            <?php } ?>
                                                                                </th>

                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="padding: 0;width: 130px;  border-top: 1px solid #e7ecf1; height: 25px;  border-bottom: 1px solid #e7ecf1;">
                                                                            <table style="margin-bottom: 0;" class="table">
                                                                                <thead>
                                                                                <th style="width: 65px; border-right: 1px solid #e7ecf1; height: 25px; vertical-align: middle; border-bottom: none">Hours</th>
                                                                                <th style="width: 65px; border-right: none; vertical-align: middle; border-bottom: none;">US $</th>
                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>

                                                                        <td style="width: 130px; padding: 0; height: 25px" >
                                                                            <table  class="table" style=" margin-bottom: 0;">

                                                                                    <tbody>
                                                                                        <!--...main loop...-->
                                                                                        <?php
                                                                                                foreach ($category_type as $category_type_key => $category_type_value) {
                                                                                                    $category = $category_type_value['code'];
                                                                                                    ?>
                                                                                        
                                                                                        <tr><td colspan="2" style="width: 130px; height: 24px">&nbsp;</td></tr>
                                                                                        <tr style="border-bottom: 1px solid #e7ecf1;">
                                                                                                <td colspan="2" style="width: 100%; padding: 0; height: 25px;">
                                                                                                    <table style="margin-bottom: 0;" class="table">
                                                                                                        <?php
                                                                                                                    foreach ($budget_code as $budget_code_key => $budget_code_value) {
                                                                                                                        $sub_category = $budget_code_value['code'];
                                                                                                                        $code_category_string = substr($budget_code_value['code'], 0, 2);
                                                                                                                        if ($category_type_value['code'] == $code_category_string) {
                                                                                                                            ?>
                                                                                                        <tr style="border-top: 1px solid #e7ecf1;">
                                                                                                            <td style="width: 65px; border-right: 1px solid #e7ecf1; vertical-align: middle; height: 25px">
                                                                                                                  <?php
                                                                                                                        if (count($first_value[$category][$sub_category]) > 0) {
                                                                                                                            echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_hours'];
                                                                                                                        } else {
                                                                                                                            echo "-";
                                                                                                                        }
//                                                                                                                        echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_hours'];
                                                                                                                    ?>
                                                                                                            </td>
                                                                                                            <td style="width: 65px; text-align: center; height: 25px; vertical-align: middle">
                                                                                                                  <?php
                                                                                                                                    if (count($first_value[$category][$sub_category]) > 0) {
                                                                                                                                        echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_cost'];
                                                                                                                                    } else {
                                                                                                                                        echo "-";
                                                                                                                                    }
//                                                                                                                        echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_hours'];
                                                                                                                                    ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                               <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                    ?>
                                                                                                      

                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php } ?>
                                                                                            
<!--                                                                                            <tr><td colspan="2" style="border-bottom: 1px solid #e7ecf1; border-top: 1px solid #e7ecf1;">&nbsp;</td></tr>-->
                                                                                            
                                                                                            <!--...main loop.end..-->
                                                                                        
                                                                                    </tbody>
                                                                            </table>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                                                
                                                                            </table>
                                                                        </td>
                                                                        
                                                                            <?php }
                                                                            
                                                                            } ?>
                                                                    </tr>
                                                                
                                                            </table>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                    <!--<button type="button" class="btn green" id="budget_savetosession">Save</button>-->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                                 <?php } ?>
                                <!--DOLLAR-->
                                <?php foreach ($all_activity_array as $main_key => $main_value) { ?>
                                <div id="individual_budget_dtl_usd_<?php echo $main_value['activity_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" style=" width: 30%; display: inline-block">Marketing Budget Summary</h4>
                                                Activity - <span class="caption-subject bold uppercase"><?php echo $main_value['activity_name']; ?></span>
                                            </div>
                                            <form action="#" method="post" id="my_budg_form">
                                                <div class="modal-body">
                                                    <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">

                                                        <div class="col-md-6">
                                                            <table class="table ">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 100%; padding: 0;">
                                                                            <table style="margin-bottom: 0;" class="table table-bordered">
                                                                                <thead>
                                                                                <th colspan="2" style="width: 80%; height: 50px; vertical-align: middle;">Marketing Budget Codes</th>

                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="width: 100%; padding: 0; height: 25px">
                                                                            <table style="margin-bottom: 0;" class="table">
                                                                                <thead>
                                                                                <th style="width: 80%; height: 25px; border-left: 1px solid #e7ecf1; border-bottom: none">&nbsp;</th>
                                                                                <th style="width: 20%; height: 25px; vertical-align: middle; border-right: 1px solid #e7ecf1; border-bottom: none;">Code</th>
                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>

                                                                        <td width="100%" style="padding: 0;">
                                                                            <table  class="table table-bordered ">

                                                                                    <tbody>
                                                                                        <!--...main loop...-->
                                                                                        <?php
                                                                                        foreach ($category_type as $key12 => $value12) {
//                                                                                      foreach ($bud_details_sum_final as $key11 => $value11) { 
//                                                                                      if($value12['code']==$key11){
                                                                                            ?>
                                                                                            <tr>
                                                                                                <td colspan="2" style=" height: 25px;width: 100%; padding: 0">
                                                                                                    <table style="margin-bottom: 0;" class="table">
                                                                                                        <tr>
                                                                                                            <td style=" height: 25px; vertical-align: middle;width: 80%; border-right: 1px solid #e7ecf1;"title="<?php echo $value12['short_description'] ?>"><strong><?php echo substr($value12['short_description'], 0, 25) . '....'; ?></strong></td>
                                                                                                            <td style=" height: 25px;width: 20%; text-align: center;">&nbsp;</td>
                                                                                                        </tr>
                                                                                                        <!--...inner loop....-->
                                                                                                        <?php
                                                                                                        foreach ($budget_code as $key22 => $value22) {
                                                                                                            $code_category_string = substr($value22['code'], 0, 2);
                                                                                                            if ($value12['code'] == $code_category_string) {
                                                                                                                ?>
                                                                                                                <tr>
                                                                                                                    <td style=" height: 25px;width: 80%; vertical-align: middle;border-top: 1px solid #e7ecf1; border-right: 1px solid #e7ecf1;" title="<?php echo $value22['short_description']; ?>"><?php echo substr($value22['short_description'], 0, 25) . '...'; ?></td>
                                                                                                                    <td style=" height: 25px; vertical-align: middle; width: 20%; text-align: center; border-top: 1px solid #e7ecf1;"><?php echo $value22['code'] ?></td>
                                                                                                                </tr>
                                                                                                                <!--...inner loop.end...-->
                                                                                                                <?php
                                                                                                            }
                                                                                                        }
                                                                                                        ?>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <!--...main loop.end..-->
                                                                                        <?php } ?>
                                                                                    </tbody>
                                                                            </table>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="table-responsive">

                                                                <table class="table table-bordered" style="border-bottom: none">
                                                                    <tr>
                                                                            <?php
//                                                                            t($main_value);
                                                                            foreach ($main_value as $first_key => $first_value) {
                                                                                if(is_array($first_value)){   
                                                                                ?>
                                                                        <td style=" padding: 0; border-bottom: none">
                                                                            <table class="table" style="width: 130px; border-right: 1px solid #e7ecf1; display:inline-block; margin-bottom: 0 ">
                                                                                <tbody>
                                                                    <tr>
                                                                        <td style=" padding: 0; width: 130px;">
                                                                            <table style="margin-bottom: 0;" class="table">
                                                                                <thead>
                                                                                <th colspan="2" style=" height: 50px; vertical-align: middle;">
                                                                                    <?php if ($first_value['client_type'] == 'C') {
                                                                                            if($first_value['type'] == 'I'){ ?>
                                                                                              Client - <?php echo $first_value['client_name']; ?>   
                                                                                        <?php    } else if($first_value['type'] == 'O'){ ?>
                                                                                            Client - <?php echo $first_value['client_company']; ?>   
                                                                                                
                                                                                        <?php    }
                                                                                        ?>
                                                                                            <?php } else if ($first_value['client_type'] == 'T') {
                                                                                                if($first_value['type'] == 'I'){ ?>
                                                                                                 Target - <?php echo $first_value['client_name']; ?>   
                                                                                            <?php    }else if($first_value['type'] == 'O'){ ?>
                                                                                                Target - <?php echo $first_value['client_company']; ?>  
                                                                                         <?php   }
                                                                                                ?>
                                                                                    
                                                                                            <?php } ?>
                                                                                </th>

                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="padding: 0; height: 25px;  border-top: 1px solid #e7ecf1;  border-bottom: 1px solid #e7ecf1;">
                                                                            <table style="margin-bottom: 0;" class="table">
                                                                                <thead>
                                                                                <th style="height: 25px; width: 65px; vertical-align: middle;  border-right: 1px solid #e7ecf1; border-bottom: none">Hours</th>
                                                                                <th style="height: 25px; width: 65px; vertical-align: middle; border-right: none; border-bottom: none;">US $</th>
                                                                                </thead>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>

                                                                        <td style="padding: 0; border-bottom: none">
                                                                            <table  class="table" style="margin-bottom: 0">

                                                                                    <tbody>
                                                                                        <!--...main loop...-->
                                                                                        <?php
                                                                                                foreach ($category_type as $category_type_key => $category_type_value) {
                                                                                                    $category = $category_type_value['code'];
                                                                                                    ?>
                                                                                        
                                                                                        <tr><td colspan="2" style=" height: 24px;">&nbsp;</td></tr>
                                                                                        <tr style="border-bottom: 1px solid #e7ecf1;">
                                                                                                <td colspan="2" style="width: 100%; padding: 0">
                                                                                                    <table style="margin-bottom: 0;" class="table">
                                                                                                        <?php
                                                                                                                    foreach ($budget_code as $budget_code_key => $budget_code_value) {
                                                                                                                        $sub_category = $budget_code_value['code'];
                                                                                                                        $code_category_string = substr($budget_code_value['code'], 0, 2);
                                                                                                                        if ($category_type_value['code'] == $code_category_string) {
                                                                                                                            ?>
                                                                                                        <tr style="border-top: 1px solid #e7ecf1;">
                                                                                                            <td style="height: 25px; width: 65px; vertical-align: middle; border-right: 1px solid #e7ecf1;">
                                                                                                                  <?php
                                                                                                                        if (count($first_value[$category][$sub_category]) > 0) {
                                                                                                                            echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_hours'];
                                                                                                                        } else {
                                                                                                                            echo "-";
                                                                                                                        }
//                                                                                                                        echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_hours'];
                                                                                                                    ?>
                                                                                                            </td>
                                                                                                            <td style="text-align: center; width: 65px; height: 25px; vertical-align: middle">
                                                                                                                  <?php
                                                                                                                                    if (count($first_value[$category][$sub_category]) > 0) {
                                                                                                                                        echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_cost'];
                                                                                                                                    } else {
                                                                                                                                        echo "-";
                                                                                                                                    }
//                                                                                                                        echo $first_value[$category_type_value['code']][$budget_code_value['code']]['budget_code_hours'];
                                                                                                                                    ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                               <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                    ?>
                                                                                                      

                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php } ?>
                                                                                            
<!--                                                                                            <tr><td colspan="2" style="border-bottom: 1px solid #e7ecf1; border-top: 1px solid #e7ecf1;">&nbsp;</td></tr>-->
                                                                                            
                                                                                            <!--...main loop.end..-->
                                                                                        
                                                                                    </tbody>
                                                                            </table>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                                                
                                                                            </table>
                                                                        </td>
                                                                        
                                                                        <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                    </tr>
                                                                
                                                            </table>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                    <!--<button type="button" class="btn green" id="budget_savetosession">Save</button>-->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <?php } ?>
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




    .div_left{ margin:0; width:100%; padding-top: 0px; display:inline-block;}
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

.modal-dialog {
    width: 900px;
    margin: 30px auto;
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
