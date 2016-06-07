<?php
require_once 'header.php';
include_once 'Model/FotoModel.php';
$fotoModel = new FotoModel();
 ?>

<?php foreach ($fotoModel->getAll() as $foto): ?>
  <!-- <img src="<?php echo $foto->Ruta ?>" alt=""/> -->
  <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image">
  <img src="<?php echo $foto->Ruta ?>" alt="" /></a>
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
