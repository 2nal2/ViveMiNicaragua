<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/Articulo.php';
class ArticuloModel
{
    private $connection;
    public function __construct()
    {
      try {
        $this->connection = new Connection()->__getConnection();
      } catch (Exception $e) {
        die($e->getMessage());
      }

    }

    public function save($articulo){
      try {
        $sql = 'INSERT INTO Articulo
            (IdCiudad,Titulo,Banner,IdAutor,Contenido,
            FechaCreacion,Latitud,Longitud) values
            (?,?,?,?,?,?,?,?)';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                    $articulo->IdCiudad,
                    $articulo->Titulo,
                    $articulo->Banner,
                    $articulo->IdAutor,
                    $articulo->Contenido,
                    $articulo->FechaCreacion,
                    $articulo->Latitud,
                    $articulo->Longitud
                  )
               );
      } catch (Exception $e) {
        die($e->getMessage());
        return false;
      }

    }

    public function update($articulo){
      try {
        $sql = 'UPDATE Articulo
            set IdCiudad = ?,Titulo = ?,Banner = ?,
            IdAutor = ?,Contenido= ?,
            FechaCreacion= ?,Latitud = ?,Longitud = ?
            where IdArticulo = ?';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                    $articulo->IdCiudad,
                    $articulo->Titulo,
                    $articulo->Banner,
                    $articulo->IdAutor,
                    $articulo->Contenido,
                    $articulo->FechaCreacion,
                    $articulo->Latitud,
                    $articulo->Longitud,
                    $articulo->IdArticulo
                  )
               );
      } catch (Exception $e) {
        die($e->getMessage());
        return false;
      }

    }

    public function getAll(){
      $r = array();
      try {
        $sql = 'select * from Articulo';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'Articulo');
        $stm->execute();
        while($articulo = $stm->fetch()){
          $r[] = $articulo;
        }
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }

    }

    public function getByAutor($idAutor){
      $r = array();
      try {
        $sql = 'select * from Articulo where IdAutor = ?';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'Articulo');
        $stm->execute(array($idAutor));
        while($articulo = $stm->fetch()){
          $r[] = $articulo;
        }
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }

    }

    public function getByCiudad($idCiudad){
      $r = array();
      try {
        $sql = 'select * from Articulo where IdCiudad = ?';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'Articulo');
        $stm->execute(array($idCiudad));
        while($articulo = $stm->fetch()){
          $r[] = $articulo;
        }
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }

    }

    public function getById($id){
      $r = array();
      try {
        $sql = 'select * from Articulo where IdArticulo = ?';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'Articulo');
        $stm->execute(array($id));
        while($articulo = $stm->fetch()){
          $r[] = $articulo;
        }
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }

    }
}
