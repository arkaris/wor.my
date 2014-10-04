<?php

namespace Auth;

class User
{
    private $password;
    private $email;
    private $db;

    private $db_host = "localhost";
    private $db_name = "wor";
    private $db_user = "arkaris";
    private $db_pass = "testp";

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
        if (!empty($_SESSION["email"]) && !empty($_SESSION["password"])) {
            return (bool) $_SESSION["email"];
        }
        return false;
    }

    public function passwordHash($password, $salt = null, $iterations = 1)
    {
        $salt || $salt = uniqid();
        $hash = $password . md5(sha1($salt));

        for ($i = 0; $i < $iterations; $i++) {
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
        $query = "select email, password from users where
            email = :email and password = :password limit 1";
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
            $this->password = $this->user['password'];
            $this->saveSession($remember);
        }

        return $this->is_authorized;
    }

    public function logout()
    {
        if (!empty($_SESSION["email"]) && !empty($_SESSION["password"])) {
          unset($_SESSION["email"]);
          unset($_SESSION["password"]);
        }
    }

    public function saveSession($remember = false, $http_only = true, $days = 7)
    {
        $_SESSION["email"] = $this->email;
        $_SESSION["password"] = $this->password;

        if ($remember) {
            // Save session in cookies
            $email = $this->email;
            $password = $this->password;

            $expire = time() + $days * 24 * 3600;
            $domain = ""; // default domain
            $secure = false;
            $path = "/";

            setcookie("email", $email, $expire, $path, $domain, $secure, $http_only);
            setcookie("password", $email, $expire, $path, $domain, $secure, $http_only);
        }
    }

    public function create($email, $password) {
        $user_exists = $this->getSalt($email);

        if ($user_exists) {
            throw new \Exception("User exists: " . $email, 1);
        }

        $query = "insert into users (email, password, salt)
            values (:email, :password, :salt)";
        $hashes = $this->passwordHash($password);
        $sth = $this->db->prepare($query);

        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                array(
                    ':email' => $username,
                    ':password' => $hashes['hash'],
                    ':salt' => $hashes['salt'],
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
