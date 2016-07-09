<?php
session_start();
require_once '../../view/constants.php';
require_once _dependencia_.'Model/UsuarioModel.php';
require_once _dependencia_.'Objects/Usuario.php';
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



  if($usuario->Estado){
    $usuario->Estado =  0;
  }
  else{
    $usuario->Estado =  1;
  }

  $model->update($usuario);
}

header("Location: "._ROOT_."admin");


 ?>
