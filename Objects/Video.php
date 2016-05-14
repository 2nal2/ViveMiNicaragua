<?php
/**
 *
 */
class Foto
{
    public $IdVideo;
    public $IdCiudad;
    public $Nombre;
    public $Descripcion;
    public $Latitud;
    public $Longitud;
    public $Url;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        $this->$k = $v;
    }
}
