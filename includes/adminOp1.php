<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  $hname=htmlspecialchars($_POST['hname'],ENT_QUOTES,'UTF-8');
  $hlvl=htmlspecialchars($_POST['hlvl'],ENT_QUOTES,'UTF-8');
  echo "hname".$hname;
  require '../classes/conn.class.php';
  require '../classes/adminOp.class.php';
  require '../classes/adminOpctrl.class.php';
  echo "hname1".$hname;
  $newHospital=new AdminOpCtrl($hname,$hlvl);
  $newHospital->addHospitalDetails();
  echo "hname2".$hname;
}