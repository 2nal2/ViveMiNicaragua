<div aling='center' class="panel">
<div class="wrap">
  <br>
  <form id = "formulario_info" class="formulario" action="../../Controller/Usuario/update_user.php" name="formulario_info" method="post">
    <div>

      <input type="hidden" id="nombre_actual" value='<?php echo $usuario->NombreUsuario; ?>'>
      <div class="input-group">
        <input type="text" id="nombre_cambio" name="nombre" pattern="^@?(\w){1,50}$" required value='<?php echo $usuario->NombreUsuario; ?>'>
        <label class="label active" for="nombre">Nombre de usuario:</label>
        <div id="Info"></div>
      </div>

      <div class="input-group">
        <input type="email" id="email" name="email" required value='<?php echo $usuario->Email ?>'>
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

      <div style="background-color : #ff5252; text-align:center;">
        <p>
          <?php echo $error;?>
        </p>
      </div>
      <br>
      <input type="submit" id="btn-submit" value="Guardar cambios">
    </div>

  </form>

</div>

</div>
