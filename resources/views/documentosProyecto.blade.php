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

    <div class="container">
        <div id="divTablaalumnos" data-filter-control="true">
            <div class="container">
                <h1 class="text-center">Documentos de la ER de {{ $proyecto->matricula }}</h1>
                <h5 class="text-center">{{ $proyecto->proyecto }}</h5>

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
                            <th>Nombre</th>
                            <th>Estatus</th>
                            <th>Tipo de documento</th>
                            <th>Fecha de subida</th>
                            <th>Comentarios</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    @if (!empty($documentos))
                        <tbody>
                            @foreach ($documentos as $documento)
                                <tr>
                                    <td>{{ $documento->nombre ?? '' }}</td>
                                    <td>
                                        @if (Auth::user()->roles->contains("nombre", "admin") || Auth::user()->roles->contains("nombre", "Coordinador"))
                                            <form method="POST" action="{{ route("updateEstatusDocumento") }}" >
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $documento->id }}">
                                                <div class="form-group mb-2">
                                                    <select class="form-select" name="estatus">
                                                        <option value="Pendiente" {{ $documento->estatus == "Pendiente" ? 'selected' : '' }}>
                                                            Pendiente
                                                        </option>
                                                        <option value="Aprobado" {{ $documento->estatus == "Aprobado" ? 'selected' : '' }}>
                                                            Aprobado
                                                        </option>
                                                        <option value="Rechazado" {{ $documento->estatus == "Rechazado" ? 'selected' : '' }}>
                                                            Rechazado
                                                        </option>
                                                    </select>
                                                </div>
                                                {{-- align content of div to right with bootstrap --}}
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </div>
                                            </form>
                                        @else
                                            {{ $documento->estatus }}
                                        @endif

                                    </td>
                                    <td>{{ $tipos_documento[$proyecto->modalidad_id][$documento->numero_de_documento] }} </td>
                                    <td>{{ $documento->created_at }}</td>
                                    <td><a href={{ route('comentariosDocumento', ['id_documento' => $documento->id]) }} >Ver comentarios</a></td>
                                    <td><a href={{ route('downloadDocument', ['id' => $documento->id]) }} >Descargar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td colspan="7">No hay documentos subidos en este proyecto.</td>
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
