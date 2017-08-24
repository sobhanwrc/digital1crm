$(function () {
    $("#firmcodeadd_submit_btn1").on('click', function () {
       
        $("#strategygroupadd_form1").validate({
            errorClass: 'customErrorClass',
            rules: {
                section_id: {
                    required: true
                },
                code_description: {
                    required: true
                },
                long_description: {
                    required: true
                },
                remarks: {
                    required: true
                }
            },
            messages: {
                section_id: {
                    required: "<font color=\"red\">Please enter section id</font> "
                },
                code_description: {
                    required: "<font color=\"red\">Please enter code description</font> "
                },
                long_description: {
                    required: "<font color=\"red\">Please enter long description</font> "
                },
                remarks: {
                    required: "<font color=\"red\">Please write a remark or comment</font> "
                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
  });
    



