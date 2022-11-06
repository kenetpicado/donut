<?php

namespace App\Services;

use DOMDocument;

class ConnectionService
{
    /* Set Parameters and Create Context */
    public function createContext($request)
    {
        $postdata = http_build_query([
            'name' => 'f1',
            'carnet' => $request->id,
            'pin' => $request->password,
            'anyo_lec' => $request->year,
            'npag' => '2',
        ]);

        $opts = ['http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        ]];

        return stream_context_create($opts);
    }

    /* Connect and Get DOM */
    public function connect($request)
    {
        $result = file_get_contents(
            "https://portalestudiantes.unanleon.edu.ni/consulta_estudiantes.php",
            false,
            $this->createContext($request)
        );

        //$result = file_get_contents('no/2016.html', false);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($result, 'HTML-ENTITIES', 'UTF-8'));

        return $dom->getElementsByTagName('center')->length == 0
            ? false
            : $dom;
    }
}
