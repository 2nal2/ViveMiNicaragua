<?php

include 'header.php';
require_once 'Model/UsuarioModel.php';
require_once 'Objects/Usuario.php';

$error = '';

if (!isset($_SESSION['id_user'])) {
    header('Location: index.php');
}

$id = $_SESSION['id_user'];
$model = new UsuarioModel();
$usuario = $model->getById($id);

?>

<body>
  <br>
  <br>
  <div id="inicio"></div>
  <div class="contenedor-formulario">
    <div id="tabs">
      <ul>
          <img src="<?php echo $usuario->Foto ?>" alt="" class='logo1'/>
        <li>
          <a id="Z"class='tabs <?php if($_SESSION["error_pass"]==""){echo " active1";} ?>' href="#z">Información de perfil</a>
        </li>
        <li>
          <a id='A'class='tabs' href="#a">Imagen de perfil</a>
        </li>
        <li>
          <a id='B' class='tabs' href="#b">Editar perfil</a>
        </li>
        <li>
          <a id='C' class='tabs <?php if($_SESSION["error_pass"]!=""){echo " active1";} ?>' href="#c">Contraseña</a>
        </li>
      </ul>


      <div id="tabs-content"></div>
      <div id="z">
        <div aling='center' class="panel">
          <div class="wrap">
            <br>
            <form class="formulario" action="" name="muestra" method="post">
              <div>

                <div class="input-group">
                  <input type="text" id="nombre" name="nombre" pattern="^@?(\w){1,50}$" required value='<?php echo $usuario->NombreUsuario; ?>' readonly>
                  <label class="label active" for="nombre">Nombre de usuario:</label>
                </div>
                <div class="input-group">
                  <input type="email" id="email" name="email" required value='<?php echo $usuario->Email ?>' readonly>
                  <label class="label active" for="email">Correo:</label>
                </div>

                <div class="input-group radio">

                  <input type="radio" name="sexo" id="hombre1" value="<?php echo $usuario->Sexo;?>" checked readonly>
                  <label for="sexo"><?php echo $usuario->Sexo;?></label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div id="a">
        <form class='panel' name="form_image" enctype="multipart/form-data" action="change-foto.php" method="post">
          <div class="input-group">
            <div class="image-container">
              <img class="logo-muestra" src="<?php echo $usuario->Foto ?>" alt="" />
              <div id="upload-div">
                <input class="upload" name="uploadedfile" type="file" required/>
                <input id= "img-submit" type="submit" value="Subir archivo" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <div id="b">
        <?php include_once 'edit-user/change-info.php' ?>
      </div>
      <div id="c">
        <?php include_once 'edit-user/change-password.php' ?>
      </div>

    </div>
  </div>


  <script src="js/formulario-generic.js"></script>
  <script type="text/javascript">
    $('#tabs')
      .tabs().addClass('ui-helper-clearfix');

    $('.tabs').click(
      function(e){
        $('.tabs').removeClass('active1');
        $(this).addClass('active1');
      }
    );
  </script>

  <script type="text/javascript">
      console.log('estoy ejecutando');
      $('#nombre_cambio').keyup(function() {

        var username = $(this).val();
        var actual = $('#nombre_actual').val();
        var dataString = 'nombre=' + username+'&actual='+actual;

        $.ajax({
          type: "POST",
          url: "Controller/Usuario/change_name_user.php",
          data: dataString,
          success: function(data) {
            $('#Info').fadeIn(1000).html(data);
          }
        });
    });
  </script>
</body>
