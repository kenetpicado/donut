<?php

namespace App\Classes;

class University
{
    public string $full_name;
    public string $name;
    public string $academic_year;
    public string $faculty;
    public string $career;

    public function __construct($labels)
    {
        $this->full_name    = trim($labels[1]->textContent);
        $this->name         = trim($labels[2]->textContent);
        $this->academic_year= trim($labels[9]->textContent);
        $this->faculty      = trim($labels[5]->textContent);
        $this->career       = trim($labels[6]->textContent);
    }
}
