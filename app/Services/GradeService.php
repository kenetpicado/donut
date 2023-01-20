<?php

namespace App\Services;

use App\Classes\Student;
use App\Classes\University;
use Illuminate\Http\Response;

class GradeService
{
    public function __invoke($request)
    {
        $dom = (new ConnectionService)->connect($request);

        if (!$dom) {
            return response()->json(['error' => 'Oops algo no salió bien.'], 401);
        }

        $data = (new PurgeDataService)($dom);
        unset($dom);

        return response()
            ->json([
                'student' => new Student($data),
                'university' => new University($data->labels),
                'cycles' => (new ComponentService)($data->rows)
            ], 200);
    }

    /* public function range()
    {
        $years = (new YearService)->getRange($request);
        $components_by_year = [];

        for ($i = 0; $i < sizeof($years); $i++) {

            $request->merge(['year' => $years[$i]]);
            $dom = (new ConnectionService)->connect($request);

            if ($i == 0 && !$dom)
                return redirect()->route('range')->with('error', 'Oops');

            if (!$dom)
                continue;


            $year = [
                'year' => $years[$i],
                'data' => (new ComponentService)($dom)
            ];

            array_push($components_by_year, $year);
        }
        $student = new Student($dom);
        return view('results.range', compact('student', 'components_by_year'));
    } */
}
