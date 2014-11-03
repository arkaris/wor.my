<?php
header ("Content-type: text/html; charset=utf-8");
if (!empty($_COOKIE['sid'])) {
  session_id($_COOKIE['sid']);
}
session_start();
require_once 'classes/Auth.class.php';

include 'pieces/header.php';
include 'pieces/message.php';
include 'pieces/second_navigation.php';
?>
<div id="global_map" style="background-color: rgb(229, 227, 223); overflow: hidden; display: block;">
<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=9UtjlPQkbFkDvXZmo35mi2ikAB2_CsPP"></script>
</div>
<?php
include 'pieces/footer.php';
?>