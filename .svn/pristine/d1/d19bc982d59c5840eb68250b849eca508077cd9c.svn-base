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
                                <a href="#">Firm Codes</a>
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
                                        <span class="caption-subject bold uppercase">Firm Codes List</span>
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
                                        <div class="row">
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
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <!--                                                    <a href="#responsive" class="btn btn-outline sbold" data-toggle="modal" >
                                                                                                            <button class="btn sbold green"> Add New
                                                                                                                <i class="fa fa-plus"></i>
                                                                                                            </button>
                                                                                                        </a>-->
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($role_code=='SITEADM'){ ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-3"></div>
                                                    <form action="<?php echo $base_url; ?>firm-codes/fetchFirmCodes" method="post" name="firm_list_form" id="firm_list_form">
                                                        <div class="col-md-3">
                                                            <select class="form-control" name="fimrs">
                                                                <option value="">Select a firm</option>
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
                                        <?php  } ?>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                        <thead>
                                            <tr class="">
                                                <th> SL#</th>
                                                <th> Firm </th>
                                                <th> Category </th>
                                                <th> Code </th>
                                                <th> Short Description </th>
                                                <th> Long Description </th>
                                                <th> Remarks Notes </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($firm_codes as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $value['firm']; ?></td>
                                                    <td><?php echo $value['category']; ?></td>
                                                    <td><?php echo $value['firm_code']; ?></td>
                                                    <td> <?php echo $value['short_description']; ?> </td>
                                                    <td> <?php echo $value['long_description']; ?> </td>
                                                    <td> <?php echo $value['remarks_notes']; ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a  href="#responsive_<?php echo $value['firm_code_seq_no']; ?>" data-toggle="modal">
                                                                        <i class="icon-tag"></i> View
                                                                    </a>
                                                                </li>
                                                                <?php if ($role_code == 'FIRMADM' ) { ?>
                                                                <li>
                                                                    <a  href="#responsive_edit_<?php echo $value['firm_code_seq_no']; ?>" data-toggle="modal">
                                                                        <i class="icon-tag"></i> Edit </a>
                                                                </li>
                                                                <?php } ?>
<!--                                                                <li>
                                                                    <a  href="#responsive">
                                                                        <i class="icon-tag"></i> Delete
                                                                    </a>
                                                                </li>-->
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
           
        <!-------------------------------   VIEW FIRM CODES  ------------------------------->

            <?php foreach ($firm_codes as $key => $value) { $value = (array) $value;?>
                <div id="responsive_<?php echo $value['firm_code_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">View Firm Code</h4>
                            </div>
                            
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Firm</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" disabled="" value="<?php echo $value['firm']; ?>">
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Code</label>
                                                    <div class="col-md-8">
                                                        <input type="text"  class="form-control" disabled="" value="<?php echo $value['firm_code']; ?>">
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Short Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" disabled="" value="<?php echo $value['short_description']; ?>" placeholder="Short description" name="short_description">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Long Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" disabled="" value="<?php echo $value['long_description']; ?>"  placeholder="Long description" name="long_description">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" disabled="" placeholder="Remarks or comments" name="remarks"><?php echo $value['remarks_notes']; ?></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                </div>
                            
                        </div>
                    </div>
                </div>
            <?php } ?>
  
        <!-------------------------------   EDIT FIRM CODES  ------------------------------->
        <?php  //t($firm_codes, 1);  ?>
            <?php foreach ($firm_codes as $key => $value) { $value = (array) $value;  ?>
                <div id="responsive_edit_<?php echo $value['firm_code_seq_no']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit Firm Code</h4>
                            </div>
                            <form action="<?php echo $base_url . 'firm-codes/edit/' . base64_encode($value['firm_code_seq_no']); ?>" autocomplete="off" name="firm_code_edit_form<?php echo $value['firm_code_seq_no']; ?>" id="firm_code_edit_form<?php echo $value['firm_code_seq_no']; ?>" method="post" class="firm_code_form_class">
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Firm</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" disabled="" value="<?php echo $value['firm']; ?>">
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Code</label>
                                                    <div class="col-md-8">
                                                        <input type="text"  class="form-control" disabled="" value="<?php echo $value['firm_code']; ?>">
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Short Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" required="required" value="<?php echo $value['short_description']; ?>" placeholder="Short description" name="short_description">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Long Description</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" required="required" value="<?php echo $value['long_description']; ?>" placeholder="Long description" name="long_description">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-md-4 control-label">Remark/Comments</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" required="required" placeholder="Remarks or comments" name="remarks"><?php echo $value['remarks_notes']; ?></textarea>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    <button type="button" class="btn green submit_btn_class" name="firm_code_edit_submit" id="firm_code_edit_submit_btn<?php echo $value['firm_code_seq_no']; ?>" onclick="fn_frm_submit('<?php echo $value['firm_code_seq_no']; ?>')">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <?php echo $footer_link; ?>
        
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
        .form-group.required .control-label:after {
                content:"*";
                color:red;
              }
        </style>
        <script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/validate/firm_codes_add.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/firm_codes_add.js"></script>
        <script>
            function fn_frm_submit(id)
            {
                $('#firm_code_edit_form' + id).submit();
            }
        </script>
    </body>

</html>  