<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: ../../view/usuario/singin.php?redirect=view/articulo/articulo.php?id='.$_POST['idArticulo']);
    return;
}

require_once '../../view/constants.php';
require_once '../../Objects/ComentarioArticulo.php';
require_once '../../Model/ComentarioArticuloModel.php';


if(isset($_POST['idArticulo']) && isset($_POST['comentario'])){
  $comentarioModel =  new ComentarioArticuloModel();
  $comentario = new ComentarioArticulo();

  $comentario->IdArticulo = $_POST['idArticulo'];
  $comentario->IdUsuario = $_SESSION['id_user'];
  $comentario->Fecha = date('Y-m-d H:i:s');
  $comentario->Estado = true;
  $comentario->Comentario = htmlspecialchars($_POST['comentario']);

  $s = $comentarioModel->save($comentario);
  if(!$s){
    $_SESSION['error_pass'] = 'No se pudo guardar el comentario';
  }

  header('Location: ../../view/articulo/articulo.php?id='.$_POST['idArticulo']);


}
else{
  header('Location: ../../view/articulo/articulo.php?id='.$_POST['idArticulo']);
}

 ?>
