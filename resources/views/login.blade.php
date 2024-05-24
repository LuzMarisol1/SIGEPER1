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
                        <input type="text" name="correo" id="correo" required>
                    </div>
                    <div>
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button style="background-color: #28ad56;" id="botonIniciarsesión" type="submit">Iniciar Sesión</button>
                </form>
                <div class="text-wrapper-6">
                    <a href="">¿Problemas para ingresar?</a>
                </div>
                <div class="overlap-4">
                    <button style="background-color: #18529d;" id="botonIniciarsesión" type="submit">Crear Cuenta</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
