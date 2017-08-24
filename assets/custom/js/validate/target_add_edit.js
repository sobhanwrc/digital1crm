$(function () {

    var b = BASE_URL;

    // begining of firm add
    $("#general-submit-btn").on('click', function () {
        $("#myfirm-general-info-form").validate({
            errorClass: 'customErrorClass',
            rules: {
                org_name: {
                    required: true
                },
                org_id: {
                    required: true
                },
                org_code: {
                    required: true
                },
                target_first_name: {
                    required: true
                },
                target_last_name: {
                    required: true
                },
                target_id: {
                    required: true,
//                    remote:{
//                        url: b + 'targets/target_id_check/',
//                        type: "post",
//                        data: {
//                            user_id: function () {
//                                return $('#target_id').val();
//                            }
//
//                        }
//                    }
                },
                target_code: {
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
                target_gender: {
                    required: true
                },
                target_status:{
                    required: true
                },
                industry_type:{
                    required: true
                },
                attorney_seq_no:{
                    required: true
                },
                target_company_name: {
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
                mobile: {
                    required: true
                },
//                web_url: {
//                    required: true,
//                    url:true
//                },
//                social_url: {
//                    required: true,
//                    url:true  
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
//                remarks:{
//                    required: true
//                },
//                remarks1:{
//                    required : true
//                }
            },
            messages: {
                target_first_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                target_last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                target_id: {
                    required: "<font color=\"red\">Please enter target id</font> ",
                    //remote: "<font color=\"red\">Target ID already exist </font>"
                },
                target_code: {
                    required: "<font color=\"red\">Please enter target code</font> "
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
                day: {
                    required: "<font color=\"red\">Please select a day</font> "
                },
                month: {
                    required: "<font color=\"red\">Please select a month</font> "
                },
                year: {
                    required: "<font color=\"red\">Please select a year</font> "
                },
                target_gender: {
                    required: "<font color=\"red\">Please select target gender</font> "
                },
                target_status:{
                    required: "<font color=\"red\">Please select target status</font> "
                },
                industry_type:{
                    required: "<font color=\"red\">Please select industry type</font> "
                },
                attorney_seq_no:{
                    required: "<font color=\"red\">Please select an Attorney</font> "
                },
                target_company_name: {
                    required: "<font color=\"red\">Please enter target company name</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">not an email</font> "
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone</font> "
                },
//                fax: {
//                    required: "<font color=\"red\">Please enter phone</font> "
//                },
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
                 twit: {
                    required: "<font color=\"red\">Please enter twitter url</font> ",
                    url: "<font color=\"red\">Please enter valid URL</font> "
                },
                link: {
                    required: "<font color=\"red\">Please enter linkedin url</font> ",
                    url: "<font color=\"red\">Please enter valid URL</font> "
                },
                goog: {
                    required: "<font color=\"red\">Please enter google plus url</font> ",
                    url: "<font color=\"red\">Please enter valid URL</font> "
                },
                yout: {
                    required: "<font color=\"red\">Please enter youtube url</font> ",
                    url: "<font color=\"red\">Please enter valid URL</font> "
                },
                im: {
                    required: "<font color=\"red\">Please enter IM </font> ",
                    //url: "<font color=\"red\">Please enter valid URL</font> "
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
                    minlength: "<font color=\"red\">Invalid postal code1</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                }
//                remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                },
//                remarks1:{
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of firm add

    // begining of firm edit
    $("#target-general-submit-btn").on('click', function () {
        $("#target-general-info-form").validate({
            errorClass: 'customErrorClass',
            rules: {
                target_first_name: {
                    required: true
                },
                target_last_name: {
                    required: true
                },
                target_id: {
                    required: true,
                   remote: {
                        url: b + 'targets/is_target_exists/',
                        type: "post",
                        data: {
                            target_id: function () {
                                return $('#target_id').val();
                            },
                            target_id_original: function () {
                                return $('#target_id_original').val();
                            }

                        }
                    }
                },
                target_code: {
                    required: true
                },
                target_dob: {
                    required: true
                },
                target_gender: {
                    required: true
                },
                target_status:{
                    required: true
                },
                target_company_name: {
                    required: true
                },
                industry_type:{
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
//                remarks1:{
//                    required : true
//                },
               
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
            },
            messages: {
                target_first_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                target_last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                },
                target_id: {
                    required: "<font color=\"red\">Please enter target id</font> ",
                    remote: "<font color=\"red\">Target ID already exists </font>"
                },
                target_code: {
                    required: "<font color=\"red\">Please enter target code</font> "
                },
                target_dob: {
                    required: "<font color=\"red\">Please enter target dob</font> "
                },
                target_gender: {
                    required: "<font color=\"red\">Please enter target gender</font> "
                },
                industry_type:{
                    required: "<font color=\"red\">Please select industry type</font> "
                },
                target_company_name: {
                    required: "<font color=\"red\">Please enter target company name</font> "
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
                    minlength: "<font color=\"red\">Invalid postal code1</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                }
//                remarks1:{
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
                
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of target edit
    
    // beginning of link add
    $("#link_attorney_submit").on('click', function () {
        $("#attorney_link_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                attorney_seq_no: {
                    required: true
                }
//                remarks_ag: {
//                    required: true
//                }
            },
            messages: {
                attorney_seq_no: {
                    required: "<font color=\"red\">Please select an attorney</font> "
                }
//                remarks_ag: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of link add
    
    //beginning of link edit
    
    $("#link_edit_attorney_submit").on('click', function () {
        $("#attorney_link_edit_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                attorney_seq_no: {
                    required: true
                }
//                remarks_ag: {
//                    required: true
//                }
            },
            messages: {
                attorney_seq_no: {
                    required: "<font color=\"red\">Please select an attorney</font> "
                }

            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    
    //end of link edit
      ////////// IMPORT form Validation///////////
    $("#import_target_submit").on('click', function () {
        
        $("#import_target_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                attorney_seq_no: {
                    required: true
                },
               xls_file: {
                    required:true
                }

            },
            messages: {
                attorney_seq_no: {
                    required: "<font color=\"red\">Please select an attorney</font> "
                },
                xls_file: {
                    required: "<font color=\"red\">Please select a file</font> "
                }

            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
});