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
                                    
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn dark btn-outline btn-circle  active">
                                                <input type="radio" name="options" class="toggle" id="option1"><a style=" text-decoration: none; color:#fff"s href="javascript:void(0)" onclick="history.back()">Back</a></label>
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
                                                    <table width="100%" class="table table-bordered">

                                                        <tr>
                                                            <td width="45%" height="90px" style=" vertical-align: middle"><strong>Marketing Budget Codes</strong></td>
                                                            <td width="20%"></td>
                                                            <td width="35%" style=" text-align:center; vertical-align: middle"><strong>Page Total</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <td width="50%"></td>
                                                            <td width="15%" style=" text-align:center"><strong>CODE</strong></td>
                                                            <td width="35%" style=" text-align:center"><strong>Budget</strong></td>
                                                        </tr>

                                                            <tr>
                                                                <td colspan="3" style=" padding: 0;">
                                                                    <?php foreach ($category_type as $key12 => $value12) {
//                                                                        foreach ($bud_details_sum_final as $key11 => $value11) { 
//                                                                            if($value12['code']==$key11){
                                                                        ?>
                                                                    <table width="100%" class="table table-bordered">
                                                                        <tr>
                                                                            <td width="50%" style=" border-top: none" title="<?php echo $value12['short_description'] ?>"><strong><?php echo substr($value12['short_description'], 0, 30).'....';?></strong> </td>
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
                                                        $sum_total_hour_row='';
                                                        $sum_total_cost_row='';
                                                        
                                                            foreach ($budget_code as $key22 => $value22) {
                                                                $code_category_string = substr($value22['code'], 0, 2);
                                                                if ($value12['code'] == $code_category_string) {
                                                                    ?>
                                                                    <tr>

                                                                        <td width="45%" height="40px" title="<?php echo $value22['short_description'] ?>"><?php echo substr($value22['short_description'], 0,35).'...'; ?></td>
                                                                        <td width="20%"><?php echo $value22['code'] ?></td>
                                                                        <td width="35%" style=" padding:0; text-align:center" height="40px;">
                                                                            <table width="100%" height="27px">
                                                                                <tr>
                                                                                    <td width="50%" height="40px" style=" border-right: 1px solid #e7ecf1;">
                                                                                      <?php if($bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'] == '') {
                                                                                        echo "-";
                                                                                    } else{
                                                                                       echo $bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'];  
                                                                                    }?>
                                                                                    </td>
                                                                                    <td width="50%">
                                                                                        <?php 
                                                                                        if($bud_details_sum_final[$value12['code']][$value22['code']]['total_cost'] == ''){
                                                                                        echo "-";    
                                                                                        } else{
                                                                                         echo $bud_details_sum_final[$value12['code']][$value22['code']]['total_cost'];   
                                                                                        } ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>

                                                                    </tr>
                                                                    <?php
                                                                    $sum_total_hour_row = $sum_total_hour_row+$bud_details_sum_final[$value12['code']][$value22['code']]['total_hour'];
                                                                    $sum_total_cost_row =$sum_total_cost_row+$bud_details_sum_final[$value12['code']][$value22['code']]['total_cost'];
                                                                }
                                                                }
                                                            
                                                            ?>
                                                            <tr>
                                                                <td width="45%" height="35px" style=" text-align:right;"><strong>Sub-total</strong></td>
                                                                <td width="20%"></td>
                                                                <td width="35%" style=" padding:0; text-align:center" height="35px;">
                                                                    <table width="100%" height="35px">
                                                                        <tr>
                                                                            <td width="50%" height="35px" style=" border-right: 1px solid #e7ecf1; background:#ddd; color:#000; font-weight:800">
                                                                                <strong><?php if($sum_total_hour_row == ''){
                                                                                   echo "-"; 
                                                                                } else{
                                                                                  echo $sum_total_hour_row;  
                                                                                }  ?></strong>
                                                                            </td>
                                                                            <td width="50%" style=" background:#ddd; color:#000; font-weight:800">
                                                                                <strong><?php if($sum_total_cost_row == ''){
                                                                                   echo "-"; 
                                                                                } else{
                                                                                  echo $sum_total_cost_row;  
                                                                                }  ?></strong>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                                    </table>
                                                                    <?php } 
