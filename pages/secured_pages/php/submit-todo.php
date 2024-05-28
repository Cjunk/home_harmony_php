<!-- Submit a todo item to the database -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
  // If the session variables are not set, redirect to login page
  header('Location:../../../index.php');
  exit();
}
?>

<h1> AM HERE 2</h1>
<?php
include '../php/events_conn.php';
$stmt = $conn->prepare("INSERT INTO todo (title,description,to_be_completed_by,ownerID) VALUES (?,?,?,?)");
// Collecting user input
$title = $_POST['title']; // Assuming input validation and sanitization elsewhere
$description = $_POST['description'];
// Ensure the datetime is in the correct format. Example:
$to_be_completed_by = $_POST['to_be_completed_by']; // This should come from the form in the correct format

$to_be_completed_by = date('Y-m-d H:i:s', strtotime($to_be_completed_by));

$ownerID = $_SESSION['user_id'];

$stmt->bind_param("sssi", $title, $description, $to_be_completed_by, $ownerID);

$stmt->execute();
// Optional: Check for successful insertion
if ($stmt->affected_rows > 0) {
  echo "Record added successfully.";
} else {
  echo "Error adding record: " . $stmt->error;
}
header('Location: ../../index.php');
exit(); // Don't forget to call exit() after header()
?>