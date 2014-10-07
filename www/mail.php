<?php
include 'classes/EasyMail.class.php';
$sub = 'test';
$mailParams = array(
  to => 'myachkovd@mail.ru'
);

$mail = new Mail\EasyMail($sub, $mailParams);
if ($mail -> send()) echo 'ok';
else echo 'bad';
?>