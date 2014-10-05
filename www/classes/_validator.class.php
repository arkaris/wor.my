<?php
//namespace validator;

class Validator {
  
  public function __construct(){}
  
  public function __destruct(){}
  
  public static function validAction($dates) {
    switch ($dates['act']) {
      case 'login':
        return 'login';
        break;
      
      case 'reg':
        return 'reg';
        break;
      
      default:
        return false;
        break;
    }
  }
  
  public function validDates($dates) {
    //стандартная проверка
    foreach ($dates as $key => $value) {
      //убираю теги и скрипты
      $tmp = stripslashes($value);
      $tmp = htmlspecialchars($tmp);
      if ($value !== $tmp) throw new Exception("\"$value\" похоже на скрипт, замените");
      //убираю пустые параметры
      //if (is_null($value) || $value == 'undefinite') unset($dates[$key]);
    }
    
    switch ($dates['act']) {
      case 'reg':
        $validDates['username'] = $this->validUsername($dates['username']);
        $validDates['phone'] = $this->validPhone($dates['phone']);
        
      case 'login':
        $validDates['email'] = $this->validEmail($dates['email']);
        $validDates['password'] = $this->validPassword($dates['password']);
        break;
        
      default:
        $validDates['act'] = $dates['act'];
        break;
    }
    
    return $validDates;
  }
  
  public function validUsername($data) {
    if (!$this->validMinLength($data, 1)) throw new Exception("Имя не заполнено");
    if (!$this->validMaxLength($data, 16)) throw new Exception("Слишком длинное имя.");
    return $data;
  }
  
  public function validPhone($data) {
    if (!$this->validMaxLength($data, 32)) throw new Exception("Слишком длинный телефон.");
    return $data;
  }
  
  public function validEmail($data) {
    if (!$this->validMinLength($data, 1)) throw new Exception("Email не заполнен");
    if (!$this->validMaxLength($data, 255)) throw new Exception("Слишком длинный email.");
    return $data;
  }
  
  public function validPassword($data) {
    if (!$this->validMinLength($data, 1)) throw new Exception("Пароль не заполнен");
    if (!$this->validMaxLength($data, 64)) throw new Exception("Слишком длинный пароль.");
    return $data;
  }
  
  private function validMinLength($data, $min) {
    if (strlen($data) < $min) return false;
    return true;
  }
  
  private function validMaxLength($data, $max) {
    if (strlen($data) > $max) return false;
    return true;
  }
}
?>