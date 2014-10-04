<?php
header ("Content-type: text/html; charset=utf-8");
require '../class/validator.class.php';
//получаю данные регистрации (act=reg) и авторизации (act=login)
/*
foreach ($_GET as $key => $value) {
	$data[$key] = $value;
}
*/

//провожу валидацию полученных по аякс данных
try {
  if (!Validator::validAction($_GET)) {
    throw new Exception("I don't know what to do whith this.");
    return false;
  };
  $validator = new Validator();
  $validDates = $validator->validDates($_GET);
  
  
  
  $response = $validDates;
} catch(Exception $e) {
  //что-то не так
  $response = $e->getMessage();
}

//анализ и ответ
print_r($response);
?>