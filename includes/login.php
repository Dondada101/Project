<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
  $email=htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
  $pw=htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');
  require "../classess/conn.class.php";
  require "../classess/login.class.php";
  require "../classess/logctrl.class.php";
  $su=new Logctrl($email,$pw);
  $su->login();
  header("location: ../index.php");
}