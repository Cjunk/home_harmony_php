<?php
require_once '../../../php/config.php';
// Add debug output at the very beginning
debug_log("Script accessed at " . date('Y-m-d H:i:s'));

session_start();
if (!isset($_SESSION['username'])) {
  debug_log("Session not set. Redirecting to login at " . date('Y-m-d H:i:s'));
  header('Location: ../../../index.php');
  exit();
}

debug_log("Session username: " . $_SESSION['username'] . " at " . date('Y-m-d H:i:s'));
debug_log("Session user_id: " . $_SESSION['user_id'] . " at " . date('Y-m-d H:i:s'));

// Check if the db.php file is found
$db_file = '../../../pages/secured_pages/php/db.php';
if (file_exists($db_file)) {
  require_once $db_file;
  debug_log("db.php file included successfully at " . date('Y-m-d H:i:s'));
} else {
  debug_log("db.php file not found at " . date('Y-m-d H:i:s'));
  exit();
}

$conn = Database::getInstance();
debug_log("Database connection established at " . date('Y-m-d H:i:s'));

$soh_id = isset($_POST['soh_id']) ? intval($_POST['soh_id']) : null;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : null;

$response = ['success' => false]; // Initialize response

debug_log("Received soh_id: $soh_id, quantity: $quantity at " . date('Y-m-d H:i:s'));

if ($soh_id !== null && $quantity !== null) {
  $stmt = $conn->prepare("SELECT * FROM SOH WHERE soh_id = ? AND userID = ?");
  debug_log("Prepared SELECT statement at " . date('Y-m-d H:i:s'));


  $executeResult = $stmt->execute([$soh_id, $_SESSION['user_id']]);
  debug_log("Executed SELECT statement result: " . json_encode($executeResult) . " at " . date('Y-m-d H:i:s'));

  if ($executeResult) {
    debug_log("Executed SELECT statement successfully at " . date('Y-m-d H:i:s'));
    $soh_item = $stmt->fetch();
    if ($soh_item) {
      debug_log("Found SOH item at " . date('Y-m-d H:i:s'));
      if ($quantity == 0) {
        $stmt = $conn->prepare("DELETE FROM SOH WHERE soh_id = ? AND userID = ?");
        if ($stmt->execute([$soh_id, $_SESSION['user_id']])) {
          unset($_SESSION['todos'][$soh_id]);
          $response['success'] = true;
          $response['deleted'] = true;
          $response['message'] = 'Item removed due to zero quantity';
          debug_log("Deleted SOH item with ID $soh_id at " . date('Y-m-d H:i:s'));
        } else {
          $response['message'] = 'Failed to delete item. Error: ' . htmlspecialchars($stmt->errorInfo()[2]);
          debug_log("Failed to delete SOH item with ID $soh_id at " . date('Y-m-d H:i:s') . ". Error: " . htmlspecialchars($stmt->errorInfo()[2]));
        }
      } else {
        $stmt = $conn->prepare("UPDATE SOH SET soh_qty = ? WHERE soh_id = ? AND userID = ?");
        if ($stmt->execute([$quantity, $soh_id, $_SESSION['user_id']])) {
          $_SESSION['todos'][$soh_id]['soh_qty'] = $quantity;
          $response['success'] = true;
          $response['deleted'] = false;
          debug_log("Updated SOH quantity for ID $soh_id to $quantity at " . date('Y-m-d H:i:s'));
        } else {
          $response['message'] = 'Failed to update quantity. Error: ' . htmlspecialchars($stmt->errorInfo()[2]);
          debug_log("Failed to update quantity for SOH ID $soh_id at " . date('Y-m-d H:i:s') . ". Error: " . htmlspecialchars($stmt->errorInfo()[2]));
        }
      }
    } else {
      $response['message'] = 'Unauthorized action or item not found';
      debug_log("Unauthorized action or item not found for SOH ID $soh_id at " . date('Y-m-d H:i:s'));
    }
  } else {
    $errorInfo = $stmt->errorInfo();
    $response['message'] = 'Failed to execute query. Error: ' . htmlspecialchars($errorInfo[2]);
    debug_log("Failed to execute SELECT statement for SOH ID $soh_id at " . date('Y-m-d H:i:s') . ". Error: " . htmlspecialchars($errorInfo[2]));
  }
} else {
  $response['message'] = 'Invalid input';
  debug_log("Invalid input for soh_id or quantity at " . date('Y-m-d H:i:s'));
}

header('Content-Type: application/json');
echo json_encode($response);
