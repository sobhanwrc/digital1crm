<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <!-- END HEAD -->
    <link href="<?php echo $assets_path; ?>layouts/layout/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
    <style>
        .note-editor .note-editable {
            outline: 0 none;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            padding: 10px;
        }

        .add_form_sec h3 {
            font-size: 18px !important;
            width: 100%;
            height: 30px;
            margin-bottom: 0 !important;
            margin-top: 0 !important;
            text-align: left;
            padding-left: 0 !important;
        }	

        .add_input_edit_area {
            margin: 0;
            width: 100%;
            display: inline-block;
            height: 300px;
            transition : height 1s linear;
        }

        .add_input_edit_area.short{

            height : 300px;
        }

        .caption .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }

        .add_input_edit_area h3 {
            font-size: 18px !important;
            width: 100%;
            height: 30px;
            margin-bottom: 0 !important;
            margin-top: 0 !important;
            text-align: left;
            padding-left: 0 !important;
        }
        .portlet.light .portlet-body {
            padding-top: 0;
        }

        .form-group {
            margin-bottom: 0;
        }

        .dropdown-menu {
            box-shadow: 5px 5px rgba(102,102,102,.1);
            left: -50px;
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
            margin-bottom: 50px;

        }

        .btn-group > .dropdown-menu::before, .dropdown-toggle > .dropdown-menu::before, .dropdown > .dropdown-menu::before {
            position: absolute;
            top: -8px;
            left: 55px;
            right: auto;
            display: inline-block !important;
            border-right: 8px solid transparent;
            border-bottom: 8px solid #e0e0e0;
            border-left: 8px solid transparent;
            content: '';
        }

        .btn-group > .dropdown-menu::after, .dropdown-toggle > .dropdown-menu::after, .dropdown > .dropdown-menu::after {
            position: absolute;
            top: -7px;
            left: 54px;
            right: auto;
            display: inline-block !important;
            border-right: 7px solid transparent;
            border-bottom: 7px solid #fff;
            border-left: 7px solid transparent;
            content: '';
        }

        #div1 {
            height: 1px;
            width: 100%;
            background: #fff;
            text-align: left;
            transition : height 1s linear;
            margin-bottom: 30px;
            overflow: hidden;
            display: inline-block;
            /*	border-bottom: 1px solid #e7ecf1 !important;*/
        }

        .control-label {
            margin-top: 6px;
            font-weight: 400;
        }

        #div1.short{

            height: 1000px;
            margin-bottom: 30px;
        }
        .add_input_edit_area .form-control {
            height: 40px;
            margin-bottom: 8px;
            float: left;
        }

        .portlet.light .dataTables_wrapper .dt-buttons {
            margin-top: -38px;
        }



    </style>   



    
    <script>

        var aboutMe = function (x) {
            $(x).toggleClass('short')
        };

        $(function () {
            
            $('#clicker').click(function () {
                aboutMe('#div1');
                if ($(this).find('i').hasClass('fa-angle-down')) {
                    $(this).find('i').removeClass('fa-angle-down');
                    $(this).find('i').addClass('fa-angle-up');
                } else {
                    $(this).find('i').addClass('fa-angle-down');
                    $(this).find('i').removeClass('fa-angle-up');
                }
            });
        });




    </script>

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
                    <div class="page-bar" style=" position: relative">
                        <div class="col-md-8">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Send Email</a>
                                    <!--<i class="fa fa-circle"></i>-->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->

                    <!-- END PAGE HEADER-->


                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">

                <div style=" width: 100%; display: inline-block">
                    <div class="">
                        <form name="ms" id="ms" method="post">  

                            <!-- EMAIL HEADER -->



                            <div class="tab-content bg-light pn mt20">
                                <div class="tab-pane active p15" id="email-compose"> 

                                    <!-- EMAIL COMPOSE -->

                                    <div class="email-compose">

                                        <div id="mydiv" style="margin-left: 356px;"> 
                                            <?php if ($this->session->flashdata('sess_message')) { ?>
                                                <?php echo $this->session->flashdata('sess_message'); ?>
                                            <?php } elseif ($this->session->flashdata('err_message')) { ?>
                                                <?php echo $this->session->flashdata('err_message'); ?>
                                            <?php } ?>
                                        </div>

                                        <div class="row mb5 mt10">

                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="email">To:</label>
                                                    <input type="email" readonly="" class="form-control" id="email" name="email" value="<?php echo $fetch_details[0]['email']; ?>">
                                                </div>
                                                <div class="form-group" style=" margin-top: 15px;">
                                                    <label for="subject">Subject:</label>
                                                    <input type="text" class="form-control" id="subject" name="sub">
                                                </div>
                                                <div class="form-group" style=" margin-top: 15px;">
                                                    <label for="subject">Template Name</label>
                                                     <select id="temp_name" class="form-control" >
                                                       <option value="">Please Select Template Name</option>
                                                         <?php
                                                           foreach($user_login_template as $value)
                                                           {
                                                          ?>
                                                            <option value="<?php echo base64_encode($user_login_template[0]['id']) ;?>"><?php echo $user_login_template[0]['name'] ;?></option>
                                                          <?php } ?>
                                                     </select>
                                                </div>
                                                <div class="form-group" style=" margin-top: 15px;">
                                                    <label for="subject" style=" display: inline-block;     vertical-align: top;
                                                           }">Include Signature:</label>
                                                    <input style=" width: 50px; height: 15px; display:  inline-block" type="checkbox" class="form-control" id="include_signature" name="include_signature" value="1">

                                                    <span><a href="javascript:void(0)" class="a_preview" data-id="<?php echo base64_encode($aid);?>">View Signature</a></span>
                                                </div>
                                                <div class="form-group" style=" margin-top:10px">
                                                    <label for="message">Message:</label>
                                                    <div class="form-group">
                                                        <textarea rows="12" cols="100" id="msg" name="msg" placeholder="Write your message here..." class="ckeditorBox" style="height:300px;width: 300px;"></textarea>
                                                    </div>
                                                    <label id="msg-error" class="error" for="msg" generated="true"></label>
                                                </div>


                                                <div class="form-group">
                                                    <div class="fileinput-new input-group col-md-12" data-provides="fileinput">
                                                       <div class="col-md-4" style="padding-right: 0;">
                                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                        
                                                        <span><a href="javascript:void(0)"  class="a_file">Select document</a></span>
                                                       </div>
                                                       
                                                       <div class="col-md-2" style="padding-left: 0">
                                                        
                                                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-paperclip"></i> Select file</span><span class="fileinput-exists"><i class="glyphicon glyphicon-repeat"></i> Change</span><input type="file" name="file"></span>
                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove"></i> Remove</a>
                                                        <a href="javascript:void(0)" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists" ><i class="glyphicon glyphicon-open"></i> Upload</a>
                                                        
                                                        
                                                       </div>
                                                        

                                                        
                                                    </div>
                                                </div>

                                                <input type="hidden" name="msid" id="msid" value="<?php echo $contact_id; ?>"/>
                                                <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo base64_encode($firm_seq_no); ?>"/>
                                                <input type="hidden" id="target_seq_no" value="<?php echo $target_seq_no ;?>">
                                                <input type="button" id="mailbuttons" name="mailbutton" value="SEND" class="btn btn-primary">
                                                <div id="csv_email_loader1" style="display:none; padding-left:10px; margin-top:2px;"><font color="green"><img src="<?php echo $base_url; ?>assets/upload/image/FhHRx.gif"></font></div>



                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form> 
                        <div class="progress" style="display:none;">
                          <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                            20%
                          </div>
                        </div>
                        <ul class="list-group"><ul>
                    </div>
                </div>



            </div>

            <div class="modal fade" id="modalEmailTemplate" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-sm">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div id="create_event" class=" mt10">
                                            <div class="col-md-12">
                                              <form name="module4_frm_template" id="module4_frm_template" method="POST" novalidate>
                                                
                                                  <div class="form-group">
                                                      <div style="width: 100%"><label>Signature</label></div>
                                                      <div class="input-group" style="width: 100%;">
                                                          <textarea rows="12" cols="200" id="ckeditorBox" name="ckeditorBox" placeholder="Write your message here..." class="editor form-control" style="height:300px;width: 300px;"></textarea>
                                                      </div>
                                                  </div>

                                              </form>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                                            
                                            <button type="button"  class="submit btn btn btn green pull-left" name="btn_template_add_new" id="btn_template_add_new" >Save</button>
                                            <a class="submit btn btn green pull-left" name="module2_add_contact" id="a_signature_cancel" href="javascript:void(0)">Close</a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                             </div>


            <!-- END EXAMPLE TABLE PORTLET-->             
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
       <!-- END CONTENT BODY -->

         <!--multiple document upload model-->

        <div class="modal fade" id="multiple_document_model" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <form name="upload_edit_form" autocomplete="off" id="upload_edit_form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <div class="modal-title"><span style="color:#333" class="glyphicon glyphicon-pencil mr10"></span><b style="color:#333">Attach Document</b></div>
                        </div>
                         <div id="c_b">
                         <table class="table table-striped table-bordered table-hover table-responsive" id="">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                <th> Documents Name </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        
                                         <tbody>
                                         <?php 
                                         $i=0;
                                           foreach($document as $val)
                                            {
                                             $i++; 
                                         ?>
                                            <tr> 
                                                <td><?php echo $i ;?></td>
                                                <td><?php echo $val['document_name'] ;?></td>
                                                <td><input type="checkbox" class="chk-attach" value="<?php echo $val['document_name'];?>" id="chk" name="chkme"></td>
                                            </tr>
                                        <?php } ?>
                                              
                                         </tbody>
                                         
                         </tbody>               
                         </table>
                         </div>
                        
                        <div class="modal-footer">
                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                            <div class="input-group col-md-12 pull-right" style="padding-right:15px">
                                <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel" name="" id="cancel_document_submit">
                                <input type="button" value="Upload" class="submit btn green pull-right" name="update_document_submit" id="update_document_submit" >
                                
                                <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
       <!--model end-->



    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
