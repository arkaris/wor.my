<?php
//получаю данные регистрации (act=reg) и авторизации (act=login)
foreach ($_GET as $key => $value) {
	$data[$key] = $value;
}
//провожу валидацию полученных по аякс данных
//анализ и ответ
print_r($data);
?>