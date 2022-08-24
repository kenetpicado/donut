<?php

namespace App\Http\Controllers;

use App\Classes\Alumno;
use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\RangoRequest;
use App\Services\Servicios;

class ConsultaController extends Controller
{    
    /**
     * Consulta normal
     *
     * @return view
     */
    public function inicio()
    {
        $anyos = (new Servicios)->anyos();
        return view('inicio', compact('anyos'));
    }
    
    /**
     * Consulta por rango de fechas
     *
     * @return view
     */
    public function inicio_rango()
    {
        $anyos = (new Servicios)->anyos();
        return view('rango', compact('anyos'));
    }
    
    /**
     * Obtener notas
     *
     * @param  mixed $request
     * @return view
     */
    public function get_notas(ConsultaRequest $request)
    {
        $dom = (new Servicios)->getHTML($request);

        if (!$dom)
            return redirect('/')->with('error', 'Oops');

        $alumno = (new Alumno($dom));
        $componentes = (new Servicios)->getComponentes($dom);
        return view('consulta.notas', compact('alumno', 'componentes'));
    }
    
    /**
     * Obtener notas en un rango de fechas
     *
     * @param  mixed $request
     * @return view
     */
    public function get_notas_rango(RangoRequest $request)
    {
        $desde = (int) $request->desde;
        $anyos = [];
        $componentesanyo = [];

        /* Guardar los anyos a examinar */
        while ($desde <= $request->hasta) {
            array_push($anyos, $desde);
            $desde++;
        }

        for ($i = 0; $i < sizeof($anyos); $i++) {

            $request->merge(['anyo' => $anyos[$i]]);
            $dom = (new Servicios)->getHTML($request);

            /* Error de credenciales, termina */
            if ($i == 0 && !$dom)
                return redirect('/rango')->with('error', 'Oops');

            /* Error en un anyo, continua */
            if (!$dom) {
                array_pop($anyos[$i]);
                continue;
            }

            /* Ultima vuelta, guarda datos del alumno */
            if ($i == sizeof($anyos) - 1)
                $alumno = (new Alumno($dom));

            array_push($componentesanyo, (new Servicios)->getComponentes($dom));
        }

        return view('consulta.rango', compact('alumno', 'componentesanyo', 'anyos'));
    }
}
