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
    <!-- SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"></script>
    <!--DATATABLES-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <!--PERSONALIZADO-->
    <link href="css/tablas.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script type="text/javascript" src="js/editEstudiantes.js"></script>
    <title>Proyectos de Experiencia Recepcional</title>
</head>

<body>
    
    <header id="main-header">
        <a id="logo-header">
            <span class="site-name">
                <h1>SIGEPER</h1>
            </span>
        </a>
    </header>
    <div id="tablaA" data-search="true" data-filter-control="true">
        <div class="container">
            <h1 style="text-align: center"> Proyectos de Experiencia Recepcional</h1>
            <h3 style="text-align: center">Seguimiento de los proyectos de Experiencia Recepcional</h3>
            <table id="tabAlumnos" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Matrícula</th>
                        <th>Inscripción</th>
                        <th>Maestro ER</th>
                        <th>Proyecto</th>
                        <th>Modalidad</th>
                        <th>Director</th>
                        <th>Estatus</th>
                        <th style="text-align:center;width:100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> <button id="btnEditar" type="button" class="btn btn-primary btn-xs dt-edit"
                                style="margin-right:16px;"><i class="bi bi-pencil-square"></i>
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div id="mODAL" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <h3>Editar datos</h3>
                        </div>
                        <div class="modal-body">
                            <form id="formEditar">
                                <div id="tipoInsc" class="mb-3">
                                    <label class="form-label">Tipo de inscripción</label>
                                    <select id="selectTipoInscripcion" class="form-select "
                                        aria-label="Default select example">
                                        <option selected>Seleccionar</option>
                                        <option value="1">Primera Inscripción</option>
                                        <option value="2">Continudad</option>
                                        <option value="3">Segunda Inscripción</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tituloProyecto" class="campoTitulo">Proyecto</label>
                                    <input id="tituloProyecto" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Modalidad</label>
                                    <select id ="selectModalidad" class="form-select "
                                        aria-label="Default select example">
                                        <option selected>Seleccionar</option>
                                        <option value="1">Trabajo Recepcional</option>
                                        <option value="2">Examen CENEVAL</option>
                                        <option value="3">Promedio</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Director</label>
                                    <input id="directorP" type="text" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div id="botonesEdit" class="modal-footer">
                                <button id="guardarDatos"type="button" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
