<?php

namespace Auth;

class User {
  
  private $id,
          $username,
          $db,
          $user_id;
          
  private $db_host = 'localhost',
          $db_name = 'testdb',
          $db_user = 'testu',
          $db_pass = 'testp';
          
  private $is_autorized = false;
  
  public function __construct($username = null, $password = null) {
    $this->username = $username;
    $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
  }
  
  public function __destruct() {
    $this->db = null;
  }
  
  
  public static function isAutorized() {
    if (!empty($_SESSION['user_id'])) return (bool) $_SESSION['user_id'];
    return false;
  }
  
  public function passwordHash($password, $salt=null, $iterations = 1) {
    $salt || $salt = uniqid();
    $hash = md5($password).$salt;
    for ($i = 0; $i < $iterations; $i++) $hash = md5($hash);
    
    return array('hash'=>$hash, 'salt'=>$salt); 
  }
  
  public function getSalt($username) {
    $query = "select salt from users where username = :username limit 1";
    $sth = $this->db->prepare($query);
    $sth->execute( array(":username"=>$username) );
    $row = $sth->fetch();
    
    if (!$row) return false;
    return $row['salt'];
  }
  
  public function autorize($username, $password, $remember = false) {
    $query = "select id, username from users where username = :username and password = :password limit 1";
    $sth = $this->db->prepare($query);
    $salt = $this->getSalt($username);
    
    if (!$salt) return false;
    
    $hashes = $this->passwordHash($password, $salt);
    $sth->execute( array(":username"=>$username,
                         ":password"=>$hashes['hash']));
    $this->user = $sth->fetch();
    
    if(!$this->user) {
      $this->is_autorized = false;
    } else {
      $this->is_autorized = true;
      $this->user_id = $this->user['id'];
      $this->saveSession($remember);
    }
    
    return $this->is_autorized;
  }
  
  public function logout() {
    if (!empty($_SESSION['user_id'])) unset($_SESSION['user_id']);
  }
  
  public function saveSession($remember = false, $http_only = true, $days = 7) {
    $_SESSION['user_id'] = $this->user_id;
    
    if ($remember) {
      //save in cookies
      $sid = session_id();
      $expire = time() + $days*24*3600;
      $domain = "";
      $secure = false;
      $path = "/";
      
      $cookie = setcookie('sid', $sid, $expire, $path, $domain, $secure, $http_only); 
    }
  }
  
  public function create($username, $password) {
    $user_exists = $this->getSalt($username);
    
    if ($user_exists) throw new \Exception('User exists: '.$username, 1);
    
    $query = "insert into users (username, password, salt) values (:username, :password, :salt)";
    $hashes = $this->passwordHash($password);
    $sth = $this->db->prepare($query);
    
    try {
      $this->db->beginTransaction();
      $result = $sth->execute(array(':username' => $username,
                                    ':password' => $hashes['hash'],
                                    ':salt' => $hashes['salt']));
      $this->db->commit();
    } catch (\PDOException $e) {
      $this->db->rollback();
      echo "Database error: ".$e->getMessage();
      die;
    }
    
    return result;
  }
  
  public function connectdb($db_name, $db_user, $db_pass, $db_host = 'localhost') {
    try {
      $this->db = new \pdo("mysql:host=$dbhost;dbname=$dbname", $db_user, $db_pass);
    } catch (\pdoexception $e){
      echo "database error: ".$e->getMessage();
      die();
    }
    $this->db->query('set names utf-8');
    
    return $this;
  }
}

?>