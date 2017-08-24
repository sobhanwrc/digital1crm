<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
<?php //echo $created_by; exit;?>
<?php // echo $admin_id; exit;?>
    <?php echo $header_link; ?>
    <!-- END HEAD -->

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
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo base_url()?>dashboard">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                  <!--  <li>
                        <a href="#">Module 3</a>
                        <i class="fa fa-circle"></i>
                    </li>-->
                    <li>
                        <span>Module 7</span>
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
                                <span class="caption-subject bold uppercase">Module 7</span>
                            </div>
                            <!--                                    <div class="actions">
                                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                                                    </div>
                                                                </div>-->

                        </div>
                        <div class="portlet-body">
                            <?php //if ($role_code == 'SITEADM' || $role_code == 'FIRMADM') { ?>
                            <div class="table-toolbar">
<!--
                                <div class="row">
                                    <div class="col-md-6" style=" padding-left: 0">
                                        <div class="btn-group">
                                            <a href="<?php echo $base_url; ?>competitor/add" class="btn btn-outline sbold"  > 
                                            </a>
                                        </div>
                                    </div>
                                </div>
-->
                            </div>
                            <?php //} ?>
                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                <thead>
                                    <tr class="">
                                        <th> SL NO </th>
                                        <th> Name </th>
                                        <th> Company Name </th>
                                        <th> Phone No </th>
                                        <th> Email </th>
                                        <!--<th> Deliver Date </th>-->
                                        
                                        
                                        <!--<th> Action </th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php // t($user_data, 1); ?>
                                    <?php $SlNo = 1;
                                    foreach($user_data as $key => $value)
                                    {
//                                    t($value); exit;
                                    ?>
                                    <tr style=" cursor: pointer" onclick="javascript:window.location.href='<?php echo $base_url; ?>Activity_Payment/view/<?php echo base64_encode($value['target_seq_no']); ?>/<?php  echo base64_encode($value['id'])  ;?>'">

                                        <td><?php echo $SlNo++ ?></td>
                                        <td <?php if($value['type'] == "I") { ?> class="border_show" <?php } ?>><?php echo  $value['target_first_name'].''. $value['target_last_name'];
                                        ?></td>
                                        <td <?php if($value['type']=='C') { ?> class="border_show" <?php } ?>><?php echo  $value['company_name']; ?>
                                        </td>

                                        <td><?php echo $value['home_phone']; ?></td>
                                        <td><?php echo $value['email_target_id']; ?></td>
                                        <!--<td><?php echo $value['appointment_time']; ?></td>-->
                                       
                                        
                                        <!--<td>-->
                                            <div class="btn-group">
                                                <!--<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>-->
                                                
                                                <ul class="dropdown-menu" role="menu">
                                                    <!-- <li>
                                                        <a href="http://dev.wrctechnologies.com/ams/case/index">
                                                            <i class="icon-docs"></i> Case
                                                        </a>
                                                    </li> -->
                                                     
                                                    <li>
                                                        <a href="<?php echo $base_url . 'competitor/details/' . base64_encode($value['competitor_seq_no']); ?>">
                                                            <i class="icon-docs"></i> View </a>
                                                    </li>
                                                    
                                                   
<!--                                                    <li>
                                                        <a href="<?php echo $base_url . 'competitor/delete/' . base64_encode($value['competitor_seq_no']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                            <i class="icon-tag"></i> Delete </a>
                                                    </li>-->

                                                   
<!--                                                    <li>
                                                        <a href="#responsive_<?php echo $value['competitor_seq_no']; ?>"  data-toggle="modal">
                                                            <i class="icon-docs"></i> Add Rank</a>
                                                    </li>-->
                                                   
                                                    <?php if($admin_id == $value['created_by']) { ?> 
                                                    <li>
                                                        <a href="<?php echo $base_url . 'competitor/edit/' . base64_encode($value['competitor_seq_no']); ?>">
                                                            <i class="icon-tag"></i> Edit
                                                        </a>
                                                    </li>
                                                     <?php } ?>
<!--                                                    <li>
                                                        <a href="<?php echo $base_url . 'competitor/view_rank/' . base64_encode($value['competitor_seq_no']); ?>">
                                                            <i class="icon-tag"></i> View Rank
                                                        </a>
                                                    </li>-->
                                                  
                                                    <!--                                                    <li>
                                                                                                            <a href="javascript:;">
                                                                                                                <i class="icon-user"></i> New User </a>
                                                                                                        </li>
                                                                                                        <li class="divider"> </li>
                                                                                                        <li>
                                                                                                            <a href="javascript:;">
                                                                                                                <i class="icon-flag"></i> Comments
                                                                                                                <span class="badge badge-success">4</span>
                                                                                                            </a>
                                                                                                        </li>-->
                                                </ul>
                                                <?php } ?> 
                                                <input type="hidden" value="<?php   echo $module_no;?>" name="module_no">
                                            </div>
                                       <!-- </td>-->
                                    </tr>
 
                                </tbody>
                            </table>


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
    
    <?php foreach ($competitor as $key => $value) { ?>
                <div id="responsive_<?php echo $value['competitor_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add Competitor Rank</h4>
                            </div>
                            <form action="<?php echo $base_url . 'competitor/add_rank/' . base64_encode($value['competitor_seq_no']); ?>" autocomplete="off" name="add_competitor_rank" id="add_competitor_rank_<?php echo $value['competitor_seq_no']; ?>" method="post" class="add_competitor_rank_class">
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                <label class="col-md-4 control-label">Competitor Name:</label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php echo $value['competitor_first_name'] . ' ' .  $value['competitor_last_name'];  ?>">
                                                        <span class="help-block">  </span>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Competitor Ranking</label>
                                                    <div class="col-md-8">
                                                        <select name="competitor_ranking" id="competitor_ranking" class="form-control">
                                                                    <option value="">Select Ranking</option>
                                                                    <?php foreach ($competitor_rank as $key1 => $value1) { ?>
                                                                        <option value="<?php echo $value1['code']; ?>"><?php echo $value1['short_description']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Remarks or comments" name="remarks_notes" id="remarks_notes"></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="submit" class="btn green section_group_edit_button" name="general_save_change_attr" id="general_save_change_attr">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               <?php } ?>
    
</div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
  <!--address DB-->  
<script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
<script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script> 
<script src="<?php echo $assets_path; ?>custom/js/validate/competitor_add_edit.js" type="text/javascript"></script>
<script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
<!--address DB-->
    <style>
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
.form-group.required .control-label:after {
content:"*";
color:red;
}

.table-toolbar {
margin-bottom: 0;
}
        
    </style>
<script type="text/javascript">

                $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
                });
</script>
    
    </body>

</html> 