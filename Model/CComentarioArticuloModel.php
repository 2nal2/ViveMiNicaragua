<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/CComentarioArticulo';

class CComentarioVideoModel
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

    public function save($ccomentarioArticulo){
      try {
        $sql = 'INSERT INTO CComentarioArticulo
            (IdCC,IdComentarioPadre,IdComentarioHijo) values
            (?,?,?)';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                    $ccomentarioArticulo->IdCC,
                    $ccomentarioArticulo->IdComentarioPadre,
                    $ccomentarioArticulo->IdComentarioHijo
                  )
               );
      } catch (Exception $e) {
        die($e->getMessage());
        return false;
      }

    }

    public function update($ccomentarioArticulo){
      try {
        $sql = 'UPDATE CComentarioArticulo
            set IdCC = ?,IdComentarioPadre = ?,IdComentarioHijo = ?
            where IdCC = ?';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                      $ccomentarioArticulo->IdCC,
                      $ccomentarioArticulo->IdComentarioPadre,
                      $ccomentarioArticulo->IdComentarioHijo
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
        $sql = 'select * from CComentarioArticulo';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioArticulo');
        $stm->execute();
        while($ccomentarioArticulo = $stm->fetch()){
          $r[] = $ccomentarioArticulo;
        }
        return $r;
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }
    }

    public function getById($id){
      $r = array();
      try {
        $sql = 'select * from CComentarioArticulo where IdCC = ?';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioArticulo');
        $stm->execute(array($id));
        while($ccomentarioArticulo = $stm->fetch()){
          $r[] = $ccomentarioArticulo;
        }
        return $r;
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }
    }

    public function getSubComments($idComentarioPadre){
        $r = array();
        try {
          $sql = 'select * from CComentarioArticulo where IdComentarioPadre = ?';
          $stm = $this->connection->prepare($sql);
          $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioArticulo');
          $stm->execute(array($idComentarioPadre));
          while($ccomentarioArticulo = $stm->fetch()){
            $r[] = $ccomentarioArticulo;
          }
          return $r;
        } catch (Exception $e) {
          die($e->getMessage());
          return $r;
        }
    }
}
