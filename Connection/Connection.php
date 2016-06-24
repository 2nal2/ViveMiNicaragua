<?php
 class Connection
 {
     public $connection;

     public function __CONSTRUCT()
     {
         try {
             $this->connection = new PDO('mysql:host=127.0.0.1;dbname=viveminicaragua_bd', 'root', '12345');

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
