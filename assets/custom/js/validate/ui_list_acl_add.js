$(function () {
    $("#acl_user_submit").on('click', function () {
        $("#acl_user_form").validate({
            errorClass: 'customErrorClass',
                        rules: {
                user:{
                    required: true
                 }
//                remarks: {
//                    required: true
//                    
//                }
            },
            messages: {
                user:{
                    required: "<font color=\"red\">Please Select a User</font> "
                    }
//                remarks: {
//                    required: "<font color=\"red\">Please write a Remark or Comment</font> "
//                }
            },
            
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
});

$(function () {
    $("#acl_role_submit").on('click', function () {
        
        $("#acl_role_form").validate({
            errorClass: 'customErrorClass',
                        rules: {
                role_code:{
                    required: true
                 }
//                remarks: {
//                    required: true
//                    
//                }
            },
            messages: {
                role_code:{
                    required: "<font color=\"red\">Please Select a Role</font> "
                    }
//                remarks: {
//                    required: "<font color=\"red\">Please write a Remark or Comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
});

$(function () {
    $("#acl_group_submit").on('click', function () {
        
        $("#acl_group_form").validate({
            errorClass: 'customErrorClass',
                        rules: {
                group_code:{
                    required: true
                 }
//                remarks: {
//                    required: true
//                    
//                }
            },
            messages: {
                group_code:{
                    required: "<font color=\"red\">Please Select a Group</font> "
                    }
//                remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
});
//$(function () {
//    $(".form_button").on('click', function () {
//        
//        $(".user_checkbox_validate").validate({
//            errorClass: 'customErrorClass',
//                        rules: {
//               'read[]':{
//                    required: true
//                 },
//                remarks: {
//                    required: true
//                    
//                }
//            },
//            messages: {
//                'read[]':{
//                    required: "<font color=\"red\">Please Select a user.</font> ",
//                    },
//                remarks: {
//                    required: "<font color=\"red\">Please write a Remark or Comment.</font> "
//                }
//            },
//            submitHandler: function (form) {
//                // call ajax or submit
//                form.submit();
//            }
//        });
//    });
//});
//        
//$(function () {
//    $(".form_button").on('click', function () {
//        
//        $(".role_checkbox_validate").validate({
//            errorClass: 'customErrorClass',
//                        rules: {
//               'read[]':{
//                    required: true
//                 },
//                remarks: {
//                    required: true
//                    
//                }
//            },
//            messages: {
//                'read[]':{
//                    required: "<font color=\"red\">Please Select a roles.</font> ",
//                    },
//                remarks: {
//                    required: "<font color=\"red\">Please write a Remark or Comment.</font> "
//                }
//            },
//            submitHandler: function (form) {
//                // call ajax or submit
//                form.submit();
//            }
//        });
//    });
//});
// $(function () {
//    $(".form_button").on('click', function () {
//        
//        $(".group_checkbox_validate").validate({
//            errorClass: 'customErrorClass',
//                        rules: {
//               'read[]':{
//                    required: true
//                 },
//                remarks: {
//                    required: true
//                    
//                }
//            },
//            messages: {
//                'read[]':{
//                    required: "<font color=\"red\">Please Select a Group.</font> ",
//                    },
//                remarks: {
//                    required: "<font color=\"red\">Please write a Remark or Comment.</font> "
//                }
//            },
//            submitHandler: function (form) {
//                // call ajax or submit
//                form.submit();
//            }
//        });
//    });
//});
           