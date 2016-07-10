<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: ../../view/usuario/singin.php?redirect=../articulo/articulo.php?id='.$_POST['idArticulo']);
    return;
}

 require_once '../../view/constants.php';
require_once '../../Objects/CComentarioArticulo.php';
require_once '../../Model/CComentarioArticuloModel.php';


if(isset($_POST['idComentario']) && isset($_POST['comentario'])&& isset($_POST['idArticulo'])){
  $ccomentarioModel =  new CComentarioArticuloModel();
  $ccomentario = new CComentarioArticulo();

  $ccomentario->IdComentarioPadre = $_POST['idComentario'];
  $ccomentario->IdUsuario = $_SESSION['id_user'];
  $ccomentario->Fecha = date('Y-m-d H:i:s');
  $ccomentario->Estado = true;
  $ccomentario->Comentario = htmlspecialchars($_POST['comentario']);

  $s = $ccomentarioModel->save($ccomentario);
  if(!$s){
    $_SESSION['error_pass'] = 'No se pudo guardar el comentario';
  }


  header('Location: ../../view/articulo/articulo.php?id='.$_POST['idArticulo']);


}
else{
  header('Location: ../../view/articulo/articulo.php?id='.$_POST['idArticulo']);
}

 ?>
