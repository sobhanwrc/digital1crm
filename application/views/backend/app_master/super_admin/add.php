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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Super User </a>
                                <i class="fa fa-circle"></i>
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
                                        <span class="caption-subject bold uppercase">Super User</span>
                                    </div>
                                  

                                </div>
                                
                                 <?php if($this->session->flashdata('suc_message')){ ?>
                        <div class="row-fluid">
                                <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span class="alert-link"><?php echo $this->session->flashdata('suc_message'); ?></span>
                                </div>
                        </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('err_message')){ ?>
                    <div class="row-fluid">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="alert-link"> <?php echo $this->session->flashdata('err_message'); ?></span>
                        </div> 
                    </div>
                    <?php } ?>
                                
                                <form action="<?php echo $base_url; ?>super-admin/edit" name="superadmin_form1" autocomplete="off" id="superadmin_form1" method="post" class="superadmin_form1">
                       
                          
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Username:</label>
                                            <div class="col-md-8">
                                                <input type="text"  name="username" class="form-control" placeholder="Enter Username" id="username" value="<?php echo $det[0]['username']; ?>">

                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                      
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Password:</label>
                                            <div class="col-md-8">
                                                <input type="password"  name="password" id="password" class="form-control" placeholder="********">
                                                <span class="help-block">  </span>
                                            </div>
                                        </div>
                                        


                                    </div>
                               
                            </div>
                       
                        
                            
                            <button type="submit" class="btn green superadmin_submit1" id="superadmin_submit1" name="superadmin_submit1" style=" margin-left: 20px;">Save</button>
                        
                    </form>
                                
                                
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <?php echo $footer_link; ?>
        
        
        
        <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/validate/firm_codes_add.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/firm_codes_add.js"></script>
    </body>

</html>  