<?php
require '../vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
class Ignore{
  private $vCode;

    public function generateCode(){
        $this->vCode = rand(100000, 999999);
        $_SESSION['verification_code'] = $this->vCode;
       echo "Generated code: {$this->vCode}<br>";
 }
 function sendMail($email){
  $mail = new PHPMailer(true);
  $verification_code=rand(100000, 999999);

  try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'lisledon944@gmail.com';                     //SMTP username
      $mail->Password   = 'khrfowvhkmrqlcta';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      //Recipients
      $mail->setFrom('lisledon944@gmail.com', 'blah');
      $mail->addAddress($email);     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'I-Check';
      $mail->Body    = "Thanks for coming back to us. To log in enter this code {$this->vCode}";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      echo "Generatedb code: $this->vCode<br>";
      $mail->send();
      // echo 'Message has been sent';
  } catch (Exception $e) {
      echo json_encode(['status' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
  }
}
}