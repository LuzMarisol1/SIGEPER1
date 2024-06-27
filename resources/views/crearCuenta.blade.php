<!DOCTYPE html>
<html lang="es">
<!--Tabla editar alumnos-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="css/tablas.css" rel="stylesheet" />
    <script type="text/javascript" src="js/validacionCrearCuentaAdmin.js"></script>
    <title>Proyectos de Experiencia Recepcional</title>
</head>

<body>
    @include('shared.navbar')
    @section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> 
        @endif
        <div class="container body_content">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-5">
                    <div class="card">
                        <div class="card-header">{{ __('Registro') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('storeUsuario') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <div class="col-md-6">
                                        <input id="nombre" type="text"
                                            class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                            value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"
                                            value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
                                        @error('apellidos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="matricula"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Matrícula') }}
                                        (Estudiante)</label>
                                    <div class="col-md-6">
                                        <input id="matricula" type="text"
                                            class="form-control @error('matricula') is-invalid @enderror" name="matricula"
                                            value="{{ old('matricula') }}" autocomplete="matricula" autofocus>
                                        @error('matricula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('correo') is-invalid @enderror" name="correo"
                                            value="{{ old('correo') }}" required autocomplete="correo">
                                        @error('correo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>
                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rol_usuario_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                                    <div class="col-md-6">
                                        <select multiple id="role"
                                            class="form-control @error('rol_usuario_id') is-invalid @enderror"
                                            name="rol_usuario_id[]" required>
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('rol_usuario_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
