<?php
session_start();

if (isset($_SESSION['id_user'])) {
    header('Location: ../index.php');
}
require_once '../constants.php';
require_once '../../Model/UsuarioModel.php';
$error = '';
$email = '';

 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title></title>

        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../../css/formulario.css">
        <script src="<?php echo _ROOT_; ?>util/bower_components/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="<?php echo _ROOT_; ?>util/bower_components/sweetalert/dist/sweetalert.css">
    </head>
    <body>

      <?php
     if (isset($_GET['try'])) {
         echo "
             <script type='text/javascript'>
               swal('Revisa tu correo' , 'hemos enviado un enlace para reiniciar la contraseña', 'success');
             </script>";
     } elseif (isset($_POST['email']) and isset($_POST['pass'])) {
         $model = new UsuarioModel();

         $email = $_POST['email'];
         $pass = $_POST['pass'];
         $usuario = $model->login(strtolower($email), $pass);

         if ($usuario != null) {
            if(isset($_GET['redirect'])){
              header('Location: '._ROOT_.$_GET['redirect']);
            }
            else{
              header('Location: ../index.php');
            }

         } else {
             $error = 'Correo y/o contraseña incorrectos, intente nuevamente';
         }
     }

      ?>
        <div class="contenedor-formulario">
            <div class="wrap">
                <form class="formulario" action="" name="formulario_registro" method="post">
                    <div>
                        <div class="input-group">
                            <input type="email" id="email" name="email" value=<?php echo $email ?>>
                            <label class="label <?php if ($error != '') {
    echo ' active';
} ?>" for="email">Correo:</label>
                        </div>
                        <div class="input-group">
                            <input type="password" id="pass" name="pass">
                            <label class="label" for="pass">Contraseña:</label>
                        </div>

                            <a href="remind.php">Olvide mi Contraseña</a>
                        <!-- </div> -->
                        <div style="background-color : #ff5252; text-align:center;">
                          <p>
                            <?php echo $error;?>
                          </p>
                        </div>

                        <input type="submit" id="btn-submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>

        <script src="../../js/formulario.js"></script>
    </body>
</html>
