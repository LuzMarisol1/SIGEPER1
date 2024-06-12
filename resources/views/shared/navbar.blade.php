<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #18529D;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">

            Inicio
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (Auth::user()->roles->contains("nombre", "admin"))
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

<style>
    /* Fuente */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa; /* Color de fondo claro */
    }

    /* Navbar */
    .navbar {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-weight: 600;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
    }

    .navbar-brand img {
        margin-right: 0.5rem;
    }

    .nav-link {
        font-weight: 400;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #fff;
    }
</style>
