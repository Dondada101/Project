<?php
require 'vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use Kinde\TwoFactorAuth\TwoFactorAuth;

class Login extends Conn {

    private $twoFactorAuth;

    protected function getuser($email,$pw){
        $vCode=generateCode();
        $stmt = $this->connect()->prepare("SELECT upassword FROM users WHERE email=?;");
        
        if(!$stmt->execute(array($email))){
         $stmt=null;
         header("location:../index.php?error=stmtfailed");
         exit(); 
        }
        if($stmt->rowCount()==0){
            $stmt=null;
         header("location:../index.php?error=usernotfound");
         exit(); 
        }

        $pwhashed=$stmt->fetchAll(PDO::FETCH_ASSOC);
       // $banned=$pwhashed[0]["blocked"];
       
        $checkpwd=password_verify($pw,$pwhashed[0]["upassword"]);

        if($checkpwd == false){
            $stmt=null;
            header("location:../index.php?error=wrongcredentiials");
            exit(); 
           }elseif($checkpwd==true){
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email=? AND upassword=?;");
            if(!$stmt->execute(array($email,$pwhashed[0]["upassword"]))){
                $stmt=null;
                header("location:../index.php?error=stmtfailed");
                exit(); 
               }
               if($stmt->rowCount()==0){
                $stmt=null;
             header("location:../index.php?error=usernotfound1");
             exit(); 
            }
            $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            sendMail($email,$vCode);
            session_start();
            $_SESSION["userid"]=$user[0]["id"];
            $_SESSION['un']=$user[0]['uname'];
            $stmt=null;
           }
        
           $stmt=null;
     }
    
     public function sendMail($email, $verification_code){
    $mail = new PHPMailer(true);
    $verification_code=generateCode();

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lisledon944@gmail.com';                     //SMTP username
        $mail->Password   = 'YOUR_PASSWORD_SHOULD_GO_HERE';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('lisledon944@gmail.com', 'CodingShodingWithNJ');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = "Thanks for Registering with us. To activate your account click $verification_code";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo json_encode(['status' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    }
}

    public function generateCode(){
        return rand(100000, 999999);
 }
}