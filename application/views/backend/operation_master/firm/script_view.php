<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php //print_r ($firm_details); die();?>

    <?php
//    echo 'devosmita'; exit;s
//    t($codes['Firm Address Type']); exit;
    echo $header_link;
    ?>
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
                    <div class="page-bar" style="position:relative">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Script</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                 <span>Company View</span>
                             </li>-->
                        </ul>

                        <div class="btn-group btn-group-devided" data-toggle="buttons" style=" position:  absolute; right:20px; top: 7px">
                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                <input name="options" class="toggle" id="option1" type="radio"><a style=" text-decoration: none; color:#fff" href="" onclick="history.back()"> Back</a></label>
                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                        </div>
                    </div>
                    <!-- END PAGE BAR -->

                    <!-- END PAGE HEADER-->
                    <div class="row">

                        <div class="col-md-12">
                            <div class="portlet light ">


                                <div class="portlet-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_1_1">

                                            <form role="form" id="profile_naratives" action="">

                                            <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo $firm_seq_no; ?>">


                                                <div class="form-group required" >
                                                    <label class="control-label" style=" width: 65px; display: inline-block">Module</label>
                                                    
                                                    <select class=" form-control" name = "module_value" id = "module_values" style=" width: 200px; display: inline-block">
                                                        <option value = "" selected disabled>-select-</option>
                                                        <?php
//print_r($notes);
                                                        for ($i = 1; $i <= 10; $i++) {
                                                            ?>

                                                            <option value = '<?php echo $i; ?>'  ><?php echo 'module' . $i; ?></option>

                                                        <?php }
                                                        ?>
                                                    </select>

                                                </div>


                                                <h3 class="hint"> Remarks </h3>


                                                <div class="form-group">
                                                    <label for="message">SMS:</label>
                                                    <div class="form-group">
                                                        <textarea rows="12" cols="200" id="ckeditorBox" name="ckeditorBox"  class="editor form-control" style="height:300px;width: 300px;">

                                                            <?php
                                                            //echo $notes[0]['note2'] ;
                                                            ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="margiv-top-10">
                                            <button id="script_edit_button" class="btn green" name="general_save_change" value="general_save_change">Save Changes</button>
                                            <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                        </div>
                                    </div>
                                </div> 
                            </div>     
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>








        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <?php echo $footer_link; ?>
        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>
        <!-- address db -->
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- <script src="<?php echo $assets_path; ?>custom/js/validate/firm_add_edit.js" type="text/javascript"></script> -->
        <script src="<?php echo $assets_path; ?>custom/js/address.js" type="text/javascript"></script>


        <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/libs/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/libs/ckeditor/adapters/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $assets_path; ?>emailtemplate/ckeditor/resources/js/index.js"></script>

        <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>";</script>


        <script>
            $(document).ready(function () {
                Index.init();
            });
        </script>


        <script>
            //for validation

            $(document).ready(function () {

                $('#profile_naratives').validate({
                    rules: {
//                title: {
//                    required: true
//                },


                        ckeditorBox: {
                            required: true
                        },
                        narrative_type: {
                            required: true,
                            remote: {
                                //url: BASE_URL + "admin/profile_naratives/profilevalidation",
                                type: "post",
                                data: {
                                    narrative_type: function () {
                                        return $("#narrative_type").val();
                                    }
                },
            }
                        },
                    },
                    messages: {
//                title: {
//                    required: "<font color=\"red\">Please enter title!</font>"
//                },
                        narrative_type: {
                            required: "<font color=\"red\">Please enter narative type!</font>",
                            remote: "<font color=\"red\">narative type is already is exists! please try with another</font>"
                        },
                        ckeditorBox: {
                            required: "<font color=\"red\">Please enter Narativs!</font>"
                        },
                    }
                });


            });



        </script>

        <script type="text/javascript">

            $(window).load(function() {
//                    $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
            });

            $(document).ready(function () {

                /*   
                 
                 */
                $('#module_values').change(function () {

                    var currentvalue = $(this).val();
                    var note_1 = <?php echo json_encode($notes[0][note1]); ?>;
                    var note2 = <?php echo json_encode($notes[0][note2]); ?>;
                    var note3 = <?php echo json_encode($notes[0][note3]); ?>;
                    var note4 = <?php echo json_encode($notes[0][note4]); ?>;
                    var note5 = <?php echo json_encode($notes[0][note5]); ?>;
                    var note6 = <?php echo json_encode($notes[0][note6]); ?>;
                    var note7 = <?php echo json_encode($notes[0][note7]); ?>;
                    var note8 = <?php echo json_encode($notes[0][note8]); ?>;
                    var note9 = <?php echo json_encode($notes[0][note9]); ?>;
                    var note10 = <?php echo json_encode($notes[0][note10]); ?>;

                    if (currentvalue == 1)
                    {

                        $('#ckeditorBox').val(note_1);

                    }
                    if (currentvalue == 2)
                    {

                        //alert ('hi')
                        $('#ckeditorBox').val(note2);
                    }

                    if (currentvalue == 3)


                    {
                        $('#ckeditorBox').val(note3);
                    }

                    if (currentvalue == 4)


                    {
                        $('#ckeditorBox').val(note4);

                    }

                    if (currentvalue == 5)
                    {
                        $('#ckeditorBox').val(note5);
                    }
                    if (currentvalue == 6)


                    {
                        $('#ckeditorBox').val(note6);
                    }

                    if (currentvalue == 7)


                    {
                        $('#ckeditorBox').val(note7);
                    }
                    if (currentvalue == 8)

                    {
                        $('#ckeditorBox').val(note8);
                    }
                    if (currentvalue == 9)
                    {

                        $('#ckeditorBox').val(note9);
                    }
                    if (currentvalue == 10)

                    {
                        $('#ckeditorBox').val(note10);
                    }


                });




                $('#script_edit_button').click(function (e) {
                    var note = CKEDITOR.instances['ckeditorBox'].getData();
                    var module = $('#module_values').val();
                    if (note == '')
                    {

                        jconfirm({
                            title: 'Alert !',
                            content: 'script should note be blank.',
                            buttons: {
                                OK: function () {

                                }
                            }
                        });

                        return false;
                    }
                    var check = $('#profile_naratives').serialize();
                    //alert(module);
                    //alert(note);
                    //alert(check) ;

                    $.post(BASE_URL + 'Firm/edit_module', $('#profile_naratives').serialize(), function (data, status)
                    {
                        /*alert(data);
                        console.log(data);*/
                        window.location.reload();

                    });

                    e.preventDefault();
                })

            })
        </script>
        <div id='#check'></div>


    </body>

</html> 