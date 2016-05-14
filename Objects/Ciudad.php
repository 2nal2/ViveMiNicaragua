<?php
/**
 *
 */
class Ciudad
{
    public $IdCiudad;
    public $Nombre;
    public $Descripcion;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        $this->$k = $v;
    }
}
