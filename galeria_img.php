<?php
require_once 'header.php';
require_once 'Model/FotoModel.php';
require_once 'Model/ComentarioFotoModel.php';
require_once 'Model/UsuarioModel.php';
require_once 'Objects/Usuario.php';
require_once 'Model/CComentarioFotoModel.php';
require_once 'Objects/ComentarioFoto.php';
require_once 'Objects/CComentarioFoto.php';

$fotoModel = new FotoModel();
$comentarioFotoModel = new ComentarioFotoModel();
$usuarioModel = new UsuarioModel();
$ccomentarioModel = new CComentarioFotoModel();
 ?>

 <style media="screen">
 html, body{
     background-image: url(img/textura.JPG);
     background-size: 100% 100%;
 }
 </style>

 <section id="wrap_galerias" class="fu">

     <h2>Galería de Imagenes</h2>
     <?php foreach ($fotoModel->getAll() as $foto):?>

         <div id="inline_<?php echo $foto->IdFoto ?>" style="display:none;width:90%;height: 90%;">

             <div class="contien_foto" style="width:50%; height: 100%;background-image: url(<?php echo $foto->Ruta ?>); background-size: 100% 100%; float: left">

             </div>

            <div class="half contiene_comentarios roboto" style="width:50%; height: 100%; float: right; padding:20px">
                <h2><?php echo $foto->Nombre ?></h2>

                <?php foreach ($comentarioFotoModel->getByPhotoId($foto->IdFoto) as $comentarios):
                  $usuarioComment = $usuarioModel->getById($comentarios->IdUsuario);?>
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

                  <p>
                    <h5>SUBCOMENTARIOS</h5>
                    <?php foreach ($ccomentarioModel->getSubComments($comentarios->IdComentario) as $ccomentarios):
                        $usuarioComment = $usuarioModel->getById($ccomentarios->IdUsuario);?>
                    <p>
                    <strong>
                        <?php echo $usuarioComment->NombreUsuario ?>
                    </strong>
                        </p>
                    <p>
                      <?php echo $ccomentarios->Comentario ?>
                    </p>
                   <?php endforeach; ?>
                    <form class="formulario" action="Controller/comentario_foto/save-subcomentariophoto.php"  method="post">
                        <div class="input-group">
                            <textarea rows="4" cols="70" id='comentario' name="comentario" onClick="this.value = ''">Escribir SUBCOMENTARIO aqui...</textarea>
                        </div>

                        <input type="hidden" value='<?php echo $comentarios->IdComentario; ?>' name='idPadre'>
                        <input type="submit" name="btn-submit" value="SUBCOMENTAR">
                    </form>

                <?php endforeach; ?>

                <form class="formulario" action="Controller/comentario_foto/save-comentariophoto.php"  method="post">
                    <div class="input-group">
                        <textarea rows="4" cols="70" id='comentario' name="comentario" onClick="this.value = ''">Escribir comentario aqui...</textarea>
                    </div>
                    <input type="hidden" value='<?php echo $foto->IdFoto; ?>' name='idFoto'>
                    <input type="submit" name="btn-submit" value="comentar">
                </form>
            </div>
	     </div>
         <a title="<?php echo $foto->Nombre ?>" href="#inline_<?php echo $foto->IdFoto ?>" rel="gallery"class="fancyOther" >
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
