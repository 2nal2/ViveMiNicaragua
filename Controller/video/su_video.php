<?php
  session_start();
  require_once '../../view/constants.php';
  require_once '../../Objects/Video.php';
  require_once '../../Model/VideoModel.php';
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


    $data = isset($_POST['nombre']) and isset($_POST['ciudad'])
            and isset($_POST['descripcion']) and isset($_POST['url']);
    $id = $_POST['IdVideo'] !='';

    $video = new Video();
    $videoModel = new VideoModel();

    //setting paremeters
    $video->Descripcion  = stripslashes(htmlspecialchars_decode($_POST['descripcion']));
    $video->Longitud   = '';
    $video->Latitud    = '';
    $video->Nombre     = $_POST['nombre'];
    $video->IdCiudad   = $_POST['ciudad'];
    $video->Url        = $_POST['url'];


    if($data and $id){
      $video->IdVideo = $_POST['IdVideo'];
      $videoModel->update($video);
      header("Location: ../../view/galeria/galeria_vid.php");

    }
    else if($data){
      $videoModel->save($video);
      header("Location: ../../view/galeria/galeria_vid.php");
    }
    else{
      header('Location: ../../index.php');
    }
  }
  else{
    header('Location: ../../index.php');
  }
 ?>
