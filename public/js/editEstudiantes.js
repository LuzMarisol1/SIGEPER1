$(document).ready(function() {

    var tablAlumnos = new DataTable('#tablAlumnos', {
        order: [
            [3, 'desc']
        ],
        searching: true,
        pagingType: 'simple_numbers',
        language: {
            emptyTable: "No hay datos disponibles en la tabla",
            search: 'Buscar:',
            info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
            infoEmpty: 'Mostrando 0 a 0 de 0 registros',
            infoFiltered: '(filtrado de un total de _MAX_ registros)',
            lengthMenu: 'Mostrar _MENU_ registros por página',
            zeroRecords: 'No existen resultados',
            paginate: {
                first: 'Primero',
                last: 'Último',
                next: 'Siguiente',
                previous: 'Anterior'
            }
        },
        dom: '<"dt-buttons"Bf><"clear">lirtp',
        paging: true,
        pageLength: 10,
        autoWidth: true,
        columnDefs: [
            { orderable: false, targets: 5 }
        ],

    });

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $(document).on('shown.bs.modal', '.modal', function() {
        var modal = $(this);
        var directorProyectoInput = modal.find('#directorProyecto');
        var proyectoinput = modal.find('#tituloProyecto');
        var maxWords = 20; // número máximo de palabras permitidas
        var maxCaracteres = 100; // número máximo de caracteres permitidos

        //Evitar el pegado de código en los inputs
        directorProyectoInput.on('paste', function(e) {
            e.preventDefault();
        });

        proyectoinput.on('paste', function(e) {
            e.preventDefault();
        });

        directorProyectoInput.on('input', function() {
            var palabras = $(this).val().trim().split(/\s+/);
            if (palabras.length > maxWords) {
                palabras.splice(maxWords);
                $(this).val(palabras.join(' '));
                toastr.warning('Se ha alcanzado el límite máximo de palabras permitidas');
            }
            if ($(this).val().length > maxCaracteres) {
                $(this).val($(this).val().slice(0, maxCaracteres));
                toastr.warning('Se ha alcanzado el límite de caracteres permitidos');
            }
        });
        $('#tituloProyecto, #directorProyecto').on('input', function() {
            $(this).val($(this).val().replace(/[^a-zA-Z\s]/g, ''));
        });

        $("#modalDatos").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var dato = button.data('usuarios');
            $(this).find('.modal-title').text('Nombre ' + dato.nombre);
        });
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
        if (proyecto == "") {
            toastr.error("El campo Proyecto no puede quedar vacío. Por favor ingrese información");
            return;
        }

        if (director == "") {
            toastr.error("El campo Director no puede quedar vacío. Por favor ingrese información");
            return;
        }

        if (tipoInscripcionId === null || tipoInscripcionId === '') {
            toastr.error("Por favor seleccione el tipo de inscripción");
            return;
        }

        if (modalidadId === null || modalidadId === '') {
            toastr.error("Por favor seleccione la modalidad");
            return;
        }

        if (estatusId === null || estatusId === '') {
            toastr.error("Por favor seleccione el estatus del estudiante");
            return;
        }


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