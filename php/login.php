<?php
//  This file handles the Logging in process and directs the authenticated user to the intro page.
// Enable error reporting for development
require_once './config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.cookie_lifetime', 1440);
// Set session data garbage collection lifetime to 1 hour
ini_set('session.gc_maxlifetime', 1440);
session_start();
include '../pages/secured_pages/php/db.php';
$conn = Database::getInstance();
// Check if the username and password have been provided via POST
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Prepare the SQL statement
    $stmt1 = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
    if ($stmt1 === false) {
        echo 'Error: Unable to prepare statement.<br>';
        exit();
    }

    $stmt1->bindParam(1, $email, PDO::PARAM_STR);
    if (!$stmt1->execute()) {
        echo 'Error: Execution of the statement failed.<br>';
        exit();
    }
    $user = $stmt1->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if (password_verify($password, $user['user_hashed_pwd'])) {
            $_SESSION['user_id'] = $user['userID'];
            $_SESSION['username'] = $user['user_username'];
            $START_UP_PAGE ? $_SESSION['page_number'] = $START_UP_PAGE  : $_SESSION['page_number']  = 1 ;   // Default starting page is SOH page.

            header("Location: ../pages/secured_pages/home_project_page/home.php");
            exit();
        } else {
            echo 'Incorrect username or password.<br>';
        }
    } else {
        echo 'No user found with that username.<br>';
    }

    // $stmt->close();
} else {
    echo 'Please enter a username and password.<br>';
}
