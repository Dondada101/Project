<?php
//Importing Content from ex file
require_once"classes/layout.php";
require_once"contents/contents.php";
//Creating an instance of a class
$Objlayout=new layout();
$Objcontent=new contents();

//Invoke a method/function
$Objlayout->header();
$Objcontent->navBar();
$Objcontent->homePage();
$Objcontent->about();
$Objlayout->footer();
