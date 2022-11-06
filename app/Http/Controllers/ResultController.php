<?php

namespace App\Http\Controllers;

use App\Classes\Student;
use App\Http\Requests\GradeRequest;
use App\Http\Requests\RangeRequest;
use App\Services\ComponentService;
use App\Services\ConnectionService;
use App\Services\Servicios;
use App\Services\YearService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /* Obtain Grades for Single Year */
    public function grades(GradeRequest $request)
    {
        if (!($dom = (new ConnectionService)->connect($request)))
            return redirect()->route('home')->with('error', 'Oops');

        $student    = new Student($dom);
        $components = (new ComponentService)->all($dom);

        return view('results.grades', compact('student', 'components'));
    }

    public function grades_range(Request $request)
    {
        $years = (new YearService)->getRange($request);
        $components_by_year = [];

        for ($i = 0; $i < sizeof($years); $i++) {

            $request->merge(['year' => $years[$i]]);
            $dom = (new ConnectionService)->connect($request);

            /* Error de credenciales, termina */
            if ($i == 0 && !$dom)
                return redirect()->route('range')->with('error', 'Oops');

            /* Error en un anyo, continua */
            if (!$dom)
                continue;


            $year = [
                'year' => $years[$i],
                'data' => (new ComponentService)->all($dom)
            ];

            array_push($components_by_year, $year);
        }
        $student = new Student($dom);
        return view('results.range', compact('student', 'components_by_year'));
    }
}
