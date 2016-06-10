<?php
require_once dirname(dirname(__FILE__)).'../../Objects/Usuario.php';
require_once dirname(dirname(__FILE__)).'../../Model/UsuarioModel.php';

if (isset($_POST['nombre']) and isset($_POST['email']) and isset($_POST['sexo'])
and isset($_POST['rol']) and isset($_POST['id'])) {
    $model = new UsuarioModel();
    $usuario = $model->getById($_POST['id']);

    $existe = $model->existsEmail($_POST['email']);

    if ($existe and $_POST['email']!=$usuario->Email) {
      $error = 'El email ingresado ya esta siendo usado por otro usuario';
    } else {
        $usuario->NombreUsuario = $_POST['nombre'];
        $usuario->Email = $_POST['email'];
        $usuario->Sexo = $_POST['sexo'];
        $usuario->Rol = $_POST['rol'];

        $a = $model->update($usuario);

        if(!$a){
          $error = 'Error al actualizar los datos';
        }
        else{
          $mensaje = "Datos actualizados";
        }
    }
}
