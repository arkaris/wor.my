<?php
class Db {
  private $db_host = "localhost";
  private $db_name = "wor";
  private $db_user = "arkaris";
  private $db_pass = "firefly";
  
  public static function connect() {
    try {
      $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    } catch (PDOException $e) {
      return false;//$e;
      die();
    }
    return $db;
  }
}
?>