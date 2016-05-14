
<?php
// require_once 'Connection/Connection.php';

 ?>
<!-- $usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->login('donaldov7@gmail.com', '12345');
if ($usuario == null) {
  echo 'No existe el usuario';
} else {
      echo $usuario->Email;
  }  -->

  <form enctype="multipart/form-data" action="testing.php" method="POST">
  <input name="uploadedfile" type="file" />
  <input type="submit" value="Subir archivo" />
  </form>
