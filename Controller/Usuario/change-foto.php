<?php

  session_start();


  if(!isset($_SESSION['id_user'])){
    header('Location: ../../index.php');
  }
  require_once '../../view/constants.php';
  require_once '../../Model/UsuarioModel.php';
  require_once '../../Objects/Usuario.php';
  require_once '../../view/Uploader.php';

  $uploader = new Uploader();
  $model = new UsuarioModel();
  $usuario = new Usuario();

  $usuario =  $model->getById($_SESSION['id_user']);
  $usuario->Foto =  $uploader->upload($usuario->NombreUsuario);

  $actualizado = $model->update($usuario);

  $_SESSION['foto'] = $usuario->Foto;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="<?php echo _ROOT_; ?>util/bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?php echo _ROOT_; ?>util/bower_components/sweetalert/dist/sweetalert.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
<?php if ($actualizado): ?>

      <script type='text/javascript'>
        setTimeout("location.href='../../view/usuario/edit-profile.php'", 1000);
        swal('Cambio de foto de perfil exitosa' , 'La foto de perfil usada por su cuenta ha sido cambiada con exito', 'success');
      </script>
<?php else: ?>
  <script type='text/javascript'>
    setTimeout("location.href='../../view/usuario/edit-profile.php'", 1000);
    swal('Error al cambiar la imagen' , 'Ha fallado el cambio de foto de perfil del usuario', 'error');
  </script>
<?php endif; ?>

</body>
</html>
