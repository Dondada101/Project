<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
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
}
