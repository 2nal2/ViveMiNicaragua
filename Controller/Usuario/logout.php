<?php
require_once '../../view/constants.php';
require_once '../../Model/UsuarioModel.php';

session_start();
$model = new UsuarioModel();

$a =  $model->logout();
header('Location: ../../index.php');
 ?>
