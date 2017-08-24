$(function () {

    var b = BASE_URL;
    
    
    // this is for section head checking of a particular section
    $('#section').change(function () {
//        alert(123);
        var b = BASE_URL;
        var section = $(this).val();
        var firm_seq_no = $('#firm_seq_no').val();
//        alert(section);
      
         $.ajax({ 
            url: b + 'attorney/remove_secHead/',
            type: 'post',
//            dataType: 'json',
            data: {
                section: section,
                firm_seq_no: firm_seq_no
            },
            success: function (data) {
//                 alert(data);
                $('#user_approver_type').html(data);
            }
        });
    });
    
  // this is for Managing partner checking of a particular firm
  $('#firm_seq_no').change(function (){
//      alert(123);
      var b = BASE_URL;
      var firm_seq_no = $(this).val();
//      alert(firm_seq_no);
      $.ajax({
          url : b + 'attorney/remove_managingPartner',
          type: 'post',
          data: {
             firm_seq_no: firm_seq_no 
          },
          success: function(data){
//              alert(data);
            $('#designation').html(data);  
          }
      });
  });
    

    $("#add_new_attorney_btn").on('click', function () {
//        var firm_seq_no = $('#firm_seq_no').val();
        $("#add_new_attorney_frm1").validate({
            errorClass: 'customErrorClass',
            rules: {
                firm_seq_no: {
                    required: true
                },
                user_id: {
                    required: true,
                    email:true,
                    remote: {
                        url: b + 'attorney/user_id_check/',
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
                designation:{
                    required:true  
                },
                group_code:{
                    required: true
                },
                section:{
                    required:true
                },
                user_approver_type: {
                   required: true 
                },
                attorney_id: {
                    required: true
                },
                attorney_code: {
                    required: true
                },
                attorney_first_name: {
                    required: true
                },
                attorney_last_name: {
                    required: true
                },
                
//                attorney_gender: {
//                    required: true
//                },
//                attorney_education: {
//                    required: true
//                },
//                bar_registration_no: {
//                    required: true
//                },
//                firm_join_date: {
//                    required: true
//                },
//                full_part_time: {
//                    required: true
//                },
//                attorney_jurisdiction: {
//                    required: true
//                },
//                hourly_comp_cost: {
//                    required: true
//                },
//                industry_type: {
//                    required: true
//                },
//                benefit_factor: {
//                    required: true
//                },
//                overhead_amount: {
//                    required: true
//                },
//                billing_rate_opp_cost: {
//                    required: true
//                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
//                fax:{
//                    required: true
//                },
//                mobile: {
//                    required: true
//                },
//                web_url: {
//                    required: true,
//                    url:true
//                },
//                social_url: {
//                    required: true,
//                    url:true  
//                },
                addr_line1: {
                    required: true
                },
//                addr_line2: {
//                    required: true
//                },
//                addr_line3: {
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
                },
//                profile_photo: {
//                    required:true,
//                    accept: "image/jpeg"
//                },
//                remarks: {
//                    required: true
//                },
//                day: {
//                    required: "<font color=\"red\">Please select day.</font> "
//                },
//                month: {
//                    required: "<font color=\"red\">Please select month.</font> "
//                },
//                year: {
//                    required: "<font color=\"red\">Please select year.</font> "
//                },
//                attorney_type:{
//                    required: true
//                },
//                join_date:{
//                    required:true
//                }
//                practice_date:{
//                    required:true
//                }

            },
            messages: {
                firm_seq_no: {
                    required: "<font color=\"red\">Please select firm</font> "
                },
                 user_id: {
                    required: "<font color=\"red\">Please enter a User ID</font> ",
                    email: "<font color=\"red\">only emails are accepted</font> ",
                    remote: "<font color=\"red\">User ID already exists </font>"
                },
                password: {
                    required: "<font color=\"red\">Please enter your password</font> ",
                    minlength: "<font color=\"red\">Your password must be more than 8 characters</font>",
                    maxlength: "<font color=\"red\">Your password should be less than 12 characters</font>"
                },
                designation: {
                    required: "<font color=\"red\">Please select designation</font> "
                    
                },
                group_code:{
                    required: "<font color=\"red\">Please select group</font> "
                },
                section: {
                    required: "<font color=\"red\">Please select section</font> "
                },
                 user_approver_type:{
                     required: "<font color=\"red\">Please select Approver Type</font> "
                 },
                attorney_id: {
                    required: "<font color=\"red\">Please enter attorney id</font> "
                },
                attorney_code: {
                    required: "<font color=\"red\">Please enter attorney code</font> "
                },
                attorney_first_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                attorney_last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                }, 
//                attorney_gender: {
//                    required: "<font color=\"red\">Please select gender</font> "
//                },
//                attorney_education: {
//                    required: "<font color=\"red\">Please enter education</font> "
//                },
//                bar_registration_no: {
//                    required: "<font color=\"red\">Please enter bar registration no</font> "
//                },
//                firm_join_date: {
//                    required: "<font color=\"red\">Please enter firm join date</font> "
//                },
//                full_part_time: {
//                    required: "<font color=\"red\">Please enter job type</font> "
//                },
//                attorney_jurisdiction: {
//                    required: "<font color=\"red\">Please enter jurisdiction</font> "
//                },
//                hourly_comp_cost: {
//                    required: "<font color=\"red\">Please enter hourly cost</font> "
//                },
//                industry_type: {
//                    required: "<font color=\"red\">Please enter industry type</font> "
//                },
//                benefit_factor: {
//                    required: "<font color=\"red\">Please enter benefit factor</font> "
//                },
//                overhead_amount: {
//                    required: "<font color=\"red\">Please enter overhead amount</font> "
//                },
//                billing_rate_opp_cost: {
//                    required: "<font color=\"red\">Please enter billing rate opp cost</font> "
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
//                mobile: {
//                    required: "<font color=\"red\">Please enter mobile</font> "
//                },
//                web_url: {
//                    required: "<font color=\"red\">Please enter web url</font> ",
//                     url:"<font color=\"red\">Please enter valid URL</font> "
//                },
//                social_url: {
//                    required: "<font color=\"red\">Please enter social url</font> ",
//                     url:"<font color=\"red\">Please enter valid URL</font> "
//                },
                addr_line1: {
                    required: "<font color=\"red\">Please enter address line 1</font> "
                },
//                addr_line2: {
//                    required: "<font color=\"red\">Please enter address line 2</font> "
//                },
//                addr_line3: {
//                    required: "<font color=\"red\">Please enter address line 3</font> "
//                },
                country: {
                    required: "<font color=\"red\">Please enter country</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter state</font> "
                },
                city: {
                    required: "<font color=\"red\">Please select city</font> "
                },
                postal_code: {
                    required: "<font color=\"red\">Please enter postal code</font> ",
                    maxlength: "<font color=\"red\">Invalid postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                },
//                profile_photo: {
//                    required: "<font color=\"red\">Please select a file</font> ",
//                    accept: "<font color=\"red\">File type should be JPG, PNG </font> "
//                },
//                remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                },
//                day: {
//                    required: "<font color=\"red\">Please select day.</font> "
//                },
//                month: {
//                    required: "<font color=\"red\">Please select month.</font> "
//                },
//                year: {
//                    required: "<font color=\"red\">Please select year.</font> "
//                },
//                attorney_type:{
//                    required: "<font color=\"red\">Please select an Attorney Type</font> "
//                },
//                join_date:{
//                    required: "<font color=\"red\">Please select a proper date</font> "
//                }
//                practice_date:{
//                    required: "<font color=\"red\">Please select a proper date</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of attorney add
    
    // Beginning of attorney edit
   $("#edit_attorney_btn_main").on('click', function () { //alert(b);
      
       $("#edit_attorney_frm").validate({
            errorClass: 'customErrorClass',
            rules: {
                firm_seq_no: {
                    required: true
                },
                user_id: {
                    required: true,
                    email:true,
                    remote: {
                        url: b + 'attorney/edit_id_check/',
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
                designation: {
                    required : true    
                },
                
                group_code:{
                    required: true
                },
                
                user_approver_type: {
                   required: true 
                },
                
                attorney_id: {
                    required: true
                },
                attorney_code: {
                    required: true
                },
                attorney_first_name: {
                    required: true
                },
                attorney_last_name: {
                    required: true
                },
                
//                attorney_gender: {
//                    required: true
//                },
//                attorney_education: {
//                    required: true
//                },
//                bar_registration_no: {
//                    required: true
//                },
//                firm_join_date: {
//                    required: true
//                },
//                full_part_time: {
//                    required: true
//                },
//                attorney_jurisdiction: {
//                    required: true
//                },
//                hourly_comp_cost: {
//                    required: true
//                },
//                industry_type: {
//                    required: true
//                },
//                benefit_factor: {
//                    required: true
//                },
//                overhead_amount: {
//                    required: true
//                },
//                billing_rate_opp_cost: {
//                    required: true
//                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
//                fax:{
//                    required: true
//                },
//                mobile: {
//                    required: true
//                },
//                web_url: {
//                    required: true,
//                    url:true
//                },
//                social_url: {
//                    required: true,
//                    url:true  
//                },
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
                },
//                profile_photo: {
//                    required:true,
//                    accept: "image/jpeg"
//                },
//                remarks: {
//                    required: true
//                },
//                day: {
//                    required: true
//                },
//                month: {
//                    required: true
//                },
//                year: {
//                    required: true
//                },
//                attorney_type:{
//                    required: true
//                },
//                join_date:{
//                    required:true
//                }
//                practice_date:{
//                    required:true
//                }

            },
            messages: {
                firm_seq_no: {
                    required: "<font color=\"red\">Please select firm</font> "
                },
                 user_id: {
                    required: "<font color=\"red\">Please enter a User ID</font> ",
                    email: "<font color=\"red\">only emails are accepted</font> ",
                    remote: "<font color=\"red\">User ID already exists </font>"
                },
                password: {
                    required: "<font color=\"red\">Please enter your password</font> ",
                    minlength: "<font color=\"red\">Your password must be more than 8 characters</font>",
                    maxlength: "<font color=\"red\">Your password should be less than 12 characters</font>"
                },
                designation:{
                    required: "<font color=\"red\">Please select designation</font> "
                },
                group_code:{
                    required: "<font color=\"red\">Please select group</font> "
                },
                 user_approver_type:{
                     required: "<font color=\"red\">Please select Approver Type</font> "
                 },
                attorney_id: {
                    required: "<font color=\"red\">Please enter attorney id</font> "
                },
                attorney_code: {
                    required: "<font color=\"red\">Please enter attorney code</font> "
                },
                attorney_first_name: {
                    required: "<font color=\"red\">Please enter first name</font> "
                },
                attorney_last_name: {
                    required: "<font color=\"red\">Please enter last name</font> "
                }, 
//                attorney_gender: {
//                    required: "<font color=\"red\">Please select gender</font> "
//                },
//                attorney_education: {
//                    required: "<font color=\"red\">Please enter education</font> "
//                },
//                bar_registration_no: {
//                    required: "<font color=\"red\">Please enter bar registration no</font> "
//                },
//                firm_join_date: {
//                    required: "<font color=\"red\">Please enter firm join date</font> "
//                },
//                full_part_time: {
//                    required: "<font color=\"red\">Please enter job type</font> "
//                },
//                attorney_jurisdiction: {
//                    required: "<font color=\"red\">Please enter jurisdiction</font> "
//                },
//                hourly_comp_cost: {
//                    required: "<font color=\"red\">Please enter hourly comp cost</font> "
//                },
//                industry_type: {
//                    required: "<font color=\"red\">Please enter industry type</font> "
//                },
//                benefit_factor: {
//                    required: "<font color=\"red\">Please enter benefit factor</font> "
//                },
//                overhead_amount: {
//                    required: "<font color=\"red\">Please enter overhead amount</font> "
//                },
//                billing_rate_opp_cost: {
//                    required: "<font color=\"red\">Please enter billing rate opp cost</font> "
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
//                mobile: {
//                    required: "<font color=\"red\">Please enter mobile</font> "
//                },
//                web_url: {
//                    required: "<font color=\"red\">Please enter web url</font> ",
//                     url:"<font color=\"red\">Please enter valid URL</font> "
//                },
//                social_url: {
//                    required: "<font color=\"red\">Please enter social url</font> ",
//                     url:"<font color=\"red\">Please enter valid URL</font> "
//                },
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
                    maxlength: "<font color=\"red\">Invalid postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                },
//                profile_photo: {
//                    required: "<font color=\"red\">Please select a file</font> ",
//                    accept: "<font color=\"red\">File type should be JPG, PNG </font> "
//                },
//                remarks: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                },
//                day: {
//                    required: "<font color=\"red\">Please select day.</font> "
//                },
//                month: {
//                    required: "<font color=\"red\">Please select month.</font> "
//                },
//                year: {
//                    required: "<font color=\"red\">Please select year.</font> "
//                },
//                attorney_type:{
//                    required: "<font color=\"red\">Please select an Attorney Type</font> "
//                },
//                join_date:{
//                    required: "<font color=\"red\">Please select a proper date</font> "
//                }
//                practice_date:{
//                    required: "<font color=\"red\">Please select a proper date</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    // end of attorney edit
    
    //attorney manager
    $("#save_mgr_att").on('click', function () { //alert(b);
        $("#addattmgr").validate({
            errorClass: 'customErrorClass',
            rules:{
            attorney_manager: {
                    required: true
                }
//                remarks_amg: {
//                    required: true
//                }
            },    
           messages: {
                 attorney_manager: {
                    required: "<font color=\"red\">Please select an attorney manager</font> "
                }
//                remarks_amg: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    
    ////edit attorney manager
    
    $("#edit_mgr_att").on('click', function () { //alert(b);
        $("#addattmgr1").validate({
            errorClass: 'customErrorClass',
            rules:{
            mgr_attorney_manager: {
                    required: true
                }
//                remarks_amg: {
//                    required: true
//                }
            },    
           messages: {
                 mgr_attorney_manager: {
                    required: "<font color=\"red\">Please select an attorney manager</font> "
                }
//                remarks_amg: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    ///// add strategy group
        $("#save_sg_att").on('click', function () { //alert(b);
        $("#addattsg").validate({
            errorClass: 'customErrorClass',
            rules:{
            firm_sgsec_seq_no: {
                    required: true
                }
//                remarks_sg: {
//                    required: true
//                }
            },    
           messages: {
                 firm_sgsec_seq_no: {
                    required: "<font color=\"red\">Please select a strategy group</font> "
                }
//                remarks_sg: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    ///edit strategy group
        $("#save_sg_att_edit").on('click', function () { //alert(b);
        $("#strategy_group_edit_form").validate({
            errorClass: 'customErrorClass',
            rules:{
            firm_sgsec_seq_no: {
                    required: true
                }
//                remarks_sg: {
//                    required: true
//                }
            },    
           messages: {
                 firm_sgsec_seq_no: {
                    required: "<font color=\"red\">Please select a strategy group</font> "
                }
//                remarks_sg: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
        ///add section
        $("#save_sec_att").on('click', function () { //alert(b);
        $("#addattsec").validate({
            errorClass: 'customErrorClass',
            rules:{
            firm_sgsec_seq_no: {
                    required: true
                }
//                remarks_sec: {
//                    required: true
//                }
            },    
           messages: {
                 firm_sgsec_seq_no: {
                    required: "<font color=\"red\">Please select a section</font> "
                }
//                remarks_sec: {
//                    required: "<font color=\"red\">Please write a remark or comment</font> "
//                }
            },
            submitHandler: function (form) {
                // call ajax or submit
                form.submit();
            }
        });
    });
    ///edit section
        $("#save_sec_att").on('click', function () { //alert(b);
        $("#addattsec1").validate({
            errorClass: 'customErrorClass',
            rules:{
            firm_sgsec_seq_no: {
                    required: true
                }
//                remarks_sec: {
//                    required: true
//                }
            },    
           messages: {
                 firm_sgsec_seq_no: {
                    required: "<font color=\"red\">Please select a section</font> "
                }
//                remarks_sec: {
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