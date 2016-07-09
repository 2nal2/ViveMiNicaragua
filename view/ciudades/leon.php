<?php
require_once '../header.php';
require_once '../../Objects/Articulo.php';
require_once '../../Model/ArticuloModel.php';
$articuloModel = new ArticuloModel();
?>

<style media="screen">
    html, body{
        background: #eee;
    }
</style>

    <section class="portadaArticulos" id="portadaLeon">
        <div class="mensajePrincipal roboto">
            <h2>¡Viva León, Jodido!</h2>
        </div>
    </section>
<section id="index">
    <div class="contenidoArticulos">
        <h3>León</h3>
        <p>
            Santiago de los Caballeros de León, simplemente conocido con León, es muchísimo que la cabecera departamental del departamento de León, como lo define la corriente Wikipedia
        </p>
        <p>
            León ha sido a través de la abatida historia del país un protagonistas digno de ser interpretado por Leonardo DiCaprio; no solo por la constante y siempre intensa e interesante batalla con Granda por ser vista como el centro de pequeños sistema planetario que es Nicaragua, si no por haberse ganado a pulso el título de “el cerebro de la nación”. Desde hace más de 200 años ha contado con la ya histórica Universidad Nacional Autónoma de Nicaragua, ultima universidad de la Provincia Española de Centroamérica. Sin mencionar el hecho de haber sido cuna de prodigiosas mentes que han hecho notar el nombre de Nicaragua a nivel mundial como lo son los grandes poetas de la Vanguardia Azarías H. Pallais, Salomón de la Selva y el poeta metafísico Alfonso Cortez. Cuna además del Rey de Vals José de la Cruz Mena y última morada del Príncipe de las Letras Castellanas Rubén Darío.
        </p>
        <img src="..\..\img\otros\alfonso.jpg" style="width:70%"/>
        <p>
            Visitar León representa más que solo ir a una ciudad colonial, visitar León es realizar un auténtico viaje en el tiempo a la época cuando caminar por calles empedradas y disfrutar del gran ambiente creado por su hermosa población, representaban por sí mismo una entretención y un escape a las concurridas y molestos embotellamientos de personas.
        </p>
        <img src="..\..\img\portadas\portada1.JPG" style="width:90%" />

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
    <div class="fullWidth principalArticulos">
      <h2>Articulos</h2>
      <style media="screen">
        #wrap_galerias{
          padding-top: 0;
        }
      </style>
      <div id="wrap_galerias">
      <?php foreach ($articuloModel->getByCiudad(1) as $articulo): ?>
              <div class="article-container">
                <a class="article-title"href='../articulo/articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
                  <h3><?php echo $articulo->Titulo ?></h3>
                </a>
                <a href='../articulo/articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
                  <img src='../../<?php echo $articulo->Banner; ?>' alt="" />
                </a>
                <p class="article-content">
                  <?php
                  $string = strip_tags($articulo->Contenido);
                  if (strlen($string) >=31 ) {
                      echo substr($string, 0, 25).' ... '.substr($string, -5);
                  } else {
                      echo $string;
                  } ?>
                  <a href='../articulo/articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>leer más</a>
                </p>
            </div>
          <?php endforeach; ?>
          </div>
    </div>
</section>

<?php
include_once '../footer.php';
?>
