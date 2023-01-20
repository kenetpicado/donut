<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Services\GradeService;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function __invoke(GradeRequest $request)
    {
        return (new GradeService)($request);
    }
}
