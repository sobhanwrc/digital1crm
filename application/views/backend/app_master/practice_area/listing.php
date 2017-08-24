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
                                <a href="#">Practice area</a>
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
                                        <span class="caption-subject bold uppercase">Practice Area List</span>
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
                                                <div class="btn-group">
                                                        <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                            <button class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                </div>
                                                <div class="btn-group">
                                                        <a href="#responsive_file" class="btn btn-outline sbold" data-toggle="modal" >
                                                            <button class="btn sbold green"> Import
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <?php // if($role_code=='SITEADM'){ ?>
<!--                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-3"></div>
                                                    <form action="<?php echo $base_url; ?>practice-area-survey/fetchFirm" method="post" name="firm_list_form" id="firm_list_form">
                                                        <div class="col-md-3">
                                                            <select class="form-control" name="firms">
                                                                <option value="">Select a firm</option>
                                                                <option value="all">All</option>
                                                                <?php // t($firms, 1);
                                                                foreach ($firms as $key => $value){?> 
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
                                        </div>-->
                                        <?php  //} ?>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL# </th>
                                                <th> Practice Area Name</th>
                                                <th> Remarks/Notes </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 1;
                                            foreach ($practice_area as $key => $value) { ?>
                                                <tr>
                                                    <td> <?php echo $i++; ?> </td>
                                                    <td> <?php echo $value['practice_area_name']; ?> </td>
                                                    <td> <?php echo $value['remarks_notes']; ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                
                                                                <li>
                                                                    <a href="#responsive_<?php echo $value['practice_area_seq_no']; ?>" data-toggle="modal">
                                                                        <i class="icon-docs"></i> View 
                                                                    </a>
                                                                </li> 
                                                                <li>
                                                                    <a href="#responsive_edit_<?php echo $value['practice_area_seq_no']; ?>" data-toggle="modal">
                                                                        <i class="icon-docs"></i> Edit
                                                                    </a>
                                                                </li>

                                                                 <?php //if($role_code=='FIRMADM') { ?>
<!--                                                                <li>
                                                                    <a href="#" data-toggle="modal">
                                                                        <i class="icon-docs"></i> Delete
                                                                    </a>
                                                                </li>-->
                                                                <?php //} ?>
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
    <!----------------------  Practice Area Add Form --------------------->
    <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add Practice Area</h4>
                        </div>
                        <form autocomplete="off" name="practice_area_form" id="practice_area_form" action="<?php echo $base_url; ?>practice_area/add" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Practice Area Name:</label>
                                                <div class="col-md-8">
                                                     <input type="text"  name="prac_area_name" class="form-control" placeholder="Enter Practice Area Name" id="prac_area_name">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Practice Area Code:</label>
                                                <div class="col-md-8">
                                                     <input type="text"  name="prac_area_code" class="form-control" placeholder="Enter Practice Area Code" id="prac_area_code">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks"></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" name="practice_area_submit" id="practice_area_submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <!-------------------------- Practice Area Edit Form ------------------------>
    <?php foreach($practice_area AS $key => $value) {?>
        <div id="responsive_edit_<?php echo $value['practice_area_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Edit Practice Area</h4>
                        </div>
                        <form autocomplete="off" name="practice_area_edit_form" class="practice_area_edit_form_class" id="practice_area_edit_form_<?php echo $value['practice_area_seq_no']; ?>" action="<?php echo $base_url . 'practice_area/edit/' . base64_encode($value['practice_area_seq_no']); ?>" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Practice Area Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="prac_area_name" class="form-control" placeholder="Enter Practice Area Name" id="prac_area_name_<?php echo $value['practice_area_seq_no']; ?>" value="<?php echo $value['practice_area_name'];?>">  
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Practice Area Code:</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="prac_area_code" class="form-control" placeholder="Enter Practice Area Code" id="prac_area_code_<?php echo $value['practice_area_seq_no']; ?>" value="<?php echo $value['practice_area_code'];?>">
                                                    <input type="hidden"  name="original_prac_area_code" class="form-control" placeholder="Enter text" id="original_prac_area_code_<?php echo $value['practice_area_seq_no']; ?>" value="<?php echo $value['practice_area_code'];?>">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" id="remarks_<?php echo $value['practice_area_seq_no']; ?>" placeholder="Enter Remarks"><?php echo $value['remarks_notes'];?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" abc="<?php echo $value['practice_area_seq_no']; ?>" name="practice_area_edit_submit" id="practice_area_edit_submit" class="btn green practice_area_edit_submit" onclick="pa_frm_submit('<?php echo $value['practice_area_seq_no']; ?>')">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    <!------------------------- Practice Area View Form --------------------------->
    <?php foreach($practice_area AS $key => $value) {?>
        <div id="responsive_<?php echo $value['practice_area_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View Practice Area</h4>
                        </div>
                        <form autocomplete="off" name="practice_area_edit_form" id="practice_area_edit_form_<?php echo $value['practice_area_seq_no']; ?>" action="<?php echo $base_url . 'practice_area/edit/' . base64_encode($value['practice_area_seq_no']); ?>" method="post">
                            <div class="modal-body">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Practice Area Name:</label>
                                                <div class="col-md-8">
                                                    <input type="text" disabled="disabled" name="prac_area_name" class="form-control" placeholder="Enter text"  value="<?php echo $value['practice_area_name'];?>">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Practice Area Code:</label>
                                                <div class="col-md-8">
                                                    <input type="text" disabled="disabled" name="prac_area_code" class="form-control" placeholder="Enter text" value="<?php echo $value['practice_area_code'];?>">
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" disabled="disabled" name="remarks"  placeholder="Enter text"><?php echo $value['remarks_notes'];?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <!--<button type="submit" name="practice_area_edit_submit" id="practice_area_edit_submit" class="btn green" onclick="pa_frm_submit('<?php echo $value['practice_area_seq_no']; ?>')">Save</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
     <?php } ?>
    <!-----------------Import excel form-------------------->
    <div id="responsive_file" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Import Practice Area</h4>
                        </div>
                        <form autocomplete="off" name="import_practice_area_form" id="import_practice_area_form" action="<?php echo $base_url; ?>practice_area/add_file" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="scroller" style="height:100px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">   
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">File</label>
                                                    <div class="col-md-8">
                                                        <input style=" border:none; padding-top: 0;" type="file" class="form-control" name="xls_file" id="xls_file" required="">
                                                        <span class="help-block">  </span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="submit" name="import_practice_area_submit" id="import_practice_area_submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
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

        .form-group.required .control-label:after {
                content:"*";
                color:red;
        }
    </style>
    <script src="<?php echo $assets_path; ?>custom/js/validate/practice_area_add_edit.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
    <script>
            function pa_frm_submit(id)
            {
                $('#practice_area_edit_form' + id).submit();
            }
        </script>
</html>  

