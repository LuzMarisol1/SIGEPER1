<div class="modal fade" id="editarEstudianteModal{{ $usuario->id }}" tabindex="-1"
    aria-labelledby="editarEstudianteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editarEstudianteModalLabel">Editar Estudiante</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditar" method="POST" action="{{ route('actualizarInfo') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="lbelMatricula" class="campoTitulo d-none">matricula</label>
                        <input type="text" class="form-control d-none" id="matricula"
                            value="{{ $usuario->matricula }}" readonly
                            style="background-color: #e9ecef; color: #495057;">
                    </div>
                    <div class="mb-3">
                        <label for="tituloProyecto" class="campoTitulo">Nombre</label>
                        <input type="text" class="form-control" id="nombre"
                            value="{{ $usuario->nombre . ' ' . $usuario->apellido }}" readonly
                            style="background-color: #e9ecef; color: #495057;">
                    </div>
                    <div id="tipoInscripcion" class="mb-3">
                        <label class="form-label">Tipo de inscripción</label>
                        <select id="selectTipoInscripcion" class="form-select" aria-label="Default select example">
                            <option value="">Seleccionar</option>
                            @foreach ($tipos_inscripcion as $option)
                                <option value="{{ $option->id }}">{{ $option->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modalidad</label>
                        <select id="selectModalidad" class="form-select" aria-label="Default select example">
                            <option value="">Seleccionar</option>
                            @foreach ($modalidades as $option)
                                <option value="{{ $option->id }}">{{ $option->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" id="divTituloProyecto">
                        <label class="proyecto">Proyecto</label>
                        <input id="tituloProyecto" type="text" class="form-control" value="{{ $usuario->proyecto }}">
                    </div>

                    <div class="mb-3" id="divTituloDirector">
                        <label for="directorProyectos" class="form-label">Director</label>
                        <input id="directorProyecto" type="text" class="form-control" maxlength="255"
                            value="{{ $usuario->director }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estatus</label>
                        <select id="selectEstatus" class="form-select" aria-label="Default select example">
                            <option value="">Seleccionar</option>
                            @foreach ($estatuses as $option)
                                <option value="{{ $option->id }}">{{ $option->nombre }}</option>
                            @endforeach
                            <!-- Agrega más opciones según tus requisitos -->
                        </select>
                    </div>
            </div>
            </form>

            <div id="botonesEdit" class="modal-footer">
                <button id="guardarDatos" type="button" class="btn btn-primary btn-guardar-datos">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
