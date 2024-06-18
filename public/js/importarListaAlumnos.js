$(document).ready(function() {
    $('#importButton').on('click', function() {
        var fileInput = $('<input type="file" accept=".csv, .xlsx">');

        fileInput.on('change', function() {
            var file = fileInput[0].files[0];
            var formData = new FormData();
            formData.append('excelFile', file);

            // Enviar el archivo CSV al servidor Laravel mediante AJAX
            $.ajax({
                url: "/import-csv",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Éxito',
                        text: response.message,
                        icon: 'success'
                    }).then(function() {
                        location.reload(); // Actualizar la página sin salir de ella
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = 'Error al guardar los datos';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        title: 'Error',
                        text: errorMessage,
                        icon: 'error'
                    });
                }
            });
        });

        fileInput.click();
    });

});