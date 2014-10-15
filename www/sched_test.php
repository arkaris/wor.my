<?php
include './classes/Schedule.class.php';
$day = $_GET['day'];
if (!$day) $day = time();

$sched = new Schedule;
$sched->getDateSchedule($day);

echo date(time()+20*24*60*60);
?>