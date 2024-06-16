$(document).ready(function() {
    $('#tablAlumnos').DataTable({
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
        dom: '<"row"<"col-sm-12 col-md-6"f><"col-sm-12 col-md-6 button-container"B>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"l>>',
        lengthMenu: [10, 25, 50, 100],
        buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ':visible'
            }
        }],
        initComplete: function() {
            $('.dataTables_filter input[type="search"]').addClass('form-control form-control-sm');
            $('.dataTables_length select').addClass('form-select form-select-sm');
        }
    });

    //function abrirModal() {
    //    $('#modalEditardatos').modal('show');
    //}

    //llama a la función abrirModal()
    //$('#btnEditar').click(function() {
    ////abrirModal();
    //});


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


/* var estudiante = @json($usuarios);
     $('.modal').on('show.bs-modal', function(event) {
         var button = $(event.relatedTarget);
         var estudianteId = button.data('target').split('-')[1];

         var estudiante = usuarios.find(function(p) {
             return p.id == estudianteId;


             //actualiza el contenido del modal
             var modal = $(this);
             modal.find('.modal-title').text('Nombre: ' + estudiante.nombre)
         });
     })
*/

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