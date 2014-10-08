<!DOCTYPE html>
<html style="" prefix="og: http://ogp.me/ns#" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Мир комнат</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=900, maximum-scale=0.8, minimum-scale=0.2, user-scalable=yes">
  <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
</head>
<body>
  <div id="container">
    <div class="header main_header clearfix">
      <?php if (Auth\User::isAuthorized()): ?>
      <div class="nav_icon nav_icon_left i1" onclick = logoutButton.click()>
        <div class="icon"> </div>
        <a>Выйти</a>
        <form class="ajax" method="post" action="./ajax.php">
          <input type="hidden" name="act" value="logout">
          <button type="submit" id="logoutButton" style="display:none;"></button>
        </form>
      <?php else: ?>
      <div class="nav_icon nav_icon_left i1">
        <div class="icon"> </div>
        <a href="./reg.php">Войти</a>
        <?php endif; ?>
        
      </div>
      <div class="nav_icon nav_icon_left i2 auth">
        <div class="icon"> </div>
<<<<<<< HEAD
        <a href="./call_us.php">Позвоните нам</a>
=======
        <a href="./call_as.php">Позвоните нам</a>
>>>>>>> 49f72b9091a7acf89da58da575d472c9de7768e1
      </div>
      <div id="site_logo" class="site_logo_ru"> <a href="./"></a> </div>
      <div class="nav_icon nav_icon_right i3">
        <div class="icon"> </div>
        <a href="./certificate.php">сертификаты</a>
      </div>
      <div class="nav_icon nav_icon_right i4">
        <div class="icon"> </div>
        <a href="./franchise.php">Франшиза</a>
      </div>
    </div>
    <div class="content">
