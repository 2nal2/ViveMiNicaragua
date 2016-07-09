<?php
session_start();
include_once _dependencia_.'constants.php';
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

  $usuario->Clave = 'viveminicaragua';

  $a = $model->updateClave($usuario);
  if($a){
    $_SESSION['error_pass'] =   "Contraseña reestablecida";
  }
  else{
    $_SESSION['error_pass'] =   "No se pudo reestablecer la contraseña, intente mas tarde";
  }
}

header("Location: "._ROOT_."admin");


 ?>
