<?php

namespace App\Services;

use App\Classes\Anyo;
use App\Classes\Componente;
use DOMDocument;

class Servicios
{

    /**
     * Conectar con sitio y obtener HTML
     *
     * @param  mixed $request
     * @return DOMDocument
     */
    public function getHTML($request)
    {
        /* Establecer parametros */
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
        //$result = file_get_contents($request->anyo . '.html', false);
        //$result = file_get_contents('2016.html', false);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($result, 'HTML-ENTITIES', 'UTF-8'));

        /* Error de crendenciales */
        if ($dom->getElementsByTagName('center')->length == 0)
            return null;

        /* Retornar pagina web completa */
        return $dom;
    }
    
    /**
     * Obtener todos los componentes
     *
     * @param  mixed $dom
     * @return array
     */
    public function getComponentes($dom)
    {
        $componentes = [];
        $rows = $dom->getElementsByTagName('table')->item(3)->getElementsByTagName('tr');

        foreach ($rows as $key => $row) {
            /* Omitir encabezado de la tabla */
            if ($key == 0)
                continue;

            /* Obtener todas las columnas y agregar array*/
            $cols = $row->getElementsByTagName('td');
            array_push($componentes, new Componente($cols));
        }

        return $componentes;
    }

    /**
     * Obtener los anyos disponibles para consultar
     * 
     * @return array
     */
    public function anyos()
    {
        $anyos = [];
        array_push($anyos, new Anyo('2022'));
        array_push($anyos, new Anyo('2021'));
        array_push($anyos, new Anyo('2020'));
        array_push($anyos, new Anyo('2019'));
        array_push($anyos, new Anyo('2018'));
        array_push($anyos, new Anyo('2017'));
        array_push($anyos, new Anyo('2016'));
        array_push($anyos, new Anyo('2015'));
        array_push($anyos, new Anyo('2014'));
        return $anyos;
    }
}
