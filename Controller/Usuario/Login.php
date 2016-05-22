<?php

require_once dirname(dirname(__FILE__)).'../../Model/UsuarioModel.php';

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $model = new UsuarioModel();

    $existe = $model->existsUser($nombre);
    if ($existe) {
        echo '<div id="Error" style = "color: #ff5252">Usuario ya existente</div>';
    } else {
        echo '<div id="Success" style = "color : #00796b">Disponible</div>';
    }
}
