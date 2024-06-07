//  This file handles the Logging in process and directs the authenticated user to the intro page.
<?php
// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.cookie_lifetime', 36);
// Set session data garbage collection lifetime to 1 hour
ini_set('session.gc_maxlifetime', 36);
session_start();
include './events_conn.php';
$conn = getDatabaseConnection();

// Check if the username and password have been provided via POST
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if ($stmt === false) {
        echo 'Error: Unable to prepare statement.<br>';
        exit();
    }

    $stmt->bind_param("s", $username);

    if (!$stmt->execute()) {
        echo 'Error: Execution of the statement failed.<br>';
        exit();
    }

    $result = $stmt->get_result();
    if ($result === false) {
        echo 'Error: Could not get result set.<br>';
        exit();
    }

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password using password_verify
        if (password_verify($password, $user['PasswordHash'])) {
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['username'] = $user['username'];

            echo 'Session Variables Set: UserID=' . $_SESSION['user_id'] . ', Username=' . $_SESSION['username'] . "<br>";

            // Redirect to a secured page after successful login
            header("Location: ../pages/secured_pages/secure_page.php");
            exit();  // Ensure no further script execution
        } else {
            echo 'Incorrect username or password.<br>';
        }
    } else {
        echo 'No user found with that username.<br>';
    }

    $stmt->close();
} else {
    echo 'Please enter a username and password.<br>';
}


