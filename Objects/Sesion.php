<?php
  /**
   *
   */
  class Sesion
  {
      public $IdSesion;
      public $IdUsuario;
      public $HoraInicio;
      public $HoraFin;

      public function __GET($k)
      {
          return $this->$k;
      }

      public function __SET($k, $v)
      {
          $this->$k = $v;
      }
  }
