<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  $dName=htmlspecialchars($_POST['dName'],ENT_QUOTES,'UTF-8');
  $dEmail=htmlspecialchars($_POST['dEmail'],ENT_QUOTES,'UTF-8');
  $specialization=htmlspecialchars($_POST['specialization'],ENT_QUOTES,'UTF-8');
  $sspecialization=htmlspecialchars($_POST['sspecialization'],ENT_QUOTES,'UTF-8');
  $dPassword =bin2hex(random_bytes(20 / 2));
  require '../classes/conn.class.php';
  require '../classes/adminOp.class.php';
  require '../classes/adminOpctrl.class.php';
  $params=[
    'ssname'=>$sspecialization,
    'sname'=>$specialization,
    'dpw'=>$dPassword,
    'demail'=>$dEmail,
    'dname'=>$dName
  ];
  $newDoctor=new AdminOpCtrl($params);
  $newDoctor->addDoctorDetails();
}