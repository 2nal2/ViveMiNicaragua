<?php
/**
 *
 */
class Uploader
{
    public function __construct()
    {
    }

    public function upload($name)
    {
        $msg = "";
        $uploadedfileload = 'true';
        $uploadedfile_size = $_FILES['uploadedfile']['size'];

        $name_temp = $_FILES['uploadedfile']['name'];

        $extension = pathinfo($name_temp, PATHINFO_EXTENSION);
        $_FILES['uploadedfile']['name'] = $name.'.'.$extension;
        if ($_FILES['uploadedfile']['size'] > 2097152) {
            $msg = $msg.'El archivo es mayor que 2MB, debes reduzcirlo antes de subirlo<BR>';
            $uploadedfileload = 'false';
        }

        if (!($_FILES['uploadedfile']['type'] == 'image/jpeg' or $_FILES['uploadedfile']['type'] == 'image/gif' or $_FILES['uploadedfile']['type'] == 'image/png')) {
            $msg = $msg.' Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>';
            $uploadedfileload = 'false';
        }

        $file_name = $_FILES['uploadedfile']['name'];
        $add = _dependencia_."/uploads/$file_name";
        if ($uploadedfileload == 'true') {
            if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add)) {
                return 'uploads/'.$file_name;
            // echo ' Ha sido subido satisfactoriamente';
            } else {
                return '';
            // echo 'Error al subir el archivo';
            }
        } else {
            return '';
        // echo $msg;
        }

    //return "uploads/".$file_name;
    }
}
