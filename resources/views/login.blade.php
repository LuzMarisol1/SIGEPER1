<!DOCTYPE html>
<html lang="en">

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

    <!--PERSONALIZADO-->
    <link href="css/login.css" rel="stylesheet" />

    <title>Iniciar Sesión</title>

</head>
<style>
    .modal-dialog-custom {
        max-width: 600px;
        /* Ajusta el valor según tus necesidades */
    }
</style>

<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="group">
            <div class="overlap-group">
                <div class="rectangle"></div>
                <div class="text-wrapper">Universidad Veracruzana</div>
            </div>
        </div>

        <div class="login-form-container">
            <div class="login-form">
                {{-- Basic login form --}}
                <div class="text-wrapper-2">SIGEPER</div>
                <h1>Iniciar Sesión</h1>
                @if ($errors->any())
                    <div
                        style="color: red; background-color: #fdd; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div>
                        <label for="username">Correo</label>
                        <input type="text" name="correo" id="correo"
                            style="font-size: 14px; padding: 8px 16px; height: 50px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;"
                            required>
                    </div>
                    <div>
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password"
                            style="font-size: 14px; padding: 8px 16px; height: 50px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;"
                            required>
                    </div>
                    <button style="background-color: #28ad56; font-size: 14px; padding: 8px 16px;"
                        id="botonIniciarsesión" type="submit">Iniciar Sesión</button>
                </form>
            

              <!--  <div class="overlap-4">
                    <button style="background-color: #18529d; font-size: 14px; padding: 8px 16px;"
                        data-bs-toggle="modal" data-bs-target="#modalRegistro"id="botonCrearCuenta" type="submit">Crear
                        Cuenta</button>
                </div>-->

                <!-- Modal de Registro -->
                <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRegistroLabel">Registro de Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario de Registro -->

                                <form>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre"
                                            style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Correo</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Username"
                                                aria-label="Username"
                                                style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;">
                                            <span class="input-group-text">@estudiantes.uv.mx</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="password"
                                            style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rol</label>
                                        <select id="selectRolUsuario" class="form-select"
                                            aria-label="Default select example"
                                            style="font-size: 14px; padding: 6px 10px; height: 35px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f8f8;">
                                            <option value="">Seleccionar</option>
                                            <option value="Estudiante">Estudiante</option>
                                    
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"
                                        style="font-size: 14px; padding: 6px 12px;">Registrarse</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
