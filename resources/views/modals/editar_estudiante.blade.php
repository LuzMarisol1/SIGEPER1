<div class="modal fade" id="editarEstudianteModal{{ $usuario->id }}" tabindex="-1"
    aria-labelledby="editarEstudianteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarEstudianteModalLabel">Editar Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditar" method="POST" action="{{ route('actualizarInfo') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="tituloProyecto" class="campoTitulo d-none">matricula</label>
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
                            <option value="1" {{ $usuario->tipo_inscripcion_id == 1 ? 'selected' : '' }}>Primera
                                Inscripción</option>
                            <option value="2" {{ $usuario->tipo_inscripcion_id == 2 ? 'selected' : '' }}>
                                Continuidad</option>
                            <option value="3" {{ $usuario->tipo_inscripcion_id == 3 ? 'selected' : '' }}>Segunda
                                Inscripción</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tituloProyectos" class="tituloProyecto">Proyecto</label>
                        <input id="tituloProyecto" type="text" class="form-control" value="{{ $usuario->proyecto }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modalidad</label>
                        <select id ="selectModalidad" class="form-select" aria-label="Default select example">
                            <option value="">Seleccionar</option>
                            <option value="1" {{ $usuario->modalidad_id == 1 ? 'selected' : '' }}>Trabajo
                                Recepcional</option>
                            <option value="2" {{ $usuario->modalidad_id == 2 ? 'selected' : '' }}>Examen
                                CENEVAL</option>
                            <option value="3" {{ $usuario->modalidad_id == 3 ? 'selected' : '' }}>Promedio
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="directorProyectos" class="form-label">Director</label>
                        <input id="directorProyecto" type="text" class="form-control"
                        maxlength="255" value="{{ $usuario->director }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estatus</label>
                        <select id="selectEstatus" class="form-select" aria-label="Default select example">
                            <option value="">Seleccionar</option>
                            <option value="1" {{ $usuario->estatus_id == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="2" {{ $usuario->estatus_id == 2 ? 'selected' : '' }}>Inactivo</option>
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
