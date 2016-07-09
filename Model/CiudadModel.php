<?php
/**
 *
 */
 require_once _dependencia_.'Objects/Ciudad.php';
 require_once _dependencia_.'Connection/Connection.php';
class CiudadModel
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

    public function save($ciudad)
    {
        try {
            $sql = 'INSERT INTO Ciudad (Nombre,Descripcion) values (?,?)';
            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                    array(
                      $ciudad->Nombre,
                      $ciudad->Descripcion,
                    )
                  );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function update($ciudad)
    {
        try {
            $sql = 'UPDATE Ciudad set Nombre = ? , Descripcion = ?  where IdCiudad = ? ';
            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                    array(
                      $ciudad->Nombre,
                      $ciudad->Descripcion,
                      $ciudad->IdCiudad
                    )
                  );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function getAll(){
      $r =  array();
      try {
        $sql = 'select * from Ciudad';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'Ciudad');
        $stm->execute();

        while($foto = $stm->fetch()){
          $r [] = $foto;
        }

        return $r;
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }

    }


}
