<?php
session_start();
if (!isset($_SESSION['username'])) {
  // If the session variables are not set, redirect to login page
  header('Location:../../../index.php');
  exit();
}

function fetchLocations()
{

  require_once '../../../pages/secured_pages/php/db.php';
  $conn = Database::getInstance();
  $sql = "SELECT * FROM LOCATION_MASTER WHERE userID = 2;"; // TODO: Change user ID to the current logged in user $_SESSION['user_id']
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  if ($stmt === false) {
    throw new Exception('Unable to prepare statement');
  }
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
try {
  $locations = fetchLocations();
  $_SESSION['locations'] = $locations;
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
