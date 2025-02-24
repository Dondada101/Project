<?php
class LogOut{
  public function adminLogout(){
    session_start();
    unset($_SESSION['adminid']);
    //session_destroy();
    header('Location:../login.php');
    exit();
  }
  public function userLogout(){
    session_start();
    unset($_SESSION['Connect']);
    //session_destroy();
    header('Location:../login.php');
    exit();
  }
  public function docLogout(){
    session_start();
    unset($_SESSION['userid']);
    //session_destroy();
    header('Location:../doctorLogin.php');
    exit();
  }
}