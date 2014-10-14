<?php
include './classes/Schedule.class.php';

$shed = new Schedule;
$shed->getRoomSchedule(2);

//print_r($shed->room['38']);

echo date('c',$shed->room['38']['time']);
echo '<br>';
$t1 = date('B', $shed->room['38']['time'] - strtotime('01:00:00'))/10;
echo $t1;
echo '<br>';
echo date('c',$shed->room['38']['time']);
echo '<br>';
echo date('B',1413489600);
echo '<br>';
echo date('B',strtotime('00:00:00'));
echo '<br>';
echo strtotime('1970-01-01T01:00:00+04:00');
echo '<br>';
echo date('c',strtotime('01:00:00'));
?>