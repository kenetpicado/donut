@extends('layout')

@section('title', 'Notas')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h6>UNIVERSIDAD NACIONAL AUTONOMA DE NICARAGUA - LEON</h6>
                <h6>INFORME DE CALIFICACIONES</h6>
                <h6>{{ $alumno->anyo }}</h6>
                <h6>{{ $alumno->grado }}</h6>
            </div>
            <div class="card-text text-uppercase small my-3">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>{{ $alumno->facultad }}</td>
                            <td>{{ $alumno->carrera }}</td>
                        </tr>
                        <tr>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->carnet }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="no-more-tables">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-secondary text-uppercase small">
                            <th>Componente</th>
                            <th>Parcial I</th>
                            <th>Parcial II</th>
                            <th>Parcial III</th>
                            <th>N. Final</th>
                            <th>Especial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($componentes as $componente)
                            <tr>
                                {{-- ES UN ENCABEZADO --}}
                                @if (str_contains($componente->nombre, 'Ciclo') || str_contains($componente->nombre, 'Curso'))
                                    <td colspan="6" class="text-uppercase bg-light small fw-bolder">
                                        {{ $componente->nombre }}
                                    </td>
                                @else
                                    {{-- ES UN COMPONENTE --}}
                                    <td class="small" data-title="Componente">{{ $componente->nombre }}</td>

                                    {{-- ES ACTIVIDAD ESTUDIANTIL --}}
                                    @if (strlen($componente->p1) > 4)
                                        <td colspan="5" class="small" data-title="N. Final">{{ $componente->p1 }}</td>
                                    @else
                                        {{-- ES COMPONENTE CON PARCIALES --}}
                                        <td data-title="Parcial I">{{ $componente->p1 }}</td>
                                        <td data-title="Parcial II">{{ $componente->p2 }}</td>
                                        <td data-title="Parcial II">{{ $componente->p3 }}</td>
                                        <td data-title="N. Final">{{ $componente->final }}</td>
                                        <td data-title="Especial">{{ $componente->convocatoria }}</td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-center">
                        <tr>
                            <th colspan="6">{{ $alumno->indice }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
