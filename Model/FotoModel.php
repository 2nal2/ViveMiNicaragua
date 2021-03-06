<?php
/**
 *
 */
 require_once _dependencia_.'Connection/Connection.php';
 require_once _dependencia_.'Objects/Foto.php';
class FotoModel
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

    public function save($foto)
    {
        try {
            $sql = 'INSERT INTO Foto
              (Nombre,IdCiudad,Descripcion,Latitud, Longitud,Ruta)
              values(?,?,?,?,?,?)';

            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                          array(
                            $foto->Nombre,
                            $foto->IdCiudad,
                            $foto->Descripcion,
                            $foto->Latitud,
                            $foto->Longitud,
                            $foto->Ruta,
                          )
                        );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function update($foto)
    {
        try {
            $sql = "UPDATE Foto SET
              Nombre = ?, IdCiudad = ?,
              Descripcion= ?, Latitud= ?,
              Longitud = ?, Ruta = ? WHERE IdFoto = ?";

            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                          array(
                            $foto->Nombre,
                            $foto->IdCiudad,
                            $foto->Descripcion,
                            $foto->Latitud,
                            $foto->Longitud,
                            $foto->Ruta,
                            $foto->IdFoto
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
            $sql = 'select * from Foto order by IdFoto desc';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Foto');
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
            $sql = 'select * from Foto where IdCiudad = ?';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Foto');
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
            $sql = 'select * from Foto where IdFoto = ?';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Foto');
            $stm->execute(array($id));

            return $stm->fetch();
        } catch (Exception $e) {
            die($e->getMessage());

            return null;
        }
    }
}
