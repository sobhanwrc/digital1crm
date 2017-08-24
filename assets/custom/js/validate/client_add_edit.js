$(function () {

    var b = BASE_URL;

    // begining of firm add
    $("#add_new_cli_btn").on('click', function () {
        $("#add_new_cli_frm1").validate({
            errorClass: 'customErrorClass',
            rules: {
                client_id: {
                    required: true
                },
                client_code: {
                    required: true
                },
                client_first_name: {
                    required: true
                },
                client_last_name: {
                    required: true
                },
                org_name: {
                    required: true
                },
                org_id: {
                    required: true
                },
                org_code: {
                    required: true
                },
                client_gender: {
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
                client_company_name: {
                    required: true
                },
                industry_type: {
                    required: true
                },
                attorney_seq_no: {
                    required: true
                },
//                social_security_no: {
//                    required: true
//                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
//                fax: {
//                    required: true
//                },
                mobile: {
                    required: true
                },
//                web_url: {
//                    required: true,
//                    url: true
//                },
//                social_url: {
//                    required: true,
//                    url: true
//                },
//                twit: {
//                    required: true,
//                    url: true
//                },
//                link: {
//                    required: true,
//                    url: true
//                },
//                 goog: {
//                    required: true,
//                    url: true
//                },
//                 yout: {
//                    required: true,
//                    url: true
//                },
//                 im: {
//                    required: true,
//                    //url: true
//                },
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
                    maxlength: 5,
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
            },
            messages: {
                client_id: {
                    required: "<font color=\"red\">Please enter client id</font> "
                },
                client_code: {
                    required: "<font color=\"red\">Please enter client code</font> "
                },
                client_first_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                client_last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                org_name: {
                    required: "<font color=\"red\">Please enter organization name</font> "
                },
                org_id: {
                    required: "<font color=\"red\">Please enter organization id</font> "
                },
                org_code: {
                    required: "<font color=\"red\">Please enter organization code</font> "
                },
                client_gender: {
                    required: "<font color=\"red\">Please enter gender</font> "
                },
                day: {
                    required: "<font color=\"red\">Please select a day</font> "
                },
                month: {
                    required: "<font color=\"red\">Please select a month</font> "
                },
                year: {
                    required: "<font color=\"red\">Please select a year</font> "
                },
                client_company_name: {
                    required: "<font color=\"red\">Please enter company name</font> "
                },
                industry_type: {
                    required: "<font color=\"red\">Please select industry type</font> "
                },
                attorney_seq_no: {
                    required: "<font color=\"red\">Please select an Attorney</font> "
                },
//                social_security_no: {
//                    required: "<font color=\"red\">Please enter social security no</font> "
//                },
                email: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> "
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone</font> "
                },
//                fax: {
//                    required: "<font color=\"red\">Please enter fax</font> "
//                },
                mobile: {
                    required: "<font color=\"red\">Please enter mobile</font> "
                },
//                web_url: {
//                    required: "<font color=\"red\">Please enter web url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                social_url: {
//                    required: "<font color=\"red\">Please enter social url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                twit: {
//                    required: "<font color=\"red\">Please enter twitter url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                link: {
//                    required: "<font color=\"red\">Please enter linkedin url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                goog: {
//                    required: "<font color=\"red\">Please enter google plus url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                yout: {
//                    required: "<font color=\"red\">Please enter youtube url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                im: {
//                    required: "<font color=\"red\">Please enter IM </font> ",
//                    //url: "<font color=\"red\">Please enter valid URL</font> "
//                },
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
                    maxlength: "<font color=\"red\">Invalid postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of firm add

    // begining of firm edit
    $("#general-edit-submit-btn").on('click', function () {
        $("#myfirm-general-info-edit-form").validate({
            errorClass: 'customErrorClass',
            rules: {
                firm_admin_seq_no: {
                    required: true
                },
                firm_name: {
                    required: true
                },
                firm_id: {
                    required: true
                },
                firm_code: {
                    required: true
                },
                firm_jurisdiction: {
                    required: true
                },
                sp_name: {
                    required: true
                },
                sp_role: {
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
                    url: true
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
                    maxlength: 5,
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
            },
            messages: {
                firm_admin_seq_no: {
                    required: "<font color=\"red\">Please select firm admin</font> "
                },
                firm_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                firm_id: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                firm_code: {
                    required: "<font color=\"red\">Please enter firm code</font> "
                },
                firm_jurisdiction: {
                    required: "<font color=\"red\">Please enter firm jurisdiction</font> "
                },
                sp_name: {
                    required: "<font color=\"red\">Please enter single point name</font> "
                },
                sp_role: {
                    required: "<font color=\"red\">Please enter single point role</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> "
                },
                phone: {
                    required: "<font color=\"red\">Please enter Phone Number</font> ",
                   
                },
                 fax: {
                    required: "<font color=\"red\">Please enter fax Number</font> ",
                   
                },
                mobile: {
                    required: "<font color=\"red\">Please enter Phone Number</font> ",
                    
                },
                web_url: {
                    required: "<font color=\"red\">Please enter your Website URL</font> ",
                    url: "<font color=\"red\">Please enter valid URL</font> "
                },
                social_url: {
                    required: "<font color=\"red\">Please enter Social Media Details</font> ",
                    url: "<font color=\"red\">Please enter valid URL</font> "
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
                    maxlength: "<font color=\"red\">Invalid postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of firm edit

    // begining of firm Location Add
    $("#add-location-submit-btn").on('click', function () {
        $("#add-location-form").validate({
            errorClass: 'customErrorClass',
            rules: {
                email1: {
                    required: true,
                    email: true,
                    remote: {
                        url: b + 'firm/add_location_user_exist/',
                        type: "post",
                        data: {
                            email: function () {
                                return $('#email1').val();
                            }

                        }
                    }
                },
                phone1: {
                    required: true
                },
                mobile1: {
                    required: true
                },
                web_url1: {
                    required: true
                },
                social_url1: {
                    required: true
                },
                addr_line_11: {
                    required: true
                },
//                addr_line_21: {
//                    required: true
//                },
//                addr_line_31: {
//                    required: true
//                },
                country1: {
                    required: true
                },
                state1: {
                    required: true
                },
                county1: {
                    required: true
                },
                city1: {
                    required: true
                },
                postal_code1: {
                    required: true
                }
            },
            messages: {
                email1: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> ",
                    remote: "<font color=\"red\">Email already exist</font>"
                },
                phone1: {
                    required: "<font color=\"red\">Please enter phone</font> "
                },
                mobile1: {
                    required: "<font color=\"red\">Please enter mobile</font> "
                },
                web_url1: {
                    required: "<font color=\"red\">Please enter web url</font> "
                },
                social_url: {
                    required: "<font color=\"red\">Please enter social url</font> "
                },
                addr_line_11: {
                    required: "<font color=\"red\">Please enter address line 1.</font> "
                },
//                addr_line_21: {
//                    required: "<font color=\"red\">Please enter address line 2.</font> "
//                },
//                addr_line_31: {
//                    required: "<font color=\"red\">Please enter address line 3.</font> "
//                },
                country1: {
                    required: "<font color=\"red\">Please select country</font> "
                },
                state1: {
                    required: "<font color=\"red\">Please select state</font> "
                },
                county1: {
                    required: "<font color=\"red\">Please select county</font> "
                },
                city1: {
                    required: "<font color=\"red\">Please select city</font> "
                },
                postal_code1: {
                    required: "<font color=\"red\">Please enter postal code</font> "
                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                var url_ = $('#url_submit1').val();
                $.ajax({
                    url: url_,
                    type: 'post',
                    dataType: 'json',
                    data: $("#add-location-form").serialize(),
                    success: function (data) {
                        if (data.result == 'ok') {
                            location.reload();
                        }
                    }
                });
            }
        });
    });
    // end of firm firm Location Add

    // begining of firm Location edit using class
    $(".firm_location_edit").on('click', function () {
        $(".firm_location_edit_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                email2: {
                    required: true,
                    email: true,
                    remote: {
                        url: b + 'firm/add_location_user_exist/',
                        type: "post",
                        data: {
                            email: function () {
                                return $('#email2').val();
                            },
                            original_email: function () {
                                return $('#hidden_original_email').val();
                            }
                        }
                    }
                },
                phone2: {
                    required: true
                },
                mobile2: {
                    required: true
                },
                web_url2: {
                    required: true
                },
                social_url2: {
                    required: true
                },
                addr_line_12: {
                    required: true
                },
//                addr_line_22: {
//                    required: true
//                },
//                addr_line_32: {
//                    required: true
//                },
                country2: {
                    required: true
                },
                state2: {
                    required: true
                },
                county2: {
                    required: true
                },
                city2: {
                    required: true
                },
                postal_code2: {
                    required: true
                }
            },
            messages: {
                email2: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> ",
                    remote: "<font color=\"red\">Email already exist </font>"
                },
                phone2: {
                    required: "<font color=\"red\">Please enter phone</font> "
                },
                mobile2: {
                    required: "<font color=\"red\">Please enter mobile</font> "
                },
                web_url2: {
                    required: "<font color=\"red\">Please enter web url</font> "
                },
                social_url2: {
                    required: "<font color=\"red\">Please enter social url</font> "
                },
                addr_line_12: {
                    required: "<font color=\"red\">Please enter address line 1.</font> "
                },
//                addr_line_22: {
//                    required: "<font color=\"red\">Please enter address line 2</font> "
//                },
//                addr_line_32: {
//                    required: "<font color=\"red\">Please enter address line 3</font> "
//                },
                country2: {
                    required: "<font color=\"red\">Please select country</font> "
                },
                state2: {
                    required: "<font color=\"red\">Please select state</font> "
                },
                county2: {
                    required: "<font color=\"red\">Please select county</font> "
                },
                city2: {
                    required: "<font color=\"red\">Please select city</font> "
                },
                postal_code2: {
                    required: "<font color=\"red\">Please enter postal code</font> "
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
    // end of firm Location edit using class
    
    //add client cases
    $("#save_client_case_add").on('click', function () { 
        $("#add_client_case_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                
                case_id: {
                    required: true
                },
                case_type: {
                    required: true
                },
                case_date: {
                    required: true
                },
                case_description: {
                    required: true
                },
                contact_name_ref: {
                    required: true
                },
                origination_percentage: {
                    required: true,
                    numeric: true
                }
            },
            messages: {
                
                case_id: {
                    required: "<font color=\"red\">Please Enter Case ID</font> "
                },
                case_type: {
                    required: "<font color=\"red\">Please Enter Case Type</font> "
                },
                case_date: {
                    required: "<font color=\"red\">Please Enter Case Date</font> "
                },
                case_description: {
                    required: "<font color=\"red\">Please Enter Case Description</font> "
                },
                contact_name_ref: {
                    required: "<font color=\"red\">Please Enter Contact Name.</font> "
                },
                origination_percentage: {
                    required: "<font color=\"red\">Please Enter Origination Percentage</font> ",
                    numeric: "<font color=\"red\">Please Enter Origination Percentage as numeric</font> "
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
   });
    
    ////////// IMPORT form Validation///////////
    $("#import_client_submit").on('click', function () {
        
        $("#import_client_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                attorney_seq_no: {
                    required: true
                },
               xls_file: {
                    required:true
                }
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
//                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                attorney_seq_no: {
                    required: "<font color=\"red\">Please select an attorney</font> "
                },
                xls_file: {
                    required: "<font color=\"red\">Please select a file</font> "
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
    
    
    $("#add_new_cli_contact_btn").on('click', function () {
        $("#add_new_cli_contact").validate({
            errorClass: 'customErrorClass',
            rules: {
              
                client_first_name: {
                    required: true
                },
                client_last_name: {
                    required: true
                },
                designation: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
//                fax: {
//                    required: true
//                },
//                social_url: {
//                    required: true,
//                    url: true
//                },
//                twit: {
//                    required: true,
//                    url: true
//                },
//                link: {
//                    required: true,
//                    url: true
//                },
//                 goog: {
//                    required: true,
//                    url: true
//                },
//                 yout: {
//                    required: true,
//                    url: true
//                },
//                 im: {
//                    required: true,
//                    //url: true
//                }
//                
                
            },
            messages: {
                
                client_first_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                client_last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                designation: {
                    required: "<font color=\"red\">Please enter designation name</font> "
                },
                
                email: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> "
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone</font> "
                },
//                fax: {
//                    required: "<font color=\"red\">Please enter fax</font> "
//                },
//                
//                social_url: {
//                    required: "<font color=\"red\">Please enter social url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                twit: {
//                    required: "<font color=\"red\">Please enter twitter url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                link: {
//                    required: "<font color=\"red\">Please enter linkedin url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                goog: {
//                    required: "<font color=\"red\">Please enter google plus url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                yout: {
//                    required: "<font color=\"red\">Please enter youtube url</font> ",
//                    url: "<font color=\"red\">Please enter valid URL</font> "
//                },
//                im: {
//                    required: "<font color=\"red\">Please enter IM </font> ",
//                    //url: "<font color=\"red\">Please enter valid URL</font> "
//                }
                
            },
//            submitHandler: function (form) {
//                // call ajax or submit
//                form.submit();
//            }
        });
    });
});