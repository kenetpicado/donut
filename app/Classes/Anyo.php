<?php

namespace App\Classes;

class Anyo
{
    public $id;
    public $nombre;

    public function __construct($id)
    {
        $this->nombre = $id;
        $this->id = $id;
    }
}
