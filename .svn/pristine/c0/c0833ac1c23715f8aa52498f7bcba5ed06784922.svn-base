$(function () {
    $("#change_password_submit").on('click', function () {
        $("#change_password_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                password: {
                    required: true
                },
                new_pass: {
                    required: true,
                    minlength: 8
                },
                con_pass: {
                    required: true,
                    equalto: "#new_pass"
                }
            },
            messages: {
                password: {
                    required: "<font color=\"red\">Please enter old password</font> "
                },
                new_pass: {
                    required: "<font color=\"red\">Please enter new password</font> ",
                    maxlength: "<font color=\"red\">Your password must be more than 8 characters</font>"

                },
                con_pass: {
                    required: "<font color=\"red\">Please enter confirm password</font> ",
                    equalto: "<font color=\"red\">Please enter same as new password</font> "
                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });

    $("#superadmin_submit").on('click', function () {
//          alert(123);
        $("#superadmin_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                firm: {
                    required: true
                },
                username: {
                    required: true

                },
                password: {
                    required: true
                }

            },
            messages: {
                firm: {
                    required: "<font color=\"red\">Please select a firm</font> "
                },
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
    
       $("#budget_savetosession").on('click', function () { 
               //alert("Hi");
         var isChecked = jQuery("input[name=opt]:checked").val();
     if(!isChecked){
         alert('Please Select An Option');
     }
         });
});