<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/CComentarioFoto';

class CComentarioFotoModel
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

    public function save($ccomentarioFoto){
      try {
        $sql = 'INSERT INTO CComentarioFoto
            (IdCC,IdComentarioPadre,IdComentarioHijo) values
            (?,?,?)';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                    $ccomentarioFoto->IdCC,
                    $ccomentarioFoto->IdComentarioPadre,
                    $ccomentarioFoto->IdComentarioHijo
                  )
               );
      } catch (Exception $e) {
        die($e->getMessage());
        return false;
      }
    }

    public function update($ccomentarioFoto){
      try {
        $sql = 'UPDATE CComentarioFoto
            set IdCC = ?,IdComentarioPadre = ?,IdComentarioHijo = ?
            where IdCC = ?';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                      $ccomentarioFoto->IdCC,
                      $ccomentarioFoto->IdComentarioPadre,
                      $ccomentarioFoto->IdComentarioHijo
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
        $sql = 'select * from CComentarioFoto';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioFoto');
        $stm->execute();
        while($ccomentarioFoto = $stm->fetch()){
          $r[] = $ccomentarioFoto;
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
        $sql = 'select * from CComentarioFoto where IdCC = ?';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioFoto');
        $stm->execute(array($id));
        while($ccomentarioFoto = $stm->fetch()){
          $r[] = $ccomentarioFoto;
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
          $sql = 'select * from CComentarioFoto where IdComentarioPadre = ?';
          $stm = $this->connection->prepare($sql);
          $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioFoto');
          $stm->execute(array($idComentarioPadre));
          while($ccomentarioFoto = $stm->fetch()){
            $r[] = $ccomentarioFoto;
          }
          return $r;
        } catch (Exception $e) {
          die($e->getMessage());
          return $r;
        }
    }
}
