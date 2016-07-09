<?php
/**
 *
 */
 require_once _dependencia_.'Connection/Connection.php';
 require_once _dependencia_.'Objects/ComentarioVideo.php';

 class ComentarioVideoModel
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
         return $r;
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
         return $r;
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
          return $r;
        } catch (Exception $e) {
          die($e->getMessage());
          return $r;
        }
     }

 }
