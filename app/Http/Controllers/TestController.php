<?php

namespace App\Http\Controllers;

use App\Classes\Student;
use App\Classes\University;
use App\Services\ComponentService;
use App\Services\PurgeDataService;
use Illuminate\Http\Request;
use DOMDocument;

class TestController extends Controller
{
    public function __invoke()
    {
        $dom = $this->connectionLocal();

        $data = (new PurgeDataService)($dom);
        unset($dom);

        return response()
            ->json([
                'student' => new Student($data),
                'university' => new University($data->labels),
                'cycles' => (new ComponentService)($data->rows)
            ], 200);
    }

    public function connectionLocal()
    {
        $result = file_get_contents('no/2016.html', false);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($result, 'HTML-ENTITIES', 'UTF-8'));

        return $dom->getElementsByTagName('center')->length == 0
            ? false
            : $dom;
    }
}
