$(function () {
    $("#app_profiles_submit_btn").on('click', function () {
        $("#appprofilesadd_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                user_id:{
                        required: true
                    },
                base_location: {
                    required: true
                },
                base_session_ref: {
                    required: true
                    
                },
                current_location: {
                    required: true
                },
                current_session_ref: {
                    required: true
                    
                },
                last_device_type: {
                    required: true
                    
                },
                last_IP_address: {
                    required: true
                    
                },
                last_device_ref: {
                    required: true
                    
                },
                 last_accessed_time: {
                    required: true
                    
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                user_id:{
                        required: "<font color=\"red\">Please Select User ID</font> "
                    },
                base_location: {
                    required: "<font color=\"red\">Please Enter Base Location</font> "
                },
                base_session_ref: {
                    required: "<font color=\"red\">Please Enter Base session Reference</font> "
                },
                current_location: {
                    required: "<font color=\"red\">Please Enter Current Location</font> "
                },
                 current_session_ref: {
                    required: "<font color=\"red\">Please Enter Current Session Reference</font> "
                },
                 last_device_type: {
                    required: "<font color=\"red\">Please Enter Last Device Type</font> "
                },
                 last_IP_address: {
                    required: "<font color=\"red\">Please Enter Last IP Address</font> "
                },
                 last_device_ref: {
                    required: "<font color=\"red\">Please Enter Last Device Reference</font> "
                },
                 last_accessed_time: {
                    required: "<font color=\"red\">Please Enter Last Accessed Time</font> "
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


