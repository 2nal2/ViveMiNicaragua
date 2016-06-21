<?php
/**
 *
 */
 require_once _dependencia_.'Connection/Connection.php';
 require_once _dependencia_.'Objects/CComentarioFoto.php';

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

    public function save($ccomentarioFoto)
    {
        try {
            $sql = 'INSERT INTO CComentarioFoto
            (IdComentarioPadre,IdUsuario,Fecha,Estado,Comentario) values
            (?,?,?,?,?)';

            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                  array(
                    $ccomentarioFoto->IdComentarioPadre,
                    $ccomentarioFoto->IdUsuario,
                    $ccomentarioFoto->Fecha,
                    $ccomentarioFoto->Estado,
                    $ccomentarioFoto->Comentario
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
