<?php

  session_start();


  if(!isset($_SESSION['id_user'])){
    header('Location: index.php');
  }
  require_once 'constants.php';
  require_once 'Model/UsuarioModel.php';
  require_once 'Objects/Usuario.php';
  require_once 'Uploader.php';

  $uploader = new Uploader();
  $model = new UsuarioModel();
  $usuario = new Usuario();

  $usuario =  $model->getById($_POST['id']);
  $usuario->Foto =  $uploader->upload($usuario->NombreUsuario);

  $actualizado = $model->update($usuario);

  $ruta = _ROOT_."admin/edit-user.php?id=$usuario->IdUsuario";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="util/bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="util/bower_components/sweetalert/dist/sweetalert.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
<?php if ($actualizado): ?>

      <script type='text/javascript'>
        setTimeout("location.href='<?php echo $ruta ?>'", 1000);
        swal('Cambio de foto de perfil exitosa' , 'La foto de perfil usada por su cuenta ha sido cambiada con exito', 'success');
      </script>
<?php else: ?>
  <script type='text/javascript'>
    setTimeout("location.href='<?php echo $ruta ?>'", 1000);
    swal('Error al cambiar la imagen' , 'Ha fallado el cambio de foto de perfil del usuario', 'error');
  </script>
<?php endif; ?>

</body>
</html>
