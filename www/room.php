<?php
header ("Content-type: text/html; charset=utf-8");
if (!empty($_COOKIE['sid'])) {
  // check session id in cookies
  session_id($_COOKIE['sid']);
}
session_start();
require_once './classes/Auth.class.php';
require_once './classes/Schedule.class.php';
include './rooms/room_list.php';

include 'pieces/header.php';
$rid = $_GET['rid'];
for ($i=0; $i<count($roomes); $i++) {
  if ($roomes[$i]['rid']==$rid) {
    $room = $roomes[$i];
    break;
  }
}
if ($room) include './pieces/room_page.php';
else echo'<p>Этой комнаты не найдено</p>';
?>



</div>

</div>

 
<div class="ot">
<div class="ot-box"><img src="o1.jpg" alt="" /><p>В период нашего сотрудничества, все обязательства со стороны РА РекМедиа выполнялись своевременно и в полном объеме. Мы остались довольны работой и результатами проведенной рекламной кампании. Спасибо!</p></div>
<div class="ot-box"><img src="o2.jpg" alt="" /><p>Выражаю благодарность РА РекМедиа за отличную работу и возможность достижения нами поставленных целей в сфере развития нашего бизнеса. Благодаря вам увеличилось количество гостей, посещающих наше заведение. Спасибо огромное Вячеславу и Михаилу за помощь!</p></div>
<div class="ot-box"><img src="o3.jpg" alt="" /><p>В период нашего сотрудничества, все обязательства со стороны РА РекМедиа выполнялись своевременно и в полном объеме. Мы остались довольны работой и результатами проведенной рекламной кампании. Спасибо!</p></div>
<div class="ot-box"><img src="o4.jpg" alt="" /><p>Выражаю благодарность РА РекМедиа за отличную работу и возможность достижения нами поставленных целей в сфере развития нашего бизнеса. Благодаря вам увеличилось количество гостей, посещающих наше заведение. Спасибо огромное Вячеславу и Михаилу за помощь!</p></div> 
</div>
 
<div class="arrows">
<div class="arrows1"><a href="/"></a></div>
<div class="arrows2"><a href="/"></a></div>
</div>
        

    

</body>
</html>
