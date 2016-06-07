<?php
include_once 'header.php';
include_once 'Model/FotoModel.php';

$fotoModel = new FotoModel();
 ?>



<?php foreach ($fotoModel->getAll() as $foto): ?>
  <!-- <img src="<?php echo $foto->Ruta ?>" alt=""/> -->
  <a href="<?php echo $foto->Ruta ?>" class='galery-image'>
  <img src="<?php echo $foto->Ruta ?>" alt="" /></a>
<?php endforeach; ?>


 <?php
 include_once 'footer.php';
?>
