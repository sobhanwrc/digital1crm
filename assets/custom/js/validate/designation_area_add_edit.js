$(function () {
    
    ////////// Add Validation///////////
    $("#request_designation_submit").on('click', function () {
        
        $("#request_designation_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                'designation_seq_no[]': {
                    required: true
                },
                prac_area_code: {
                    required: true
//                    remote: {
//                        url: BASE_URL + 'practice_area/pa_code_exist/',
//                        type: "post",
//                        data: {
//                            user_id: function () {
//                                return $('#prac_area_code').val();
//                            }
//
//                        }
//                    }
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                'designation_seq_no[]': {
                    required: "<font color=\"red\">Please enter practice area name</font> "
                },
                prac_area_code: {
                    required: "<font color=\"red\">Please enter practice area code</font> "
//                    remote: "<font color=\"red\">Practice area code already exists </font>"
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
    


