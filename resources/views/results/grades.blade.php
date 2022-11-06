@extends('layouts.app')

@section('title', 'Notas')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h6>UNIVERSIDAD NACIONAL AUTONOMA DE NICARAGUA - LEON</h6>
                <h6>INFORME DE CALIFICACIONES</h6>
                <h6>{{ $student->year }}</h6>
                <h6>{{ $student->cycle_year }}</h6>
            </div>
            <div class="card-text text-uppercase small my-3">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>{{ $student->faculty }}</td>
                            <td>{{ $student->career }}</td>
                        </tr>
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->id }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="no-more-tables">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-secondary text-uppercase small">
                            <th>Component</th>
                            <th>Parcial I</th>
                            <th>Parcial II</th>
                            <th>Parcial III</th>
                            <th>N. Final</th>
                            <th>Especial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($components as $component)
                            <tr>
                                {{-- ES UN ENCABEZADO --}}
                                @if (str_contains($component->name, 'Ciclo') || str_contains($component->name, 'Curso'))
                                    <td colspan="6" class="text-uppercase bg-light small fw-bolder">
                                        {{ $component->name }}
                                    </td>
                                @else
                                    {{-- ES UN COMPONENT --}}
                                    <td class="small" data-title="Component">{{ $component->name }}</td>

                                    {{-- ES ACTIVIDAD ESTUDIANTIL --}}
                                    @if (strlen($component->partial_1) > 4)
                                        <td colspan="5" class="small" data-title="N. Final">{{ $component->partial_1 }}</td>
                                    @else
                                        {{-- ES COMPONENT CON PARCIALES --}}
                                        <td data-title="Parcial I">{{ $component->partial_1 }}</td>
                                        <td data-title="Parcial II">{{ $component->partial_2 }}</td>
                                        <td data-title="Parcial II">{{ $component->partial_3 }}</td>
                                        <td data-title="N. Final">{{ $component->final_grade }}</td>
                                        <td data-title="Especial">{{ $component->second_call }}</td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-center">
                        <tr>
                            <th colspan="6">{{ $student->average }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
