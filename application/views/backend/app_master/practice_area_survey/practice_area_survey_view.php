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
                                <a href="#"> Practice Area Survey </a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Practice Area Survey View</span>
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
                                        <span class="caption-subject bold uppercase">Practice Area Survey informations for edit</span>
                                    </div>
                                                                <div class="actions">
                                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                                             <input type="radio" name="options" class="toggle" id="option1"><a style=" text-decoration: none; color:#fff" href="javascript:void(0)" onclick="history.back()">Back</a></label>
<!--                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                                                    </div>
                                                                </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="tab-pane active" id="tab_1_1">
                                   <form role="form" id="practiceareasurvey_edit_form" method="post" action="<?php echo $base_url . 'practice_area_survey/details/' . base64_encode($practice_area_survey['pa_survey_seq_no']); ?>">
                                       <input type="hidden" name="practice_tab" value="yes">
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

                                        <h3 class="hint"> Edit Practice Area Survey</h3>
                                        <?php //   t($practice_area_survey); exit; ?>   
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Practice Area:</label>
                                                <div class="col-md-8">
                                                   <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($practice_area_survey['pa_code']) && $practice_area_survey['pa_code'] != ''){echo $practice_area_survey['pa_code']; } ?>" <?php if(isset($practice_area_survey['pa_code']) && $practice_area_survey['pa_code'] != ''){echo $practice_area_survey['pa_code']; } ?>>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Sub-practice Area:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($practice_area_survey['sub_pa_code']) && $practice_area_survey['sub_pa_code'] != ''){echo $practice_area_survey['sub_pa_code']; } ?>" <?php if(isset($practice_area_survey['sub_pa_code']) && $practice_area_survey['sub_pa_code'] != ''){echo $practice_area_survey['sub_pa_code']; } ?>>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-md-4 control-label">Rating/Grading:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="pa_grade">
                                                        <option value="">Select One</option>
                                                        <?php foreach ($codes['PA Grade'] as $key1 => $value1) { ?>
                                                            <option value="<?php echo $value1['code'] ?>"  <?php if($value1['code'] == $practice_area_survey['pa_grade_code']){ ?> selected="selected" <?php } ?>><?php echo $value1['short_description'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">PA Survey Done By:</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control "  placeholder=" " name="" disabled value="<?php if(isset($practice_area_survey['survey_done_by']) && $practice_area_survey['survey_done_by'] != ''){echo $practice_area_survey['survey_done_by']; } ?>" <?php if(isset($practice_area_survey['survey_done_by']) && $practice_area_survey['survey_done_by'] != ''){echo $practice_area_survey['survey_done_by']; } ?>>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Remark/Comments:</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="remarks" placeholder="Enter Remarks"><?php if(isset($practice_area_survey['remarks_notes']) && $practice_area_survey['remarks_notes'] != ''){echo $practice_area_survey['remarks_notes']; } ?></textarea>
                                                    <span class="help-block">  </span>
                                                </div>
                                            </div>
                                                <div class="margiv-top-10">
                                                   <button type="submit" id="practice_area_survey_edit_submit" class="btn green" name="practice_area_survey_edit_save_changes">Save</button>
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
            .form-group.required .control-label:after {
                content:"*";
                color:red;
            }
</style>
<script src="<?php echo $assets_path; ?>custom/js/validate/practice_area_survey.js" type="text/javascript"></script>
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


