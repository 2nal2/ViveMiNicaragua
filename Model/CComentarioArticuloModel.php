<?php
/**
 *
 */
 require_once _dependencia_.'Connection/Connection.php';
 require_once _dependencia_.'Objects/CComentarioArticulo.php';

class CComentarioArticuloModel
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

    public function save($ccomentarioArticulo)
    {
        try {
            $sql = 'INSERT INTO CComentarioArticulo
            (IdComentarioPadre,IdUsuario,Fecha,Estado,Comentario) values
            (?,?,?,?,?)';

            $stm = $this->connection->prepare($sql);

            return $stm->execute(
                  array(
                    $ccomentarioArticulo->IdComentarioPadre,
                    $ccomentarioArticulo->IdUsuario,
                    $ccomentarioArticulo->Fecha,
                    $ccomentarioArticulo->Estado,
                    $ccomentarioArticulo->Comentario
                  )
               );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function getSubComments($idComentarioPadre)
    {
        $r = array();
        try {
            $sql = 'select * from CComentarioArticulo where IdComentarioPadre = ?';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioArticulo');
            $stm->execute(array($idComentarioPadre));

            while ($ccomentarioArticulo = $stm->fetch()) {
                $r[] = $ccomentarioArticulo;
                return $r;
            }

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());
            return $r;
        }
    }
}
