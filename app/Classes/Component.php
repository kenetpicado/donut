<?php

namespace App\Classes;

class Component
{
    public string $name;
    public string $partial_1;
    public string $partial_2;
    public string $partial_3;
    public string $total;
    public string $second_call;
    public string $course;
    public string $tutorship;

    public function __construct($cols)
    {
        $this->name         = $this->formatValue($cols[0]?->textContent);
        $this->partial_1    = $this->formatValue($cols[1]?->textContent);
        $this->partial_2    = $this->formatValue($cols[2]?->textContent);
        $this->partial_3    = $this->formatValue($cols[3]?->textContent);
        $this->total        = $this->formatValue($cols[4]?->textContent);
        $this->second_call  = $this->formatValue($cols[5]?->textContent);
        $this->course       = $this->formatValue($cols[6]?->textContent);
        $this->tutorship    = $this->formatValue($cols[7]?->textContent);
    }

    public function formatValue($name)
    {
        $value = str_replace('&nbsp', '', trim($name, chr(0xC2) . chr(0xA0)));
        return $value == '-' ? '' : $value;
    }
}
