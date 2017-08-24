
$(function () {
     var b = BASE_URL;
    
    $("#ui_list_submit").on('click', function () {
//        alert(123);
        $("#ui_list_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                user_interface_id:{
                        required: true,
//                        alphanumeric: true,
                        remote: {
                        url: b + 'UI-lists-security/ui_id_check/',
                        type: "post",
                        data: {
                            user_interface_id: function () {
                                return $('#user_interface_id').val();
                            }

                        }
                    }
                 },
                ui_type: {
                    required: true
                },
                user_interface_name: {
                    required: true
                    
                },
                ui_descriptions: {
                    required: true
                }
//                remarks: {
//                    required: true
//                    
//                }
            },
            messages: {
                user_interface_id:{
                        required: "<font color=\"red\">Please Enter User Interface ID</font> ",
//                        alphanumeric: "<font color=\"red\">User Interface ID must contain atleast one number</font>",
                        remote: "<font color=\"red\">User Interface ID already exists/number</font>"
                    },
                ui_type: {
                    required: "<font color=\"red\">Please Select User Interface Type</font> "
                },
                user_interface_name: {
                    required: "<font color=\"red\">Please Enter User Interface Name</font> "
                },
                ui_descriptions: {
                    required: "<font color=\"red\">Please Enter User Interface Descriptions</font> "
                }
//                remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment </font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    
    $("#ui_list_edit_submit").on('click', function () {
        
        $("#ui_list_edit_form").validate({
            errorClass: 'customErrorClass',
            rules: {
//                remarks: {
//                    required: true
//                    
//                }
            },
             messages: {
//                 remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment </font> "
//                }
             },
               submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }

         });
    });
});


