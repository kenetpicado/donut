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

   <x-navbar></x-navbar>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-1 my-5" style="border-radius: 20px">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <h1 class="h2 text-center fw-bolder">{{ config('app.name') }}</h1>
                            <h1 class="h6 text-center">Consulta de notas</h1>
                            <h1 class="h6 text-center mb-4">(Sitio no oficial)</h1>

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
                                <div class="mb-3">
                                    <label class="form-label">Año</label>
                                    <select class="form-select" name="anyo">
                                        <option value='2022' selected>2022</option>
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
                                <div class="mb-3">
                                    <small class="">Al usar este servicio usted acepta los
                                        <a href="{{route('terminos')}}">Términos</a>
                                    </small>
                                </div>
                                <button type="submit" class="btn btn-primary">Ver notas</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
