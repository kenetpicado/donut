<?php

namespace App\Services;

use App\Classes\Component;

class ComponentService
{
    public function all($dom)
    {
        $components = [];
        $rows = $dom->getElementsByTagName('table')->item(3)->getElementsByTagName('tr');

        foreach ($rows as $key => $row) {

            /* Omitir encabezado de la tabla */
            if ($key == 0)
                continue;

            /* Obtener todas las columnas y agregar array*/
            $cols = $row->getElementsByTagName('td');
            array_push($components, new Component($cols));
        }

        return $components;
    }

    // public function getNota($grade)
    // {
    //     $new_grade = str_replace('&nbsp', '', ($grade ?? ''));
    //     return preg_replace('/\xc2\xa0/', '', $new_grade) ?: '-';
    // }
}
