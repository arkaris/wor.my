    </div><!--condent-->
    <div id="footer"> <span class="grey_text"> © 2014 Мир комнат </span> </div>
  </div><!--container-->
<?php

switch ($_SERVER['PHP_SELF']) {
  case '/reg.php':
    echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
    echo '<script src="./js/ajax-form.js"></script>';
    echo '<script src="./js/href_extender.js"></script>';
    echo '<script src="./js/showMe.js"></script>';
    break;
  /*case '/schedule.php':
  case '/room.php' :
    echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
    echo '<script src="./js/ajax-book.js"></script>';
    break;*/
  /*case '/index.php':
    echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
    echo '<script src="./js/ajax-form.js"></script>';
    break;*/
  
  default:
    echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
    echo '<script src="./js/ajax-form.js"></script>';
    echo '<script src="./js/href_extender.js"></script>';
    break;
}

?>
</body>
</html>