<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  $hname=htmlspecialchars($_POST['hname'],ENT_QUOTES,'UTF-8');
  $hlvl=htmlspecialchars($_POST['hlvl'],ENT_QUOTES,'UTF-8');
  require '../classes/conn.class.php';
  require '../classes/admin/adminOp.class.php';
  require '../classes/admin/adminOpctrl.class.php';
  $newDoctor=new AdminOpCtrl($dName,$dEmail,$dPassword,$specialization,$sspecialization);
  $newDoctor->addDoctorDetails();
}