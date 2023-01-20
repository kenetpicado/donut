<?php

namespace App\Classes;

class Component
{
    public $name;
    public $partial_1;
    public $partial_2;
    public $partial_3;
    public $total;
    public $second_call;

    public function __construct($cols)
    {
        $this->name         = $this->cleanValue($cols[0]);
        $this->partial_1    = $this->cleanValue($cols[1]);
        $this->partial_2    = $this->cleanValue($cols[2]);
        $this->partial_3    = $this->cleanValue($cols[3]);
        $this->total        = $this->cleanValue($cols[4]);
        $this->second_call  = $this->cleanValue($cols[5]);

        $course             = $this->cleanValue($cols[6]);
        $tutorship          = $this->cleanValue($cols[7]);

        $this->total = is_numeric($course)
            ? $course
            : $this->total;

        $this->total = is_numeric($tutorship)
            ? $tutorship
            : $this->total;
    }

    public function cleanValue($name)
    {
        return str_replace('&nbsp', '', trim($name->textContent ?? '', chr(0xC2) . chr(0xA0)));
    }
}
