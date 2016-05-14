<?php

/**
 *
 */
class SesionModel
{

  private $connection;
  function __construct(argument)
  {
    try {
        $c = new Connection();
        $this->connection = $c->__getConnection();
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
}


 ?>
