<?php

class ComentarioFoto
{
    public $IdComentario;
    public $IdUsuario;
    public $IdFoto;
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
