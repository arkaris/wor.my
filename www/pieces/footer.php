    </div><!--condent-->
    <div id="footer"> <span class="grey_text"> © 2014 Мир комнат </span> </div>
  </div><!--container-->
</body>
<?php
switch ($_SERVER['PHP_SELF']) {
  case '/reg.php':
    echo '<script src="/js/validator.js"></script>';
    echo '<script src="/js/ajax.js"></script>';
    break;
  
  default:
    
    break;
}
?>
</html>