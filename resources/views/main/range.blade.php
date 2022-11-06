@extends('layouts.app')

@section('title', 'Range')

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

                    <form action="{{ route('grades.range') }}" method="post">
                        @csrf
                        <x-input name="id" label="Carnet"></x-input>
                        <x-input name="password" label="PIN" type="password"></x-input>

                        <x-select-0 name="from" label="Desde">
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ old('from') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </x-select-0>

                        <x-select-0 name="to" label="Hasta">
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ old('to') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </x-select-0>

                        <div class="mb-3">
                            <small class="text-muted form-label">Al usar este servicio usted acepta los
                                <a href="{{ route('terms') }}">Términos</a>
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
