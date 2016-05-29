<?php
require_once dirname(dirname(__FILE__)).'../../Objects/Usuario.php';
require_once dirname(dirname(__FILE__)).'../../Model/UsuarioModel.php';

session_start();

if(!isset($_SESSION['id_user'])){
  header('Location: ../../index.php');
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


  header('Location: ../../edit-profile.php');
}
else{
  header('Location: ../../edit-profile.php');
}
?>
