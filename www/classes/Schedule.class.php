<?php
class Schedule {
  
  private $db;
  public $room;
  public $day;
  public $data;

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
    $query = "select room_id, time, price, user_id from rooms where room_id = :rid and time>now() and time<(now()+interval 2 week)";
    $sth = $this->db->prepare($query);
    $sth->execute(
      array(
        ":rid" => $rid
      )
    );
    
    $key = 0;
    while ($row = $sth->fetch()) {
      //$result[$key]['rid'] = $row['room_id'];
      $result[$key]['time'] = strtotime($row['time']);
      $result[$key]['price'] = $row['price'];
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
  
  public function getDateSchedule($day) {
    $query = "select room_id, time, price, user_id from rooms where time>:today and time<(:today+interval 1 day)";
    $sth = $this->db->prepare($query);
    $sth->execute(
      array(
        ":today" => date('Y-m-d 00:00:00',$day)
      )
    );
    
    $key = 0;
    while ($row = $sth->fetch()) {
      $result[$key]['rid'] = $row['room_id'];
      $result[$key]['time'] = strtotime($row['time']);
      $result[$key]['price'] = $row['price'];
      $result[$key]['book'] = $row['user_id']=='' ? '' : ' booked';
      $key++;
    } unset($key);
    $this->day = $result;
    
    if (!$result) {
      $info = $sth->errorInfo();
      printf("Database error %d %s", $info[1], $info[2]);
      die();
    }
    //print_r($result);
    return $result;
  }
  
  public function getUserSchedule($uid) {
    $query = "select room_id, user_id, time from rooms where user_id=:uid ORDER BY time DESC";
    $sth = $this->db->prepare($query);
    $sth->execute(
      array(
        ":uid" => $uid
      )
    );
    
    $key = 0;
    while ($row = $sth->fetch()) {
      $result[$key]['rid'] = $row['room_id'];
      $result[$key]['time'] = strtotime($row['time']);
      $result[$key]['user_id'] = $row['user_id'];
      $key++;
    } unset($key);
    $this->data = $result;
    return $result;
  }
  
  public function book($rid, $time, $remove=false) {
    $uid = $_SESSION["user_id"];
    $time = date('Y-m-d H:i:s',$time);
    
    $query = "select user_id from rooms where room_id = :rid and time = :time limit 1";
    $sth = $this->db->prepare($query);
    $sth->execute(
      array(
        ":rid" => $rid,
        ":time" => $time
      )
    );
    
    $result = $sth->fetch();
    if ( $remove?$result['user_id']!==$uid:!empty($result['user_id']) ) return false;
    
    if ($remove) {
      $query = "update rooms set user_id = null where user_id = :uid and room_id = :rid and time = :time limit 1";
    } else {
      $query = "update rooms set user_id = :uid where room_id = :rid and time = :time limit 1";
    }
    $sth = $this->db->prepare($query);
    try {
      $this->db->beginTransaction();
      $result = $sth->execute(
        array(
          ':uid' => $uid,
          ':rid' => $rid,
          ':time' => $time
        )
      );
      $this->db->commit();
    } catch(PDOException $e) {
      $this->db->rollback();
      echo "Database error: " . $e->getMessage();
      die;
    }
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