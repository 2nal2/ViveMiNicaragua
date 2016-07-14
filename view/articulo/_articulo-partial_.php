<?php
  require_once '../../Objects/Ciudad.php';
  require_once '../../Model/CiudadModel.php';
  $ciudadModel = new CiudadModel();
?>
<div class="content-container contenedor-formulario">
    <form id="form-articulo"class="formulario formulario-content"
    action="../../Controller/articulo/su_articulo.php"
    enctype="multipart/form-data" method="post"
    onsubmit="return validacion()">


      <input id="idarticulo" type="hidden" name="IdArticulo" value="<?php echo $articulo->IdArticulo; ?>">
      <input type="hidden" name="banner" value="<?php echo $articulo->Banner; ?>">
      <div class="input-group">
        <label class="center-text label <?php if($articulo->Titulo!=''){echo "active";} ?>"for="titulo">Titulo</label>
        <input id='titulo' required="true" type="text" name="titulo" value="<?php echo $articulo->Titulo; ?>">
      </div>

      <div class="input-group half content-link reset">
        <label class=""for="ciudad">Ciudad</label>
        <select class="combo-box" name="ciudad" required="true">
         <?php foreach ($ciudadModel->getAll() as $ciudad): ?>
           <option value="<?php echo $ciudad->IdCiudad; ?>"
            <?php
            if($ciudad->IdCiudad == $articulo->IdCiudad){
              echo "selected";
            }
            ?>>
          <?php echo $ciudad->Nombre; ?></option>
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
      <label class='label green-font'for="contenido">Contenido</label>
      <textarea id="elm1" name="contenido" ><?php echo $articulo->Contenido; ?></textarea>

      <div style="background-color : #ff5252; text-align:center; margin-bottom: 5px;">
        <p id="error">
          <?php echo $_SESSION['error_pass']?>
          <?php $_SESSION['error_pass']=''; ?>
        </p>
      </div>
      <br><br>
        <span><input style="width : 100%; max-width: 200px;"class= "btn" type="submit" name="name" value="Publicar"></span>
    </form>

</div>


<script type="text/javascript" src="../../js/formulario-generic.js"></script>
<script type="text/javascript" src="../../js/preview-photo.js"></script>
<script type="text/javascript" src="../../js/init-tinymce.js"></script>
<script type="text/javascript">
  function validacion(){
    var contenido = tinymce.get('elm1').getContent().trim();
    var titulo = $("#titulo").val().trim();
    var id = $("#idarticulo").val();

    if(titulo==''){
      $("#error").text("Ingrese el titulo del articulo");
      return false;
    }

    if(contenido==''){
      $("#error").text("Ingrese el contenido del articulo");
      return false;
    }

    if(id==''){
      if(!$('#files').val()){
        $("#error").text("Ingrese el imagen relacionada con el articulo");
        return false;
      }
    }

    return true;
  }
</script>
