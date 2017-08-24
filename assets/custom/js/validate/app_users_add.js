$(function () {
    var b = BASE_URL;
    $("#app_users_submit").on('click', function () {

        $("#app_users_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                user_id: {
                    required: true,
                    email:true,
                    remote: {
                        url: b + 'app-users/user_id_check/',
                        type: "post",
                        data: {
                            user_id: function () {
                                return $('#user_id').val();
                            }

                        }
                    }
                },
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 12
                },
                
                address_line1: {
                    required: true
                },
//                address_line2: {
//                    required: true
//                    
//                },
//                address_line3: {
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
                    number:true
                },
                email: {
                    required: true,
                    email: true,
                       remote: {
                        url: b + 'app-user/email_check/',
                        type: "post",
                        data: {
                            email: function () {
                                return $('#email').val();
                            }

                        }
                    }
                    
                },
                phone: {
                    required: true
                },
                mobile_cell: {
                    required: true
                },
                 website_url: {
                    required: true,
                    url:true
                    
                },
                 social_media_url: {
                    required: true,
                    url:true
                    
                },
//                 remarks:{
//                    required:true
//                },
                
                role_code: {
                    required: true
                },
                group_code: {
                    required: true
                },
                short_description: {
                    required: true,
                    maxlength: 70
                },
                long_description: {
                    required: true,
                    maxlength: 100
                },
                authorized_by: {
                    required: true,
                    minlength: 3
                },
                authorized_date: {
                    required: true
                },
                remarks_notes: {
                    required: true
                }

            },
            messages: {
                user_id: {
                    required: "<font color=\"red\">Please enter a User ID</font> ",
                    email: "<font color=\"red\">only emails are accepted</font> ",
                    remote: "<font color=\"red\">Email already exists</font>"
                },
                first_name: {
                    required: "<font color=\"red\">Please enter First name</font> ",
                },
                last_name: {
                    required: "<font color=\"red\">Please enter Last name</font> ",
                },
                password: {
                    required: "<font color=\"red\">Please enter your password</font> ",
                    minlength: "<font color=\"red\">Your password must be more than 8 characters</font>",
                    maxlength: "<font color=\"red\">Your password should be less than 12 characters</font>"
                },
                 address_line1: {
                    required: "<font color=\"red\">Address Line 1</font> "
                },
//                address_line2: {
//                   required: "<font color=\"red\">Address Line 2.</font> "
//                },
//                address_line3: {
//                    required: "<font color=\"red\">Address Line 2.</font> "
//                },
                country: {
                    required: "<font color=\"red\">Please enter country</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter state</font> "
                },
//                county: {
//                    required: "<font color=\"red\">Please enter county.</font> "
//                },
                city: {
                    required: "<font color=\"red\">Please enter city</font> "
                },

                postal_code: {
                    required: "<font color=\"red\">Please enter Postal code</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email</font> ",
                    email: "<font color=\"red\">Please enter a valid email</font>",
                    remote: "<font color=\"red\">Email already exists </font>"
                    
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone number</font> "
                },
                mobile_cell: {
                    required: "<font color=\"red\">Please enter mobile number</font> "
                },
                website_url: {
                    required: "<font color=\"red\">Please enter your website URL</font> ",
                    url:"<font color=\"red\">Please enter valid URL</font> "
                },
                social_media_url: {
                    required: "<font color=\"red\">Please enter social media details</font> ",
                    url:"<font color=\"red\">Please enter valid URL</font> "
                },
//                remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                },
                
                role_code: {
                    required: "<font color=\"red\">Please select role.</font> "
                },
                group_code: {
                    required: "<font color=\"red\">Please select group.</font> "
                },
                short_description: {
                    required: "<font color=\"red\">Please enter short description.</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 70 character</font>"
                },
                long_description: {
                    required: "<font color=\"red\">Please enter long description.</font> ",
                    maxlength: "<font color=\"red\">Please enter less than 100 character</font>"
                },
                authorized_by: {
                    required: "<font color=\"red\">Please select an authorization party</font> "
                },
                authorized_date: {
                    required: "<font color=\"red\">Please select a proper authorization date</font> "
                },
                remarks_notes: {
                    required: "<font color=\"red\">Please write a remark or comment</font> "
                }
            },
            submitHandler: function (form) {
                if ($('#address_group').is(":visible")) {
                    $('#addres_text').show();
                    $('#address_button').addClass('customErrorClass');
                } else {
                    // call ajax or submit
                    form.submit();
                }

            }
        });
    });
});

