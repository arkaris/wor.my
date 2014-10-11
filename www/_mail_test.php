<?php
include "./classes/EasyMail.class.php";

$sub = 'confirm_email';
$param = array(
  to => 'myachkovd@mail.ru',
  hash_code => '123'
);
$mail = new Mail\EasyMail($sub, $param);
$mail->send();
?>