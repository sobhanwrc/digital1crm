$(function () { 
    $("#app_codes_submit").on('click', function () {
        $("#app_codes_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                category: {
                    required: true,
                },
                code: {
                    required: true,
                    maxlength: 20,
                    remote: {
                        url: BASE_URL + 'app_codes/code_check/',
                        type: "post",
                        data: {
                            code: function () {
                                return $('#code').val();
                            }

                        }
                    }
                },
                short_description: {
                    required: true,
                    maxlength: 70
                },
                long_description: {
                    required: true,
                    maxlength: 100
                },
                firm_customization: {
                    required: true
                },
                full_visibility: {
                    required: true
                },
                paid_subscription: {
                    required: true
                },
//                remarks:{
//                    required:true
//                }
                
            },
            messages: {
                category: {
                    required: "<font color=\"red\">Please select category</font> ",
                },
                code: {
                    required: "<font color=\"red\">Please enter code</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 20 character</font>",
                    remote: "<font color=\"red\">Code already exists</font>"
                },
                short_description: {
                    required: "<font color=\"red\">Please enter short description</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 70 character</font>"
                },
                long_description: {
                    required: "<font color=\"red\">Please enter long description</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 100 character</font>"
                },
                firm_customization: {
                    required: "<font color=\"red\">Please select firm customization</font> "
                },
                full_visibility: {
                    required: "<font color=\"red\">Please select full visibility</font> "
                },
                paid_subscription: {
                    required: "<font color=\"red\">Please select paid subscription</font> "
                },
//                remarks:{
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    //////////// App Codes Edit Begin /////////////////
        $("#app_codes_edit_submit_btn").on('click', function () {
        $(".section_edit_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                category: {
                    required: true
                },
                code: {
                    required: true,
                    maxlength: 20
                },
                short_description: {
                    required: true,
                    maxlength: 70
                },
                long_description: {
                    required: true,
                    maxlength: 100
                },
                firm_customization: {
                    required: true
                },
                full_visibility: {
                    required: true
                },
                paid_subscription: {
                    required: true
                }
//                remarks:{
//                    required:true
//                }
                
            },
            messages: {
                category: {
                    required: "<font color=\"red\">Please select category</font> ",
                },
                code: {
                    required: "<font color=\"red\">Please enter code</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 20 character</font>",
                    remote: "<font color=\"red\">Code already exists</font>"
                },
                short_description: {
                    required: "<font color=\"red\">Please enter short description</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 70 character</font>"
                },
                long_description: {
                    required: "<font color=\"red\">Please enter long description</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 100 character</font>"
                },
                firm_customization: {
                    required: "<font color=\"red\">Please select firm customization</font> "
                },
                full_visibility: {
                    required: "<font color=\"red\">Please select full visibility</font> "
                },
                paid_subscription: {
                    required: "<font color=\"red\">Please select paid subscription</font> "
                }
//                remarks:{
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    
     $("#acl_group_submit").on('click', function () {
        $("#link_client_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                group_code: {
                    required: true,
                },
                
                pre_fy: {
                    required: true,
                    },
                pre_fy_goal: {
                    required: true,
                },
                goal: {
                    required: true
                }

                
            },
            messages: {
                group_code: {
                    required: "<font color=\"red\">Please Select group code</font> ",
                },
                pre_fy: {
                    required: "<font color=\"red\">Please Enter Previous FY</font> ",
                   
                },
                pre_fy_goal: {
                    required: "<font color=\"red\">Please Enter Previous FY Goal</font> ",
                  
                },
                goal: {
                    required: "<font color=\"red\">Please Enter Goal</font> ",
                   
                }
             

            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    
});