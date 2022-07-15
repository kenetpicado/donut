@extends('layout')

@section('title', 'Notas')

@section('content')

    <h6 class="h6 text-center text-uppercase s">Universidad Nacional Autónoma de Nicaragua - León</h6>
    <h6 class="h6 text-center">FACULTAD DE {{ $alumno->facultad }}</h6>
    <h6 class="h6 text-center">{{ $alumno->carrera }}</h6>
    <h6 class="h6 mb-4 text-center">{{ $alumno->anyo }}</h6>

    <div class="alert alert-light" role="alert">
        {{ $alumno->nombre }} | {{ $alumno->carnet }} | {{ $alumno->grado }}
    </div>

    <div class="table-responsive" id="no-more-tables">
        <table class="table table-borderless" width="100%" cellspacing="0">
            <thead>
                <tr class="text-secondary text-uppercase small">
                    <th>Componente</th>
                    <th>Parcial I</th>
                    <th>Parcial II</th>
                    <th>Parcial III</th>
                    <th>N. Final</th>
                    <th>Especial</th>
                    <th>Curso</th>
                    <th>Tutoria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($componentes as $componente)
                    <tr>
                        {{-- ES UN ENCABEZADO --}}
                        @if (str_contains($componente->nombre, 'Ciclo') || str_contains($componente->nombre, 'Curso'))
                            <th colspan="8" data-title="Componente"
                                class="text-uppercase bg-secondary bg-opacity-10 small font-weight-bold">
                                {{ $componente->nombre }}</th>
                        @else
                            {{-- ES UN COMPONENTE --}}
                            <td class="small" data-title="Componente">{{ $componente->nombre }}</td>

                            {{-- ES ACTIVIDAD ESTUDIANTIL --}}
                            @if ($componente->p1 == 'SATISFACTORIO')
                                <td colspan="7" class="small">{{ $componente->p1 }}</td>
                            @else
                                {{-- ES COMPONENTE CON PARCIALES --}}
                                <td data-title="Parcial I">{{ $componente->p1 }}</td>
                                <td data-title="Parcial II">{{ $componente->p2 }}</td>
                                <td data-title="Parcial II">{{ $componente->p3 }}</td>
                                <td data-title="N. Final">{{ $componente->final }}</td>
                                <td data-title="Especial">{{ $componente->convocatoria }}</td>
                                <td data-title="Curso">{{ $componente->curso }}</td>
                                <td data-title="Tutoria">{{ $componente->tutoria }}</td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8" class="text-center">{{ $alumno->indice }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection
