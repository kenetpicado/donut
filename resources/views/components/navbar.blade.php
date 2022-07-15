<nav class="navbar navbar-expand-lg navbar-light bg-white static-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bolder" href="/">{{ config('app.name') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('rango')}}">Rango</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('terminos')}}">Acerca de</a>
                </li>
            </ul>
        </div>
    </div>
</nav>