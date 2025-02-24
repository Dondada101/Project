<?php
if (isset($_GET['type'])) {
  $type = $_GET['type'];
  require '../classes/logout.class.php';
  $logout=new LogOut();
  if ($type === 'admin') {
    echo "Block executed";
      $logout->adminLogout();
  } elseif ($type === 'user') {
      $logout->userLogout();
  } elseif ($type === 'doc') {
      $logout->docLogout();
  }
}
?>