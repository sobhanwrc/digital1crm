<!DOCTYPE html>
<?php
//$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;
//$page = $_SERVER['PHP_SELF'];
//$sec = "10";
?>
<html lang="en">
    <head>
<!--        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $url?>'">-->
    </head>
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

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
                                <span>Module 1</span>
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
                                <span class="caption-subject bold uppercase">Master Contact List</span>
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
                        <div class="portlet-body" id="auto_load_div">
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
                                
                            </div>
                            <?php //if($role_code=='SITEADM'){ ?>
<!--                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-3"></div>
                                        <form action="<?php echo $base_url; ?>targets/fetchTargets" method="post" name="firm_list_form" id="firm_list_form">
                                            <div class="col-md-3">
                                                <select class="form-control" name="fimrs">
                                                    <option value="">Select a Firm</option>
                                                    <option value="all">All</option>
                                                    <?php foreach ($firms as $key => $value) { ?>
                                                    <option value="<?php echo $value['firm_seq_no']; ?>" <?php if($firm_id==$value['firm_seq_no']){ ?> selected="" <?php } ?>><?php echo $value['firm_name']; ?></option>                                         
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
                            </div>-->
                            <?php //} ?>
                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                <thead>
                                    <tr class="">
                                        <th> SL# </th>
                                        <?php //if($role_code=='SITEADM'){ ?>
                                        <!--<th> Firm Name </th>-->
                                        <?php //} ?>
                                        <th> Name </th>
                                        <th> Email</th>
                                        <th> Company Name </th>
                                        <th> Company Address </th>
                                        <th> Phone Number </th>
                                        <th> Mobile Number </th>
<!--                                         <th> No. Of Contacts </th>-->
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $SlNo = 1;
                                    foreach($fetch_details_master_contacts as $key => $value){ //t($value);die() ;
                                        $id = $value['target_seq_no'];
                                        $company = $value['company_id'];
                                        
//                                        $firm_id = $value['firm_seq_no'];
                                        $admin_id = $admin_id;
                                        
                                        $ci =&get_instance();
                                        $ci->load->model('temorary_module_lock');

                                        $cond = " AND admin_id!=$admin_id AND company_id=$company AND id=$id";
                                        $fetch_temporary_details = $ci->temorary_module_lock->fetch($cond);
//                                        $ci->db->last_query();
//                                        t($fetch_temporary_details);die();
                                        
                                ?>
                                    <tr style=" cursor: pointer" onclick="javascript:window.location.href='<?php if(!empty($fetch_temporary_details)){ }else{echo $base_url; ?>targets/view_details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']);} ?>'">
                                        <td> <?php echo $SlNo++; ?>  <?php if(!empty($fetch_temporary_details)){?> <span style="color:red" class="glyphicon glyphicon-lock"></span> <?php } ?> </td>
                                        <?php //if($role_code=='SITEADM'){ ?>
                                        <!--<td> <?php echo $value['firm_name']; ?> </td>-->
                                        <?php //} ?>
                                        <!--<td><a href="<?php echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']); ?>"> <?php if($value['target_first_name']== '' && $value['target_last_name']== '') echo "no data"; else  echo $value['target_first_name'] . ' ' . $value['target_last_name']; ?></a></td>-->
                                        <td>  <?php echo $value['target_first_name'].' '.$value['target_last_name'] ; ?></td>
                                        <td>  <?php echo $value['email'] ; ?></td>
                                        <td> <?php echo $value['company'] ; ?> </td>
                                        <td> <?php echo $value['address']; ?> </td>
                                        <td> <?php echo $value['phone'] ; ?> </td>
                                        <td> <?php echo $value['mobile'] ; ?> </td>
                                         <!--<td> <?php if($value['type']== 'I') echo "N/A"; else echo $value['con']; ?> </td>-->
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                
                                                <ul class="dropdown-menu" role="menu">
                                                    <!-- <li>
                                                        <a href="http://dev.wrctechnologies.com/ams/case/index">
                                                            <i class="icon-docs"></i> Case
                                                        </a>
                                                    </li> -->
                                                     <li>
                                                        <a href="<?php if(!empty($fetch_temporary_details)){ }else{echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']);} ?>" >
                                                            <i class="icon-docs"></i> View </a>
                                                    </li>
                                                    <?php if(($role_code == 'FIRMADM' || $role_code == 'ATTR')){?>
                                                    <?php if(($value['association_status'] == 'NEW TARGET') || ($value['association_status'] == 'TS-INTERIM')){ ?>
                                                    
                                                    <li>
                                                        <a href="<?php echo $base_url; ?>targets/edit/<?php echo base64_encode($value['target_seq_no']); ?>">
                                                            <i class="icon-tag"></i> Edit
                                                        </a>
                                                    </li>
                                                     <?php if($value['type']== 'O'){ ?>
                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>targets/add_contact/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']); ?>">
                                                                        <i class="icon-docs"></i> Add Contact </a>
                                                                </li>
                                                                <?php } ?>
                                                                  <?php if($value['con']){ ?>
                                                                <li>
                                                                    <a href="<?php echo $base_url; ?>targets/view_contact/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']); ?>">
                                                                        <i class="icon-docs"></i> View Contacts </a>
                                                                </li>
                                                                  <?php } ?>
                                                     <?php } ?>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="icon-tag"></i> Delete </a>
                                                    </li>
                                                    <?php }?>
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
                                            </div>
                                        </td>
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
      <!---------IMPORT EXCEL FORM---------->
           <div id="responsive_file" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Import Targets</h4>
                        </div>
                        <form autocomplete="off" name="import_target_form" id="import_target_form" action="<?php echo $base_url; ?>targets/contacts_import" method="post" enctype="multipart/form-data">
                            
                            <div class="modal-body">
                                <div class="scroller" style="height:100px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <?php if($role_code == 'FIRMADM') {?>
<!--                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Attorney:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control"  name="attorney_seq_no">
                                                        <option value="">Select One</option>
                                                            <?php foreach ($all_attr as $key => $value) {
                                                                ?>
                                                            <option value="<?php echo $value['attorney_seq_no']; ?>"><?php echo $value['attorney_first_name'] . ' ' . $value['attorney_last_name']; ?></option>
                                                            <?php }   ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>-->
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
                                <button type="submit" name="import_target_submit" id="import_target_submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
    <!-- END QUICK SIDEBAR -->
   
</div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
    <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>"; </script>
    <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_path; ?>custom/js/validate/target_add_edit.js" type="text/javascript"></script>
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
    <script type="text/javascript">
        var URL = '<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>';
        $(document).ready(function(){
            setInterval(function()
            {
                $('#auto_load_div').load(document.URL +  ' #auto_load_div');
            }, 15000);
            
        });
        
    </script>
    
    </body>

</html> 