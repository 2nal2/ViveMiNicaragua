<?php

require_once dirname(dirname(__FILE__)).'../../Model/UsuarioModel.php';

if (isset($_POST['nombre']) and isset($_POST['actual'])) {
    $nombre = $_POST['nombre'];
    $actual = $_POST['actual'];
    $model = new UsuarioModel();

    $existe = $model->existsNameUser($nombre,$actual);
    if ($existe) {
        echo '<div id="Error" style = "color: #ff5252">Usuario ya existente</div>';
    } else {
        echo '<div id="Success" style = "color : #00796b">Disponible</div>';
    }
}
