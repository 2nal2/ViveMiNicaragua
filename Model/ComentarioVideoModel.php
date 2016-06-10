<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/Video.php';
 require_once 'Objects/ComentarioVideo.php';
 require_once 'Objects/Usuario.php';
 require_once 'Objects/Sesion.php';

 class ComentarioVideoModel
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

     public function save($comentarioVideo){
       try {
         $sql = 'INSERT INTO ComentarioVideo
             (IdComentario,IdUsuario,IdVideo,Fecha,Estado,
             Comentario) values
             (?,?,?,?,?,?)';

         $stm = $this->connection->prepare($sql);

         return $stm->execute(
                   array(
                     $comentarioVideo->IdComentario,
                     $comentarioVideo->IdUsuario,
                     $comentarioVideo->IdVideo,
                     $comentarioVideo->Fecha,
                     $comentarioVideo->Estado,
                     $comentarioVideo->Comentario
                   )
                );
       } catch (Exception $e) {
         die($e->getMessage());
         return false;
       }

     }

     public function update($comentarioVideo){
       try {
         $sql = 'UPDATE ComentarioVideo
             set IdComentario = ?,IdUsuario = ?,IdVideo = ?,
             Fecha = ?,Estado= ?,
             Comentario= ?
             where IdComentario = ?';

         $stm = $this->connection->prepare($sql);

         return $stm->execute(
                   array(
                       $comentarioVideo->IdComentario,
                       $comentarioVideo->IdUsuario,
                       $comentarioVideo->IdVideo,
                       $comentarioVideo->Fecha,
                       $comentarioVideo->Estado,
                       $comentarioVideo->Comentario
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
         $sql = 'select * from ComentarioVideo';
         $stm = $this->connection->prepare($sql);
         $stm->setFetchMode(PDO::FETCH_CLASS, 'ComentarioVideo');
         $stm->execute();
         while($comentarioVideo = $stm->fetch()){
           $r[] = $comentarioVideo;
         }
       } catch (Exception $e) {
         die($e->getMessage());
         return $r;
       }
     }

     public function getById($id){
       $r = array();
       try {
         $sql = 'select * from ComentarioVideo where IdVideo = ?';
         $stm = $this->connection->prepare($sql);
         $stm->setFetchMode(PDO::FETCH_CLASS, 'ComentarioVideo');
         $stm->execute(array($id));
         while($comentarioVideo = $stm->fetch()){
           $r[] = $comentarioVideo;
         }
       } catch (Exception $e) {
         die($e->getMessage());
         return $r;
       }
     }

     public function getSubComentarioById($idComentarioPadre){
          $r = array();
        try {
          $sql = 'select * from CComentarioVideo where IdComentarioPadre = ?';
          $stm = $this->connection->prepare($sql);
          $stm->setFetchMode(PDO::FETCH_CLASS, 'CComentarioVideo');
          $stm->execute(array($idComentarioPadre));
          while($ccomentarioVideo = $stm->fetch()){
            $r[] = $ccomentarioArticulo;
          }
        } catch (Exception $e) {
          die($e->getMessage());
          return $r;
        }
     }

 }
