<!DOCTYPE html>

<html lang="en">
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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo base_url()?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                           <!-- <li>
                                <a href="#">Activity </a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Module 8</span>
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
                                        <span class="caption-subject bold uppercase">Module 8 List</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL NO </th>
                                                 <th> Name </th>
                                                 <th> Email  </th>
                                                <th> Company Name </th>
                                                <th> Phone Number </th>
                                                <th> Payment Date </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($result_details as $key => $value) {
//                                                t($all_activity); exit; ?>
                                                <tr style=" cursor: pointer" onclick="javascript:window.location.href='<?php echo $base_url;?>testimonial/details/<?php echo base64_encode($value['target_seq_no']); ?>'">
                                                    <?php $i = 0 ; ?>
                                                    <td><?php echo ++$i; ?> </td>
                                                    <td <?php if($value['type'] == 'I'){ ?> class="border_show" <?php }?>> <?php echo $value['name']; ?> </td>
                                                    <td> <?php echo $value['email']; ?> </td>
                                                    <td <?php if($value['type'] == 'C'){ ?> class="border_show" <?php }?>> <?php echo $value['company_name']; ?> </td>
                                                    <td> <?php echo $value['phone']; ?> </td>
                                                    <td> <?php echo $value['payment_date']; ?> </td>

                                                </tr>
                                            <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
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
</style>
    <script type="text/javascript">
            $(window).load(function() {
    //              $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
                });
    </script>

</html>
