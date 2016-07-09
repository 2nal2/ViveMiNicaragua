<?php require_once '../header.php';
  require_once '../../Objects/Articulo.php';
  require_once '../../Model/ArticuloModel.php';

  $articulo=  new Articulo();
  $articuloModel =  new ArticuloModel();
  if (isset($_GET['id'])) {
    $articulo = $articuloModel->getById($_GET['id']);
  }
  else{
    header("Location: articulo.php");
    return;
  }


  require_once '_articulo-partial_.php';
  require_once '../footer.php';
?>
?>

<?php
