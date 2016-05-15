<?php

 /**
  *
  */
 require_once 'Objects/Sesion.php';
 require_once 'Connection/Connection.php';
class SesionModel
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

    public function save($sesion)
    {
        try {
            $sql = 'INSERT INTO Sesion (IdSesion, IdUsuario,HoraInicio) values (?,?,?)';
            $stm = $this->connection->prepare($sql);
            $r = $stm->execute(
            array(
              $sesion->__GET('IdSesion'),
              $sesion->__GET('IdUsuario'),
              $sesion->__GET('HoraInicio'),
              )
            );

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function update($sesion)
    {
        try {
            $sql = 'UPDATE Sesion set HoraFin = ? where IdSesion = ?';
            $stm = $this->connection->prepare($sql);
            $r = $stm->execute(
            array(
              $sesion->__GET('HoraFin'),
              $sesion->__GET('IdSesion'),
              )
            );

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function getByUser($idUser)
    {
        try {
            $r = array();

            $stm = $this->connection->prepare('SELECT * FROM Sesion WHERE IdUsuario= ?');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Sesion');
            $stm->execute(array($idUser));
            while ($sesion = $stm->fetch()) {
                $r[] = $sesion;
            }

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());

            return;
        }
    }
}
