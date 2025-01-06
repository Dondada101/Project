<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $userCode=htmlspecialchars($_POST['user_code'],ENT_QUOTES,'UTF-8');
  require "../classes/conn.class.php";
  require "../classes/login.class.php";
  require "../classes/logctrl.class.php";
  $apiTwoFactor=new Login();
  if ($apiTwoFactor->verifyCode($userCode)) {
     echo "Verification successful! Access granted."; 
     $apiTwoFactor->clearCode();
     header("location: ../index.php");
     } else { 
      echo "Verification failed. Please try again.";
   } 
  }