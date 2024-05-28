<?php
session_start();
if (!isset($_SESSION['username'])) {
  // If the session variables are not set, redirect to login page
  header('Location:../../../index.php');
  exit();
}
if (isset($_GET['page_number'])) {
  $page_number = intval($_GET['page_number']);
  $_SESSION['page_number'] = $page_number;
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'message' => 'Page number not provided']);
}
