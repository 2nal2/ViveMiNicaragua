<?php
require_once '../header.php';
require_once '../../Model/FotoModel.php';
require_once '../../Model/ComentarioFotoModel.php';
require_once '../../Model/UsuarioModel.php';
require_once '../../Objects/Usuario.php';
require_once '../../Model/CComentarioFotoModel.php';
require_once '../../Objects/ComentarioFoto.php';
require_once '../../Objects/CComentarioFoto.php';

$fotoModel = new FotoModel();
$comentarioFotoModel = new ComentarioFotoModel();
$usuarioModel = new UsuarioModel();
$ccomentarioModel = new CComentarioFotoModel();


$CanEdit = false;
if(isset($_SESSION['id_user'])){
  $u = $usuarioModel->getById($_SESSION['id_user']);
  $CanEdit = $u->Rol=='Administrador' or $u->Rol=="Editor";
}
 ?>

  <!-- /*<style media="screen">
    html,
    body {
      background-image: url(img/textura.JPG);
      background-size: 100% 100%;
      background-attachment: fixed;
    }
  </style>*/ -->

  <section id="wrap_galerias" class="fu" aling='center'>
    <br><br><br>

    <h2 class="green-font">Galería de Imagenes</h2>

    <?php if ($CanEdit): ?>

      <div class="clear"></div>
      <a class="clean" href="nueva-foto.php">
        <button class="btn cuarto btn-new" type="button" name="button">
          <span>
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            Nuevo Foto
          </span>
        </button>
      </a>

    <?php endif; ?>
    <?php foreach ($fotoModel->getAll() as $foto):?>

    <div id="inline_<?php echo $foto->IdFoto ?>" style="display:none;width:100%;height: 100%;">
      <div class='half' style="height: 100%;background-image: url(../../<?php echo $foto->Ruta ?>); background-size: 100% 100%; float: left">
      </div>

      <div class="half roboto comment-container" style="height: 100%; float: right; padding:20px">
        <h2><?php echo $foto->Nombre ?></h2>
        <div>
          <a class="location-icon" href="mapa.php?id_foto=<?php echo $foto->IdFoto; ?>">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
          </a>
        </div>
        <p>
          <?php echo $foto->Descripcion; ?>
        </p>


        <?php foreach ($comentarioFotoModel->getByPhotoId($foto->IdFoto) as $comentarios):
                  $usuarioComment = $usuarioModel->getById($comentarios->IdUsuario);?>
        <div class="bubble-list">
        <div class="bubble clearfix">
          <img class="logo-muestra" src="../../<?php echo $usuarioComment->Foto ?>" alt="" style="width:40px ;height:40px;border-radius:40px" />
          <div class="bubble-content">
            <p>
              <strong>
                  <?php echo $usuarioComment->NombreUsuario ?>
              </strong>
            </p>
            <p>
              <strong>
                  <?php echo $comentarios->Fecha ?>
              </strong>
            </p>
            <p>
              <?php echo $comentarios->Comentario ?>
            </p>
          </div>
        </div>
        </div>
        <?php foreach ($ccomentarioModel->getSubComments($comentarios->IdComentario) as $ccomentarios):
                        $usuarioComment = $usuarioModel->getById($ccomentarios->IdUsuario);?>
        <div class="bubble-list">
          <div class="sub">
            <div class="bubble clearfix">
              <img class="logo-muestra" src="../../<?php echo $usuarioComment->Foto ?>" alt="" style="width:40px ;height:40px;border-radius:40px" />
              <div class="bubble-content">
                <p>
                  <strong>
                      <?php echo $usuarioComment->NombreUsuario ?>
                  </strong>
                </p>
                <p>
                  <strong>
                      <?php echo $comentarios->Fecha ?>
                  </strong>
                </p>
                <p>
                  <?php echo $ccomentarios->Comentario ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <a class="respuesta">Responder</a>
      <form class="form-comment subcommenting" action="../../Controller/comentario_foto/save-subcomentariophoto.php" method="post">
        <div class="input-group">
          <textarea rows="4" cols="60" id='comentario' name="comentario" placeholder="Escriba aqui su comentario..."></textarea>
        </div>

        <input type="hidden" value='<?php echo $comentarios->IdComentario; ?>' name='idPadre'>
        <input type="submit" name="btn-submit" value="Responder">
      </form>

      <?php endforeach; ?>

      <form class="form-comment" action="../../Controller/comentario_foto/save-comentariophoto.php" method="post">
        <div class="input-group">
          <textarea rows="4" cols="70" id='comentario' name="comentario" placeholder="Escriba aqui su comentario..."></textarea>
        </div>
        <input type="hidden" value='<?php echo $foto->IdFoto; ?>' name='idFoto'>
        <input type="submit" name="btn-submit" value="comentar">
      </form>
    </div>
    </div>

    <div class="article-container center-text">
      <a title="<?php echo $foto->Nombre ?>" href="#inline_<?php echo $foto->IdFoto ?>" rel="gallery" class="fancyOther">
        <img src="../../<?php echo $foto->Ruta ?>" alt="" />
      </a>

      <!--inicio de codigo para editar  -->
      <?php if ($CanEdit): ?>
      <p>
        <a class='clean' href="edit-foto.php?id=<?php echo $foto->IdFoto; ?>">
          <button class="btn btn-edit" type="button" name="button"><span><i class="fa fa-pencil" aria-hidden="true"></i>  Editar</span></button>
        </a>
      </p>
      <?php endif; ?>
      <!--fin de codigo para editar  -->
    </div>

    <?php endforeach; ?>
  </section>



  <script type="text/javascript">
    $(".gallery-image").fancybox({
      openEffect: 'fade',
      closeEffect: 'fade',
      closeBtn: false,
      helpers: {
        overlay: {
          css: {
            'background': 'rgba(0,0,0,0.5)'
          }
        },
        title: {
          type: 'outside' //'float', 'inside', 'outside' or 'over'
        },
        thumbs: {
          width: 50
        },
        buttons: {}
      }


    });

    $(".fancyOther").fancybox({
      width: '90%',
      height: '90%',
      //maxWidth	: 800,
      //maxHeight	: 600,
      fitToView: false,
      autoSize: false,
      closeClick: false,
      openEffect: 'fade',
      closeEffect: 'fade'
    });
  </script>
  <script type="text/javascript" src="../../js/comments.js"></script>
  <?php
 include_once '../footer.php';
?>
