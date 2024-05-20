<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!--DATATABLES-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
    <!--PERSONALIZADO>-->
    <script type="text/javascript" src="js/editEstudiantes.js"></script>
    <link href="css/tablas.css" rel="stylesheet" />
    <link href="css/tablaAlumnos.css" rel="stylesheet" />
    <title>Proyectos de Experiencia Recepcional</title>

</head>

<body>

    @include('shared.navbar')
    {{-- success message from session --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div id="divTablaalumnos" data-search="true" data-filter-control="true">
            <div class="container">
                <h1 style="text-align: center"> Proyectos de Experiencia Recepcional</h1>
                <h3 style="text-align: center">Seguimiento de los proyectos de Experiencia Recepcional</h3>

                <table id="tablAlumnos" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nombre estudiante</th>
                            <!-- <th>Inscripción</th>-->
                            <th>Proyecto</th>
                            <!--<th>Modalidad</th>-->
                            <th>Director</th>
                            <th>Estatus</th>
                            <th style="text-align:center;width:100px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->matricula }}</td>
                                <!-- <td></td>-->
                                <!-- <td></td>-->
                                <td>{{ $usuario->nombre . ' ' . $usuario->apellido }}</td>
                                <td>{{ $usuario->proyecto }}</td>
                                <td>{{ $usuario->director }}</td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarEstudianteModal{{ $usuario->id }}">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                </td>
                            </tr>
                            <!-- MODLA -->
                            <div class="modal fade" id="editarEstudianteModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="editarEstudianteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarEstudianteModalLabel">Editar Estudiante</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div> 
                                        <div class="modal-body">
                                            <form id="formEditar">
                                                <div class="mb-3">
                                                    <label for="tituloProyecto" class="campoTitulo">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" value="{{ $usuario->nombre . ' ' . $usuario->apellido}}" readonly style="background-color: #e9ecef; color: #495057;">
                                                </div>
                                                <div id="tipoInscripcion" class="mb-3">
                                                    <label class="form-label">Tipo de inscripción</label>
                                                    <select id="selectTipoInscripcion" class="form-select" aria-label="Default select example">
                                                        <option value="">Seleccionar</option>
                                                        <option value="1" {{ $usuario->tipo_inscripcion_id == 1 ? 'selected' : '' }}>Primera Inscripción</option>
                                                        <option value="2" {{ $usuario->tipo_inscripcion_id == 2 ? 'selected' : '' }}>Continudad</option>
                                                        <option value="3" {{ $usuario->tipo_inscripcion_id == 3 ? 'selected' : '' }}>Segunda Inscripción</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tituloProyectos" class="tituloProyecto">Proyecto</label>
                                                    <input id="tituloProyecto" type="text" class="form-control"
                                                        value="{{ $usuario->proyecto }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Modalidad</label>
                                                    <select id ="selectModalidad" class="form-select "
                                                        aria-label="Default select example">
                                                        <option selected>Seleccionar</option>
                                                        <option value="1" {{ $usuario->modalidad_id == 1 ? 'selected' : '' }}>Trabajo Recepcional</option>
                                                        <option value="2" {{ $usuario->tipo_inscripcion_id == 2 ? 'selected' : '' }}>Examen CENEVAL</option>
                                                        <option value="3" {{ $usuario->tipo_inscripcion_id == 3 ? 'selected' : '' }}>Promedio</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="directorProyectos"class="form-label">Director</label>
                                                    <input id="directorProyecto" type="text" class="form-control"   value="{{ $usuario->director }}">
                                                </div>
                                            </form>
                                        </div>
                                        <div id="botonesEdit" class="modal-footer">
                                           
                                           
                                               <button id="guardarDatos"type="button"
                                               class="btn btn-danger"  data-bs-dismiss="modal">Cancelar</button>
                                               <button type="button" class="btn btn-primary"
                                               >Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
