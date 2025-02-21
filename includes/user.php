<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the raw POST data
  $rawData = file_get_contents('php://input');
  
  // Decode the JSON data
  $data = json_decode($rawData, true);

  // Sanitize and retrieve the data
  $rid = htmlspecialchars($data['value1'], ENT_QUOTES, 'UTF-8');
  $hid = htmlspecialchars($data['value2'], ENT_QUOTES, 'UTF-8');
  $did = htmlspecialchars($data['value3'], ENT_QUOTES, 'UTF-8');
  $demail = htmlspecialchars($data['value4'], ENT_QUOTES, 'UTF-8');
  $dname = htmlspecialchars($data['value5'], ENT_QUOTES, 'UTF-8');
  $adate= htmlspecialchars($data['value6'], ENT_QUOTES, 'UTF-8');
  $astart = htmlspecialchars($data['value7'], ENT_QUOTES, 'UTF-8');
  $aend = htmlspecialchars($data['value8'], ENT_QUOTES, 'UTF-8');
  $hname = htmlspecialchars($data['value9'], ENT_QUOTES, 'UTF-8');
  $uid = htmlspecialchars($data['value10'], ENT_QUOTES, 'UTF-8');
  $uname = htmlspecialchars($data['value11'], ENT_QUOTES, 'UTF-8');

  require "../classes/conn.class.php";
  require "../classes/appointment.class.php";
  require "../classes/appointmentCtrl.class.php";
  //Convert string to int
  $hidint=(int)$hid;
  $ridint=(int)$rid;
  $didint=(int)$did;
  $uidint=(int)$uid;
   echo gettype($ridint).$ridint.$didint.$hidint.$demail.$dname.$adate.$astart.$aend.$hname.gettype($uid).$uid.$uname;
   $param=[
    'uid'=>$uidint,
    'did'=>$didint,
    'hid'=>$hidint,
    'rid'=>$ridint,
    'dname'=>$dname,
    'demail'=>$demail,
    'hname'=>$hname,
    'adate'=>$adate,
    'astart'=>$astart,
    'aend'=>$aend,
    'uname'=>$uname
   ];
  // Example: Just log the values for debugging
  error_log("RID: $rid, HID: $hid, DID: $did");

}
