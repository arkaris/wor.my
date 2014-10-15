<?php
header ("Content-type: text/html; charset=utf-8");
if (!empty($_COOKIE['sid'])) {
  // check session id in cookies
  session_id($_COOKIE['sid']);
}
session_start();
require_once 'classes/Auth.class.php';
require_once './classes/Schedule.class.php';
include './rooms/room_list.php';

include 'pieces/header.php';
include 'pieces/message.php';
include 'pieces/second_navigation.php';

$day = $_GET['day'];
if (!$day) $day = time();
include './pieces/schedule_page.php';

include './pieces/footer.php';
?>
