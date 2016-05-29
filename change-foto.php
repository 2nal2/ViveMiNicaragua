<?php

  session_start();


  if(!isset($_SESSION['id_user'])){
    header('Location: ../../index.php');
  }
  require_once 'Model/UsuarioModel.php';
  require_once 'Objects/Usuario.php';
  require_once 'Uploader.php';

  $uploader = new Uploader();
  $model = new UsuarioModel();
  $usuario = new Usuario();

  $usuario =  $model->getById($_SESSION['id_user']);
  $usuario->Foto =  $uploader->upload($usuario->NombreUsuario);

  $actualizado = $model->update($usuario);

  $_SESSION['foto'] = $usuario->Foto;
?>

<?php if ($actualizado): ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
      <script src="util/bower_components/sweetalert/dist/sweetalert.min.js"></script>
      <link rel="stylesheet" href="util/bower_components/sweetalert/dist/sweetalert.css">
    </head>
    <body>
      <script type='text/javascript'>
        setTimeout("location.href='edit-profile.php'", 1000);
        swal('Cambio de foto de perfil exitosa' , 'La foto de perfil usada por su cuenta ha sido cambiada con exito', 'success');
      </script>
    </body>
  </html>
<?php endif; ?>
