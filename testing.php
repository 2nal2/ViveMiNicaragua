<?php

// require_once 'Uploader.php';
// require_once 'Model/UsuarioModel.php';
// require_once 'Objects/Usuario.php';
// require_once 'Objects/Sesion.php';
// require_once 'Model/SesionModel.php';
// session_start();
// session_regenerate_id();
// echo session_id()."\n";
// $uploader = new Uploader();
// $direccion = $uploader->upload('archivo');
//
// $usuario = new Usuario();
// $cod = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'.uniqid());
// $usuario->__SET('NombreUsuario', 'b');
// $usuario->__SET('Email', 'bird@gmail.com');
// $usuario->__SET('Clave', '12345');
// $usuario->__SET('Rol', 'Admnistrador');
// $usuario->__SET('Estado', false);
// $usuario->__SET('CodigoActivacion', $cod);
// $usuario->__SET('Foto', $direccion);
//
// $usuarioModel = new UsuarioModel();
//
// $afectado = $usuarioModel->save($usuario);
//
// if ($afectado) {
//     $mensaje = "Entre aqui para activar su cuenta <a href='http://viveminicaragua.wwhost.ga/Activacion.php?cod=$cod'>http://viveminicaragua.wwhost.ga/Activacion.php?cod=$cod</a>";
//
//     require_once 'PHPMailer/Mail.php';
//
//     $mail = new Mail();
//     if($mail->Send('donaldov7@gmail.com' , 'Confirmacion de cuenta Vive mi Nicaragua', $mensaje)){
//       echo 'Mensaje enviado exitosamente';
//     }
//     else{
//       echo 'No se pudo enviar el mensaje';
//     }
// } else {
//     echo 'algo salio mal';
// }

//fin de un bloque de prueba de registro y envio de correo

// $today = date('Y-m-d H:i:s'); //Obtner la fecha actual formato mysql
// $sesion = new Sesion();
// $sesion->IdSesion = session_id();
// $sesion->IdUsuario = 1;
// $sesion->HoraInicio = $today;
//
// $sesionModel = new SesionModel();
// $guardado = $sesionModel->save($sesion);
//
// echo $guardado;
//fin de bloque de prueba de registro de sesionModel

// $sesionModel = new SesionModel();
// foreach ($sesionModel->getByUser(1) as $sesion) {
//   echo $sesion->IdSesion."\n";
//   echo "<br>";
//   echo $sesion->IdUsuario."\n";
//   echo "<br>";
//   echo $sesion->HoraInicio."\n";
//   echo "<br>";
//   echo $sesion->HoraFin."\n";
//   echo "<br>";
//   echo "--------------------";
//   echo "<br>";
// }
//fin de bloque de prueba de mostrar registro de sesion por usuario
//
// $usuarioModel = new UsuarioModel();
//
// foreach ($usuarioModel->getAll() as $usuario) {
//   echo $usuario->NombreUsuario;
//   echo "<br>";
// }

?>
