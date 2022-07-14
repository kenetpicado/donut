<?php

namespace App\Services;

use App\Classes\Componente;
use DOMDocument;

class Servicios
{

    //Conectar y devolver HTML
    public function getHTML($request)
    {
        $postdata = http_build_query([
            'name' => 'f1',
            'carnet' => $request->carnet,
            'pin' => $request->pin,
            'anyo_lec' => $request->anyo,
            'npag' => '2',
        ]);

        $opts = ['http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        ]];

        $context = stream_context_create($opts);
        $result = file_get_contents('https://portalestudiantes.unanleon.edu.ni/consulta_estudiantes.php', false, $context);
        //$result = file_get_contents('notas/notas2019.html', false);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($result, 'HTML-ENTITIES', 'UTF-8'));

        if ($dom->getElementsByTagName('center')->length == 0)
            return null;

        return $dom;
    }

    public function getComponentes($dom)
    {
        $componentes = [];

        $table = $dom->getElementsByTagName('table');
        $rows = $table[3]->getElementsByTagName('tr');

        foreach ($rows as $key => $row) {
            if ($key == 0)
                continue;

            $cols = $row->getElementsByTagName('td');

            $componente = new Componente($cols);

            array_push($componentes, $componente);
        }

        return $componentes;
    }
}
