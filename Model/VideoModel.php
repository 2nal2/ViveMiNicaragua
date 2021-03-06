<?php
/**
 *
 */
 require_once _dependencia_.'Connection/Connection.php';
 require_once _dependencia_.'Objects/Video.php';
class VideoModel
{
    private $connection;
    public function __construct()
    {
        try {
            $c = new Connection();
            $this->connection = $c->__getConnection();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function save($video)
    {
        try {
            $sql = 'INSERT INTO Video
            (Nombre,IdCiudad,Descripcion,Latitud, Longitud,Url)
            values(?,?,?,?,?,?)';

            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                        array(
                          $video->Nombre,
                          $video->IdCiudad,
                          $video->Descripcion,
                          $video->Latitud,
                          $video->Longitud,
                          $video->Url,
                        )
                      );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function update($video)
    {
        try {
            $sql = 'UPDATE Video SET
            Nombre = ?, IdCiudad = ?,
            Descripcion= ?, Latitud= ?,
            Longitud = ?, Url = ? WHERE IdVideo = ?';

            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                        array(
                          $video->Nombre,
                          $video->IdCiudad,
                          $video->Descripcion,
                          $video->Latitud,
                          $video->Longitud,
                          $video->Url,
                          $video->IdVideo,
                        )
                      );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function getAll()
    {
        $r = array();
        try {
            $sql = 'select * from Video order by IdVideo desc';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Video');
            $stm->execute();

            while ($foto = $stm->fetch()) {
                $r [] = $foto;
            }

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());

            return $r;
        }
    }

    public function getByCiudad($idCiudad)
    {
        $r = array();
        try {
            $sql = 'select * from Video where IdCiudad = ?';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Video');
            $stm->execute(array($idCiudad));

            while ($foto = $stm->fetch()) {
                $r [] = $foto;
            }

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());

            return $r;
        }
    }

    public function getById($id)
    {
        try {
            $sql = 'select * from Video where IdVideo = ?';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Video');
            $stm->execute(array($id));

            return $stm->fetch();
        } catch (Exception $e) {
            die($e->getMessage());

            return null;
        }
    }
}
