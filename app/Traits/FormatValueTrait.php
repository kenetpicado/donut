<?php

namespace App\Traits;

trait FormatValueTrait
{
    public function formatValue($name)
    {
        $value = str_replace('&nbsp', null, trim($name, chr(0xC2).chr(0xA0)));

        if (is_numeric($value)) {
            return (float) $value;
        }

        if (is_null($value) || $value == '' || $value == '-') {
            return null;
        }

        return $value;
    }

    public function cleanName($name)
    {
        return trim(str_replace('Nombre y Apellidos: ', '', $name));
    }

    public function cleanId($value)
    {
        return trim(str_replace('Numero de Carnet: ', '', $value));
    }
}
