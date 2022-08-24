<?php

namespace App\Classes;

class Componente
{
    public $nombre;
    public $p1;
    public $p2;
    public $p3;
    public $final;
    public $convocatoria;
    public $curso;
    public $tutoria;

    public function __construct($cols)
    {
        $this->nombre = trim($cols[0]->textContent, chr(0xC2) . chr(0xA0));
        $this->p1 = $this->getNota($cols, 1);
        $this->p2 = $this->getNota($cols, 2);
        $this->p3 = $this->getNota($cols, 3);
        $this->final = $this->getNota($cols, 4);
        $this->convocatoria = $this->getNota($cols, 5);

        if (is_numeric($this->getNota($cols, 6))) {
            $this->final = $this->getNota($cols, 6);
        }

        if (is_numeric($this->getNota($cols, 7))) {
            $this->final = $this->getNota($cols, 7);
        }
    }

    public function getNota($cols, $indice)
    {
        $nota = str_replace('&nbsp', '', ($cols[$indice]->textContent ?? ''));
        return preg_replace('/\xc2\xa0/', '', $nota) ?: '-';
    }
}
