<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" style="position: relative">
       
       <div id="loader_image" style=" width: 100%; height: 100%; position: absolute; top: 0; left: 0; padding-top: 15%; text-align: center; overflow-y: hidden !important; overflow-x: hidden !important; background: #fff; z-index: 99999999999">
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
                                <a href="<?php  echo base_url()?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                <a href="#">Module 2</a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Module 2</span>
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
                                        <span class="caption-subject bold uppercase">Module 2 List</span>
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
                                    <div class="table-toolbar">
                                        <div class="row" id="message">
                                            <div class="col-md-12">
                                                <?php
                                                $srvr_msg = $this->session->flashdata('server_message');
                                                if (isset($srvr_msg)) {
                                                    echo $srvr_msg;
                                                }
                                                ?>
                                                 <?php
                                                $suc_message = $this->session->flashdata('suc_message');
                                                if (isset($suc_message)) {
                                                    echo $suc_message;
                                                }
                                                ?>
                                            </div>
                                        </div>
<!--
                                        <div class="row">
                                            <div class="col-md-6" style=" padding-left: 0">
                                                <?php if ($role_code == 'SITEADM'|| $role_code == 'FIRMADM' || $role_code == 'ATTRMGR' || $role_code == 'ATTR') { ?>
                                                    <div class="btn-group">
                                                        <a href="<?php echo $base_url; ?>client-master/add" class="btn btn-outline sbold" data-toggle="modal" > 
                                                            <button class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                <div class="btn-group">
                                                        <a href="#responsive_file" class="btn btn-outline sbold" data-toggle="modal" > 
                                                            <button class="btn sbold green"> Import
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
-->
                                    </div>
                                    <?php if ($role_code == 'SITEADM') { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-3"></div>
                                                    <form action="<?php echo $base_url; ?>client_master/fetchClients" method="post" name="firm_list_form" id="firm_list_form">
                                                        <div class="col-md-3">
                                                            <select class="form-control" name="fimrs">
                                                                <option value="">Select a Firm</option>
                                                                <option value="all">All</option>
                                                                <?php foreach ($firms as $key => $value) { ?>
                                                                    <option value="<?php echo $value['firm_seq_no']; ?>" <?php if ($firm_id == $value['firm_seq_no']) { ?> selected="" <?php } ?>><?php echo $value['firm_name']; ?></option>                                         
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="submit" value="Go" class="btn" id="firm_list_submit">
                                                        </div>
                                                    </form>
                                                    <div class="col-md-4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                 <?php if($role_code=='SITEADM'){ ?>
                                                <th> Firm Name </th>
                                                <?php } ?>
                                                <!--<th> Client ID</th>-->
<!--                                                <th> Master ID </th>-->
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Company Name </th>
                                                <th> Last Contacted </th>
                                                
                                                <!--<th> Phone </th>-->
                                                <!--<th> Mobile </th>-->
                                                <th> Next Call Date </th>
                                                <th> Next Call Time </th>
                                                <!--<th> Notes </th>-->
                                                <!--<th> Actions </th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($fetch_details_module2 as $key => $val) { ?>
                                                <tr style=" cursor: pointer" onclick="javascript:window.location.href='<?php echo $base_url;?>client_master/details/<?php echo base64_encode($val['target_seq_no']); ?>'">
                                                    <td> <?php echo ++$i; ?> </td>
                                                    <?php //if($role_code=='SITEADM'){ ?>
                                                    <!--<td> <?php echo $value['firm_name']; ?> </td>-->
                                                  <?php //} ?>
                                                    <!--<td> <?php echo $val['client_id']; ?> </td>-->
<!--                                                    <td> <?php echo $val['client_code']; ?> </td>-->
                                                    <td <?php if($val['type'] == 'I'){ ?>  class="border_show" <?php }?> > <?php echo $val['first_name'].' '.$val['last_name'] ?> </td>
                                                    <td> <?php echo $val['email']; ?> </td>
                                                    <td <?php if($val['type'] == 'C'){ ?> class="border_show" <?php }?> > <?php echo $val['company_name']; ?> </td>
                                                    <td> <?php echo $val['date_contacted']; ?> </td>
                                                    <!--<td> <?php echo $val['phione']; ?> </td>-->
                                                    <!--<td> <?php echo $val['mobile']; ?> </td>-->
                                                    <td> <?php echo date($val['next_call_date']); ?> </td>
                                                    <td> <?php echo $val['next_call_time']; ?> </td>
                                                    <!--<td> <?php echo $val['notes']; ?> </td>-->
                                                    <!--<td> <?php if($val['type']== 'I') echo "N/A"; else echo $val['con']; ?> </td>-->
                                                    <!--<td> <?php echo ($val['address_line1'] != '' ? $val['address_line1'] . ', ' : '') . ($val['address_line2'] != '' ? $val['address_line2'] . '<br>' : '') . ($val['name'] != '' ? $val['name'] . ', ' : '') . ($val['state_name'] != '' ? $val['state_name'] . ', ' : '') . ($val['city_name'] != '' ? $val['city_name'] . ' - ' : '') . ($val['postal_code'] != '' ? $val['postal_code'] : ''); ?> </td>--> 

<!--                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <?php if($val['revenue']){ ?>
                                                                     <a href="<?php echo $base_url; ?>client-master/viewPreviousRevenue/<?php echo base64_encode($val['client_seq_no']); ?>">
                                                                        <i class="icon-docs"></i> View Revenue </a>
                                                                    <?php }else{ ?>
                                                                     <a href="<?php echo $base_url; ?>client-master/addPreviousRevenue/<?php echo base64_encode($val['client_seq_no']); ?>">
                                                                        <i class="icon-docs"></i> Add Revenue </a>
                                                                    <?php } ?>
                                                                   
                                                                </li>
                                                                <?php // if($val['type']== 'O'){ ?>
                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>client-master/add_contact/<?php echo base64_encode($val['client_seq_no']); ?>/<?php echo base64_encode($val['firm_seq_no']); ?>">
                                                                        <i class="icon-docs"></i> Add Contact </a>
                                                                </li>
                                                                <?php // } ?>
                                                                  <?php if($val['con']){ ?>
                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>client-master/view_contact/<?php echo base64_encode($val['client_seq_no']); ?>/<?php echo base64_encode($val['id']); ?>">
                                                                        <i class="icon-docs"></i> View Contacts </a>
                                                                </li>
                                                                  <?php } ?>
                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>client-master/details/<?php echo base64_encode($val['client_seq_no']); ?>/read/<?php echo base64_encode($val['id']); ?>">
                                                                        <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <?php if ($role_code == 'FIRMADM' || $role_code == 'ATTRMGR' || $role_code == 'ATTR') { ?>
                                                                    <li>
                                                                        <a href="<?php echo $base_url; ?>client-master/details/<?php echo base64_encode($val['id']); ?>">
                                                                            <i class="icon-docs"></i> Edit </a>
                                                                    </li>
                                                                <?php } ?>

                                                                                                                            <li>
                                                                                                                                <a href="<?php echo $base_url; ?>client-master/delete/<?php echo base64_encode($value['client_seq_no']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                                                                                    <i class="icon-tag"></i> Delete </a>
                                                                                                                            </li>
                                                            </ul>
                                                        </div>
                                                    </td>-->
                                                </tr>
<?php } ?>
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
       
            <!-- END QUICK SIDEBAR -->
            <!---------IMPORT EXCEL FORM---------->

           <div id="responsive_file" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Import Clients</h4>
                        </div>
                        <form autocomplete="off" name="import_client_form" id="import_client_form" action="<?php echo $base_url; ?>client_master/import_file" method="post" enctype="multipart/form-data">
                            
                            <div class="modal-body">
                                <div class="scroller" style="height:100px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <?php if($role_code == 'SITEADM') {?>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Company:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control"  name="company_seq_no" id="company_seq_no">
                                                        <option value="">Select One</option>
                                                            <?php foreach ($all_company as $key => $value) {
                                                                ?>
                                                            <option value="<?php echo $value['company_seq_no']; ?>"><?php echo $value['company_name']; ?></option>
                                                            <?php }   ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">File</label>
                                                    <div class="col-md-8">
                                                        <input style=" border:none; padding-top: 0;" type="file" class="form-control" name="xls_file" id="xls_file" required="">
                                                        <span class="help-block">  </span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" name="import_client_submit" id="import_client_submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>
   
   <script type="text/javascript">
            $(document).ready(function () {
                //for stop loader after complete page load
                $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
                });
                //end


            });

        </script>
   
    <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";  </script>
    <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/client_add_edit.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
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

.table-scrollable .dataTable td .btn-group, .table-scrollable .dataTable th .btn-group {
    position: relative;
    margin-top: -2px;
    display: inline-table;
    left: auto;
}

table.dataTable {
    width: 100%;
    margin: 0 auto;
    clear: both;
    border-collapse: separate;
    border-spacing: 0;
    padding-bottom: 80px;
}
		
		.table-scrollable>.table-bordered>tbody>tr:last-child>td {
    border-bottom: 1px solid #e7ecf1;
}
 
            
        </style>
        
    </body>

</html> 