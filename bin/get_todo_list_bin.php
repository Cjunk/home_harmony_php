<?php
session_start();
if (!isset($_SESSION['username'])) {
  // If the session variables are not set, redirect to login page
  header('Location:../../../index.php');
  exit();
}
// $conn = getDatabaseConnection();
require_once './db.php';
$conn = Database::getInstance();

if ($conn === null) {
  echo 'Error: Unable to connect to the database.<br>';
  exit();
}
echo 'found it';
$stmt1 = $conn->prepare("SELECT * FROM todo WHERE ownerID = ? && priority = ?");
if ($stmt1 === false) {
  echo 'Error: Unable to prepare statement.<br>';
  exit();
}
$type = 2;
$stmt1->bind_param("ii", $_SESSION['user_id'], $type);
if (!$stmt1->execute()) {
  echo 'Error: Execution of the statement failed.<br>';
  exit();
}
$result = $stmt1->get_result();  // Fetching the result of the query
echo '<div style="height: 300px; overflow-y: auto; -ms-overflow-style: none; scrollbar-width: none;">'; // Set height and hide scroll bars

// Check if there are rows returned
if ($result->num_rows > 0) {
  echo '<button type="button" class="btn btn-primary btn-sm" onclick="submitForm()">Update all Todos</button>';
  echo '<style> #todoListForm{border:1px solid grey;} </style>';
  echo '<form id="todoListForm">';
  echo '<ul style="list-style: none; padding-left: 0;">'; // No list style, no padding
  while ($row = $result->fetch_assoc()) {
    echo '<li style="display: flex; align-items: center; margin-bottom: 10px;">'; // Flexbox to keep items inline
    echo '<input type="checkbox" id="todo-' . htmlspecialchars($row['idtodo']) . '" data-id="' . htmlspecialchars($row['idtodo']) . '" onclick="toggleStrikeThrough(this, \'label-' . htmlspecialchars($row['idtodo']) . '\')"> ';
    echo '<label id="label-' . htmlspecialchars($row['idtodo']) . '" for="todo-' . htmlspecialchars($row['idtodo']) . '" style="flex-grow: 1; margin-right: 10px;">'
      . htmlspecialchars($row['title']) . ': ' . htmlspecialchars($row['description']) . '</label>';
    echo '<button type="button" onclick="deleteTodoItem(' . htmlspecialchars($row['idtodo']) . ')" class="btn btn-danger btn-sm">Delete</button>';
    echo '</li>';
  }
  echo '</ul>';

  echo '</form>';
} else {
  echo "No todo items found.";
}
echo '</div>'; // Close the scrollable section

$stmt1->close();
$conn->close();
