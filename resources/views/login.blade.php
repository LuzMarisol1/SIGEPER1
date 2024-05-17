<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        
        .login-container {
            display: flex;
            height: 100%;
            width: 100%;
        }
        
        .login-image {
            flex: 1.5;
            background-image: url('img/SIGEPER.png');
            background-size: cover;
            background-position: center;
        }
      
        .login-form-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            background-color: #fff;
        }
        
        .login-form {
            max-width: 400px;
            width: 100%;
        }
        
        h1 {
            text-align: center;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 16px 24px;
            margin: 12px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #18529D;
            color: white;
            padding: 18px 24px;
            margin: 12px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .login-image {
                height: 300px;
            }
            .login-form-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form-container">
            <div class="login-form">
                {{-- Basic login form --}}
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
                    <button type="submit">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
