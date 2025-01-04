<?php

class Login extends Conn {

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
            session_start();
            $_SESSION["userid"]=$user[0]["id"];
            $_SESSION['un']=$user[0]['uname'];
            $stmt=null;
           }
        
           $stmt=null;
     }
  
}