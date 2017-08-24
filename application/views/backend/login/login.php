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
    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->

        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">

            <div class="logo">
                <a href="">
                    <img src="<?php echo $assets_path; ?>pages/img/digital.jpg" alt="" /> 
                </a>
            </div>

            <!-- BEGIN LOGIN FORM -->
            <form name="login_form_validate" id="login_form_validate" method="post" action="<?php echo base_url() ?>login/submit">

<!--                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>-->
                <!--<div id="form-messages" class="alert alert-danger" role="alert">-->
                <!--</div>-->
                <div id="message">
                    <?php echo $this->session->flashdata('err_message'); ?>
                    <?php echo $this->session->flashdata('suc_message'); ?>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input type="text" autocomplete="off" id="username" placeholder="Username" name="username" class="form-control form-control-solid placeholder-no-fix" value="<?php echo $_COOKIE['remember_me']; ?>"/> 
                    
                </div>

                <div class="form-group" id="select_company">
                    <label class="control-label visible-ie8 visible-ie9">Select Company</label>
                    <!--<input class="form-control form-control-solid placeholder-no-fix" type="" autocomplete="off" placeholder="Select Company" name="password" />--> 
                    <select name="company_id" id="company_id">
                        <option value="">Select Company</option>

                    </select>
                    
                    <label id="company_id-error" class="error" for="company_id" genareted="true"></label>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
                </div>



                <div class="form-group">
                    <!--<a href="http://dev.wrctechnologies.com/ams/dashboard/index">-->
                    <button type="button" id="login_submit" class="btn green uppercase" style="margin-top: -16px;">Login</button>
                    <!--</a>-->
                    <label class="rememberme check">
                        <input type="checkbox" name="remember" <?php
                        if (isset($_COOKIE['remember_me'])) {
                            echo 'checked="checked"';
                        } else {
                            echo '';
                        }
                        ?>  /> Remember
                    </label>
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>

                <div class="create-account">
                    <p>
                        <a href="<?php echo $base_url; ?>registration" id="register-btn1" class="uppercase">Create an account</a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="<?php echo $base_url; ?>login/forgot_password" method="post" id="forget_password_form">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right" id="forgot_password_submit" name="forgot_password_submit" value="submit">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
        </div>
        <div class="copyright"> 2017 © digital1crm </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo $assets_path; ?>global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo $assets_path; ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!--<script src="<?php echo $assets_path; ?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>-->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        
        
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


        <style>

            div.checker, div.radio {
                margin-right: 0;
                margin-left: 3px;
                width: 20px;
                display: inline-block;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#select_company').hide();

                $('#username, #password').change(function () {
                    var user_id = $(this).val();
            $('#login_submit').prop('disabled',true);   
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $base_url . 'login/check_digital1_staff'; ?>",
                        data: {
                            user_id: user_id
                        },
                        success: function (data) {
                            var obj = $.parseJSON(data);
                            $('#company_id').find('option').not(':first').remove();
                
                            if (obj.length > 0) {
                                $('#select_company').show();

                                for (var i = 0; i < obj.length; i++) {

                                    $('#company_id').append('<option value="' + obj[i].firm_seq_no + '">' + obj[i].firm_name + '</option>');
                                }
                            }
                            else {
                                $('#select_company').hide();
                            }
                $('#login_submit').prop('disabled',false);
                        }
                    })
                });
                $('#login_submit').on('click',function(){
                    var valid = $('#login_form_validate').valid();
                    if(valid){
                        $('#login_form_validate').submit();
                    }
                    
                });
                $('#login_form_validate').validate({
                    rules: {
                        username:{
                            required: true
                        },
                        password:{
                            required: true
                        },
                        company_id:{
                            required: true
                        }
                    },
                    messages: {
                        username: {
                            required: "<font color=\"red\">Please enter your User name!</font>"
                        },
                        password: {
                            required: "<font color=\"red\">Please enter your password!</font>"
                        },
                        company_id: {
                            required: "<font color=\"red\">Please select any one company!</font>"
                        }
                    }
                });
                    
                
            });
        </script>

    </body>

</html>
