<?php
  require_once '../header.php';
  require_once '../../Objects/Video.php';
  require_once '../../Model/VideoModel.php';
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

  $Video = new Video();
  require_once  '_video_partial_.php';
  require_once '../footer.php';
?>
