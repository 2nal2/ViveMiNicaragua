<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/Articulo.php';
 require_once 'Objects/ComentarioArticulo.php';
 require_once 'Objects/Usuario.php';
 require_once 'Objects/Sesion.php';
 require_once 'Objects/CComentarioArticulo';

class ComentarioArticuloModel
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

    public function save($comentarioArticulo){
      try {
        $sql = 'INSERT INTO ComentarioArticulo
            (IdComentario,IdUsuario,IdArticulo,Fecha,Estado,
            Comentario) values
            (?,?,?,?,?,?)';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                    $comentarioArticulo->IdComentario,
                    $comentarioArticulo->IdUsuario,
                    $comentarioArticulo->IdArticulo,
                    $comentarioArticulo->Fecha,
                    $comentarioArticulo->Estado,
                    $comentarioArticulo->Comentario
                  )
               );
      } catch (Exception $e) {
        die($e->getMessage());
        return false;
      }

    }

    public function update($comentarioArticulo){
      try {
        $sql = 'UPDATE ComentarioArticulo
            set IdComentario = ?,IdUsuario = ?,IdArticulo = ?,
            Fecha = ?,Estado= ?,
            Comentario= ?
            where IdComentario = ?';

        $stm = $this->connection->prepare($sql);

        return $stm->execute(
                  array(
                      $comentarioArticulo->IdComentario,
                      $comentarioArticulo->IdUsuario,
                      $comentarioArticulo->IdArticulo,
                      $comentarioArticulo->Fecha,
                      $comentarioArticulo->Estado,
                      $comentarioArticulo->Comentario
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
        $sql = 'select * from ComentarioArticulo';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'ComentarioArticulo');
        $stm->execute();
        while($comentarioArticulo = $stm->fetch()){
          $r[] = $comentarioArticulo;
        }
      } catch (Exception $e) {
        die($e->getMessage());
        return $r;
      }
    }

    public function getById($id){
      $r = array();
      try {
        $sql = 'select * from ComentarioArticulo where IdArticulo = ?';
        $stm = $this->connection->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, 'ComentarioArticulo');
        $stm->execute(array($id));
        while($comentarioArticulo = $stm->fetch()){
          $r[] = $comentarioArticulo;
        }
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
        } catch (Exception $e) {
          die($e->getMessage());
          return $r;
        }
    }
}
