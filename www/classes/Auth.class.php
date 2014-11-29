<?php
namespace Auth;

class User
{
    private $id;
    private $email;
    private $db;
    private $user_id;

    private $db_host = "localhost";
    private $db_name = "wor";
    private $db_user = "arkaris";
    private $db_pass = "testp";
/*
    private $db_host = "localhost";
    private $db_name = "grafin2a_wor";
    private $db_user = "grafin2a_wor";
    private $db_pass = "flame111";
*/
    private $is_authorized = false;

    public function __construct($email = null, $password = null)
    {
        $this->email = $email;
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public static function isAuthorized()
    {
        if (!empty($_SESSION["user_id"])) {
            return (bool) $_SESSION["user_id"];
        }
        return false;
    }
    
    public function confirmEmail($hash_code) {
        $query = "update users set hash = null where email = :email and hash = :hash limit 1";
        $sth = $this->db->prepare($query);
      
        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                array(
                    ":email" => $this->email,
                    ":hash" => $hash_code
                )
            );
            
            $this->db->commit();
            
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }

        if (!$result) {
            $info = $sth->errorInfo();
            printf("Database error %d %s", $info[1], $info[2]);
            die();
        }
        
        return $result;
    }
    
    public function confirmPassword($hash_code) {
      $query = 'select password, salt from forgot_pass where email = :email and hash = :hash limit 1';
      $sth = $this->db->prepare($query);
      
      $sth->execute(
        array(
          ":email" => $this->email,
          ":hash" => $hash_code
        )
      );
      
      $row = $sth->fetch();
      if (!$row) {
          return false;
      }
      
      $query = 'update users set password = :password, salt = :salt where email = :email limit 1';
      $sth = $this->db->prepare($query);
      try {
        $this->db->beginTransaction();
        $result = $sth->execute(
          array(
            ":password" => $row['password'],
            ":salt" => $row['salt'],
            ":email" => $this->email
          )
        );
        $this->db->commit();
      } catch (\PDOException $e){
        $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
      }
      if (!$result) {
          $info = $sth->errorInfo();
          printf("Database error %d %s", $info[1], $info[2]);
          die();
      }
      
      return $result;
    }
    
    public function refreshPassword($password) {
      $user_exists = $this->getSalt($this->email);
      
      if (!$user_exists) {
        throw new \Exception("User not exists: " . $this->email, 1);
      }
      
      $query = 'replace into forgot_pass (email, password, salt, hash)
            values (:email, :password, :salt, :hash)';
        $hashes = $this->passwordHash($password);
        $sth = $this->db->prepare($query);
        
        $hash_code = rand(100000000, 999999999);
        $sub = 'forgot_password';
        $mailParams = array(
          to => $this->email,
          hash_code => $hash_code
        );
        $mail = new \Mail\EasyMail($sub, $mailParams);

        try {
            $this->db->beginTransaction();
            
            $result = $sth->execute(
                array(
                    ':email' => $this->email,
                    ':password' => $hashes['hash'],
                    ':salt' => $hashes['salt'],
                    ':hash' => $hash_code
                )
            );
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }
        
        if (!$mail->send()) {
            $this->db->rollback();
            throw new \Exception("Can't send email to: " . $this->email, 1);
        } else {
           $this->db->commit();
        }

        if (!$result) {
            $info = $sth->errorInfo();
            printf("Database error %d %s", $info[1], $info[2]);
            die();
        }
        
        

        return $result;
    }
    
    public function passwordHash($password, $salt = null, $iterations = 10)
    {
        $salt || $salt = uniqid();
        $hash = md5(md5($password . md5(sha1($salt))));

        for ($i = 0; $i < $iterations; ++$i) {
            $hash = md5(md5(sha1($hash)));
        }

        return array('hash' => $hash, 'salt' => $salt);
    }

    public function getSalt($email) {
        $query = "select salt from users where email = :email limit 1";
        $sth = $this->db->prepare($query);
        $sth->execute(
            array(
                ":email" => $email
            )
        );
        $row = $sth->fetch();
        if (!$row) {
            return false;
        }
        return $row["salt"];
    }

    public function authorize($email, $password, $remember=false)
    {
        $query = "select id, email from users where
            email = :email and password = :password and hash is null limit 1";
        $sth = $this->db->prepare($query);
        $salt = $this->getSalt($email);

        if (!$salt) {
            return false;
        }

        $hashes = $this->passwordHash($password, $salt);
        $sth->execute(
            array(
                ":email" => $email,
                ":password" => $hashes['hash'],
            )
        );
        $this->user = $sth->fetch();
        
        if (!$this->user) {
            $this->is_authorized = false;
        } else {
            $this->is_authorized = true;
            $this->user_id = $this->user['id'];
            $this->saveSession($remember);
        }

        return $this->is_authorized;
    }

    public function logout()
    {
        if (!empty($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);
        }
    }
    
    public function saveSession($remember = true, $http_only = false, $days = 7)
    {
        $_SESSION["user_id"] = $this->user_id;

        if ($remember) {
            // Save session id in cookies
            $sid = session_id();

            $expire = time() + $days * 24 * 3600;
            $domain = ""; // default domain
            $secure = false;
            $path = "/";

            $cookie = setcookie("sid", $sid, $expire, $path, $domain, $secure, $http_only);
        }
    }

    public function create($email, $password, $username, $phone = null) {
        $user_exists = $this->getSalt($email);

        if ($user_exists) {
            throw new \Exception("User exists: " . $email, 1);
        }
        
        $query = 'insert into users (email, password, salt, username, hash, phone)
            values (:email, :password, :salt, :username, :hash, :phone)';
        $hashes = $this->passwordHash($password);
        $sth = $this->db->prepare($query);
        
        $hash_code = rand(100000000, 999999999);
        $sub = 'confirm_email';
        $mailParams = array(
          to => $email,
          hash_code => $hash_code
        );
        $mail = new \Mail\EasyMail($sub, $mailParams);

        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                array(
                    ':email' => $email,
                    ':password' => $hashes['hash'],
                    ':salt' => $hashes['salt'],
                    ':username' => $username,
                    ':hash' => $hash_code,
                    ':phone' => $phone
                )
            );
            
            $this->db->commit();
            
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }

        if (!$result) {
            $info = $sth->errorInfo();
            printf("Database error %d %s", $info[1], $info[2]);
            die();
        }
        
        if (!$mail->send()) {
          $this->db->rollback();
          throw new \Exception("Can't send email to: " . $email, 1);
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
