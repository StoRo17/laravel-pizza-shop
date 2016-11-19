// File upload input form
$(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });

});

$(document).ready(function(){
    // AJAX Registration
    var registerForm = $("#registerForm");
    registerForm.submit(function(e){
        e.preventDefault();
        var formData = registerForm.serialize();
        $( '#register-errors-name' ).html( "" );
        $( '#register-errors-email' ).html( "" );
        $( '#register-errors-password' ).html( "" );
        $("#register-name").removeClass("has-error");
        $("#register-email").removeClass("has-error");
        $("#register-password").removeClass("has-error");

        $.ajax({
            url: '/register',
            type: 'POST',
            data: formData,
            success:function(data){
                $('#register-modal').modal('hide');
                location.reload(true);
            },
            error: function (data) {
                var obj = jQuery.parseJSON( data.responseText );
                if(obj.name) {
                    $("#register-name").addClass("has-error");
                    $( '#register-errors-name' ).html( obj.name );
                }
                if(obj.email) {
                    $("#register-email").addClass("has-error");
                    $( '#register-errors-email' ).html( obj.email );
                }

                if(obj.phone_number) {
                    $("#register-phone_number").addClass("has-error");
                    $("#register-errors-phone_number").html(obj.phone_number);
                }
                if(obj.password) {
                    $("#register-password").addClass("has-error");
                    $( '#register-errors-password' ).html( obj.password );
                }
            }
        });
    });

    //AJAX Login
    var loginForm = $("#loginForm");
    loginForm.submit(function(e) {
        e.preventDefault();
        var formData = loginForm.serialize();
        $('#form-errors-email').html("");
        $('#form-errors-password').html("");
        $('#form-login-errors').html("");
        $("#email-div").removeClass("has-error");
        $("#password-div").removeClass("has-error");
        $("#login-errors").removeClass("has-error");

        $.ajax({
            url: '/login',
            type: 'POST',
            data: formData,
            success: function(data) {
                $('#login-modal').modal('hide');
                location.reload(true);
            },
            error: function(data) {
                console.log(data.responseText);
                var obj = jQuery.parseJSON(data.responseText);
                console.log(obj);
                if (obj.email) {
                    $("#email-div").addClass("has-error");
                    $('#form-errors-email').html(obj.email);
                }
                if (obj.password) {
                    $("#password-div").addClass("has-error");
                    $('#form-errors-password').html(obj.password);
                }
                if (obj.error) {
                    $("#login-errors").addClass('has-error');
                    $("#form-login-errors").html(obj.error);
                }
            }
        });
    });

});

