<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if (Auth::user()->rol->nombre == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('crearUsuario') }}">Crear usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios') }}">Ver usuarios</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
