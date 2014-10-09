<?php
namespace DataBase;

class Db {
  private $db_host = "localhost";//worldofroomsru.ipagemysql.com
  private $db_name = "wor";
  private $db_user = "arkaris";
  private $db_pass = "testp";
  
  private $db;
/*
  private $db_host = "localhost";
  private $db_name = "grafin2a_wor";
  private $db_user = "grafin2a_wor";
  private $db_pass = "flame111";
*/
  
  public function construct() {
    try {
      $this->db = new \PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    } catch (\PDOException $e) {
      echo "database error: " . $e->getmessage();
      die();
    }
  }
}
?>