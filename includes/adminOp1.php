<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(isset($_POST['hname']) && isset($_POST['hlvl']) && isset($_POST['action']) && $_POST['action']==='insert'){
    $hname=htmlspecialchars($_POST['hname'],ENT_QUOTES,'UTF-8');
    $hlvl=htmlspecialchars($_POST['hlvl'],ENT_QUOTES,'UTF-8');
    echo "hname".$hname;
    require '../classes/conn.class.php';
    require '../classes/adminOp.class.php';
    require '../classes/adminOpctrl.class.php';
    echo "hname1".$hname;
    $params=[
      'hname'=> $hname,
      'hlvl'=>$hlvl
    ];
    $newHospital=new AdminOpCtrl($params);
    $newHospital->addHospitalDetails();
    echo "hname2".$hname;
  }else if (isset($_POST['hid']) && isset($_POST['action']) && $_POST['action']='delete'){
    $hid=htmlspecialchars($_POST['hid'],ENT_QUOTES,'UTF-8');
    echo gettype($hid);
    $hidint=(int)$hid;
    echo gettype($hidint);
    require '../classes/conn.class.php';
    require '../classes/adminOp.class.php';
    require '../classes/adminOpctrl.class.php';
    $params=[
      'hid'=>$hidint
    ];
    $delete= new AdminOpCtrl($params);
    $delete->deleteHospitalDetails();
  }
 
}