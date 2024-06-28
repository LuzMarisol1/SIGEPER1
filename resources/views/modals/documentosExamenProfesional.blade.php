<div class="modal fade" id="subirDocumentosModal{{ $estudiante->matricula }}" tabindex="-1" aria-labelledby="subirDocumentosLabel" aria-hidden="true">  
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subirDocumentosLabel">Documentos acreditación Examen Profesional</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="formEditar" method="POST" action="{{ route('uploadDocuments') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- hidden field with the $estudiante->id --}}
                    <input type="hidden" name="id" value="{{ $estudiante->id }}">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3">

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
                                        name="documento_{{ $i }}">
                                </div>
                            @endfor
                        </div>
                        <div class="col-md-4">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="mb-3">
                                    <select class="form-select" id="documento{{ $i }}" name="documento{{ $i }}" disabled>
                                        <option value="Pendiente" selected>Pendiente</option>
                                        <option value="Aprobado">Aprobado</option>
                                        <option value="Rechazado">Rechazado</option>
                                    </select>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div id="botonesEdit" class="modal-footer">
                        <button id="guardarDatos" type="submit" class="btn btn-primary btn-guardar-datos">Guardar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
