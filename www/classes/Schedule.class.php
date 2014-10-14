<?php
class Schedule {
  
  private $db;
  public $room;
  
  private $db_host = "localhost";
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
  
  public function getRoomSchedule($rid) {
    $query = "select room_id, time, user_id from rooms where room_id = :rid and time>now() and time<(now()+interval 2 week)";
    $sth = $this->db->prepare($query);
    $sth->execute(
      array(
        ":rid" => $rid
      )
    );
    
    $key = 0;
    while ($row = $sth->fetch()) {
      $result[$key]['rid'] = $row['room_id'];
      $result[$key]['time'] = strtotime($row['time']);
      $result[$key]['book'] = $row['user_id']=='' ? '' : ' booked';
      $key++;
    } unset($key);
    
    if (!$result) {
      $info = $sth->errorInfo();
      printf("Database error %d %s", $info[1], $info[2]);
      die();
    }
    $this->room = $result;
    return $result;
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