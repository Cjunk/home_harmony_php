<?php
// Start or resume the session to access existing data
session_start();

// Unset all session variables
$_SESSION = array();

// If a session cookie is used, delete it by setting its expiration time to a past value
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
  );
}

// Finally, destroy the session
session_destroy();

// Optional: Redirect or provide confirmation that the session has ended
echo "Session closed successfully.";
header('Location: ../index.php');
