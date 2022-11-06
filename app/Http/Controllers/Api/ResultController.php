<?php

namespace App\Http\Controllers\Api;

use App\Classes\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Services\ComponentService;
use App\Services\ConnectionService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /* Obtain Grades for Single Year */
    public function grades(GradeRequest $request)
    {
        if (!($dom = (new ConnectionService)->connect($request)))
            return response()->json(['status' => '0'], 403);

        return response()
            ->json([
                'student' => new Student($dom),
                'components' => (new ComponentService)->all($dom)
            ], 200);
    }
}
