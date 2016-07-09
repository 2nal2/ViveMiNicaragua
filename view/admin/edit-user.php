<?php
  include_once '../header.php';
  require_once '../../Model/UsuarioModel.php';
  require_once '../../Objects/Usuario.php';

  $usuarioModel = new UsuarioModel();
  $error = '';
  $mensaje = '';
?>

<?php if (!isset($_SESSION['id_user'])): ?>
  <script type='text/javascript'>
    setTimeout("location.href='../index.php'", 0);
  </script>
<?php return; ?>
<?php else: ?>
  <?php $admin = $usuarioModel->getById($_SESSION['id_user']); ?>
  <?php if ($admin->Rol != 'Administrador'): ?>
    <script type='text/javascript'>
      setTimeout("location.href='../index.php'", 0);
    </script>
    <?php return; ?>
  <?php endif; ?>
<?php endif; ?>
<?php if (!isset($_GET['id'])): ?>
  <script type='text/javascript'>
    setTimeout("location.href='../index.php'", 0);
  </script>
<?php return; ?>
<?php endif; ?>

<?php
  $usuario =  $usuarioModel->getById($_GET['id']);
  include_once '../../Controller/Usuario/update_user_admin.php';/*se trae el codigo del controlador no hace instancia*/
 ?>
 <br>
 <br>
 <form class='panel1' name="form_image" enctype="multipart/form-data" action="../../Controller/Usuario/change-foto-admin.php" method="post">
   <input type="hidden" name="id" value="<?php echo $usuario->IdUsuario; ?>">
   <div class="input-group">
     <div class="image-container">
       <img class="logo-muestra" src="<?php echo $url ?><?php echo $usuario->Foto ?>" alt="" />
       <div id="upload-div">
         <input class="upload" name="uploadedfile" type="file" required/>
         <input id= "img-submit" type="submit" value="Subir archivo" />
       </div>
     </div>
   </div>
 </form>

<div class="contenedor-formulario">
    <div class="wrap">
        <form id="formulario_info" class="formulario" action="" name="formulario_registro" method="post">
            <div>
              <input type="hidden" name="id" value="<?php echo $usuario->IdUsuario; ?>">
              <input type="hidden" id="nombre_actual" value='<?php echo $usuario->NombreUsuario; ?>'>
                <div class="input-group">
                    <input type="text" id="nombre" name="nombre" pattern="^@?(\w){1,50}$" required value='<?php echo $usuario->NombreUsuario; ?>' >
                    <label class="label active" for="nombre">Nombre de usuario:</label>
                    <div id="Info"></div>
                </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" required value= '<?php echo $usuario->Email ?>'>
                    <label class="label active" for="email">Correo:</label>
                </div>


                <div class="input-group radio">

                  <input type="radio" name="sexo" id="hombre" value="Hombre" <?php if ($usuario->Sexo == 'Hombre') {
                      echo 'checked="checked"';
                  } ?>>
                  <label for="hombre">Hombre</label>

                  <input type="radio" name="sexo" id="mujer" value="Mujer"
                  <?php if ($usuario->Sexo == 'Mujer') {
                      echo 'checked="checked"';
                  } ?>>
                  <label for="mujer">Mujer</label>

                  <input type="radio" name="sexo" id="otro" value="Otro"
                  <?php if ($usuario->Sexo == 'Otro') {
                      echo 'checked="checked"';
                  } ?>>
                  <label for="otro">Otro</label>
                </div>


                <div class="input-group radio">
                  <input type="radio" name="rol" id="suscriptor" value="Suscriptor"
                  <?php if ($usuario->Rol == 'Suscriptor') {
                      echo 'checked="checked"';
                  } ?>>
                  <label for="suscriptor">Suscriptor</label>

                  <input type="radio" name="rol" id="administrador" value="Administrador"
                  <?php if ($usuario->Rol == 'Administrador') {
                      echo 'checked="checked"';
                  } ?>>
                  <label for="administrador">Administrador</label>

                  <input type="radio" name="rol" id="editor" value="Editor"
                  <?php if ($usuario->Rol == 'Editor') {
                      echo 'checked="checked"';
                  } ?>>
                  <label for="editor">Editor</label>
                </div>

                <div style="background-color : #ff5252; text-align:center;">
                  <p>
                    <?php echo $error;?>
                  </p>
                </div>
                <div style="background-color : #009688; text-align:center;">
                  <p>
                    <?php echo $mensaje;?>
                  </p>
                </div>
                <br>
                <input type="submit" id="btn-submit" value="Enviar">
            </div>

        </form>
    </div>
</div>


<script src="../../js/formulario-generic.js"></script>
<script type="text/javascript">
    console.log('estoy ejecutando');
    $('#nombre').keyup(function() {

      var username = $(this).val();
      var actual = $('#nombre_actual').val();
      var dataString = 'nombre=' + username+'&actual='+actual;

      $.ajax({
        type: "POST",
        url: "../../Controller/Usuario/change_name_user.php",
        data: dataString,
        success: function(data) {
          $('#Info').fadeIn(1000).html(data);
        }
      });
  });
</script>
<?php
 require_once '../footer.php';
?>
