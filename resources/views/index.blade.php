<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="{{ config('app.name') }}">
    <title>{{ config('app.name') }} | Inicio</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-light">

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
                        <a class="nav-link" aria-current="page" href="/">Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-1 my-5" style="border-radius: 20px">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <h1 class="h2 text-center fw-bolder">{{ config('app.name') }}</h1>
                            <h1 class="h5 text-center mb-4">Consulta de notas</h1>

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    Oops algo no salió bien. Por favor vuelve a intentarlo
                                </div>
                            @endif

                            <form action="{{ route('consulta.obtener') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Carnet</label>
                                    <input type="text" class="form-control @error('carnet') is-invalid @enderror"
                                        name="carnet" autocomplete="off" value="{{ old('carnet') }}">

                                    @error('carnet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">PIN</label>
                                    <input type="password" class="form-control @error('pin') is-invalid @enderror"
                                        name="pin">

                                    @error('pin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Año</label>
                                    <select class="form-select" name="anyo">
                                        <option value='2022'>2022</option>
                                        <option value='2021'>2021</option>
                                        <option value='2020'>2020</option>
                                        <option value='2019'>2019</option>
                                        <option value='2018'>2018</option>
                                        <option value='2017'>2017</option>
                                        <option value='2016'>2016</option>
                                        <option value='2015'>2015</option>
                                        <option value='2014'>2014</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary text-center">Ver notas</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
