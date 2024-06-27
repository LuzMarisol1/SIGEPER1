$(document).ready(function() {
    console.log("Script de registro cargado");

    const togglePassword = document.querySelector("#togglePassword");
    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const password = document.querySelector("#contrasena");
    const confirmPassword = document.querySelector("#contrasena_confirmation");
    const maxLetras = 60; // Límite máximo de letras permitidas

    //Limpir el modal
    $('#modalRegistro').on('show.bs.modal', function() {
        // Limpiar los valores de los campos del formulario
        $('#registroForm')[0].reset();

        // Limpiar los mensajes de error y estados de validación
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');

        // Restablecer el valor inicial del campo de matrícula
        $('#matricula').val('zs');
    });

    //Evitar ingreso de números o caracteres especiales

    $('#modalRegistro').on('input', '#nombre', function() {
        var nombre = $(this).val();
        nombre = nombre.replace(/[^a-zA-Z\s]/g, '');
        $(this).val(nombre);
    });
    $('#modalRegistro').on('input', '#apellidos', function() {
        var apellidos = $(this).val();
        apellidos = apellidos.replace(/[^a-zA-Z\s]/g, '');
        $(this).val(apellidos);
    });

    //Validar campo matricula comienze con zsy le sigan 8 numeros 
    $('#modalRegistro').on('input', '#matricula', function() {
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
    });

    //Limitar el número de palabras
    $('#modalRegistro').on('input', '#nombre', function() {
        let nombre = $(this).val();
        nombre = nombre.replace(/[^a-zA-Z\s]/g, '');

        if (nombre.length > maxLetras) {
            nombre = nombre.slice(0, maxLetras);
            toastr.warning('Se ha alcanzado el límite máximo de letras permitidas en el nombre');
        }

        $(this).val(nombre);
    });

    //Limitar el número de palabras
    $('#modalRegistro').on('input', '#apellidos', function() {
        let apellido = $(this).val();
        apellido = apellido.replace(/[^a-zA-Z\s]/g, '');

        if (apellido.length > maxLetras) {
            apellido = apellido.slice(0, maxLetras);
            toastr.warning('Se ha alcanzado el límite máximo de letras permitidas en el nombre');
        }

        $(this).val(apellido);
    });

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
            mostrarError('#correoRegistro', 'El correo debe comenzar con "zs" seguido de hasta 8 números');
            return false;
        } else {
            ocultarError('#correoRegistro');
            return true;
        }
    }

    function validarMatricula() {
        let matriculaValidacion = $('#matricula').val().trim();

        // Agregar "zs" al inicio si no está presente
        if (!matriculaValidacion.startsWith("zs")) {
            matriculaValidacion = "zs" + matriculaValidacion;
            $('#matricula').val(matriculaValidacion);
        }
    

        const matriculaValidada = /^zs\d{1,8}$/;
        if (!matriculaValidada.test(matriculaValidacion)) {
            mostrarError('#matricula', 'La matrícula debe comenzar con "zs" seguido de hasta 8 números');
            return false;
        } else {
            ocultarError('#matricula');
            return true;
        }
    }

    $('#nombre').on('paste', function(e) {
        e.preventDefault();
        mostrarError('#nombre', 'No se permite pegar texto en este campo');
    });
    $('#apellidos').on('paste', function(e) {
        e.preventDefault();
        mostrarError('#apellidos', 'No se permite pegar texto en este campo');
    });

    $('#matricula').on('input', function() {
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
    if (!validarMatricula()) {
            isValid = false;
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
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // El usuario ha confirmado el mensaje de éxito

                                // Eliminar la clase 'modal-open' del body y el elemento 'modal-backdrop'
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();

                                // Limpiar el formulario de registro
                                limpiarFormularioRegistro();
                            }
                        });
                    } else {
                        if (response.errors) {
                            $('.invalid-feedback').text('');
                            // Recorrer los errores y mostrarlos en los campos correspondientes
                            $.each(response.errors, function(field, errors) {
                                var mensajeError = errors[0];
                                $('#' + field).addClass('is-invalid');
                                $('#' + field + '_error').text(errorMessage);
                            });
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