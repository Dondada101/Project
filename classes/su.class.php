<?php
class Su extends Conn {
    protected function setuser($uname,$email,$pw){
        $stmt = $this->connect()->prepare("INSERT INTO  users (uname,email,upassword) VALUES (?,?,?) ;");
        $phash=password_hash($pw,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($uname,$email,$phash))){
         $stmt=null;
         header("location:../index.php?error=stmtfailed");
         exit(); 
        }
           $stmt=null;
     }
     protected function checkUser($email) {
       try { 
        $pdo = $this->connect(); 
        $stmt = $pdo->prepare("SELECT email FROM users WHERE email = ?;");
         if (!$stmt->execute([$email])) {
           $stmt = null;
           header("Location: ../index.php?error=stmtfailed"); 
           exit(); 
          }
           $resultCheck = false;
            if ($stmt->rowCount() > 0) { 
              $resultCheck = true;
             }
              return $resultCheck; 
            } catch (Exception $e) { 
              echo "Error: " . $e->getMessage();
               return false;
               }
            }
    protected function getUID($email){
      $stmt=$this->connect()->prepare('SELECT id FROM users WHERE  email=?;');
      if(!$stmt->execute(array($email))){
          $stmt= null;
          header("location: ../index.php?error=emptyfields");
          exit();
      }
      if($stmt->rowCount()==0){
          $stmt= null;
          header("location: ../index.php?error=emptyfields");
          exit();
      }
      $profd=$stmt->fetchAll(PDO::FETCH_ASSOC);
      return $profd;
  }
}