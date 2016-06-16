<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/ComentarioFoto.php';
 class ComentarioFotoModel
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

     public function save($comentarioFoto){
       try {
         $sql = 'INSERT INTO ComentarioFoto
             (IdComentario,IdUsuario,IdFoto,Fecha,Estado,
             Comentario) values
             (?,?,?,?,?,?)';

         $stm = $this->connection->prepare($sql);

         return $stm->execute(
                   array(
                     $comentarioFoto->IdComentario,
                     $comentarioFoto->IdUsuario,
                     $comentarioFoto->IdFoto,
                     $comentarioFoto->Fecha,
                     $comentarioFoto->Estado,
                     $comentarioFoto->Comentario
                   )
                );
       } catch (Exception $e) {
         die($e->getMessage());
         return false;
       }

     }

     public function getByPhotoId($fotoId){
          $r = array();
          try {
            $sql = 'select * from ComentarioFoto where IdFoto = ?';
            $stm = $this->connection->prepare($sql);
            $stm->setFetchMode(PDO::FETCH_CLASS, 'ComentarioFoto');
            $stm->execute(array($fotoId));
            while($comentarioFoto = $stm->fetch()){
              $r[] = $comentarioFoto;
            }
            return $r;
          } catch (Exception $e) {
            die($e->getMessage());
            return $r;
          }
     }

     public function update($comentarioFoto){
       try {
         $sql = 'UPDATE comentarioFoto
             set IdComentario = ?,IdUsuario = ?,IdFoto = ?,
             Fecha = ?,Estado= ?,
             Comentario= ?
             where IdComentario = ?';

         $stm = $this->connection->prepare($sql);

         return $stm->execute(
                   array(
                       $comentarioFoto->IdComentario,
                       $comentarioFoto->IdUsuario,
                       $comentarioFoto->IdFoto,
                       $comentarioFoto->Fecha,
                       $comentarioFoto->Estado,
                       $comentarioFoto->Comentario
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
         $sql = 'select * from ComentarioFoto';
         $stm = $this->connection->prepare($sql);
         $stm->setFetchMode(PDO::FETCH_CLASS, 'ComentarioFoto');
         $stm->execute();
         while($comentarioFoto = $stm->fetch()){
           $r[] = $comentarioFoto;
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
         $sql = 'select * from ComentarioFoto where IdFoto = ?';
         $stm = $this->connection->prepare($sql);
         $stm->setFetchMode(PDO::FETCH_CLASS, 'ComentarioFoto');
         $stm->execute(array($id));
         while($comentarioFoto = $stm->fetch()){
           $r[] = $comentarioFoto;
         }
         return $r;
       } catch (Exception $e) {
         die($e->getMessage());
         return $r;
       }
     }

public function getSubComentarioById($idComentarioPadre){
     $r = array();
   try {
     $sql = 'select * from CComentarioFoto where IdComentarioPadre = ?';
     $stm = $this->connection->prepare($sql);
     $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioFoto');
     $stm->execute(array($idComentarioPadre));
     while($ccomentarioFoto = $stm->fetch()){
       $r[] = $ccomentarioFoto;
     }
   } catch (Exception $e) {
     die($e->getMessage());
     return $r;
   }
}

 }
