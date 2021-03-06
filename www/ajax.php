<?php
header ("Content-type: text/html; charset=utf-8");

require_once './classes/EasyMail.class.php';
require_once './classes/Auth.class.php';
require_once './classes/Schedule.class.php';
require_once './classes/AjaxRequest.class.php';

if (!empty($_COOKIE['sid'])) {
  //
  session_id($_COOKIE['sid']);
}
session_start();

class AuthorizationAjaxRequest extends AjaxRequest
{
  public $actions = array(
  "login" => "login",
  "logout" => "logout",
  "register" => "register",
  "forgotPass" => "forgotPass",
  "book" => "book",
  "unbook" => "unbook"
  );
  
  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      //Method Not Allowed
      //http_response_code(405);
      header("Allow: POST");
      $this->setFieldError("main", "Method Not Allowed");
      return;
    }
    setcookie("sid", "");
    
    $email = $this->getRequestParam("email");
    $password = $this->getRequestParam("password");
    $remember = !!$this->getRequestParam("remember-me");
    
    if (empty($email)) {
      $this->setFieldError("email", "Enter the email");
      return;
    }
    
    if (empty($password)) {
      $this->setFieldError("password", "Enter the password");
      return;
    }
    
    $user = new Auth\User();
    $auth_result = $user->authorize($email, $password, $remember);
    
    if (!$auth_result) {
      $this->setFieldError("password", "Invalid email or password");
      return;
    }
    
    $this->status = "ok";
    $this->setResponse("redirect", ".");
    $this->message = sprintf("Hello, %s! Access granted.", $email);
  }
  
  public function logout()
  {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      // Method Not Allowed
      //http_response_code(405);
      header("Allow: POST");
      $this->setFieldError("main", "Method Not Allowed");
      return;
    }
    
    setcookie("sid", "");
    
    $user = new Auth\User();
    $user->logout();
    
    $this->setResponse("redirect", "./reg.php");
    $this->status = "ok";
  }
  
  public function register()
  {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      // Method Not Allowed
      //http_response_code(405);
      header("Allow: POST");
      $this->setFieldError("main", "Method Not Allowed");
      return;
    }
    setcookie("sid", "");
    
    $username = $this->getRequestParam("username");
    $email = $this->getRequestParam("email");
    $phone = $this->getRequestParam("phone");
    $password1 = $this->getRequestParam("password1");
    $password2 = $this->getRequestParam("password2");
    
    if (empty($username)) {
      $this->setFieldError("username", "Enter the username");
      return;
    }
    
    if (empty($email)) {
      $this->setFieldError("email", "Enter the email");
      return;
    }
    
    if (empty($password1)) {
      $this->setFieldError("password1", "Enter the password");
      return;
    }
    
    if (empty($password2)) {
      $this->setFieldError("password2", "Confirm the password");
      return;
    }
    
    if ($password1 !== $password2) {
      $this->setFieldError("password2", "Confirm password is not match");
      return;
    }
    
    $user = new Auth\User();
    
    try {
      $new_user_id = $user->create($email, $password1, $username, $phone);
    } catch (\Exception $e) {
      $this->setFieldError("email", $e->getMessage());
      return;
    }
    //$user->authorize($email, $password1);
    
    $this->message = sprintf("Hello, %s! Thank you for registration.", $email);
    $this->setResponse("redirect", "./confirm.php");
    $this->status = "ok";
  }
  
  public function forgotPass() {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      // Method Not Allowed
      //http_response_code(405);
      header("Allow: POST");
      $this->setFieldError("main", "Method Not Allowed");
      return;
    }
    setcookie("sid", "");
    
    $email = $this->getRequestParam("email");
    $password1 = $this->getRequestParam("password1");
    $password2 = $this->getRequestParam("password2");
    
    if (empty($email)) {
      $this->setFieldError("email", "Enter the email");
      return;
    }
    
    if (empty($password1)) {
      $this->setFieldError("password1", "Enter the password");
      return;
    }
    
    if (empty($password2)) {
      $this->setFieldError("password2", "Confirm the password");
      return;
    }
    
    if ($password1 !== $password2) {
      $this->setFieldError("password2", "Confirm password is not match");
      return;
    }
    
    $user = new Auth\User($email);
    
    try {
      $new_user_id = $user->refreshPassword($password1);
    } catch (\Exception $e) {
      $this->setFieldError("email", $e->getMessage());
      return;
    }
    //$user->authorize($email, $password1);
    
    $this->message = sprintf("Hello, %s! Check your email.", $email);
    $this->setResponse("redirect", "./confirm.php");
    $this->status = "ok";
  }
    
  public function book($remove=false) {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      //Method Not Allowed
      //http_response_code(405);
      header("Allow: POST");
      $this->setFieldError("main", "Method Not Allowed");
      return;
    }
    
    if (!Auth\User::isAuthorized()){
      $this->setFieldError("main", "You are not authorized.");
      $this->setResponse("redirect", "./reg.php");
      return;
    }
    
    $time = $this->getRequestParam("time");
    $rid = $this->getRequestParam("rid");
    if (empty($time) || empty($rid) && $rid!=='0') {
        $this->setFieldError("main", "Not enaugh data.");
        return;
    }
    
    $sched = new Schedule();
    $book_result = $sched->book($rid, $time, $remove);
    
    if (empty($book_result)) {
      if ($remove) $this->setFieldError("main", "Time is free.");
      else $this->setFieldError("main", "Time is already booked.");
      return;
    }
    
    $this->status = "ok";
    if ($remove) {
      $this->message = sprintf("Room is unbooked.");
      $this->setResponse("redirect", "./user.php?act=book&rid=$rid&time=$time");
    } else {
      $this->message = sprintf("Room is booked at %s.", date('c',$time));
      $this->setResponse("redirect", "./user.php");
    }
  }
  
  public function unbook() {
    $this->book(true);
    return;
  }
}

$ajaxRequest = new AuthorizationAjaxRequest($_REQUEST);
$ajaxRequest->showResponse();
