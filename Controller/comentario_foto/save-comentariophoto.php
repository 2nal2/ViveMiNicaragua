<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: ../../singin.php');
    return;
}

require_once '../../constants.php';
require_once '../../Objects/ComentarioFoto.php';
require_once '../../Model/ComentarioFotoModel.php';


if(isset($_POST['idFoto']) && isset($_POST['comentario'])){
  $comentarioModel =  new ComentarioFotoModel();
  $comentario = new ComentarioFoto();

  $comentario->IdUsuario = $_SESSION['id_user'];
  $comentario->Fecha = date('Y-m-d H:i:s');
  $comentario->IdFoto = $_POST['idFoto'];
  $comentario->Estado = true;
  $comentario->Comentario = htmlspecialchars($_POST['comentario']);

  $s = $comentarioModel->save($comentario);
  if(!$s){
    echo "no guarde hp";
    $_SESSION['error_pass'] = 'No se pudo guardar el comentario';
  }

  header('Location: ../../galeria_img.php?id='.$_POST['IdComentario']);


}
else{
  header('Location: ../../galeria_img.php?id='.$_POST['IdComentario']);
}

 ?>
