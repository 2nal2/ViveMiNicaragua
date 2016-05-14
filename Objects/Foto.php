<?php
/**
 *
 */
class Foto
{
    public $IdFoto;
    public $Nombre;
    public $IdCiudad;
    public $Descripcion;
    public $Latitud;
    public $Longitud;
    public $Ruta;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        $this->$k = $v;
    }
}
