<?php
  include_once '../header.php';
  require_once '../../Model/UsuarioModel.php';
  require_once '../../Objects/Usuario.php';

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


<br>
<br>
<br>
<br>

  <form class="ctr" action="#" method="#">
  		<label for="kwd_search"><i class="fa fa-search" aria-hidden="true"></i></label>
      <input type="text" id="kwd_search" value="" placeholder="Ingrese su busqueda aqui"/>
  </form>
<table id='my-table' class='width200'>
            <thead>
            <tr>
                <th>ID USUARIO</th>
                <th>NOMBRE USUARIO</th>
                <th>EMAIL</th>
                <th>ROL</th>
                <th>ESTADO</th>
                <th>SEXO</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

              <?php foreach ($usuarioModel->getAll() as $usuario): ?>
                <tr>
                  <td><?php echo $usuario->IdUsuario ?></td>
                  <td><?php echo $usuario->NombreUsuario ?></td>
                  <td><?php echo $usuario->Email ?></td>
                  <td><?php echo $usuario->Rol ?></td>
                  <td><?php echo $usuario->Estado ? 'Activo' : 'Inactivo' ?></td>
                  <td><?php echo $usuario->Sexo ?></td>
                  <td>
                    <a href="edit-user.php?id=<?php echo $usuario->IdUsuario; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="../../Controller/Usuario/reset-pwd.php?id=<?php echo $usuario->IdUsuario; ?>"><i class="fa fa-retweet" aria-hidden="true"></i></a>
                    <a href="watch-session.php?id=<?php echo $usuario->IdUsuario ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <?php if ($usuario->Estado): ?>
                      <a href="../../Controller/Usuario/change-state.php?id=<?php echo $usuario->IdUsuario; ?>">
                        <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                      </a>
                    <?php else: ?>
                      <a href="../../Controller/Usuario/change-state.php?id=<?php echo $usuario->IdUsuario; ?>">
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                      </a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>


            </tbody>
        </table>
        <br>
        <br>
<script src="../../js/search.js"></script>
<?php
 require_once '../footer.php';
?>


<?php if ($_SESSION['error_pass'] != ''): ?>
  <script type="text/javascript">
    alert('<?php echo $_SESSION['error_pass'] ?>');
  </script>
  <?php $_SESSION['error_pass'] = ''; ?>
<?php endif; ?>
