<nav class="navbar navbar-expand-lg navbar-dark bg-light text-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('inicio') }}">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}">Página de inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Listado de posts</a>
                </li>
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Nuevo post</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ms-auto">
                @if(auth()->guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="navbar-text text-light me-3">
                            {{ auth()->user()->login }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Cerrar sesión</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
