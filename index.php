<?php
session_start();
if(isset($_SESSION['Connect'])){
  //var_dump($_SESSION['Connect']);
//Importing Content from ex file
require_once"classes/layout.php";
require_once"contents/contents.php";
//Creating an instance of a class
$Objlayout=new layout();
$Objcontent=new contents();

//Invoke a method/function
$Objlayout->header();
$Objcontent->navBar();
$Objcontent->contentPage();
$Objcontent->about();
$Objlayout->footer();
}else{
  header('Location:login.php');
}
// Add these headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.