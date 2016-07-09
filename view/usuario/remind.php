<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Receperar cuenta</title>

        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/formulario.css">
        <link rel="stylesheet" href="css/etc.css">

    </head>

    <body>
      <?php
      session_start();

      if (isset($_SESSION['id_user'])) {
          header('Location: index.php');
      }
      require_once 'Model/UsuarioModel.php';
      require_once 'PHPMailer/Mail.php';
      $error = '';
      $email = '';

      if (isset($_POST['email'])) {
          $email = $_POST['email'];

          $cod = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'.uniqid());
          $model = new UsuarioModel();

          $usuario = $model->existsEmail($email);
          $iduser = $usuario->IdUsuario;
          if ($usuario != null) {
              $usuario->CodigoActivacion = $cod;
              $usuario->Tstamp = date('Y-m-d H:i:s');
              $actualizado = $model->update($usuario);
              if ($actualizado) {
                  $mensaje = "
                  <p>
                    Estimado usuario
                  </p>

                  <p>
                    Recientemente se ha enviado una solicitud de reinicio de tu contraseña para nuestra área de miembros. Si no solicitaste esto, por favor ignora este correo. Expirará y se volverá inutil en 24 horas.
                  </p>

                  <p>
                    Para reiniciar tu contraseña, por favor visita la url a continuación:
                  </p>
                  http://viveminicaragua.wwhost.ga/recover.php?cod=$cod&user=$iduser
                  <p>
                    Cuando visites el link de arriba, tu contraseña será reestablecida
                  </p>
                  ";

                  $Mail = new Mail();
                  if ($Mail->Send($usuario->Email, 'recuperacion de cuenta Vive mi Nicaragua', $mensaje)) {
                      header('Location: singin.php?try=1');
                  } else {
                      $error = 'No se pudo enviar el correo de recuperacion, revise si el correo ingresado es correcto';
                  }
              }
              else{
                $error = 'No se pudo realizar la recuperación, por favor intente nuevamente';
              }
          } else {
              $error = 'El correo ingresado no corresponde a una cuenta registrada en Vive mi Nicaragua';
          }
      }

       ?>
       <div class="logo-container">
         <img class = 'logo' src="img/text42.png" alt="" />
       </div>

        <div class="contenedor-formulario">
            <div class="wrap">
                <form class="formulario" action="" name="formulario_registro" method="post">
                    <div>
                      <div class="input-group">
                        <h2 class="green-font">Olvidó la Contraseña?</h2>
                      </div>

                        <div class="input-group">
                            <input type="email" id="email" name="email" value=''>
                            <label class="label <?php if ($error != '') {
    echo ' active';
} ?>" for="email">Correo:</label>
                        </div>

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

        <script src="js/formulario.js"></script>
    </body>
</html>
