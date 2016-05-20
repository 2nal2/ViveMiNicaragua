<?php

require_once dirname(dirname(__FILE__)).'../../Model/UsuarioModel.php';
require_once dirname(dirname(__FILE__)).'../../Objects/Usuario.php';
require_once dirname(dirname(__FILE__)).'../../confirmation.php';
require_once dirname(dirname(__FILE__)).'../../PHPMailer/Mail.php';
if (isset($_POST['nombre']) and isset($_POST['email']) and isset($_POST['pass'])
and isset($_POST['pass2']) and isset($_POST['sexo'])) {

  $usuario = new Usuario();
  $model = new UsuarioModel();


  $cod = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'.uniqid());

  $usuario->NombreUsuario  = $_POST['nombre'];
  $usuario->Email   = $_POST['email'];
  $usuario->Sexo    = $_POST['sexo'];
  $usuario->Clave   = $_POST['pass'];
  $usuario->Rol    = 'Suscriptor';
  $usuario->Estado = true;
  $usuario->Foto   = '';
  $usuario->CodigoActivacion = $cod;

  $afectado = $model->save($usuario);

  if ($afectado) {
     $confirmation =  new Confirmation($cod);
      $mensaje = $confirmation->getMail();

      $mail = new Mail();
      if($mail->Send($usuario->Email , 'Confirmacion de cuenta Vive mi Nicaragua', $mensaje)){
        echo 'Mensaje enviado exitosamente';
        echo $mensaje;
      }
      else{
        echo 'No se pudo enviar el mensaje';
      }
  } else {
      echo 'algo salio mal';
  }

}
else{

  echo "faltan elementos";
}
