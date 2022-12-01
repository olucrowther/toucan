// JavaScript Document
$(init);

function init(){

	$('#loginForm').on('submit', function(e){
		
		e.preventDefault();

		$('.login-btn').html('Wait...');
		
		var email = $.trim($('#email-add').val());
		var password = $.trim($('#password').val());

		var data = {'email' : email, 'password' : password};

		$.ajaxSetup ({ cache: false });
        $.ajax({			
        
    		url: baseUrl+"login/login_user/",
    		type: "POST",
    		data : data,
    		
    		success: function(data) {
    		    
    			if(data == 1){
    			    
    			    //redirect to employee list page
					window.location.href = baseUrl+"member-list";
	                
    			}else{
    			    
    			    $('.login-alert').html(data);
					
					$('.login-alert').css('display', 'block');

					$('.login-btn').html('Login');

    			    return false;
    			    
    			}
    
    		},

            error: function() {

                $('.login-alert').html('Error!!!');

				$('.login-alert').css('display', 'block');
				
				$('.login-btn').html('Login');

            }
        
        });
			
	});
}
