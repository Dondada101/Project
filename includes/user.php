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
   echo $rid.$hid.$did;
  // Example: Just log the values for debugging
  error_log("RID: $rid, HID: $hid, DID: $did, Action: $action");

}
