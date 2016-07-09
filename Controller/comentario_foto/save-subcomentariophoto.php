<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: ../../singin.php');
    return;
}

require_once '../../view/constants.php';
require_once '../../Objects/ComentarioFoto.php';
require_once '../../Model/ComentarioFotoModel.php';
require_once '../../Objects/CComentarioFoto.php';
require_once '../../Model/CComentarioFotoModel.php';


if(isset($_POST['idPadre']) && isset($_POST['comentario'])){
  $ccomentarioModel =  new CComentarioFotoModel();
  $ccomentario = new CComentarioFoto();

  $ccomentario->IdComentarioPadre = $_POST['idPadre'];
  $ccomentario->IdUsuario = $_SESSION['id_user'];
  $ccomentario->Fecha = date('Y-m-d H:i:s');
  $ccomentario->Estado = true;
  $ccomentario->Comentario = htmlspecialchars($_POST['comentario']);

  $s = $ccomentarioModel->save($ccomentario);
  if(!$s){
    echo "no guarde hp";
    $_SESSION['error_pass'] = 'No se pudo guardar el comentario';
  }

  header('Location: ../../view/galeria/galeria_img.php?id='.$_POST['IdCC']);


}
else{
  header('Location: ../../view/galeria/galeria_img.php?id='.$_POST['IdCC']);
}

 ?>
