$(function () {
     var b = BASE_URL;
     
    $("#appuser_user_info_submit").on('click', function () {

        $("#appuser_user_info_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                user_id: {
                    required: true,
                    email:true,
                    minlength: 6,
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
                user_name: {
                    required: true
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                role_code: {
                    required: true
                },
                group_code: {
                    required: true
                },
//                short_description: {
//                    required: true,
//                    maxlength: 70
//                },
//                long_description: {
//                    required: true,
//                    maxlength: 100
//                },
                authorized_by: {
                    required: true,
                    minlength: 3
                },
                authorized_date: {
                    required: true
                },
//                remarks_notes: {
//                    required: true
//                },
                 address_line_1: {
                    required: true
                },
                address_line2: {
                    required: true
                    
                },
                address_line3: {
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
                        url: b + 'app-users/email_check/',
                        type: "post",
                        data: {
                            email: function () {
                                return $('#email').val();
                            },
                            original_email: function () {
                                return $('#original_email').val();
                            }

                        }
                    }
                },
                phone: {
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
                }
//                remarks:{
//                        required: true
//                    }
            },
            messages: {
                user_id: {
                    required: "<font color=\"red\">Please enter a User ID</font>",
                    email: "<font color=\"red\">Please enter a valid Email</font>",
                    remote: "<font color=\"red\">User ID already exists </font>"
                },
                user_name: {
                    required: "<font color=\"red\">Please enter a Username</font> ",
                    minlength: "<font color=\"red\">Username too short</font> ",
                    maxlength: "<font color=\"red\">Exceeding 30 character limit</font> "
                },
                 first_name: {
                    required: "<font color=\"red\">Please enter a First name</font>"
                },
                 last_name: {
                    required: "<font color=\"red\">Please enter a Last name</font>"
                },
                password: {
                    required: "<font color=\"red\">Please enter your Password</font>",
                    maxlength: "<font color=\"red\">Your password must be more than 8 characters</font>"
                },
                role_code: {
                    required: "<font color=\"red\">Please select Role</font>"
                },
                group_code: {
                    required: "<font color=\"red\">Please select Group</font>"
                },
//                short_description: {
//                    required: "<font color=\"red\">Please enter Short Description</font> ",
//                    maxlength: "<font color=\"red\">Please enter less than 70 character</font>"
//                },
//                long_description: {
//                    required: "<font color=\"red\">Please enter Long Description</font> ",
//                    maxlength: "<font color=\"red\">Please enter less than 100 character</font>"
//                },
                authorized_by: {
                    required: "<font color=\"red\">Please select an Authorization Party</font> "
                },
                authorized_date: {
                    required: "<font color=\"red\">Please select a proper Authorization Date</font> "
                },
//                remarks_notes: {
//                    required: "<font color=\"red\">Please write a Remark or Comment</font> "
//                },
                address_line_1: {
                    required: "<font color=\"red\">Address Line 1</font> "
                },
                address_line2: {
                   required: "<font color=\"red\">Address Line 2</font> "
                },
                address_line3: {
                    required: "<font color=\"red\">Address Line 3</font> "
                },
                postal_code: {
                    required: "<font color=\"red\">Please enter Postal Code</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter Email</font> ",
                    email: "<font color=\"red\">Please enter a valid Email</font>",
                    remote: "<font color=\"red\">Email already exist </font>"
                    
                },
                phone: {
                    required: "<font color=\"red\">Please enter Phone Number</font> "
                },
                mobile: {
                    required: "<font color=\"red\">Please enter Mobile Number</font> "
                },
                web_url: {
                    required: "<font color=\"red\">Please enter your Website URL</font> ",
                    url:"<font color=\"red\">Please enter valid URL</font> "
                },
                social_url: {
                    required: "<font color=\"red\">Please enter Social Media Details</font> ",
                    url:"<font color=\"red\">Please enter valid URL</font> "
                }
//                remarks: {
//                    required: "<font color=\"red\">Please write a Remark or Comment</font> "
//                }
            }
        });
    });
});



