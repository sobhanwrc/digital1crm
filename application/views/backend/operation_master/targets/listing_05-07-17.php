<!DOCTYPE html>
<?php
//$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;
//$page = $_SERVER['PHP_SELF'];
//$sec = "10";
?>
<html lang="en">
    <head>
<!--        <meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $url ?>'">-->
    </head>
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

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
                                <a href="<?php echo base_url() ?>">Home</a>
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

                                </div>
                                <div class="portlet-body" id="auto_load_div">

                                    <div style="width: 100%; position: relative; padding-left: 0%; top:6px;">
                                        <?php if ($firm_id == '1' || $firm_id == '108') { ?>
                                            <span style="  margin-bottom: 10px; text-align: right; display: inline-block">
                                                <button type="button" class="btn btn-transparent dark btn-outline btn-circle active" data-toggle="modal" data-id="" data-industry-id="" data-target="" id="add_to_module4">Add To Module 4</button>
                                            </span>
                                        <?php } ?>
                                    </div>
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

                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">

                                        <thead>
                                            <tr class="">
                                                <th></th>
                                                <th> SL# </th>

                                                <th> Name </th>
                                                <th> Company Name </th>
                                                <th> Email</th>

                                                <th> Phone Number </th>
                                                <th> Mobile Number </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $SlNo = 1;
                                            foreach ($fetch_details_master_contacts as $key => $value) { //t($value);die() ;
                                                $id = $value['target_seq_no'];
                                                $company = $value['firm_seq_no'];

                                                //                                        $firm_id = $value['firm_seq_no'];
                                                $admin_id = $admin_id;
                                                $ci = &get_instance();
                                                $ci->load->model('temorary_module_lock');

                                                $cond = " AND admin_id!=$admin_id AND company_id=$company AND id=$id";
                                                $fetch_temporary_details = $ci->temorary_module_lock->fetch($cond);
                                                //                                        $ci->db->last_query();
                                                //                                        t($fetch_temporary_details);die();
                                                ?>
<<<<<<< .mine
                                                <!--  comment due to contacts added to module4 from module1 operation --> 
                                                <tr style=" cursor: pointer <?php if ($value['status'] == "3") { ?>; background-color: #ff5454; color: white; <?php } ?>" onclick="javascript:window.location.href = '<?php if(!empty($fetch_temporary_details || $value['status'] == "3")) {
                                                    
                                                } else {
                                                    echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']);
                                                } ?>'"> 
=======
                                                    <!-- <tr style=" cursor: pointer <?php if($value['status'] == "3") { ?>; background-color: #ff5454; color: white; <?php } ?>" onclick="javascript:window.location.href='<?php if(!empty($fetch_temporary_details || $value['status'] == "3")){ }else{echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']);} ?>'"> -->
>>>>>>> .r21680
<<<<<<< .mine

                                                <tr style=" cursor: pointer <?php if ($value['status'] == "3") { ?>; background-color: #ff5454; color: white; <?php } ?>" >
                                                    <td>
                                                        <div class="cBox cBox-teal cBox-inline">
                                                            <input type="checkbox" value="<?php echo $value['target_seq_no']; ?>" name="check[]" id="examplecBox" class="myCheckbox">
                                                            <label for="examplecBox"></label>
                                                        </div>
                                                    </td>
                                                    <td> <?php echo $SlNo++; ?>  <?php if (!empty($fetch_temporary_details)) { ?> <span style="color:red" class="glyphicon glyphicon-lock"></span> <?php } ?> </td>
    <?php //if($role_code=='SITEADM'){  ?>
                                                    <!--<td> <?php echo $value['firm_name']; ?> </td>-->
    <?php //}  ?>
                                                    <!--<td><a href="<?php echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']); ?>"> <?php if ($value['target_first_name'] == '' && $value['target_last_name'] == '') echo "no data";
    else echo $value['target_first_name'] . ' ' . $value['target_last_name']; ?></a></td>-->
                                                    <td <?php if ($value['type'] == "I") { ?> class="border_show" <?php } ?>>  <?php echo $value['target_first_name'] . ' ' . $value['target_last_name']; ?></td>
=======
                                                    <tr style=" cursor: pointer <?php if($value['status'] == "3") { ?>; background-color: #ff5454; color: white; <?php } ?>" onclick="javascript:window.location.href='<?php if(!empty($fetch_temporary_details || $value['status'] == "3")){ }else{echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']);} ?>'">
                                                        <td>
                                                            <div class="cBox cBox-teal cBox-inline">
                                                                <input type="checkbox" value="<?php echo $value['target_seq_no'];?>" name="check[]" id="examplecBox" class="myCheckbox">
                                                                <label for="examplecBox"></label>
                                                            </div>
                                                        </td>
                                                        <td> <?php echo $SlNo++; ?>  <?php if(!empty($fetch_temporary_details)){?> <span style="color:red" class="glyphicon glyphicon-lock"></span> <?php } ?> </td>
                                                        <?php //if($role_code=='SITEADM'){ ?>
                                                        <!--<td> <?php echo $value['firm_name']; ?> </td>-->
                                                        <?php //} ?>
                                                        <!--<td><a href="<?php echo $base_url; ?>targets/details/<?php echo base64_encode($value['target_seq_no']); ?>/<?php echo base64_encode($value['firm_seq_no']); ?>"> <?php if($value['target_first_name']== '' && $value['target_last_name']== '') echo "no data"; else  echo $value['target_first_name'] . ' ' . $value['target_last_name']; ?></a></td>-->
                                                        <td <?php if($value['type'] == "I") { ?> class="border_show" <?php } ?>>  <?php echo $value['target_first_name'].' '.$value['target_last_name'] ; ?></td>
