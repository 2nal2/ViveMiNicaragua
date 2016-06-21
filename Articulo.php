<?php

include_once 'header.php';
require_once 'Objects/Usuario.php';
require_once 'Model/UsuarioModel.php';
require_once 'Objects/Articulo.php';
require_once 'Model/ArticuloModel.php';
require_once 'Objects/ComentarioArticulo.php';
require_once 'Objects/CComentarioArticulo.php';
require_once 'Model/ComentarioArticuloModel.php';
require_once 'Model/CComentarioArticuloModel.php';

$usuarioModel  = new UsuarioModel();
$articuloModel = new ArticuloModel();
$comentario    = new ComentarioArticuloModel();
$ccomentario   = new CComentarioArticuloModel();
?>
<br>
<br>
<br>
<?php if (isset($_GET['id'])):
  $articulo = $articuloModel->getById($_GET['id']);
?>
  <!--Codigo para un articulo especifico  -->
  <?php if ($articulo != null):
      $usuario = $usuarioModel->getById($articulo->IdAutor);
      ?>
      <h1><?php echo $articulo->Titulo ?></h1>
      <h3><?php echo $usuario->NombreUsuario;?></h3>
      <h3>Fecha : <?php echo $articulo->FechaCreacion; ?></h3>

      <img src='<?php echo $articulo->Banner; ?>' alt="" />

      <p><?php echo $articulo->Contenido ?></p>



  <!-- Cargar comentarios del articulo -->
      <div class="">
        <?php foreach ($comentario->getById($articulo->IdArticulo) as $comment):
          $usuarioComment = $usuarioModel->getById($comment->IdUsuario);
          ?>
          <?php if ($comment->Estado == true): ?>
            <article class="">
              <p><?php echo $usuarioComment->NombreUsuario; ?></p>
              <p><?php echo $comment->Fecha; ?></p>
              <p><?php echo $comment->Comentario; ?></p>
            </article>

              <!-- Carga de comentarios de un comentarios -->
            <?php foreach ($ccomentario->getSubComments($comment->IdComentario) as $subcomment):
              $usuarioComment = $usuarioModel->getById($subcomment->IdUsuario)?>
              <p><?php echo $usuarioComment->NombreUsuario; ?></p>
              <p><?php echo $subcomment->Fecha; ?></p>
              <p><?php echo $subcomment->Comentario; ?></p>
            <?php endforeach; ?>
            <!-- Form para realizar subcomentario -->
            <form class="" action="Controller/comentario_articulo/save-ccomment.php" method="post">
              <input type="hidden" value='<?php echo $comment->IdComentario; ?>' name='idComentario'>
              <textarea rows="5" cols="40" name="comentario"></textarea>
              <input type="submit" name="name" value="comentar">
            </form>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
   <?php endif; ?><!--fin de if de comprobacion de existencia de articulo -->



  <form class="" action="Controller/comentario_articulo/save-comment.php" method="post">
    <input type="hidden" value='<?php echo $articulo->IdArticulo; ?>' name='idArticulo'>
    <textarea rows="5" cols="40" name="comentario"></textarea>
    <input type="submit" name="name" value="comentar">
  </form>



<?php else: ?>
  <!--Codigo para cargar todos los articulos  -->
  <?php foreach ($articuloModel->getAll() as $articulo): ?>
    <a href='Articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
      <h3><?php echo $articulo->Titulo ?></h3>
    </a>
    <a href='Articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
      <img src='<?php echo $articulo->Banner; ?>' alt="" />
    </a>
  <?php endforeach; ?>
<?php endif; ?>


<?php

include_once 'footer.php';
 ?>
