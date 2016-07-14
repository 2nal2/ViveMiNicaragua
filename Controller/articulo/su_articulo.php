<?php
  session_start();
  require_once '../../view/constants.php';
  require_once '../../Objects/Articulo.php';
  require_once '../../Model/ArticuloModel.php';
  require_once '../../view/Uploader.php';
  require_once '../../Objects/Usuario.php';
  require_once '../../Model/UsuarioModel.php';

  if(isset($_SESSION['id_user'])){
    /*Comprobacion de nivel de usuario de usuario*/
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
    // fin de la comprobacion

    $data = isset($_POST['titulo']) and isset($_POST['ciudad']) and isset($_POST['contenido']);
    $id = $_POST['IdArticulo'] !='';

    $articulo = new Articulo();
    $articuloModel = new ArticuloModel();
    $uploader = new Uploader();

    //setting paremeters
    $articulo->Contenido  = preg_replace('[\s+]',"",stripslashes(htmlspecialchars_decode($_POST['contenido'])));
    // echo $articulo->Contenido;
    // return;
    //
    $articulo->Longitud   = '';
    $articulo->Latitud    = '';
    $articulo->Titulo     = $_POST['titulo'];
    $articulo->IdCiudad   = $_POST['ciudad'];

    $articulo->IdAutor    = $_SESSION['id_user'];

    if ($articulo->Contenido == '') {
      $_SESSION['error_pass'] = 'Ingrese el contenido del articulo';
      header("Location: ../../view/articulo/nuevo-articulo.php");
    }


    if($data and $id){
      $articulo->IdArticulo         = $_POST['IdArticulo'];
      $articulo->FechaCreacion      = ($articuloModel->getById($articulo->IdArticulo))->FechaCreacion;
      if($_FILES['uploadedfile']['size']>0){
        $articulo->Banner = $uploader->upload('articulo-'.$articulo->IdArticulo);
      }else{
        $articulo->Banner = ($articuloModel->getById($articulo->IdArticulo))->Banner;
      }



      $articuloModel->update($articulo);
      header("Location: ../../view/articulo/articulo.php?id=".$articulo->IdArticulo);

    }
    else if($data){

      if($_FILES['uploadedfile']['size']>0){
        $articulo->Banner = $uploader->upload(preg_replace('[\s+]',",",'articulo-'.date('Y-m-d H:i:s')));
      }
      else{
        $_SESSION['error_pass'] = 'Ingrese una foto para el articulo';
        header("Location: ../../view/articulo/nuevo-articulo.php");
      }
      $articulo->FechaCreacion      = date('Y-m-d H:i:s');
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
