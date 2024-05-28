<?php
// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../vendor/autoload.php';  // Load Composer's autoloader
include '../pages/secured_pages/php/db.php';
$conn = Database::getInstance();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email-register'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypting the password

  // Store user in the database (make sure to handle this safely with prepared statements)
  $sql = "INSERT INTO users (user_username, user_email, user_hashed_pwd) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $username);
  $stmt->bindParam(2, $email);
  $stmt->bindParam(3, $password);
  $stmt->execute();

  $mail = new PHPMailer(true);
  try {
    // $mail->SMTPDebug = 2;  // Enable verbose debug output to see more detailed errors
    $mail->isSMTP();
    $mail->Host = 'bom1plzcpnl493815.prod.bom1.secureserver.net';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Username = 'jsharman@jerichosharman.com.au';
    $mail->Password = 'Quest35#Scrap35#';
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('jsharman@jerichosharman.com.au', 'Jericho Sharman');
    $mail->addAddress($email, 'jsharman');  // Add a recipient

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Confirm your registration for HOME - HARMONY';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();

    header("Location: ../pages/secured_pages/home_project_page/home.php");
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