//                                                                } 
//                                                                } 
                                                                ?>
                                                                </td>
                                                                
                                                            </tr>
                                                            
                                                       
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
//                                                        t($value); exit;
                                                                ?>
                                                                <td width="150px">
                                                                    

                                                                    <table width="100%" class="table table-bordered">
                                                                        <tr>
                                                                            <td width="100%" height="90px" style="text-align:center; vertical-align: middle">
                                                                                <span style=" width: 100%; text-align: center; display: inline-block; margin-bottom: 5px"><strong><?php echo $value['activity_name']; ?></strong></span> 
                                                                                <span style=" width: 100%; text-align: center; display: inline-block;"><strong>Origin Attorney - <?php echo $value['attorney_name']; ?></strong></span>
                                                                            </td>
                                                                           

                                                                        </tr>
                                                                        <tr>
                                                                            <td height="27px" width="100%" style="text-align:center;">
                                                                                <strong>Budget</strong>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td width="100%" style=" padding:0; text-align:center">
                                                                                <?php
                                                                                foreach ($category_type as $key1 => $value1) {
//                                                                                    $main_category = $value[$value1['code']];
                                                                                    ?>
                                                                                <div style=" width: 100%; display: block; margin-bottom: 20px">
                                                                                    <table width="100%" class="table-bordered">

                                                                                        <tr>
                                                                                            <td width="50%" height="40px" style=" border-right: 1px solid #e7ecf1;">
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
                                                                                                        <a href="#individual_budget_dtl_hr" data-toggle="modal" style="text-decoration:none"><?php if ($value[$value1['code']][$value2['code']]['total_hour'] == '') {
                                                                                                            echo "-";
                                                                                                        } else {
                                                                                                            echo $value[$value1['code']][$value2['code']]['total_hour'];
                                                                                                            } ?></a>
                                                                                                    </td>
                                                                                                    <td width="50%">
                                                                                                        <a href="#individual_budget_dtl_usd" data-toggle="modal" style="text-decoration:none">
                                                                                                <?php if ($value[$value1['code']][$value2['code']]['total_cost'] == '') {
                                                                                                    echo "-";
                                                                                                } else {
                                                                                                    echo $value[$value1['code']][$value2['code']]['total_cost'];
                                                                                                    } ?> </a>
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
                                                                                                            <?php if ($sum_total_hour == '') {
                                                                                                                    echo "-";
                                                                                                                    } else {
                                                                                                                 echo $sum_total_hour;
                                                                                                                } ?>
                                                                                                        </td>
                                                                                                        <td width="50%" style=" background:#ddd; color:#000; font-weight:800">
                                                                                                            <?php if ($sum_total_cost == '') {
                                                                                                                    echo "-";
                                                                                                                    } else {
                                                                                                                  echo $sum_total_cost;
                                                                                                               } ?>
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
                                
<div id="individual_budget_dtl_hr" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Marketing Budget Code2</h4>
            </div>
            <form action="#" method="post" id="my_budg_form">
            <div class="modal-body">
                <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">

                    <div class="col-md-7">
                    	<table class="table">
								<tbody>
								<tr>
									<td style="width: 100%; padding: 0;">
										<table style="margin-bottom: 0;" class="table table-bordered">
											<thead>
												<th colspan="2" style="width: 80%;">Marketing Budget Codes</th>
												
											</thead>
										</table>
									</td>
									</tr>
									
									<tr>
									<td style="width: 100%; padding: 0;">
										<table style="margin-bottom: 0;" class="table">
											<thead>
												<th style="width: 80%; border-left: 1px solid #e7ecf1; border-bottom: none">&nbsp;</th>
												<th style="width: 20%; border-right: 1px solid #e7ecf1; border-bottom: none;">Code</th>
											</thead>
										</table>
									</td>
									</tr>
									
									<tr>
								
									<td width="100%" style="padding: 0;">
										<table  class="table table-bordered ">
											
											<tbody>
												<tr>
													<td colspan="2" style="width: 100%; padding: 0">
														<table style="margin-bottom: 0;" class="table">
															<tr>
																<td style="width: 80%; border-right: 1px solid #e7ecf1;">MEALS AND ENTERTAINMENT</td>
																<td style="width: 20%; text-align: center;">&nbsp;</td>
															</tr>
															
															<tr>
																<td style="width: 80%;border-top: 1px solid #e7ecf1; border-right: 1px solid #e7ecf1;">MEALS AND ENTERTAINMENT</td>
																<td style="width: 20%; text-align: center; border-top: 1px solid #e7ecf1;">&nbsp;</td>
															</tr>
															
															
															
														</table>
													</td>

												</tr>

                                                                                                
                                                                                              
                                                                                                
                                                                                                
											</tbody>
										</table>
									</td>
									
								</tr>
								</tbody>
							</table>
                    </div>
                    
                    <div class="col-md-5">
						<div class="table-responsive">
							
							<table class="table">
								<tbody>
								<tr>
									<td width="100%" style="padding: 0;">
										<table class="table table-bordered ">
											<thead>
												<th style="width: 100%; text-align: center; border-bottom: 1px solid #e7ecf1;">Client/ Target (Attorney)</th>
											</thead>
											<tbody>
												<tr>
													<td style="width: 100%; text-align: center;">Hours</td>

												</tr>
												<tr>
													<td style="width: 100%; text-align: center; padding: 0;">
														<table style="margin-bottom: 0;" class="table">
															<tr>
																<td style="width: 100%; border-bottom: 1px solid #e7ecf1;">1</td>
															</tr>
															
															<tr>
																<td style="width: 100%; border-right: 1px solid #e7ecf1;">1</td>
															</tr>


														</table>
														
													</td>

												</tr>
                                                                                                
                                                                                                
                                                                                               
											</tbody>
										</table>
									</td>

								</tr>
								</tbody>
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
                                
                                <!--DOLLAR-->
                                
<div id="individual_budget_dtl_usd" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Marketing Budget Code2</h4>
            </div>
            <form action="#" method="post" id="my_budg_form">
            <div class="modal-body">
                <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">

                    <div class="col-md-7">
                    	<table class="table">
								<tbody>
								<tr>
									<td width="100%">
										<table class="table table-bordered ">
											<thead>
												<th style="width: 80%; height: 50px;">&nbsp;</th>
												<th style="width: 20%">&nbsp;</th>
											</thead>
											<tbody>
												<tr>
													<td style="width: 80%"></td>
													<td style="width: 20%">Code</td>
												</tr>
												<tr>
													<td style="width: 80%"><b>MEALS AND ENTERTAINMENT</b></td>
													<td style="width: 20%"></td>
												</tr>
                                                                                                
                                                                                                <tr>
													<td style="width: 80%">Food and Beverage...</td>
													<td style="width: 20%">ME01</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Admission fees, tickets and venue..</td>
													<td style="width: 20%">ME02</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Room rental - receptions.. </td>
													<td style="width: 20%">ME03</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Gifts and takeaways...</td>
													<td style="width: 20%">ME04</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Labor and Support...</td>
													<td style="width: 20%">ME05</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%"><b>TRAVEL</b></td>
													<td style="width: 20%"></td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Transportation...</td>
													<td style="width: 20%">TR01</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Lodging...</td>
													<td style="width: 20%">TR02</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Mileage...</td>
													<td style="width: 20%">TR03</td>
												</tr>
                                                                                                <tr>
													<td style="width: 80%">Car rental...</td>
													<td style="width: 20%">TR04</td>
												</tr>
                                                                                                
											</tbody>
										</table>
									</td>
									
								</tr>
								</tbody>
							</table>
                    </div>
                    
                    <div class="col-md-5">
						<div class="table-responsive">
							
							<table class="table">
								<tbody>
								<tr>
									<td width="100%">
										<table class="table table-bordered ">
											<thead>
												<th style="width: 100%; text-align: center; border-bottom: 1px solid #e7ecf1;">Client/ Target (Attorney)</th>
											</thead>
											<tbody>
												<tr>
													<td style="width: 100%; text-align: center;">Hours</td>

												</tr>
												<tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">1</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">2</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">3</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">4</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">5</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">6</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">7</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">8</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">9</td>

												</tr>
											</tbody>
										</table>
									</td>
									<td width="100%">
									<table class="table table-bordered ">
											<thead>
												<th style="width: 100%; text-align: center; border-bottom: 1px solid #e7ecf1;">Client/ Target (Attorney)</th>
											</thead>
											<tbody>
												<tr>
													<td style="width: 100%; text-align: center;">Hours</td>

												</tr>
												<tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">1</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">2</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">3</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">4</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">5</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">6</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">7</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">8</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">9</td>

												</tr>
											</tbody>
										</table>	
									</td>
                                                                        
                                                                        <td width="100%">
									<table class="table table-bordered ">
											<thead>
												<th style="width: 100%; text-align: center; border-bottom: 1px solid #e7ecf1;">Client/ Target (Attorney)</th>
											</thead>
											<tbody>
												<tr>
													<td style="width: 100%; text-align: center;">Hours</td>

												</tr>
												<tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">1</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">2</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">3</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">4</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">5</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">6</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">7</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">8</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">9</td>

												</tr>
											</tbody>
										</table>	
									</td>
                                                                        
                                                                        <td width="100%">
									<table class="table table-bordered ">
											<thead>
												<th style="width: 100%; text-align: center; border-bottom: 1px solid #e7ecf1;">Client/ Target (Attorney)</th>
											</thead>
											<tbody>
												<tr>
													<td style="width: 100%; text-align: center;">Hours</td>

												</tr>
												<tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">1</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">2</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">3</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">4</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">5</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">&nbsp;</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">6</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">7</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">8</td>

												</tr>
                                                                                                <tr>
													<td style="width: 100%; text-align: center;">9</td>

												</tr>
											</tbody>
										</table>	
									</td>
								</tr>
								</tbody>
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

    .div_left{ margin:0; width:100%; padding-top: 8px; display:inline-block;}

    .div_right{ margin:0; width:600px; height:300px; padding:0; display:inline-block; overflow-x:scroll; overflow-y:hidden;}

    .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
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
