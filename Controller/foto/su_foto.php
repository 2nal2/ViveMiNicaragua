<?php
  session_start();
  require_once '../../view/constants.php';
  require_once '../../Objects/Foto.php';
  require_once '../../Model/FotoModel.php';
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


    $data = isset($_POST['nombre']) and isset($_POST['ciudad'])
    and isset($_POST['descripcion']) and isset($_POST['longitud'])
    and isset($_POST['latitud']);
    $id = $_POST['IdFoto'] !='';

    $foto = new Foto();
    $fotoModel = new FotoModel();
    $uploader = new Uploader();

    //setting paremeters
    $foto->Descripcion  = stripslashes(htmlspecialchars_decode($_POST['descripcion']));
    $foto->Longitud   = $_POST['longitud'];
    $foto->Latitud    = $_POST['latitud'];
    $foto->Nombre     = $_POST['nombre'];
    $foto->IdCiudad   = $_POST['ciudad'];


    if($data and $id){
      $foto->IdFoto = $_POST['IdFoto'];

      if($_FILES['uploadedfile']['size']>0){
        $foto->Ruta = $uploader->upload('foto-'.$foto->IdFoto);
      }else{
        $foto->Ruta = ($fotoModel->getById($foto->IdFoto))->Ruta;
      }

      $fotoModel->update($foto);
      header("Location: ../../view/galeria/galeria_img.php");

    }
    else if($data){
      $foto->Ruta = $uploader->upload(preg_replace('[\s+]',",",'foto-'.date('Y-m-d H:i:s')));

      $fotoModel->save($foto);
      header("Location: ../../view/galeria/galeria_img.php");
    }
    else{
      header('Location: ../../index.php');
    }
  }
  else{
    header('Location: ../../index.php');
  }
 ?>
