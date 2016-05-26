<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header('Location: index.php');
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
        <link rel="stylesheet" href="css/etc.css">
        <script src="util/bower_components/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="util/bower_components/sweetalert/dist/sweetalert.css">
    </head>
    <body>

      <?php
     require_once 'Model/UsuarioModel.php';
     require_once 'Objects/Usuario.php';

     $error = '';
     $nombre = '';
     $email = '';

     if (isset($_GET['cod']) && isset($_GET['user'])) {
         $cod = $_GET['cod'];
         $idUser = $_GET['user'];

         $model = new UsuarioModel();
         $usuario = $model->getByCodAndUser($cod, $idUser);
         if ($usuario == null) {
             header('Location: index.php');
         } elseif (isset($_POST['pass']) and isset($_POST['pass2'])) {
             $pass = $_POST['pass'];
             $pass2 = $_POST['pass2'];

             if ($pass == $pass2) {
                 $usuario->Clave = $pass;
                 $actualizado = $model->updateClave($usuario);

                 if ($actualizado) {
                     echo "
                       <script type='text/javascript'>
                         swal('Actualización de datos exitosa' , 'Se ha realizado el cambio de contraseña de cuenta', 'success');
                       </script>";
                 } else {
                     $error = 'Error al actualizar contraseña de usuario, por favor intente de nuevo';
                 }
             } else {
                 $error = 'Las contraseñas no coinciden';
             }
         }
     } else {
         header('Location:  index.php');
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
                          <h2 class="green-font">Cambio de contraseña</h2>
                        </div>

                        <div class="input-group">
                            <input type="password" id="pass" name="pass" required>
                            <label class="label" for="pass">Tu nueva contraseña:</label>
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

        <script type="text/javascript">
          $(document).ready(
            function() {
              $('.confirm').click(
                function(){
                  setTimeout("location.href='index.php'", 100);

                }
              );
            }
          );
        </script>
    </body>
</html>
