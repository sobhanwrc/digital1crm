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
                                <a href="#"> Firm Codes </a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Firm Codes View</span>
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
                                        <span class="caption-subject bold uppercase">Firm Codes informations for edit</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1"><a href="" onclick="history.back()">Back</a></label>
                                            <!--<label class="btn btn-transparent dark btn-outline btn-circle btn-sm">-->
                                                <!--<input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        </div>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="tab-pane active" id="tab_1_1">
                                   <form role="form" id="appprofile_info_form" method="post" action="<?php echo $base_url . 'firm-sg-sections/details/' . base64_encode($strategy_group['firm_sgsec_seq_no']); ?>">
                                       <input type="hidden" name="firm_tab" value="yes">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <?php $err = $this->session->flashdata('suc_message'); if(isset($err) &&  $err != ''){ ?>
                                        <div class="alert alert-success" id="general_msg_success" >
                                            <strong>Success!</strong> <?php echo $err; ?>
                                        </div>
                                        <?php } ?>
                                        <?php $err = $this->session->flashdata('err_message'); if(isset($err) &&  $err != ''){ ?>
                                        <div class="alert alert-danger" id="general_msg_success" >
                                            <strong>Error!</strong> <?php echo $err; ?>
                                        </div>
                                        <?php } ?>

                                        <h3 class="hint"> Edit Firm-Level Strategy Group or Section Master </h3>
                                                   
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Firm</label>
                                                    <div class="col-md-8">
                                                      <select class="form-control"  name="firm_seq_no" disabled>
                                                                <option value="">Select One</option>
                                                                <?php //  t($firms); exit; ?>
                                                                 <?php foreach ($firms as $key1 => $value1) { $value1=(array) $value1; ?>
                                                                    <option value="<?php echo $value1['firm_seq_no']; ?>"<?php if($value1['firm_seq_no'] == $strategy_group['firm_seq_no']){echo 'selected="selected"';} ?>><?php echo $value1['firm_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        <span class="help-block"> </span>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">SG Section Type</label>
                                                        <div class="col-md-8">
                                                        <select class="form-control" name="code_seq_no" disabled>
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes as $key => $value) { $value=(array) $value; ?>
                                                                <option value="<?php echo $value['short_description']; ?>"<?php if($value['short_description'] == $strategy_group['sg_section_type']){echo 'selected="selected"';} ?>><?php echo $value['short_description']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="help-block"> </span>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">SG Section ID</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="sg_section_id" class="form-control" disabled value="<?php if(isset($strategy_group['sg_section_id']) && $strategy_group['sg_section_id'] != ''){echo $strategy_group['sg_section_id']; } ?>" <?php if(isset($strategy_group['sg_section_id']) && $strategy_group['sg_section_id'] != ''){echo $strategy_group['sg_section_id']; } ?> />
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Code Description</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="code description" name="code_description" value="<?php if(isset($strategy_group['sg_section_name']) && $strategy_group['sg_section_name'] != ''){echo $strategy_group['sg_section_name']; } ?>" <?php if(isset($strategy_group['sg_section_name']) && $strategy_group['sg_section_name'] != ''){echo $strategy_group['sg_section_name']; } ?> />
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Long Description</label>
                                                <div class="col-md-8">
                                                    <input type="text"  class="form-control " placeholder="Long description" name="long_description" value="<?php if(isset($strategy_group['long_description']) && $strategy_group['long_description'] != ''){echo $strategy_group['long_description']; } ?>" <?php if(isset($strategy_group['long_description']) && $strategy_group['long_description'] != ''){echo $strategy_group['long_description']; } ?> />
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-md-4 control-label">Remark/Comments:</label>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control" name="remarks" placeholder="Enter text"><?php if(isset($strategy_group['remark_notes']) && $strategy_group['remark_notes'] != ''){echo $strategy_group['remark_notes']; } ?></textarea>
                                                                        <span class="help-block">  </span>
                                                                    </div>
                                                                </div>
                                                <div class="margiv-top-10">
                                                   <button type="submit" id="firm_sg_sections_edit_submit" class="btn green" name="firm_sg_sections_edit_save_changes">Save</button>
                                                   <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                </div>
        
                                      </div>
                                    </div>     
                                           </form>
                               </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php echo $footer; ?>
<!-- END FOOTER -->
<?php echo $footer_link; ?>
</body>
<style>
    /*    label.error {
            display: none !important;
        }*/
    .customErrorClass {
        border: 1px solid red !important;
        /*color: red;*/
        background-color: #ffcccc;
    }

    input[type=text].error,input[type=file].error, input[type=email].error, input[type=password].error, textarea.error, select.error,input[type=checkbox].error {
        border: 1px solid red !important;
    }
</style>
<script src="<?php echo $assets_path; ?>custom/js/validate/ui_list_acl_add.js" type="text/javascript"></script>
<script type="text/javascript">
function onSubmit()
{
    var fields = $("input[type='checkbox']").serializeArray();
    if (fields.length === 0)
    {
        alert('please select atleast one of the checkbox');
        // cancel submit
        return false;
    }

}
// register event on form, not submit button
$('#acl_user_form').submit(onSubmit)
</script>
<script type="text/javascript">
function onSubmit()
{
    var fields = $("input[type='checkbox']").serializeArray();
    if (fields.length === 0)
    {
        alert('please select atleast one of the checkbox');
        // cancel submit
        return false;
    }

}
// register event on form, not submit button
$('#acl_group_form').submit(onSubmit)
</script>
<script type="text/javascript">
function onSubmit()
{
    var fields = $("input[type='checkbox']").serializeArray();
    if (fields.length === 0)
    {
        alert('please select atleast one of the checkbox');
        // cancel submit
        return false;
    }

}
// register event on form, not submit button
$('#acl_role_form').submit(onSubmit)
</script>
<script type="text/javascript">
//$(".form_button").on("click",function(){
//    if (($("input[type='checkbox']:checked").length)<=0) {
//        alert("You must check at least 1 box");
//    }
//    return true;
//});
// register event on form, not submit button
//
//    $('.form_button').on('click', function () {
//        $(".user_checkbox_validate").find("checkbox").each(function () {
//             alert($(this).prop('checked'));
//            if ($(this).prop('checked') == true) {
//                //do something
//                alert('selected');
//                // cancel submit
//                return false;
////             $('.c').submit()
//                $(this).form.submit()
//            } else {
//                alert('please select atleast one of the checkbox');
//                // cancel submit
//                return false;
//            }
//            
//        });
//        if (($(".access_checkbox").prop('checked') === true))
//        {
//            alert('selected');
//            // cancel submit
//            return false;
////             $('.c').submit()
//            $(this).form.submit()
//        } else {
//            alert('please select atleast one of the checkbox');
//            // cancel submit
//            return false;
//        }
//    });

</script>

<script type="text/javascript">

    $('document').ready(function () {

        $('#meals').on('click', function () {
            var div = "<div class=\"row\"><div class=\"col-md-12\">\<div class=\"col-md-6\">\
                                    <div class=\"row\">\
                                        <div class=\"col-md-12\">\
                                            <p style=\"font-size:12px;\">\
                                                <select>\
                                                    <option>Food and Beverage</option>\
                                                    <option>Admission fees, tickets and venue fees</option>\
                                                    <option>Room rental - receptions and cocktail parties</option>\
                                                    <option>Gifts and take aways</option>\
                                                    <option>Labor and Support</option>\
                                                </select>\
                                            </p>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p style=\"font-size:12px;\">\
                                        <select>\
                                            <option>ME 1</option>\
                                            <option>ME 2</option>\
                                            <option>ME 3</option>\
                                            <option>ME 4</option>\
                                            <option>ME 5</option>\
                                        </select>\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                            </div></div>";
//                                                alert (div);
            $('.meals_div').append(div);
        });

        $('#travel').on('click', function () {
            var div = "<div class=\"row\"><div class=\"col-md-12\">\
                                <div class=\"col-md-6\">\
                                    <div class=\"row\">\
                                        <div class=\"col-md-12\">\
                                            <p style=\"font-size:12px;\">\
                                                <select>\
                                                    <option>Transportation</option>\
                                                    <option>Lodging</option>\
                                                    <option>Mileage</option>\
                                                    <option>Car rental</option>\
                                                    <option>Taxis and Uber</option>\
                                                    <option>Client transportation (limo's, buses, vans etc.)</option>\
                                                </select>\
                                            </p>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p style=\"font-size:12px;\">\
                                        <select>\
                                            <option>T 1</option>\
                                            <option> T 2</option>\
                                            <option>T 3</option>\
                                            <option>T 4</option>\
                                            <option>T 5</option>\
                                            <option>T 6</option>\
                                        </select>\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                                <div class=\"col-md-2\">\
                                    <p>\
                                        <input type=\"text\" class=\"col-md-12 form-control\">\
                                    </p>\
                                </div>\
                            </div> </div>";
//                                                alert (div);
            $('.travel_div').append(div);
        });
    });
</script>
</html>  

