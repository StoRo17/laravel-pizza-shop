$(document).ready(function(){
    // AJAX Registration
    var registerForm = $("#registerForm");
    registerForm.submit(function(e){
        e.preventDefault();
        var formData = registerForm.serialize();
        $( '#register-errors-name' ).html( "" );
        $( '#register-errors-email' ).html( "" );
        $( '#register-errors-password' ).html( "" );
        $('#register-errors-phone_number').html("");
        $("#register-name").removeClass("has-error");
        $("#register-email").removeClass("has-error");
        $("#register-password").removeClass("has-error");
        $("#register-phone_number").removeClass("has-error");

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

    //AJAX Edit profile
    var editProfileForm = $('#editProfileForm');
    editProfileForm.submit(function (e) {
        e.preventDefault();
        var formData = editProfileForm.serialize();
        console.log(formData);
        $('#edit-errors-name').html('');
        $('#edit-errors-phone_number').html('');
        $('#edit-errors-email').html('');
        $('#edit-name').removeClass('has-error');
        $('#edit-phone_number').removeClass('has-error');
        $('#edit-email').removeClass('has-error');

        $.ajax({
            url: '/user/profile/update',
            type: 'POST',
            data: formData,
            success: function (data) {
                if (data.message) {
                    $('#edit-profile-modal').modal('hide');
                } else {
                    $('#edit-profile-modal').modal('hide');
                    location.reload(true);
                }
            },

            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                if (errors.name) {
                    $('#edit-name').addClass('has-error');
                    $('#edit-errors-name').html(errors.name);
                }
                if (errors.phone_number) {
                    $('#edit-phone_number').addClass('has-error');
                    $('#edit-errors-phone_number').html(errors.phone_number);
                }
                if (errors.email) {
                    $('#edit-email').addClass('has-error');
                    $('#edit-errors-email').html(errors.email);
                }
            }
        })
    });

    var editPasswordForm = $("#editPasswordForm");
    editPasswordForm.submit(function(e) {
        e.preventDefault();
        var formData = editPasswordForm.serialize();
        $('#errors-old_password').html("");
        $('#errors-new_password').html("");
        $('edit-password').removeClass("has-error");
        $('new-password').removeClass("has-error");

        $.ajax({
            url: '/user/profile/update_password',
            type: 'POST',
            data: formData,
            success: function(data) {
                $('#edit-password-modal').modal('hide');
                console.log(data.responseText);
                location.reload(true);
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                if (errors.oldPasswordError) {
                    $('#edit-password').addClass("has-error");
                    $('#errors-old_password').html(errors.oldPasswordError);
                }

                if (errors.newPasswordError) {
                    $('#new-password').addClass("has-error");
                    $('#errors-new_password').html(errors.newPasswordError);
                }
            }
        }); 
    });
    
    // Open and close avatar uploading form
    $('#change-avatar-btn').click(function (e) {
        e.preventDefault();
        var button = $('#change-avatar-btn');
            avatarUploadForm = $('#avatar-upload-form');

        if (button.html() === '<i class="fa fa-close"></i>&nbsp;Скрыть') {
            button.html('<i class="fa fa-camera"></i>&nbsp;Изменить аватар');
            avatarUploadForm.fadeOut('fast');
        } else {
            button.html('<i class="fa fa-close"></i>&nbsp;Скрыть');
            avatarUploadForm.fadeIn('fast');
        }
    });

    // Check before send avatar image on server
    $('#form-upload-btn').click(function (e) {
        var imageName = $('#image-name');
        errorLabel = $('#error-label');
        errorText = $('#error-text');
        if (imageName.val() == '') {
            errorLabel.hide(150);
            errorText.html('Выберите изображение для загрузки!');
            errorLabel.show(200);
            return false;
        }

        var fileExtension = imageName.val().substr(imageName.val().indexOf('.')+1);
        if (fileExtension != 'jpg' && fileExtension != 'png') {
            console.log(fileExtension);
            errorLabel.hide(150);
            errorText.html('Изображение может быть только в формате jpg или png!');
            errorLabel.show(200);
            return false;
        }
    });

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

    $(".add-to-cart").click(function(e) {
        e.preventDefault();
        var productId = $(this).attr("product-id");
        $.ajax({
            type: 'GET',
            url: '/cart/add_to_cart/',
            data: {productId: productId},
            success: function(data) {
                $("#cart").remove();
                $(".sidebar").html(data.html);
            }  
        });
    });

    $(document).on('click', '.delete-from-cart', function(e) {
        e.preventDefault();
        var productId = $(this).attr("product-id");
        console.log(productId);
        $.ajax({
            type: 'GET',
            url: '/cart/delete_from_cart',
            data: {productId: productId},
            success: function(data) {
                $("#cart").remove();
                $(".sidebar").html(data.html);
            }
        });
    });

    var url = window.location;
    $('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
});

