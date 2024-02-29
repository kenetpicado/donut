<?php

namespace App\Services;

class TrackService
{
    public function getPackageInformation(array $request)
    {
        $connectionService = new ConnectionService();

        return $connectionService->connectToEverestCargotrack($request);
    }

}
