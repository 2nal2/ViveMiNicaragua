<?php
require_once 'header.php';
include_once 'Model/FotoModel.php';
include_once 'Model/ComentarioFotoModel.php';
$fotoModel = new FotoModel();
$comentarioFotoModel = new ComentarioFotoModel();
 ?>

<?php foreach ($fotoModel->getAll() as $foto): ?>
 <?php foreach ($comentarioFotoModel->getByPhotoId($foto->IdFoto) as $comentario): ?>
   <a title="<?php echo $comentario->Comentario ?>" rel="css/style.css" class="mensajePrincipal"></a>
 <?php endforeach; ?>
  <!-- <img src="<?php echo $foto->Ruta ?>" alt=""/> -->
  <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image" >
  <img src="<?php echo $foto->Ruta ?>" alt="" />
  <textarea rows="5" cols="40" ></textarea></a>
  <input type="submit" class="button" name="insert" value="Aceptar" />
<?php endforeach; ?>

<script type="text/javascript">
$(".gallery-image").fancybox({
    openEffect : 'fade',
      closeEffect	: 'fade',
      closeBtn: false,
      helpers : {
        overlay : {
    			            css : {
    			                'background' : 'rgba(0,0,0,0.5)'
    			            }
            			},
        title : {
          type : 'outside' //'float', 'inside', 'outside' or 'over'
        },
        thumbs : {
              width: 50
          },
          buttons	: {}
      }


  });
</script>
 <?php
 include_once 'footer.php';
?>
