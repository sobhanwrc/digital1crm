$(function () {

    var b = BASE_URL;

    $("#add_new_employee_btn").on('click', function () { //alert(b);
        $("#add_new_wmployee_frm").validate({
            errorClass: 'customErrorClass',
            rules: {
                firm_seq_no: {
                    required: true
                },
                user_id: {
                    required: true,
                    email: true,
                    remote: {
                        url: b + 'employee/user_id_check/',
                        type: "post",
                        data: {
                            user_id: function () {
                                return $('#user_id').val();
                            }

                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 12
                },
                group_code: {
                    required: true
                },
                designation:{
                    required:true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
                fax:{
                    required: true
                },
                mobile: {
                    required: true
                },
                web_url: {
                    required: true,
                    url:true
                },
                social_url: {
                    required: true,
                    url:true  
                },
                addr_line1: {
                    required: true
                },
//                addr_line2: {
//                    required: true
//                },
                country: {
                    required: true
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                postal_code: {
                    required: true,
                    minlength: 5,
                    remote: {
                        url: b + 'address/zip_code_check/',
                        type: "post",
                        data: {
                            state: function () {
                                return $('#state').val();
                            },
                            city: function () {
                                return $('#city').val();
                            },
                            zip: function () {
                                return $('#postal_code').val();
                            }

                        }
                    }
                },
                emp_first_name: {
                    required: true
                },
                emp_last_name: {
                    required: true
                },
                empstaff_id: {
                    required: true
                },
                empstaff_code: {
                    required: true
                },
                empstaff_gender: {
                    required: true
                },
                empstaff_education: {
                    required: true
                },
                day: {
                    required: true
                },
                month: {
                    required: true
                },
                year: {
                    required: true
                },
                empstaff_title: {
                    required: true
                },
                firm_join_date: {
                    required: true
                },
                full_part_time: {
                    required: true
                },
                experience: {
                    required: true
                },
                salary_cost: {
                    required: true
                },
                benefit_cost: {
                    required: true
                },
                overhead_factor: {
                    required: true
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                firm_seq_no: {
                    required: "<font color=\"red\">Please select firm.</font> "
                },
                user_id: {
                    required: "<font color=\"red\">Please select user.</font> ",
                    email: "<font color=\"red\">only emails are accepted.</font> ",
                    remote: "<font color=\"red\">User ID already exists. </font>"
                },
                password: {
                    required: "<font color=\"red\">Please enter your password.</font> ",
                    minlength: "<font color=\"red\">Your password must be more than 8 characters.</font>",
                    maxlength: "<font color=\"red\">Your password should be less than 12 characters.</font>"
                },
                group_code: {
                    required: "<font color=\"red\">Please select group.</font> "
                },
                designation:{
                    required: "<font color=\"red\">Please select designation.</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> "
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone</font> "
                },
                fax: {
                    required: "<font color=\"red\">Please enter fax</font> "
                },
                mobile: {
                    required: "<font color=\"red\">Please enter mobile</font> "
                },
                web_url: {
                    required: "<font color=\"red\">Please enter web url</font> ",
                     url:"<font color=\"red\">Please enter valid URL</font> "
                },
                social_url: {
                    required: "<font color=\"red\">Please enter social url</font> ",
                     url:"<font color=\"red\">Please enter valid URL</font> "
                },
                addr_line1: {
                    required: "<font color=\"red\">Please enter address line 1.</font> "
                },
//                addr_line2: {
//                    required: "<font color=\"red\">Please enter address line 2.</font> "
//                },
                country: {
                    required: "<font color=\"red\">Please select country.</font> "
                },
                state: {
                    required: "<font color=\"red\">Please select state.</font> "
                },
                city: {
                    required: "<font color=\"red\">Please select city.</font> "
                },
                postal_code: {
                    required: "<font color=\"red\">Please enter postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code1</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                },
                emp_first_name: {
                    required: "<font color=\"red\">Please enter first name.</font> "
                },
                emp_last_name: {
                    required: "<font color=\"red\">Please enter last name.</font> "
                },
                empstaff_id: {
                    required: "<font color=\"red\">Please enter employee/staff id.</font> "
                },
                empstaff_code: {
                    required: "<font color=\"red\">Please enter employee/staff code.</font> "
                },
                empstaff_gender: {
                    required: "<font color=\"red\">Please enter gender.</font> "
                },
                empstaff_education: {
                    required: "<font color=\"red\">Please enter education.</font> "
                },
                day: {
                    required: "<font color=\"red\">Please select day.</font> "
                },
                month: {
                    required: "<font color=\"red\">Please select month.</font> "
                },
                year: {
                    required: "<font color=\"red\">Please select year.</font> "
                },
                empstaff_title: {
                    required: "<font color=\"red\">Please enter firm join date.</font> "
                },
                firm_join_date: {
                    required: "<font color=\"red\">Please select a proper date.</font> "
                },
                full_part_time: {
                    required: "<font color=\"red\">Please enter full/part time.</font> "
                },
                experience: {
                    required: "<font color=\"red\">Please enter employee/staff experience.</font> "
                },
                salary_cost: {
                    required: "<font color=\"red\">Please enter salary.</font> "
                },
                benefit_cost: {
                    required: "<font color=\"red\">Please enter benefit cost.</font> "
                },
                overhead_factor: {
                    required: "<font color=\"red\">Please enter overhead factor.</font> "
                }
//                remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment.</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of employee add
    //beginning of employee add
    $("#edit_employee_btn").on('click', function () { //alert(b);
        $("#edit_employee_frm1").validate({
            errorClass: 'customErrorClass',
            rules: {
                firm_seq_no: {
                    required: true
                },
                user_id: {
                    required: true,
                    email: true,
                    remote: {
                        url: b + 'employee/edit_id_check/',
                        type: "post",
                        data: {
                            user_id: function () {
                                return $('#user_id').val();
                            }

                        }
                    }
                },
                group_code: {
                    required: true
                },
                designation:{
                    required:true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
                fax:{
                    required: true
                },
                mobile: {
                    required: true
                },
                web_url: {
                    required: true,
                    url:true
                },
                social_url: {
                    required: true,
                    url:true  
                },
                addr_line1: {
                    required: true
                },
//                addr_line2: {
//                    required: true
//                },
                country: {
                    required: true
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                postal_code: {
                    required: true,
                    minlength: 5,
                    remote: {
                        url: b + 'address/zip_code_check/',
                        type: "post",
                        data: {
                            state: function () {
                                return $('#state').val();
                            },
                            city: function () {
                                return $('#city').val();
                            },
                            zip: function () {
                                return $('#postal_code').val();
                            }

                        }
                    }
                },
                emp_first_name: {
                    required: true
                },
                emp_last_name: {
                    required: true
                },
                empstaff_id: {
                    required: true
                },
                empstaff_code: {
                    required: true
                },
                empstaff_gender: {
                    required: true
                },
                empstaff_education: {
                    required: true
                },
                day: {
                    required: true
                },
                month: {
                    required: true
                },
                year: {
                    required: true
                },
                empstaff_title: {
                    required: true
                },
                firm_join_date: {
                    required: true
                },
                full_part_time: {
                    required: true
                },
                experience: {
                    required: true
                },
                salary_cost: {
                    required: true
                },
                benefit_cost: {
                    required: true
                },
                overhead_factor: {
                    required: true
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                firm_seq_no: {
                    required: "<font color=\"red\">Please select firm</font> "
                },
                user_id: {
                    required: "<font color=\"red\">Please select user</font> ",
                    email: "<font color=\"red\">only emails are accepted</font> ",
                    remote: "<font color=\"red\">User ID already exists</font>"
                },
                group_code: {
                    required: "<font color=\"red\">Please select group</font> "
                },
                designation: {
                    required: "<font color=\"red\">Please select designation</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> "
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone</font> "
                },
                fax: {
                    required: "<font color=\"red\">Please enter fax</font> "
                },
                mobile: {
                    required: "<font color=\"red\">Please enter mobile</font> "
                },
                web_url: {
                    required: "<font color=\"red\">Please enter web url</font> ",
                     url:"<font color=\"red\">Please enter valid URL</font> "
                },
                social_url: {
                    required: "<font color=\"red\">Please enter social url</font> ",
                     url:"<font color=\"red\">Please enter valid URL</font> "
                },
                addr_line1: {
                    required: "<font color=\"red\">Please enter address line 1</font> "
                },
//                addr_line2: {
//                    required: "<font color=\"red\">Please enter address line 2</font> "
//                },
                country: {
                    required: "<font color=\"red\">Please select country</font> "
                },
                state: {
                    required: "<font color=\"red\">Please select state</font> "
                },
                city: {
                    required: "<font color=\"red\">Please select city</font> "
                },
                postal_code: {
                    required: "<font color=\"red\">Please enter postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                },
                emp_first_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                emp_last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                empstaff_id: {
                    required: "<font color=\"red\">Please enter employee/staff id</font> "
                },
                empstaff_code: {
                    required: "<font color=\"red\">Please enter employee/staff code</font> "
                },
                empstaff_gender: {
                    required: "<font color=\"red\">Please enter gender</font> "
                },
                empstaff_education: {
                    required: "<font color=\"red\">Please enter education</font> "
                },
                day: {
                    required: "<font color=\"red\">Please select day.</font> "
                },
                month: {
                    required: "<font color=\"red\">Please select month.</font> "
                },
                year: {
                    required: "<font color=\"red\">Please select year.</font> "
                },
                empstaff_title: {
                    required: "<font color=\"red\">Please enter firm join date</font> "
                },
                firm_join_date: {
                    required: "<font color=\"red\">Please select a proper date</font> "
                },
                full_part_time: {
                    required: "<font color=\"red\">Please enter job type</font> "
                },
                experience: {
                    required: "<font color=\"red\">Please enter employee/staff experience</font> "
                },
                salary_cost: {
                    required: "<font color=\"red\">Please enter salary</font> "
                },
                benefit_cost: {
                    required: "<font color=\"red\">Please enter benefit cost</font> "
                },
                overhead_factor: {
                    required: "<font color=\"red\">Please enter overhead factor</font> "
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