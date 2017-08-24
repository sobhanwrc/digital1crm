$(function () {
    $("#add_new_activity_btn").on('click', function () {
        $("#add_new_activity_frm").validate({
            errorClass: 'customErrorClass',
            rules: {
                activity_type: {
                    required: true
                },
                activity_name: {
                    required: true
                },
                activity_goal_radio: {
                    required: true
                },
                new_act_goal: {
                     required: true
                 },
                 existing_act_goal: {
                     required: true
                 },
                 firm_sg_seq_no: {
                     required: true
                 },
                 firm_section_seq_no: {
                     required: true
                 },
                activity_reason_desc: {
                    required: true
                },
                potential_revenue: {
                    required: true
                },
                activity_status: {
                    required: true
                },
                practice_area_type: {
                    required: true
                },
                activity_created_date: {
                    required: true
                },
                duration_from: {
                    required: true
                },
                duration_to: {
                    required: true
                }
//                remarks_notes: {
//                    required: true
//                }                
            },
            messages: {
                activity_type: {
                    required: "<font color=\"red\">Please select activity type</font> "
                },
                activity_name: {
                    required: "<font color=\"red\">Please select activity name</font> "
                },
                activity_goal_radio: {
                    required: "<font color=\"red\">Please select activity goal</font> "
                },
                 new_act_goal: {
                    required: "<font color=\"red\">Please enter new activity goal</font> "
                },
                existing_act_goal: {
                    required: "<font color=\"red\">Please select from existing activity goals</font> "
                },
                 firm_sg_seq_no: {
                     required: "<font color=\"red\">Please select strategy group .</font> "
                 },
                 firm_section_seq_no: {
                     required: "<font color=\"red\">Please select section.</font> "
                 },
                activity_reason_desc: {
                    required: "<font color=\"red\">Please enter activity reason</font> "
                },
                potential_revenue: {
                    required: "<font color=\"red\">Please enter potential revenue</font> "
                },
                activity_status: {
                    required: "<font color=\"red\">Please select activity status</font> "
                },
                practice_area_type: {
                    required: "<font color=\"red\">Please select practice area type</font> "
                },
                activity_created_date: {
                    required: "<font color=\"red\">Please enter activity created date</font> "
                },
                duration_from: {
                    required: "<font color=\"red\">Please enter duration from</font> "
                },
                duration_to: {
                    required: "<font color=\"red\">Please enter duration to</font> "
                }
//                remarks_notes: {
//                    required: "<font color=\"red\">Please enter remarks notes</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
        $("#add_attr_act_btn").on('click', function () {
        $("#add_attr_act_frm").validate({
            errorClass: 'customErrorClass',
            rules: {
                "attorney_seq_no[]": {
                    required: true
                }
            },
            messages: {
                "attorney_seq_no[]": {
                    required: "<font color=\"red\">Please select atleast one attorney</font> "
                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
});