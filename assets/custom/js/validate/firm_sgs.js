$(function () {
    $("#firmcodeadd_submit_btn").on('click', function () {
       
        $("#strategygroupadd-form").validate({
            errorClass: 'customErrorClass',
            rules: {
//                code_seq_no: {
//                    required: true
//                },
                "attorney[]":{
                  required: true  
                },
                sg_id: {
                    required: true
                },
                sg_name: {
                    required: true
                },
                long_description: {
                    required: true
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
//                code_seq_no: {
//                    required: "<font color=\"red\">Please select a sg type</font> "
//                },
                "attorney[]": {
                    required: "<font color=\"red\">Please select atleast one attorney</font> "
                },
                sg_id: {
                    required: "<font color=\"red\">Please enter sg id</font> "
                },
                sg_name: {
                    required: "<font color=\"red\">Please enter Strategy group name</font> "
                },
                long_description: {
                    required: "<font color=\"red\">Please enter long description</font> "
                }
//                remarks: {
//                    required: "<font color=\"red\">Please enter remarks</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    
     $(".section_group_edit_button").on('click', function () {
        $(".sg_edit_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                "attorney[]":{
                  required: true  
                },
                code_seq_no: {
                    required: true
                },
                sg_id: {
                    required: true
                },
                code_description: {
                    required: true
                },
                long_description: {
                    required: true
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                "attorney[]": {
                    required: "<font color=\"red\">Please select atleast one attorney</font> "
                },
                code_seq_no: {
                    required: "<font color=\"red\">Please select a code</font> "
                },
                sg_id: {
                    required: "<font color=\"red\">Please enter sg id</font> "
                },
                code_description: {
                    required: "<font color=\"red\">Please enter code description</font> "
                },
                long_description: {
                    required: "<font color=\"red\">Please enter long description</font> "
                }
//                remarks: {
//                    required: "<font color=\"red\">Please enter remarks</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form=$(this).form();
                form.submit();
            }
        });
    });
});