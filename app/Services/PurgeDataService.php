<?php

namespace App\Services;

class PurgeDataService
{
    public function __invoke($dom)
    {
        return (object) [
            'labels' => $dom->getElementsByTagName('strong'),
            'average' => $dom->getElementsByTagName('center'),
            'rows' => $dom->getElementsByTagName('table')->item(3)->getElementsByTagName('tr')
        ];
    }
}
