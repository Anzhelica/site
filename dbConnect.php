<?php

class dbConnect
{
  private $DB_connection;

  function __construct()
  {
    require_once('config.php');
    try {
      $this->DB_connection = new PDO("mysql:host={$db_server};dbname={$db_name}", $db_user, $db_pass);
      $this->DB_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function getDb()
  {
    if ($this->DB_connection instanceof PDO) {
      return $this->DB_connection;
    }
  }

}