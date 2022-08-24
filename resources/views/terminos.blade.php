@extends('layout')

@section('title', 'Términos y condiciones')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-5">
            <h4 class="fw-folder">Acerca de</h4>
            <p class="card-text"><label class="fw-bolder">donut</label>
                es una herramienta que pretende mejorar la experiencia
                de usuario al realizar consulta de calificaciones.
                <br>
                Además de proporcionar una herramienta
                para realizar dicha consulta en un rango de años específicos determinados por el usuario
                y de ese modo proporcionar resultado más conveniente.
            </p>
            <h4 class="fw-folder">Términos</h4>
            <p class="card-text">
            <p>Al ser una herramienta desarollada por terceros <label class="fst-italic">(no oficial)</label> se garantiza:
            </p>
            <ul>
                <li>Privacidad</li>
                <li>Confidencialidad</li>
                <li>Ningún dato es almacenado</li>
            </ul>
            <p>Sin embargo, cada usuario hace uso bajo su propia voluntad y responsabilidad</p>
            </p>
        </div>
    </div>
@endsection
