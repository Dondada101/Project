<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  $dName=htmlspecialchars($_POST['dName'],ENT_QUOTES,'UTF-8');
  $dEmail=htmlspecialchars($_POST['dEmail'],ENT_QUOTES,'UTF-8');
  $specialization=htmlspecialchars($_POST['specialization'],ENT_QUOTES,'UTF-8');
  $sspecialization=htmlspecialchars($_POST['sspecialization'],ENT_QUOTES,'UTF-8');
  $dPassword =bin2hex(random_bytes(20 / 2));
  require '../classes/admin/adminOp.class.php';
  require '../classes/admin/adminOpctrl.class.php';
  require '../classes/conn.class.php';
  $newDoctor=new AdminOpCtrl($dName,$dEmail,$dPassword,$specialization,$sspecialization);
  $newDoctor->addDoctorDetails();
}