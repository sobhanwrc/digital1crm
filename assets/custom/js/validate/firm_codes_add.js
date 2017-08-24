$(function () {
    $(".submit_btn_class").on('click', function () {
        $(".firm_code_form_class").validate({
            errorClass: 'customErrorClass',
            rules: {
                short_description: {
                    required: true,
                    maxlength: 50
                },
                long_description: {
                    required: true,
                    maxlength: 100
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                short_description: {
                    required: "<font color=\"red\">Please enter short description</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 30 character</font>"
                },
                long_description: {
                    required: "<font color=\"red\">Please enter long description</font> "
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
    
    $("#superadmin_submit1").on('click', function () {
//          alert(123);
        $("#superadmin_form1").validate({
            errorClass: 'customErrorClass',
            rules: {
                username: {
                    required: true

                },
                password: {
                    required: true
                }

            },
            messages: {
                username: {
                    required: "<font color=\"red\">Please enter username</font> "
                },
                password: {
                    required: "<font color=\"red\">Please enter password</font> "

                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });

    });
    
     
     
});