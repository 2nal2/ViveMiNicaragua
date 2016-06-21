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

         <div id="inline_<?php echo $foto->IdFoto ?>" style="display:none;width:90%;height: 90%;">
             <h2><?php echo $foto->Nombre ?></h2>
             <div class="contien_foto" style="width:50%; height: 100%;background-image: url(<?php echo $foto->Ruta ?>); background-size: 100% 100%;">

             </div>

            <div class="half contiene_comentarios">

            </div>
	     </div>

         <a title="<?php echo $foto->Nombre ?>" href="#inline_<?php echo $foto->IdFoto ?>" rel="gallery"class="fancyOther" >
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

  $(".fancyOther").fancybox({
				width		: '90%',
				height		: '90%',
				//maxWidth	: 800,
				//maxHeight	: 600,
				fitToView	: false,
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'fade',
				closeEffect	: 'fade'
			});

</script>
 <?php
 include_once 'footer.php';
?>
