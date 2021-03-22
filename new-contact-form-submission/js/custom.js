//custom js
jQuery(document).ready(function(){
    jQuery(".ncfs_message textarea").focus(function(){
	jQuery(this).parent().addClass("added-placeholder");
	});

	jQuery(".ncfs_message textarea").focusout(function(){
	var get_val = jQuery(this).val();
	if (get_val == "" || get_val == null) {
		jQuery(this).parent().removeClass("added-placeholder");
		jQuery(this).parent().addClass("ncfs_error");
	  }else{
		jQuery(this).parent().removeClass("ncfs_error");  
	  }
	});
	
	jQuery("button#ncfs_submitbtn").click(function(){
		var ncfs_name, ncfs_email, ncfs_phone, ncfs_company, ncfs_mgs,btn_text;
		ncfs_name = jQuery("#ncfs_name").val();
		ncfs_email = jQuery("#ncfs_email").val();
		ncfs_phone = jQuery("#ncfs_phone_number").val();
		ncfs_company = jQuery("#ncfs_company_name").val();
		ncfs_mgs = jQuery("#ncfs_message").val();		
		if(ncfs_name.length<=0){
				jQuery("#ncfs_name").parent().addClass("ncfs_error");
				return false;
			}else if(ncfs_email.length<=0){
				jQuery("#ncfs_email").parent().addClass("ncfs_error");
				return false;
			}else if(ncfs_phone.length<=0){
				jQuery("#ncfs_phone_number").parent().addClass("ncfs_error");
				return false;
			}else if(ncfs_mgs.length<=0){
				jQuery("#ncfs_message").parent().addClass("ncfs_error");
				return false;
			}else{
				function validateEmail(email) {
				  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				  return emailReg.test( email );
				}				
				if(!validateEmail(ncfs_email)) {
					jQuery("#ncfs_email").parent().addClass("ncfs_error invalid_email");
					jQuery(".ncfs_error.invalid_email > p.ncfs_alert").html('Please Enter valid Email!');				
					return false;
				}else{
					var baseurl = ncfsContactJS.admin_url;
					var formData = [ncfs_name,ncfs_email,ncfs_phone,ncfs_company,ncfs_mgs];
					jQuery.ajax({
					url: baseurl + "admin-ajax.php",
					type: 'POST',
					dataType: "html",
					data: {
							action: "ncfs_contact_form_action",formData:formData
						},
					beforeSend:function(){
						jQuery("p#ncfs_success").text("Please wait...");
						jQuery('p#ncfs_success').css("color","green");
					},
					success: function(response){
						//console.log(response);
						setTimeout(function() {							
							jQuery("p#ncfs_success").html(response).show().fadeIn("slow");
							jQuery("p#ncfs_success").css("border","1px solid");
							ncfs_name = jQuery("#ncfs_name").val('');
							ncfs_email = jQuery("#ncfs_email").val('');
							ncfs_phone = jQuery("#ncfs_phone_number").val('');
							ncfs_company = jQuery("#ncfs_company_name").val('');
							ncfs_mgs = jQuery("#ncfs_message").val('');                        
						}, 1000);

					return false;
					}
				
					}); 
				}
			}				
		});
	jQuery("input").focusout(function(){
		var input_val = jQuery(this).val();
		if(input_val.length<=0){
				jQuery(this).parent().addClass("ncfs_error");
				return false;
			}else{
			jQuery(this).parent().removeClass("ncfs_error");	
			}
		
	});
	

});
