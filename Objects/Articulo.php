<?php

/**
 *
 */
class Articulo
{
    public $IdArticulo;
    public $IdCiudad;
    public $Titulo;
    public $Banner;
    public $IdAutor;
    public $Contenido;
    public $FechaCreacion;
    public $Latitud;
    public $Longitud;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        $this->$k = $v;
    }
}
