<!-- Modal de Registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroLabel">Formulario de Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registroForm" action="/ruta-de-registro" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Institucional</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="correoRegistro" name="correo" pattern="zs\d{1,8}" maxlength="10" required>
                            <span class="input-group-text">@estudiantes.uv.mx</span>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="invalid-feedback" id="correoError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <div class="password-input-wrapper">
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            <span class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena_confirmation" class="form-label">Confirmar Contraseña</label>
                        <div class="password-input-wrapper">
                            <input type="password" class="form-control" id="contrasena_confirmation" name="contrasena_confirmation" required>
                            <span class="password-toggle" id="toggleConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnRegistro" class="btn btn-primary btn-width">Registrarse</button>
                <button type="button" class="btn btn-danger btn-width" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>