<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
  if (isset($_POST['action']) && $_POST['action'] === 'verify_email' && isset($_POST['email'])) {
    $email=htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
  //$pw=htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');
  require "../classes/conn.class.php";
  require "../classes/login.class.php";
  require "../classes/logctrl.class.php";
  $su=new Logctrl($email);
  //echo $email;
  $su->fPassword();
  echo 'Success';
  //header("location: ../verifyUser.php");
}else if (isset($_POST['user_code'])) { 
  //echo "VCode block executed";
  $vCode = htmlspecialchars($_POST['user_code'], ENT_QUOTES, 'UTF-8'); 
  require "../classes/conn.class.php";
  require "../classes/login.class.php";
  require "../classes/logctrl.class.php";
  //echo "Type: " . gettype($vCode) ."Received".$vCode;
  $apiTwoFactor=new Login();
  if ($apiTwoFactor->verifyCode($vCode)) {
     //echo "Verification successful! Access granted."; 
     $apiTwoFactor->clearCode();
     echo 'Verified';
     exit();
     } else { 
      echo "Verification failed. Please try again.";
   } 
    
  }else if (isset($_POST['new_password']) && isset($_POST['confirm_password']) && isset($_POST['email'])) { 
    //echo "CP block executed";
    $newPassword = htmlspecialchars($_POST['new_password'], ENT_QUOTES, 'UTF-8');
    $confirmPassword = htmlspecialchars($_POST['confirm_password'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); 
    if ($newPassword === $confirmPassword) { 
      require "../classes/conn.class.php"; 
      require "../classes/login.class.php";
      require "../classes/logctrl.class.php"; 
      $su = new Logctrl($email); 
      $su->updatePassword($newPassword); 
      // Assumes `updatePassword` method exists in `Logctrl` 
      echo 'Password Changed'; 
    } else {
       echo 'Passwords do not match';
       } 
      }
}
