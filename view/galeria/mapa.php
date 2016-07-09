<?php
require_once '../constants.php';
require_once '../../Objects/Foto.php';
require_once '../../Objects/Video.php';
require_once '../../Model/FotoModel.php';
require_once '../../Model/VideoModel.php';

$fotoModel = new FotoModel();
$videoModel = new VideoModel();

$foto = new Foto();
$video = new Video();


if (isset($_GET['id_foto'])) {
  $foto = $fotoModel->getById($_GET['id_foto']);
  if ($foto == null) {
    header('Location: ../index.php');
  }
  else{
    $object = $foto;
  }
}
else if(isset($_GET['id_video'])){
  $video = $videoModel->getById($_GET['id_foto']);
  if ($video == null) {
    header('Location: ../index.php');
  }
  else{
    $object = $video;
  }
}
else{
  header('Location: ../index.php');
}
require_once '../header.php';


$pos = array(
    'lat' => (double)$object->Latitud,
    'lng' => (double)$object->Longitud
);

echo '<script>';
echo 'var position = ' . json_encode($pos) . ';';
echo '</script>';

?>

    <br>
    <br>
    <section id="index" class="index-map">
      <div class="contenidoArticulos map-tittle">
        <h4 style="text-align:center; font-size: 2em"><?php echo $object->Nombre;?></h4>
        <br>
        <h4><?php echo $object->Descripcion; ?></h4>
      </div>
    </section>

    <div class="map-container">
        <div id="map"></div>
    </div>
    <br>
    <br>
    <div class="image-map-container">
      <img src="../../<?php echo $foto->Ruta ?>" alt="" />
    </div>

    <script>
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: position,
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // var position = {
            //     lat: 12.100112,
            //     lng: -86.243675
            // };
            var marker = new google.maps.Marker({
                map: map,
                position: position,
                title: 'Tu próximo destino'
            });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjjqr1w7Y4KIxqbjtbBlcLzNcLoe2KOQE&libraries=places&callback=initAutocomplete" async defer></script>


<?php require_once '../footer.php' ?>
