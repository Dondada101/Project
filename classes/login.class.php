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
    public function getuser($email,$pw){
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
            $sqladmin='SELECT apassword FROM aadmin WHERE aemail=:aemail';
            $stmtadmin=$this->connect()->prepare($sqladmin);
            $stmtadmin->bindParam('aemail',$email);
            $stmtadmin->execute();
            $pwhashed1=$stmtadmin->fetchAll(PDO::FETCH_ASSOC);
            $checkpwd1=password_verify($pw,$pwhashed1[0]["apassword"]);
            echo $checkpwd1.$email;
            if($checkpwd1 == false){
                $stmtadmin=null;
                header("location:../index.php?error=wrongcredentiials1");
                exit(); 
               }elseif($checkpwd1==true){
                $stmtadmin1 = $this->connect()->prepare("SELECT * FROM aadmin WHERE aemail=:aemail ");
                $stmtadmin1->bindParam('aemail',$email);
                $stmtadmin1->execute();
                // if(!$stmt->execute(array($email,$pwhashed1[0]["apassword"]))){
                //     $stmt=null;
                //     header("location:../index.php?error=stmtfailed");
                //     exit(); 
                //    }
                   if($stmtadmin1->rowCount()==0){
                    $stmt=null;
                 header("location:../index.php?error=usernotfound1");
                 exit(); 
                }
                $admin=$stmtadmin1->fetchAll(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION["adminid"]=$admin[0]["aid"];
                $_SESSION['an']=$admin[0]['aname'];
                $stmtadmin1=null;
               }

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
            
            session_start();
            $_SESSION["uid"]=$user[0]["id"];
            $_SESSION['un']=$user[0]['uname'];
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