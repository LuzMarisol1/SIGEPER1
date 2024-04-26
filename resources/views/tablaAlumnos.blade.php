<!DOCTYPE html>
<html lang="es">
<!--Tabla editar alumnos-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

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
                        <td>1</td>
                        <td>Alphabet puzzle</td>
                        <td>2016/01/15</td>
                        <td>Done</td>
                        <td>Amount</td>
                        <td>Amount</td>
                        <td>Amount</td>
                        <td>Amount</td>
                        <td>
                        <button type="button" class="btn btn-primary btn-xs dt-edit" onclick="abrirModal()"
                            style="margin-right:16px;">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-xs dt-delete">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
            <div id="modal" class="modal" tabindex="1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Datos</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-editar">
                                <div class="select-container">
                                    <label for="inscripcion"><b>Inscripción:</b></label>
                                    <select id="inscripcion" name="inscripcion" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option value="">Seleccionar</option>
                                        <option value="1">Primera </option>
                                        <option value="2">Continuidad</option>
                                        <option value="2">Segunda</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="proyecto"><b>Proyecto:</b></label>
                                    <input type="text" id="proyecto" class="form-control" name="proyecto"
                                        placeholder="Nombre del proyecto">
                                </div>
                                <br />
                                <div class="select-container">
                                    <label for="estatus"><b>Modalidad:</b></label>
                                    <select id="estatus" name="estatus" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option value="pendiente">Proyecto</option>
                                        <option value="proceso">Examen</option>
                                        <option value="terminado">Ceneval</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="director"><b>Director:</b></label>
                                    <input type="text" id="director" class="form-control" name="director"
                                        placeholder="Nombre del director">
                                </div>
                                <div class="select-container">
                                    <label for="estatus"><b>Estatus:</b></label>
                                    <select id="estatus" name="estatus" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option value="pendiente">Pendiente</option>
                                        <option value="proceso">En proceso</option>
                                        <option value="terminado">Terminado</option>
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Guardar</button>
                                    <button type="button"
                                        class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
