$(document).ready(function() {
    var tablAlumnos = new DataTable('#tablAlumnos', {
        order: [
            [3, 'desc']
        ],
        searching: true,
        pagingType: 'simple_numbers',
        language: {
            search: 'Buscar:',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'No hay registros disponibles',
            infoFiltered: '(filtrado de un total de _MAX_ registros)',
            lengthMenu: 'Mostrar _MENU_ registros por página',
            zeroRecords: 'No existen resultados'
        },
        dom: '<"dt-buttons"Bf><"clear">lirtp',
        paging: false,
        autoWidth: true,
        columnDefs: [
            { orderable: false, targets: 5 }
        ],
        buttons: [
            'colvis',
            'copyHtml5',
            'csvHtml5',
            'excelHtml5',
            'pdfHtml5',
            'print'
        ]
    });

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $('#btnEditar').click(function() {
        $('#modalEditardatos').modal('show');
    });

    $('#tituloProyecto, #directorProyecto').on('input', function() {
        $(this).val($(this).val().replace(/[^a-zA-Z\s]/g, ''));
    });

    $("#modalDatos").on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var dato = button.data('usuarios');
        $(this).find('.modal-title').text('Nombre ' + dato.nombre);
    });


    // Manejar el evento de clic en el botón "Guardar" de cada modal
    $(document).on('click', '.btn-guardar-datos', function() {
        var modal = $(this).closest('.modal');
        var matricula = modal.find('#matricula').val();
        var tipoInscripcionId = modal.find('#selectTipoInscripcion').val();
        var proyecto = modal.find('#tituloProyecto').val();
        var modalidadId = modal.find('#selectModalidad').val();
        var director = modal.find('#directorProyecto').val();
        var estatusId = modal.find('#selectEstatus').val();

        // Mostrar mensaje de confirmación utilizando SweetAlert
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Deseas guardar los cambios?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, guardar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la solicitud AJAX para actualizar los datos
                $.ajax({
                    url: '/actualizarInfo',
                    type: 'POST',
                    data: {
                        matricula: matricula,
                        tipoInscripcionId: tipoInscripcionId,
                        proyecto: proyecto,
                        modalidad_id: modalidadId,
                        director: director,
                        estatus_id: estatusId, // Agregar el estatus a los datos enviados
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.res === 1) {
                            // Actualización exitosa
                            modal.modal('hide');
                            // Mostrar mensaje de éxito utilizando SweetAlert
                            Swal.fire(
                                '¡Actualizado!',
                                'Los datos se han guardado correctamente.',
                                'success'
                            ).then(() => {
                                // Realizar otras acciones necesarias después de la actualización exitosa
                                location.reload(); // Recargar la página después de la actualización exitosa
                            });
                        } else {
                            // Error en la actualización
                            Swal.fire(
                                'Error',
                                response.msg,
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        // Mostrar mensaje de error utilizando SweetAlert
                        Swal.fire(
                            'Error',
                            'Ha ocurrido un error en la solicitud.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});