$(function () {
    
    ////////// Add Validation///////////
    $("#practice_area_submit").on('click', function () {
        
        $("#practice_area_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                prac_area_name: {
                    required: true
                },
                prac_area_code: {
                    required: true
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
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                prac_area_name: {
                    required: "<font color=\"red\">Please enter practice area name</font> "
                },
                prac_area_code: {
                    required: "<font color=\"red\">Please enter practice area code</font> "
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
    
  ///////////////  Edit Validation ////////////
   $(".practice_area_edit_submit").on('click', function () {
     
       var abc = $(this).attr('abc');
//         alert(abc);
        $("#practice_area_edit_form_"+abc).validate({
            errorClass: 'customErrorClass',
            rules: {
                prac_area_name: {
                    required: true
                },
                prac_area_code: {
                    required: true
//                    remote: {
//                       url: BASE_URL + 'practice_area/edit_pa_code_exist/',
//                        type: "post",
//                        data: {
//                            prac_area_code: function () {
//                                return $('#prac_area_code_'+abc).val();
//                            },
//                            prac_area_code1: function () {
//                                return $('#original_prac_area_code_'+abc).val();
//                            }
//                        }
//                    }
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                prac_area_name: {
                    required: "<font color=\"red\">Please enter practice area name</font> "
                },
                prac_area_code: {
                    required: "<font color=\"red\">Please enter practice area code</font> "
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
        
//        var form=$(this).form();
//        var valid=form.valid();
//        alert(valid);
//        if(valid){
//            form.submit();
//        }
    });
   $("#request_practice_area_submit").on('click', function () {
        
        $("#request_practice_area_form").validate({
            errorClass: 'customErrorClass',
            rules: {
                 user_seq_no: {
                    required: true
                },
                prac_area_name: {
                    required: true
                },
                request_reason: {
                    required: true
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
                }
//                remarks: {
//                    required: true
//                }
            },
            messages: {
                user_seq_no: {
                    required: "<font color=\"red\">Please select one from the list</font> "
                },
                prac_area_name: {
                    required: "<font color=\"red\">Please enter practice area name</font> "
                },
                request_reason: {
                    required: "<font color=\"red\">Please enter your reason for the request</font> "
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
});    
    


