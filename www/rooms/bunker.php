<?php
/*
 * rname - Название комнаты
 * rid - id комнаты в БД
 * rstatus - ?
 * rmin, rmax - сколько человек инрает
 * rlogo - маленькое лого с index
 * rimg - фон с index
 * rphone, rmail, raddres, rmetro - ну понятно
 * rphoto - фото комнаты с room
 * rimgbig - фон с room
 * rlogobig - лого с room
 * 
*/
return array(
'rname' => 'Бункер',
'rid' => 2,//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

'rstatus' => true,
'rmin' => 2,
'rmax' => 4,
'rlogo' => './img/3.png',
'rimg' => './img/3.jpg',
'rphone' => '+7-916-478-94-11',
'rmail' => 'strana@worldofrooms.ru',
'raddres' => 'ул. Бауманская, д. 11, лофт 7',

'rmetro' => 'Беговая',
'rphoto' => array(
  './img/k1.jpg', './img/k2.jpg', './img/k3.jpg'
),
'rimgbig' => './img/8bf852e3d8ed71f3e0279bf9534bb0c0.jpg',
'rlogobig' => './img/big-ico-1.png',
'rdesc' => 'Постапокалиптическое приключение в стиле Фоллаута. '.
  'Мир просыпается после ядерной катастрофы, вы — последнее поколение выживших в подземном убежище людей. '.
  'Пришло время выбираться наружу.',
'rmapmini' => './img/staticmap',
'continuance' => '60 минут',
'age' => 'от 10 лет с родителями, от 14 без'
);
?>