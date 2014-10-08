1 <?php 
2 //установка русской кодировки 
3 header ("Content-type: text/html; charset=utf-8"); 
4 if (!empty($_COOKIE['sid'])) { 
5   // check session id in cookies 
6   session_id($_COOKIE['sid']); 
7 } 
8 session_start(); 
9 require_once 'classes/Auth.class.php'; 
10 
 
11 include 'pieces/header.php'; 
12 include 'pieces/message.php'; 
15 include 'pieces/footer.php'; 
16 ?> 
