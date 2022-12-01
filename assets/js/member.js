// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            //Prevent page from reloading
            event.preventDefault();
            event.stopPropagation();

            if (!form.checkValidity()) {
            
            
            }else{
                var email = $('.email').val();

                var name = $('.name').val();

                var school = $('.school').val();

                $('.member-btn').html('Wait...');

                var data = {"email" : email, "name" : name, "school" : school};

                $.ajaxSetup ({ cache: false });
                $.ajax({			
                
                    url: baseUrl+"members/add_member/",
                    type: "POST",
                    data : data,
                    
                    success: function(data) {
                        
                        if(data == 1){
                            
                            $('.member-alert').html("Successfully added member");                          
                            
                            $('.member-alert').removeClass('alert-danger');                            
                            
                            $('.member-alert').addClass('alert-success');

                            $('.member-alert').css('display', 'block');

                            $('.member-btn').html('Add member');

                            $('.form-control').val('');

                            $('.form-select').val('');

                            return false;
                            
                        }else{
                            
                            $('.member-alert').html(data);                             
                            
                            $('.member-alert').removeClass('alert-success');                        
                            
                            $('.member-alert').addClass('alert-danger');
                            
                            $('.member-alert').css('display', 'block');

                            $('.member-btn').html('Add member');

                            return false;
                            
                        }
            
                    },
                });
            }

            form.classList.add('was-validated')
        }, false)
        })
})()