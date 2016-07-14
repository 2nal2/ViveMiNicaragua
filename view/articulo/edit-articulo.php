<?php require_once '../header.php';
  require_once '../../Objects/Articulo.php';
  require_once '../../Model/ArticuloModel.php';

  require_once '../../Objects/Usuario.php';
  require_once '../../Model/UsuarioModel.php';


  $usuarioModel = new UsuarioModel();
  $CanEdit = false;
  if(isset($_SESSION['id_user'])){
    $u = $usuarioModel->getById($_SESSION['id_user']);
    $CanEdit = $u->Rol=='Administrador' or $u->Rol=="Editor";
  }
  else{
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../index.php">';
  }

  if(!$CanEdit){
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../index.php">';
  }


  $articulo=  new Articulo();
  $articuloModel =  new ArticuloModel();
  if (isset($_GET['id'])) {
    $articulo = $articuloModel->getById($_GET['id']);
  }
  else{
    header("Location: articulo.php");
    return;
  }

  echo "<br>";
  require_once '_articulo-partial_.php';
  echo "<br>";
  require_once '../footer.php';
?>

<?php
