    </div><!--condent-->
    <div id="footer"> <span class="grey_text"> © 2014 Мир комнат </span> </div>
  </div><!--container-->
</body>
<?php
switch ($_SERVER['PHP_SELF']) {
  case '/reg.php':
    //echo '<script src="/js/validator.js"></script>';
  case '/index.php':
    //echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
    //echo '<script src="/js/ajax-form.js"></script>';
    break;
  
  default:
    echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
    echo '<script src="/js/ajax-form.js"></script>';
    break;
}
?>
</html>