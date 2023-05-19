<?php

namespace App\Services;

use DOMDocument;

class ConnectionService
{
    public function createContext(array $request)
    {
        $postdata = http_build_query([
            'name' => 'f1',
            'carnet' => $request['id'],
            'pin' => $request['password'],
            'anyo_lec' => $request['year'],
            'npag' => '2',
        ]);

        $opts = ['http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata,
            //'timeout' => 5,
        ]];

        return stream_context_create($opts);
    }

    public function connect(array $request, $year = null)
    {
        if ($year) {
            $result = file_get_contents('no/' . $year . '.html', false);
        } else {
            $result = file_get_contents(
                "https://portalestudiantes.unanleon.edu.ni/consulta_estudiantes.php",
                false,
                $this->createContext($request)
            );
        }

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($result, 'HTML-ENTITIES', 'UTF-8'));

        return $dom->getElementsByTagName('center')->length == 0
            ? false
            : $dom;
    }
}
