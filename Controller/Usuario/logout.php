<?php


require_once dirname(dirname(__FILE__)).'../../Model/UsuarioModel.php';

session_start();
$model = new UsuarioModel();

$a =  $model->logout();
header('Location: ../../index.php');
 ?>
