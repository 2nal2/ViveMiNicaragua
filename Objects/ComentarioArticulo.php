<?php

class ComentarioArticulo
{
    public $IdComentario;
    public $IdUsuario;
    public $IdArticulo;
    public $Fecha;
    public $Estado;
    public $Comentario;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        $this->$k = $v;
    }
}
