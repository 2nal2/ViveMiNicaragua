<?php
  require_once '../../Objects/Ciudad.php';
  require_once '../../Model/CiudadModel.php';

  $ciudadModel = new CiudadModel();
  $fotoModel = new FotoModel();
 ?>

 <div class="content-container contenedor-formulario">
     <form id="form-foto"class="formulario formulario-content"
     action="../../Controller/foto/su_foto.php" enctype="multipart/form-data"
     method="post" onsubmit="return validacionFoto()">
       <input id="idfoto" type="hidden" name="IdFoto" value="<?php echo $Foto->IdFoto; ?>">
       <input type="hidden" name="ruta" value="<?php echo $Foto->Ruta; ?>">

       <!--Input para el nombre de la foto  -->
       <div class="input-group">
         <label class="center-text label <?php if($Foto->Nombre!=''){echo "active";} ?>"for="nombre">Titulo</label>
         <input id="titulo" type="text" name="nombre" value="<?php echo $Foto->Nombre;?>" required>
       </div>

       <!-- select(combobox) para seleccionar la ciudad -->
       <div class="input-group half content-link reset">
         <label class=""for="ciudad">Ciudad</label>
         <select class="combo-box" name="ciudad" required>
          <?php foreach ($ciudadModel->getAll() as $ciudad): ?>
            <option value="<?php echo $ciudad->IdCiudad; ?>" <?php
             if($ciudad->IdCiudad == $Foto->IdCiudad){
               echo "selected";
             }
           ?>><?php echo $ciudad->Nombre; ?></option>
          <?php endforeach; ?>
         </select>

         <div class="input-group">
           <label class="center-text label <?php if($Foto->Latitud!=''){echo "active";} ?>"for="latitud">Latitud</label>
           <input class="number" id="lat" type="text" name="latitud" value="<?php echo $Foto->Latitud; ?>" required>
         </div>

         <div class="input-group">
           <label class="center-text label <?php if($Foto->Longitud!=''){echo "active";} ?>"for="longitud">Longitud</label>
           <input class="number" id="lng" type="text" name="longitud" value="<?php echo $Foto->Longitud; ?>" required>
         </div>
       </div>

       <!-- La foto en cuestion -->
       <div id="upload-div" class="half center content-link reset">
         <label class="label green-font" for="uploadedfile">Imagen</label>
         <input id="files" class="upload" name="uploadedfile" type="file"/>
         <div id="list"></div>
       </div>

       <div class="clear"></div>
       <br><br>

       <!-- Descripcion de la foto -->
       <label class="label green-font" for="descripcion">Descripcion</label>
       <textarea id="elm1" name="descripcion" style="width: 100%; color: black" required><?php echo $Foto->Descripcion; ?></textarea>

       <!--div para error  -->
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
 <script type="text/javascript">
   function validacionFoto(){
     var contenido = $("#elm1").val().trim();
     var titulo = $("#titulo").val().trim();
     var id = $("#idfoto").val();
     var lat =  $("#lat").val().trim();
     var lng = $("#lng").val().trim();
     console.log("Obtuve los valores");

     if(titulo==''){
       $("#error").text("Ingrese el titulo de la foto");
       return false;
     }

     if(contenido==''){
       $("#error").text("Ingrese la descripcion de la foto");
       return false;
     }

     if(lat==''){
       $("#error").text("Ingrese la localizacion de la foto(latitud)");
       return false;
     }

     if(lng==''){
       $("#error").text("Ingrese la localizacion de la foto(longitud)");
       return false;
     }

     if(id==''){
       if(!$('#files').val()){
         $("#error").text("Ingrese la foto");
         return false;
       }
     }
     return true;
   }
 </script>

 <script type="text/javascript" src="../../js/validate-number.js"></script>
