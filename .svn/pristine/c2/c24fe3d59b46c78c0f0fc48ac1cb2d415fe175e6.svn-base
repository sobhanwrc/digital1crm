$(function () {

    var b = BASE_URL;

    // begining of competitor add
    $("#general-submit-btn").on('click', function () {
        $("#myfirm-general-info-form").validate({
            errorClass: 'customErrorClass',
            rules: {
                competitor_id: {
                    required: true
                },
                competitor_code: {
                    required: true
                },
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
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
                industry_type: {
                    required: true
                },
                experience: {
                    required: true
                },
                bar_date: {
                    required: true
                },
                bar_state: {
                    required: true
                },
                independent: {
                    required: true
                },
                chambers: {
                    required: true
                },
                best: {
                    required: true
                },
                martindale: {
                    required: true
                },
                super_lawyers: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
                fax: {
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
                addr_line_1: {
                    required: true
                },
//                addr_line_2: {
//                    required: true
//                },
//                addr_line_3: {
//                    required: true
//                },
                country: {
                    required: true
                },
                state: {
                    required: true
                },
//                county: {
//                    required: true
//                },
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
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                competitor_id: {
                    required: "<font color=\"red\">Please Enter Competitor ID</font> "
                },
                competitor_code: {
                    required: "<font color=\"red\">Please enter Competitor Code</font> "
                },
                first_name: {
                    required: "<font color=\"red\">Please enter first name</font> ",
                    minlength: "<font color=\"red\">Please enter a propername</font> "
                },
                last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                day: {
                    required: "<font color=\"red\">Please select proper Day</font> "
                },
                month: {
                    required: "<font color=\"red\">Please select proper Month</font> "
                },
                year: {
                    required: "<font color=\"red\">Please select proper Year</font> "
                },
                industry_type: {
                    required: "<font color=\"red\">Please enter industry type</font> "
                },
                experience: {
                    required: "<font color=\"red\">Please enter experience</font> "
                },
                bar_date: {
                    required: "<font color=\"red\">Please select proper bar date</font> "
                },
                bar_state: {
                    required: "<font color=\"red\">Please enter bar state</font> "
                },
                independent: {
                    required: "<font color=\"red\">Please enter independent ranking</font> "
                },
                chambers: {
                    required: "<font color=\"red\">Please enter chamber ranking</font> "
                },
                best: {
                    required: "<font color=\"red\">Please enter best ranking</font> "
                },
                martindale: {
                    required: "<font color=\"red\">Please enter martindale ranking</font> "
                },
                super_lawyers: {
                    required: "<font color=\"red\">Please enter super lawyers ranking</font> "
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
                    url: "<font color=\"red\">Please enter a proper url</font> "
                },
                social_url: {
                    required: "<font color=\"red\">Please enter social url</font> ",
                    url: "<font color=\"red\">Please enter a proper url</font> "
                },
                addr_line_1: {
                    required: "<font color=\"red\">Please enter address line 1</font> "
                },
//                addr_line_2: {
//                    required: "<font color=\"red\">Please enter address line 2</font> "
//                },
//                addr_line_3: {
//                    required: "<font color=\"red\">Please enter address line 3</font> "
//                },
                country: {
                    required: "<font color=\"red\">Please select country</font> "
                },
                state: {
                    required: "<font color=\"red\">Please select state</font> "
                },
//                county: {
//                    required: "<font color=\"red\">Please enter county</font> "
//                },
                city: {
                    required: "<font color=\"red\">Please select city</font> "
                },
                postal_code: {
                    required: "<font color=\"red\">Please enter postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                }
//                remarks: {
//                    required: "<font color=\"red\">Please write a comment or remarks</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of competitor add

    // begining of competitor edit
    $("#general-edit-submit-btn").on('click', function () {
        $("#myfirm-general-info-edit-form").validate({
            errorClass: 'customErrorClass',
            rules: {
                competitor_id: {
                    required: true
                },
                competitor_code: {
                    required: true
                },
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
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
                industry_type: {
                    required: true
                },
                experience: {
                    required: true
                },
                bar_date: {
                    required: true
                },
                bar_state: {
                    required: true
                },
                independent: {
                    required: true
                },
                chambers: {
                    required: true
                },
                best: {
                    required: true
                },
                martindale: {
                    required: true
                },
                super_lawyers: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
                fax: {
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
                    url: true
                },
                addr_line_1: {
                    required: true
                },
//                addr_line_2: {
//                    required: true
//                },
//                addr_line_3: {
//                    required: true
//                },
                country: {
                    required: true
                },
                state: {
                    required: true
                },
//                county: {
//                    required: true
//                },
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
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                competitor_id: {
                    required: "<font color=\"red\">Please Enter Competitor ID</font> "
                },
                competitor_code: {
                    required: "<font color=\"red\">Please enter Competitor Code</font> "
                },
                first_name: {
                    required: "<font color=\"red\">Please enter first name</font> ",
                    minlength: "<font color=\"red\">Please enter a propername</font> "
                },
                last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                day: {
                    required: "<font color=\"red\">Please select proper day</font> "
                },
                month: {
                    required: "<font color=\"red\">Please select proper month</font> "
                },
                year: {
                    required: "<font color=\"red\">Please select proper year</font> "
                },
                industry_type: {
                    required: "<font color=\"red\">Please enter Industry Type</font> "
                },
                experience: {
                    required: "<font color=\"red\">Please enter Experience</font> "
                },
                bar_date: {
                    required: "<font color=\"red\">Please select proper Bar Date</font> "
                },
                bar_state: {
                    required: "<font color=\"red\">Please enter Bar State</font> "
                },
                independent: {
                    required: "<font color=\"red\">Please enter Independent ranking</font> "
                },
                chambers: {
                    required: "<font color=\"red\">Please enter Chamber ranking</font> "
                },
                best: {
                    required: "<font color=\"red\">Please enter Best ranking</font> "
                },
                martindale: {
                    required: "<font color=\"red\">Please enter Martindale ranking</font> "
                },
                super_lawyers: {
                    required: "<font color=\"red\">Please enter Super Lawyers Ranking</font> "
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
                    url: "<font color=\"red\">Please enter url</font> "
                },
                social_url: {
                    required: "<font color=\"red\">Please enter social url</font> ",
                    url:  "<font color=\"red\">Please enter url</font> "
                },
                addr_line_1: {
                    required: "<font color=\"red\">Please enter address line 1</font> "
                },
//                addr_line_2: {
//                    required: "<font color=\"red\">Please enter address line 2</font> "
//                },
//                addr_line_3: {
//                    required: "<font color=\"red\">Please enter address line 3</font> "
//                },
                country: {
                    required: "<font color=\"red\">Please select country</font> "
                },
                state: {
                    required: "<font color=\"red\">Please select state</font> "
                },
//                county: {
//                    required: "<font color=\"red\">Please enter county.</font> "
//                },
                city: {
                    required: "<font color=\"red\">Please select city</font> "
                },
                postal_code: {
                    required: "<font color=\"red\">Please enter postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                }
//                remarks: {
//                    required: "<font color=\"red\">Please write a comment or remarks</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of competitor edit
 
    // begin competitor ranking add
    $("#general_save_change_attr").on('click', function () {
        $(".add_competitor_rank_class").validate({
            errorClass: 'customErrorClass',
            rules:{
                competitor_ranking:{
                    required: true
                }
//                remarks_notes:{
//                    required: true
//                }
                
            },
            messages : {
                
                competitor_ranking: {
                    required: "<font color=\"red\">Please select ranking</font> "
                }
                
//                remarks_notes: {
//                    required: "<font color=\"red\">Please write a comment or remarks</font> "
//                }
                
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
            
        });
    });
    
    //end competitor ranking add
});