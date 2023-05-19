<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Services\GradeService;

class GradeController extends Controller
{
    public function __construct(
        private GradeService $gradeService
    )
    {
    }

    public function __invoke(GradeRequest $request)
    {
        return $this->gradeService->index($request->validated());
    }
}
