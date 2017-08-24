$(function () {
    $("#firmcodeadd_submit_btn").on('click', function () {
       
        $("#section-add-form").validate({
            errorClass: 'customErrorClass',
            rules: {
                code_seq_no: {
                    required: true
                },
                section_id: {
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
                code_seq_no: {
                    required: "<font color=\"red\">Please select a section type</font> "
                },
                section_id: {
                    required: "<font color=\"red\">Please enter section id</font> "
                },
                code_description: {
                    required: "<font color=\"red\">Please enter code description</font> "
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
    
     $(".section_group_edit_button").on('click', function () {
        $(".section_edit_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                code_seq_no: {
                    required: true
                },
                section_id: {
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
                code_seq_no: {
                    required: "<font color=\"red\">Please select a code</font> "
                },
                section_id: {
                    required: "<font color=\"red\">Please enter section id</font> "
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
                form.submit();
            }
        });
    });
});