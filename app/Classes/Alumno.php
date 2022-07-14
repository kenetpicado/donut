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
        $indice = $dom->getElementsByTagName('center')->item(0)->textContent;

        $this->nombre = trim(str_replace('Nombre y Apellidos: ', '', $strongs[7]->textContent));
        $this->carnet = trim(str_replace('Numero de Carnet: ', '', $strongs[8]->textContent));
        $this->facultad = trim(str_replace('FACULTAD: ', '', $strongs[5]->textContent));
        $this->carrera = trim(str_replace('CARRERA: ', '', $strongs[6]->textContent));
        $this->grado = trim($strongs[4]->textContent);
        $this->anyo = trim($strongs[9]->textContent);
        $this->indice = $indice;
    }
}
