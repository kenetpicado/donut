<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-hasta-fit=no">
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

                            <form action="{{ route('consulta.rango') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Carnet</label>
                                    <input type="text" class="form-control @error('carnet') is-invalid @enderror"
                                        name="carnet" auhastacomplete="off" value="{{ old('carnet') }}">

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
                                <div class="mb-3 form-group">
                                    <label class="form-label @error('desde') is-invalid @enderror">Desde</label>
                                    <select class="form-select" name="desde">
                                        <x-option val="2022" label="desde"></x-option>
                                        <x-option val="2021" label="desde"></x-option>
                                        <x-option val="2020" label="desde"></x-option>
                                        <x-option val="2019" label="desde"></x-option>
                                        <x-option val="2018" label="desde"></x-option>
                                        <x-option val="2017" label="desde"></x-option>
                                        <x-option val="2016" label="desde"></x-option>
                                        <x-option val="2015" label="desde"></x-option>
                                        <x-option val="2014" label="desde"></x-option>
                                    </select>

                                    @error('desde')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label @error('hasta') is-invalid @enderror">Hasta</label>
                                    <select class="form-select" name="hasta">
                                        <x-option val="2022" label="hasta"></x-option>
                                        <x-option val="2021" label="hasta"></x-option>
                                        <x-option val="2020" label="hasta"></x-option>
                                        <x-option val="2019" label="hasta"></x-option>
                                        <x-option val="2018" label="hasta"></x-option>
                                        <x-option val="2017" label="hasta"></x-option>
                                        <x-option val="2016" label="hasta"></x-option>
                                        <x-option val="2015" label="hasta"></x-option>
                                        <x-option val="2014" label="hasta"></x-option>
                                    </select>
                                    @error('hasta')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <small class="">Al usar este servicio usted acepta los
                                        <a href="{{ route('terminos') }}">Términos</a>
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
