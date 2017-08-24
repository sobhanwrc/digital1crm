<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Attorney Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <!--<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo $assets_path; ?>global/plugins/font-awesome/css/font-awesome.min.css"rel="stylesheet" type="text/css" />
        <link href="<?php echo $assets_path; ?>global/plugins/simple-line-icons/simple-line-icons.min.css"rel="stylesheet" type="text/css" />
        <link href="<?php echo $assets_path; ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $assets_path; ?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $assets_path; ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo $assets_path; ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $assets_path; ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo $assets_path; ?>global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $assets_path; ?>global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo $assets_path; ?>pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!--<script src="<?php echo $assets_path; ?>pages/css/login.min.css" ></script>-->
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
    </head>
    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo $assets_path; ?>pages/img/Perform_Law.png" alt="" /> 
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN FORGOT PASSWORD TEMPLATE -->
             <p style="margin-bottom: 20px; text-align: left;"> 
                        Hi, !!!#fname#!!!
 
                        </p>
                        <p style="margin-bottom: 20px; text-align: left;"> 
                         A request to reset the password for your account has been made at Attorney Management System. If you have made this request, please follow the instructions below.
 
                        </p>
                        <!-- <p style="text-align: left;"> 
                          Click on link to setup a new password.
                        </p> -->    
                        <a style="background-color: #41c4dc; -moz-border-radius: 6px; -webkit-border-radius: 6px; border-radius: 6px; border: 1px solid #41c4dc; display: inline-block; color: #ffffff; font-family: arial; font-size: 15px; font-weight: bold; padding-top: 6px; padding-left: 24px; padding-right: 24px; padding-bottom: 6px; margin-bottom: 40px; text-decoration: none;" target="_blank" href="!!!#link_url#!!!" class="classname">
                          Reset Your Password
                        </a>
                        <p style="text-align: left;">
                          In case the above link doesn't work, please copy-paste the url below in your browser's address bar:<br />
                          <br>!!!#link_url#!!!<br><br/>
                        </p>
            <!-- END FORGOT PASSWORD TEMPLATE -->
        </div>
        <div class="copyright"> 2016 © Attorney Management System. </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo $assets_path; ?>custom/js/jquery-ui.min.js"></script>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>"; </script>
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/validate/registration.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo $assets_path; ?>global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $assets_path; ?>pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
        </script>
    </body>

</html>