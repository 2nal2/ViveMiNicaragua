<?php
require_once '../../view/constants.php';
require_once _dependencia_.'Objects/Usuario.php';
require_once _dependencia_.'Model/UsuarioModel.php';

session_start();

if(!isset($_SESSION['id_user'])){
  header('Location: ../../view/index.php');
}
if(isset($_POST['nombre']) and isset($_POST['email']) and isset($_POST['sexo'])){
  $model =  new UsuarioModel();
  $usuario = $model->getById($_SESSION['id_user']);

  $usuario->NombreUsuario = $_POST['nombre'];
  $usuario->Email = $_POST['email'];
  $usuario->Sexo = $_POST['sexo'];

  $a = $model->update($usuario);
  if($a){
    $_SESSION['nombre'] = $usuario->NombreUsuario;
  }


  header('Location: ../../view/usuario/edit-profile.php');
}
else{
  header('Location: ../../view/usuario/edit-profile.php');
}
?>
