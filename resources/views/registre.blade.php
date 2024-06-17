<!-- Modal de Registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroLabel">Registro de Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Registro -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="Username" aria-label="Username" style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;">
                            <span class="input-group-text">@estudiantes.uv.mx</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select id="rol" name="rol" class="form-select" style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;">
                            <option value="">Seleccionar</option>
                            <option value="estudiante">Estudiante</option>
                            <option value="profesor">Profesor</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="font-size: 14px; padding: 6px 12px;">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</div>