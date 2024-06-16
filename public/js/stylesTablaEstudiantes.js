$(document).ready(function() {
    $('.modal').on('show.bs.modal', function(event) {
        var estudianteId = $(this).data('estudiante-id');
        // Realizar acciones específicas basadas en el estudianteId
    });
});