<div class="modal fade" id="subirDocumentosModal{{ $estudiante->id }}" tabindex="-1" aria-labelledby="subirDocumentosLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subirDocumentosLabel">Editar Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditar" method="POST" action="{{ route('actualizarInfo') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo d-none">matricula</label>
                                <input type="text" class="form-control d-none" id="matricula"
                                    value="{{ $estudiante->matricula }}" readonly
                                    style="background-color: #e9ecef; color: #495057;">
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">VoBo (Vistos buenos)</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Resultado de CopyLeaks</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Oficio de autorización para publicación
                                    digital </label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Formato de autorización de publicación
                                    en el RI-UV</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Comprobante de su CV</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Aval del documento electrónico</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Oficio de notificación de examen</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">ficha de pre-egreso</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Evidencia del registro en el sistema de
                                    seguimiento de
                                    egresados</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Copia del acta de examen</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo">Discos Rotulados</label>
                            </div>
                            <div class="mb-3">
                                <label for="tituloProyecto" class="campoTitulo"> foto tamaño credencial
                                    (ovalada)</label>
                            </div>

                        </div>
                        <div class="col-md-4">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="documento{{ $i }}"
                                        name="documento{{ $i }}">
                                </div>
                            @endfor
                        </div>
                        <div class="col-md-4">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="mb-3">
                                    <select class="form-select" id="documento{{ $i }}" name="documento{{ $i }}" disabled>
                                        <option value="">Seleccionar</option>
                                        <option value="aprobado" selected>Pendiente</option>
                                        <option value="aprobado">Aprobado</option>
                                        <option value="rechazado">Rechazado</option>
                                    </select>
                                </div>
                            @endfor
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="mb-3">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        id="modalidadTrabajoRecepcional">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="2"
                                        id="modalidadExamenCeneval"
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="3"
                                        id="modalidadPromedio"
                                </div>
                            </div>

                        </div>-->
                    </div>
                </form>
            </div>
            <div id="botonesEdit" class="modal-footer">
                <button id="guardarDatos" type="button" class="btn btn-primary btn-guardar-datos">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
