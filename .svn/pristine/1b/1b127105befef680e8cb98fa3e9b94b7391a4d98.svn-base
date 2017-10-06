<div class="page-footer">
    
    
	<div class="col-md-7"><div class="page-footer-inner"> @ 2017 © Digital1 CRM </div></div>
    
		<div class="col-md-5">
			<div class="page-logo">
            <a href="<?php echo $base_url; ?>dashboard">
                <img src="<?php echo $assets_path; ?>pages/img/inner_logo.jpg" alt="logo" class="logo-default" /> </a>
        </div>
			
		</div>

    
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>


<!--<script src="<?php echo $assets_path; ?>custom/js/jquery.validate.min.js" type="text/javascript"></script>-->

<style>
 .page-footer .page-logo {
background: #000;
margin-top: 0px;   
padding-left: 13px;
margin-right: 50px;
margin-bottom: 10px;
padding-right: 0;
text-align: left;
width: 250px;
padding-top: 4px;
padding-bottom: 2px;
float: right;
}
.page-footer .page-logo > a img {
    height: 35px;
    width: auto;
}

</style>
<script type="text/javascript">
    
    $(document).ready(function() {
        // passing api controller using for call.
        
        $('.call_now').on('click',function(){
            var user_name = $(this).attr('name'); 
//            var url = "http://jygsaw.com/digital1crm/api/push_notification"; // checking in server
//            var url = "http://localhost/digital1crm/api/push_notification"; //checking in local server
//            var url = "http://jygsaw.com/digital1/api/push_notification"; //checking in jygsaw main server http://www.digital1crm.com/
            var url = BASE_URL + "api/push_notification"; //checking in main server http://www.digital1crm.com/
            var id = $(this).attr('val');
            var from_model = $(this).attr('from_model'); 
            
            if(from_model == 'module1'){
                var url1 = BASE_URL + "targets/send_module2_from_call";
                
                jconfirm({
                    title: 'Alert !',
                    content: "Are you sure you want to call "+ user_name + "?",
                    buttons: {
                        Yes: function () {
                            $.ajax({
                               type: "POST",
                               url: url1,
                               data: $('#myfirm-general-info-form').serialize()
                            });
                            
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: {
                                    id: id,
                                    from_model: from_model
                                }
                            });
                            jconfirm({
                                title: 'Confirmation !',
                                content: "Please check your mobile to complete the call",
                                buttons:{
                                    OK : function () {
                                        //window.location.href = 'http://www.digital1crm.com/targets';
                                    }                                
                                }
                            });                        
                        },
                        No: function  () {
                            //window.location.reload();
                        }
                    }
                });
                
            }else{
                jconfirm({
                    title: 'Alert !',
                    content: "Are you sure you want to call "+ user_name + "?",
                    buttons: {
                        Yes: function () {
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: {
                                    id: id,
                                    from_model: from_model
                                }
                            });
                            jconfirm({
                                title: 'Confirmation !',
                                content: "Please check your mobile to complete the call",
                                buttons:{
                                    OK : function () {
                                    }                                
                                }
                            });                        
                        },
                        No: function  () {
                            window.location.reload();
                        }
                    }
                });
            }                    
        });
    });
</script>