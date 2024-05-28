<!-- This is the todo list php which is included into the home.php file -->
<!-- Bootstrap CSS CDN -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../php/db.php';
$conn = Database::getInstance();
try {
  // 
  $stmt = $conn->prepare("SELECT * FROM todo WHERE ownerID = ?");
  $stmt->bindParam(1, $_SESSION['user_id']);
  // $stmt->bindParam(2, $priority);
  $stmt->execute();
  $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if ($stmt === false) {
    throw new Exception('Unable to prepare statement');
  }
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage() . '<br>';
  exit();
}
?>
<style>
  .container {
    background-color: white;
    border-bottom: 1px solid grey;
    margin-top: 15px;
  }

  .todoList {
    background-color: white;
    margin: 0;
    color: black;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-12 col-md-18"> <!-- Adjust the column to be wider yet compact -->
      <h5 class="mb-2">Add Todo</h5>
      <form action="../../php/submit-todo.php" method="POST">
        <div class="form-group row mb-2">
          <label for="title" class="col-sm-4 col-form-label col-form-label-sm">Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="title" name="title" placeholder="Enter title" required>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="description" class="col-sm-4 col-form-label col-form-label-sm">Description</label>
          <div class="col-sm-8">
            <textarea class="form-control form-control-sm" id="description" name="description" rows="2" placeholder="Enter description"></textarea>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="to_be_completed_by" class="col-sm-4 col-form-label col-form-label-sm">Completion Date</label>
          <div class="col-sm-8">
            <input type="datetime-local" class="form-control form-control-sm" id="to_be_completed_by" name="to_be_completed_by" placeholder="YYYY-MM-DD">
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="priority" class="col-sm-4 col-form-label col-form-label-sm">Priority</label>
          <div class="col-sm-8">
            <select class="form-control form-control-sm" id="priority" name="priority">
              <option value="1" selected>Low</option>
              <option value="2">Medium</option>
              <option value="3">High</option>
            </select>
          </div>
        </div>
        <div class="form-group row mb-2">
          <div class="col-sm-8 offset-sm-4">
            <button type="submit" class="btn btn-primary btn-sm">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
echo '<div style="height: 600px; overflow-y: auto; -ms-overflow-style: none; scrollbar-width: none;">'; // Set height and hide scroll bars
if (!empty($todos)) {
  echo '<button type="button" class="btn btn-primary btn-sm" onclick="submitForm()">Update all Todos</button>';
  echo '<form id="todoListForm" style="border:1px solid grey;">';
  echo '<ul style="list-style: none; padding-left: 0; background-color:red;">';
  foreach ($todos as $row) {
    echo '<li style="display: flex; align-items: center; margin-bottom: 10px;">';
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
echo '</div>';
?>
</div>