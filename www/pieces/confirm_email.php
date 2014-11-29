<?php
$email = trim(htmlspecialchars(stripcslashes($_GET['email'])));
$hash_code = trim(htmlspecialchars(stripcslashes($_GET['hash'])));
$act = trim(htmlspecialchars(stripcslashes($_GET['act'])));

if ($act == "email" && $email && $hash_code) {
  $user = new Auth\User($email);
  if ($user->confirmEmail($hash_code)) {
    echo '<p>Спасибо за подтверждение.</p>';
  } else {
    echo '<p>Ссылка неверна или устарела.</p>';
  }
} else if ($act == "password" && $email && $hash_code) {
  $user = new Auth\User($email);
  if ($user->confirmPassword($hash_code)) {
    echo '<p>Пароль успешно изменен.</p>';
  } else {
    echo '<p>Ссылка неверна или устарела.</p>';
  }
} else if ($_SERVER['HTTP_REFERER'] == 'http://worldofrooms.ru/reg.php') {
  echo '<p>Вам на почту выслано письмо со ссылкой для подтверждения.</p>';
} else {
  echo '<p>Добрый день</p>';
}
?>