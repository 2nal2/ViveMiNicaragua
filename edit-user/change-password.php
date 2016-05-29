<div aling='center' class="panel">
<div class="wrap">
  <br>
  <form id="formulario_passwd" class="formulario" action="Controller/Usuario/update_password.php" name="formulario_passwd" method="post">
    <div>

      <div class="input-group">
        <input type="password" id="actual" name="actual" required>
        <label class="label" for="actual">Contraseña actual:</label>
      </div>

      <div class="input-group">

        <input type="password" id="pass" name="pass" required>
        <label class="label" for="pass">Nueva contraseña:</label>
        <div id='pwdInfo'>
          <p style="color: #ff5252">
            Contraseña demasiado debil
          </p>
        </div>

      </div>

      <div class="input-group" id ='div-pass2'>
        <input type="password" id="pass2" name="pass2" required>
        <label class="label" for="pass2">Repita su contraseña:</label>

        <div id='pwdNotMatch'>
          <p style="color: #ff5252">
            Las contraseñas no coinciden
          </p>
        </div>

      </div>

      <div style="background-color : #ff5252; text-align:center;">
        <p>
          <?php echo $_SESSION['error_pass']?>
          <?php $_SESSION['error_pass']=''; ?>
        </p>
      </div>
      <br>
      <input type="submit" id="btn-submit" value="Guardar cambios">
    </div>

  </form>
</div>
</div>




<script type="text/javascript">
  var validarPass = function() {

    if (passwordLevel(this.value) < 30) {
      $('#pwdInfo').show(100);
    } else {
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
  $('#pwdNotMatch').hide(100);
  $('#pass').keyup(validarPass);

</script>
