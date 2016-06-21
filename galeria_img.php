<?php
require_once 'header.php';
include_once 'Model/FotoModel.php';
include_once 'Model/ComentarioFotoModel.php';
$fotoModel = new FotoModel();
$comentarioFotoModel = new ComentarioFotoModel();
 ?>

 <style media="screen">
 html, body{
     background-image: url(img/textura.JPG);
     background-size: 100% 100%;
 }
 </style>

 <section id="wrap_galerias" class="fu">

     <h2>Galería de Imagenes</h2>

     <?php foreach ($fotoModel->getAll() as $foto): ?>

         <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image" >
             <img src="<?php echo $foto->Ruta ?>" alt="" />

         </a>
         <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image" >
             <img src="<?php echo $foto->Ruta ?>" alt="" />

         </a>
         <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image" >
             <img src="<?php echo $foto->Ruta ?>" alt="" />

         </a>
         <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image" >
             <img src="<?php echo $foto->Ruta ?>" alt="" />

         </a>
         <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image" >
             <img src="<?php echo $foto->Ruta ?>" alt="" />

         </a>
         <a title="<?php echo $foto->Nombre ?>" href="<?php echo $foto->Ruta ?>" rel="gallery"class="gallery-image" >
             <img src="<?php echo $foto->Ruta ?>" alt="" />

         </a>
     <?php endforeach; ?>
 </section>



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
