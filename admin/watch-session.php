<?php
  include_once '../header.php';
  require_once '../Model/UsuarioModel.php';
  require_once '../Objects/Usuario.php';
  require_once '../Model/SesionModel.php';
  require_once '../Objects/Sesion.php';

  $usuarioModel = new UsuarioModel();
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
<br>
<br>
<br>
<br>
<?php
  $sesionModel = new SesionModel();

 ?>
<table id="sesion-table" class="width200">
            <thead>
            <tr>
                <th>ID SESION</th>
                <th>USUARIO</th>
                <th>HORA INICIO</th>
                <th>HORA FIN</th>
            </tr>
            </thead>
            <tbody>
              <?php $usuario = $usuarioModel->getById($_GET['id']); ?>
              <?php foreach ($sesionModel->getByUser($_GET['id']) as $sesion): ?>
                <tr>
                  <td><?php echo $sesion->IdSesion ?></td>
                  <td><?php echo $usuario->NombreUsuario ?></td>
                  <td><?php echo $sesion->HoraInicio ?></td>
                  <td>
                    <?php if ($sesion->HoraFin==null): ?>
                      <?php echo "no registrado"; ?>
                    <?php else: ?>
                      <?php echo $sesion->HoraFin ?>
                    <?php endif; ?>
                  </td>

                </tr>
              <?php endforeach; ?>


            </tbody>
        </table>
        <br>
        <br>

<?php
 require_once '../footer.php';
?>
