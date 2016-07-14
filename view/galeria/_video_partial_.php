<?php
  require_once '../../Objects/Ciudad.php';
  require_once '../../Model/CiudadModel.php';

  $ciudadModel = new CiudadModel();
  $VideoModel = new VideoModel();
 ?>

 <div class="content-container contenedor-formulario">
     <form id="form-Video"class="formulario formulario-content"
     action="../../Controller/video/su_video.php" enctype="multipart/form-data"
     method="post" onsubmit="return validacionVideo()">
       <input id="idVideo" type="hidden" name="IdVideo" value="<?php echo $Video->IdVideo; ?>">

       <!--Input para el nombre de el Video  -->
       <div class="input-group">
         <label class="center-text label <?php if($Video->Nombre!=''){echo "active";} ?>"for="nombre">Titulo</label>
         <input id="titulo" type="text" name="nombre" value="<?php echo $Video->Nombre;?>" required>
       </div>

       <div class="input-group">
         <label class="center-text label <?php if($Video->Url!=''){echo "active";} ?>"for="Url">URL(youtube embed)</label>
         <input id="url" type="text" name="url" value="<?php echo $Video->Url;?>" required>
       </div>

       <!-- select(combobox) para seleccionar la ciudad -->
       <div class="input-group half">
         <label class=""for="ciudad">Ciudad</label>
         <select class="combo-box" name="ciudad" required>
          <?php foreach ($ciudadModel->getAll() as $ciudad): ?>
            <option value="<?php echo $ciudad->IdCiudad; ?>" <?php
             if($ciudad->IdCiudad == $Video->IdCiudad){
               echo "selected";
             }
           ?>><?php echo $ciudad->Nombre; ?></option>
          <?php endforeach; ?>
         </select>
       </div>
       <div class="clear"></div>
       <!-- Descripcion de la Video -->
       <label class="label green-font" for="descripcion">Descripcion</label>
       <textarea id="elm1" name="descripcion" style="width: 100%; color: black" required><?php echo $Video->Descripcion; ?></textarea>

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

 <script type="text/javascript">
   function validacionVideo(){
     var contenido = $("#elm1").val().trim();
     var titulo = $("#titulo").val().trim();
     var url = $('#url').val().trim();

     if(titulo==''){
       $("#error").text("Ingrese el titulo del video");
       return false;
     }

     if(contenido==''){
       $("#error").text("Ingrese la descripcion del video");
       return false;
     }

     if(url==''){
       $("#error").text("Ingrese la URL del video");
       return false;
     }

     return true;

   }
 </script>
