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
                    <?php //echo $breadcrumb; ?>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo $base_url; ?>dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo $base_url; ?>venue">Document Setting</a>
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
                                        <span class="caption-subject bold uppercase">Document Setting List</span>
                                    </div>
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
                                                 <?php
                                                $suc_message = $this->session->flashdata('suc_message');
                                                if (isset($suc_message)) {
                                                    echo $suc_message;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($role_code =='FIRMADM') { ?>
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6" style=" padding-left: 0">
                                                <div class="btn-group">
                                                    <!--<a href="<?php echo $base_url; ?>emailtemplate/add_contract" class="btn btn-outline sbold"  >--> <!-- <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" > -->
                                                        <button class="btn sbold green" data-toggle="modal" data-id="" data-industry-id="" data-target="#import_contact" id=""> Add New Document
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    <!--</a>-->
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <?php } ?>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                <th> Template Name </th>
                                                <th> Content View </th>

                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($getdata as $key => $val) { ?>
                                                <tr>
                                                    <td> <?php echo ++$i; ?> </td>
                                                    <td> <?php echo $val['title'] ?> </td>
                                                    <td> <a href="<?php echo base_url();?>assets/upload/attachments/<?php echo $val['document_name'] ;?>"  target="_blank" "><?php echo $val['document_name']; ?></a></td>

                                                    <td>
                                                        <!--<div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <?php if ($role_code == 'FIRMADM') { ?>
                                                                    <li>
                                                                        <a href="<?php echo $base_url; ?>documentsetting/edit_document/<?php echo base64_encode($val['id']); ?>">
                                                                            <i class="icon-docs"></i> Edit </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="<?php echo $base_url; ?>emailtemplate/delete_contract/<?php echo base64_encode($val['id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                            <i class="icon-tag"></i> Delete </a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>-->
                                                         <span><a href="javascript:void(0)" class="a_preview" data-id="<?php echo base64_encode($val['id']);?>">Edit</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                         <span><a href="javascript:void(0)" class="a_delete" data-id="<?php echo base64_encode($val['id']);?>">Delete</a></span>

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

            <!-- END QUICK SIDEBAR -->
            <!---------IMPORT EXCEL FORM---------->

        </div>
        <!-- END CONTAINER -->

        <div class="modal fade" id="import_contact" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <form name="upload_contacts_form" autocomplete="off" id="upload_contacts_form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <div class="modal-title"><span style="color:#333" class="glyphicon glyphicon-pencil mr10"></span><b style="color:#333"> Upload Document</b></div>
                        </div>

                        <div class="row">      
                            <div class="input-group col-md-12" style="padding-left:30px;padding-top:10px">
                                 
                            <div id="create_event" class=" mt10">
                                <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                   <label class="col-md-1" for="comment" style="padding-right: 0; padding-left: 0; color:#333">Title</label>
                                    <div class="form-group col-md-9" style="color:#333">
                                        
                                        <input type="text" name="title_name" id="title_name">
                                        <!--<input type="hidden" class="input-lg" id="filetype" name="filetype" value="upload_">-->
                                    </div>

                                </div>

                            </div>
                                
                            </div>
                        </div>

                        <div class="modal-body" style=" display: inline-block; width: 100%">
                            <div id="create_event" class=" mt10">
                                <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                   <label class="col-md-1" for="comment" style="padding-right: 0; padding-left: 0; color:#333">File</label>
                                    <div class="form-group col-md-9" style="color:#333">
                                        
                                        <input type="file" name="file" id="file">
                                        <!--<input type="hidden" class="input-lg" id="filetype" name="filetype" value="upload_">-->
                                    </div>

                                </div>

                            </div>
                              
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
        <!--EDIT DOCUMENT-->

        <div class="modal fade" id="edit_document" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm">
                <div class="modal-content">
                    <form name="upload_edit_form" autocomplete="off" id="upload_edit_form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <div class="modal-title"><span style="color:#333" class="glyphicon glyphicon-pencil mr10"></span><b style="color:#333"> Edit Document</b></div>
                        </div>

                        <div class="row">      
                            <div class="input-group col-md-12" style="padding-left:30px;padding-top:10px">
                                 
                            <div id="create_event" class=" mt10">
                                <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                   <label class="col-md-1" for="comment" style="padding-right: 0; padding-left: 0; color:#333">Title</label>
                                    <div class="form-group col-md-9" style="color:#333">
                                        
                                        <input type="text" name="title_edit" id="title_edit">
                                        <!--<input type="hidden" class="input-lg" id="filetype" name="filetype" value="upload_">-->
                                    </div>

                                </div>

                            </div>
                                
                            </div>
                        </div>

                        <div class="modal-body" style=" display: inline-block; width: 100%">
                            <div id="create_event" class=" mt10">
                                <div class="col-md-12" style=" padding-left: 0; padding-right: 0">
                                   <label class="col-md-1" for="comment" style="padding-right: 0; padding-left: 0; color:#333">File</label>
                                    <div class="form-group col-md-9" style="color:#333">
                                        
                                        <input type="file" name="file_edit" id="file_edit">
                                        <!--<input type="hidden" class="input-lg" id="filetype" name="filetype" value="upload_">-->
                                    </div>

                                </div>

                            </div></br>
                              <a href=""  target="_blank" " class="show_filename" id="show_filename"></a>
                              <input type="hidden" class="hid_file_name" id="hid_file_name" name="hid_file_name">
                              <input type="hidden" class="uid" id="uid" name="uid">
                        </div>
                        <div class="modal-footer">
                            <!--<button type="submit" class="create-event-form btn bg-blue2">Create Event</button>-->
                            <div class="input-group col-md-12 pull-right" style="padding-right:15px">
                                <input style=" margin-left: 15px" type="reset" value="Cancel" class="submit btn green pull-right cancel" name="" id="">
                                <input type="button" value="Edit" class="submit btn green pull-right" name="update_document_submit" id="update_document_submit" >
                                
                                <div id="master_name_submit_loader" style="display:none; padding-left:10px;"><font color="green"><img src="<?php echo $base_url; ?>assets/img/FhHRx.gif"></font></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



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


        </style>


        <script type="text/javascript">

 //$('.summernote3').summernote({
           // height: 315, //set editable area's height
            //focus: true  //set focus editable area after Initialize summernote
        //});

    $(document).ready(function () {
        
        $(window).load(function() {

//                    $("#loader_image").hide();

            $('#loader_image').delay(2000).fadeOut(1000)

        });

    $('#import_contacts_submit').on('click', function(e) {
        //alert("ok");
     e.preventDefault();
       var title_name=$('#title_name').val();
       //alert(title_name);
       //var upload_file=$('#upload_file').val();
        //var file_data = $('#file').val();
        var data = new FormData($('#upload_contacts_form')[0]);
                    //var form_data = new FormData();
                    //form_data.append('file', file_data);
        //alert(file_data);
       
       //var msg= CKEDITOR.instances['ckeditorBox'].getData()
       
       //var b = BASE_URL;
       $.ajax({
        type: "POST",
        url: BASE_URL + 'documentsetting/upload_doc/',
        data:data,
          //mimeType: "multipart/form-data",
          contentType: false,
          cache: false,
          processData: false,
        success: function(response) {
           // alert(response);
            location.href=BASE_URL + 'documentsetting/';
        },
        error: function() {
            alert('Error');
        }
    });
    
  });

    $(document).on('click','.a_preview', function(e){
            var doc_id = $(this).data('id');
             $.ajax({
                type: "POST",
                url: BASE_URL + 'documentsetting/view_document/',
                data:{doc_id:doc_id},
                success: function(response) {
                    var obj=$.parseJSON(response);
                    
                    $("#title_edit").val(obj[0].title);
                    $("#hid_file_name").val(obj[0].document_name);
                    $("#uid").val(obj[0].id);
                    $("#show_filename").html(obj[0].document_name);
                    $("#show_filename").attr('href',"<?php echo base_url();?>assets/upload/attachments/"+obj[0].document_name);
                    $("#edit_document").modal('show');
                },
                error: function() {
                    alert('Error');
                }
          });
          
        });


    $('#update_document_submit').on('click', function(e) {
        //alert("ok");
     e.preventDefault();
      // var title_name=$('#title_name').val();
       
        var data = new FormData($('#upload_edit_form')[0]);
        
       $.ajax({
        type: "POST",
        url: BASE_URL + 'documentsetting/edit_document/',
        data:data,
          
          contentType: false,
          cache: false,
          processData: false,
        success: function(response) {
            //alert(response);
           location.href=BASE_URL + 'documentsetting/';
        },
        error: function() {
            //alert('Error');
        }
    });
    //return false;
  });

  $(document).on('click','.a_delete', function(e){
            var delt_id = $(this).data('id');
             $.ajax({
                type: "POST",
                url: BASE_URL + 'documentsetting/delete/',
                data:{delt_id:delt_id},
                success: function(response) {
                    //alert(response);
                    location.href=BASE_URL + 'documentsetting/';
                   
                },
                error: function() {
                    alert('Error');
                }
          });
          
        });






    
});
</script>

    </body>

</html>
