<?php
/**
 *
 */
require_once 'Objects/Usuario.php';
require_once 'Connection/Connection.php';
require_once 'Model/SesionModel.php';
require_once 'Objects/Sesion.php';
class UsuarioModel
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

    public function login($user, $pass)
    {
        try {
            $stm = $this->connection
                      ->prepare('SELECT * FROM Usuario WHERE Email= ? and Clave = MD5(?)');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($user, $pass));
            while ($usuario = $stm->fetch()) {
                // session_start();
                // $_SESSION['id_user'] = $usuario->IdUsuario;
                // $_SESSION['nombre'] = $usuario->NombreUsuario;
                // $_SESSION['email'] = $usuario->Email;
                // $sesionModel = new SesionModel();
                // $sesion = new Sesion();
                // $sesion->IdSesion =  session_id();
                // $sesion->IdUsuario = $usuario->IdUsuario;
                // $sesion->HoraInicio = date('Y-m-d H:i:s');
                //
                // $sessionModel->save($sesion);

                return $usuario;
            }

            return;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function save($Usuario)
    {
        try {
            $sql = 'INSERT INTO Usuario (NombreUsuario, Email, Clave, Rol, Estado, Foto, CodigoActivacion)
                VALUES (?, ? ,MD5(?) ,? ,? ,? ,?)';

            $this->connection->prepare($sql)
             ->execute(
            array(
                $Usuario->__GET('NombreUsuario'),
                $Usuario->__GET('Email'),
                $Usuario->__GET('Clave'),
                $Usuario->__GET('Rol'),
                $Usuario->__GET('Estado'),
                $Usuario->__GET('Foto'),
                $Usuario->__GET('CodigoActivacion'),
                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function update($Usuario)
    {
        try {
            $sql = 'update Usuario SET Email = ?, NombreUsuario = ?, Rol=?,
            Estado=?, CodigoActivacion=?, Foto =?
            where IdUsuario =  ?';

            $this->connection->prepare($sql)
             ->execute(
            array(
                $Usuario->__GET('Email'),
                $Usuario->__GET('NombreUsuario'),
                $Usuario->__GET('Rol'),
                $Usuario->__GET('Estado'),
                $Usuario->__GET('CodigoActivacion'),
                $Usuario->__GET('Foto'),
                $Usuario->__GET('IdUsuario'),
                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function activate($Codigo)
    {
        try {
            $sql = "select * from Usuario Where CodigoActivacion = '$Codigo'";
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute();//array($Codigo)

            $row = $stm->rowCount();

            if ($row == 1) {
                $usuario = $stm->fetch();
                $usuario->__SET('Estado', true);
                $usuario->__SET('CodigoActivacion', '');
                if ($this->update($usuario)) {
                    return true;
                }
            }

            return false;
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function getAll()
    {
        try {
            $r = array();
            $stm = $this->connection->query('SELECT * FROM Usuario');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            while ($usuario = $stm->fetch()) {
                $r[] = $usuario;
            }

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());

            return;
        }
    }
}
