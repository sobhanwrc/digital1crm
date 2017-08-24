$(function () {
     var b = BASE_URL;
     
    $("#app_users_address_form").validate({
            errorClass: 'customErrorClass',
            rules: {
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
                    
                }
//                remarks_notes: {
//                    required: true
//                }
      
            },
            messages: {
                address_line1: {
                    required: "<font color=\"red\">Address Line 1.</font> "
                },
//                address_line2: {
//                   required: "<font color=\"red\">Address Line 2.</font> "
//                },
//                address_line3: {
//                    required: "<font color=\"red\">Address Line 2.</font> "
//                },
                country: {
                    required: "<font color=\"red\">Please enter country.</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter state.</font> "
                },
//                county: {
//                    required: "<font color=\"red\">Please enter county.</font> "
//                },
                city: {
                    required: "<font color=\"red\">Please enter city.</font> "
                },

                postal_code: {
                    required: "<font color=\"red\">Please enter Postal code.</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email.</font> ",
                    email: "<font color=\"red\">Please enter a valid email.</font>",
                    remote: "<font color=\"red\">Email already exists. </font>"
                    
                },
                phone: {
                    required: "<font color=\"red\">Please enter phone number.</font> "
                },
                mobile_cell: {
                    required: "<font color=\"red\">Please enter mobile number.</font> "
                },
                website_url: {
                    required: "<font color=\"red\">Please enter your website URL.</font> ",
                    url:"<font color=\"red\">Please enter valid URL.</font> "
                },
                social_media_url: {
                    required: "<font color=\"red\">Please enter social media details.</font> ",
                    url:"<font color=\"red\">Please enter valid URL.</font> "
                }
//                remarks_notes: {
//                    required: "<font color=\"red\">Please write a remark or comment.</font> "
//                }
            }
//            submitHandler: function (form) {
//               //ajax call
//                var b = BASE_URL;
//                $.ajax({
//                    url: b+'app-users/add_address',
//                    type: 'POST',
//                    data: $("#app_users_address_form").serialize(),
//                    success:function(form)
//                    {
//                        alert("address form submited");
//                    }
//                });
//                e.preventDefault();
//               
//                form.submit();
//            }
        });
        
        
    
});




