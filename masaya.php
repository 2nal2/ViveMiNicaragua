<?php require_once 'header.php';

require_once 'Objects/Articulo.php';
require_once 'Model/ArticuloModel.php';
$articuloModel = new ArticuloModel();
?>

<style media="screen">
    html, body{
        background: #eee;
    }
</style>

    <section class="portadaArticulos" id="portadaMasaya">
        <div class="mensajePrincipal roboto">
            <h2>¡Nicaragua mi cuerpo, Masaya mi corazon!</h2>
        </div>
    </section>
<section id="index">
    <div class="contenidoArticulos">
        <h3>Masaya</h3>
        <p>
            Masaya es una ciudad y municipio perteneciente al departamento del mismo nombre en la República de Nicaragua, (Centroamérica) que dista 27 km de la capital Managua y forma parte de la Región Metropolitana de Managua.

Dentro de la división territorial y administrativa de la Capitanía General de Guatemala existió el llamado "Corregimiento de Monimbó". Actualmente existe la Comunidad indígena de Monimbó.
        </p>
        <p>
            A pesar de ser el más pequeño de los departamentos del país, Masaya es también uno de los más poblados y plagado de diversos atractivos. Las expresiones y productos culturales de sus pequeñas y bonitas ciudades que guardan parte de la herencia indígena, más los distintos y accesibles destinos naturales forman parte de su amplia oferta turística.

        </p>
        <p>
            La céntrica ciudad de Masaya es un destino cultural importante debido a las latentes expresiones folclóricas populares que se originaron y manifiestan allí, como bailes, música, teatro callejero y coloridas procesiones. Además de su bonito centro antiguo, tiene varios atractivos como una antigua fortaleza, un malecón y una gran oferta de restaurantes, hoteles, bares y tiendas artesanales.

        </p>
        <p>
        El Parque Nacional Volcán Masaya y la laguna del mismo nombre son dos atractivos naturales de una belleza escénica destacada. El volcán está conformado por dos cráteres extintos y uno activo que siempre está manando humo, rodeados por un extenso territorio silvestre que conserva su flora y fauna. La vecina laguna está lamentablemente contaminada, pero en sus costas hay sitios de petroglifos y en las más remotas la gente se baña.
        </p>
        <p>




            La Reserva Natural Laguna de Apoyo, al Soreste, está constituida por la más grande laguna cratérica del país y sus altas laderas que la rodean, las que en algunos sectores conservan parte del bosque. En las costas hay casas veraniegas o rurales, más algunos restaurantes, hoteles y locales que ofrecen opciones para practicar kayak, buceo o natación. Toda la reserva es compartida por varios municipios de Masaya y Granada, y en varios puntos de las cimas hay bonitos miradores.
        </p>
        <img src="img\portadas\portada2.JPG" style="width:90%" />


        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <img src="img\otros\hernaldo.jpg" style="width:90%"/>
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
      <?php foreach ($articuloModel->getByCiudad(2) as $articulo): ?>
              <div class="article-container">
                <a class="article-title"href='articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
                  <h3><?php echo $articulo->Titulo ?></h3>
                </a>
                <a href='articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>
                  <img src='<?php echo $articulo->Banner; ?>' alt="" />
                </a>
                <p class="article-content">
                  <?php
                  $string = $articulo->Contenido;
                  if (strlen($string) >=31 ) {
                      echo substr($string, 0, 25).' ... '.substr($string, -5);
                  } else {
                      echo $string;
                  } ?>
                  <a href='articulo.php?id=<?php echo $articulo->IdArticulo; ?>'>leer más</a>
                </p>
            </div>
          <?php endforeach; ?>
          </div>
    </div>
</section>

<?php
include_once 'footer.php';
?>
