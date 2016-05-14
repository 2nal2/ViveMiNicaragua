<?php

class ComentarioVideo
{
    public $IdComentario;
    public $IdUsuario;
    public $IdVideo;
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