</div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?php echo $footer; ?>
            <!-- END FOOTER -->
            <?php echo $footer_link; ?>
            <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
            <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/libs/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/libs/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/js/index.js"></script>

        
    <!--<script src="<?php echo $assets_path; ?>layouts/layout/scripts/custom.js"></script> -->
            <!-- END PAGE LEVEL PLUGINS -->   
            <style>

                .modal.in .modal-dialog {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    background: rgba(0, 0, 0, 0.7);
                    z-index: 999999999;
                    text-align: center;
                    width: 100%;
                    height: 100%;
                    position: fixed; overflow: hidden;

                } 

                .modal-content {
                    background-color: #fff;
                    border: 1px solid #999;
                    border: 1px solid rgba(0,0,0,0.2);
                    border-radius: 6px;
                    -webkit-box-shadow: 0 3px 9px rgba(0,0,0,0.5);
                    box-shadow: 0 3px 9px rgba(0,0,0,0.5);
                    background-clip: padding-box;
                    outline: 0;
                    z-index: 999999999 !important;
                    width: 550px !important;
                    margin: 0 auto;
                }

                .modal-backdrop {
                    position: fixed;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    z-index: 9; 
                    background-color: #000;
                }

                .input-group-addon {
                    padding: 6px 12px;
                    font-size: 14px;
                    font-weight: 400;
                    line-height: 1;
                    color: #555;
                    text-align: center;
                    background-color: #eee;
                    border-left: none !important;
                    border-right: 1px solid #ccc !important;
                    border-top: 1px solid #ccc;
                    border-bottom: 1px solid #ccc;
                    border-radius: 4px;
                    display: table-cell;
                    height: 25px;
                    width: 125px;
                }


            </style>

            <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                var flag = 0;
                
                $(document).ready(function () {

                   
                    Index.init();
                    $('#upload-btn').click(function(e){
                        
                        var inputFile = $('input[name=file]');
                        
                        var progressBar = $('#progress-bar');

                        var fileToUpload = inputFile[0].files[0];
                        

                        if (fileToUpload != 'undefined') {
            
                            var formData = new FormData();
                            formData.append("file", fileToUpload);
                            $.ajax({
                                url: "<?php echo base_url();?>targets/upload",
                                type: 'post',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    $('.list-group').append('<li class="list-group-item">' + response  + '<div class="pull-right"><a href="javascript:void(0)" data-file="' + response + '" class="remove-file"><i class="glyphicon glyphicon-remove"></i></a></div></li>');
                                },
                                xhr: function() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.upload.addEventListener("progress", function(event) {
                                        if (event.lengthComputable) {
                                            var percentComplete = Math.round( (event.loaded / event.total) * 100 );
                                            // console.log(percentComplete);
                                            
                                            $('.progress').show();
                                            $('#progress-bar').css({width: percentComplete + "%"});
                                            $('#progress-bar').text(percentComplete + '%');
                                        };
                                    }, false);

                                    return xhr;
                                }
                            });
                        }
                    });
                    $('#temp_name').change(function(){
                         var temp_id = $('#temp_name').val();
                          $.ajax({
                                url: '<?php echo base_url(); ?>competitor/get_email_template/',
                                data: {template_id:temp_id},
                                type: 'post',
                                async: false,
                                success: function (resp) {
                                  var obj = $.parseJSON(resp);
                                  $("#msg").val(obj[0].content);
                                     
                                }
                            });
                 });

                 $(document).on('click','.a_preview', function(e){
                    $.ajax({
                        type: "POST",
                        url: BASE_URL + 'client_purchase/get_email_template/',
                        success:function(resp) {
                          var obj=$.parseJSON(resp);
                         $("#ckeditorBox").val(obj[0].signature);
                          $("#modalEmailTemplate").modal('show');
                        },
                        error:function(xhr) {
                          jconfirm({
                              title: 'Alert!',
                              content: "Something is not right"
                          });
                        }
                      });
                });

                 $(document).on('click','#btn_template_add_new', function(e){
                    var signature_content = CKEDITOR.instances['ckeditorBox'].getData();
                    localStorage.setItem('signature_content',signature_content);
                 });
                 $(document).on('click','#a_signature_cancel', function(e){
                    $("#modalEmailTemplate").modal('hide');
                 });
                 $(document).on('click','#include_signature',function(e){
                    if($(this).is(':checked')) {

                        $.ajax({
                        type: "POST",
                        url: BASE_URL + 'client_purchase/get_email_template/',
                        success:function(resp) {
                          var obj=$.parseJSON(resp);
                           //alert(obj[0].signature);
                          localStorage.setItem('signature_content',obj[0].signature);
                         
                        },
                        error:function(xhr) {
                          jconfirm({
                              title: 'Alert!',
                              content: "Something is not right"
                          });
                        }
                      });
                    }
                 });

                  $(document).on('click','.a_file', function(e){
                       $("#multiple_document_model").modal('show');
                   });
                   $('#cancel_document_submit').on('click', function (e) {
                        $("#multiple_document_model").modal('hide');
                    });
                    $('#update_document_submit').on('click', function (e) {
                        $("#multiple_document_model").modal('hide');
                        $("#chk:checked").each(function() {

                                if(this.checked) {
                                    $('input[name=chkme]').attr('checked',false);
                                  }

                                  if($(this).val())
                                  {
                                    $(this).attr('disabled',true);
                                  }
                                                        
                                $('.list-group').append('<li class="list-group-item">' + $(this).val()  + '<div class="pull-right"><a href="javascript:void(0)" data-file="' + $(this).val() + '" class="remove-file"><i class="glyphicon glyphicon-remove"></i></a></div></li>');

                                   var percentComplete = Math.round( (781041 / 781041) * 100 );
                                             //alert(console.log(percentComplete));include_signature
                                  $('.progress').show();
                                  $('#progress-bar').css({width: percentComplete + "%"});
                                  $('#progress-bar').text(percentComplete + '%');
                         });
                         
                     });   





                     $('#mailbuttons').on('click', function (e) {
                                  //alert("Hello") ;
                        var valid = $('#ms').valid();
                        var signature_content = '';
                        if (valid) {
                            if (CKEDITOR.instances['msg'].getData() == "") {
                                alert("Please enter your message");
                                return false;
                            }
                            var target_seq_no = $('#msid').val();
                            var firm_seq_no = $('#firm_seq_no').val();

                            if($('#include_signature').is(':checked')) {
                                signature_content = localStorage.getItem('signature_content');
                            }
                            else {
                                signature_content = '';
                            }
                            
                            $('#csv_email_loader1').show();
                            $('.btn').attr('disabled', 'disabled');
                            var attach_array = new Array();
                            $(".remove-file").each(function(index){
                                attach_array.push($(this).data('file'));
                            });
                             
                            
                            $.ajax({
                               url: '<?php echo base_url(); ?>client_purchase/temp_sendmail',
                                data: {
                                    sub: $('#subject').val(),
                                    msg: CKEDITOR.instances['msg'].getData(),
                                    email: $('#email').val(),
                                    signature_content: signature_content,
                                    target_seq_no:target_seq_no,
                                    attach_array: attach_array
                                },
                                type: 'post',
                                async: false,
                                success: function (resp) {
                                   
                                    $("#csv_email_loader1").fadeOut("slow");
                                    $("#csv_email_loader1").css('display', 'none');
                                    $(".btn").removeAttr('disabled', 'disabled');
                                    //alert(resp);
                                    if (resp == 1) {
                                        flag = 1;
                                    }
                                    else if (resp == 2) {
                                        flag = 2;
                                    }
                                    
                                }
                            });
                            
                            if (flag == 1) {
                                jconfirm({
                                    title: 'Confirmation!',
                                    content: 'Email sent successfully.',
                                    buttons: {
                                        OK: function () {
                                            window.location.href="<?php echo base_url();?>client_purchase";
                                        }
                                    }
                                });
                            }
                            else if (flag == 2) {
                                jconfirm({
                                    title: 'Alert!',
                                    content: 'Email not sent.',
                                    buttons: {
                                        OK: function () {
                                            window.location.href="<?php echo base_url();?>client_purchase";
                                        }
                                    }
                                });
                            }
                        }
                    });
                    // Toggle Sidebar Menu
                    $('#mail-sidebar').on('click', function () {
                        $('.email-menu').slideToggle();
                        $('.sidebar-menu').toggleClass('animated fadeIn hidden');
                    });

                    // Toggle Content Buttons
                    $('.compose-toggle, .mail-toggle').on('click', function () {
                        $('.compose-toggle, .mail-toggle').toggleClass('hidden');
                    });

                    $('.email-table tr td').on('click', function () {
                        var starToggle = $(this).find('.glyphicons-star');
                        if (starToggle.length) {
                            starToggle.toggleClass('text-orange');
                        }
                        if ($(this).hasClass('table-icon')) {
                            return
                        }
                        $('a[href="#email-view"]').tab('show') // Select tab by name
                    });

                    // Toggle Active list menu item
                    $('.email-menu ul li').on('click', function () {
                        $('a[href="#email-list"]').tab('show') // Select tab by name
                        $(this).siblings('li').removeClass('active').end().addClass('active');
                    });

                    // Toggle Extra Fields
                    $('#token-toggle').on('click', function () {
                        $('.token-fields').toggleClass('animated fadeIn hidden');
                    });

                    $('#ms').validate({
                        rules: {
                            sub: {
                                required: true
                            },
                            msg: {
                                required: true
                            }
                        },
                        messages: {
                            sub: {
                                required: "<font color=\"red\">Please enter your subject!</font>"
                            },
                            msg: {
                                required: "<font color=\"red\">Please enter your message!</font>"
                            }
                        }

                    });

                    $('body').on('click', '.remove-file', function () {
                        var me = $(this);

                        $.ajax({
                            url: "<?php echo base_url();?>targets/removeFiles",
                            type: 'post',
                            data: {file_to_remove: me.attr('data-file')},
                            success: function() {
                                me.closest('li').remove();
                            }
                        });

                    });

                    $('body').on('change.bs.fileinput', function(e) {
                        $('.progress').hide();
                        $('#progress-bar').text("0%");
                        $('#progress-bar').css({width: "0%"});
                    });

                });
                
                function listFilesOnServer () {
                        var items = [];

                        $.getJSON("<?php echo base_url();?>targets/listFiles", function(data) {
                            $.each(data, function(index, element) {
                                items.push('<li class="list-group-item">' + element  + '<div class="pull-right"><a href="javascript:void(0)" data-file="' + element + '" class="remove-file"><i class="glyphicon glyphicon-remove"></i></a></div></li>');
                            });
                            $('.list-group').html("").html(items.join(""));
                        });
                }


            </script>


    </body>

</html> 

