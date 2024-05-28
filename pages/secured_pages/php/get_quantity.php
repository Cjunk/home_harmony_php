<?php
session_start();
if (!isset($_SESSION['username'])) {
  // If the session variables are not set, redirect to login page
  header('Location:../../../index.php');
  exit();
}
header('Content-Type: application/json');

if (isset($_POST['soh_id'])) {
  $soh_id = $_POST['soh_id'];
  if (isset($_SESSION['todos'][$soh_id])) {
    $quantity = $_SESSION['todos'][$soh_id]['soh_qty'];
    echo json_encode(['success' => true, 'quantity' => $quantity]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Item not found']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
