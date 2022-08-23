<?php
class Usuario{
    public $id;
    public $nombre;
    public $apellido;
    public $edad;

    function __construct($id,$nombre, $apellido, $edad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }
}