<?php
 class Connection
 {
     public $connection;

     public function __CONSTRUCT()
     {
         try {
<<<<<<< HEAD
             $this->connection = new PDO('mysql:host=127.0.0.1;dbname=viveminicaragua_bd', 'root', '');
=======
             $this->connection = new PDO('mysql:host=127.0.0.1;dbname=viveminicaragua_bd', 'root', 'lacb2208');
>>>>>>> 11b8cd92aa05fa5e4fdb442527e2f37c9c9201c4
             $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (Exception $e) {
             die($e->getMessage());
         }
     }

     public function __getConnection()
     {
         return $this->connection;
     }
 }
