<?php
session_start();
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

header("Location: login.php");
exit();
?>
