<?php
namespace Mail;

class EasyMail
{
  private $to;
  private $subject;
  private $message;
  private $headerz = "Content-type: text/html; charset=utf-8";
  //private $from = 'worldofrooms.ru';
  public $result = false;
  
  public function __construct($sub, $param) {
    
    switch ($sub) {
      case 'confirm_email':
        $this->confirm_email($param);
        break;
        
      case 'test':
        $this->test($param);
        break;
      
      default:
        
        break;
    }
  }
  
  private function confirm_email($param) {
    $this->to = $param['to'];
    $this->subject = 'subject';
    $link = 'arkaris.ru/wor/confirm.php?email='.$param['to'].'&hash='.$param['hash_code'];
    $this->message = "
    <html> 
      <head> 
          <title>title</title> 
      </head> 
      <body> 
          <p>Hello, world!!!</p>
          <p>Салют!</p>
          <a href=$link>Подтверждение регистрации</p>
      </body> 
    </html>";
    return true;
  }
  
  private function test($param) {
    $this->to = $param['to'];
    $this->subject = 'subject';
    $this->message = '
    <html> 
      <head> 
          <title>title</title> 
      </head> 
      <body> 
          <p>Hello, world!!!</p>
          <p>Салют!</p> 
      </body> 
    </html>';
    return true;
  }
  
  public function send() {
    $result = mail($this->to, $this->subject, $this->message, $this->headerz ."\r\n ".$this->from);
    return $result;
  }
}
?>