$(document).ready(function() {
    var maxPalabras = 4;
    //Evitar ingreso de numeros o carácteres especiales
    $('#nombre').on('input', function() {
        var nombre = $(this).val();
        nombre = nombre.replace(/[^a-zA-Z\s]/g, '');
        $(this).val(nombre);
    });
    $('#name').on('input', function() {
        var apellido = $(this).val();
        apellido = apellido.replace(/[^a-zA-Z\s]/g, '');
        $(this).val(apellido);
    });

    // Agregar "zs" por defecto al campo "matricula"
    $('#matricula').val('zs');

    $('#matricula').on('input', function() {
        var matricula = $(this).val();
        matricula = matricula.toLowerCase(); // Convertir a minúsculas para evitar inconsistencias
        // Eliminar cualquier carácter que no sea "z", "s" o un número
        matricula = matricula.replace(/[^zs0-9]/g, '');
        // Verificar si la matrícula comienza con "zs"
        if (matricula.indexOf('zs') !== 0) {
            matricula = 'zs' + matricula.slice(2);
        }
        // Limitar la matrícula a "zs" seguido de 8 números
        matricula = 'zs' + matricula.slice(2, 10);
        $(this).val(matricula);
    });
    $('#email').on('blur', function() {
        var correo = $(this).val();
        var correoRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/;

        if (correoRegex.test(correo)) {
            // El correo electrónico es válido
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            $('#correoError').text('').hide();
        } else {
            // El correo electrónico no es válido
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            $('#correoError').text('Por favor, ingresa un correo electrónico válido.').show();
        }
    });

    function mostrarError(selector, mensaje) {
        let campo = $(selector);
        campo.addClass('is-invalid');
        if (campo.next('.invalid-feedback').length === 0) {
            campo.after('<div class="invalid-feedback">' + mensaje + '</div>');
        } else {
            campo.next('.invalid-feedback').text(mensaje);
        }
    }
    //Espacios en blanco 
    $('#nombre').on('paste', function(e) {
        e.preventDefault();
        mostrarError('#nombre', 'No se permite pegar texto en este campo');
    });
    $('#name').on('paste', function(e) {
        e.preventDefault();
        mostrarError('#name', 'No se permite pegar texto en este campo');
    });
});