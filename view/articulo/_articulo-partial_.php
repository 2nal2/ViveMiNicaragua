<?php
  require_once '../../Objects/Ciudad.php';
  require_once '../../Model/CiudadModel.php';
  $ciudadModel = new CiudadModel();
?>
<div class="content-container contenedor-formulario">
    <form id="form-articulo"class="formulario formulario-content" action="../../Controller/articulo/su_articulo.php" enctype="multipart/form-data" method="post">
      <input type="hidden" name="IdArticulo" value="<?php echo $articulo->IdArticulo; ?>">
      <input type="hidden" name="banner" value="<?php echo $articulo->Banner; ?>">
      <div class="input-group">
        <label class="center-text label <?php if($articulo->Titulo!=''){echo "active";} ?>"for="titulo">Titulo</label>
        <input type="text" name="titulo" value=" <?php echo $articulo->Titulo; ?>" required>
      </div>

      <div class="input-group half content-link reset">
        <label class=""for="ciudad">Ciudad</label>
        <select class="combo-box" name="ciudad" required>
         <?php foreach ($ciudadModel->getAll() as $ciudad): ?>
           <option value="<?php echo $ciudad->IdCiudad; ?>" <?php
            if($ciudad->IdCiudad == $articulo->IdCiudad){
              echo "selected";
            }
          ?>><?php echo $ciudad->Nombre; ?></option>
         <?php endforeach; ?>
        </select>
      </div>

      <div id="upload-div" class="half center content-link reset">
        <label class="label green-font" for="uploadedfile">Imagen</label>
        <input id="files" class="upload" name="uploadedfile" type="file"/>
        <div id="list"></div>
      </div>

      <div class="clear"></div>
      <br><br>

      <textarea id="elm1" name="contenido"><?php echo $articulo->Contenido; ?></textarea>


      <br><br>
        <span><input style="width : 100%; max-width: 200px;"class= "btn" type="submit" name="name" value="Publicar"></span>
    </form>

</div>

<script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object

                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }

                    var reader = new FileReader();

                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);

                    reader.readAsDataURL(f);
                  }
              }

              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
<script type="text/javascript" src="../../js/formulario-generic.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",

        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================

        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste jbimages"
        ],

        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false

    });
</script>
