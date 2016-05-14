<?php

  if (isset($_GET['cod'])) {
      $Codigo = $_GET['cod'];
      require_once 'Model/UsuarioModel.php';
      $model = new UsuarioModel();
      $a = $model->activate($Codigo);

      if ($a) {
          echo 'Activado exitosamente';
      }
  } else {
      echo 'Codigo de activacion invalido';
  }
