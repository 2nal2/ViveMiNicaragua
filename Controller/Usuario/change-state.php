<?php
session_start();
include_once '../../constants.php';
require_once '../../Model/UsuarioModel.php';
require_once '../../Objects/Usuario.php';
if(!isset($_SESSION['id_user'])){
   header("Location: "._ROOT_."admin");
   return;
}
else{
  $model = new UsuarioModel();
  $admin = $model->getById($_SESSION['id_user']);
  if($admin->Rol!='Administrador'){
    header("Location: "._ROOT_."admin");
    return;
  }
}

if (isset($_GET['id'])) {

  $model = new UsuarioModel();
  $usuario =  $model->getById($_GET['id']);

  $usuario->Estado =  !$usuario->Estado;

  $model->update($usuario);
}

header("Location: "._ROOT_."admin");


 ?>
