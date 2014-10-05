<?php
//установка русской кодировки
header ("Content-type: text/html; charset=utf-8");
session_start();
if (!empty($_COOKIE["email"]) && !empty($_COOKIE["password"])) {
    // check session in cookies
    $_SESSION['email'] = $_COOKIE["email"];
    $_SESSION['password'] = $_COOKIE["password"];
}

include 'pieces/header.php';
include 'pieces/message.php';
include 'pieces/registration.php';
include 'pieces/footer.php';
?>
