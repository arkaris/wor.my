<?php 
//установка русской кодировки 
header ("Content-type: text/html; charset=utf-8"); 
if (!empty($_COOKIE['sid'])) { 
  // check session id in cookies 
  session_id($_COOKIE['sid']); 
} 
session_start(); 
require_once 'classes/Auth.class.php'; 

 
include 'pieces/header.php'; 
include 'pieces/message.php'; 
include 'pieces/second_navigation.php';


//test soon
include 'pieces/footer.php'; 
?> 
