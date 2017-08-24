$(function () {
    $("#attorney_goal_add_btn").on('click', function () {
        $("#attorney_goal_add_frm").validate({
            errorClass: 'customErrorClass',
            rules: {
               
                attorney_seq_no: {
                    required: true
                },
                current_year: {
                    required: true
                },
                current_year_goal: {
                    required: true
//                    number: true

                },
                current_year_goal_percentage: {
                    required: true,
                    number: true

                },
                summary_info: {
                    required: true
                }
//                remarks_notes: {
//                    required: true
//                }
            },
            messages: {
                
                attorney_seq_no: {
                    required: "<font color=\"red\">Please select a attorney</font> "
                },
                current_year: {
                    required: "<font color=\"red\">Please select current year</font> "
                },
                current_year_goal: {
                    required: "<font color=\"red\">Please enter current year goal</font> "
//                    number: "<font color=\"red\">Please enter numeric value</font> "
                },
                current_year_goal_percentage: {
                    required: "<font color=\"red\">Please enter current year goal percentage</font> ",
                    number: "<font color=\"red\">Please enter numeric value</font> "
                },
                summary_info: {
                    required: "<font color=\"red\">Please enter summary info</font> "
                }
//                remarks_notes: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

    $("#attorney_goal_edit_btn").on('click', function () {
        $("#attorney_goal_edit_frm").validate({
            errorClass: 'customErrorClass',
            rules: {
               
                attorney_seq_no: {
                    required: true/*,
                    remote: {
                        url: BASE_URL + 'attorney-goals/attr-goal-check/',
                        type: "post",
                        data: {
                            attorney_seq_no: function () {
                                return $('#attorney_seq_no').val();
                            }

                        }
                    }*/
                },
                current_year: {
                    required: true
                },
                current_year_goal: {
                    required: true
//                    number: true

                },
                current_year_goal_percentage: {
                    required: true,
                    number: true

                },
                summary_info: {
                    required: true
                }
//                remarks_notes: {
//                    required: true
//                }
            },
            messages: {
               
                  attorney_seq_no: {
                    required: "<font color=\"red\">Please select a attorney</font> "/*,
                    remote: "<font color=\"red\">Goal for this attorney already exist</font> "*/
                },
                current_year: {
                    required: "<font color=\"red\">Please select current year</font> "
                },
                current_year_goal: {
                    required: "<font color=\"red\">Please enter current year goal</font> "
//                    number: "<font color=\"red\">Please enter numeric value</font> "
                },
                current_year_goal_percentage: {
                    required: "<font color=\"red\">Please enter current year goal percentage.</font> ",
                    number: "<font color=\"red\">Please enter numeric value</font> "
                },
                summary_info: {
                    required: "<font color=\"red\">Please enter summary info</font> "
                }
//                remarks_notes: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

});