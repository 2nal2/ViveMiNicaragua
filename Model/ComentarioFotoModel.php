<?php
/**
 *
 */
 require_once 'Connection/Connection.php';
 require_once 'Objects/Articulo.php';
 require_once 'Objects/ComentarioFoto.php';
 require_once 'Objects/Usuario.php';
 require_once 'Objects/Sesion.php';

 class ComentarioFotoModel
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
       } catch (Exception $e) {
         die($e->getMessage());
         return $r;
       }

     }
 }
