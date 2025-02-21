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
  //Convert string to int
  $hidint=(int)$hid;
  $ridint=(int)$rid;
  $didint=(int)$did;
   echo gettype($ridint).$ridint.$didint.$hidint.$demail.$dname.$adate.$astart.$aend;
  // Example: Just log the values for debugging
  error_log("RID: $rid, HID: $hid, DID: $did");

}
