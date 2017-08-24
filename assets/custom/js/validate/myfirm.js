$(function(){
	
	var b = BASE_URL;

	// begining of generel information
	$("#general-submit-btn").on('click', function() {
	    $("#myfirm-general-info-form").validate({
	        errorClass: 'customErrorClass',
	        rules: {
	            firm_name: {
	                required: true
	            },
	            firm_id: {
	                required: true
	            },
	            firm_code: {
	            	required: true
	            },
	            firm_reg:{
	            	required: true
	            },
	            firm_jurisdiction: {
			required: true
	            }
	        },
	        messages: {
	            firm_name: {
	                required: "<font color=\"red\">Please enter first name</font> "
	            },
	            firm_id: {
	                required: "<font color=\"red\">Please enter last name</font> "
	            },
	            firm_code: {
	                required: "<font color=\"red\">Please enter firm code</font> "
	            },
	            firm_reg: {
	            	required: "<font color=\"red\">Please select country</font> "
	            },
	            firm_jurisdiction: {
	            	required: "<font color=\"red\">Please select state</font> "
	            }
	        },
	        
	        submitHandler: function(form) {
	        	// call ajax or submit
    	        $.ajax({
    	            url :  b + 'my-firm/general-info/',
    	            type : 'post',
    	            dataType : 'json',
    	            data : $("#myfirm-general-info-form").serialize(),
    	            success : function(data){
    	               //alert(data);
    	               if (data.msg == 'update') {
    	               		$('#general_msg_success').css('display', 'block');
    	               		$('#general_msg').html('General information updated');
    	               		
    	               		setTimeout(function() {
    	               		    $('#general_msg_success').hide('fast');
    	               		}, 3000);
    	               }else if (data.msg == 'add') {
    	               		$('#firmid_1').val(data.id) ;
    	               		$('#firmid_2').val(data.id) ;
							$('#firmid_3').val(data.id) ;
							$('#firmid_4').val(data.id) ;

    	               		$('#firm_reg').prop("readonly", true);
    	               		$('#general_msg_success').css('display', 'block');
    	               		$('#general_msg').html('General information added');
    	               		
    	               		$('#address_warning').css('display', 'none');
    	               		$('#validate_div_1').css('display', 'block');

    	               		$('#sp_warning').css('display', 'none');
    	               		$('#validate_div_2').css('display', 'block');

    	               		$('#r_warning').css('display', 'none');
    	               		$('#validate_div_3').css('display', 'block');

    	               		setTimeout(function() {
    	               		    $('#general_msg_success').hide('fast');
    	               		}, 3000);

    	               }else{

    	               }
    	            }
    	        });
	        }
	    });
	});
	// end of generel information

	// address
	$("#address-submit-btn").on('click', function() {
	    $("#myfirm-address-form").validate({
	        errorClass: 'customErrorClass',
	        rules: {
	        	email: {
                            required: true,
                            email: true
	            },
	            phone: {
			required: true
	            },
	            web_url:{
			required: true
	            },
	            addr_line_1: {
	            	required: true
	            },
	            country:{
	            	required: true
	            },
	            state: {
			required: true
	            },
	            county: {
			required: true
	            },
	            city: {
			required: true
	            },
	            postal_code: {
			required: true
	            }
	        },
	        messages: {
	            email: {
	            	required: "<font color=\"red\">Please enter email</font> ",
	            	email: "<font color=\"red\">Not an email</font> "
	            },
	            phone: {
	                required: "<font color=\"red\">Please enter phone</font> "
	            },
	            web_url: {
	                required: "<font color=\"red\">Please enter website url</font> "
	            },
	            addr_line_1: {
	            	required: "<font color=\"red\">Please enter address line 1</font> "
	            },
	            country: {
	            	required: "<font color=\"red\">Please select country</font> "
	            },
	            state: {
	            	required: "<font color=\"red\">Please select state</font> "
	            },
	            county: {
	            	required: "<font color=\"red\">Please select county</font> "
	            },
	            city: {
	            	required: "<font color=\"red\">Please select city</font> "
	            },
	            postal_code: {
	            	required: "<font color=\"red\">Please enter postal code</font> "
	            }
	        },
	        
	        submitHandler: function(form) { 
	        	// call ajax or submit
    	        $.ajax({
    	            url :  b + 'my-firm/address-info/',
    	            type : 'post',
    	            dataType : 'json',
    	            data : $("#myfirm-address-form").serialize(),
    	            success : function(data){
    	               //alert(data);
    	               if (data.msg == 'update') {
    	               		$('#address_msg_success').css('display', 'block');
    	               		$('#address_msg').html('Address information updated');
    	               		
    	               		setTimeout(function() {
    	               		    $('#address_msg_success').hide('fast');
    	               		}, 3000);
    	               }else if (data.msg == 'add') {
    	               		$('#address_seq_no').val(data.id) ;
    	               		
    	               		$('#address_msg_success').css('display', 'block');
    	               		$('#address_msg').html('Address information added');
    	               		setTimeout(function() {
    	               		    $('#address_msg_success').hide('fast');
    	               		}, 3000);

    	               }else{

    	               }
    	            }
    	        });
	        }
	    });
	});
	// end address 

	// single point
	$("#sp-submit-btn").on('click', function() {
	    $("#myfirm-sp-form").validate({
	        errorClass: 'customErrorClass',
	        rules: {
	        	sp_name: {
                            required: true
	            },
	            sp_role: {
			required: true
	            }
	        },
	        messages: {
	            sp_name: {
	            	required: "<font color=\"red\">Please enter single point name.</font> "
	            },
	            sp_role: {
	                required: "<font color=\"red\">Please enter single point role.</font> "
	            }
	        },
	        
	        submitHandler: function(form) { 
	        	// call ajax or submit
    	        $.ajax({
    	            url :  b + 'my-firm/sp-info/',
    	            type : 'post',
    	            dataType : 'json',
    	            data : $("#myfirm-sp-form").serialize(),
    	            success : function(data){
    	               //alert(data);
    	               if (data.msg == 'update') {
    	               		$('#sp_msg_success').css('display', 'block');
    	               		$('#sp_msg').html('Single point information chnaged');
    	               		
    	               		setTimeout(function() {
    	               		    $('#sp_msg_success').hide('fast');
    	               		}, 3000);
    	               }
    	            }
    	        });
	        }
	    });
	});
	// end sp

	//  remarks
	$("#r-submit-btn").on('click', function() {
	    $("#myfirm-r-form").validate({
	        errorClass: 'customErrorClass',
	        rules: {
//	        	remarks: {
//                            required: true
//	            }
	        },
	        messages: {
//	            remarks: {
//	            	required: "<font color=\"red\">Please enter remarks</font> "
//	            }
	        },
	        
	        submitHandler: function(form) { 
	        	// call ajax or submit
    	        $.ajax({
    	            url :  b + 'my-firm/remarks-info/',
    	            type : 'post',
    	            dataType : 'json',
    	            data : $("#myfirm-r-form").serialize(),
    	            success : function(data){
    	               //alert(data);
    	               if (data.msg == 'update') {
    	               		$('#r_msg_success').css('display', 'block');
    	               		$('#r_msg').html('Remarks information chnaged');
    	               		
    	               		setTimeout(function() {
    	               		    $('#r_msg_success').hide('fast');
    	               		}, 3000);
    	               }
    	            }
    	        });
	        }
	    });
	});
	// end remarks
});