<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header('Location: index.php');
}

require_once 'Model/UsuarioModel.php';
require_once 'Objects/Usuario.php';
require_once 'confirmation.php';
require_once 'PHPMailer/Mail.php';
$error = '';
$nombre = '';
$email = '';
if (isset($_POST['nombre']) and isset($_POST['email']) and isset($_POST['pass'])
and isset($_POST['pass2']) and isset($_POST['sexo'])) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secret = '6LfIjyATAAAAAIsWuBhxhtV8KmxGtISVxqccbVVp';

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            $usuario = new Usuario();
            $model = new UsuarioModel();

            $cod = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'.uniqid());

            $usuario->NombreUsuario = $_POST['nombre'];
            $usuario->Email = strtolower($_POST['email']);
            $usuario->Sexo = $_POST['sexo'];
            $usuario->Clave = $_POST['pass'];
            $usuario->Rol = 'Suscriptor';
            $usuario->Estado = 0;
            $usuario->Foto = 'uploads/default-user.png';
            $usuario->CodigoActivacion = $cod;

            $nombre = $usuario->NombreUsuario;
            $email = $usuario->Email;

            if ($model->existsEmail($usuario->Email)!=null) {
                $error = 'Ya existe una cuenta asociada con esa cuenta de correo';
            } elseif ($model->existsUser($usuario->NombreUsuario)) {
                $error = 'El nombre de usuario ya esta ocupado';
            } elseif ($usuario->Clave !=  $_POST['pass2']) {
                $error = 'Las cotraseñas no coinciden';
            } else {
                $afectado = $model->save($usuario);

                if ($afectado) {
                    $confirmation = new Confirmation($cod);
                    $mensaje = $confirmation->getMail();

                    $mail = new Mail();
                    if ($mail->Send($usuario->Email, 'Confirmacion de cuenta Vive mi Nicaragua', $mensaje)) {
                        // echo 'Mensaje enviado exitosamente';
                        header('Location: mensaje_registro.html');
                    } else {
                        echo 'No se pudo enviar el mensaje';
                    }
                } else {
                    $error = 'Lo sentimos, no se puedo realizar el registro, intente de nuevo porfavor';
                }
            }
        } else {
            $error = 'No es un humano';
        }
    }
}
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title></title>

        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/formulario.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>

        <div class="contenedor-formulario">
            <div class="wrap">
                <form class="formulario" action="" name="formulario_registro" method="post">
                    <div>
                        <div class="input-group">
                            <input type="text" id="nombre" name="nombre" pattern="^@?(\w){1,50}$" required value= <?php echo $nombre ?> >
                            <label class="label <?php if ($error != '') {
    echo ' active';
} ?>" for="nombre">Nombre de usuario:</label>
                            <div id="Info"></div>
                        </div>
                        <div class="input-group">
                            <input type="email" id="email" name="email" required value= <?php echo $email ?>>
                            <label class="label <?php if ($error != '') {
    echo ' active';
} ?>" for="email">Correo:</label>
                        </div>
                        <div class="input-group">
                            <input type="password" id="pass" name="pass" required>
                            <label class="label" for="pass">Contraseña:</label>
                            <div id= 'pwdInfo'>
                              <p style="color: #ff5252">
                                Contraseña demasiado debil
                              </p>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="password" id="pass2" name="pass2" required>
                            <label class="label" for="pass2">Repetir contraseña:</label>
                            <div id= 'pwdNotMatch'>
                              <p style="color: #ff5252">
                                Las contraseñas no coinciden
                              </p>
                            </div>
                        </div>

                        <div class="input-group radio">
                            <input type="radio" name="sexo" id="hombre" value="Hombre">
                            <label for="hombre">Hombre</label>

                            <input type="radio" name="sexo" id="mujer" value="Mujer">
                            <label for="mujer">Mujer</label>

                            <input type="radio" name="sexo" id="otro" value="Otro">
                            <label for="otro">Otro</label>
                        </div>

                        <div class="input-group checkbox">
                            <input type="checkbox" name="terminos" id="terminos" value="true">
                            <label for="terminos">Acepto los <a href="#">terminos y condiciones de uso</a></label>
                        </div>

                        <div style="background-color : #ff5252; text-align:center;">
                          <p>
                            <?php echo $error;?>
                          </p>
                        </div>
                        <br>
                        <div  align="center">
                          <div class="g-recaptcha" data-sitekey="6LfIjyATAAAAAB0lcE2GbAfSG68IsNxlsCjOrSgJ"></div>
                          <br>
                        </div>
                        <input type="submit" id="btn-submit" value="Enviar">
                    </div>

                </form>
            </div>
        </div>


        <script src="js/formulario.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
          $('#nombre').keyup(function() {

            var username = $(this).val();
            var dataString = 'nombre=' + username;

            $.ajax({
              type: "POST",
              url: "Controller/Usuario/Login.php",
              data: dataString,
              success: function(data) {
                $('#Info').fadeIn(1000).html(data);

              }
            });
          });
        });
        </script>

        <script type="text/javascript">

        var validarPass = function(){

          if(passwordLevel(this.value) < 30){
            $('#pwdInfo').show(100);
          }
          else{
            $('#pwdInfo').hide(100);
          }
        }

        function passwordLevel(p) {
          l = 0;
          v1 = 'aeiou1234567890';
          v2 = 'AEIOUbcdfghjklmnpqrst';
          v3 = 'vxyzBCDFGHJKLMNPQRST';
          v4 = 'VXYZ$@#';
          for (i = 0; i < p.length; i++) {
            if (v1.indexOf(p[i]) != -1) l += 1;
            else if (v2.indexOf(p[i]) != -1) l += 2;
            else if (v3.indexOf(p[i]) != -1) l += 3;
            else if (v4.indexOf(p[i]) != -1) l += 4;
            else l += 5;
          }
          l *= 3;
          if (l > 100) l = 100;
          return l;
        }

          $('#pwdInfo').hide(100);
          $('#pass').keyup(validarPass);
        </script>
    </body>
</html>
