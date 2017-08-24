<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>DIGITAL1 CRM</title>
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
        <style>
		.login .content {
    background-color: #eceef1;
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    -ms-border-radius: 7px;
    -o-border-radius: 7px;
    border-radius: 7px;
    width: 515px;
    margin: 3% auto 10px;
    padding: 5px 30px 30px;
    overflow: hidden;
    position: relative;
}
			
			.login .content .form-actions .btn-default {
    font-weight: 600;
    padding: 5px 25px !important;
    color: #6eaa0c;
    background-color: #fff;
    border: 1px solid #ddd;
}
			
div.checker, div.radio {
margin-right: 0;
margin-left: 3px;
width: 20px;
display: inline-block;
}
		</style>
          
    </head>
    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN LOGIN -->
        <div class="content">
           
           <div class="logo">
            <a href="">
                <img src="<?php echo $assets_path; ?>pages/img/digital.jpg" alt="" /> 
            </a>
        	</div>
            <!-- BEGIN REGISTRATION FORM -->
<!--            <form class="register-form1" id="registration-form" action="<?php echo base_url(); ?>registration/submit" method="post">-->
<!--                <h3 class="font-green">Sign Up</h3>-->
                <p class="hint"> Enter your personal details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">First Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="fname" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="lname" /> </div>
                
                <p class="hint"> Enter your address details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Address</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address" name="address" /> </div>
                
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Country</label>
                    <select name="country" id="country" class="form-control country">
                      <!--<option value="">Country</option>-->
                      </select>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">State</label>
                    <select name="state" id="state" class="form-control">
                        <option value="">State</option>
                    </select>
                </div>
<!--                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">County</label>
                    <select name="county" id="county" class="form-control">
                        <option value="">County</option>
                    </select>
                </div>-->
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">City/Town</label>
                    <select name="city" id="city" class="form-control">
                        <option value="">City/Town</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Postal Code</label>
                   <input type="text" placeholder="Postal Code" class="form-control"  name="postal_code" id="postal_code"/>
                </div>

                <p class="hint"> Enter your account details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" /> </div>
                <div class="form-group margin-top-20 margin-bottom-20">
                    <label class="check">
                        <input type="checkbox" name="tnc" /> I agree to the
                        <a href="javascript:;"> Terms of Service </a> &
                        <a href="javascript:;"> Privacy Policy </a>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div>
                <div class="form-actions">
                    <a href="<?php echo $base_url; ?>login"><button type="button" id="register-back-btn1" class="btn btn-default">Back</button></a>
                    <button type="submit" id="register-submit-btn" class="btn green uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
        </div>
        <div class="copyright"> 2017 © digital1crm </div>
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