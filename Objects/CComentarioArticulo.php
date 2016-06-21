<?php
/**
 *
 */
class CComentarioArticulo
{
    public $IdCC;
    public $IdComentarioPadre;
    public $IdUsuario;
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
