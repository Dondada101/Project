<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $uname=htmlspecialchars($_POST['uname'],ENT_QUOTES,'UTF-8');
    $email=htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $pw=htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');
    $cpw=$_POST['cpassword'];
    require "../classes/conn.class.php";
   require "../classes/su.class.php";
    require "../classes/suctrl.class.php";
    $su=new Suctrl($uname,$email,$pw,$cpw);
    $su->signup();
    header("location: ../login.php");
}