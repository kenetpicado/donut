<?php

namespace App\Http\Controllers;

use App\Classes\Alumno;
use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\RangoRequest;
use App\Services\Servicios;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtener(ConsultaRequest $request)
    {
        $dom = (new Servicios)->getHTML($request);

        if ($dom == null)
            return redirect()->route('index')->with('error', 'Oops');

        $alumno = (new Alumno($dom));
        $componentes = (new Servicios)->getComponentes($dom);
        return view('consulta.notas', compact('alumno', 'componentes'));
    }

    public function rango(RangoRequest $request)
    {
        $indice = (int) $request->desde;
        $anyos = [];
        $componentesanyo = [];

        while ($indice <= $request->hasta) {
            array_push($anyos, $indice);
            $indice++;
        }

        for ($i = 0; $i < sizeof($anyos); $i++) {

            $request->merge(['anyo' => $anyos[$i]]);

            $dom = (new Servicios)->getHTML($request);

            // if ($dom == null) {
            //     array_pop($anyos[$i]);
            //     continue;
            // }
            if ($dom == null)
                return redirect()->route('index')->with('error', 'Oops');

            if ($i == sizeof($anyos) - 1)
                $alumno = (new Alumno($dom));

            $unanyo = (new Servicios)->getComponentes($dom);
            array_push($componentesanyo, $unanyo);
        }

        return view('consulta.rango', compact('alumno', 'componentesanyo', 'anyos'));
    }
}
