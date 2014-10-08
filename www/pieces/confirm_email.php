<?php
$email = trim(htmlspecialchars(stripcslashes($_GET['email'])));
$hash_code = trim(htmlspecialchars(stripcslashes($_GET['hash'])));
if($email && $hash_code) {
  $user = new Auth\User($email);
  if ($user->isConfirmed($hash_code)) {
    echo '<p>Спасибо за подтверждение.</p>';
  } else {
    echo '<p>Ссылка неверна или устарела.</p>';
  }
} else {
  echo '<p>Вам на почту выслано письмо со ссылкой для подтверждения регистрации.</p>';
}

?>