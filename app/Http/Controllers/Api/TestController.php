<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;
use App\Services\GradeService;

class TestController extends Controller
{
    public function __construct(
        private GradeService $gradeService,
    )
    {
    }

    public function __invoke(TestRequest $request)
    {
        return $this->gradeService->index([
            'id' => '00-00000-0',
            'password' => '111111',
            'year' => '2023',
        ], $request->get('year'));
    }
}
