<!DOCTYPE html>
<html lang="es">
<!--Tabla editar alumnos-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <div id="tablaA" data-search="true" data-filter-control="true"  >
        <div class="container">
            <table class="table"id="infoEstudiantes">
                <h1 style="text-align: center"> Proyectos de Experiencia Recepcional</h1>
                <h4 style="text-align: center">Seguimiento de los proyectos de Experiencia Recepcional</h4>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Luz Marisol Falfán Hernández</td>
                        <td>zS17015187</td>
                        <td>Continuidad</td>
                        <td>Dr. Luis Jerardo Montané Jimenez</td>
                        <td>Generación de un Kardex Academico para el centro de Autoacceso (CAA)</td>
                        <td>Trabajo recepcional</td>
                        <td>Jose Guillermo Hernández Calderón</td>
                        <td>Concluido</td>
                        <td>
                            <button id="editar" type="button" class="btn btn-primary btn-xs jsdt-edit"
                                style="margin-right:16px;" onclick="abrirModal()"> Editar
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
            </table>

            <div id="modal" class="modal" tabindex="2" role="dialog">
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
