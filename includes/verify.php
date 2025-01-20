<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $userCode=htmlspecialchars($_POST['user_code'],ENT_QUOTES,'UTF-8');
  require "../classes/conn.class.php";
  require "../classes/login.class.php";
  require "../classes/logctrl.class.php";
  //echo "Type: " . gettype($userCode) ."Received".$userCode;
  $apiTwoFactor=new Login();
  if ($apiTwoFactor->verifyCode($userCode)) {
     //echo "Verification successful! Access granted."; 
     $apiTwoFactor->clearCode();
     session_start();
     $_SESSION['Connect']='Login verified';
     header("location: ../index.php");
     exit();
     } else { 
      echo "Verification failed. Please try again.";
   } 
  }