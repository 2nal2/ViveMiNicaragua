<?php

require_once 'Uploader.php';
require_once 'Model/UsuarioModel.php';
require_once 'Objects/Usuario.php';
session_start();
echo session_id()."\n";
$uploader = new Uploader();
$direccion = $uploader->upload('archivo');

$usuario = new Usuario();
$cod = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'.uniqid());
$usuario->__SET('NombreUsuario', 'b');
$usuario->__SET('Email', 'bird@gmail.com');
$usuario->__SET('Clave', '12345');
$usuario->__SET('Rol', 'Admnistrador');
$usuario->__SET('Estado', false);
$usuario->__SET('CodigoActivacion', $cod);
$usuario->__SET('Foto', $direccion);

$usuarioModel = new UsuarioModel();

$afectado = $usuarioModel->save($usuario);

if ($afectado) {
    $mensaje = "Entre aqui para activar su cuenta <a href='http://viveminicaragua.wwhost.ga/Activacion.php?cod=$cod'>http://viveminicaragua.wwhost.ga/Activacion.php?cod=$cod</a>";

    require_once 'PHPMailer/Mail.php';

    $mail = new Mail();
    if($mail->Send('donaldov7@gmail.com' , 'Confirmacion de cuenta Vive mi Nicaragua', $mensaje)){
      echo 'Mensaje enviado exitosamente';
    }
    else{
      echo 'No se pudo enviar el mensaje';
    }
} else {
    echo 'algo salio mal';
}
