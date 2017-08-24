$(function(){
	$("#register-submit-btn").on('click', function() {
             var b = BASE_URL;
	    $("#registration-form").validate({
	        errorClass: 'customErrorClass',
	        rules: {
	            fname: {
	                required: true,
	                maxlength: 30
	            },
	            lname: {
	                required: true,
	                maxlength: 30
	            },
	            address: {
	            	required: true,
	                maxlength: 30
	            },
	            country:{
	            	required: true
	            },
	            state: {
			required: true
	            },
//	            county: {
//			required: true
//	            },
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
	            email: {
			required: true,
			email: true
	            },
	            password: {
			required: true,
			minlength: 8
	            },
	            rpassword: {
			required: true,
			minlength: 8,
			equalTo: "#register_password"
	            }
	        },
	        messages: {
	            fname: {
	                required: "<font color=\"red\">Please enter first name</font> ",
	                maxlength: "<font color=\"red\">Please enter less than 30 character</font>"
	            },
	            lname: {
	                required: "<font color=\"red\">Please enter last name</font> ",
	                maxlength: "<font color=\"red\">Please enter less than 30 character</font>"
	            },
	            address: {
	                required: "<font color=\"red\">Please enter address</font> ",
	                maxlength: "<font color=\"red\">Please enter less than 30 character</font>"
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
                    required: "<font color=\"red\">Please enter postal code</font> ",
                    maxlength: "<font color=\"red\">Invalid postal code</font> ",
                    minlength: "<font color=\"red\">Invalid postal code</font> ",
                    remote: "<font color=\"red\">Wrong postal code </font>"
                },
	            email: {
	            	required: "<font color=\"red\">Please enter email</font> ",
	            	email: "<font color=\"red\">Not an email</font> "
	            },
	            password: {
	            	required: "<font color=\"red\">Please enter password</font> ",
	            	minlength: "<font color=\"red\">Minimum password length 8</font> "
	            },
	            rpassword: {
	            	required: "<font color=\"red\">Please enter re-type password</font> ",
	            	minlength: "<font color=\"red\">Minimum password length 8</font> ",
	            	equalTo: "<font color=\"red\">Password mismatch</font>"
	            }
	        },
	        
	        submitHandler: function(form) {
	        	// call ajax or submit
	        	form.submit();
	        }
	    });
	});
});