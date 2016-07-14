<?php

require_once '../header.php';
require_once '../../Objects/Usuario.php';
require_once '../../Model/UsuarioModel.php';
require_once '../../Objects/Articulo.php';
require_once '../../Model/ArticuloModel.php';
require_once '../../Objects/ComentarioArticulo.php';
require_once '../../Objects/CComentarioArticulo.php';
require_once '../../Model/ComentarioArticuloModel.php';
require_once '../../Model/CComentarioArticuloModel.php';

$usuarioModel = new UsuarioModel();
$articuloModel = new ArticuloModel();
$comentario = new ComentarioArticuloModel();
$ccomentario = new CComentarioArticuloModel();

$CanEdit = false;
if(isset($_SESSION['id_user'])){
  $u = $usuarioModel->getById($_SESSION['id_user']);
  $CanEdit = $u->Rol=='Administrador' or $u->Rol=="Editor";
}


?>
<br>
  <br>
  <br>
  <style media="screen">
      html, body{
          background: #eee;
      }
  </style>
  <?php if (isset($_GET['id'])):
  $articulo = $articuloModel->getById($_GET['id']);
  ?>
  <!--Codigo para un articulo especifico  -->
  <?php if ($articulo != null):?>


    <?php $usuario = $usuarioModel->getById($articulo->IdAutor);?>

    <section class="portadaArticulos" style='background-image: url(../../<?php echo $articulo->Banner ?>); background-repeat: no-repeat;
      background-size: 100% 100%;'>
        <div class="mensajePrincipal roboto">
            <h1><?php echo $articulo->Titulo ?></h1>
        </div>
    </section>

    <section id="index">
        <div class="contenidoArticulos">
          <h4>Autor : <?php echo $usuario->NombreUsuario;?></h4>
          <h4>Fecha : <?php echo $articulo->FechaCreacion; ?></h4>
          <br>
            <?php echo $articulo->Contenido ?>
          <br>
          <br>
          <!-- Cargar comentarios del articulo -->

          <div class="" id="comments">
            <h4>Comentarios</h4>
            <?php foreach ($comentario->getById($articulo->IdArticulo) as $comment):?>
              <?php $usuarioComment = $usuarioModel->getById($comment->IdUsuario);?>


            <?php if ($comment->Estado == true): ?>
            <article class="commnt">
              <p class="cmmnt-content">
                <img class='avatar' src='../../<?php echo $usuarioComment->Foto; ?>' alt="" />
                <?php echo $usuarioComment->NombreUsuario; ?>
              </p>
              <p class="cmmnt-content pubdate">
                <?php echo $comment->Fecha; ?>
              </p>
              <p class="cmmnt-content">
                <?php echo $comment->Comentario; ?>
              </p>
            </article>

            <!-- Carga de comentarios de un comentarios -->
            <?php foreach ($ccomentario->getSubComments($comment->IdComentario) as $subcomment):?>
              <?php $usuarioComment = $usuarioModel->getById($subcomment->IdUsuario)  ?>

            <article class="commnt sub">
              <p class="cmmnt-content">
                <img class='avatar' src='../../<?php echo $usuarioComment->Foto; ?>' alt="" />
                <?php echo $usuarioComment->NombreUsuario; ?>
              </p>
              <p class="cmmnt-content pubdate">
                <?php echo $subcomment->Fecha; ?>
              </p>
              <p class="cmmnt-content">
                <?php echo $subcomment->Comentario; ?>
              </p>
            </article>

            <?php endforeach; ?>
            <a class="respuesta">Responder</a>
            <!-- Form para realizar subcomentario -->
            <form class="form-comment subcommenting" action="../../Controller/comentario_articulo/save-ccomment.php" method="post">
              <input type="hidden" value='<?php echo $articulo->IdArticulo; ?>' name='idArticulo'>
              <input type="hidden" value='<?php echo $comment->IdComentario; ?>' name='idComentario'>
              <textarea rows="5" cols="40" name="comentario"></textarea>
              <input type="submit" name="name" value="comentar">
            </form>
            <?php endif; ?>
            <?php endforeach; ?>


            <?php endif; ?>
            <!--fin de if de comprobacion de existencia de articulo -->



            <form class="form-comment" action="../../Controller/comentario_articulo/save-comment.php" method="post">
              <input type="hidden" value='<?php echo $articulo->IdArticulo; ?>' name='idArticulo'>
              <textarea rows="5" cols="40" name="comentario"></textarea>
              <input type="submit" name="name" value="comentar">
            </form>


          </div>
        </div>


    </section>






  <?php else: ?>
  <!--Codigo para cargar todos los articulos  -->
  <div id="wrap_galerias">
    <?php if ($CanEdit): ?>
      <div class="clear">

      </div>
      <a class="clean" href="nuevo-articulo.php">
        <button class="btn cuarto btn-new" type="button" name="button">
          <span>
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            Nuevo Articulo
          </span>
        </button>
      </a>

    <?php endif; ?>


  <?php foreach ($articuloModel->getAll() as $articulo): ?>
          <div class="article-container center-text full">
            <a class="article-title" href='articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
              <h3 class=""><?php echo $articulo->Titulo ?></h3>
            </a>
            <a href='articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
              <img src='../../<?php echo $articulo->Banner; ?>' alt="" />
            </a>
            <p class="article-content">
              <?php
              $string = strip_tags($articulo->Contenido);
              if (strlen($string) >= 20) {
                  echo substr($string, 0, 15).' ... '.substr($string, -5);
              } else {
                  echo $string;
              } ?>
              <a href='articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>leer más</a>
              <?php if ($CanEdit): ?>
              <p>
                <a class='clean' href="edit-articulo.php?id=<?php echo $articulo->IdArticulo; ?>">
                  <button class="btn btn-edit" type="button" name="button"><span><i class="fa fa-pencil" aria-hidden="true"></i>  Editar</span></button>
                </a>
              </p>
              <?php endif; ?>
            </p>
          </div>



  <?php endforeach; ?>
  </div>
  <?php endif; ?>


  <script type="text/javascript" src="../../js/comments.js"></script>
<?php
require_once '../footer.php';
 ?>
