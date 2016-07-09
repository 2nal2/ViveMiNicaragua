<?php
  session_start();
  require_once '../../view/constants.php';
  require_once '../../Objects/Articulo.php';
  require_once '../../Model/ArticuloModel.php';
  require_once '../../view/Uploader.php';


  if(isset($_SESSION['id_user'])){

    $data = isset($_POST['titulo']) and isset($_POST['ciudad']) and isset($_POST['contenido']);
    $id = $_POST['IdArticulo'] !='';

    $articulo = new Articulo();
    $articuloModel = new ArticuloModel();
    $uploader = new Uploader();

    //setting paremeters
    $articulo->Contenido  = stripslashes(htmlspecialchars_decode($_POST['contenido']));
    // echo $articulo->Contenido;
    // return;
    //
    $articulo->Longitud   = '';
    $articulo->Latitud    = '';
    $articulo->Titulo     = $_POST['titulo'];
    $articulo->IdCiudad   = $_POST['ciudad'];
    $articulo->FechaCreacion      = date('Y-m-d H:i:s');
    $articulo->IdAutor    = $_SESSION['id_user'];


    if($data and $id){
      $articulo->IdArticulo = $_POST['IdArticulo'];

      if($_FILES['uploadedfile']['size']>0){
        $articulo->Banner = $uploader->upload('articulo-'.$articulo->IdArticulo);
      }else{
        $articulo->Banner = ($articuloModel->getById($articulo->IdArticulo))->Banner;
      }



      $articuloModel->update($articulo);
      header("Location: ../../view/articulo/articulo.php?id=".$articulo->IdArticulo);

    }
    else if($data){
      $articulo->Banner = $uploader->upload(preg_replace('[\s+]',",",'articulo-'.date('Y-m-d H:i:s')));

      // echo preg_replace('[\s+]',",",'articulo-'.date('Y-m-d H:i:s'));


      $articuloModel->save($articulo);
      header("Location: ../../view/articulo/articulo.php");
    }
    else{
      header('Location: ../../index.php');
    }
  }
  else{
    header('Location: ../../index.php');
  }
 ?>
