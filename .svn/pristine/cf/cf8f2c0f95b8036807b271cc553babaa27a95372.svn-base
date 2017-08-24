$(function () {
    $("#practice_area_survey_submit").on('click', function () {
        $("#practice_area_survey_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                practice_area: {
                    required: true
                },
                sub_practice_area: {
                    required: true
                },
                pa_grade: {
                    required: true
                },
                pa_survey: {
                    required: true
                }
//                firm_attorney: {
//                    required: true,
//                },
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                practice_area: {
                    required: "<font color=\"red\">Please select a practice area</font> "
                },
                sub_practice_area: {
                    required: "<font color=\"red\">Please select a sub pracitce area</font> "
                },
                pa_grade: {
                    required: "<font color=\"red\">Please select a grade or rating</font> "
                },
                pa_survey: {
                    required: "<font color=\"red\">Please select a practice area survey</font> "
                }
//                firm_attorney: {
//                    required: "<font color=\"red\">Please enter long description</font> "
//                },
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
    
     $("#practice_area_survey_edit_submit").on('click', function () {
        $("#practiceareasurvey_edit_form").validate({
            errorClass: 'customErrorClass',
            rules: {
//                practice_area: {
//                    required: true
//                },
//                sub_practice_area: {
//                    required: true
//                },
                pa_grade: {
                    required: true
                },
//                pa_survey: {
//                    required: true
//                },
//                firm_attorney: {
//                    required: true,
//                },
//                remarks: {
//                    required: true
//                }
            },
            messages: {
//                practice_area: {
//                    required: "<font color=\"red\">Please seelct a practice area</font> "
//                },
//                sub_practice_area: {
//                    required: "<font color=\"red\">Please select a sub pracitce area</font> "
//                },
                pa_grade: {
                    required: "<font color=\"red\">Please select a grade or rating</font> "
                }
//                pa_survey: {
//                    required: "<font color=\"red\">Please select a practice area survey</font> "
//                },
//                firm_attorney: {
//                    required: "<font color=\"red\">Please enter long description.</font> "
//                },
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