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

    <section class="portadaArticulos" id="portadaMatagalpa">
        <div class="mensajePrincipal roboto">
            <h2>¡Mi Norte, Mi Matagalpa!</h2>
        </div>
    </section>
<section id="index">
    <div class="contenidoArticulos">
        <h3>Matagalpa</h3>
        <p>
            La ciudad de Matagalpa es la capital del departamento homónimo en Nicaragua. El municipio tiene una superficie de 640,65 km² y una población de 150000 y la ciudad una población de 105000 habitantes (2010) con una densidad poblacional de 312,18  hab/km².




        <p>
            Matagalpa se conoce como la «Perla del Septentrión», debido a sus características naturales y también como la «Capital de la Producción», por su variada actividad agropecuaria y comercial. Ubicada a 128 km al noreste de Managua, es la primera en producción del país.

        </p>
        <p>
                Fue sede del Corregimiento de Matagalpa, dentro la división territorial y administrativa de la Capitanía General de Guatemala.

        </p>
        <p>

            El departamento de Matagalpa es uno de los más montañosos del país y constituye el inicio de la zona Norte nicaragüense. En su extensión, atravesada por las cordilleras Dariense e Isabelia además de por varios ríos de buen caudal, hay centros urbanos interesantes, comunidades indígenas campesinas, opciones de turismo rural y diversos atractivos naturales como montañas con reservas boscosas, lagunas y cascadas. La producción de café de alta calidad es otra característica de esta región de agradable clima frío predominante.
        </p>
        <p>




            Hay varios atractivos en el extremo occidental de la región. Está la apacible Ciudad Darío, que posee un pequeño museo en la casa natal del célebre poeta Rubén Darío, además de las lagunas de Moyuá y Las Playitas en las cercanías, que son un bonito paraje natural poco frecuentado. Hacia el Norte se encuentra la ciudad de Sébaco donde se pueden encontrar productos agrícolas de todo el Norte nicaragüense y tiene en su indígena comunidad de Chagüitillo un interesante museo precolombino y telares artesanales. Cerca está la región rural de Terrabona y la más urbana San Isidro.
        </p>
        <img src="img\portadas\portada3.jpg" style="width:90%" />


        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumimg src="img/otros/dario.jpg" style="width:90%"/>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <img src="img/otros/dario.jpg" style="width:90%"/>
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
      <?php foreach ($articuloModel->getByCiudad(3) as $articulo): ?>
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
