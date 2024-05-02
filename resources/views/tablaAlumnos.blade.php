<!DOCTYPE html>
<html lang="es">
<!--Tabla editar alumnos-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!--CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- SweetAlert2-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--PERSONALIZADO-->
    <link href="css/tablas.css" rel="stylesheet" />
    
    <script type="text/javascript" src="js/tablaAlumnos.js"></script>

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

            <table id="tabAlumnos" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                        <td>
                            <button type="button" title="Abrir un modal con más información" id="btnEditar" class="btn btn-primary btn-xs dt-edit"
                                style="margin-right:16px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>

                        </td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Atras</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
            <div id="mODAL" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <h3>Editar datos</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">Cancelar</button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditar">
                                <div id="tipoInsc" class="mb-3">
                                    <label class="form-label">Tipo de inscripción</label>
                                    <select id="selectTipoInscripcion" class="form-select "
                                        aria-label="Default select example">
                                        <option value="1">Primera Inscripción</option>
                                        <option value="2">Continudad</option>
                                        <option value="3">Segunda Inscripción</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tituloProyecto" class="form-label">Proyecto</label>
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
                            <div id="botonesEdit" class="modal-footer">
                                <button id="guardarDatos"type="button" class="btn btn-primary"
                                    onclick="actualizarDatos()">Guardar</button>
                                <button type="button"
                                    class="btn btn-secondary"data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
