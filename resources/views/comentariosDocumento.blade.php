<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <link href="/css/tablas.css" rel="stylesheet" />
    @stack('styles')
</head>


<body>
    @include('shared.navbar')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="container mt-2">
        <form method="POST" action="{{ route("crearComentario") }}" >
            @csrf
            <input type="hidden" name="documento_id" value="{{ $documento->id }}">
            <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
            <div class="mb-3">
                <label for="comentario" class="form-label">Agregar comentario</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>

    <div class="container">
        <div id="divTablaalumnos" data-filter-control="true">
            <div class="container">
                <h1 class="text-center">Comentarios del documento {{ $documento->nombre }}</h1>
                <h5 class="text-center">Proyecto: {{ $proyecto->proyecto }}</h5>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length"></div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_filter"></div>
                    </div>
                </div>


                <table id="tablAlumnos" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Comentario</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    @if (!$comentarios->isEmpty())
                        <tbody>
                            @foreach ($comentarios as $comentario)
                                <tr>
                                    <td>{{ $comentario->usuario->nombre . " " . $comentario->usuario->apellidos }}</td>
                                    <td>{{ $comentario->comentario }}</td>
                                    <td>{{ $comentario->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center">No hay comentarios para este documento.</td>
                            </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>

</html>
