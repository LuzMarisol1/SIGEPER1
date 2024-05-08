$(document).ready(function() {
    //función para abrir el modal
    new DataTable('#tablAlumnos', {
        order: [
            [3, 'desc']
        ],

        Buscar: {
            return: true
        },
        pagingType: 'simple_numbers',
        language: {
            search: 'Buscar:',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'No hay registros disponibles',
            infoFiltered: '(filtrado de un total de _MAX_ registros)',
            lengthMenu: 'Mostrar _MENU_ registros por página',
            zeroRecords: 'No existen resultados'
        }
    });

    function abrirModal() {
        $('#modalEditardatos').modal('show');
    }

    //llama a la función abrirModal()
    $('#btnEditar').click(function() {
        abrirModal();
    });
    //Permitir solo letras en el input de titulo
    $('#tituloProyecto').on('input', function() {
        var letrasV = /[^a-zA-Z]/g;
        if ($(this).val().match(letrasV)) {
            $(this).val($(this).val().replace(letrasV, ''));
        }
    });

    //Permitir solo letras en el input director
    $('#directorP').on('input', function() {
        var letrasV = /[^a-zA-Z]/g;
        if ($(this).val().match(letrasV)) {
            $(this).val($(this).val().replace(letrasV, ''));
        }
    });


    function actualizarDatos() {
        var selectInscrip = $('#selectTipoInscripcion').val();
        var proyecto = $('#tituloProyecto').val();
        var selectModalidad = $('#selectModalidad').val();
        var nomDirector = $('#directorP').val();
        $.ajax({
                url: '/web/actualizarInfo',
                type: 'POST',
                data: {
                    selectInscrip: selectInscrip,
                    proyecto: proyecto,
                    selectModalidad: selectModalidad,
                    nomDirector: nomDirector
                },
            })
            .done(function(respuesta) {
                if (respuesta["res"] == -1) {
                    toast.error('No se ha podido actualizar');
                    ("")
                }
                if (respuesta["res"] == 0) {
                    toastr.info('Actualizado Correctamente');
                }
            })
    }

    /*function actualizarDatos() {
        //Obtener los valores del formulario
        var selectInscrip = $('#selectTipoInscripcion').val();
        var proyecto = $('#tituloProyecto').val();
        var selectModalidad = $('#selectModalidad').val();
        var nomDirector = $('#directorP').val();

        //crear un objeto con los datos a enviar 

        var datos = {
            selectInscrip: selectInscrip,
            proyecto: proyecto,
            selectModalidad: selectModalidad,
            nomDirector: nomDirector
        };

        //enviar la solicitud AJAX al servidor 
        Swal.fire({
            title: '¿Desea modificar los cambiar realizados?',
            icon: 'warning',
            buttons: 'Sí, guardar',
            dangerMode: 'No, cancelar',

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: '/web/actualizarInfo',
                        type: 'GET',
                        data: datos,
                    })
                    .done(function(data) {
                        toastr.success('Datos actualizados exitosamente')
                    })
            } else {
                toastr.danger('Proceso Cancelado');
            }
        })
    } */
    //llama a la función guardar / actualizar
    $('#guardarDatos').click(function() {
        actualizarDatos();
    });
});