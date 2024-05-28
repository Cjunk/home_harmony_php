<!-- DETAILS:


 -->

<?php
$fileName = "get Item master list.php:";
require_once '../../../php/config.php';
// Add debug output at the very beginning
debug_log("$fileName Script accessed at " . date('Y-m-d H:i:s'));
session_start();
if (!isset($_SESSION['username'])) {
  debug_log("$fileName Session not set. Redirecting to login at " . date('Y-m-d H:i:s'));
  header('Location: ../../../index.php');
  exit();
}
debug_log("$fileName Session username: " . $_SESSION['username'] . " at " . date('Y-m-d H:i:s'));
debug_log("$fileName Session user_id: " . $_SESSION['user_id'] . " at " . date('Y-m-d H:i:s'));
// Check if the db.php file is found
$db_file = '../../../pages/secured_pages/php/db.php';
if (file_exists($db_file)) {
  require_once $db_file;
  debug_log("$fileName db.php file included successfully at " . date('Y-m-d H:i:s'));
} else {
  debug_log("$fileName db.php file not found at " . date('Y-m-d H:i:s'));
  exit();
}

$conn = Database::getInstance();
debug_log("$fileName Database connection established at " . date('Y-m-d H:i:s'));
