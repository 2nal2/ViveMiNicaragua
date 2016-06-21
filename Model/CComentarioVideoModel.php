<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/CComentarioVideo';

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

    public function save($ccomentarioVideo)
    {
        try {
            $sql = 'INSERT INTO CComentarioVideo
            (IdCC,IdComentarioPadre,IdUsuario,Fecha,Estado,Comentario) values
            (?,?,?,?,?,?)';

            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                  array(
                    $ccomentarioVideo->IdCC,
                    $ccomentarioVideo->IdComentarioPadre,
                    $ccomentarioVideo->IdUsuario,
                    $ccomentarioVideo->Fecha,
                    $ccomentarioVideo->Estado,
                    $ccomentarioVideo->Comentario
                  )
               );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function getSubComments($idComentarioPadre){
        $r = array();
        try {
          $sql = 'select * from CComentarioVideo where IdComentarioPadre = ?';
          $stm = $this->connection->prepare($sql);
          $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioVideo');
          $stm->execute(array($idComentarioPadre));
          while($ccomentarioVideo = $stm->fetch()){
            $r[] = $ccomentarioVideo;
          }
          return $r;
        } catch (Exception $e) {
          die($e->getMessage());
          return $r;
        }
    }
}
