<!-- Get the full item list for this user
initially no filter applied, just get the full list.
 -->

<?php

$fileName = "get Item master list.php:";
require_once '../../../php/config.php';
// // Add debug output at the very beginning
debug_log("$fileName Script accessed at " . date('Y-m-d H:i:s'));
session_start();
if (!isset($_SESSION['username'])) {
  debug_log("$fileName Session not set. Redirecting to login at " . date('Y-m-d H:i:s'));
  header('Location: ../../../index.php');
  exit();
}
debug_log("$fileName Session username: " . $_SESSION['username'] . " at " . date('Y-m-d H:i:s'));
debug_log("$fileName Session user_id: " . $_SESSION['user_id'] . " at " . date('Y-m-d H:i:s'));
// // Check if the db.php file is found
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
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Fetch data from the database
$stmt = $conn->prepare("SELECT * FROM ITEM_MASTER WHERE userID = ?");
$executeResult = $stmt->execute([$_SESSION['user_id']]);
debug_log("$fileName Executed SELECT statement result: " . json_encode($executeResult) . " at " . date('Y-m-d H:i:s'));

if ($executeResult) {
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION['ITEM_MASTER'] = $items; // Store the fetched data in session variables 
  $response['success'] = true;
  $response['message'] = 'Item list fetched successfully';
  debug_log("$fileName Item list fetched successfully at " . date('Y-m-d H:i:s'));
} else {
  $response['message'] = 'Failed to fetch item list. Error: ' . htmlspecialchars($stmt->errorInfo()[2]);
  debug_log("$fileName Failed to fetch item list. Error: " . htmlspecialchars($stmt->errorInfo()[2]) . " at " . date('Y-m-d H:i:s'));
}

// // Return JSON response
// header('Content-Type: application/json');
// echo json_encode($response);
