<?php

namespace App\Traits;

trait FormatValueTrait
{
    public function formatValue($name)
    {
        $value = str_replace('&nbsp', null, trim($name, chr(0xC2) . chr(0xA0)));

        if (is_numeric($value)) {
            return (float) $value;
        }

        if (is_null($value) || $value == '' || $value == '-') {
            return null;
        }

        return $value;
    }
}
