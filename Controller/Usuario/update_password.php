<?php

session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: ../../view/index.php');
}
require_once '../../view/constants.php';
require_once _dependencia_.'Model/UsuarioModel.php';
require_once _dependencia_.'Objects/Usuario.php';
if (isset($_POST['pass']) and isset($_POST['pass2']) and isset($_POST['actual'])) {
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $model = new UsuarioModel();
    $usuario = $model->getById($_SESSION['id_user']);
    if ($model->isValidPass($usuario->IdUsuario, $_POST['actual']) == null) {
        $_SESSION['error_pass'] = 'La contraseña actual no coincide';
        header('Location: ../../view/usuario/edit-profile.php#c');

        return;
    }
    if ($pass == $pass2) {
        $usuario->Clave = $pass;
        $actualizado = $model->updateClave($usuario);
    } else {
        $_SESSION['error_pass'] = 'Las contraseñas no coinciden';
    }
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <script src="../../util/bower_components/sweetalert/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" href="../../util/bower_components/sweetalert/dist/sweetalert.css">
   </head>
   <body>



<?php if ($actualizado): ?>
  <script type='text/javascript'>
    swal('Actualización de datos exitosa' , 'Se ha realizado el cambio de contraseña de cuenta', 'success');
    setTimeout("location.href='../../view/usuario/edit-profile.php'", 2000);

  </script>
  <?php $_SESSION['error_pass'] = ''; ?>
<?php else: ?>
  <script type="text/javascript">
  setTimeout("location.href='../../view/usuario/edit-profile.php'", 2000);
  swal('Error' , 'No se pudo realizar la actualizacion de la clave de su cuenta', 'error');
  </script>
<?php endif; ?>

</body>
</html>
