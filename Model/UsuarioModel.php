<?php
/**
 *
 */
require_once dirname(dirname(__FILE__)).'/Objects/Usuario.php';
require_once dirname(dirname(__FILE__)).'/Connection/Connection.php';
require_once dirname(dirname(__FILE__)).'/Model/SesionModel.php';
require_once dirname(dirname(__FILE__)).'/Objects/Sesion.php';
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
                      ->prepare('SELECT * FROM Usuario WHERE Email= ? and Clave = MD5(?) and Estado = true');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($user, $pass));
            while ($usuario = $stm->fetch()) {
                session_start();
                $_SESSION['id_user'] = $usuario->IdUsuario;
                $_SESSION['nombre'] = $usuario->NombreUsuario;
                $_SESSION['email'] = $usuario->Email;
                $_SESSION['foto'] = $usuario->Foto;
                $_SESSION['error_pass'] = '';

                $sesionModel = new SesionModel();
                $sesion = new Sesion();

                session_regenerate_id();
                $sesion->IdSesion = session_id();
                $sesion->IdUsuario = $usuario->IdUsuario;
                $sesion->HoraInicio = date('Y-m-d H:i:s');

                return  $sesionModel->save($sesion) ? $usuario : null;
            }

            return;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function logout()
    {
        $sesionModel = new SesionModel();
        $sesion = new Sesion();

        $sesion->IdSesion = session_id();
        $sesion->HoraFin = date('Y-m-d H:i:s');

        if ($sesionModel->update($sesion)) {
            session_destroy();
            unset($_SESSION['id_user']);
            unset($_SESSION['nombre']);
            unset($_SESSION['email']);
            unset($_SESSION['foto']);
            unset($_SESSION['error_pass']);
            return true;
        } else {
            return false;
        }
    }

    public function save($Usuario)
    {
        try {
            $sql = 'INSERT INTO Usuario (NombreUsuario, Email, Clave, Rol, Estado, Foto, CodigoActivacion,Sexo)
                VALUES (?, ? ,MD5(?) ,? ,? ,? ,?,?)';

            return $this->connection->prepare($sql)
             ->execute(
            array(
                $Usuario->__GET('NombreUsuario'),
                $Usuario->__GET('Email'),
                $Usuario->__GET('Clave'),
                $Usuario->__GET('Rol'),
                $Usuario->__GET('Estado'),
                $Usuario->__GET('Foto'),
                $Usuario->__GET('CodigoActivacion'),
                $Usuario->__GET('Sexo'),
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function update($Usuario)
    {
        try {
            $sql = 'update Usuario SET Email = ?, NombreUsuario = ?, Rol=?,
            Estado=?, CodigoActivacion=?, Foto =?, Sexo = ?, Tstamp = ?
            where IdUsuario =  ?';

            return $this->connection->prepare($sql)
             ->execute(
            array(
                $Usuario->__GET('Email'),
                $Usuario->__GET('NombreUsuario'),
                $Usuario->__GET('Rol'),
                $Usuario->__GET('Estado'),
                $Usuario->__GET('CodigoActivacion'),
                $Usuario->__GET('Foto'),
                $Usuario->__GET('Sexo'),
                $Usuario->__GET('Tstamp'),
                $Usuario->__GET('IdUsuario'),
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());

            return false;
        }
    }

    public function updateClave($Usuario)
    {
        try {
            $sql = 'update Usuario SET Clave = MD5(?), CodigoActivacion = ""
            where IdUsuario =  ?';

            return $this->connection->prepare($sql)
             ->execute(
            array(
                $Usuario->__GET('Clave'),
                $Usuario->__GET('IdUsuario')
                )
            );
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

    public function existsUser($nombre)
    {
        try {
            $r = array();
            $stm = $this->connection->prepare('SELECT * FROM Usuario where NombreUsuario = ?');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($nombre));

            return $stm->rowCount() > 0;
        } catch (Exception $e) {
            die($e->getMessage());

            return true;
        }
    }

    public function existsNameUser($nombre, $actual)
    {
        try {
            $r = array();
            $stm = $this->connection->prepare('SELECT * FROM Usuario where NombreUsuario = ? and NombreUsuario!= ?');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($nombre,$actual));

            return $stm->rowCount() > 0;
        } catch (Exception $e) {
            die($e->getMessage());

            return true;
        }
    }

    public function getById($id)
    {
        try {
            $r = array();
            $stm = $this->connection->prepare('SELECT * FROM Usuario where IdUsuario = ?');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($id));

            return $stm->fetch();
        } catch (Exception $e) {
            die($e->getMessage());

            return new Usuario();
        }
    }

    public function isValidPass($id, $pass)
    {
        try {
            $r = array();
            $stm = $this->connection->prepare('SELECT * FROM Usuario where IdUsuario = ? and Clave = MD5(?)');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($id, $pass));

            return $stm->fetch();
        } catch (Exception $e) {
            die($e->getMessage());

            return null;
        }
    }

    public function existsEmail($email)
    {
        try {
            $r = array();
            $stm = $this->connection->prepare('SELECT * FROM Usuario where Email = ?');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($email));

            return $stm->fetch();
        } catch (Exception $e) {
            die($e->getMessage());

            return null;
        }
    }

    public function getByCodAndUser($cod, $idUser)
    {
        try {
            $r = array();
            $stm = $this->connection->prepare('SELECT * FROM Usuario where CodigoActivacion = ? and IdUsuario = ? and Estado = 1');
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
            $stm->execute(array($cod, $idUser));

            return $stm->fetch();
        } catch (Exception $e) {
            die($e->getMessage());

            return null;
        }
    }
}
