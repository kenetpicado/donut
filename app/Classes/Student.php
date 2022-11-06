<?php

namespace App\Classes;

class Student
{
    public $year;
    public $faculty;
    public $career;
    public $name;
    public $id;
    public $cycle_year;
    public $average;

    public function __construct($dom)
    {
        $strongs            = $dom->getElementsByTagName('strong');
        $this->year         = trim($strongs[4]->textContent);
        $this->faculty      = trim($strongs[5]->textContent);
        $this->career       = trim($strongs[6]->textContent);
        $this->name         = trim($strongs[7]->textContent);
        $this->id           = trim($strongs[8]->textContent);
        $this->cycle_year   = trim($strongs[9]->textContent);

        $center             = $dom->getElementsByTagName('center');
        $this->average      = trim($center[0]->textContent);
    }
}
