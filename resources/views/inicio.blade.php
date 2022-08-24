@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h1 class="h2 text-center fw-bolder">{{ config('app.name') }}</h1>
                    <h1 class="h6 text-center text-muted">Consulta de notas</h1>

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            Oops algo no salió bien. Por favor vuelve a intentarlo
                        </div>
                    @endif

                    <form action="/notas" method="post">
                        @csrf
                        <x-input name="carnet"></x-input>
                        <x-input name="pin" type="password"></x-input>
                        <x-select-0 name="anyo" label="Año lectivo" :items="$anyos"></x-select-0>
                        
                        <div class="mb-3">
                            <small class="text-muted form-label">Al usar este servicio usted acepta los
                                <a href="/terminos">Términos</a>
                            </small>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-secondary float-end">Ver notas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
