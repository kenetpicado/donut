<?php

namespace App\Classes;

class Alumno
{
    public $nombre;
    public $carnet;
    public $facultad;
    public $carrera;
    public $grado;
    public $anyo;
    public $indice;

    public function __construct($dom)
    {
        $strongs = $dom->getElementsByTagName('strong');
        $this->grado = trim($strongs[4]->textContent);
        $this->facultad = trim($strongs[5]->textContent);
        $this->carrera = trim($strongs[6]->textContent);
        $this->nombre = trim($strongs[7]->textContent);
        $this->carnet = trim($strongs[8]->textContent);
        $this->anyo = trim($strongs[9]->textContent);
        $this->indice = $dom->getElementsByTagName('center')->item(0)->textContent;
    }
}
