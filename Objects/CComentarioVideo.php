<?php
/**
 *
 */
class CComentarioVideo
{
    public $IdCC;
    public $IdComentarioPadre;
    public $IdComentarioHijo;

    public function __GET($k)
    {
        return $this->$k;
    }

    public function __SET($k, $v)
    {
        $this->$k = $v;
    }
}
