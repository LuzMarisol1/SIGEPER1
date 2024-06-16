<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Estudiante</title>
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
    <script src="../js/stylesTablaEstudiantes.js"></script>
    @stack('styles')
</head>


<body>
    @include('shared.navbar')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div id="divTablaalumnos" data-filter-control="true">
            <div class="container">
                <h1 class="text-center">Proyectos de Experiencia Recepcional</h1>
                <h5 class="text-center">Seguimiento de los proyectos de Experiencia Recepcional</h5>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length"></div>
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
                            <th class="text-center" style="width:100px;">Subir Documentos</th>
                        </tr>
                    </thead>
                    @if (!empty($estudiantes))
                        <tbody>
                            @foreach ($estudiantes as $estudiante)
                                @if ($estudiante)
                                    <tr>
                                        <td>{{ $estudiante->matricula ?? '' }}</td>
                                        <td>{{ ($estudiante->nombreUsuario ?? '') . ' ' . ($estudiante->apellido ?? '') }}
                                        </td>
                                        <td>{{ $estudiante->proyecto ?? '' }}</td>
                                        <td>{{ $estudiante->director ?? '' }}</td>
                                        <td>{{ $estudiante->nombreEstatus ?? '' }}</td>
                                        <td>
                                            @if ($estudiante->matricula)
                                                <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#subirDocumentosModal{{ $estudiante->matricula }}"
                                                    title="Editar estudiante">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>

                                    @if ($estudiante->matricula)
                                        @include('modals.documentosExamenProfesional', [
                                            'estudiante' => $estudiante,
                                        ])
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td colspan="6">No se encontró información del estudiante.</td>
                            </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>

</html>
