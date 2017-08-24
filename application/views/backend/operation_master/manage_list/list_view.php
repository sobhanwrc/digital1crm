<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php echo $header_link; ?>
    <link href="<?php echo $assets_path; ?>pages/css/ajaxloader.css" rel="stylesheet" type="text/css" />
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
            <?php echo $breadcrumb; ?>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo base_url()?>dashboard">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                   <!-- <li>
                        <a href="#">Manage Call User</a>
                        <i class="fa fa-circle"></i> 
                    </li> -->
                    <li>
                        <span>Manage List</span>
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
                                <span class="caption-subject bold uppercase">Manage List</span>
                            </div>

                                <?php $smsg = $this->session->flashdata('suc_message'); if(isset($smsg) && $smsg != ''){ ?>
                                 <div class="alert alert-success" id="general_msg_success" >
                                     <strong>Success!</strong> <span id="general_msg"> <?php echo $smsg; ?></span> 
                                 </div>
                                 <?php } ?>

                        </div>
                        <div class="portlet-body">
                            <?php if($role_code =='SITEADM' || $role_code =='FIRMADM') { ?>
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6" style=" padding-left: 0">
                                        <div class="btn-group" style="width: 100%; position: relative; padding-left: 2%; top:6px;">
                                            <!-- <a href="<?php echo $base_url; ?>attorney/add" class="btn btn-outline sbold">
                                                <button class="btn sbold green"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </a> -->
                                            <button style="margin-right: 4px;" type="button" class="btn btn-transparent dark btn-outline btn-circle active" data-toggle="modal" data-id="<?php echo $cat_details[0]['id']; ?>" data-industry-id="<?php echo $cat_details[0]['industry_type_seq_no']; ?>" data-target="#add_list_modal" id="add_new">Add New <i class="fa fa-plus"></i></button>

                                            <span style="margin-bottom: 10px; text-align: right; display: inline-block">
                                                <button type="button" class="btn btn-transparent dark btn-outline btn-circle active" data-toggle="modal" data-id="" data-industry-id="" data-target="#upload_contact_list" id="">Import List</button>
                                            </span>

                                            <span style="margin-bottom: 10px; text-align: right; display: inline-block">
                                                <a href="<?php echo $base_url; ?>managelist/search_from_contacts" class="btn btn-transparent dark btn-outline btn-circle active" id="search_from_contacts">Search from contacts</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               
                                
                            </div>
                            <?php } ?>
                            <?php if($role_code=='SITEADM'){ ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-3"></div>
                                        <form action="<?php echo $base_url; ?>attorney/fetchFirmCodes" method="post" name="firm_list_form" id="firm_list_form">
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
                            </div>
                            <?php } ?>
                            <br>
                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                <thead>
                                    <tr class="">
                                        <th> SL# </th>
                                        <th> List Name </th>
                                        <th> Created Date </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $i = 0; 
                                foreach($managelist as $key => $value){ ?>
                                    <tr>
                                        <td> <?php echo ++$i; ?> </td>
                                        <td> <?php echo $value['list_name']; ?> </td>
<!--                                        <td> <?php //if($value['attorney_gender'] == '122'){ echo 'Male'; }else if($value['attorney_gender'] == '123') { echo 'Female'; } else if($value['attorney_gender'] == '124') { echo 'Other'; } ?> </td>-->
                                        <td> <?php echo $value['created_date']; ?> </td>                                
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <?php if(($role_code =='ATTR' )|| ($role_code =='FIRMADM')||($role_code =='SITEADM') ){ ?>
                                                <ul class="dropdown-menu" role="menu">  
                                                    <?php if(($role_code =='ATTR' )|| ($role_code =='FIRMADM')||($role_code =='SITEADM')){ ?>
                                                    <li>
                                                        <a class="edit_button" href="javascript:void(0)" data-toggle="modal" data-target="#edit_list_modal" list_id="<?php echo $value['list_id']; ?>" list_name = "<?php echo $value['list_name']; ?>" >
                                                            <i class="icon-tag"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $base_url; ?>managelist/delete/<?php echo base64_encode($value['list_id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                            <i class="icon-tag"></i> Delete </a>
                                                    </li>
                                                    <?php } } ?>
                                                </ul>
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
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>

        <div id="add_list_modal" class="modal fade" role="dialog">

            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="modal-title"><span style=" color:#333" class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b style=" color:#333">Add New List</b></div>
                    </div>
                    <div class="modal-body">
                        <div id="create_event" class=" mt10">
                            <div class="col-md-12">
                                <form name="add_list_form" id="add_list_form" method="POST" enctype="multipart/form-data">

    <!-- <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo base64_encode($targets['target_seq_no']); ?>"> -->
                                    <input type="hidden" name="firm_seq_no" id="firm_seq_no" value="<?php echo $firm_seq_no; ?>">
                                    <div class="form-group" style=" color:#333">
                                        <div style="width: 16%; padding-top: 5px; display: inline-block">
                                            <label>List Name</label>
                                        </div>
                                        <div style="width: 80%; display: inline-block">
                                           <input class="form-control list_name_script_prevent" name="list_name" id="list_name" placeholder="Enter List" type="text">
                                        </div>

                                    </div>
                                    <!-- <input style=" color:#fff" type="button" value="Submit" class="submit btn bg-purple pull-left" name="submit1" id="submit1" > -->
                                    <div class=" col-md-12">
                                    <input style=" color:#fff" type="button" value="Submit" class="submit btn green pull-right" name="submit1" id="submit1" >
                                    </div>  
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                    <div class="input-group col-md-12 pull-right" style="padding-left:10px">
                        <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><!-- <img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font> --></div>
                    </div>
                </div>
            </div>
        </div>


        <!-------Edit modal------------>
        <div id="edit_list_modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="modal-title"><span style=" color:#333" class="glyphicon glyphicon-pencil text-purple2 mr10"></span><b style=" color:#333">Edit List</b></div>
                    </div>
                    <div class="modal-body">
                        <div id="create_event" class=" mt10">
                            <div class="col-md-12">
                                <form name="edit_list_form" id="edit_list_form" method="POST" enctype="multipart/form-data">

    <!-- <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo base64_encode($targets['target_seq_no']); ?>"> -->
                                    <div class="form-group" style=" color:#333">
                                        <div style="width: 16%; padding-top: 5px; display: inline-block">
                                            <label>List Name</label>
                                        </div>
                                        <div style="width: 80%; display: inline-block">
                                           <input class="form-control edit_list_name list_name_script_prevent" name="list_name" id="edit_list_name" placeholder="Enter List" type="text">
                                           <input type="hidden" class="pk" value="0"/>
                                        </div>

                                    </div>
                                    <!-- <input style=" color:#fff" type="button" value="Submit" class="submit btn bg-purple pull-left" name="submit1" id="submit1" > -->
                                    <div class=" col-md-12">
                                    <input style=" color:#fff" type="button" value="Submit" class="submit btn green pull-right" name="submit1" id="edit_submit_button" >
                                    </div>  
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                    <div class="input-group col-md-12 pull-right" style="padding-left:10px">

                        <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><!-- <img src="http://jygsaw.com/digital1crm/assets/img/FhHRx.gif"></font> --></div>
                    </div>
                </div>
            </div>
        </div>
        <!------------end---------->


        <!-------- import file---------------->
        <div id="upload_contact_list" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <form name="upload_contacts_form" autocomplete="off" id="upload_contacts_form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <div class="modal-title"><span style="color:#333" class="glyphicon glyphicon-pencil mr10"></span><b style="color:#333"> Upload Contacts</b></div>
                        </div>

                        <div class="modal-body">
                            <div id="create_event" class=" mt10">
                                <div class="col-md-12">
                                    <form name="form1" id="form1" method="POST" enctype="multipart/form-data">

        <!-- <input type="hidden" name="target_seq_no" id="target_seq_no" value="<?php echo base64_encode($targets['target_seq_no']); ?>"> -->
                                        <div class="form-group" style=" color:#333">
                                            <div style="width: 16%; padding-top: 5px; display: inline-block">
                                                <label>Select List</label>
                                            </div>
                                            <div class="form-group" style="width: 80%; display: inline-block">
                                                <select class="form-control" name="list" id="list">
                                                    <option value="">Select</option>
                                                    <?php foreach ($managelist as $key => $value) { ?>
                                                        <option value="<?php echo $value['list_id']; ?>"><?php echo $value['list_name']; ?></option>
                                                    <?php } ?> 
                                                </select>                                            
                                            </div>

                                        </div>

                                        <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                           <label class="col-md-1" for="comment" style="padding-right: 0; padding-left: 0; color:#333">File</label>
                                            <div class="form-group col-md-9" style="color:#333">                                                
                                                <input type="file" name="upload_file" id="upload_file">
                                                <!--<input type="hidden" class="input-lg" id="filetype" name="filetype" value="upload_">-->
                                            </div>
                                        </div>
                                        <!-- <input style=" color:#fff" type="button" value="Submit" class="submit btn bg-purple pull-left" name="submit1" id="submit1" > -->
                                    </form>
                                </div>
                            </div>
                        <div class="clearfix"></div>

                    </div>
                        <div class="modal-footer">
                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                            <div class="input-group col-md-12 pull-right" style="padding-right:15px">
                                <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel" name="" id="">
                                <input type="button" value="Submit" class="submit btn green pull-right" name="import_contacts_submit" id="import_contacts_submit" >
                                <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-----------------end--------------------->



    <!-- END QUICK SIDEBAR -->
</div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php echo $footer; ?>
    <!-- END FOOTER -->
    <?php echo $footer_link; ?>
            <!-- address db -->


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

    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <script src="<?php echo $assets_path; ?>pages/scripts/jquery.ajaxloader.1.5.1.js" type="text/javascript"></script>

    <script type="text/javascript">
            $(window).load(function() {
        //          $("#loader_image").hide();
                    $('#loader_image').delay(2000).fadeOut(1000)
            });

            //for space prevent
            jQuery.validator.addMethod("noSpace", function (value, element) {
                return value.trim();
            }, "No space please and don't leave it empty");
            //end

            jQuery(document).ready(function () {

                 //for space prevent
                    jQuery.validator.addMethod("noSpace", function (value, element) {
                        return value.trim();
                    }, "No space please and don't leave it empty");
                    //end

                //------------------ validate add list form----------------//
                //prevent html script tag
                $(".list_name_script_prevent").on('input', function () {
                    var html = $(this).val();
                    html = html.replace(/</g, "").replace(/>/g, "");
                    $(this).val(html);
                });
                //end
                $('#add_list_form').validate({  
                        rules: {
                            list_name: {
                                required: true,
                                noSpace: true
                            }
                        },
                        messages: {
                            list_name: {
                                required: "<font color=\"red\">Please enter list name</font>",
                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                            }
                        }
                });
                //-----------end-----------------//

                //----------------------VALIDATE EDIT LIST FORM------------------------//
                $('#edit_list_form').validate({
                        rules: {
                            list_name: {
                                required: true,
                                noSpace: true
                            }
                        },
                        messages: {
                            list_name: {
                                required: "<font color=\"red\">Please enter list name</font>",
                                noSpace: "<font color=\"red\">No space please and don't leave it empty!</font>"
                            }
                        }
                });
                //-------------END--------------------//

                //---------------------VALIDATE IMPORT CONTACT LIST FORM---------------------//
                $('#upload_contacts_form').validate({
                        rules: {
                            list: {
                                required: true
                            },
                            upload_file: {
                                required: true
                            }
                        },
                        messages: {
                            list: {
                                required: "<font color=\"red\">Please select a list</font>",
                            },
                            upload_file: {
                                required: "<font color=\"red\">Choose a file</font>"
                            }
                        }
                    });
                //---------END----------------//

                $(window).keydown(function(event){
                    if(event.keyCode == 13) {
                      event.preventDefault();
                      return false;
                    }
                });

                //-------------- to add list ajax ----------------------//
                $("#submit1").click(function (event) {
                    var firm_seq_no = $('#firm_seq_no').val();
                    var list_name = $('#list_name').val();
                    var valid = $("#add_list_form").valid();
                    if(valid){
                        $.ajax({
                            type: "POST",
                            url: BASE_URL + "managelist/add_list",
                            data: {
                                firm_seq_no: firm_seq_no,
                                list_name: list_name
                            },
                            success: function (data) {
                                if (data == 1) {
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "List added sucessfully",
                                        buttons: {
                                            OK: function () {
                                                window.location.href = BASE_URL + 'managelist';
                                                //   $('#add_category1').prop('disabled', true);
                                            }
                                        }
                                    });
                                }
                                else {
                                    jconfirm({
                                        title: 'Alert!',
                                        content: "Some Error!!",
                                        buttons: {
                                            OK: function () {
                                                //window.location.href = BASE_URL + 'contacts_list';
                                                //   $('#add_category1').prop('disabled', true);
                                            }
                                        }
                                    });
                                }
                            }

                        });
                    }
                });
                //--------------end--------------------//

                //------------------------ to edit list ajax---------------------//
                $(".edit_button").click(function(){
                    var list_id = $(this).attr('list_id');
                    var list_name = $(this).attr('list_name');
                    $(".edit_list_name").val(list_name);
                    $(".pk").val(list_id);
                });

                $("#edit_submit_button").click(function (e) {
                    var list_id = $(".pk").val();
                    var list_name = $('#edit_list_name').val();
                    var valid = $("#edit_list_form").valid();
                    if(valid){
                    //alert(list_name);
                        $.ajax({
                            type: "POST",
                            url: BASE_URL + "managelist/edit_list/"+list_id,
                            data: {
                                list_name: list_name
                            },
                            success: function (data) {
                                if (data == 1) {
                                    jconfirm({
                                        title: 'Confirmation!',
                                        content: "List edited sucessfully",
                                        buttons: {
                                            OK: function () {
                                                window.location.href = BASE_URL + 'managelist';
                                                //   $('#add_category1').prop('disabled', true);
                                            }
                                        }
                                    });
                                }
                                else {
                                    jconfirm({
                                        title: 'Alert!',
                                        content: "Some Error!!",
                                        buttons: {
                                            OK: function () {
                                                //window.location.href = BASE_URL + 'contacts_list';
                                                //   $('#add_category1').prop('disabled', true);
                                            }
                                        }
                                    });
                                }
                                
                            }

                        });
                    }
                });
                //-------------------------end-----------------------//


                //----------------------------to import contact list ajax------------------------//
                $("#import_contacts_submit").click(function (e) {
                    //$("#form1").submit();
                    var list_id = $('#list').val();
                    var valid = $("#upload_contacts_form").valid();
                    if(valid){
                        var data = new FormData($('#upload_contacts_form')[0]);
                        $.ajax({
                                type: "POST",
                                url: BASE_URL + "managelist/import_contact_list/",
                                data: data,
                                mimeType: "multipart/form-data",
                                contentType: false,
                                cache: false,
                                processData: false,

                                beforeSend: function () {

                                    $("#upload_contacts_form").ajaxloader('show');

                                },

                                success: function (data) {
                                    $("#upload_contacts_form").ajaxloader('hide');
                                    /*alert(data);
                                    console.log(data);*/
                                    if (data == 1) {
                                        jconfirm({
                                            title: 'Confirmation!',
                                            content: "File uploaded successfully",
                                            buttons: {
                                                OK: function () {
                                                    window.location.href = BASE_URL + 'managelist';
                                                    //   $('#add_category1').prop('disabled', true);
                                                }
                                            }
                                        });
                                    }
                                    
                                }

                        });
                    }
                });

                //-----------------------------end---------------------------//

            });
    </script>
    
    
    </body>

</html> 