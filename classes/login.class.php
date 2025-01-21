<?php
require '../vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
//use Kinde\TwoFactorAuth\TwoFactorAuth;
session_start();
class Login extends Conn {

    private $vCode;

    protected function generateCode(){
        $this->vCode = rand(100000, 999999);
        $_SESSION['verification_code'] = $this->vCode;
       // echo "Generated code: {$this->vCode}<br>";
 }
    protected function getuser($email,$pw){
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
            
            // session_start();
            // $_SESSION["userid"]=$user[0]["id"];
            // $_SESSION['un']=$user[0]['uname'];
            $stmt=null;
           }
        
           $stmt=null;
     }
    protected function getEmail($email){
        $stmt = $this->connect()->prepare("SELECT email FROM users WHERE email=?;");
        
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
        //echo "Emil exists".$email;
        // $email1=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $email1;
    }
     public function sendMail($email){
    $mail = new PHPMailer(true);
    $verification_code=rand(100000, 999999);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                     //SMTP username
        $mail->Password   = 'khrfowvhkmrqlcta';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('', 'blah');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'I-Check';
        $mail->Body    = "Thanks for coming back to us. To log in enter this code {$this->vCode}";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //echo "Generatedb code: $this->vCode<br>";
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo json_encode(['status' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    }
}

   
 public function verifyCode($userCode) { 
    return $userCode == $_SESSION['verification_code'];
 }
 public function clearCode() { 
    unset($_SESSION['verification_code']);
 }
}