>>>>>>> .r21680

                                                    <td <?php if ($value['type'] == "C") { ?> class="border_show" <?php } ?> > <?php echo $value['company']; ?> </td>
                                                    <td>  <?php echo $value['email']; ?></td>
                                                    <td> <?php echo $value['phone']; ?> </td>
                                                    <td> <?php echo ($value['mobile'] ? $value['mobile'] : 'N/A'); ?> </td>
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
                                            <?php if ($role_code == 'FIRMADM') { ?>
                                                <!--                                            <div class="form-group required">
                                                                                                <label class="col-md-4 control-label">Attorney:</label>
                                                                                                <div class="col-md-8">
                                                                                                    <select class="form-control"  name="attorney_seq_no">
                                                                                                        <option value="">Select One</option>
    <?php foreach ($all_attr as $key => $value) {
        ?>
                                                                                                                <option value="<?php echo $value['attorney_seq_no']; ?>"><?php echo $value['attorney_first_name'] . ' ' . $value['attorney_last_name']; ?></option>
                                                <?php } ?>
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
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
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

<<<<<<< .mine
        </style>
        <script type="text/javascript">
            $('#add_to_module4').on('click', function() {
                var checked_ids = [];
                $("input[name='check[]']:checked").each(function(i) {
                    checked_ids[i] = $(this).val();
                });
                checked_ids = JSON.stringify(checked_ids);
                checked_ids = JSON.parse(checked_ids);
                var checked_ids_length = $("input[name='check[]']:checked").length;
                if (checked_ids_length > 0) {
                    $.ajax({
                        type: "POST",
                        url: BASE_URL + "Targets/add_to_module4",
                        data: {
                            checked_ids: checked_ids,
                        },
                        success: function(data) {
                            alert(data);
                            console.log(data);
                            if (data == 1) {
                                jconfirm({
                                    title: 'Success!',
                                    content: 'Contacts are added to module 4 successfully.',
                                    buttons: {
                                        OK: function() {
                                            window.location.href = BASE_URL + 'contacts_list';
=======
    </style>
    <script type="text/javascript">

        $('#add_to_module4').on('click',function(){
                    var checked_ids = [];
                    $("input[name='check[]']:checked").each(function (i) {
                        checked_ids[i] = $(this).val();
                    });
                    checked_ids = JSON.stringify(checked_ids);
                    checked_ids = JSON.parse(checked_ids);
                    var checked_ids_length = $("input[name='check[]']:checked").length;
                    
                    if(checked_ids_length > 0){
                        $.ajax({
                            type:"POST",
                            url:BASE_URL + "Contacts_list/add_to_module4",
                            data:{
                                checked_ids: checked_ids,
                            },
                            success: function(data){
                                alert(data);
                                console.log(data);
                                if(data == 1){
                                    jconfirm({
                                        title: 'Success!',
                                        content: 'Contacts are added to module 4 successfully.',
                                        buttons: {
                                            OK: function() {
                                                window.location.href = BASE_URL + 'contacts_list';
                                            }
>>>>>>> .r21680
                                        }
                                    }
                                });
                                return false;
                            }
                            if (data == 0) {
                                jconfirm({
                                    title: 'Alert!',
                                    content: 'Some Error!!',
                                    buttons: {
                                        OK: function() {
                                            window.location.href = BASE_URL + 'contacts_list';
                                        }
                                    }
                                });
                                return false;
                            }
                        }
                    });
                } else {
                    jconfirm({
                        title: 'Notification:',
                        content: 'No contact is selected. Please select at least one contact.',
                        confirmButton: 'Ok'
                    });
                    return false;
                }
            });

<<<<<<< .mine
            $(window).load(function() {
    //                    $("#loader_image").hide();
                $('#loader_image').delay(2000).fadeOut(1000)
            });
=======

        $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
        });
>>>>>>> .r21680

<<<<<<< .mine
            var URL = '<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>';
            $(document).ready(function() {
=======
        var URL = '<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>';
        $(document).ready(function(){
          /*  setInterval(function()
            {
                $('#sample_1').load(document.URL +  ' #sample_1');
>>>>>>> .r21680

            }, 6000);*/

<<<<<<< .mine
=======

        });
>>>>>>> .r21680

            });

        </script>

    </body>

</html>
