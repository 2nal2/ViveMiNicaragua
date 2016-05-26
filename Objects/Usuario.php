<?php

class Usuario
{
    public $IdUsuario;
    public $Email;
    public $Clave;
    public $Rol;
    public $Estado;
    public $NombreUsuario;
    public $Foto;
    public $CodigoActivacion;
    public $Sexo;
    public $Tstamp;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        $this->$k = $v;
    }
}
