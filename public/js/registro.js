document.addEventListener('DOMContentLoaded', function() {
    console.log("Script de registro cargado");

    const togglePassword = document.querySelector("#togglePassword");
    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const password = document.querySelector("#contrasena");
    const confirmPassword = document.querySelector("#contrasena_confirmation");

    togglePassword.addEventListener("click", function() {
        togglePasswordVisibility(password, this);
    });

    toggleConfirmPassword.addEventListener("click", function() {
        togglePasswordVisibility(confirmPassword, this);
    });

    function togglePasswordVisibility(input, icon) {
        const type = input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);
        icon.querySelector('i').classList.toggle("fa-eye");
        icon.querySelector('i').classList.toggle("fa-eye-slash");
    }

    function validarCorreoRegistro() {
        const correoValue = $('#correoRegistro').val().trim();
        const correoPattern = /^zs\d{1,8}$/;
        if (!correoPattern.test(correoValue)) {
            mostrarError('#correoRegistro', 'El correo debe comenzar con "zs" seguido de hasta 8 números');
            return false;
        } else {
            ocultarError('#correoRegistro');
            return true;
        }
    }

    function validarFormularioRegistro() {
        console.log("Validando formulario");
        let isValid = true;

        if ($('#nombre').val().trim() === '') {
            mostrarError('#nombre', 'El nombre es requerido');
            isValid = false;
        } else {
            ocultarError('#nombre');
        }

        if ($('#apellidos').val().trim() === '') {
            mostrarError('#apellidos', 'Los apellidos son requeridos');
            isValid = false;
        } else {
            ocultarError('#apellidos');
        }

        if (!validarCorreoRegistro()) {
            isValid = false;
        }

        if ($('#contrasena').val().length < 8) {
            mostrarError('#contrasena', 'La contraseña debe tener al menos 8 caracteres');
            isValid = false;
        } else {
            ocultarError('#contrasena');
        }

        if ($('#contrasena').val() !== $('#contrasena_confirmation').val()) {
            mostrarError('#contrasena_confirmation', 'Las contraseñas no coinciden');
            isValid = false;
        } else {
            ocultarError('#contrasena_confirmation');
        }

        if ($('#matricula').val().trim() === '') {
            mostrarError('#matricula', 'La matrícula es requerida');
            isValid = false;
        } else {
            ocultarError('#matricula');
        }

        console.log("Formulario válido:", isValid);
        return isValid;
    }

    function mostrarError(campo, mensaje) {
        $(campo).addClass('is-invalid');
        let feedbackElement = $(campo).siblings('.invalid-feedback');
        if (feedbackElement.length === 0) {
            feedbackElement = $('<div class="invalid-feedback"></div>');
            $(campo).parent().append(feedbackElement);
        }
        feedbackElement.text(mensaje);
    }

    function ocultarError(campo) {
        $(campo).removeClass('is-invalid');
        $(campo).siblings('.invalid-feedback').text('');
    }

    function limpiarErrores() {
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');
    }

    $('#correoRegistro').on('input', function() {
        let value = $(this).val();

        // Asegurar que comience con "zs"
        if (value.length < 2) {
            value = 'zs';
        } else if (value.substring(0, 2) !== 'zs') {
            value = 'zs' + value.substring(2);
        }

        // Limitar a 10 caracteres y solo números después de "zs"
        value = 'zs' + value.substring(2).replace(/[^\d]/g, '').substring(0, 8);

        $(this).val(value);
        validarFormularioRegistro();
    });

    function limpiarFormularioRegistro() {
        $('#registroForm')[0].reset();
        limpiarErrores();
    }
    $('#btnRegistro').on('click', function(e) {
        e.preventDefault();
        limpiarErrores();
        if (validarFormularioRegistro()) {
            let formData = new FormData($('#registroForm')[0]);
            let correo = $('#correoRegistro').val().replace('@estudiantes.uv.mx', '');
            formData.set('correo', correo);
            $.ajax({
                url: '/registro',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Respuesta de éxito:', response);
                    if (response.success) {
                        // Cerrar el modal inmediatamente
                        $('#modalRegistro').modal('hide');
                        $('.modal-backdrop').remove();
                        // Mostrar el mensaje de éxito después de cerrar el modal
                        limpiarFormularioRegistro();
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: 'Usuario registrado exitosamente',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        if (response.errors) {
                            for (let field in response.errors) {
                                mostrarError('#' + field, response.errors[field][0]);
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error al registrar: ' + response.message
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                    console.log('Respuesta de error completa:', xhr.responseText);
                    console.log('Estado de la respuesta:', xhr.status);
                    try {
                        let errorResponse = JSON.parse(xhr.responseText);
                        console.log('Errores detallados:', errorResponse.errors);
                        if (xhr.status === 422) {
                            for (let field in errorResponse.errors) {
                                mostrarError('#' + field, errorResponse.errors[field][0]);
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error en el servidor. Por favor, intenta de nuevo más tarde.'
                            });
                        }
                    } catch (e) {
                        console.error('Error al parsear la respuesta:', e);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error inesperado. Por favor, intenta de nuevo más tarde.'
                        });
                    }
                }
            });
        }
    });
});

$('#modalRegistro').on('hidden.bs.modal', function() {
    limpiarFormularioRegistro();
});