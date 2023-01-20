<?php

namespace App\Classes;

class Student
{
    public string $name;
    public string $id;
    public string $average;
    public string $grade;

    public function __construct($data)
    {
        $this->name         = trim($data->labels[7]->textContent);
        $this->id           = trim($data->labels[8]->textContent);
        $this->grade        = trim($data->labels[4]->textContent);
        $this->average      = trim($data->average[0]->textContent);
    }
}
