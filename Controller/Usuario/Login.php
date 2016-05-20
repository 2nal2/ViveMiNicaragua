<?php

require_once dirname(dirname(__FILE__)).'../../Model/UsuarioModel.php';

if (isset($_POST['email']) and isset($_POST['pass'])) {
    $model = new UsuarioModel();

    $email = $_POST['email'];
    $pass  = $_POST['pass'];
    $usuario = $model->login($email, $pass);

    if ($usuario != null) {
        header('Location: ../../index.html');

    } else {
       ob_start();

        header("Refresh: .5; URL=../../singin.html");
        echo "<script type='text/javascript'>
          alert('inicio de sesion invalido');
        </script>";
    }
}
