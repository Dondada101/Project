<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
if(isset($_POST['dname']) && isset($_POST['password'])){
$dname=htmlspecialchars($_POST['dname'], ENT_QUOTES,'UTF-8');
$dpw=htmlspecialchars($_POST['password'], ENT_QUOTES,'UTF-8');
require '../classes/conn.class.php';
require '../classes/doctorOp.class.php';
require '../classes/doctorOPCtrl.class.php';

$param=[
  'dName'=> $dname,
  'dpw'=>$dpw
];
$doctor=new DoctorOpCtrl($param);
$doctor->verifyDoctor();
header("location: ../dindex.php");
}else if(isset($_POST['did']) && isset($_POST['place']) && isset($_POST['sTime']) && isset($_POST['eTime']) && isset($_POST['rDate']) && isset($_POST[' action']) && $_POST['action'] === 'insert'){
  $place=htmlspecialchars($_POST['place'],ENT_QUOTES,'UTF-8');
  $did=htmlspecialchars($_POST['did'],ENT_QUOTES,'UTF-8');
  $rDate=htmlspecialchars($_POST['rDate'],ENT_QUOTES,'UTF-8');
  $sTime=htmlspecialchars($_POST['sTime'],ENT_QUOTES,'UTF-8');
  $eTime=htmlspecialchars($_POST['eTime'],ENT_QUOTES,'UTF-8');
  require '../classes/conn.class.php';
  require '../classes/doctorOp.class.php';
  require '../classes/doctorOPCtrl.class.php';

  $didint=(int)$did;
  $param=[
    'stime'=> $sTime,
    'etime'=> $eTime,
    'rdate'=>$rDate,
    'place'=>$place,
    'did'=>$didint
  ];
  $insertRatiba=new DoctorOpCtrl($param);
  $insertRatiba->insertDocRatiba();
}
}
?>