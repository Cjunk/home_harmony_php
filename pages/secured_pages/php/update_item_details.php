<?php
$fileName = "update_item_details.php";
require_once '../../../php/config.php';
// Add debug output at the very beginning
debug_log("update_item_details.php: Script accessed at " . date('Y-m-d H:i:s'));
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

$item_number = isset($_POST['item_number']) ? intval($_POST['item_number']) : null;
$alt_item_number = isset($_POST['alt_item_number']) ? $_POST['alt_item_number'] : null;
$item_name = isset($_POST['item_name']) ? $_POST['item_name'] : null;
$item_descr = isset($_POST['item_descr']) ? $_POST['item_descr'] : null;
$item_barcode = isset($_POST['item_barcode']) ? $_POST['item_barcode'] : null;
$item_weight = isset($_POST['item_weight']) ? $_POST['item_weight'] : null;
$item_prime_photo = isset($_POST['item_prime_photo']) ? $_POST['item_prime_photo'] : null;

$response = ['success' => false]; // Initialize response

if ($item_number !== null) {
  $stmt = $conn->prepare("UPDATE ITEM_MASTER SET alt_item_number = ?, item_name = ?, item_descr = ?, item_barcode = ?, item_weight = ?, item_prime_photo = ? WHERE item_number = ? AND userID = ?");

  debug_log("Prepared UPDATE statement at " . date('Y-m-d H:i:s'));
  $executeResult = $stmt->execute([$alt_item_number, $item_name, $item_descr, $item_barcode, $item_weight, $item_prime_photo, $item_number, $_SESSION['user_id']]);

  debug_log("$fileName Executed UPDATE statement result: " . json_encode($executeResult) . " at " . date('Y-m-d H:i:s'));

  if ($executeResult) {
    $response['success'] = true;
    $response['message'] = 'Item details updated successfully';
  } else {
    $response['message'] = 'Failed to update item details. Error: ' . htmlspecialchars($stmt->errorInfo()[2]);
  }
} else {
  $response['message'] = 'Invalid input';
}

header('Content-Type: application/json');
echo json_encode($response);

