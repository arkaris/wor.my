<?php
namespace Mail;

class EasyMail
{
  private $to;
  private $subject;
  private $message;
  private $headers = "Content-type: text/html; charset=utf-8\r\n From: Birthday Reminder <birthday@example.com>\r\n";
  private $from = 'worldofrooms.ru';
  public $result = false;
  
  public function __construct($sub, $param) {
    //$to<=$param.to
    //$subject<-$param.sub
    //$message<-$param.sub+$param.hash
    //$headers
    
    switch ($sub) {
      case 'confirm_email':
        confirm_email($param);
        break;
        
      case 'test':
        $this->test($param);
        break;
      
      default:
        
        break;
    }
  }
  
  private function confirm_email($param) {
    
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
    echo '$to: '.$this->to.'<br>';
    echo '$subject: '.$this->subject.'<br>';
    echo '$message: '.$this->message.'<br>';
    echo '$headers: '.$this->headers.'<br>';
    
    $result = mail($this->to, $this->subject, $this->message, $this->headers);
    return $result;
  }
}
?> 