<?php

namespace App\Services;

use App\Http\Resources\StudentResource;
use App\Http\Resources\UniversityResource;

class GradeService
{
    public function __construct(
        private ConnectionService $connectionService,
        private DataService $dataService
    ) {
    }

    public function index(array $request, $year = null): \Illuminate\Http\JsonResponse
    {
        $dom = $this->connectionService->connect($request, $year);

        if (! $dom) {
            return response()->json(['message' => 'Bad credentials'], 401);
        }

        $data = $this->dataService->purge($dom);
        unset($dom);

        return response()
            ->json([
                'student' => StudentResource::make($data),
                'university' => UniversityResource::make($data->labels),
                'cycles' => $this->dataService->transformCyclesToArray($data->rows),
            ], 200);
    }
}
