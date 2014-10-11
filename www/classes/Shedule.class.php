<?php
class Shedule {
  
  private $db;
  private $shed = array();
  
  private $db_host = "localhost";//worldofroomsru.ipagemysql.com
  private $db_name = "wor";
  private $db_user = "arkaris";
  private $db_pass = "testp";
/*
  private $db_host = "localhost";//worldofroomsru.ipagemysql.com
  private $db_name = "grafin2a_wor";
  private $db_user = "grafin2a_wor";
  private $db_pass = "flame111";
*/
	
	function __construct() {
		$this->connectdb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
  }
  
  public function __destruct()
  {
    $this->db = null;
  }
  
  public function getRoomShedule($rid) {
    $query = "select date, time, room_id from rooms where room_id = :rid and date >= :mindate and date < :maxdate";
    $sth = $this->db->prepare($query);
    
    $mindate = date(Ymd);
    $maxdate = date(Ymd, strtotime('+2 week'));

    $this->db->beginTransaction();
    $sth->execute(
      array(
        ":rid" => $rid,
        ":mindate" => $mindate,
        ":maxdate" => $maxdate
      )
    );
    
    foreach ($sth->fetch() as $key => $value) {
      print_r($key);
      echo '---';
      print_r($value);
      echo '<br>';
    }
    /*
    $result = $sth->fetch();
    
    if (!$result) {
      $info = $sth->errorInfo();
      printf("Database error %d %s", $info[1], $info[2]);
      die();
    }
    
    print_r($result);
    return result;
    */
  }
  
  public function connectdb($db_name, $db_user, $db_pass, $db_host = "localhost")
  {
    try {
      $this->db = new \pdo("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    } catch (\pdoexception $e) {
      echo "database error: " . $e->getmessage();
      die();
    }
    $this->db->query('set names utf8');

    return $this;
  }
}

?>