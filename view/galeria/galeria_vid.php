<?php require_once '../header.php'; ?>
<?php
  require_once '../../Model/VideoModel.php';
  require_once '../../Objects/Video.php';
  require_once '../../Model/UsuarioModel.php';
  require_once '../../Objects/Usuario.php';

  $videoModel = new VideoModel();
  $usuarioModel = new UsuarioModel();

  $CanEdit = false;
  if(isset($_SESSION['id_user'])){
    $u = $usuarioModel->getById($_SESSION['id_user']);
    $CanEdit = $u->Rol=='Administrador' or $u->Rol=="Editor";
  }

 ?>

<section id="wrap_galerias">
    <h2>Galería de Videos</h2>
    <?php if ($CanEdit): ?>

      <div class="clear"></div>
      <a class="clean" href="nuevo-video.php">
        <button class="btn cuarto btn-new" type="button" name="button">
          <span>
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            Nuevo Video
          </span>
        </button>
      </a>

    <?php endif; ?>
    <?php foreach ($videoModel->getAll() as $video): ?>
      <?php
        $id = explode("/", $video->Url);
        $id = trim($id[4]);
       ?>
       <div class="article-container center-text full">
         <a class="fancybox-media" href="https://www.youtube.com/watch?v=<?php echo $video->Url ?>">
             <img class="thumb-vid" src="https://i.ytimg.com/vi/<?php echo $id ?>/mqdefault.jpg" alt="" />
         </a>
         <!--inicio de codigo para editar  -->
         <?php if ($CanEdit): ?>
         <p>
           <a class='clean' href="edit-video.php?id=<?php echo $video->IdVideo; ?>">
             <button class="btn btn-edit" type="button" name="button"><span><i class="fa fa-pencil" aria-hidden="true"></i>  Editar</span></button>
           </a>
         </p>
         <?php endif; ?>
         <!--fin de codigo para editar  -->
       </div>
      <?php endforeach; ?>
</section>

<script type="text/javascript">

$('.fancybox-media').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    helpers : {
        media : {}
    }
});

</script>


<?php require_once '../footer.php'; ?>
