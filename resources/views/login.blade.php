<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
</head>

<body>
    {{-- Basic login form --}}
    <h1>Iniciar Sesión</h1>
    @if ($errors->any())
        <div style="color: red; background-color: #fdd; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('authenticate') }}" method="POST">
        @csrf
        <label for="email">Correo electrónico</label>
        <input type="email" name="correo" id="correo" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>

</html>
