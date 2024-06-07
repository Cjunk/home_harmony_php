<?php
session_start();
header('Content-Type: application/json'); // Ensure the content type is JSON

$fileName = "fetch_stats.php";
require_once '../../../php/config.php';

if (!isset($_SESSION['username'])) {
  // If the session variables are not set, return an error message
  echo json_encode(['success' => false, 'message' => 'User not authenticated.']);
  exit();
}

debug_log("$fileName: Script accessed at " . date('Y-m-d H:i:s') . " by {$_SESSION['username']}");
debug_log("$fileName Session username: " . $_SESSION['username'] . " at " . date('Y-m-d H:i:s'));
debug_log("$fileName Session user_id: " . $_SESSION['user_id'] . " at " . date('Y-m-d H:i:s'));

// Check if the db.php file is found
$db_file = '../../../pages/secured_pages/php/db.php';
if (file_exists($db_file)) {
  require_once $db_file;
  debug_log("$fileName db.php file included successfully at " . date('Y-m-d H:i:s'));
} else {
  debug_log("$fileName db.php file not found at " . date('Y-m-d H:i:s'));
  echo json_encode(['success' => false, 'message' => 'Database configuration file not found.']);
  exit();
}

$conn = Database::getInstance();
debug_log("$fileName Database connection established at " . date('Y-m-d H:i:s'));

$stats_item_distribution = "SELECT SOH.userID, ITEM_TYPES.type_name, COUNT(*) AS total_count 
        FROM SOH
        JOIN ITEM_MASTER ON SOH.item_number = ITEM_MASTER.item_number 
        JOIN ITEM_TYPES ON ITEM_MASTER.item_type = ITEM_TYPES.type_id 
        WHERE ITEM_TYPES.userID = ? AND SOH.userID = ?
        GROUP BY ITEM_TYPES.type_name";
$stats_location_utilisation = "SELECT location_id, COUNT(*) AS total_location_count FROM SOH GROUP BY location_id";

// Prepare and execute the first statement
$stmt1 = $conn->prepare($stats_item_distribution);
debug_log("$fileName: Prepared SQL statement for item distribution at " . date('Y-m-d H:i:s'));
$executeResult1 = $stmt1->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
debug_log("$fileName Executed SQL statement result: " . json_encode($executeResult1) . " at " . date('Y-m-d H:i:s'));

$itemDistributionResults = [];
if ($executeResult1) {
  $itemDistributionResults = $stmt1->fetchAll(PDO::FETCH_ASSOC);
} else {
  debug_log("$fileName Failed to execute SQL statement for item distribution. Error: " . htmlspecialchars($stmt1->errorInfo()[2]) . " at " . date('Y-m-d H:i:s'));
  echo json_encode(['success' => false, 'message' => 'Failed to fetch item distribution data.']);
  exit();
}

// Prepare and execute the second statement
$stmt2 = $conn->prepare($stats_location_utilisation);
debug_log("$fileName: Prepared SQL statement for location utilisation at " . date('Y-m-d H:i:s'));
$executeResult2 = $stmt2->execute();
debug_log("$fileName Executed SQL statement result: " . json_encode($executeResult2) . " at " . date('Y-m-d H:i:s'));

$locationUtilisationResults = [];
$locationUtilisationCount = 0;
if ($executeResult2) {
  $locationUtilisationResults = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  $locationUtilisationCount = count($locationUtilisationResults);
} else {
  debug_log("$fileName Failed to execute SQL statement for location utilisation. Error: " . htmlspecialchars($stmt2->errorInfo()[2]) . " at " . date('Y-m-d H:i:s'));
  echo json_encode(['success' => false, 'message' => 'Failed to fetch location utilisation data.']);
  exit();
}

// Combine results and return as JSON
echo json_encode([
  'success' => true,
  'item_distribution' => $itemDistributionResults,
  'location_utilisation' => $locationUtilisationResults,
  'location_utilisation_count' => $locationUtilisationCount
]);
