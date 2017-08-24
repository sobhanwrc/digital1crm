<!DOCTYPE html>

<html lang="en">
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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Clients</a>
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
                                        <!--<span class="caption-subject bold uppercase">Client Contact List<small style="margin-left: 10px;">For Organization <?php echo $name[0]['client_company_name'];?></small></span>-->
                                        <span class="caption-subject bold">Contact List For Organization <?php echo $name[0]['client_company_name'];?></span>
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
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style=" padding-left: 0">
                                                <?php if ($role_code == 'FIRMADM' || $role_code == 'ATTRMGR' || $role_code == 'ATTR') { ?>
                                                    <div class="btn-group">
                                                        <a href="<?php echo $base_url; ?>client-master/add_cont" class="btn btn-outline sbold" data-toggle="modal" > 
                                                            <button class="btn sbold green"> Add More
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
<!--                                                <div class="btn-group">
                                                        <a href="#responsive_file" class="btn btn-outline sbold" data-toggle="modal" > 
                                                            <button class="btn sbold green"> Import
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>-->
                                                <?php } ?>
                                            </div>
                                        </div>
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
                                                
                                                <th> First Name </th>
                                                 <th> Last Name </th>
                                                <th> Designation </th>
                                                <th> Phone </th>
                                                <th> Email </th>
                                                <th> Fax </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($all_contact as $key => $val) { ?>
                                                <tr>
                                                    <td> <?php echo ++$i; ?> </td>
                                                  
                                                    <td> <a href="<?php echo $base_url; ?>client-master/con_view/<?php echo base64_encode($val['contact_seq_no']); ?>"> <?php echo $val['first_name']; ?> </a></td>
                                                 
                                                    <td><a href="<?php echo $base_url; ?>client-master/con_view/<?php echo base64_encode($val['contact_seq_no']); ?>">  <?php echo $val['last_name']; ?></a> </td>
                                                    <td> <?php echo $val['designation']; ?> </td>
                                                    <td> <?php echo $val['phone']; ?> </td>
                                                  <td> <?php echo $val['email']; ?> </td>
                                                    <td> <?php echo $val['fax']; ?> </td>
                                                    <td>
                                                        <div class="btn-group" style="width: 100px;">
                                                        <a href="<?php echo $base_url; ?>client_master/con_edit/<?php echo base64_encode($val['contact_seq_no']); ?>" class="btn btn-xs green sbold">Edit</a>
                                                        </div>
                                                        </td>

                                                    
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
           
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
<?php echo $footer_link; ?>
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
            
        </style>
        
    </body>

</html> 