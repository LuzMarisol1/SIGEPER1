<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Proyectos de Experiencia Recepcional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <link href="css/tablas.css" rel="stylesheet" />
    <script src="../js/importarLIstaAlumnos.js"></script>
    @stack('styles')
</head>
<style>
    .button-container {
        margin-bottom: 20px;
        text-align: right;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        margin-bottom: 10px;
    }
</style>

<body>
    @include('shared.navbar')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div id="divTablaalumnos" data-search="true" data-filter-control="true">
            <div class="container">
                <h1 class="text-center">Proyectos de Experiencia Recepcional</h1>
                <h3 class="text-center">Seguimiento de los proyectos de Experiencia Recepcional</h3>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length"></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="button-container">
                            <button id="importButton" class="btn btn-success">
                                <i class="fas fa-file-excel"></i> Importar Lista
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_filter"></div>
                    </div>
                </div>


                <table id="tablAlumnos" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Estudiante</th>
                            <th>Proyecto</th>
                            <th>Director</th>
                            <th>Estatus</th>
                            <th>Documentos</th>
                            <th class="text-center" style="width:100px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->matricula }}</td>
                                <td>{{ $usuario->nombre . ' ' . $usuario->apellido }}</td>
                                <td>{{ $usuario->proyecto }}</td>
                                <td>{{ $usuario->director }}</td>
                                <td>{{ $usuario->estatus ? $usuario->estatus->nombre : '' }}</td>
                                <td>
                                    @if ($usuario->documentos->isEmpty())
                                        <p></p>
                                    @else
                                        <ul>
                                            @foreach ($usuario->documentos as $documento)
                                                <strong>Nombre:</strong> {{ $documento->nombre }} <br>
                                                <strong>Estatus:</strong> {{ $documento->estatus }} <br>
                                                <strong>Número de Documento:</strong>
                                                {{ $documento->numero_de_documento }} <br>
                                                <strong>Fecha de Subida:</strong> {{ $documento->created_at }} <br>
                                                <strong><a
                                                        href={{ route('downloadDocument', ['id' => $documento->id]) }}>Descargar</a></strong><br>
                                            @endforeach
                                        </ul>
                                    @endif
                                <td>
                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editarEstudianteModal{{ $usuario->id }}"
                                        title="Editar estudiante">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm btn-eliminar" data-id="{{ $usuario->id }}"
                                        title="Eliminar estudiante">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('modals.editar_estudiante', ['usuario' => $usuario])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#tituloProyectos").on("input", function() {
                var proyecto = $(this).val().trim();
                
                if (proyecto === "") {
                    $("#errorMessage").show();
                } else {
                    $("#errorMessage").hide();
                }
            });
            
            $("#guardarDatos").on("click", function() {
                var proyecto = $("#tituloProyectos").val().trim();
                
                if (proyecto === "") {
                    $("#errorMessage").show();
                    $("#tituloProyectos").focus();
                    return;
                }
                
                // Aquí puedes realizar las acciones necesarias para guardar los datos
                // utilizando el valor de "proyecto" sin espacios en blanco al inicio y al final
            });
        });
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="js/editEstudiantes.js"></script>

    @stack('scripts')

</body>

</html>
