<?php

namespace App\Http\Controllers;

use App\Classes\Alumno;
use App\Classes\Componente;
use App\Http\Requests\ConsultaRequest;
use App\Services\Servicios;
use Illuminate\Http\Request;

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
}
