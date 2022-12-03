$(document).ready(function(){
    $("#showhidepass").on('click', function() {
        if($('#user_password').attr("type") == "text"){
            $('#user_password').attr('type', 'password');
            $('#showhidepass i').addClass( "fa-eye-slash" );
            $('#showhidepass i').removeClass( "fa-eye" );
        }else if($('#user_password').attr("type") == "password"){
            $('#user_password').attr('type', 'text');
            $('#showhidepass i').removeClass( "fa-eye-slash" );
            $('#showhidepass i').addClass( "fa-eye" );
        }
    });

    $("#showhidepass1").on('click', function() {
        if($('#currentpassword').attr("type") == "text"){
            $('#currentpassword').attr('type', 'password');
            $('#showhidepass1 i').addClass( "fa-eye-slash" );
            $('#showhidepass1 i').removeClass( "fa-eye" );
        }else if($('#currentpassword').attr("type") == "password"){
            $('#currentpassword').attr('type', 'text');
            $('#showhidepass1 i').removeClass( "fa-eye-slash" );
            $('#showhidepass1 i').addClass( "fa-eye" );
        }
    });

    $("#showhidepass2").on('click', function() {
        if($('#newPassword').attr("type") == "text"){
            $('#newPassword').attr('type', 'password');
            $('#showhidepass2 i').addClass( "fa-eye-slash" );
            $('#showhidepass2 i').removeClass( "fa-eye" );
        }else if($('#newPassword').attr("type") == "password"){
            $('#newPassword').attr('type', 'text');
            $('#showhidepass2 i').removeClass( "fa-eye-slash" );
            $('#showhidepass2 i').addClass( "fa-eye" );
        }
    });

    $("#showhidepass3").on('click', function() {
        if($('#confirmPassword').attr("type") == "text"){
            $('#confirmPassword').attr('type', 'password');
            $('#showhidepass3 i').addClass( "fa-eye-slash" );
            $('#showhidepass3 i').removeClass( "fa-eye" );
        }else if($('#confirmPassword').attr("type") == "password"){
            $('#confirmPassword').attr('type', 'text');
            $('#showhidepass3 i').removeClass( "fa-eye-slash" );
            $('#showhidepass3 i').addClass( "fa-eye" );
        }
    });

    $("#btnPrPasswordEditSave").click(function(event){

        var formData = {
            password: $("#password").val(),
            currentpassword: $("#currentpassword").val(),
        };

        $.ajax({
                type: "POST",
                url: "api/users/checkpass",
                data: formData, // serializes the form's elements.
                dataType: "json",
                encode: true,
                success: function(data)
                {
                    if(data==1){
                        if($("#newPassword").val().length>=8){
                            if($("#newPassword").val() == $("#confirmPassword").val()){
                                event.preventDefault();
                                var formData = {
                                    id: $("#ids").val(),
                                    password:$("#newPassword").val(),
                                };
            
                                $.ajax({
                                    type: "PUT",
                                    url: "api/users/"+formData.id+"/updatePassword",
                                    data: formData, // serializes the form's elements.
                                    dataType: "json",
                                    encode: true,
                                    success: function(data)
                                    {
                                        swal.fire({
                                            position: "top-end",
                                            icon: "success",
                                            title: "Your work has been saved",
                                            showConfirmButton: false,
                                            timer: 1500,
                                            footer: "<a href>InnovaTech</a>",
                                        });
                                        $('#changePasswordForm')[0].reset();
                                        $('#changePasswordModal').modal('hide');
                                        localStorage.clear();  
                                        document.getElementById('logout-form').submit();
                                        // location.replace('logout');
                                    }
                                });
            
                            }else{
                                swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: "Password Does Not Match",
                                    showConfirmButton: true,
                                    footer: "<a href>InnovaTech</a>",
                                });
                            }
                        }else{
                            swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Minimum Password Length is 8 character",
                                showConfirmButton: true,
                                footer: "<a href>InnovaTech</a>",
                            });
                        }
                    }else{
                        swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Incorrect Current Password",
                            showConfirmButton: true,
                            footer: "<a href>InnovaTech</a>",
                        });
                    }
                }
            });
    });
});