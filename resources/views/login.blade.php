<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--CSS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--PERSONALIZADO-->
    <script src="../js/registro.js"></script>
    <link href="css/login.css" rel="stylesheet" />
    <title>SIGEPER - Login</title>
    
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form-container">
            <div class="login-form">
                <div class="text-wrapper-2">SIGEPER</div>
                <h1>Inicio de sesión</h1>
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Correo Electrónico</label>
                        <input type="text" name="correo" id="correo" class="form-control" required>
                    </div>
                    <div class="form-group password-group">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" id="botonIniciarsesión" type="submit">Iniciar sesión</button>
                    
                </form>
                <div class="mt-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
    <div class="university-text">Universidad Veracruzana</div>
    @include('modals.registro')
</body>
</html>