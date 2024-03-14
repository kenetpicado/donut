<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrackRequest;
use App\Http\Resources\TrackResource;
use App\Services\TrackService;

class TrackController extends Controller
{
    private TrackService $trackService;

    public function __construct()
    {
        $this->trackService = new TrackService();
    }

    public function __invoke(TrackRequest $request)
    {
        return TrackResource::make($this->trackService->getPackageInformation($request->validated()))->resolve();
    }
}
