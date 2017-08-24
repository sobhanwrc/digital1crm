$(function () {
    $("#conversion_submit").on('click', function () {
        $("#conversion_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                conv_doc_ref: {
                    required: true
                },
                conv_approved_by: {
                    required: true
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                conv_doc_ref: {
                    required: "<font color=\"red\">Please enter conversion document reference</font> "
                },
                conv_approved_by: {
                    required: "<font color=\"red\">Please select an approver</font> "
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