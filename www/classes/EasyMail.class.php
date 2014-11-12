<?php
namespace Mail;

class EasyMail
{
  private $to;
  private $subject;
  private $message;
  private $headers = "Content-type: text/html; charset=utf-8";
  private $from = 'From: robot@worldofrooms.ru';
  public $result = false;
  
  public function __construct($sub, $param) {
    
    switch ($sub) {
      case 'confirm_email':
        $this->confirm_email($param);
        break;
        
      case 'forgot_password':
        $this->forgot_password($param);
        break;
      
      default:
        
        break;
    }
  }
  
  private function confirm_email($param) {
    $this->to = $param['to'];
    $this->subject = 'Подтверждение регистрации на worldofrooms.ru';
    $link = 'http://worldofrooms.ru/confirm.php?act=email&email='.$param['to'].'&hash='.$param['hash_code'];
    $this->message = '
    <html> 
      <head> 
          <title>title</title> 
      </head> 
      <body> 
          <p>Hello, world!!!</p>
          <p>Салют!</p>
          <a href='.$link.'>Подтверждение регистрации</a>
      </body> 
    </html>';
    return true;
  }
  
  private function forgot_password($param) {
    $this->to = $param['to'];
    $this->subject = 'Подтверждение смены пароля на worldofrooms.ru';
    $link = 'http://worldofrooms.ru/confirm.php?act=password&email='.$param['to'].'&hash='.$param['hash_code'];
    $this->message = '
    <html> 
      <head> 
          <title>title</title> 
      </head> 
      <body> 
          <p>Hello, world!!!</p>
          <p>Салют!</p>
          <a href='.$link.'>Подтверждение смены пароля</a>
      </body> 
    </html>';
    return true;
  }
  
  public function send() {
    $result = mail($this->to, $this->subject, $this->message, $this->headers ."\r\n".$this->from);
    return $result;
  }
}
?>