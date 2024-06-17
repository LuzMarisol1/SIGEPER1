$(document).ready(function() {
    var tablAlumnos = new DataTable('#tablAlumnos', {
        order: [
            [3, 'asc']
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
        buttons: [
            'excel'
        ],
        paging: true,
        pageLength: 10,
        autoWidth: true,
        columnDefs: [
            { orderable: false, targets: 5 }
        ]

    });

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $(document).on('shown.bs.modal', '.modal', function() {
        var modal = $(this);
        //var directorProyectoInput = modal.find('#directorProyecto');
        var tituloProyecto = modal.find("#tituloProyecto");
        var proyectoinput = modal.find('#directorProyecto');
        var maxWords = 20; // número máximo de palabras permitidas
        var maxCaracteres = 100; // número máximo de caracteres permitidos
        var modalidad = modal.find('#selectModalidad');

        //Evitar el pegado de código en los inputs
        proyectoinput.on('paste', function(e) {
            e.preventDefault();
        });

        tituloProyecto.on('paste', function(e) {
            e.preventDefault();
        });

        proyectoinput.on('input', function() {
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

        // Obtener todos los campos de entrada
        const titulo = document.querySelectorAll('tituloProyecto');

        // Agregar un evento 'input' a cada campo
        inputs.forEach(input => {
            input.addEventListener('tituloProyecto', () => {
                // Eliminar espacios en blanco al inicio y al final del valor ingresado
                input.value = input.value.trim();
            });
        });

        modalidad.change(function() {
            if ($(this).val() === '2') {
                proyectoinput.prop('disabled', true);
                proyectoinput.closest('.mb-3').hide();
                proyectoinput.val(''); // Limpiar el valor del campo
                proyectoinput.removeClass('is-invalid'); // Eliminar la clase de validación
            } else if ($(this).val() === '3') {
                proyectoinput.prop('disabled', true);
                proyectoinput.closest('.mb-3').hide();
                proyectoinput.val(''); // Limpiar el valor del campo
                proyectoinput.removeClass('is-invalid'); // Eliminar la clase de validación
            } else if ($(this).val() === '2') {
                proyectoinput.prop('disabled', true);
                proyectoinput.closest('.mb-3').hide();
                proyectoinput.val(''); // Limpiar el valor del campo
                proyectoinput.removeClass('is-invalid'); // Eliminar la clase de validación
            } else {
                proyectoinput.prop('disabled', false);
                proyectoinput.closest('.mb-3').show();
            }
        });

        modalidad.change(function() {
            if ($(this).val() === '2') {
                tituloProyecto.prop('disabled', true);
                tituloProyecto.closest('.mb-3').hide();
                tituloProyecto.val(''); // Limpiar el valor del campo
                tituloProyecto.removeClass('is-invalid'); // Eliminar la clase de validación
            } else if ($(this).val() === '3') {
                tituloProyecto.prop('disabled', true);
                tituloProyecto.closest('.mb-3').hide();
                tituloProyecto.val(''); // Limpiar el valor del campo
                tituloProyecto.removeClass('is-invalid'); // Eliminar la clase de validación
            } else {
                tituloProyecto.prop('disabled', false);
                tituloProyecto.closest('.mb-3').show();
            }
        });

    });




    // Manejar el evento de clic en el botón "Guardar" de cada modal
    $(document).on('click', '.btn-guardar-datos', function() {
        var modal = $(this).closest('.modal');
        var matricula = modal.find('#matricula').val();
        var tipoInscripcionId = modal.find('#selectTipoInscripcion').val();
        var tituloProyecto = modal.find('#tituloProyecto');
        var proyecto = modal.find('#tituloProyecto').val();
        var directorProyectoInput = modal.find('#directorProyecto');
        var modalidadId = modal.find('#selectModalidad').val();
        var director = modal.find('#directorProyecto').val();
        var estatusId = modal.find('#selectEstatus').val();
        if (proyecto == "" && !tituloProyecto.prop('disabled')) {
            toastr.error("El campo Proyecto no puede quedar vacío. Por favor ingrese información");
            return;
        }
        if (director == "" && !directorProyectoInput.prop('disabled')) {
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

    $(document).on('click', '.btn-eliminar', function() {
        var id = $(this).data('id');
        eliminarRegistro(id);
    });


    function eliminarRegistro(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/eliminar-registro/' + id,
                    type: 'DELETE',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire(
                            '¡Eliminado!',
                            'El registro ha sido eliminado.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Error',
                            'No se pudo eliminar el registro.',
                            'error'
                        );
                    }
                });
            }
        });
    }
});